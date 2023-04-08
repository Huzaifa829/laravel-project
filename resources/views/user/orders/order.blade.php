@extends('layout.main')
@section('content')

<div class="block-space block-space--layout--after-header"></div>

<div class="block">
    <div class="container container--max--xl">
        <div class="row">
            @include('user.layout.menu')
            <div class="mt-4 col-12 col-lg-9 mt-lg-0">
                <div class="card">
                    <div class="card-header">
                        <h5>Order History</h5>
                    </div>
                    <div class="card-divider"></div>
                    @if (!$collectionorder->isEmpty())
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
                                    @foreach ($collectionorder as $order)
                                        <tr>
                                            <td><a href="/orderdetails/{{$order->order_code}}">#{{$order->order_code}}</a></td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->payment_status}}</td>
                                            <td>AED {{$order->total}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card-divider"></div>
                    <div class="products-view__pagination">
                        <nav aria-label="Page navigation example">
                            {{ $collectionorder->links('layout.pagination') }}
                        </nav>
                    </div>
                    @else
                    <div class="card-table">
                        <div class="table-responsive-sm">
                            <h6 class="mt-4" style="text-align:center;">No Order History Available</h6>
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
