<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;

class CurrentReservationController extends Controller
{
    public function index()
    {
        // 現在の予約を取得
        $currentReservations = Reservation::where('user_id', auth()->id())
        ->where('status', 1)
        ->with('eventDate.event')
        ->get()
        ->sortBy(function ($reservation) {
            return $reservation->eventDate->date; // リレーションを利用してソート
        });

        // ビューにデータを渡す
        return view('user.home', [
            'currentReservations' => $currentReservations,
        ]);
    }
}
