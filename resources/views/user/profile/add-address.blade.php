@extends('layout.main')
@section('content')
<div class="block-space block-space--layout--after-header"></div>
<div class="block">
    <div class="container container--mx--xl">
        <div class="row">
            @include('user.layout.menu')
            <div class="mt-4 col-12 col-lg-9 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <h5>Add Deliver Address</h5>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-body card-body--padding--2">
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-10 col-xl-8">
                                <form method="POST" action="{{route('user.add-addressdata')}}">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="address-first-name">First Name</label>
                                            <input type="text" class="form-control" id="address-first-name" name="firstname" value="{{ old('firstname') }}" placeholder="first name" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="address-last-name">Last Name</label>
                                            <input type="text" class="form-control" id="address-last-name" name="lastname" value="{{ old('lastname') }}" placeholder="last name" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="address-company-name">Company
                                            <span class="text-muted">(Optional)</span>
                                        </label>
                                        <input type="text" class="form-control" id="address-company-name" name="company" value="{{ old('company') }}" placeholder="Company name">
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
                                        <label for="address-address1">Street Address</label>
                                        <input type="text" class="form-control" id="address-address1" name="address1" value="{{ old('address1') }}" placeholder="street address" required>
                                        <label for="address-address2" class="sr-only">Street Address</label>
                                        <input type="text" class="mt-2 form-control" id="address-address2" name="address2" value="{{ old('address2') }}" placeholder="Apartment, suite, unit etc.">
                                    </div>
                                    <div class="form-group">
                                        <label for="address-city">City</label>
                                        <input type="text" class="form-control" id="address-city" name="city" value="{{ old('city') }}" placeholder="Dubai" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address-state">State</label>
                                        <input type="text" class="form-control" id="address-state" name="state" value="{{ old('state') }}" placeholder="Dubai" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address-postcode">Postcode</label>
                                        <input type="text" class="form-control" id="address-postcode" name="postcode" value="{{ old('postcode') }}" placeholder="00000" required>
                                    </div>
                                    <div class="form-row">
                                        <div class="mb-0 form-group col-md-12">
                                            <label for="address-phone">Phone Number</label>
                                            <input type="text" class="form-control" id="address-phone" name="phonenumber" value="{{ old('phonenumber') }}" placeholder="+971 52 0000000" required>
                                        </div>
                                    </div>
                                    <div class="mt-3 form-group">
                                        <div class="form-check">
                                            <span class="input-check form-check-input">
                                                <span class="input-check__body">
                                                    <input class="input-check__input" type="checkbox" name="isdefault" id="default-address" value="0">
                                                    <span class="input-check__box"></span>
                                                    <span class="input-check__icon">
                                                        <svg width="9px" height="7px">
                                                            <path d="M9,1.395L3.46,7L0,3.5L1.383,2.095L3.46,4.2L7.617,0L9,1.395Z" />
                                                        </svg>
                                                    </span>
                                                </span>
                                            </span>
                                            <label class="form-check-label" for="default-address">Set as my default address</label>
                                        </div>
                                    </div>
                                    <div class="pt-3 mt-3 mb-0 form-group">
                                        <button class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
@endsection
