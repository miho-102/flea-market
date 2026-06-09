<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $item_id)
    {
        $request->validate([
        'comment' => 'required|max:255',
        ],
        [
        'comment.required' => 'コメントを入力してください',
        'comment.max' => 'コメントは255文字以内で入力してください',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'item_id' => $item_id,
            'comment' => $request->comment,
        ]);

        return redirect('/item/' . $item_id);
    }
}
