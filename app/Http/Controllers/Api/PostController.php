<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Tag;
use App\Image;
use Illuminate\Support\Str;

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
        $data = Post::where('groupe_id', $groupe)->with(['images', 'compte'])->withCount(['comments', 'favorises_user'])->paginate(10);
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

        $imgs = [];
        if ($request->has('images'))
            foreach ($request['images'] as $file) {
                $image = $file;  // your base64 encoded
                $image_arr = explode(',', $image);
                $extention = explode('/', explode(';', $image_arr[0])[0])[1];
                $image = str_replace(' ', '+', $image_arr[1]);
                $imageName = Str::random(20) . '.' . $extention;
                $imgs[] = $imageName;

                /**
                 * Save Image path to db
                 */
                $post->images()->create(['chemin' => $imageName,]);

                \File::put(storage_path() . '/' . $imageName, base64_decode($image));
            }

        $tags = [];
        foreach ($request['tags'] as $tag) {
            $tags[] = Tag::create([
                'label' => $tag,
            ])->id;
        }

        $post->tags()->attach($tags);

        return request()->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($groupe, $id)
    {
        return Post::with(['tags', 'compte', 'images', 'comments' => function ($query) {
            $query->with('user');
        }])->withCount(['comments', 'favorises_user'])->find($id);
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

    public function favoriser($groupe, $id)
    {
        $post = Post::find($id);

        // return response()->json(empty($post->favorises_user()->find(Auth::id())));

        if (empty($post->favorises_user()->find(Auth::id()))) {
            $post->favorises_user()->attach(Auth::id());
            return response()->json(['message' => 'posted Added Succesfuly'], 200);
        }
        return response()->json(['message' => 'posted already existe'], 200);
    }
}
