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

    public function show($id)
    {
        // IDに基づいてイベント情報を取得
        $event = Event::findOrFail($id);

        // user/event_detail.blade.php を返す
        return view('user.event_detail', compact('event'));
    }

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

    public function complete(Request $request, $id)
    {

        // 入力データのバリデーション
        $request->validate([
            'date' => 'required|date', // dateが必須かつ日付形式であること
        ]);
        
        // ユーザー情報の取得（ログインしていることを前提）
        $userId = auth()->id();

        // イベント情報を取得
        $event = Event::findOrFail($id);

        // Reservation レコードを作成
        \App\Models\Reservation::create([
            'user_id' => $userId,              // 現在のログインユーザーID
            'event_date_id' => $event->id,     // イベントIDを使用
            'status' => 1,                     // 1: 予約受付
        ]);

        // 完了画面を表示
        return view('user.event_complete');
    }



}