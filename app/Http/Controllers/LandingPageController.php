<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use App\Models\Room;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index()
    {
        $categories = RoomType::all();
        $rooms = Room::with('roomType')->latest()->take(8)->get();

        return view('penyewa.dashboard', compact('categories', 'rooms'));
    }
}
