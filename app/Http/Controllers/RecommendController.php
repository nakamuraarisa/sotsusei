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

        // ここでデータベース保存処理を呼び出す
        $data = [
            'user_id' => auth()->id(),
            'answer_1' => json_encode(session('answer_1')),
            'answer_2' => session('answer_2'),
            'answer_3' => session('answer_3'),
        ];

        RecommendAnswer::create($data);

        // セッションデータをクリア
        session()->forget(['answer_1', 'answer_2', 'answer_3']);

        return redirect()->route('recommend.thankyou'); // 完了ページへリダイレクト
    }

    public function thankyou()
    {
        return view('recommend.thankyou');
    }
}

