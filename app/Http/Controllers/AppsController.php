<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Items;
use App\Models\Unit;
use App\Models\Category;

class AppsController extends Controller
{
    public function index()
    {
        return view('apps.index', [
            'items' => Items::count(),
            'categories' => Category::count(),
            'satuan' => Unit::count()

        ]);
    }

    public function qrcode()
    {
        return view('apps.items.qrcode-reader');
    }
}
