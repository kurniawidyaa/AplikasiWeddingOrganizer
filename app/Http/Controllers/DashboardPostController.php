<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use PhpParser\Node\Expr\PostDec;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            'submit' => 'Tambah Data',
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'submit' => 'Simpan',
            'postCategory' => PostCategory::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        try {
            $attr = $request->all();
            $slug = Str::slug($request->title);
            $excerpt = Str::limit(strip_tags($request->body), 200);
            $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/posts') : null;
            $attr['slug'] = $slug;
            $attr['excerpt'] = $excerpt;
            $attr['thumbnail'] = $thumbnail;
            Post::create($attr);
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        Alert::toast('<p style="color:#ffffff">Data berhasil ditambahkan!</p>', 'success')
            ->width('24rem')->background('#486a34')->padding('0,25rem');

        if (Auth::guard('owner')) {
            return redirect()->route('owner.dbpost.index');
        } elseif (Auth::guard('admin')) {
            return redirect()->route('admin.dbpost.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        return view('dashboard.posts.edit', [
            'submit' => 'Update',
            'post' => $post,
            'postcategory' => PostCategory::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        try {
            $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/posts') : null;
            $post = Post::where('slug', '=', $slug)->firstOrFail();
            $excerpt = Str::limit(strip_tags($request->body), 200);

            // diambil dari Post model
            if ($post) {
                $post->title = $request->title;
                $post->thumbnail = $thumbnail;
                $post->excerpt = $excerpt;
                $post->body = $request->body;
                $post->save();
            }
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        // return response()->json($post);

        Alert::toast('<p style="color:#ffffff">Data berhasil diupdate!</p>', 'success')
            ->width('24rem')->background('#486a34')->padding('0,25rem');

        if (Auth::guard('owner')) {
            return redirect()->route('owner.dbpost.index');
        } elseif (Auth::guard('admin')) {
            return redirect()->route('admin.dbpost.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $Post
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Post::where('slug', $slug)->delete();
        return response()->json(['status' => 'Data anda berhasil dihapus.']);
        return back();
    }
}
