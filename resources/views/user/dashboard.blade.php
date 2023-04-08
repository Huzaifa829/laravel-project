@extends('layout.main')
@section('content')

<div class="block-space block-space--layout--after-header"></div>
<div class="block">
    <div class="container container--max--xl">
        <div class="row">
            @include('user.layout.menu')
            <div class="mt-4 col-12 col-lg-9 mt-lg-0">
                <div class="dashboard">
                    <div class="dashboard__profile card profile-card">
                        <div class="card-body profile-card__body">
                            <div class="profile-card__avatar">
                                <img src="{{URL::asset('assets/logo/user.png')}}" alt="">
                            </div>
                            <div class="profile-card__name">{{ Auth()->user()->firstname }} {{ Auth()->user()->lastname }}</div>
                            <div class="profile-card__email">{{ Auth()->user()->email }}</div>
                            <div class="profile-card__edit">
                                <a href="{{ route('user.profile') }}" class="btn btn-secondary btn-sm">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                    @if ($useraddresses)
                        <div class="dashboard__address card address-card address-card--featured">
                            <div class="address-card__badge tag-badge tag-badge--theme">Default</div>
                            <div class="address-card__body">
                                <div class="address-card__name">{{ $useraddresses->first_name." ".$useraddresses->last_name }}</div>
                                <div class="address-card__row">{{$useraddresses->address1}}<br>{{$useraddresses->address2}}<br>{{$useraddresses->city}} {{$useraddresses->state}}
                                </div>
                                <div class="addredd-card__row">
                                    <div class="address-card__row-title">Postal Code</div>
                                    <div class="address-card__row-content">{{$useraddresses->postalcode}}</div>
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Phone Number</div>
                                    <div class="address-card__row-content"> {{ $useraddresses->phonenumber }}</div>
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Email Address</div>
                                    <div class="address-card__row-content">{{ Auth()->user()->email }}</div>
                                </div>
                                <div class="address-card__footer"><a href="#">Edit Address</a></div>
                            </div>
                        </div>
                    @endif

                    @if (!$ordercollection->isEmpty())
                    <div class="dashboard__orders card">
                        <div class="card-header">
                            <h5>Recent Orders</h5>
                        </div>
                        <div class="card-divider"></div>
                        <div class="card-table">
                            <div class="table-responsive-sm">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($ordercollection as $order)
                                        <tr>
                                            <td><a href="{{ route('user.orderdetails', $order->order_code) }}">#{{$order->order_code}}</a></td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td>AED {{$order->total}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>

@endsection
