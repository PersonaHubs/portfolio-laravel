<?php

namespace App\Http\Controllers;

class PortfolioController extends Controller
{
    public function about()
    {
        return view('portfolio.about');
    }

    public function projects()
    {
        return view('portfolio.projects');
    }

    public function skills()
    {
        return view('portfolio.skills');
    }

    public function contact()
    {
        return view('portfolio.contact');
    }
}
