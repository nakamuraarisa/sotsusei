<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventDate; // EventDateモデル
use App\Models\Event;     // Eventモデル

class EventSearchController extends Controller
{
    /**
     * イベント検索処理
     */
    public function search(Request $request)
    {
        // 検索フォームからの日付データを取得
        $date = $request->input('date');

        // 検索クエリ: 指定された日付でイベントを検索
        $eventDates = EventDate::where('date', $date)->get();

        // EventDateを元にEvent情報を取得
        $events = $eventDates->map(function ($eventDate) {
            return $eventDate->event; // リレーションを通じてEventモデルを取得
        });

        // 結果をビューに渡す
        return view('user.home', ['events' => $events, 'date' => $date]);
    }
}
