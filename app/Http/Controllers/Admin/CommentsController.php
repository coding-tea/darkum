<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(){
      $comments = Comment::paginate(10);
        return view('pages.admin.comments.index', compact('comments'));
    }

    public function destroy($id){
      $comment = Comment::find($id);
      $comment->delete();
      
      return redirect()->route("commentAdmin")->with([
        "msg" => "Comment deleted Successfully"
      ]);
    }
}
