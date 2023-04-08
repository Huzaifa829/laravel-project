@extends('layout.main')
@section('content')
    {{-- @php
        dd($order);
    @endphp --}}
<div class="block-space block-space--layout--spaceship-ledge-height"></div>
<div class="block order-success">
    <div class="container">
        <div class="order-success__body">
            <div class="order-success__header">
                <div class="order-success__icon">
                    <svg width="100" height="100">
                        <path d="M50,100C22.4,100,0,77.6,0,50S22.4,0,50,0s50,22.4,50,50S77.6,100,50,100z M50,2C23.5,2,2,23.5,2,50s21.5,48,48,48s48-21.5,48-48S76.5,2,50,2z M44.2,71L22.3,49.1l1.4-1.4l21.2,21.2l34.4-34.4l1.4,1.4L45.6,71C45.2,71.4,44.6,71.4,44.2,71z" />
                    </svg>
                </div>
                <h1 class="order-success__title">Thank you</h1>
                <div class="order-success__subtitle">Your order has been received</div>
                <div class="order-success__actions">
                    <a href="/" class="btn btn-sm btn-secondary">Go To Homepage</a>
                </div>
            </div>
            <div class="card order-success__meta">
                <ul class="order-success__meta-list">
                    <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Order number:</span>
                        <span class="order-success__meta-value">#{{$order->order_code}}</span>
                    </li>
                    {{-- <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Created At:</span>
                        <span class="order-success__meta-value">{{$order->requested_on}}</span>
                    </li> --}}
                    <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Total:</span>
                        <span class="order-success__meta-value">AED {{$order->total}}</span>
                    </li>
                    <li class="order-success__meta-item">
                        <span class="order-success__meta-title">Payment Method:</span>
                        <span class="order-success__meta-value">Visa/Debit/Master Card</span>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="order-list">
                    <table>
                        <thead class="order-list__header">
                            <tr>
                                <th class="order-list__column-label" colspan="2">Product</th>
                                <th class="order-list__column-quantity">Quantity</th>
                                <th class="order-list__column-total">Total</th>
                            </tr>
                        </thead>
                        <tbody class="order-list__products">
                            @foreach ($collectionproducts as $product)
                            <tr>
                                <td class="order-list__column-image">
                                    <div class="image image--type--product">
                                        <a href="{{ route('single-product', $product->slug) }}" class="image__body">
                                            <img class="image__tag" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" alt="">
                                        </a>
                                    </div>
                                </td>
                                <td class="order-list__column-product">
                                    <a href="{{ route('single-product', $product->slug) }}">{{$product->title}}</a>
                                    <div class="order-list__options">
                                        <ul class="order-list__options-list">
                                            @if ($product->mfr)
                                            <li class="order-list__options-item">
                                                <span class="order-list__options-label">MFR: </span>
                                                <span class="order-list__options-value">{{$product->mfr}}</span>
                                            </li>
                                            @endif
                                            @if ($product->sku)
                                            <li class="order-list__options-item">
                                                <span class="order-list__options-label">SKU: </span>
                                                <span class="order-list__options-value">{{$product->sku}}</span>
                                            </li>
                                            @endif

                                        </ul>
                                    </div>
                                </td>
                                <td class="order-list__column-quantity" data-title="Quantity:">{{$oproduct->ordered_quantity}}</td>
                                <td class="order-list__column-total">AED {{number_format($product->product_price)}}</td>
                            </tr>

                            @endforeach

                            </tbody>
                            <tbody class="order-list__subtotals">
                                <tr>
                                    <th class="order-list__column-label" colspan="3">Subtotal</th>
                                    <td class="order-list__column-total">AED {{$order->billing_subtotal}}</td>
                                </tr>
                                {{-- <tr>
                                    <th class="order-list__column-label" colspan="3">Shipping</th>
                                    <td class="order-list__column-total">$25.00</td>
                                </tr> --}}
                                <tr>
                                    <th class="order-list__column-label" colspan="3">Tax</th>
                                    <td class="order-list__column-total">AED {{$order->tax}}</td>
                                </tr>
                            </tbody>
                            <tfoot class="order-list__footer">
                                <tr>
                                    <th class="order-list__column-label" colspan="3">Total</th>
                                    <td class="order-list__column-total">AED {{$order->total}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="order-success__addresses">
                    <div class="order-success__address card address-card">
                        <div class="address-card__badge tag-badge tag-badge--theme">Shipping Address</div>
                        <div class="address-card__body">
                            <div class="address-card__name">{{$order->billing_name}}</div>
                            <div class="address-card__row">{{$order->billing_address}}<br>{{$order->billing_city}}<br>{{$order->billing_provice}}</div>
                            <div class="address-card__row"><div class="address-card__row-title">Phone Number</div>
                            <div class="address-card__row-content">{{$order->billing_phone}}</div>
                        </div>
                        <div class="address-card__row">
                            <div class="address-card__row-title">Email Address</div>
                            <div class="address-card__row-content">{{$order->billing_email}}</div>
                        </div>
                    </div>
                </div>
                <div class="order-success__address card address-card">
                    <div class="address-card__badge tag-badge tag-badge--theme">Billing Address</div>
                    <div class="address-card__body">
                        <div class="address-card__name">{{$order->billing_name}}</div>
                        <div class="address-card__row">{{$order->billing_address}}<br>{{$order->billing_city}}<br>{{$order->billing_provice}}</div>
                        <div class="address-card__row">
                            <div class="address-card__row-title">Phone Number</div>
                            <div class="address-card__row-content">{{$order->billing_phone}}</div>
                        </div>
                        <div class="address-card__row">
                            <div class="address-card__row-title">Email Address</div>
                            <div class="address-card__row-content">{{$order->billing_email}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="block-space block-space--layout--before-footer"></div>

@endsection
