<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    // 一覧取得
    public function index()
    {
        return Todo::where('user_id', auth()->id())->get();
    }

    // 保存
    public function store(Request $request)
    {
        return Todo::create([
            'title' => $request->title,
            'user_id' => auth()->id(),
        ]);
    }

    // 更新
    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);

        $todo->update([
            'completed' => $request->completed
        ]);

        return $todo;
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