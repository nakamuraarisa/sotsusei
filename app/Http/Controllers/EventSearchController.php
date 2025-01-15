<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventDate;
use App\Models\Event;

class EventSearchController extends Controller
{
    /**
     * イベント検索処理
     */
    public function search(Request $request)
    {
        // 検索フォームからの日付データを取得
        $searchDate = $request->input('date');

        // 検索条件が指定されているかどうか
        $hasSearched = false;
        $events = collect(); // デフォルトは空のコレクション

        if ($searchDate) {
            $hasSearched = true;

            // 日付が指定されている場合、その日付に該当するイベントを取得
            $eventDates = EventDate::where('date', $searchDate)->get();

            // EventDateからイベントを取得
            $events = $eventDates->map(function ($eventDate) {
                return $eventDate->event;
            });
        } else {
            $hasSearched = true;

            // 日付が指定されていない場合、未来の日付に関連するイベントを取得
            $today = now()->toDateString();

            $eventDates = EventDate::where('date', '>=', $today)->get();

            // EventDateからイベントを取得
            $events = $eventDates->map(function ($eventDate) {
                return $eventDate->event;
            })->unique(); // 同じイベントが重複しないようにする
        }

        // 検索結果をビューに渡す
        return view('user.search_results', [
            'events' => $events,
            'hasSearched' => $hasSearched,
        ]);
    }

    /**
     * イベント詳細画面表示
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        // 該当イベントの日程を取得
        $availableDates = EventDate::where('event_id', $id)
            ->whereDoesntHave('reservations', function ($query) {
                $query->where('status', 1); // 確定済みの予約を除外
            })
            ->pluck('date');

        return view('user.event_detail', compact('event', 'availableDates'));
    }

    /**
     * 予約確認画面
     */
    public function confirm(Request $request, $id)
    {
        // 入力値のバリデーション
        $validated = $request->validate([
            'date' => 'required|date', // 日付が必須
        ]);

        // イベント情報を取得
        $event = Event::findOrFail($id);

        // 確認画面を表示
        return view('user.event_confirm', [
            'event' => $event,
            'date' => $validated['date'],
        ]);
    }

    /**
     * 予約完了処理
     */
    public function complete(Request $request, $id)
    {
        // 入力データのバリデーション
        $request->validate([
            'date' => 'required|date', // dateが必須かつ日付形式であること
        ]);

        // ユーザー情報の取得（ログインしていることを前提）
        $userId = auth()->id();

        // イベント情報を取得
        $eventDate = EventDate::where('event_id', $id)
            ->where('date', $request->input('date'))
            ->firstOrFail();

        // Reservation レコードを作成
        \App\Models\Reservation::create([
            'user_id' => $userId,              // 現在のログインユーザーID
            'event_date_id' => $eventDate->id, // イベント日付ID
            'status' => 1,                     // 1: 予約受付
        ]);

        // 完了画面を表示
        return view('user.event_complete');
    }
}
