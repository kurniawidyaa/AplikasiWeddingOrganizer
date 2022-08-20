<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceCategoryRequest;
use App\Models\ServiceCategory;
use Exception;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ServiceCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('dashboard.service.category.index', [
            'title' => 'Services',
            'submit' => 'Tambah',
            'servicecat' => ServiceCategory::all(),
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
    public function store(ServiceCategoryRequest $request)
    {
        $attr = $request->all();
        $identifier = Str::slug($request->name);
        $attr['identifier'] = $identifier;

        ServiceCategory::create($attr);

        Alert::toast('<p style="color:#ffffff">Data berhasil ditambahkan!</p>', 'success')
            ->width('24rem')->background('#486a34')->padding('0,25rem');

        return back();
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
    public function edit($identifier)
    {
        $kategoriLayanan = ServiceCategory::where('identifier', $identifier)->first();

        return view('dashboard.service.category.edit', [
            'servcat' => $kategoriLayanan,
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
    public function update(Request $request, $identifier)
    {
        try {
            $servcat = ServiceCategory::where('identifier', '=', $identifier)->firstOrFail();

            // Make sure you've got the servcat model
            if ($servcat) {
                $servcat->name = $request->name;
                $servcat->save();
            }

            Alert::toast('<p style="color:#ffffff">Data berhasil diupdate!</p>', 'success')
                ->width('24rem')->background('#486a34')->padding('0,25rem');

            return redirect('/owner/servcat');
        } catch (Exception $e) {

            $message = $e->getMessage();
            var_dump('Exception Message: ' . $message);

            $code = $e->getCode();
            var_dump('Exception Code: ' . $code);

            $string = $e->__toString();
            var_dump('Exception String: ' . $string);

            exit;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($identifier)
    {
        ServiceCategory::where('identifier', $identifier)->delete();

        return response()->json(['status' => 'Data anda berhasil dihapus.']);
    }
}
