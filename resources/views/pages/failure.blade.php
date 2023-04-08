@extends('layout.main')
@section('content')
<div class="block-space block-space--layout--spaceship-ledge-height"></div>
<div class="block">
    <div class="container">
        <div class="not-found">
            <div class="not-found__404">Something Went Wrong</div>
            <div class="not-found__content">
                <h1 class="not-found__title">Your Transaction is <b>{{ $response['status'] }}</b></h1>
                <p class="not-found__text">Your Order is saved for later Transactions. <br>Try to use the search.</p>
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
@endsection
