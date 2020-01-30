<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($post)
    {
        //
        $comments = Comment::where('post_id', $post);

        return response()->json($comments);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $groupe, $post, $parentComment = null)
    {
        //
        $comment = new Comment();
        $comment->content = $request['content'];
        $comment->save();

        $comment->post()->associate($post);

        if (!empty($parentComment)) {
            $comment->parentComment()->associate($comment);
        }

        return response()->json($comment);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($groupe, $id)
    {
        //
        return response()->json(Comment::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $groupe, $id)
    {
        //
        $comment = Comment::find($id);
        if ($comment->comment_id == Auth::id()) {
            $comment->content = $request['content'];
            $comment->save();

            return response()->json($comment);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($groupe, $id)
    {
        $comment = Comment::find($id);

        if ($comment->comment_id == Auth::id()) {
            $comment->delete();
        }
    }
}
