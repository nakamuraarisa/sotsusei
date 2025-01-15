<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RecommendAnswer;

class RecommendController extends Controller
{
    public function question1()
    {
        return view('recommend.question1');
    }

    public function storeAnswer1(Request $request)
    {
        $request->validate([
            'answer_1' => 'required', // 必須チェック
        ]);

        session(['answer_1' => $request->input('answer_1')]); // セッションに保存
        return redirect()->route('recommend.question2'); // 次の質問ページへ
    }

    public function question2()
    {
        return view('recommend.question2');
    }

    public function storeAnswer2(Request $request)
    {
        $request->validate([
            'answer_2' => 'required',
        ]);

        session(['answer_2' => $request->input('answer_2')]);
        return redirect()->route('recommend.question3');
    }

    public function question3()
    {
        return view('recommend.question3');
    }

    public function storeAnswer3(Request $request)
{
    $request->validate([
        'answer_3' => 'required',
    ]);

    session(['answer_3' => $request->input('answer_3')]);

    // ここでデータを保存
    $data = [
        'user_id' => auth()->id(),
        'answer_1' => json_encode(session('answer_1')),
        'answer_2' => session('answer_2'),
        'answer_3' => session('answer_3'),
    ];

    $recommendAnswer = RecommendAnswer::create($data);

    // セッションデータをクリア
    session()->forget(['answer_1', 'answer_2', 'answer_3']);

    // レコメンド結果を取得（仮のデータを返す処理）
    $recommendations = $this->getRecommendations($recommendAnswer);

    return view('recommend.result', compact('recommendations'));
}

/**
 * レコメンド結果を生成するメソッド
 *
 * @param RecommendAnswer $recommendAnswer
 * @return array
 */
private function getRecommendations(RecommendAnswer $recommendAnswer)
{
    // 仮のレコメンドロジック（後でAPI連携などに置き換える）
    return [
        '地域清掃活動',
        '高齢者支援ボランティア',
        '子ども教育支援活動',
    ];
}


    public function thankyou()
    {
        return view('recommend.thankyou');
    }
}

