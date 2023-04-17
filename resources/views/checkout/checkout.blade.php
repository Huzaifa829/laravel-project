@extends('layout.main')
@section('stylesheet')
<link rel="stylesheet" href="{{URL::asset('payment/normalize.css')}}" />
<link rel="stylesheet" href="{{URL::asset('payment/style.css')}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<style>
    .iti {
        width: inherit;
    }
</style>
@endsection
@section('content')
<div class="block checkout" id="main-bg-color">
    <!-- <hr>
    <hr>
    <hr> -->
    <div class="container container--max--xl">
        <div class="row">
            @if (!auth()->user())
            <div class="mb-3 col-12">
                <div class="alert alert-lg alert-primary">Returning customer?
                    <a href="{{route('login')}}">Click here to login</a>
                </div>
            </div>
            @endif
            <form action="{{route('cart.checkoutpayment')}}" method="POST" id="checkoutform" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-8">
                        <!-- <shippinginfo></shippinginfo> -->
                        <div class="card mb-lg-0">
                            <div v-show="ShowFormOne" @click="showStepOne()" id="ShowFormOne_id" class="card-body card-body--padding--2">
                                <h3 class="card-title">Billing details</h3>
                                <div class="form-colum">
                                    @if (auth()->user()->firstname)
                                    <div class="form-group col-md-7 d-flex">
                                        <label class="name-text-frst" for="checkout-first-name">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="first-name" value="{{ auth()->user()->firstname }}" placeholder="First Name" required>
                                    </div>
                                    @else
                                    <div class="form-group col-md-7 d-flex">
                                        <label class="name-text-frst" for="checkout-first-name">First Name</label>
                                        <input type="text" class="form-control" name="firstname" id="first-name" value="{{ old('firstname') }}" placeholder="First Name" required>
                                    </div>
                                    @endif

                                    @if (auth()->user()->lastname)
                                    <div class="form-group col-md-7 d-flex">
                                        <label class="name-text-frst" for="checkout-last-name">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="last-name" value="{{ auth()->user()->lastname }}" placeholder="Last Name" required>
                                    </div>
                                    @else
                                    <div class="form-group col-md-7 d-flex">
                                        <label class="name-text-frst" for="checkout-last-name">Last Name</label>
                                        <input type="text" class="form-control" name="lastname" id="last-name" value="{{ old('lastname') }}" placeholder="Last Name" required>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-company-name">Company Name
                                        <!-- <span class="text-muted">(Optional)</span>x -->
                                    </label>
                                    <input type="text" class="form-control" name="companyname" id="company-name" value="{{ old('companyname') }}" placeholder="Company Name(Optional)">
                                </div>
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-country">Country</label>
                                    <select id="checkout-country" class="form-control form-control-select2" name="country" required>
                                        <option>Select a country</option>
                                        @foreach ($collectioncountries as $country)
                                        <option value="{{$country->id}}" {{ (old("country") == $country->id ? "selected":"") }}>{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-street-address">Street Address</label>
                                    <input type="text" class="form-control" name="streetaddress" value="{{ old('streetaddress') }}" id="street-address" placeholder="Street Address" required>
                                </div>
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-address">Street Address2
                                        <!-- <span class="text-muted">(Optional)</span> -->
                                    </label>
                                    <input type="text" placeholder="Apartment, suite, unit etc.(Optional)" class="form-control" name="apartmentno" value="{{ old('apartmentno') }}" id="address">
                                </div>
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-city">Town / City</label>
                                    <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="city" required>
                                </div>
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-state">State / County</label>
                                    <input type="text" class="form-control" name="state" value="{{ old('state') }}" id="state" required>
                                </div>
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-postcode">Postcode / ZIP</label>
                                    <input type="text" class="form-control" name="postalcode" value="{{ old('postalcode') }}" id="postcode" required>
                                </div>
                                <!-- <div class="form-row"> -->
                                @if (auth()->user()->email)
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-email">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}" id="email" placeholder="Email address" required>
                                </div>
                                @else
                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-email">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Email address" required>
                                </div>
                                @endif

                                <div class="form-group col-md-7 d-flex">
                                    <label class="name-text-frst" for="checkout-phone">Phone</label>
                                    <input id="phone" type="tel" name="phone" value="{{ old('phone') }}" class="form-control" required />
                                </div>
                                <div class="btn-form-main-div">
                                    <!-- Form button go to set two -->
                                    <!-- <buttonnext onclick="hello()"></buttonnext> -->
                                    <buttonnext onclick="hello()">next</buttonnext>
                                </div>
                                <!-- </div> -->
                            </div>
                            <!-- ASDKFLKASDFLASD -->
                            <div class="card-divider"></div>
                            <!-- shiping fuull summary -->
                            {{-- shopping info --}}

                                <div id="all-shiping-amout-detail" class="hello-world shiping-mainsetting">
                                    <div class="card-body mz-here card-body--padding--2" style="">
                                        <h3 class="card-title">Shipping Information</h3>
                                        <div class="mt-4 mb-4 mz_shipping">
                                            <div class="form-group">
                                                <input type="radio" class="shipping_options" name="shipping_options" id="in1" />
                                                Express Domestic 12:00 <span id="span1" style="margin-left: 10px"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" class="shipping_options" name="shipping_options" id="in2" />
                                                Express
                                                Domestic <span id="span2" style="margin-left: 10px"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" class="shipping_options" name="shipping_options" id="in3" />
                                                Express Easy
                                                Doc <span id="span3" style="margin-left: 10px"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="radio" class="shipping_options" name="shipping_options" id="in4" />
                                                Citylane <span id="span4" style="margin-left: 10px"></span>
                                            </div>
                                        </div>
                                        <div class="p-4 mt-4 mb-0 border shadow-none card" style="
                                                    flex-direction: row;
                                                    justify-content: space-between;
                                                    padding: 0 !important;
                                                ">
                                            <table class="checkout__totals" style="width: 60%; margin: 0 !important">
                                                <thead class="checkout__totals-header">
                                                    <tr>
                                                        <th style="width: 90px; padding: 10px">Image</th>
                                                        <th style="padding: 10px">Product</th>
                                                        <th style="padding: 10px">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="checkout__totals-products  ha-display-none">
                                                    @foreach (Cart::content() as $item)
                                                    <input type="hidden" id="weight[]" name="weight[]" value="{{ $item->model->weight }}">
                                                    <input type="hidden" id="length[]" name="length[]" value="{{ $item->model->length }}">
                                                    <input type="hidden" id="width[]" name="width[]" value="{{ $item->model->width }}">
                                                    <input type="hidden" id="height[]" name="height[]" value="{{ $item->model->height }}">
                                                    <tr>
                                                        <td>
                                                            <div class="p-1 rounded avatar-md">
                                                                <img src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $item->model->thumbnail }}" alt="{{ $item->model->title }}" class="img-fluid d-block">
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{ $item->model->title }}
                                                            <p class="mb-0 text-muted">AED
                                                                {{ number_format($item->model->price) }} x {{ $item->qty }}
                                                            </p>
                                                        </td>
                                                        <td>{{ number_format($item->model->price * $item->qty) }}&nbspAED
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <table class="checkout__totals" style="
                                                        width: 40%;
                                                        margin: 0 !important;
                                                        background: #fff6ea;
                                                        padding: 20px !important;
                                                        display: flex;
                                                        flex-direction: column;
                                                    ">
                                                 <tbody class="checkout__totals-subtotals">
                                                    <tr>
                                                        <th colspan="2" style="border-top: 0">Subtotal</th>
                                                        <td style="border-top: 0">{{ Cart::subtotal() }}&nbspAED</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2">
                                                            Shipping Fee (DHL)
                                                        </th>
                                                        <td style="border-top: 0">100.00&nbsp;AED</td>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2" style="border-top: 0">VAT</th>
                                                        <td style="border-top: 0">{{ Cart::tax() }}&nbspAED</td>
                                                    </tr>
                                                </tbody>
                                                <tfoot class="checkout__totals-footer" style="font-size: 20px">
                                                    <tr>
                                                        <th colspan="2">Total</th>
                                                        <td><span id="cartTotal">{{ Cart::total() }}</span>&nbspAED</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            

                            <div v-show="ShowFormTwo" @click="showStepTwo()" id="ShowFormTwo_id" class="card-body card-body--padding--2">
                                <h3 class="card-title">Payment Information</h3>
                                <div class="p-4 mt-4 mb-0 border shadow-none card">
                                    <div class="ha_row_payment">
                                        <div class="col-md-12">
                                            <label for="card-ownername" class="form-label">Card Name</label>
                                            <input type="text" class="form-control" id="billing-cardname" name="cardname" placeholder="Card Name" requireds>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="card-number" class="form-label">Credit card number</label>
                                            <div class="input-container card-number">
                                                <div class="icon-container">
                                                    <img id="icon-card-number" src="{{ URL::asset('payment/images/card-icons/card.svg')}}" alt="PAN" />
                                                </div>
                                                <div id="get-class-ha1" class="card-number-frame"></div>
                                                <div class="icon-container payment-method">
                                                    <img id="logo-payment-method" />
                                                </div>
                                                <div class="icon-container">
                                                    <img id="icon-card-number-error" src="{{ URL::asset('payment/images/card-icons/error.svg')}}" />
                                                </div>
                                            </div>
                                            <span class="error-message error-message__card-number"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cc-expiration" class="form-label">Expiration</label>
                                            <div class="input-container expiry-date">
                                                <div class="icon-container">
                                                    <img id="icon-expiry-date" src="{{URL::asset('payment/images/card-icons/exp-date.svg')}}" alt="Expiry date" />
                                                </div>
                                                <div id="get-class-ha2" class="expiry-date-frame"></div>
                                                <div class="icon-container">
                                                    <img id="icon-expiry-date-error" src="{{URL::asset('payment/images/card-icons/error.svg')}}" />
                                                </div>
                                            </div>
                                            <span class="error-message error-message__expiry-date"></span>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="cc-cvv" class="form-label">CVV</label>
                                            <div class="input-container cvv">
                                                <div class="icon-container">
                                                    <img id="icon-cvv" src="{{URL::asset('payment/images/card-icons/cvv.svg')}}" alt="CVV" />
                                                </div>
                                                <div id="get-class-ha3" class="cvv-frame"></div>
                                                <div class="icon-container">
                                                    <img id="icon-cvv-error" src="{{URL::asset('payment/images/card-icons/error.svg')}}" />
                                                </div>
                                            </div>
                                            <span class="error-message error-message__cvv"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-2 text-muted fst-italic">
                                    <i data-feather="lock" class="text-muted icon-xs"></i> Your transaction is secured with SSL encryption
                                </div>
                                <div class="btn-form-main-div">
                                    <!-- Form button go to set two -->
                                    <button type="button" class="ha-payment_btn" onclick="ha_payment_method()">Continue Next Page</button>
                                </div>
                            </div>
                            <div v-show="ShowFormThree" id="thrid-part-ha" class="ship-double-main">
                                <!-- <div > -->
                                <div class="ship-main-part">
                                    <div class="ship-detail-head">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="#f2aa4c" class="bi bi-truck icon-setting" viewBox="0 0 16 16">
                                            <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                        </svg>
                                        <p class="ship-detail-head-text">Ship To</p>
                                    </div>
                                    <div class="ship-detail-add-div">
                                        <div class="ship-name-head">
                                            <p id="ship-frist-name" class="ship-name-text">Huzaifa Ahmed</p>
                                            <button class="ship-change-button">Change</button>
                                        </div>
                                        <p id="ship-Street-Adress" class="ship-address">Street Address</p>
                                        <p id="ship-Adress" class="ship-address">Address</p>
                                        <p id="ship-areaPostAll">Karachi,State,postcode,country</p>
                                    </div>
                                </div>
                                <div class="ship-main-part">
                                    <div class="ship-detail-head">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="#f2aa4c" class="bi bi-credit-card-2-back-fill icon-setting" viewBox="0 0 16 16">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v5H0V4zm11.5 1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h2a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-2zM0 11v1a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-1H0z" />
                                        </svg>
                                        <p class="ship-detail-head-text">Payment</p>
                                    </div>
                                    <div class="ship-detail-add-div">
                                        <div class="ship-name-head">
                                            <p class="ship-name-text">*****4242 Exp:06/27</p>
                                            <button class="ship-change-button">Change</button>
                                        </div>
                                        <p id="shpping-full-detail" class="ship-address">Billing Address:huzaifaAhmed,Fulladress</p>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="mt-4 col-12 col-lg-6 col-xl-4 mt-lg-0">
                        <div class="mb-0 card">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Your Order Test</h3>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header ha-display-none">
                                        <tr>
                                            <th style="width: 90px;">Image</th>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products ha-display-none">
                                        @foreach (Cart::content() as $item)
                                        <input type="hidden" id="weight[]" name="weight[]" value="{{$item->model->weight}}">
                                        <input type="hidden" id="length[]" name="length[]" value="{{$item->model->length}}">
                                        <input type="hidden" id="width[]" name="width[]" value="{{$item->model->width}}">
                                        <input type="hidden" id="height[]" name="height[]" value="{{$item->model->height}}">
                                        <tr>
                                            <td>
                                                <div class="p-1 rounded avatar-md">
                                                    <img src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $item->model->thumbnail }}" alt="{{$item->model->title}}" class="img-fluid d-block">
                                                </div>
                                            </td>
                                            <td>
                                                {{$item->model->title}}
                                                <p class="mb-0 text-muted">AED {{number_format($item->model->price)}} x {{$item->qty}}</p>
                                            </td>
                                            <td>{{number_format(($item->model->price)*($item->qty))}}&nbspAED</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th colspan="2">Subtotal</th>
                                            <td>{{Cart::subtotal()}}&nbspAED</td>
                                        </tr>
                                        <tr>
                                            <th colspan="2">VAT</th>
                                            <td>{{Cart::tax()}}&nbspAED</td>
                                        </tr>
                                    </tbody>
                                    <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th colspan="2">Total</th>
                                            <td>{{Cart::total()}}&nbspAED</td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <div class="form-group">
                                    <label for="checkout-comment">Order notes <span class="text-muted">(Optional)</span></label>
                                    <textarea id="checkout-comment" class="form-control" name="specialnotes" rows="4"></textarea>
                                </div>
                                <div class="checkout__agree form-group">
                                    <div class="form-check">
                                        <span class="input-check form-check-input">
                                            <span class="input-check__body">
                                                <input class="input-check__input" type="checkbox" id="checkout-terms" checked>
                                                <span class="input-check__box"></span>
                                                <span class="input-check__icon">
                                                    <svg width="9px" height="7px">
                                                        <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                    </svg>
                                                </span>
                                            </span>
                                        </span>
                                        <label class="form-check-label" for="checkout-terms">I have read and agree to the website
                                            <a target="_blank" href="{{route('terms')}}">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-label right ms-auto nexttab btn-block" id="shipping-button" style="display: none;">
                                    <i class="align-middle ri-bank-card-line label-icon fs-16 ms-2"></i>View Shipping Options
                                </button>
                                <button type="submit" class="mt-4 btn btn-primary btn-label right ms-auto nexttab" id="pay-button">
                                    <i class="align-middle ri-bank-card-line label-icon fs-16 ms-2"></i>Complete Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- <hr> -->
</div>
@if(Route::current()->getName() == 'cart.checkoutorder')
@else
<div class="block-space block-space--layout--before-footer"></div>
@endif
@endsection
@section('scripts')
<script src="https://cdn.checkout.com/js/framesv2.min.js"></script>
<script src="{{ URL::asset('payment/app.js')}}"></script>
<script>

    $('.shipping_options').on('click', function(e) {
        let price = $(this).val();
        let total = $("#cartTotal").text();
        $.ajax({
            type: "get",
            url: 'getshippingPirce',
            data: {
                Price: price,
            },
            success: function(response) {
                console.log(response);
                $("#cartTotal").text(response);
            }
        });
    });

    var payment_last_complt_btn = document.getElementById('pay-button');
    payment_last_complt_btn.style.disabled = 'disabled';
    var Headr_btn2 = document.getElementById("abc2");
    var Headr_btn3 = document.getElementById("abc3");
    var all_shiping_detail = document.getElementById("all-shiping-amout-detail");
    all_shiping_detail.style.display = 'none';
    Headr_btn2.disabled = true;
    Headr_btn3.disabled = true;
    Show_summary = () => {

        var x = JSON.parse(localStorage.getItem('AllData'));
        frstName = $(this).attr("ship-frist-name");
        StreetAddress = $(this).attr("ship-Street-Adress");
        Address = $(this).attr("ship-Adress");
        FullAddress = $(this).attr("ship-areaPostAll");
        Fulldetail = $(this).attr("shpping-full-detail");
        frstName.innerHTML = `${x.frstName} ${x.lastName}`;
        StreetAddress.innerHTML = x.streetAddress;
        Address.innerHTML = x.address;
        FullAddress.innerHTML = `${x.city},${x.state},${x.postcode},${x.countryName}`;
        Fulldetail.innerHTML = `Billing Address:${x.frstName} ${x.lastName},${x.city},${x.state},${x.postcode},${x.countryName},${x.phone}`;
        console.log('summary run', x);
    }
    // Show_summary();

    // payment method btn function 
    ha_payment_method = () => {
        var checkClass1 = document.getElementById('get-class-ha1');
        var checkClass2 = document.getElementById('get-class-ha2');
        var checkClass3 = document.getElementById('get-class-ha3');
        var partTwo = document.getElementById('ShowFormTwo_id');
        var partThird = document.getElementById('thrid-part-ha');
        checkname = $(this).attr("billing-cardname");
        var heloo3 = document.getElementById("abc3");
        var heloo2 = document.getElementById("abc2");
        var heloo = document.getElementById("abc");
        console.log(checkname.value);
        if (checkname.value === '') {
            checkname.style.border = "1px solid red";
        } else {
            if (checkClass1.className == "card-number-frame frame--activated frame--valid" && checkClass2.className == "expiry-date-frame frame--activated frame--valid" && checkClass3.className == "cvv-frame frame--activated frame--valid") {
                console.log("true");
                partTwo.style.display = "none";
                partThird.style.display = "flex";
                heloo3.classList.add("mainbtn");
                heloo3.classList.remove("main-btn-1");

                heloo2.classList.add("main-btn-1");
                heloo2.classList.remove("mainbtn");

                heloo.classList.add("main-btn-1");
                heloo.classList.remove("mainbtn");
                Headr_btn3.disabled = false;
                var arrangement = document.getElementById('thrid-part-ha');
                arrangement.style.order = '-1';
                window.scrollTo(0, 0);
                var payment_last_complt_btn = document.getElementById('pay-button');
                payment_last_complt_btn.style.disabled = 'disabled';


            }
        }

    }


    hello = () => {


        let country = $('#checkout-country option:selected').attr('data-shortname');
        let cityName = $("#city").val();
        let postCode = $('#postcode').val();

        $.ajax({
            type: "get",
            url: 'getCartDetail',
            // url: `http://localhost/store-main/public/api/getSingleShipment?length=14&width=9.5&height=1&weight=0.5&country=${country}&city=${cityName}`,
            data: {
                countrycode: country,
                cityname: cityName,
                postalcode: postCode,

            },
            // dataType: 'JSON',
            success: function(response) {

                var data = JSON.parse(response);

                $('#span1').text("(AED: " + data['products'][0]['totalPrice'][0]['price'] + " )");
                $('#span2').text("(AED: " + data['products'][1]['totalPrice'][0]['price'] + " )");
                $('#span3').text("(AED: " + data['products'][2]['totalPrice'][0]['price'] + " )");
                $('#span4').text("(AED: " + data['products'][3]['totalPrice'][0]['price'] + " )");
                $('#in1').val(data['products'][0]['totalPrice'][0]['price']);
                $('#in2').val(data['products'][1]['totalPrice'][0]['price']);
                $('#in3').val(data['products'][2]['totalPrice'][0]['price']);
                $('#in4').val(data['products'][3]['totalPrice'][0]['price']);

            }
        })


        var partOne = document.getElementById('ShowFormOne_id')
        var partTwo = document.getElementById('ShowFormTwo_id')
        var frstName = document.getElementById('first-name')
        var lastName = document.getElementById('last-name')
        var companyName = document.getElementById('company-name')
        var countryName = document.getElementById('checkout-country')
        var streetAddress = document.getElementById('street-address')
        var address = document.getElementById('address')
        var city = document.getElementById('city')
        var state = document.getElementById('state')
        var postcode = document.getElementById('postcode')
        var email = document.getElementById('email')
        var show = false
        var phone = document.getElementById('phone')
        var heloo3 = document.getElementById("abc3");
        var heloo2 = document.getElementById("abc2");
        var heloo = document.getElementById("abc");
        // var checking=document.getElementById('abc3')

        //data all get form input feild

        var allData = {
            frstName: frstName,
            lastName: lastName,
            companyName: companyName,
            countryName: countryName,
            streetAddress: streetAddress,
            address: address,
            city: city,
            state: state,
            postcode: postcode,
            email: email,
            phone: phone
        }

        //its an empty aray for logic of false array push

        var aray = []

        function part1(a) {
            a.style.border = '1px solid red';
            aray.push(show = false)

        }

        function part2(a) {
            a.style.border = ' 1px solid #ebebeb'
            show = true
        }


        (allData.frstName.value == '.') ? part1(allData.frstName): part2(allData.frstName),
            (allData.lastName.value == '') ? part1(allData.lastName) : part2(allData.lastName),
            // (allData.companyName.value == '') ? part1(allData.companyName) : part2(allData.companyName),
            (allData.countryName.options[countryName.selectedIndex].text == 'Select a country') ? part1(allData.countryName) : part2(allData.countryName),
            (allData.streetAddress.value == '') ? part1(allData.streetAddress) : part2(allData.streetAddress),
            (allData.address.value == '') ? part1(allData.address) : part2(allData.address),
            (allData.city.value == '') ? part1(allData.city) : part2(allData.city),
            (allData.state.value == '') ? part1(allData.state) : part2(allData.state),
            (allData.postcode.value == '') ? part1(allData.postcode) : part2(allData.postcode),
            (allData.email.value == '') ? part1(allData.email) : part2(allData.email),
            (allData.phone.value == '') ? part1(allData.phone) : part2(allData.phone)

        //data is save in local storage ===>

        if (aray.length == 0) {
            var all_Data_local = {
                frstName: frstName.value,
                lastName: lastName.value,
                companyName: companyName.value,
                countryName: countryName.options[countryName.selectedIndex].text,
                streetAddress: streetAddress.value,
                address: address.value,
                city: city.value,
                state: state.value,
                postcode: postcode.value,
                email: email.value,
                phone: phone.value
            }
            partTwo.style.display = "block"
            partOne.style.display = "none"
            localStorage.setItem('AllData', JSON.stringify(all_Data_local));
            heloo3.classList.add("main-btn-1");
            heloo3.classList.remove("mainbtn");

            heloo2.classList.add("mainbtn");
            heloo2.classList.remove("main-btn-1");

            heloo.classList.add("main-btn-1");
            heloo.classList.remove("mainbtn");
            Headr_btn2.disabled = false;
            var all_shiping_detail = document.getElementById("all-shiping-amout-detail");
            all_shiping_detail.style.display = 'flex'
            window.scrollTo(0, 0);
            Show_summary()
        }





    }


    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

    });
</script>
<style>

    div#main-bg-color {
        padding: 3em 0;
    }
    div#thrid-part-ha {
        justify-content: space-between;
    }
    form#checkoutform {
        width: 100% !important;
    }
    div#main-bg-color {
        padding: 3em 0;
    }

    div#all-shiping-amout-detail {
        background: white;
    }

    .card.mb-lg-0 {
        box-shadow: none !important;
    }

    .ship-main-part {
        margin-bottom: 1em;
    }

    .ship-detail-add-div {
        border: 0;
    }
    .mz-here {
        background: white;
        margin-bottom: 2em;
    }
    .ha-display-none {
        display: none;
        border: none;
    }

    #main-bg-color {
        background-color: #e7e7e7;
    }

    .btn-form-main-div {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 50px;
    }

    .name-text-frst {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        width: 165px;
        font-size: 14px;
        margin: 0;
    }

    .ha-payment_btn {
        width: 40%;
        height: 100%;
        background-color: #f2aa4cff;
        border: none;
        border-radius: 5px;
        font-family: sans-serif;
        font-weight: 600;
        color: white;
        /* font-size: x-large; */
    }

    .all-shiping-main {
        width: 100%;
        margin-bottom: 20px;
        margin-top: 20px;
        /* height: 100px; */
        background-color: white;
    }

    .shiping-mainsetting {
        background-color: rgb(231, 231, 231);
    }

    .ha_row_payment {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-wrap: wrap;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        margin-bottom: 10px;
    }

    .ship-double-main {
        background-color: #e7e7e7;
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
    }

    .ship-main-part {
        width: 356px;
    }

    .ship-main-div {
        width: 80%;
        height: auto;
        /* background-color: aqua; */
    }

    .ship-detail-div {
        width: 100%;
        height: 100%;
        /* background-color: aquamarine; */
    }

    .ship-detail-head-text {
        text-align: center;
        width: auto;
        margin-left: 10px;
        color: #000000;
        margin-bottom: 0px;
        font-size: 35px;
        font-family: "Segoe UI";
        font-weight: 300;
    }

    .ship-detail-head {
        display: flex;
        align-items: center;
        background-color: #e7e7e7;
    }

    .ship-detail-add-div {
        background-color: white;

        border: 1px solid rgb(172, 172, 172);
        padding: 30px;
        width: 100%;
        height: 150px;
        /* height: 100px; */
        /* background-color: rgb(243, 233, 233); */
    }

    .ship-name-head {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .ship-name-text {
        margin: 0;
    }

    .ship-change-button {
        background-color: white;
        border: none;
        color: #f2aa4cff;
    }

    .ship-address {
        margin: 0;
    }

    .ha-alldetail-styling {
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
        padding: 0 !important;
    }

    .ha-alldetail-styling-part1 {
        width: 60%;
        margin: 0 !important
    }

    .ha-alldetail-styling-part2 {
        width: 40%;
        margin: 0 !important;
        background: #fff6ea;
        padding: 20px !important;
        display: flex;
        flex-direction: column;
    }

    @media only screen and (max-width: 767px) {
        form#checkoutform {
            width: 100% !important;
        }

        .mz-here {
            margin-bottom: 0;
        }

        .mz-here table.checkout__totals {
            width: 100% !important;
        }

        .mz-here .p-4.mt-4.mb-0.border.shadow-none.card {
            flex-direction: column !important;
        }
        .ship-main-part {
            width: 100%;
            margin: 10px;
        }

        .icon-setting {
            margin-left: 6px;
        }
    }

    @media only screen and (max-width: 500px) {
        .ha-payment_btn {
            width: 70%;

        }

        @media only screen and (max-width: 460px) {
            .ha-alldetail-styling-part1 {
                width: 100%;
            }

            .ha-alldetail-styling-part2 {
                width: 100%;

            }
        }
    }
</style>
@endsection