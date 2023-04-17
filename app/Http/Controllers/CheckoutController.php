<?php

namespace App\Http\Controllers;

use App\Http\Requests\Checkout\CheckoutRequest;
use App\Mail\OrderPlaced;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\PaymentDetails;
use App\Models\UserAddress;
use App\Models\UserCountry;
use Carbon\Carbon;
use Checkout\CheckoutApiException;
use Checkout\CheckoutAuthorizationException;
use Checkout\CheckoutSdk;
use Checkout\Common\Address;
use Checkout\Common\Country;
use Checkout\Common\Currency;
use Checkout\Common\CustomerRequest;
use Checkout\Common\Phone;
use Checkout\Environment;
use Checkout\OAuthScope;
use Checkout\Payments\Request\PaymentRequest;
use Checkout\Payments\Request\Source\RequestTokenSource;
use Checkout\Payments\Sender\PaymentIndividualSender;
use Checkout\Payments\ThreeDsRequest;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function checkoutorder(Request $request)
    {

        // dd(env('DHL_ACCOUNT_NUMBER'));

        if (!Cart::content()->isEmpty()) {
            $collectioncountries = UserCountry::get();
            $useraddress = UserAddress::where([['userid', Auth()->user()->id]])->get();
            foreach (Cart::content() as $item) {
                if ($item->model->length > 0 && $item->model->width > 0 && $item->model->height > 0 && $item->model->weight > 0) {
                    $ip = $request->ip();
                    $data = \Location::get($ip);
                    $today = new Carbon();

                    $dhlmethod = new DHLController();

                }
            }
            return view('checkout.checkout')->with(compact('collectioncountries', 'useraddress'));
        } else {
            return redirect()->route('home');
        }

    }

    public function cart()
    {
        return view('checkout.cart');
    }

    public function checkoutpayment(CheckoutRequest $request)
    {
        dd(Session::get('newTotal'));
        $api = CheckoutSdk::builder()->staticKeys()->environment(Environment::production())->secretKey(env("SECRET_KEY"))->build();
        $api = CheckoutSdk::builder()->oAuth()->clientCredentials(env("CLIENT_ID"), env("CLIENT_SECRET"))->scopes([OAuthScope::$Gateway])->environment(Environment::production())->build();

        $phone = new Phone();
        $phone->country_code = "";
        $phone->number = $request->phone;

        $address = new Address();
        $address->address_line1 = $request->companyname . ' ' . $request->streetaddress;
        $address->address_line2 = $request->apartmentno;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->zip = $request->postalcode;
        $address->country = Country::$AE;

        $requestTokenSource = new RequestTokenSource();
        $requestTokenSource->token = $request["cko-card-token"];

        $customerRequest = new CustomerRequest();
        $customerRequest->email = $request->email;
        $customerRequest->name = $request->firstname . ' ' . $request->lastname;

        $paymentIndividualSender = new PaymentIndividualSender();
        $paymentIndividualSender->fist_name = $request->firstname;
        $paymentIndividualSender->last_name = $request->lastname;
        $paymentIndividualSender->address = $address;

        $threeds = new ThreeDsRequest();
        $threeds->enabled = true;

        $checkoutrequestpayment = new PaymentRequest();
        $checkoutrequestpayment->source = $requestTokenSource;
        $checkoutrequestpayment->capture = true;

        //$checkoutrequestpayment->amount = (Cart::total())*100;
        $checkoutrequestpayment->amount = Session::get('newTotal');
        $checkoutrequestpayment->currency = Currency::$AED;
        $checkoutrequestpayment->customer = $customerRequest;
        $checkoutrequestpayment->three_ds = $threeds;
        $checkoutrequestpayment->sender = $paymentIndividualSender;
        $checkoutrequestpayment->processing_channel_id = env("PROCESSING_CHANNEL_ID");
        $checkoutrequestpayment->success_url = route('checkout.success', true);
        $checkoutrequestpayment->failure_url = route('checkout.failure', true);

        try {

            $response = $api->getPaymentsClient()->requestPayment($checkoutrequestpayment);
            $order = $this->addToOrdersTables($request, null);
            Session::put('order_code', $order->order_code);
            Cart::instance('default')->destroy();
            return redirect($response['_links']['redirect']['href']);
        } catch (CheckoutApiException $e) {
            $error_details = $e->error_details;
            $http_status_code = isset($e->http_metadata) ? $e->http_metadata->getStatusCode() : null;
            $order = $this->addToOrdersTables($request, null);
            return view('pages.failure')->with(compact('error_details', 'http_status_code'));
        } catch (CheckoutAuthorizationException $e) {
            return view('pages.failure');
        }
    }

    public function success(Request $request)
    {
        $checkoutpaymentresponse = $request->get('cko-session-id');
        $api = CheckoutSdk::builder()->staticKeys()->environment(Environment::production())->secretKey(env("SECRET_KEY"))->build();
        $api = CheckoutSdk::builder()->oAuth()->clientCredentials(env("CLIENT_ID"), env("CLIENT_SECRET"))->scopes([OAuthScope::$Gateway])->environment(Environment::production())->build();

        try {
            $response = $api->getPaymentsClient()->getPaymentDetails($checkoutpaymentresponse);

            $ordercode = Session::get('order_code');
            $order = Order::where([['order_code', $ordercode], ['payment_status', 'Un Paid']])->first();

            if (!$order) {
                return redirect()->route('home');
            } else {
                $orderproduct = OrderProduct::where([['order_id', $order->id]])->get();

                $order->payment_status = $response['status'];
                $order->save();
                $paymentdetails = new PaymentDetails();
                $paymentdetails->payment_id = $response['id'];
                $paymentdetails->requested_on = $response['requested_on'];
                $paymentdetails->order_id = $order->id;
                $paymentdetails->update();

                $collectionproducts = DB::table('products')
                    ->join('order_products', 'order_products.product_id', '=', 'products.id')
                    ->join('orders', 'orders.id', '=', 'order_products.order_id')
                    ->join('payment_details', 'payment_details.order_id', '=', 'orders.id')
                    ->select('order_products.*', 'products.*', 'order_products.quantity as ordered_quantity')
                    ->Where('order_products.order_id', '=', "$order->id")
                    ->groupBy('products.mfr')->get();

                Mail::send(new OrderPlaced($order, $collectionproducts));
            }

            return view('checkout.thankyou')->with(compact('order', 'response', 'orderproduct', 'collectionproducts'));

        } catch (CheckoutApiException $e) {
            // API error
            $error_details = $e->error_details;
            $http_status_code = isset($e->http_metadata) ? $e->http_metadata->getStatusCode() : null;
            return view("pages.failure")->with(compact('error_details', 'http_status_code'));
        } catch (CheckoutAuthorizationException $e) {
            return view('pages.failure')->with(compact('e'));
        }
    }

    public function addToOrdersTables($request, $error)
    {
        try {
            $neworder = new Order;
            $neworder->user_id = auth()->user() ? auth()->user()->id : null;
            $neworder->order_code = $this->generateUniqueCode();
            $neworder->billing_email = $request->email;
            $neworder->billing_name = $request->firstname . ' ' . $request->lastname;
            $neworder->billing_address = $request->apartmentno . ' ' . $request->streetaddress;
            $neworder->billing_city = $request->city;
            $neworder->billing_provice = $request->state;
            $neworder->billing_postalcode = $request->postalcode;
            $neworder->billing_phone = $request->phone;
            $neworder->billing_country = $request->country;
            $neworder->company_name = $request->companyname;
            $neworder->payment_status = 'Un Paid';
            $neworder->session_id = Session::getId();
            $neworder->billing_subtotal = Cart::subtotal();
            $neworder->tax = Cart::tax();
            $neworder->total = Cart::total();
            $neworder->error = $error;

            $neworder->save();

            foreach (Cart::content() as $item) {

                $neworderproduct = new OrderProduct();
                $neworderproduct->order_id = $neworder->id;
                $neworderproduct->product_id = $item->model->id;
                $neworderproduct->quantity = $item->qty;
                $neworderproduct->product_price = $item->price;
                $neworderproduct->save();

            }

            return $neworder;
        } catch (Exception $exe) {

        }
    }
    public function failure(Request $request)
    {
        $checkoutpaymentresponse = $request->get('cko-session-id');
        $api = CheckoutSdk::builder()->staticKeys()->environment(Environment::production())->secretKey(env("SECRET_KEY"))->build();
        $api = CheckoutSdk::builder()->oAuth()->clientCredentials(env("CLIENT_ID"), env("CLIENT_SECRET"))->scopes([OAuthScope::$Gateway])->environment(Environment::production())->build();
        try {
            $response = $api->getPaymentsClient()->getPaymentDetails($checkoutpaymentresponse);
            $ordercode = Session::get('order_code');
            $order = Order::where([['order_code', $ordercode], ['payment_status', 'Un Paid']])->first();
            if (!$order) {
                return redirect()->route('home');
            } else {
                $orderproduct = OrderProduct::where([['order_id', $order->id]])->get();
                $order->payment_status = $response['status'];
                $order->save();
                $paymentdetails = new PaymentDetails();
                $paymentdetails->payment_id = $response['id'];
                $paymentdetails->requested_on = $response['requested_on'];
                $paymentdetails->order_id = $order->id;
                $paymentdetails->save();
            }
            return view('pages.failure')->with(compact('order', 'response', 'orderproduct'));
        } catch (CheckoutApiException $e) {
            $error_details = $e->error_details;
            $http_status_code = isset($e->http_metadata) ? $e->http_metadata->getStatusCode() : null;
        }
    }

    public function generateUniqueCode()
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);
        $codeLength = 10;
        $code = '';
        while (strlen($code) < $codeLength) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code . $character;
        }
        if (Order::where('order_code', $code)->exists()) {
            $this->generateUniqueCode();
        }
        return $code;
    }
}
