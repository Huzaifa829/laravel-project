<template>
    <div class="block-header block-header--has-breadcrumb block-header--has-title">
        <div class="container">
            <div class="block-header__body">
                <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb"></nav>
                <h1 class="mt-2 block-header__title">Checkout</h1>
            </div>
        </div>
    </div>


    <div class="block checkout">
        <div class="container container--max--xl">
            <div class="row">
                <div class="mb-3 col-12">
                    <div class="alert alert-lg alert-primary">Returning customer?
                        <a href="{{route('login')}}">Click here to login</a>
                    </div>
                </div>
                <form action="{{route('cart.checkoutpayment')}}" method="POST" id="checkoutform" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-lg-6 col-xl-7">
                            <div class="card mb-lg-0">
                                <div class="card-body card-body--padding--2">
                                    <h3 class="card-title">Billing details</h3>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="checkout-first-name">First Name</label>
                                            <input type="text" class="form-control" name="firstname" id="checkout-first-name" value="{{ old('firstname') }}" placeholder="First Name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="checkout-last-name">Last Name</label>
                                            <input type="text" class="form-control" name="lastname" id="checkout-last-name" value="{{ old('lastname') }}" placeholder="Last Name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-company-name">Company Name
                                            <span class="text-muted">(Optional)</span>
                                        </label>
                                        <input type="text" class="form-control" name="companyname" id="checkout-company-name" value="{{ old('companyname') }}" placeholder="Company Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-country">Country</label>
                                        <select id="checkout-country" class="form-control form-control-select2" name="country" required>
                                            <option>Select a country...</option>
                                            @foreach ($collectioncountries as $country)
                                            <option value="{{$country->id}}" {{ (old("country") == $country->id ? "selected":"") }}>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-street-address">Street Address</label>
                                        <input type="text" class="form-control" name="streetaddress" value="{{ old('streetaddress') }}" id="checkout-street-address" placeholder="Street Address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-address">Apartment, suite, unit etc.<span class="text-muted">(Optional)</span></label>
                                        <input type="text" class="form-control" name="apartmentno" value="{{ old('apartmentno') }}" id="checkout-address">
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-city">Town / City</label>
                                        <input type="text" class="form-control" name="city" value="{{ old('city') }}" id="checkout-city" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-state">State / County</label>
                                        <input type="text" class="form-control" name="state" value="{{ old('state') }}" id="checkout-state" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="checkout-postcode">Postcode / ZIP</label>
                                        <input type="text" class="form-control" name="postalcode" value="{{ old('postalcode') }}" id="checkout-postcode" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="checkout-email">Email address</label>
                                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="checkout-email" placeholder="Email address" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="checkout-phone">Phone</label>
                                            <input type="tel" class="form-control" name="phone" value="{{ old('phone') }}" id="checkout-phone" placeholder="xxx-xxxxxxx" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-divider"></div>
                                <div class="card-body card-body--padding--2">
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
                                                        <img id="icon-card-number" src="{{ URL::asset('payment/images/card-icons/card.svg')}}" alt="PAN"/>
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
                                                        <img id="icon-expiry-date" src="{{URL::asset('payment/images/card-icons/exp-date.svg')}}" alt="Expiry date"/>
                                                    </div>
                                                    <div class="expiry-date-frame"></div>
                                                    <div class="icon-container">
                                                        <img id="icon-expiry-date-error" src="{{URL::asset('payment/images/card-icons/error.svg')}}"/>
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
                            </div>
                        </div>
                        <div class="mt-4 col-12 col-lg-6 col-xl-5 mt-lg-0">
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
                                            <tr>
                                                <td>
                                                    <div class="p-1 rounded avatar-md bg-light">
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
                                                    <input class="input-check__input" type="checkbox" id="checkout-terms">
                                                    <span class="input-check__box"></span>
                                                    <span class="input-check__icon">
                                                        <svg width="9px" height="7px">
                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="checkout-terms">I have read and agree to the website
                                                <a target="_blank" href="terms.html">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-label right ms-auto nexttab" id="pay-button" disabled>
                                        <i class="align-middle ri-bank-card-line label-icon fs-16 ms-2"></i>Complete Order
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="block-space block-space--layout--before-footer"></div>
</template>
