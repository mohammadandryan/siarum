<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Redirect;

class PageController extends Controller
{
    public function index()
    {
        $events = Event::latest()->limit(3)->get();
        return view('page.index', compact('events'));
    }
    public function soon()
    {
        return view('page.soon', ['title' => 'Cooming Soon']);
    }

    public function home()
    {

        return view('dashboard.index');
    }
  

}
