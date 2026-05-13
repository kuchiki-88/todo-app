<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 一覧取得
    public function index()
    {
        return response()->json(
            Todo::where('user_id', auth()->id())->get()
        );
    }

    // 新規作成
    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required|max:255'
        ]);
        
        $todo = Todo::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
        ]);

        return response()->json($todo);
    }

    // 更新
    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $todo->update(
        $request->only([
            'title',
            'completed'
        ])
    );

        return response()->json($todo);
    }

    // 削除
    public function destroy($id)
    {
        Todo::destroy($id);

        return response()->json([
            'message' => 'deleted'
        ]);
    }
}