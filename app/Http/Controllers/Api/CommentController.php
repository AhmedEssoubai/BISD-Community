<?php

namespace App\Http\Controllers\Api;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groupe, $post)
    {
        //
        $comments = Comment::where('post_id', $post)->get();

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
        $postObj = Post::find($post);
        $comment = new Comment();
        if ($postObj) {

            // 'content' => $request['content'],
            // $comment = $postObj->comments()->get();

            $comment->content = $request['content'];

            $comment->user()->associate(Auth::id());
            $comment->post()->associate($post);

            if (!empty($parentComment)) {
                $comment->parentComment()->associate($comment);
            }

            $comment->save();
            return response()->json($comment);
        }
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
        return response()->json(['comment' => Comment::find($id)]);
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
        if ($comment->compte_id == Auth::id()) {
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

        if ($comment->compte_id == Auth::id()) {
            $comment->delete();
        }
    }
}
