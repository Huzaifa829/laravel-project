@extends('layout.main')
@section('content')
<div class="block-space block-space--layout--after-header"></div>
<div class="block">
    <div class="container container--max--xl">
        <div class="row">
            @include('user.layout.menu')
            <div class="mt-4 col-12 col-lg-9 mt-lg-0">
                <div class="addresses-list">
                    <a href="{{route('user.add-address')}}" class="addresses-list__item addresses-list__item--new">
                        <div class="addresses-list__plus"></div>
                        <div class="btn btn-secondary btn-sm">Add New</div>
                    </a>
                    <div class="addresses-list__divider"></div>
                    @foreach ($collectionuseraddress as $address)
                    <div class="addresses-list__item card address-card">
                        @if ($address->isdefault == true)
                        <div class="address-card__badge tag-badge tag-badge--theme">Default</div>
                        @endif

                        <div class="address-card__body">
                            <div class="address-card__name">{{$address->first_name}} {{$address->last_name}}</div>
                            <div class="address-card__row">{{$address->company_name}} {{$address->address1}}<br>{{$address->address2}}<br>  {{$address->state}} {{$address->city}}
                            </div>
                            <div class="address-card-row">
                                <div class="address-card__row-title">Postal Code</div>
                                <div class="address-card__row-content">{{$address->postalcode}}</div>
                            </div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Phone Number</div>
                                <div class="address-card__row-content">{{$address->phonenumber}}</div>
                            </div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Email Address</div>
                                <div class="address-card__row-content">{{Auth()->user()->email}}</div>
                            </div>
                            <div class="address-card__footer">
                                <a href="{{route('user.edituseraddress',$address->id)}}">Edit</a>&nbsp;&nbsp;
                                <a href="#">Remove</a>
                            </div>
                        </div>
                    </div>
                    <div class="addresses-list__divider"></div>
                    @endforeach


                    {{-- <div class="addresses-list__item card address-card">
                        <div class="address-card__body">
                            <div class="address-card__name">Jupiter Saturnov</div>
                            <div class="address-card__row">RandomLand<br>4b4f53, MarsGrad<br>Sun Orbit, 43.3241-85.239</div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Phone Number</div>
                                <div class="address-card__row-content">ZX 971 972-57-26</div>
                            </div>
                            <div class="address-card__row">
                                <div class="address-card__row-title">Email Address</div>
                                <div class="address-card__row-content">jupiter@example.com</div>
                            </div>
                            <div class="address-card__footer">
                                <a href="#">Edit</a>&nbsp;&nbsp;
                                <a href="#">Remove</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="addresses-list__divider"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>
@endsection
