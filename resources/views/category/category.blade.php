@extends('layout.main')
@section('title')
@if ($maincategory->metatitle)
{{$maincategory->metatitle}}
@endif
@endsection
@section('content')

{{-- {{ Breadcrumbs::render('privacy') }} --}}
<div class="block-space block-space--layout--before-footer"></div>
<div class="block block-split">
    <div class="container">
        <div class="block-split__row row no-gutters">
            <div class="col-auto block-split__item block-split__item-content">
                <div class="block">
                    <div class="categories-list categories-list--layout--columns-5-full">
                        <ul class="categories-list__body">
                            @foreach ($collectioncategory as $category)
                                @if ($category->image)
                                    <li class="categories-list__item">
                                        <a href="/category/{{ $category->slug }}">
                                            <div class="image image--type--category">
                                                <div class="image__body">
                                                    <img class="image__tag inner-img" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $category->image }}" alt=""/>
                                                </div>
                                            </div>
                                            <div class="categories-list__item-name">{{ $category->title }}</div>
                                        </a>
                                        {{-- <div class="categories-list__item-products">131 Products</div> --}}
                                    </li>
                                    <li class="categories-list__divider"></li>
                                @else
                                    <div class="mt-3 mb-3 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                                        <h6>
                                            <a class="category-link" style="color:black;" href="/category/{{ $category->slug }}">{{ $category->title }}</a>
                                        </h6>
                                        <hr />
                                        @forelse ($category->descendants as $child)
                                            @if ($child->parent_id == $category->id)
                                                <div class="mt-1 ml-0">
                                                    <a class="category-link" style="color:black;" href="/category/{{ $child->slug }}">{{ $child->title }}</a>
                                                </div>
                                            @endif
                                        @empty
                                        @endforelse ()
                                    </div>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-space block-space--layout--before-footer"></div>
    </div>
</div>
@endsection
