<?php

namespace App\Http\Controllers\Penyewa;

use App\Http\Controllers\Controller;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\AdditionalService; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashboardPeController extends Controller
{
    public function index()
    {
        $categories = RoomType::all();
        $rooms = Room::with('roomType')->latest()->take(8)->get();

        return view('penyewa.dashboard', compact('categories', 'rooms'));
    }

    public function show($id)
    {
        $room = Room::with('roomType')->findOrFail($id);
        $services = AdditionalService::all();

        return view('penyewa.show', compact('room', 'services'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('penyewa.profile', compact('user'));
    }
}
