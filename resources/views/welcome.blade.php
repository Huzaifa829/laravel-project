@extends('layout.main')
@section('content')

<div style="position: sticky;">
    <div id="slider" style="width:1200px;height:600px;margin:0 auto;margin-bottom: 0px;">
        @foreach ($collectionslider as $slider)
            <div class="ls-slide" data-ls="duration:8000; timeshift:300; kenburnsscale:1.2; parallaxdistance:50;">
                <p style="font-weight:100;font-family:Poppins; font-size:240px; line-height:240px; color:rgba(235, 71, 50, 0.04); top:371px; left:277px;" class="ls-l" data-ls="offsetxin:left; durationin:3000; delayin:1000; easingin:easeOutExpo; offsetxout:right; durationout:3000; startatout:transitioninend + 1; easingout:easeInExpo; parallaxlevel:0;">{{$slider->paragraphthree}}</p>
                <div style="width:360px; height:360px; background:#fa8844; border-radius:50%; top:120px; left:659px;" class="ls-l" data-ls="offsetxin:500; offsetyin:-20; easingin:easeOutBack; rotatein:30; transformoriginin:30px 360px 0; offsetxout:-80; durationout:400; parallax:true; parallaxlevel:1;"></div>
                <img width="702" height="637" src="{{ 'https://app.fa-bt.com/' }}{{$slider->imagetwo}}" class="ls-l" alt="" style="opacity:0.8;top:50%; left:50%;" data-ls="offsetxin:200; durationin:800; delayin:200; easingin:easeOutBack; offsetxout:-80; durationout:400; parallax:true; parallaxlevel:1;">
                <p style="font-weight:100;font-family:Poppins; font-size:60px; color:rgb(250, 136, 68); top:109px; left:108px;" class="ls-l" data-ls="offsetxin:500; easingin:easeOutBack; offsetxout:-80; durationout:400; parallax:true; parallaxlevel:2;">{{$slider->paragraphone}}</p>
                <p style="font-weight:100;font-family:Poppins; font-size:35px; color:#7f7f7f; top:176px; left:111px;" class="ls-l" data-ls="offsetxin:500; delayin:50; easingin:easeOutBack; offsetxout:-80; durationout:400; parallax:true; parallaxlevel:2;">{{$slider->paragraphtwo}}</p>
                <img width="429" height="392" src="{{ 'https://app.fa-bt.com/' }}{{$slider->imageone}}" class="ls-l" alt="" style="top:104px; left:639px;" data-ls="offsetxin:500; offsetyin:-20; delayin:000; easingin:easeOutBack; rotatein:30; transformoriginin:30px 360px 0; offsetxout:-80; durationout:400; parallax:true; parallaxlevel:2;">
                <a style="" class="ls-l" href="{{$slider->slug}}" target="_self" data-ls="offsetxin:500; delayin:150; easingin:easeOutBack; offsetxout:-80; durationout:400; hover:true; hoverdurationin:300; hoveropacity:1; hoverbgcolor:#000000; parallax:true; parallaxlevel:2;">
                    <p style="font-family:Poppins; font-size:18px; top:387px; left:118px; padding-top:12px; padding-bottom:12px; padding-right:25px; padding-left:25px; color:#ffffff; background:rgba(0, 0, 0, 0.71);" class=" ls-button">{{$slider->buttontext}}</p>
                </a>
            </div>
        @endforeach
    </div>
</div>


<div class="block-space block-space--layout--divider-nl"></div>
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


<div class="block-space block-space--layout--divider-nl"></div>
<div class="block block-categories">
    <div class="container">
        <div class="block-categories__header">
            <div class="block-categories__title">
                Popular Categories
                <div class="decor block-categories__title-decor decor--type--center">
                    <div class="decor__body">
                        <div class="decor__start"></div>
                        <div class="decor__end"></div>
                        <div class="decor__center"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="block-categories__body">
        <div class="decor block-categories__body-decor decor--type--bottom">
            <div class="decor__body">
                <div class="decor__start"></div>
                <div class="decor__end"></div>
                <div class="decor__center"></div>
            </div>
        </div>
        <div class="container">
            <div class="block-categories__list">
                @foreach ($collectioncategory as $category)
                    <div class="block-categories__item category-card category-card--layout--classic">
                        <div class="category-card__body">
                            <div class="category-card__content">
                                <div class="category-card__image image image--type--category">
                                    <a href="/category/{{ $category->slug }}" class="image__body">
                                        <img class="image__tag inner-img" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $category->image }}" alt="{{ $category->title }}"/>
                                    </a>
                                </div>
                                <div class="category-card__info">
                                    <div class="category-card__name">
                                        <a href="/category/{{ $category->slug }}">{{ $category->title }}</a>
                                    </div>
                                    <ul class="category-card__children">
                                        @php
                                            $i = 0;
                                        @endphp
                                        @forelse ($category->descendants as $child)
                                            @if ($child->parent_id == $category->id)
                                                <li>
                                                    <a href="/category/{{ $child->slug }}">{{ $child->title }}</a>
                                                </li>
                                                @php
                                                    if (++$i == 5) break;
                                                @endphp
                                            @endif
                                        @endforeach
                                    </ul>
                                    <div class="category-card__actions">
                                        <a href="/category/{{ $category->slug }}" class="category-card__link">Shop All</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="block-space block-space--layout--divider-nl"></div>

{{-- <div id="slidertwo" style="width:1400px;height:720px;margin:0 auto;">
    <div class="ls-slide" data-ls="bgcolor:#ffffff; duration:5000; kenburnsscale:1.2;">
        <img width="1280" height="658" src="images/ls-project-666-slide-1.jpg" class="ls-tn" alt="" />
        <img width="1000" height="650" src="images/hair-care.png" class="ls-l ls-img-layer" alt="" style="top:158px; left:592px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:807px; height:524px;" data-ls="showinfo:disabled; controls:disabled; offsetxin:right; easingin:easeOutQuint; rotatein:20; offsetxout:left; easingout:easeInOutSine; rotateout:-20; transformoriginout:-50% 50% 0; position:relative;">
        <ls-layer style="top:172px; left:1044px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; width:300px; height:400px; border-radius:20px; background-color:#fff8e6;" class="ls-l ls-html-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; fadein:false; static:forever; position:relative;"></ls-layer>
        <ls-layer style="top:310px; left:1088px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; color:#c2c2c2;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; static:forever; position:relative;">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </ls-layer>
        <p style="top:488px; left:1087px; text-align:center; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:14px; color:#292019; line-height:36px; width:46px; border-radius:20px 0px 0px 20px; background-color:#f5eede; border-width:1px 1px 1px 1px; border-color:#72605f; cursor:pointer;" class="ls-l ls-icon-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; hover:true; hoverbgcolor:#ffffff; static:forever; position:relative;" data-ls-actions='[{"action":"prevSlide","trigger":"click","delay":0}]'>
            <i class="fa fa-chevron-left"></i>
        </p>
        <p style="top:488px; left:1134px; text-align:center; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:14px; color:#292019; line-height:36px; width:46px; border-radius:0px 20px 20px 0px; background-color:#f5eede; border-width:1px 1px 1px 1px; border-color:#72605f; cursor:pointer;" class="ls-l ls-icon-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; hover:true; hoverbgcolor:#ffffff; static:forever; position:relative;" data-ls-actions='[{"action":"nextSlide","trigger":"click","delay":0}]'>
            <i class="fa fa-chevron-right"></i>
        </p>
        <img width="500" height="317" src="images/big-cone.png" class="ls-l ls-img-layer" alt="" style="top:478px; left:1193px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:323px; height:204px;" data-ls="showinfo:disabled; controls:disabled; offsetxin:right; delayin:400; easingin:easeOutQuint; rotatein:10; transformoriginin:24.1% 90.2% 0; static:forever; position:relative;">
        <img width="500" height="173" src="images/leaves.png" class="ls-l ls-img-layer" alt="" style="top:551px; left:844px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:378px; height:131px;" data-ls="showinfo:disabled; controls:disabled; offsetxin:right; durationin:1200; delayin:100; easingin:easeOutQuint; static:forever; position:relative;">
        <ls-layer style="top:214px; left:72px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:86px; font-family:'DM Serif Display'; color:#292019; width:470px; line-height:78px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; offsetxin:-200; delayin:100; easingin:easeOutQuint; rotatein:-10; transformoriginin:0% 50% 0; static:forever; position:relative;">
            The best of the best
        </ls-layer>
        <ls-layer style="top:402px; left:78px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:22px; font-family:Poppins; color:#857575; width:470px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; offsetxin:-200; delayin:200; easingin:easeOutQuint; rotatein:-10; transformoriginin:0% 50% 0; static:forever; position:relative;">
            Bestselling formulas in convenient packs from legendary skin and haircare brands.
        </ls-layer>
        <ls-layer style="top:140px; left:72px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:14px; font-family:Poppins; color:#292019; line-height:32px; padding-right:20px; padding-left:20px; border-radius:20px; background-color:#ffdad7; border-width:1px 1px 1px 1px; border-color:#fdcfcb; white-space:nowrap;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; offsetxin:-200; easingin:easeOutQuint; rotatein:-20; transformoriginin:0% 50% 0; static:forever; position:relative;">
            Skincare packs
        </ls-layer>
        <a style="" class="ls-l" href="https://layerslider.com/sliders/" target="_blank" data-ls="showinfo:disabled; controls:disabled; offsetxin:-200; delayin:300; easingin:easeOutQuint; rotatein:-10; transformoriginin:0% 50% 0; hover:true; hoverbgcolor:#e61227; static:forever; position:relative;">
            <ls-layer style="top:518px; left:81px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; padding-top:16px; padding-right:22px; padding-bottom:16px; padding-left:22px; font-size:18px; color:#fff; border-radius:8px; font-family:Poppins; background-color:#d11326; box-shadow:0px 10px 20px -10px rgba(209, 19, 38, 0.2); cursor:pointer;" class="ls-button-layer">
                Check collection
            </ls-layer>
        </a>
        <a style="" class="ls-l" href="https://www.youtube.com/watch?v=qfXvzbiNB5g" target="_blank" data-ls="showinfo:disabled; controls:disabled; offsetxin:-200; delayin:250; easingin:easeOutQuint; rotatein:-10; transformoriginin:0% 50% 0; hover:true; hovercolor:#e61227; static:forever; position:relative;">
            <p style="top:523px; left:311px; text-align:center; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; line-height:46px; width:44px; border-radius:50%; color:#bf2030; padding-left:2px; border-width:2px 2px 2px 2px; border-color:#bf2030; cursor:pointer;" class="ls-icon-layer"><i class="fa fa-play"></i></p>
        </a>
        <a style="" class="ls-l" href="https://www.youtube.com/watch?v=qfXvzbiNB5g" target="_blank" data-ls="showinfo:disabled; controls:disabled; offsetxin:-200; delayin:250; easingin:easeOutQuint; rotatein:-10; transformoriginin:-50% 50% 0; static:forever; position:relative;">
            <ls-layer style="top:535px; left:376px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; font-family:Poppins; color:#877777; cursor:pointer;" class="ls-text-layer">
                See it in action
            </ls-layer>
        </a>
        <ls-layer style="top:411px; left:1090px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:43px; font-family:'DM Serif Display'; color:#292019; width:210px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            179.99&euro;
        </ls-layer>
        <ls-layer style="top:338px; left:1087px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; font-family:Poppins; color:#292019; width:210px; line-height:40px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            4 products included
        </ls-layer>
        <ls-layer style="top:310px; left:1088px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; color:#e89534;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; clipin:0 100% 0 0; position:relative;">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </ls-layer>
        <ls-layer style="top:219px; left:1087px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:44px; font-family:'DM Serif Display'; color:#292019; width:210px; line-height:40px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            Haircare Pack
        </ls-layer>
    </div>


    <!-- Slide 2-->
    <div class="ls-slide" data-ls="bgcolor:#ffffff; duration:5000; kenburnsscale:1.2;">
        <img width="1280" height="658" src="images/ls-project-666-slide-2-1.jpg" class="ls-tn" alt="" />
        <img width="1000" height="677" src="images/seddle-comp.png" class="ls-l ls-img-layer" alt="" style="top:142px; left:592px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:807px;" data-ls="showinfo:disabled; controls:disabled; offsetxin:right; easingin:easeOutQuint; rotatein:20; offsetxout:left; easingout:easeInOutSine; rotateout:-20; transformoriginout:-50% 50% 0; position:relative;">
        <ls-layer style="top:411px; left:1090px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:43px; font-family:'DM Serif Display'; color:#292019; width:210px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            129.99&euro;
        </ls-layer>
        <ls-layer style="top:338px; left:1087px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; font-family:Poppins; color:#292019; width:210px; line-height:22px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            Incudes a gentle sponge, shower brush and cleaning sponge
        </ls-layer>
        <ls-layer style="top:310px; left:1088px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; color:#e89534;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; clipin:0 100% 0 0; position:relative;">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </ls-layer>
        <ls-layer style="top:218px; left:1087px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-family:'DM Serif Display'; color:#292019; width:220px; line-height:40px; font-size:44px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            Bath &amp; Spa Pack
        </ls-layer>
    </div>


    <!-- Slide 3-->
    <div class="ls-slide" data-ls="bgcolor:#ffffff; duration:5000; kenburnsscale:1.2;">
        <img width="1280" height="658" src="images/ls-project-666-slide-3-1.jpg" class="ls-tn" alt="" />
        <img width="1000" height="784" src="images/wood-box-comp.png" class="ls-l ls-img-layer" alt="" style="top:112px; left:632px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; width:720px;" data-ls="showinfo:disabled; controls:disabled; offsetxin:right; easingin:easeOutQuint; rotatein:20; offsetxout:left; easingout:easeInOutSine; rotateout:-20; transformoriginout:-50% 50% 0; position:relative;">
        <ls-layer style="top:411px; left:1090px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:43px; font-family:'DM Serif Display'; color:#292019; width:210px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            199.99&euro;
        </ls-layer>
        <ls-layer style="top:338px; left:1087px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; font-family:Poppins; color:#292019; width:210px; line-height:22px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            Incudes a hand cream, wooden hairbrush and sponges
        </ls-layer>
        <ls-layer style="top:310px; left:1088px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-size:18px; color:#e89534;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; clipin:0 100% 0 0; position:relative;">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
        </ls-layer>
        <ls-layer style="top:218px; left:1087px; text-align:initial; font-weight:400; font-style:normal; text-decoration:none; mix-blend-mode:normal; font-family:'DM Serif Display'; color:#292019; width:220px; line-height:40px; font-size:44px; white-space:normal;" class="ls-l ls-text-layer" data-ls="showinfo:disabled; controls:disabled; easingin:easeOutQuint; position:relative;">
            Beauty Pack
        </ls-layer>
    </div>
</div> --}}


<div class="block-space block-space--layout--divider-nl"></div>
@if (count($collectionfeatureproducts)>0)
    <div class="block block-products-carousel" data-layout="grid-5">
        <div class="container">
            <div class="section-header">
                <div class="section-header__body">
                    <h2 class="section-header__title">Featured Products</h2>
                    <div class="section-header__spring"></div>
                    <ul class="section-header__groups">
                        <li class="section-header__groups-item">
                            <button type="button" class="section-header__groups-button section-header__groups-button--active">All</button>
                        </li>
                    </ul>
                    <div class="section-header__arrows">
                        <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11">
                                    <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z"/>
                                </svg>
                            </button>
                        </div>
                        <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11">
                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="section-header__divider"></div>
                </div>
            </div>
            <div class="block-products-carousel__carousel">
                <div class="block-products-carousel__carousel-loader"></div>
                <div class="owl-carousel">
                    @foreach ($collectionfeatureproducts as $product)
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
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

<div class="block-space block-space--layout--divider-nl"></div>

<div class="block block-banners">
    <div class="container">
        <div class="block-banners__list">
            <a href="#" class="block-banners__item block-banners__item--style--one">
                <span class="block-banners__item-image">
                    <img src="{{ URL::asset('assets/img/maxresdefault.jpg') }}" alt="" />
                </span>
                <span class="block-banners__item-image block-banners__item-image--blur">
                    <img src="" alt="" />
                </span>
                <span class="block-banners__item-title">Tilta Hydra arm</span>
                <span class="block-banners__item-details">The ultimate cinema camera crane</span>
                <span class="block-banners__item-button btn btn-primary btn-sm">Shop Now</span>
            </a>
            <a href="#" class="block-banners__item block-banners__item--style--two">
                <span class="block-banners__item-image">
                    <img src="{{ URL::asset('assets/img/blackmagic.jpg') }}" alt="" />
                </span>
                <span class="block-banners__item-image block-banners__item-image--blur">
                    <img src="" alt="" />
                </span>
                <span class="block-banners__item-title">Blackmagic Design</span>
                <span class="block-banners__item-details">Blackmagic Pocket Cinema Camera 6K Pro</span>
                <span class="block-banners__item-button btn btn-primary btn-sm">Shop Now</span>
            </a>
        </div>
    </div>
</div>

<div class="block-space block-space--layout--divider-nl"></div>

@if (count($collectionnewproducts)>0)
    <div class="block block-products-carousel" data-layout="horizontal">
        <div class="container">
            <div class="section-header">
                <div class="section-header__body">
                    <h2 class="section-header__title">New Arrivals</h2>
                    <div class="section-header__spring"></div>
                    <ul class="section-header__links"></ul>
                    <div class="section-header__arrows">
                        <div class="arrow section-header__arrow section-header__arrow--prev arrow--prev">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11">
                                    <path d="M6.7,0.3L6.7,0.3c-0.4-0.4-0.9-0.4-1.3,0L0,5.5l5.4,5.2c0.4,0.4,0.9,0.3,1.3,0l0,0c0.4-0.4,0.4-1,0-1.3l-4-3.9l4-3.9C7.1,1.2,7.1,0.6,6.7,0.3z" />
                                </svg>
                            </button>
                        </div>
                        <div class="arrow section-header__arrow section-header__arrow--next arrow--next">
                            <button class="arrow__button" type="button">
                                <svg width="7" height="11">
                                    <path d="M0.3,10.7L0.3,10.7c0.4,0.4,0.9,0.4,1.3,0L7,5.5L1.6,0.3C1.2-0.1,0.7,0,0.3,0.3l0,0c-0.4,0.4-0.4,1,0,1.3l4,3.9l-4,3.9C-0.1,9.8-0.1,10.4,0.3,10.7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="section-header__divider"></div>
                </div>
            </div>
            <div class="block-products-carousel__carousel">
                <div class="block-products-carousel__carousel-loader"></div>
                <div class="owl-carousel">
                    @foreach ($collectionnewproducts as $newproduct)
                        <div class="block-products-carousel__column">
                            <div class="block-products-carousel__cell">
                                <div class="product-card product-card--layout--horizontal">
                                    <div class="product-card__actions-list"></div>
                                    <div class="product-card__image">
                                        <div class="image image--type--product">
                                            <a href="{{ route('single-product', $newproduct->slug) }}" class="image__body">
                                                <img class="image__tag" src="{{ URL::asset('https://app.fa-bt.com/') }}{{ $newproduct->thumbnail }}" alt="{{$newproduct->title}}">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="product-card__info">
                                        <div class="product-card__name">
                                            <div>
                                                <a href="{{ route('single-product', $newproduct->slug) }}">{{$newproduct->title}}</a>
                                            </div>
                                        </div>
                                        <div class="product-card__rating">
                                            <div class="rating product-card__rating-stars">
                                                <div class="rating__body"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__footer">
                                        <div class="product-card__prices">
                                            <div class="product-card__price product-card__price--current">AED {{number_format($newproduct->price,2)}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

<div class="block-space block-space--layout--divider-nl"></div>

<div class="block block-features block-features--layout--bottom-strip">
    <div class="container">
        <ul class="block-features__list">
            <li class="block-features__item">
                <div class="block-features__item-icon">
                    <svg width="48" height="48" viewBox="0 0 48 48">
                        <path d="M44.6,26.9l-1.2-5c0.3-0.1,0.6-0.4,0.6-0.7v-0.8c0-1.7-1.4-3.2-3.2-3.2h-5.7v-1.7c0-0.9-0.7-1.6-1.6-1.6H23.1l6.4-2.6c0.4-0.2,0.6-0.6,0.4-1c-0.2-0.4-0.6-0.6-1-0.4l-5.2,2.1c1.6-1,3.2-2.2,3.8-2.9c1.2-1.5,0.9-3.7-0.7-4.9c-1.5-1.2-3.7-0.9-4.9,0.7l0,0c-0.9,1.1-2,4.3-2.7,6.5c-0.7-2.2-1.9-5.4-2.7-6.5l0,0c-1.2-1.5-3.4-1.8-4.9-0.7C10,5.5,9.7,7.7,10.9,9.2c0.6,0.8,2.2,1.9,3.8,2.9l-5.2-2.1c-0.4-0.2-0.8,0-1,0.4c-0.2,0.4,0,0.8,0.4,1l6.4,2.6H4.8c-0.9,0-1.6,0.7-1.6,1.6v13.6C3.2,29.6,3.5,30,4,30c0.4,0,0.8-0.3,0.8-0.8V15.6c0,0,0,0,0,0h28.9c0,0,0,0,0,0v13.6c0,0.4,0.3,0.8,0.8,0.8c0.4,0,0.8-0.3,0.8-0.8v-0.9H44c0,0,0,0,0,0c0,0,0,0,0,0c1.1,0,2,0.7,2.3,1.7H44c-0.4,0-0.8,0.3-0.8,0.8v1.6c0,1.3,1.1,2.4,2.4,2.4h0.9v3.3h-2c-0.6-1.9-2.4-3.2-4.5-3.2c-2.1,0-3.9,1.3-4.5,3.2h-0.4v-5.7c0-0.4-0.3-0.8-0.8-0.8c-0.4,0-0.8,0.3-0.8,0.8v5.7H18.1c-0.6-1.9-2.4-3.2-4.5-3.2c-2.1,0-3.9,1.3-4.5,3.2H4.8c0,0,0,0,0,0v-1.7H8c0.4,0,0.8-0.3,0.8-0.8S8.4,34.9,8,34.9H0.8c-0.4,0-0.8,0.3-0.8,0.8s0.3,0.8,0.8,0.8h2.5V38c0,0.9,0.7,1.6,1.6,1.6h4.1c0,0,0,0,0,0c0,2.6,2.1,4.8,4.8,4.8s4.8-2.1,4.8-4.8c0,0,0,0,0,0h16.9c0,0,0,0,0,0c0,2.6,2.1,4.8,4.8,4.8s4.8-2.1,4.8-4.8c0,0,0,0,0,0h2.5c0.4,0,0.8-0.3,0.8-0.8v-8C48,28.8,46.5,27.2,44.6,26.9z M23.1,5.9L23.1,5.9c0.7-0.9,1.9-1,2.8-0.4s1,1.9,0.4,2.8c-0.3,0.3-1.1,1.2-4.1,3c-0.6,0.4-1.2,0.7-1.7,1C21.2,10.1,22.4,6.9,23.1,5.9z M12.1,8.3c-0.7-0.9-0.5-2.1,0.4-2.8c0.4-0.3,0.8-0.4,1.2-0.4c0.6,0,1.2,0.3,1.6,0.8l0,0c0.7,1,1.9,4.2,2.6,6.5c-0.5-0.3-1.1-0.6-1.7-1C13.2,9.5,12.4,8.7,12.1,8.3z M35.2,21.9h6.7l1.2,4.9h-7.9V21.9z M40.8,18.7c0.9,0,1.7,0.7,1.7,1.7v0h-7.3v-1.7L40.8,18.7L40.8,18.7z M13.6,42.9c-1.8,0-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3s3.3,1.5,3.3,3.3S15.4,42.9,13.6,42.9z M40,42.9c-1.8,0-3.3-1.5-3.3-3.3s1.5-3.3,3.3-3.3s3.3,1.5,3.3,3.3S41.8,42.9,40,42.9z M45.6,33.3c-0.5,0-0.9-0.4-0.9-0.9v-0.9h1.7v1.7L45.6,33.3L45.6,33.3z"/>
                        <path d="M13.6,38.1c-0.9,0-1.6,0.7-1.6,1.6s0.7,1.6,1.6,1.6s1.6-0.7,1.6-1.6S14.4,38.1,13.6,38.1z"/>
                        <path d="M40,38.1c-0.9,0-1.6,0.7-1.6,1.6s0.7,1.6,1.6,1.6c0.9,0,1.6-0.7,1.6-1.6S40.9,38.1,40,38.1z"/>
                        <path d="M19.2,35.6c0,0.4,0.3,0.8,0.8,0.8h11.2c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H20C19.6,34.9,19.2,35.2,19.2,35.6z"/>
                        <path d="M2.4,33.2H12c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H2.4c-0.4,0-0.8,0.3-0.8,0.8S1.9,33.2,2.4,33.2z"/>
                        <path d="M12,21.9c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H8.8c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8c0.4,0,0.8-0.3,0.8-0.8v-2.5h1.7c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8H9.5v-1.7L12,21.9L12,21.9z"/>
                        <path d="M19.1,23.2c0-1.5-1.2-2.8-2.8-2.8h-2c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8c0.4,0,0.8-0.3,0.8-0.8V26h1.3l1.4,2.1c0.1,0.2,0.4,0.3,0.6,0.3c0.1,0,0.3,0,0.4-0.1c0.3-0.2,0.4-0.7,0.2-1l-1.1-1.7C18.6,25,19.1,24.2,19.1,23.2z M15.1,21.9h1.3c0.7,0,1.3,0.6,1.3,1.3s-0.6,1.3-1.3,1.3h-1.3V21.9z"/>
                        <path d="M24,21.9c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-3.2c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8H24c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-2.5v-1.7c0,0,0,0,0,0h1.6c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-1.6c0,0,0,0,0,0v-1.7L24,21.9L24,21.9z"/>
                        <path d="M29.6,21.9c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-3.2c-0.4,0-0.8,0.3-0.8,0.8v6.4c0,0.4,0.3,0.8,0.8,0.8h3.2c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-2.5v-1.7H28c0.4,0,0.8-0.3,0.8-0.8s-0.3-0.8-0.8-0.8h-0.9v-1.7L29.6,21.9L29.6,21.9z"/>
                    </svg>
                </div>
                <div class="block-features__item-info">
                    <div class="block-features__item-title">Free Shipping</div>
                    <div class="block-features__item-subtitle">For orders from 1000 AED inside UAE</div>
                </div>
            </li>
            <li class="block-features__item">
                <div class="block-features__item-icon">
                    <svg width="48" height="48" viewBox="0 0 48 48">
                        <path d="M46.218,18.168h-0.262v-0.869c0-1.175-1.211-1.766-2.453-1.766c-0.521,0-0.985,0.094-1.366,0.263c0.015-0.028,2.29-4.591,2.303-4.62c0.968-2.263-3.041-4.024-4.372-1.449l-5.184,10.166c-0.35,0.648-0.364,1.449,0.033,2.081c-0.206-0.107-0.432-0.166-0.668-0.166h-4.879c1.555-1.597,6.638-3.535,6.638-8.011c0-1.599-0.676-3.02-1.903-4.002c-1.088-0.87-2.52-1.35-4.033-1.35c-2.802,0-5.779,1.758-5.779,5.015c0,2.195,1.426,2.522,2.275,2.522c1.653,0,2.545-1.022,2.545-1.983c0-0.485,0.117-0.981,0.981-0.981c0.906,0,1.003,0.623,1.003,0.891c0,2.284-7.074,4.474-7.074,8.399v2.178c0,1.147,1.319,1.781,2.23,1.781h7.995c1.426,0,2.332-2.195,1.348-3.669c0.265,0.137,0.569,0.21,0.898,0.21h4.552v1.678c0,1.049,1.01,1.781,2.455,1.781s2.455-0.733,2.455-1.781v-1.678h0.262c1.02,0,1.781-1.225,1.781-2.32C48,19.144,47.251,18.168,46.218,18.168L46.218,18.168z M34.241,24.861h-7.987c-0.389,0-0.802-0.258-0.824-0.375v-2.179c0-3.056,7.074-5.046,7.074-8.399c0-1.107-0.754-2.298-2.41-2.298c-1.473,0-2.388,0.915-2.388,2.388c0,0.236-0.405,0.577-1.138,0.577c-0.492,0-0.869-0.082-0.869-1.116c0-2.344,2.253-3.609,4.373-3.609c2.251,0,4.53,1.355,4.53,3.946c0,4.526-6.94,5.826-6.94,8.511v0.202c0,0.389,0.315,0.703,0.703,0.703l5.882,0c0.091,0.015,0.354,0.314,0.354,0.802C34.601,24.494,34.349,24.825,34.241,24.861L34.241,24.861z M46.194,21.402h-0.941c-0.388,0-0.703,0.315-0.703,0.703v2.381c0,0.151-0.44,0.375-1.048,0.375c-0.608,0-1.049-0.224-1.049-0.375v-2.381c0-0.389-0.315-0.703-0.703-0.703h-5.255c-0.518,0-0.545-0.528-0.371-0.846c0.003-0.006,0.006-0.012,0.009-0.018l5.186-10.17c0.533-1.031,1.883-0.238,1.884,0.097c-0.011,0.087,0.038-0.035-4.014,8.092c-0.233,0.468,0.109,1.017,0.629,1.017h1.932c0.388,0,0.703-0.315,0.703-0.703v-1.572c0-0.123,0.409-0.36,1.051-0.36c0.618,0,1.046,0.223,1.046,0.36v1.572c0,0.389,0.315,0.703,0.703,0.703h0.966c0.196,0,0.375,0.435,0.375,0.914C46.593,20.951,46.324,21.338,46.194,21.402L46.194,21.402z M41.046,17.984v0.184h-0.092L41.046,17.984z M41.046,17.984"/>
                        <path d="M36.976,36.602c2.428-2.291,4.227-5.18,5.202-8.354c0.114-0.371-0.094-0.764-0.465-0.879c-0.371-0.114-0.765,0.095-0.879,0.466c-0.903,2.941-2.571,5.62-4.823,7.744c-0.282,0.267-0.295,0.712-0.029,0.994C36.249,36.856,36.694,36.869,36.976,36.602L36.976,36.602z M36.976,36.602"/>
                        <path d="M35.099,7.86c0.226-0.316,0.152-0.756-0.164-0.981C29.684,3.131,23.098,2.38,17.381,4.38c-0.367,0.128-0.559,0.53-0.431,0.896c0.128,0.366,0.53,0.56,0.896,0.431c5.23-1.83,11.346-1.199,16.272,2.316C34.434,8.249,34.873,8.176,35.099,7.86L35.099,7.86z M35.099,7.86"/>
                        <path d="M25.247,43.573c-0.857-0.491-1.854-0.639-2.807-0.416c-0.525,0.123-1.064,0.207-1.602,0.251c-0.387,0.032-0.675,0.371-0.643,0.758c0.032,0.387,0.37,0.675,0.758,0.644c0.606-0.05,1.214-0.145,1.807-0.284c0.606-0.141,1.241-0.047,1.788,0.267c1.583,0.908,3.528,0.884,5.076-0.064c3.605-2.207,3.212-1.964,3.359-2.061c2.24-1.464,2.922-4.464,1.519-6.755l-2.538-4.145c-1.436-2.345-4.508-3.068-6.835-1.644l-3.235,1.981c-1.472,0.901-2.358,2.477-2.371,4.214c-0.001,0.153-0.145,0.269-0.293,0.237c-1.228-0.265-2.372-0.847-3.306-1.683c-1.403-1.255-2.633-2.596-3.656-3.984c-0.23-0.313-0.67-0.379-0.983-0.149c-0.313,0.23-0.379,0.671-0.149,0.983c1.08,1.465,2.375,2.878,3.85,4.197c1.116,0.999,2.481,1.694,3.947,2.01c1.02,0.22,1.988-0.557,1.996-1.602c0.009-1.248,0.644-2.379,1.699-3.025l2.742-1.679l6.261,10.224l-2.742,1.679C27.78,44.209,26.384,44.225,25.247,43.573L25.247,43.573z M26.622,30.977c1.54-0.495,3.282,0.119,4.142,1.525l2.538,4.145c0.865,1.413,0.611,3.242-0.524,4.383L26.622,30.977z M26.622,30.977"/>
                        <path d="M0.403,23.192c0.998,3.783,2.422,7.199,4.232,10.155c1.81,2.956,4.206,5.777,7.121,8.386c1.613,1.443,3.59,2.435,5.717,2.868c0.377,0.078,0.751-0.165,0.83-0.549c0.078-0.381-0.168-0.752-0.549-0.829c-1.883-0.383-3.632-1.261-5.06-2.538c-2.813-2.517-5.121-5.233-6.859-8.072c-1.739-2.839-3.108-6.13-4.071-9.78c-0.902-3.419-0.07-7.084,2.228-9.803c0.632-0.748,0.954-1.704,0.906-2.69C4.834,9.03,5.483,7.795,6.592,7.116l2.742-1.679l6.261,10.224l-2.742,1.679c-1.043,0.639-2.327,0.696-3.436,0.153c-0.93-0.455-2.048,0.053-2.319,1.052 c-0.396,1.462-0.401,3.008-0.015,4.47c0.558,2.115,1.315,4.081,2.249,5.843c0.182,0.343,0.608,0.474,0.951,0.292c0.343-0.182,0.474-0.608,0.292-0.951c-0.884-1.667-1.601-3.532-2.132-5.543c-0.323-1.225-0.319-2.519,0.012-3.744c0.04-0.147,0.206-0.223,0.342-0.156c1.543,0.756,3.334,0.675,4.789-0.216l3.235-1.981c2.322-1.422,3.082-4.485,1.643-6.835l-2.538-4.145c-1.44-2.351-4.516-3.063-6.835-1.643L5.858,5.917C4.31,6.864,3.404,8.585,3.493,10.409c0.031,0.63-0.174,1.239-0.575,1.714C0.324,15.192-0.616,19.33,0.403,23.192L0.403,23.192z M14.728,6.314l2.538,4.145c0.865,1.414,0.61,3.243-0.524,4.383L10.586,4.788C12.12,4.295,13.864,4.903,14.728,6.314L14.728,6.314z M14.728,6.314"/>
                    </svg>
                </div>
                <div class="block-features__item-info">
                    <div class="block-features__item-title">Support 24/7</div>
                    <div class="block-features__item-subtitle">Email us anytime</div>
                </div>
            </li>
            <li class="block-features__item">
                <div class="block-features__item-icon">
                    <svg width="48" height="48" viewBox="0 0 48 48">
                        <path d="M30,34.4H2.5c-0.5,0-0.9-0.4-0.9-0.9V7.7c0-0.5,0.4-0.9,0.9-0.9H42c0.5,0,0.9,0.4,0.9,0.9v11.2c0,0.4,0.4,0.8,0.8,0.8c0.4,0,0.8-0.4,0.8-0.8V7.7c0-1.4-1.1-2.5-2.5-2.5H2.5C1.1,5.2,0,6.3,0,7.7v25.8C0,34.8,1.1,36,2.5,36H30c0.4,0,0.8-0.4,0.8-0.8C30.8,34.7,30.5,34.4,30,34.4z"/>
                        <path d="M15.4,18v-5.2c0-0.9-0.7-1.7-1.7-1.7H6.8c-0.9,0-1.7,0.7-1.7,1.7V18c0,0.9,0.7,1.7,1.7,1.7h6.9C14.6,19.7,15.4,18.9,15.4,18z M13.7,12.8V18c0,0,0,0.1-0.1,0.1h-3.5v-1.8h0.9c0.4,0,0.8-0.4,0.8-0.8c0-0.4-0.4-0.8-0.8-0.8h-0.9v-1.8L13.7,12.8C13.7,12.8,13.7,12.8,13.7,12.8z M6.8,18v-5.2c0,0,0-0.1,0.1-0.1h1.8V18L6.8,18C6.8,18,6.8,18,6.8,18z"/>
                        <path d="M32.2,11.1c-0.8-0.5-1.7-0.8-2.6-0.8c-2.6,0-4.7,2.1-4.7,4.7s2.1,4.7,4.7,4.7c1,0,1.8-0.3,2.6-0.8c0.8,0.5,1.7,0.8,2.6,0.8c2.6,0,4.7-2.1,4.7-4.7s-2.1-4.7-4.7-4.7C33.8,10.3,32.9,10.6,32.2,11.1z M26.5,15c0-1.7,1.4-3.1,3.1-3.1c0.5,0,0.9,0.1,1.4,0.3C30.4,13,30.1,14,30.1,15c0,1,0.3,1.9,0.9,2.7c-0.4,0.2-0.9,0.3-1.4,0.3C27.9,18,26.5,16.7,26.5,15z M37.8,15c0,1.7-1.4,3.1-3.1,3.1c-0.5,0-0.9-0.1-1.4-0.3c0.6-0.8,0.9-1.7,0.9-2.7c0-0.4-0.4-0.8-0.8-0.8s-0.8,0.4-0.8,0.8c0,0.6-0.2,1.2-0.5,1.6c-0.3-0.5-0.5-1.1-0.5-1.6c0-1.7,1.4-3.1,3.1-3.1C36.4,11.9,37.8,13.3,37.8,15z"/>
                        <path d="M6,24.1c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h6.9c0.4,0,0.8-0.4,0.8-0.8c0-0.4-0.4-0.8-0.8-0.8H6z"/>
                        <path d="M30.9,29.2H6c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h24.9c0.4,0,0.8-0.4,0.8-0.8S31.3,29.2,30.9,29.2z"/>
                        <path d="M16.3,24.1c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h6.9c0.4,0,0.8-0.4,0.8-0.8c0-0.4-0.4-0.8-0.8-0.8H16.3z"/>
                        <path d="M31.7,24.1h-5.2c-0.4,0-0.8,0.4-0.8,0.8c0,0.4,0.4,0.8,0.8,0.8h5.2c0.4,0,0.8-0.4,0.8-0.8C32.5,24.4,32.2,24.1,31.7,24.1z"/>
                        <path d="M46.3,30.2v-3.6c0-3.3-2.7-6-6-6c-3.3,0-6,2.7-6,6v3.6c-1,0.3-1.7,1.3-1.7,2.4v7.7c0,1.4,1.1,2.5,2.5,2.5h10.3c1.4,0,2.5-1.1,2.5-2.5v-7.7C48,31.5,47.3,30.5,46.3,30.2z M40.3,22.2c2.4,0,4.3,2,4.3,4.3v3.5H36v-3.5C36,24.2,37.9,22.2,40.3,22.2z M46.4,40.3c0,0.5-0.4,0.9-0.9,0.9H35.2c-0.5,0-0.9-0.4-0.9-0.9v-7.7c0-0.5,0.4-0.9,0.9-0.9h10.3c0.5,0,0.9,0.4,0.9,0.9V40.3z"/>
                        <path d="M40.3,33.5c-1.2,0-2.1,0.9-2.1,2.1c0,0.9,0.5,1.6,1.3,1.9v1.1c0,0.4,0.4,0.8,0.8,0.8s0.8-0.4,0.8-0.8v-1.1c0.8-0.3,1.3-1.1,1.3-1.9C42.4,34.4,41.5,33.5,40.3,33.5z M40.3,35.1c0.3,0,0.5,0.2,0.5,0.5s-0.2,0.5-0.5,0.5s-0.5-0.2-0.5-0.5S40.1,35.1,40.3,35.1z"/>
                    </svg>
                </div>
                <div class="block-features__item-info">
                    <div class="block-features__item-title">100% Safety</div>
                    <div class="block-features__item-subtitle">Only secure payments</div>
                </div>
            </li>
            <li class="block-features__item">
                <div class="block-features__item-icon">
                    <svg width="48" height="48" viewBox="0 0 48 48">
                        <path d="M48,3.3c0-0.9-0.3-1.7-1-2.3c-0.6-0.6-1.4-1-2.3-1c-0.9,0-1.7,0.3-2.3,1c-0.3,0.3-0.7,0.8-1,1.1c-0.3,0.3-0.2,0.8,0.1,1.1c0.3,0.3,0.8,0.2,1.1-0.1c0.4-0.5,0.7-0.9,0.9-1c0.3-0.3,0.8-0.5,1.2-0.5c0,0,0,0,0,0c0.5,0,0.9,0.2,1.2,0.5c0.3,0.3,0.5,0.8,0.5,1.2c0,0.5-0.2,0.9-0.5,1.2c-0.3,0.3-1.3,1.1-2.7,2.1c-0.9-1.5-2.4-2.4-4.3-2.4H27.5c-1.5,0-3,0.6-4.1,1.7L0.7,28.6C0.3,29,0,29.7,0,30.3s0.3,1.3,0.7,1.7L16,47.3c0.5,0.5,1.1,0.7,1.7,0.7c0.7,0,1.3-0.3,1.7-0.7l22.8-22.8c1.1-1.1,1.7-2.5,1.7-4.1V9.1c0-0.3,0-0.7-0.1-1C45.4,7,46.6,6,47,5.6C47.7,5,48,4.1,48,3.3z M42.3,9.1v11.4c0,1.1-0.4,2.2-1.2,3L18.3,46.2c-0.3,0.3-0.9,0.3-1.2,0L1.8,30.9c-0.3-0.3-0.3-0.9,0-1.2L24.6,6.9c0.8-0.8,1.8-1.2,3-1.2h11.4c1.3,0,2.4,0.7,3,1.8c-0.9,0.6-1.9,1.3-3,1.9c0,0-0.1-0.1-0.1-0.1c-1.3-1.3-3.3-1.3-4.6,0s-1.3,3.3,0,4.6c0.6,0.6,1.5,1,2.3,1c0.8,0,1.7-0.3,2.3-1c0.9-0.9,1.1-2.1,0.8-3.1C40.6,10.2,41.5,9.6,42.3,9.1C42.3,9.1,42.3,9.1,42.3,9.1z M35.7,11.9c0.1,0.3,0.4,0.4,0.7,0.4c0.1,0,0.2,0,0.3-0.1c0.5-0.2,0.9-0.5,1.4-0.7c0,0.4-0.2,0.9-0.5,1.2c-0.7,0.7-1.8,0.7-2.4,0c-0.7-0.7-0.7-1.8,0-2.4c0.3-0.3,0.8-0.5,1.2-0.5c0.3,0,0.7,0.1,1,0.3c-0.4,0.2-0.9,0.5-1.3,0.7C35.7,11.1,35.6,11.5,35.7,11.9z"/>
                        <path d="M16.3,25.8c-0.3-0.3-0.8-0.3-1.1,0c-0.3,0.3-0.3,0.8,0,1.1l2.4,2.4l-3,3l-2.4-2.4c-0.3-0.3-0.8-0.3-1.1,0c-0.3,0.3-0.3,0.8,0,1.1l5.9,5.9c0.2,0.2,0.4,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1l-2.4-2.4l3-3l2.4,2.4c0.2,0.2,0.4,0.2,0.5,0.2s0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1L16.3,25.8z"/>
                        <path d="M24.8,21.4c-1.4-1.4-3.8-1.4-5.2,0s-1.4,3.8,0,5.2l1.8,1.8c0.7,0.7,1.7,1.1,2.6,1.1s1.9-0.4,2.6-1.1c1.4-1.4,1.4-3.8,0-5.2L24.8,21.4z M25.5,27.3c-0.8,0.8-2.2,0.8-3,0l-1.8-1.8c-0.8-0.8-0.8-2.2,0-3c0.4-0.4,1-0.6,1.5-0.6s1.1,0.2,1.5,0.6l1.8,1.8C26.3,25.1,26.3,26.5,25.5,27.3z"/>
                        <path d="M27.4,15.8l1.8-1.8c0.3-0.3,0.3-0.8,0-1.1c-0.3-0.3-0.8-0.3-1.1,0l-4.7,4.7c-0.3,0.3-0.3,0.8,0,1.1c0.2,0.2,0.4,0.2,0.5,0.2s0.4-0.1,0.5-0.2l1.8-1.8l5.3,5.3c0.2,0.2,0.4,0.2,0.5,0.2c0.2,0,0.4-0.1,0.5-0.2c0.3-0.3,0.3-0.8,0-1.1L27.4,15.8z" />
                    </svg>
                </div>
                <div class="block-features__item-info">
                    <div class="block-features__item-title">Hot Offers</div>
                    <div class="block-features__item-subtitle">Discounts up to 50%</div>
                </div>
            </li>
        </ul>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#slider').layerSlider({
        sliderVersion: '6.0.0',
        type: 'fullwidth',
        responsiveUnder: 1200,
        maxRatio: 1,
        slideBGSize: 'auto',
        skin: 'numbers',
        globalBGColor: '#fbfbfa',
        thumbnailNavigation: 'always',
        tnWidth: 170,
        tnHeight: 120,
        skinsPath: '../../layerslider/skins/'
    });
});


$(document).ready(function() {
    $('#slidertwo').layerSlider({
        createdWith: '6.6.9',
        sliderVersion: '7.0.7',
        maxRatio: 1,
        slideOnSwipe: false,
        pauseOnHover: 'enabled',
        skin: 'v5',
        navPrevNext: false,
        hoverPrevNext: false,
        navStartStop: false,
        navButtons: false,
        useSrcset: false,
        skinsPath: '../../layerslider/skins/'
    });
});

</script>
@endsection
