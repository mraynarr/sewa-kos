<?php

namespace App\Http\Controllers;

use App\Models\AdditionalService;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index(): View
    {
        $rooms = Room::with('roomType')
            ->where('status', 'available')
            ->inRandomOrder()
            ->take(8)
            ->get();

        $categories = RoomType::all();

        return view('index', compact('rooms', 'categories'));
    }

    public function show(string $id): View
    {
        $room = Room::with('roomType')->findOrFail($id);
        $services = AdditionalService::all();

        return view('rooms.show', compact('room', 'services'));
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
