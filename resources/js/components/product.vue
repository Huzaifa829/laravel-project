<template>
    <div class="block-products-carousel__column">
        <div class="block-products-carousel__cell">
            <div class="product-card product-card--layout--grid">
                <div class="product-card__actions-list"></div>
                <div class="product-card__image">
                    <div class="image image--type--product">
                        <a href="{{ route('single-product', $product->slug) }}" class="image__body">
                            <img class="image__tag" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $product->thumbnail }}" alt="{{ $product->title }}"/>
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
                        <span class="product-card__meta-title">MFR:</span>{{ $product->mfr }}
                    </div>
                    <div class="product-card__name">
                        <div>
                            <a href="{{ route('single-product', $product->slug) }}">{{ $product->title }}</a>
                        </div>
                    </div>
                </div>
                <div class="product-card__footer">
                    <div class="product-card__prices">
                        <div class="product-card__price product-card__price--current">AED {{number_format($product->price,2)}}</div>
                    </div>
                    <form action="{{ route('addtocart') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="product-card__addtocart-icon" type="submit" aria-label="Add to cart">
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
                </div>
            </div>
        </div>
    </div>
</template>
