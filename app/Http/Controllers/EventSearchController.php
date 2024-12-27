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

        // 検索が実行されたかどうかを判定
        $hasSearched = !empty($date);

        $events = collect(); // デフォルトは空のコレクション

        // 検索条件が入力されている場合のみ検索を実行
        if ($hasSearched) {
            $eventDates = EventDate::where('date', $date)->get();

            // EventDateを元にEvent情報を取得
            $events = $eventDates->map(function ($eventDate) {
                return $eventDate->event; // リレーションを通じてEventモデルを取得
            });
        }

        // 結果をビューに渡す
        return view('user.home', [
            'events' => $events,
            'date' => $date,
            'hasSearched' => $hasSearched, // 検索状態を渡す
        ]);
    }
}