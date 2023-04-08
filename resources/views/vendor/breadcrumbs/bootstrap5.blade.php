
<div class="block-header block-header--has-breadcrumb block-header--has-title">
    <div class="container">
        <div class="block-header__body">
            @unless ($breadcrumbs->isEmpty())
            <nav class="breadcrumb block-header__breadcrumb" aria-label="breadcrumb">
                <ol class="breadcrumb__list">
                    <li class="breadcrumb__spaceship-safe-area" role="presentation"></li>

                    @foreach ($breadcrumbs as $breadcrumb)
                        @if ($breadcrumb->url && !$loop->last)
                            <li class="breadcrumb__item breadcrumb__item--parent breadcrumb__item--first"><a class="breadcrumb__item-link" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                        @else
                            <li class="breadcrumb__item breadcrumb__item--parent active" aria-current="page"><span class="breadcrumb__item-link">{{ $breadcrumb->title }}</span></li>
                        @endif
                    @endforeach
                </ol>
            </nav>
            @endunless
        </div>
    </div>
</div>
