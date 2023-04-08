@extends('layout.main')
@section('content')

{{ Breadcrumbs::render('allbrands') }}

<div class="block-space block-space--layout--spaceship-ledge-height"></div>

<div class="block">
    <div class="container">
        <div>
            <div class="block block-brands block-brands--layout--columns-8-full">
                <div class="container">
                    <ul class="block-brands__list">
                        @foreach ($collectionbrands as $brand)
                        <li class="block-brands__item">
                            <a href="/brand/{{ $brand->slug }}" class="block-brands__item-link">
                                <img class="inner-img" src="{{ 'https://app.fa-bt.com/' }}{{ $brand->image }}" alt="{{ $brand->title }}" />
                                <span class="block-brands__item-name">{{ $brand->title }}</span>
                            </a>
                        </li>
                        <li class="block-brands__divider" role="presentation"></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="block-space block-space--layout--before-footer"></div>
@endsection
