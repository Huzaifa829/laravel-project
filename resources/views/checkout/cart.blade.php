@extends('layout.main')
@section('content')

{{ Breadcrumbs::render('cart') }}
<div class="block">
    <div class="container">
        @if (Cart::count() > 0)
        <div class="cart">
            <div class="cart__table cart-table">
                <table class="cart-table__table">
                    <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Image</th>
                            <th class="cart-table__column cart-table__column--product">Product</th>
                            <th class="cart-table__column cart-table__column--price">Price</th>
                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                            <th class="cart-table__column cart-table__column--total">Total</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                    </thead>
                    <tbody class="cart-table__body">
                        @foreach (Cart::instance('default')->content() as $item)
                        <tr class="cart-table__row">
                            <td class="cart-table__column cart-table__column--image">
                                <div class="image image--type--product">
                                    <a href="{{ route('single-product',$item->model->slug) }}" class="image__body">
                                        <img class="image__tag" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $item->model->thumbnail }}" alt="{{ $item->model->title }}" />
                                    </a>
                                </div>
                            </td>
                            <td class="cart-table__column cart-table__column--product">
                                <a href="{{ route('single-product',$item->model->slug) }}" class="cart-table__product-name">{{ $item->model->title }}</a>
                                <ul class="cart-table__options">
                                    @if ($item->model->productcode)
                                    <li>SKU: {{ strtoupper($item->model->productcode) }}</li>
                                    @endif
                                    @if ($item->model->upc)
                                    <li>UPC: {{ strtoupper($item->model->upc) }}</li>
                                    @endif
                                    @if ($item->model->mfr)
                                    <li>MFR: {{ strtoupper($item->model->mfr) }}</li>
                                    @endif
                                </ul>
                            </td>
                            <td class="cart-table__column cart-table__column--price" data-title="Price"> {{number_format($item->model->price,2)}}&nbspAED</td>
                            <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                <div class="cart-table__quantity input-number">
                                    <input class="form-control input-number__input" type="number" name="qunatity" id="quantity-input" min="1" value="{{ $item->qty }}" disabled />
                                    <div class="input-number__add" id="{{$item->rowId}}"></div>
                                    <div class="input-number__sub" id="{{$item->rowId}}"></div>
                                </div>
                            </td>
                            <td class="cart-table__column cart-table__column--total" data-title="Total"> {{ number_format($item->model->price*$item->qty,2)}}&nbspAED</td>
                            <td class="cart-table__column cart-table__column--remove">
                                <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="cart-table__remove btn btn-sm btn-icon btn-muted">
                                        <svg width="12" height="12">
                                            <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4C11.2,9.8,11.2,10.4,10.8,10.8z" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart__totals">
                <div class="card">
                    <div class="card-body card-body--padding--2">
                        <h3 class="card-title">Cart Totals</h3>
                        <table class="cart__totals-table">
                            <thead>
                                <tr>
                                    <th>Subtotal</th>
                                    <td>{{ Cart::subtotal() }} AED</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Tax</th>
                                    <td> {{ Cart::tax() }} AED</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Total</th>
                                    <td>{{ Cart::total() }} AED</td>
                                </tr>
                            </tfoot>
                        </table>
                        <a class="btn btn-primary btn-xl btn-block" href="{{route('cart.checkoutorder')}}">Proceed to checkout</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--divider-nl"></div>
        @else
        <div class="block-space block-space--layout--spaceship-ledge-height"></div>
        <div class="block">
            <div class="container">
                <div class="not-found">
                    <div class="not-found__content">
                        <h1 class="not-found__title">Cart is Empty</h1>
                        <form class="not-found__search">
                            <input type="text" class="not-found__search-input form-control" placeholder="Search Query...">
                            <button type="submit" class="not-found__search-button btn btn-primary">Search</button>
                        </form>
                        <p class="not-found__text">Or go to the home page to start over.</p>
                        <a class="btn btn-secondary btn-sm" href="/">Go To Home Page</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
        @endif
    </div>
</div>
<div class="block-space block-space--layout--before-footer"></div>

@endsection

@section('scripts')
<script>
    $(".input-number__add").click(function() {
        var rowid = $(this).attr('id');
        var qty = $(this).closest("tr").find("input[name=qunatity]").val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: 'cartupdate',
            method: 'post',
            data: {
                "rowid": rowid,
                "quantity": qty,
                "_token": token
            },
            success: function(respone) {
                location.reload(true);
            }
        });
    });


    $(".input-number__sub").click(function() {
        var rowid = $(this).attr('id');
        var qty = $(this).closest("tr").find("input[name=qunatity]").val();
        var token = $("meta[name='csrf-token']").attr("content");

        $.ajax({
            url: 'cartupdate',
            method: 'post',
            data: {
                "rowid": rowid,
                "quantity": qty,
                "_token": token
            },
            success: function(respone) {
                location.reload(true);
            }
        });
    });
</script>
@endsection