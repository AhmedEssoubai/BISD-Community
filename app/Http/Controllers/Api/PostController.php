<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;

class PostController extends Controller
{

    // private function Validate($request) {

    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($groupe)
    {
        $data = Post::where('groupe_id', $groupe);
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $post = new Post();
        $post->content = $request['content'];

        $post->groupe()->associate($request->route('groupe'));

        $post->compte()->associate(Auth::id());

        $post->save();

        $tags = [];
        foreach ($request['tags'] as $tag) {
            $tags[] = Tag::create([
                'label' => $tag,
            ])->id;
        }

        $post->tags()->attach($tags);
        return $post;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($groupe, $id)
    {
        return Post::with('tags')->find($id);
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
        $post = Post::find($id);
        if ($post->compte_id == Auth::id()) {
            $post->content = $request['content'];

            $post->save();

            $tags = [];
            foreach ($request['tags'] as $tag) {
                $tags[] = Tag::create([
                    'label' => $tag,
                ])->id;
            }

            $post->tags()->attach($tags);
            return response()->json($post->tags);
        }
        return response()->json(['error' => "user " . Auth::user()->nom . " not autorized"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($groupe, $id)
    {
        $post = Post::find($id);
        if ($post->compte_id == Auth::id()) {
            $post->delete();
            return response()->json(['response' => "delated"]);
        }
    }
}
