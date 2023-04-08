<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function delivery()
    {
        return view('pages.delivery');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function privacy()
    {
        return view('pages.privacypolicy');
    }

    public function returns()
    {
        return view('pages.returns');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function sitemap()
    {
        return view('pages.sitemap');
    }
}
