<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use App\Models\Category;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});


Breadcrumbs::for('allbrands', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('All Brands', route('allbrands'));
});

Breadcrumbs::for('delivery', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Delivery Information', route('delivery'));
});

Breadcrumbs::for('privacy', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Privacy Policy', route('privacy'));
});

Breadcrumbs::for('returns', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Return Policy', route('returns'));
});

Breadcrumbs::for('terms', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Terms And Conditions', route('terms'));
});

Breadcrumbs::for('cart', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Cart', route('cart'));
});

Breadcrumbs::for('wishlist', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Wishlist', route('wishlist'));
});

Breadcrumbs::for('brand/{slug}', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Wishlist', route('brands'));
});

// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, Category $category) {
//     $trail->parent('home');

//     foreach ($category->ancestors as $ancestor) {
//         $trail->push($ancestor->title, route('category', $ancestor));
//     }

//     $trail->push($category->title, route('category', $category));
// });
