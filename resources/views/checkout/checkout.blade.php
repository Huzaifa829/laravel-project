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







<div class="block checkout" id="talha-bag-color">


    <!-- <hr> -->
    <hr>
    <!-- <hr> -->

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
                                        <option>Select a country...</option>
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
                                <div class="form-row">
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
                                        <buttonnext onclick="hello()"></buttonnext>
                                    </div>
                                </div>
                            </div>
                            <div class="card-divider"></div>
                            <div v-show="ShowFormTwo" @click="showStepTwo()" id="ShowFormTwo_id" class="card-body card-body--padding--2" style="visibility: none;">
                                <h3 class="card-title">Payment Information</h3>
                                <div class="p-4 mt-4 mb-0 border shadow-none card">
                                    <div class="row">
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
                                                <div class="card-number-frame"></div>
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
                                                <div class="expiry-date-frame"></div>
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
                                                <div class="cvv-frame"></div>
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
                            </div>
                            <All_data v-show="ShowFormThree" @click="showStepThree()"></All_data>
                        </div>
                    </div>
                    <div class="mt-4 col-12 col-lg-6 col-xl-4 mt-lg-0">
                        <div class="mb-0 card">
                            <div class="card-body card-body--padding--2">
                                <h3 class="card-title">Your Order</h3>
                                <table class="checkout__totals">
                                    <thead class="checkout__totals-header">
                                        <tr>
                                            <th style="width: 90px;">Image</th>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody class="checkout__totals-products">
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
                                <button type="submit" class="btn btn-primary btn-label right ms-auto nexttab btn-block" id="shipping-button" disabled>
                                    <i class="align-middle ri-bank-card-line label-icon fs-16 ms-2"></i>View Shipping Options
                                </button>
                                <button type="submit" class="mt-4 btn btn-primary btn-label right ms-auto nexttab" id="pay-button" disabled>
                                    <i class="align-middle ri-bank-card-line label-icon fs-16 ms-2"></i>Complete Order
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>



    <hr>
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
    hello = () => {
        var partOne=document.getElementById('ShowFormOne_id')
        var partTwo=document.getElementById('ShowFormTwo_id')
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
        var phone = document.getElementById('phone')

        
        
        var allData = {
            frsitName: frstName.value,
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
        this.ShowFormOne=false
        partOne.style.display="none"
        partTwo.style.display="block"
        console.log(partOne, 'alldata')
        localStorage.setItem('AllData', JSON.stringify(allData));
        // alert(0)
    }
    //     showStepTwo=()=> {
        //   console.log('12345')
        //   this.showSteptwo()
        // s
    // }
    
    const phoneInputField = document.querySelector("#phone");
    const phoneInput = window.intlTelInput(phoneInputField, {
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",

    });
</script>
<style>
    #talha-bag-color {
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
        justify-content: center;
        align-items: center;
        width: 150px;
        font-size: 14px;
        margin: 0;

    }
</style>


@endsection