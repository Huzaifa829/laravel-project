@extends('layout.main')
@section('title')
    @if ($product->metatitle)
        {{ $product->metatitle }}
    @endif
@endsection
@section('stylesheet')
  <style>
        table tr td {
            width: 700px;
        }

        .specsification p {
            border-bottom: 0.125rem solid #cdcdcd;
            color: #F2AA4CFF;
            font-size: 2rem;
            font-weight: 300;
            line-height: 2rem;
            padding: 1rem 0 0.875rem;
            margin-top: 30px;
        }

        .product__actions {
            display: block !important;
        }

        .middle-border {
            /* border-right: 1px solid; */
            border-left: 1px solid #cdcdcd;
            height: 250px;
        }

        .indicator__button:hover {
            color: unset !important;
        }
    </style>
@endsection
@section('content')
<header class="header-wraper" id="qty-popup-overlay">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-8 col-8">
                <div class="header_right_box">
                    <img src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" alt="Main product image">
                    <h2>{{ $product->title }}</h2>
                </div>
            </div>
            @if (empty($item))
                <div class="col-xl-3 col-lg-4 col-md-4 col-4 text-end">
                    <form action="{{ route('addtocart') }}" method="POST">
                        {{ csrf_field() }}
                        <input class="input-number__input form-control form-control-lg" name="quantity" type="hidden" min="1" value="1" />
                        <button type="submit" class="btn_view_cart">Add to cart</button>
                        <input type="hidden" id="productid" name="id" value="{{ $product->id }}">
                        <input type="hidden" id="productname" name="name" value="{{ $product->title }}">
                        <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                    </form>
                </div>
            @else
                <div class="col-xl-3 col-lg-4 col-md-4 col-4 text-end">
                    <button class="btn_view_cart">View Cart</button>
                </div>
            @endif
        </div>
    </div>
</header>


<div class="container">
    <div class="product_heading_name">
        <div class="row">
            <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                <div class="block-header block-header--has-breadcrumb block-header--has-title">
                    <div class="container">
                        <div class="block-header__body">
                            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                                <ol class="breadcrumb__list">
                                    <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a class="breadcrumb__item-link" href="/">Home</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent"><a class="breadcrumb__item-link" href="/category/{{ $category_data->slug }}">{{ $category_data->title }}</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent"><a class="breadcrumb__item-link" href="/brand/{{ $brand->slug }}">{{ $brand->title }}</a></li>
                                    <li class="breadcrumb__item breadcrumb__item--parent active"><span class="breadcrumb__item-link">{{ $product->title }}</span></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-10 col-xl-10 col-lg-10">
                <h2>{{ $product->title }}</h2>
                <ul>
                    <li>
                        @if ($product->productcode) SKU : #{{ strtoupper($product->productcode) }} @endif
                        @if ($product->mfr) | MFR : #{{ $product->mfr }} @endif
                        @if ($product->upc) | UPC : #{{ $product->upc }} @endif
                    </li>
                </ul>
            </div>
            <div class="col-xxl-2 col-xl-2 col-lg-2">
                <a href="/brand/{{ $brand->slug }}">
                    <img class="manufacturer__image fx-mix-blend-mode--multiply" src="{{ 'https://app.fa-bt.com/' }}{{ $brand->image }}" alt="{{ $brand->title }}" style="width:150px;" />
                </a>
            </div>
        </div>
    </div>

    <div class="mb-4 product-details">
        <div class="row">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="product-media" id="iv">
                    <div class="mobile-media-header">
                        <div class="text-right btn-block">
                            <a href="#"><i class="fa-solid fa-share-nodes"></i></a>
                            <a href="#"><i class="fa-regular fa-star"></i></a>
                        </div>
                    </div>
                    <div class="slider-nav">
                        <div>
                            <img src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" />
                        </div>
                        @foreach ($productimages as $extraimage)
                            <div>
                                <img src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $extraimage->images }}" />
                            </div>
                        @endforeach
                    </div>
                    <div class="slider-for">
                        @php
                            $firstKey = count($productimages);
                        @endphp
                        <div>
                            <img class="image-open-class" data-id="product-img-slide-{{ $firstKey }}" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" />
                        </div>
                        @foreach ($productimages as $key => $extraimage)
                            <div>
                                <img class="image-open-class" data-id="product-img-slide-{{ $key }}" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $extraimage->images }}" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="product_right_side_box">
                    @if ($product->shortdescription)
                        <div class="key-feature_box">
                            <h5>Features</h5>
                            {!! $product->shortdescription !!}
                        </div>
                    @endif

                    <div class="instock">
                        <h5></h5>
                        <ul>
                            <li>
                                <a href=""><i class="fa fa-share" aria-hidden="true"></i> Share</a>
                            </li>
                            <li>
                                <a href=""><i class="fa fa-print" aria-hidden="true"></i> Print</a>
                            </li>
                        </ul>
                    </div>

                    <div class="mobile-bg">
                        <h3 class="price_product">
                            <div class="mobile-only">You Pay:</div>
                            <div style="color: #e52727;"><i>AED {{ number_format($product->price) }}</i></div>
                            <div><h6>VAT Excl.</h6></div>
                        </h3>

                        <div class="view_cart_box mobile-btn-class">
                            <div class="carts_buttons @if (empty($item)) mobile-carts-btn @endif">
                                @if (empty($item))
                                    <button type="button" class="qtyDropdown-mobile" id="qty-popup-open">
                                        <p>Qty</p>
                                        <p id="GFG_DOWN"></p>
                                    </button>
                                    <form action="{{ route('addtocart') }}" method="POST">
                                        @csrf
                                        <input type="hidden" id="mob_quen" name="quantity" value="1" />
                                        <div class="qty-popup" id="qty-popup">
                                            <div class="qty-header">
                                                <p>Quantity</p>
                                                <button type="button" class="qty-popup-close" id="qty-popup-close" style="color: #F2AA4CFF;">X</button>
                                            </div>
                                            <div class="qty-body">
                                                <button type="button" id="1" value="1" class="qty-value" name="quantity" onclick="GFG_click(this.id)">1
                                                    <div id="checkvisible" class="fafachecked1"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="2" value="2" class="qty-value" name="quantity" onclick="GFG_click(this.id)">2
                                                    <div id="checkvisible2" class="fafachecked2"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="3" value="3" class="qty-value" name="quantity" onclick="GFG_click(this.id)">3
                                                    <div id="checkvisible3" class="fafachecked3"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="4" value="4" class="qty-value" name="quantity" onclick="GFG_click(this.id)">4
                                                    <div id="checkvisible4" class="fafachecked4"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="5" value="5" class="qty-value" name="quantity" onclick="GFG_click(this.id)">5
                                                    <div id="checkvisible5" class="fafachecked5"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="6" value="6" class="qty-value" name="quantity" onclick="GFG_click(this.id)">6
                                                    <div id="checkvisible6" class="fafachecked6"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="7" value="7" class="qty-value" name="quantity" onclick="GFG_click(this.id)">7
                                                    <div id="checkvisible7" class="fafachecked7"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="8" value="8" class="qty-value" name="quantity" onclick="GFG_click(this.id)">8
                                                    <div id="checkvisible8" class="fafachecked8"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="9" value="9" class="qty-value" name="quantity" onclick="GFG_click(this.id)">9
                                                    <div id="checkvisible9" class="fafachecked9"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                                <button type="button" id="10" value="10" class="qty-value" name="quantity" onclick="GFG_click(this.id)">10
                                                    <div id="checkvisible10" class="fafachecked10"><i class="fa fa-check" aria-hidden="true"></i></div>
                                                </button>

                                            </div>
                                        </div>

                                        <button type="submit" class="btn_view_cart">Add to cart</button>
                                        <input type="hidden" id="productid" name="id" value="{{ $product->id }}">
                                        <input type="hidden" id="productname" name="name" value="{{ $product->title }}">
                                        <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                                    </form>
                                @else
                                    <a class="desktop_btn_view_cart" href="{{ route('cart') }}">View Cart</a>
                                    <button type="button" class="btn_wish_list" style="margin-left: 20px;">Add to Wish List</button>
                                @endif
                            </div>
                            <p>
                                <i class="fa-solid fa-truck-fast"></i>
                                <a href="">Calculate Shipping</a>
                            </p>
                        </div>
                    </div>

                    <div class="deskop-bg">
                        <div class="view_cart_box desktop-btn-class">
                            @if (empty($item))
                                <form action="{{ route('addtocart') }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="product__actions">
                                        <div class="carts_buttons">
                                            <div class="product__actions-item product__actions-item--quantity">
                                                <div class="input-number">
                                                    <input class="input-number__input form-control form-control-lg" name="quantity" type="number" min="1" value="1" />
                                                    <div class="input-number__add"></div>
                                                    <div class="input-number__sub"></div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn_view_cart">Add to cart</button>
                                            <button type="button" class="btn_wish_list" style="margin-left: 20px;">Add to Wish List</button>
                                            <input type="hidden" id="productid" name="id" value="{{ $product->id }}">
                                            <input type="hidden" id="productname" name="name" value="{{ $product->title }}">
                                            <input type="hidden" id="price" name="price" value="{{ $product->price }}">
                                        </div>
                                    </div>
                                </form>
                            @else
                                <a class="desktop_btn_view_cart" href="{{ route('cart') }}">View Cart</a>
                                <button type="button" class="btn_wish_list" style="margin-left: 20px;">Add to Wish List</button>
                            @endif
                            <p>
                                <i class="fa-solid fa-truck-fast"></i>
                                <a type="button" data-toggle="modal" onclick="calculateship();">Calculate Shipping</a>
                                <input type="hidden" id="length" value="{{ $product->length }}">
                                <input type="hidden" id="width" value="{{ $product->width }}">
                                <input type="hidden" id="height" value="{{ $product->height }}">
                                <input type="hidden" id="weight" value="{{ $product->weight }}">
                            </p>
                        </div>
                    </div>

                    <div class="detail_stock_box">
                        <div class="stock_message_section">In Stock</div>
                        <div class="shipping_info_section">
                            <div class="stock-separator">Shipping Charges Apply <span>?</span></div>
                            <div class="stock-separator">Order now to ship tomorrow <span>?</span></div>
                        </div>
                    </div>
                    <div class="style_Configuration_box"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="tab_section">
    <div class="container">
        <div class="tab-nav">
            <ul class="mb-3 nav nav-pills" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="over-view-tab" data-bs-toggle="pill" data-bs-target="#over-view" type="button" role="tab" aria-controls="over-view" aria-selected="true">
                        <div class="tab-icon">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        Description
                    </button>
                </li>
                @if ($product->specifications)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="specs-tab" data-bs-toggle="pill" data-bs-target="#specs" type="button" role="tab" aria-controls="specs" aria-selected="false">
                            <div class="tab-icon">
                                <i class="fa-solid fa-clipboard"></i>
                            </div>
                            Specifications
                        </button>
                    </li>
                @endif
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="over-view" role="tabpanel" aria-labelledby="over-view-tab" tabindex="0">
                <div class="row">
                    <div class="col-xl-12">
                        <h2>{{ $product->title }}</h2>
                    </div>
                    <div class="col-xl-9 ">
                        <div class="counting_list_with_tab_box">
                            <div class="all_tab_list">
                                <div class="list_first ">
                                    {!! $product->longdescription !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if ($product->inthebox)
                        <div class="mb-4 col-xl-3">
                            <div class="card">
                                <div class="in_the_box">
                                    <div class="card-header">
                                        <h2 style="text-transform:capitalize;"><i class="fa-solid fa-box-open"></i> IN THE BOX</h2>
                                    </div>
                                    <div class="card-body" style="padding: 2.25rem; padding-top:0rem;">
                                        <ul>
                                            {!! $product->inthebox !!}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <div class="tab-pane fade" id="specs" role="tabpanel" aria-labelledby="specs-tab" tabindex="0">
                <div class="row">
                    <div class="col-xl-12 specsification">
                        <div class="table-responsive" style="width:80%;">
                            {!! $product->specifications !!}
                        </div>
                    </div>
                </div>
            </div>

            @if (!$recommendedproducts->isEmpty())
                <div class="mb-4 recommended_accessories">
                    <div class="row">
                        <div class="col-xxl-12">
                            <div class="recommended_accessories_heading">
                                <h2>Might Also Like </h2>
                            </div>
                        </div>
                        @foreach ($recommendedproducts as $rproducts)
                            <div class="col-xxl-3 col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="recommended_accessories_box">
                                    <div class="recommended_accessories_img">
                                        <img class="img-fluid" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $rproducts->thumbnail }}" />
                                    </div>
                                    <div class="recommended_accessories_details">
                                        <a href="{{ route('single-product', $rproducts->slug) }}">{{$rproducts->title}}</a>
                                        <h4>AED {{number_format($rproducts->price)}}</h4>
                                        {{-- <h3>Save AED 50.00</h3> --}}
                                        <button class="btn_view_cart">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>


<!-- start image modal -->
{{-- <div class="modal" id="myModal">
    <div class="modal-dialog modal-xl modal_galery">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            <div class="modal-body">
                <div class="tab_section">
                    <ul class="mb-3 nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Product-Images-tab" data-bs-toggle="pill" data-bs-target="#Product-Images" type="button" role="tab" aria-controls="Product-Images" aria-selected="true">Product Images </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="Product-Images" role="tabpanel" aria-labelledby="Product-Images-tab" tabindex="0">
                            <div class="modal_slider">
                                <div class="slide_left">
                                    @php
                                    $firstKey = count($productimages);
                                    @endphp
                                    @foreach ($productimages as $key => $extraimage)
                                    <div class="column">
                                        <img class="demo cursor" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $extraimage->images }}" onclick="currentSlide({{ $key }})" />
                                    </div>
                                    @endforeach
                                    <div class="column">
                                        <img class="demo cursor" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" onclick="currentSlide({{ $firstKey }})" />
                                    </div>
                                </div>
                                <div class="slide_right">
                                    @foreach ($productimages as $key => $extraimage)
                                    <div class="mySlides" id="product-img-slide-{{ $key }}">
                                        <img src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $extraimage->images }}" />
                                    </div>
                                    @endforeach
                                    <div class="mySlides" id="product-img-slide-{{ $firstKey }}">
                                        <img src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" />
                                    </div>
                                </div>
                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                                <a class="next" onclick="plusSlides(1)">❯</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="border: none;">
                <h5 class="modal-title" id="exampleModalLongTitle">Shipping Cost</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <p>Shipping From <span style="color: blue;">UNITED ARAB EMIRATES</span></p>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <h6 class="float-right" style="color: red;" id="shippingprice">$67.05</h6>
                                <p id="productnameshipping">FedEx International Priority</p>
                                {{-- <p style="font-size: 13px;" id="deliverydays">3-5 Business Days</p> --}}
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-1 middle-border"></div> --}}
                    {{-- <div class="col-md-5">
                        <p>Shipping Locations</p>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <p>To calculate shipping charges, please enter details for your location. If you are shipping to a country other than the United Arab Emirates, please select from the dropdown:</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="modal-footer" style="border: none;">
                <p>This calculator displays shipping charges for 1 of item {{$product->title}}. To calculate the total shipping charge for multiple items, please add all products to your shopping cart.</p>
            </div>
        </div>
    </div>
</div>

@section('scripts')

    <script src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

@endsection

@endsection
