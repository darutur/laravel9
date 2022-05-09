<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;    
        $this->user = $user;    
    }

    public function index($userID)
    {
        if (!$user = $this->user->find($userID)) {
            return redirect()->back();
        }

        $comments = $user->comments()->get();

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($userID)
    {
        if (!$user = $this->user->find($userID)) {
            return redirect()->back();
        }

        $comments = $user->comments()->get();

        return view('users.comments.create', compact('user'));
    }

    public function store(Request $request, $userID)
    {
        if (!$user = $this->user->find($userID)) {
            return redirect()->back();
        }

        $user->comments()->create([
            'body' => $request->body,
            'visible' => isset($request->visible),
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userID, $id)
    {
        if (!$comment = $this->comment->find($id)) {
            return redirect()->back();
        }

        $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }

    public function update(Request $request, $id)
    {
        if (!$comment = $this->comment->find($id)) {
            return redirect()->back();
        }

        $comment->update([
            'body' => $request->body,
            'visible' => isset($request->visible),
        ]);

        return redirect()->route('comments.index', $comment->user_id);
    }
}