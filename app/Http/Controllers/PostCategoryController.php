<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCategoryRequest;
use App\Models\PostCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.category.index', [
            'submit' => 'Tambah',
            'postcategory' => PostCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostCategoryRequest $request)
    {
        $attr = $request->all();
        $slug = Str::slug($request->name);
        $attr['slug'] = $slug;

        PostCategory::create($attr);

        Alert::toast('<p style="color:#ffffff">Data berhasil ditambahkan!</p>', 'success')
            ->width('24rem')->background('#486a34')->padding('0,25rem');

        if (Auth::guard('owner')) {
            return redirect()->route('owner.postcat.index');
        } elseif (Auth::guard('admin')) {
            return redirect()->route('owner.postcat.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $kategoripost = PostCategory::where('slug', $slug)->firstOrFail();

        return view('dashboard.posts.category.edit', [
            'postcat' => $kategoripost,
            'submit' => 'Update'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        try {
            $postcat = PostCategory::where('slug', '=', $slug)->firstOrFail();
            $postcat->name = $request->name;
            $postcat->save();

            Alert::toast('<p style="color:#ffffff">Data berhasil diupdate!</p>', 'success')
                ->width('24rem')->background('#486a34')->padding('0,25rem');
        } catch (Exception $e) {
            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }

        if (Auth::guard('owner')) {
            return redirect()->route('owner.postcat.index');
        } elseif (Auth::guard('admin')) {
            return redirect()->route('admin.postcat.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        PostCategory::where('slug', $slug)->delete();
        return response()->json(['status' => 'Data anda berhasil dihapus.']);
    }
}
