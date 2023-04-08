<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserAddress;
use Illuminate\Support\Facades\Hash;
use App\Models\UserCountry;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    public function updateprofile(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required'
        ]);

        $profile = Auth::user();

        $profile->username = $request->username;
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->email = $request->email;
        $profile->mobile = $request->phone;
        $profile->update();

        return back();
    }

    public function addaddress()
    {
        $collectioncountries = UserCountry::get();
        return view('user.profile.add-address')->with(compact('collectioncountries'));
    }

    public function addaddressdata(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'address1' =>'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'phonenumber' => 'required'
        ]);

        $collectionuseraddress = UserAddress::where([['userid',Auth::user()->id]])->get();


        $useraddress = new UserAddress();
        if($collectionuseraddress->isEmpty()){
            $useraddress->first_name = $request->firstname;
            $useraddress->last_name = $request->lastname;
            $useraddress->company_name = $request->company;
            $useraddress->country = $request->country;
            $useraddress->address1 = $request->address1;
            $useraddress->address2 = $request->address2;
            $useraddress->city = $request->city;
            $useraddress->state = $request->state;
            $useraddress->postalcode = $request->postcode;
            $useraddress->phonenumber = $request->phonenumber;
            $useraddress->userid = Auth::user()->id;
            if($request->isdefault = true){
                $useraddress->isdefault = $request->isdefault;
            }
            $useraddress->save();

        }else{

            if($request->isdefault){
                $collectionuseraddress->isdefault = false;
                $collectionuseraddress->update();

                $useraddress->first_name = $request->firstname;
                $useraddress->last_name = $request->lastname;
                $useraddress->company_name = $request->company;
                $useraddress->country = $request->country;
                $useraddress->address1 = $request->address1;
                $useraddress->address2 = $request->address2;
                $useraddress->city = $request->city;
                $useraddress->state = $request->state;
                $useraddress->postalcode = $request->postcode;
                $useraddress->phonenumber = $request->phonenumber;
                $useraddress->userid = Auth::user()->id;
                $useraddress->isdefault = $request->isdefault;
                $useraddress->save();

            }else{
                $useraddress->first_name = $request->firstname;
                $useraddress->last_name = $request->lastname;
                $useraddress->company_name = $request->company;
                $useraddress->country = $request->country;
                $useraddress->address1 = $request->address1;
                $useraddress->address2 = $request->address2;
                $useraddress->city = $request->city;
                $useraddress->state = $request->state;
                $useraddress->postalcode = $request->postcode;
                $useraddress->phonenumber = $request->phonenumber;
                $useraddress->userid = Auth::user()->id;
                $useraddress->save();
            }
        }


        return redirect()->route('user.address');
    }

    public function edituseraddress($id)
    {
        $collectioncountries = UserCountry::get();
        $deliveryaddress = UserAddress::where('id',$id)->first();
        return view('user.profile.edit-address')->with(compact('deliveryaddress','collectioncountries'));
    }

    public function updateaddress(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'country' => 'required',
            'address1' =>'required',
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'phonenumber' => 'required'
        ]);

    }


    public function updatePassword(Request $request)
    {
        # Validation
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|confirmed',
        ]);


        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }


        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Password changed successfully!");
    }

    public function getaddress()
    {
        $collectionuseraddress = UserAddress::where([['userid',Auth::user()->id]])->get();
        return view('user.profile.address')->with(compact('collectionuseraddress'));
    }

    public function orderhistory(Request $request)
    {
        $collectionorder = Order::where([['user_id',Auth()->user()->id]])->orderBy('id', 'DESC')->paginate(10);
        return view('user.orders.order')->with(compact('collectionorder'));
    }

    public function orderdetails($ordercode)
    {
        $singleorder = Order::where([['order_code',$ordercode]])->first();


        $collectionproducts = DB::table('products')
                            ->join('order_products', 'order_products.product_id', '=','products.id')
                            ->join('orders', 'orders.id', '=','order_products.order_id')
                            ->join('payment_details','payment_details.order_id','=','orders.id')
                            ->select('order_products.*','products.*','order_products.quantity as ordered_quantity')
                            ->Where('order_products.order_id','=',"$singleorder->id")
                            ->groupBy('products.mfr')->get();

        $useraddress = UserAddress::where([['userid',Auth()->user()->id]])->get();
        return view('user.orders.orderdetails')->with(compact('singleorder','useraddress','collectionproducts'));
    }

    public function dashboard()
    {
        $ordercollection = Order::where('user_id',Auth()->user()->id)->latest()->limit(3)->get();
        $useraddresses = UserAddress::where([['userid',Auth()->user()->id],['isdefault',true]])->first();
        return view('user.dashboard')->with(compact('ordercollection','useraddresses'));
    }
}
