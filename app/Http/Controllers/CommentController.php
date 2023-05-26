<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Lexer\TokenEmulator\CoaleseEqualTokenEmulator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($announce_id)
    {
        $comments = DB::table('comments')->where('AnnounceId', $announce_id)->get()->toArray();
        $names = [];
        foreach($comments as $comment){
            $name = User::find($comment->userId)->name;
            array_push($names, $name);
        }
        return view('pages.user.comments.index', compact('comments', 'names'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $userId = auth()->id();
        $comment = Comment::create([
            'comment' => $request->comment,
            'userId' => $userId,
            'AnnounceId' => $request->AnnounceId
        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::destroy($id);
        return redirect()->back()->with([
          'msg' => "Comment Deleted successfully",
        ]);
    }
}
