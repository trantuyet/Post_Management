<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function store(Request $request)
    {
        try {
            $post = new Post();
            $post->fill($request->all());
            $post->save();

            $data = [
                'status' => 'success',
                'message' => 'Add new post successful!'
            ];
            return response()->json($data);

        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'data' => 'Create new post error!'
            ];
            return response()->json($data);
        }

    }

    function index()
    {
        try {

            $posts = Post::all();
            $data = [
                'status' => 'success',
                'data' => $posts
            ];
            return response()->json($data);

        } catch (\Exception $exception) {
            $data = [
                'status' => 'error',
                'message' => 'Get all posts error!'
            ];
            return response()->json($data);

        }

    }

    function destroy($id) {
        $post = Post::find($id);
        $post->delete();
        $data = [
            'status' => 'success',
            'message' => 'Delete post successful!'
        ];
        return response()->json($data);

    }
}
