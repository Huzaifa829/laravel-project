@extends('layout.main')
@section('content')

<div class="block-space block-space--layout--before-footer"></div>
<div class="block-split block-split--has-sidebar">
    <div class="container">
        <div class="block-split__row row no-gutters">
            <div class="col-auto block-split__item block-split__item-sidebar">
                <div class="sidebar sidebar--offcanvas--mobile">
                    <div class="sidebar__backdrop"></div>
                    <div class="sidebar__body">
                        <div class="sidebar__header">
                            <div class="sidebar__title">Filters</div>
                            <button class="sidebar__close" type="button">
                                <svg width="12" height="12">
                                    <path d="M10.8,10.8L10.8,10.8c-0.4,0.4-1,0.4-1.4,0L6,7.4l-3.4,3.4c-0.4,0.4-1,0.4-1.4,0l0,0c-0.4-0.4-0.4-1,0-1.4L4.6,6L1.2,2.6c-0.4-0.4-0.4-1,0-1.4l0,0c0.4-0.4,1-0.4,1.4,0L6,4.6l3.4-3.4c0.4-0.4,1-0.4,1.4,0l0,0c0.4,0.4,0.4,1,0,1.4L7.4,6l3.4,3.4C11.2,9.8,11.2,10.4,10.8,10.8z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="sidebar__content">
                            <div class="widget widget-filters widget-filters--offcanvas--mobile" data-collapse data-collapse-opened-class="filter--opened">
                                <div class="widget__header widget-filters__header">
                                    <h4>Filters</h4>
                                </div>
                                <div class="widget-filters__list">
                                    <div class="widget-filters__item">
                                        <div class="filter filter--opened" data-collapse-item>
                                            <button type="button" class="filter__title" data-collapse-trigger>Categories
                                                <span class="filter__arrow">
                                                    <svg width="12px" height="7px">
                                                        <path d="M0.286,0.273 L0.286,0.273 C-0.070,0.629 -0.075,1.204 0.276,1.565 L5.516,6.993 L10.757,1.565 C11.108,1.204 11.103,0.629 10.747,0.273 L10.747,0.273 C10.385,-0.089 9.796,-0.086 9.437,0.279 L5.516,4.296 L1.596,0.279 C1.237,-0.086 0.648,-0.089 0.286,0.273 Z"/>
                                                    </svg>
                                                </span>
                                            </button>
                                            <div class="filter__body" data-collapse-content>
                                                <div class="filter__container">
                                                    <div class="filter-categories">
                                                        <ul class="filter-categories__list">
                                                           @foreach ($collectioncategory as $category)
                                                                <li class="filter-categories__item filter-categories__item--child">
                                                                    <a href="/category/{{ $category['slug'] }}">{{ $category['title'] }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-auto block-split__item block-split__item-content">
                <div class="block">
                    <div class="products-view">
                        <div class="products-view__options view-options view-options--offcanvas--mobile">
                            <div class="view-options__body">
                                <button type="button" class="view-options__filters-button filters-button">
                                    <span class="filters-button__icon">
                                        <svg width="16" height="16">
                                            <path d="M7,14v-2h9v2H7z M14,7h2v2h-2V7z M12.5,6C12.8,6,13,6.2,13,6.5v3c0,0.3-0.2,0.5-0.5,0.5h-2C10.2,10,10,9.8,10,9.5v-3C10,6.2,10.2,6,10.5,6H12.5z M7,2h9v2H7V2z M5.5,5h-2C3.2,5,3,4.8,3,4.5v-3C3,1.2,3.2,1,3.5,1h2C5.8,1,6,1.2,6,1.5v3C6,4.8,5.8,5,5.5,5z M0,2h2v2H0V2z M9,9H0V7h9V9z M2,14H0v-2h2V14z M3.5,11h2C5.8,11,6,11.2,6,11.5v3C6,14.8,5.8,15,5.5,15h-2C3.2,15,3,14.8,3,14.5v-3C3,11.2,3.2,11,3.5,11z"/>
                                        </svg>
                                    </span>
                                    <span class="filters-button__title">Filters</span>
                                </button>
                                <div class="view-options__layout layout-switcher">
                                    <div class="layout-switcher__list">
                                        <button type="button" class="layout-switcher__button layout-switcher__button--active" data-layout="grid" data-with-features="false">
                                            <svg width="16" height="16">
                                                <path d="M15.2,16H9.8C9.4,16,9,15.6,9,15.2V9.8C9,9.4,9.4,9,9.8,9h5.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7H9.8C9.4,7,9,6.6,9,6.2V0.8C9,0.4,9.4,0,9.8,0h5.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z M6.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h5.4C6.6,9,7,9.4,7,9.8v5.4C7,15.6,6.6,16,6.2,16z M6.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h5.4C6.6,0,7,0.4,7,0.8v5.4C7,6.6,6.6,7,6.2,7z"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="layout-switcher__button" data-layout="grid" data-with-features="true">
                                            <svg width="16" height="16">
                                                <path d="M16,0.8v14.4c0,0.4-0.4,0.8-0.8,0.8H9.8C9.4,16,9,15.6,9,15.2V0.8C9,0.4,9.4,0,9.8,0l5.4,0C15.6,0,16,0.4,16,0.8z M7,0.8v14.4C7,15.6,6.6,16,6.2,16H0.8C0.4,16,0,15.6,0,15.2L0,0.8C0,0.4,0.4,0,0.8,0l5.4,0C6.6,0,7,0.4,7,0.8z"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="layout-switcher__button" data-layout="list" data-with-features="false">
                                            <svg width="16" height="16">
                                                <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2V9.8C0,9.4,0.4,9,0.8,9h14.4C15.6,9,16,9.4,16,9.8v5.4C16,15.6,15.6,16,15.2,16z M15.2,7H0.8C0.4,7,0,6.6,0,6.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v5.4C16,6.6,15.6,7,15.2,7z"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="layout-switcher__button" data-layout="table" data-with-features="false">
                                            <svg width="16" height="16">
                                                <path d="M15.2,16H0.8C0.4,16,0,15.6,0,15.2v-2.4C0,12.4,0.4,12,0.8,12h14.4c0.4,0,0.8,0.4,0.8,0.8v2.4C16,15.6,15.6,16,15.2,16zM15.2,10H0.8C0.4,10,0,9.6,0,9.2V6.8C0,6.4,0.4,6,0.8,6h14.4C15.6,6,16,6.4,16,6.8v2.4C16,9.6,15.6,10,15.2,10z M15.2,4H0.8C0.4,4,0,3.6,0,3.2V0.8C0,0.4,0.4,0,0.8,0h14.4C15.6,0,16,0.4,16,0.8v2.4C16,3.6,15.6,4,15.2,4z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="view-options__body view-options__body--filters">
                                <div class="view-options__label">Active Filters</div>
                                <div class="applied-filters">
                                    <ul class="applied-filters__list">
                                        <li class="applied-filters__item">
                                            <a href="#" class="applied-filters__button applied-filters__button--filter">{{ $productcount }} Results Found For '{{ strtoupper(request()->input('query')) }}'
                                                <svg width="9" height="9">
                                                    <path d="M9,8.5L8.5,9l-4-4l-4,4L0,8.5l4-4l-4-4L0.5,0l4,4l4-4L9,0.5l-4,4L9,8.5z"/>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                        @if (count($collectionproduct)>0)
                            <div class="products-view__list products-list products-list--grid--4" data-layout="grid" data-with-features="false">
                                <div class="products-list__head">
                                    <div class="products-list__column products-list__column--image">Image</div>
                                    <div class="products-list__column products-list__column--meta">MFR</div>
                                    <div class="products-list__column products-list__column--product">Product</div>
                                    <div class="products-list__column products-list__column--rating">Rating</div>
                                    <div class="products-list__column products-list__column--price">Price</div>
                                </div>
                                <div class="products-list__content">
                                    @foreach ($collectionproduct as $product)
                                        <div class="products-list__item">
                                            <div class="product-card">
                                                <div class="product-card__image">
                                                    <div class="image image--type--product">
                                                        <a href="{{ route('single-product', $product->slug) }}" class="image__body">
                                                            <img class="image__tag" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" alt="{{$product->title}}"/>
                                                        </a>
                                                    </div>
                                                    <div class="status-badge status-badge--style--success product-card__fit status-badge--has-icon status-badge--has-text">
                                                        <div class="status-badge__body">
                                                            <div class="status-badge__icon">
                                                                <svg width="13" height="13">
                                                                    <path d="M12,4.4L5.5,11L1,6.5l1.4-1.4l3.1,3.1L10.6,3L12,4.4z"/>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-card__info">
                                                    <div class="product-card__meta">
                                                        <span class="product-card__meta-title">MFR:</span>{{ strtoupper($product->mfr) }}
                                                    </div>
                                                    <div class="product-card__name">
                                                        <div>
                                                            <a href="{{ route('single-product', $product->slug) }}">{{ $product->title }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__features">
                                                        {!! $product->shortdescription !!}
                                                    </div>
                                                </div>
                                                <div class="product-card__footer">
                                                    <div class="product-card__prices">
                                                        <div class="product-card__price product-card__price--current">AED {{ number_format($product->price,2) }}</div>
                                                    </div>
                                                    <form action="{{ route('addtocart') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button class="product-card__addtocart-icon" type="submit" aria-label="Add to cart" >
                                                            <svg width="20" height="20">
                                                                <circle cx="7" cy="17" r="2" />
                                                                <circle cx="15" cy="17" r="2" />
                                                                <path d="M20,4.4V5l-1.8,6.3c-0.1,0.4-0.5,0.7-1,0.7H6.7c-0.4,0-0.8-0.3-1-0.7L3.3,3.9C3.1,3.3,2.6,3,2.1,3H0.4C0.2,3,0,2.8,0,2.6V1.4C0,1.2,0.2,1,0.4,1h2.5c1,0,1.8,0.6,2.1,1.6L5.1,3l2.3,6.8c0,0.1,0.2,0.2,0.3,0.2h8.6c0.1,0,0.3-0.1,0.3-0.2l1.3-4.4C17.9,5.2,17.7,5,17.5,5H9.4C9.2,5,9,4.8,9,4.6V3.4C9,3.2,9.2,3,9.4,3h9.2C19.4,3,20,3.6,20,4.4z"/>
                                                            </svg>
                                                        </button>
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->title }}">
                                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                                    </form>
                                                    <form action="{{ route('addtocart') }}" method="POST">
                                                        {{ csrf_field() }}
                                                        <button class="product-card__addtocart-full" type="submit">Add to cart</button>
                                                        <input type="hidden" name="quantity" value="1">
                                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                                        <input type="hidden" name="name" value="{{ $product->title }}">
                                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="products-view__pagination">
                            <nav aria-label="Page navigation example">
                                {{ $collectionproduct->links('layout.pagination') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
</div>

@endsection







