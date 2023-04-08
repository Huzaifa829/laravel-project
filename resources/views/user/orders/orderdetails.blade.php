@extends('layout.main')
@section('content')

<div class="block-space block-space--layout--after-header"></div>
<div class="block">
    <div class="container container--max--xl">
        <div class="row">
            @include('user.layout.menu')
            <div class="mt-4 col-12 col-lg-9 mt-lg-0">
                <div class="card">
                    <div class="order-header">
                        <div class="order-header__actions">
                            <a href="{{route('user.orders')}}" class="btn btn-xs btn-secondary">Back to list</a>
                        </div>
                        <h5 class="order-header__title">Order #{{$singleorder->order_code}}</h5>
                        {{-- <div class="order-header__subtitle">Was placed on <mark>Oct 19, 2020</mark> and is currently <mark>Pending</mark>.</div> --}}
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-table">
                        <div class="table-responsive-sm">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="card-table__body card-table__body--merge-rows">
                                    @foreach ($collectionproducts as $product)
                                        <tr>
                                            <td>
                                                <a href="{{ route('single-product',$product->slug ) }}" class="image__body">
                                                    <img class="image__tag" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" alt="{{ $product->title }}" width="50px"/>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('single-product',$product->slug ) }}" style="color: black;">
                                                    {{ $product->title }}
                                                </a>
                                            </td>
                                            <td>{{ $product->ordered_quantity }}</td>
                                            <td>AED {{number_format($product->product_price)}}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                                <tbody class="card-table__body card-table__body--merge-rows">
                                    <tr>
                                        <th>Subtotal</th>
                                        <td>AED {{$singleorder->billing_subtotal}}</td>
                                    </tr>
                                    {{-- <tr>
                                        <th>Shipping</th>
                                        <td>$25.00</td>
                                    </tr> --}}
                                    <tr>
                                        <th>Tax</th>
                                        <td>AED {{$singleorder->tax}}</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Total</th>
                                        <td>AED {{$singleorder->total}}</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mt-3 row no-gutters mx-n2">
                    <div class="px-2 col-sm-6 col-12">
                        <div class="card address-card address-card--featured">
                            <div class="address-card__badge tag-badge tag-badge--theme">Shipping Address</div>
                            <div class="address-card__body">
                                <div class="address-card__name">{{$singleorder->billing_name}}</div>
                                <div class="address-card__row">{{$singleorder->billing_address}}<br>{{$singleorder->billing_city}}<br></div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Phone Number</div>
                                    <div class="address-card__row-content">{{$singleorder->billing_phone}}</div>
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Email Address</div>
                                    <div class="address-card__row-content">{{$singleorder->billing_email}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-2 mt-3 col-sm-6 col-12 mt-sm-0">
                        <div class="card address-card address-card--featured">
                            <div class="address-card__badge tag-badge tag-badge--theme">Billing Address</div>
                            <div class="address-card__body">
                                <div class="address-card__name">{{$singleorder->billing_name}}</div>
                                <div class="address-card__row">{{$singleorder->billing_address}}<br>{{$singleorder->billing_city}}<br></div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Phone Number</div>
                                    <div class="address-card__row-content">{{$singleorder->billing_phone}}</div>
                                </div>
                                <div class="address-card__row">
                                    <div class="address-card__row-title">Email Address</div>
                                    <div class="address-card__row-content">{{$singleorder->billing_email}}</div>
                                </div>
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
