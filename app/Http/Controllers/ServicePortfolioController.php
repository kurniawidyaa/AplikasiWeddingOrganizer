<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicePortfolioRequest;
use App\Models\ServiceCategory;
use App\Models\ServicePortfolio;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class ServicePortfolioController extends Controller
{
    public function index()
    {
        if (request('serviceCategory')) {
            $serviceCategory = ServiceCategory::firstwhere('id', request('serviceCategory'));
        }

        $pagination = ServicePortfolio::latest()->filter(request(['search', 'serviceCategory']))->paginate(20)->withQueryString();
        return view('dashboard.service.portfolio.index', [
            'submit' => 'Tambah data',
            'portfolio' => $pagination,
            'servcategories' => ServiceCategory::all(),
        ]);
    }

    public function create()
    {
        return view('dashboard.service.portfolio.create', [
            'title' => 'Tambah Portfolio',
            'submit' => 'Simpan',
            'servcategories' => ServiceCategory::all(),
        ]);
    }

    public function store(ServicePortfolioRequest $request)
    {
        try {

            $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/portfolio') : null;
            $attr = $request->all();

            $attr['thumbnail'] = $thumbnail;

            ServicePortfolio::create($attr);

            Alert::toast('<p style="color:#ffffff">Data berhasil ditambahkan!</p>', 'success')
                ->width('24rem')->background('#486a34')->padding('0,25rem');

            if (Auth::guard('owner')) {
                return redirect()->route('owner.port.index'); //using name route
            } elseif (Auth::guard('admin')) {
                return redirect()->route('admin.port.index');
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

        return response()->json($attr);
    }

    public function edit($id)
    {
        $portfolio = ServicePortfolio::where('id', $id)->first();
        return view('dashboard.service.portfolio.edit', [
            'portfolio' => $portfolio,
            'submit' => 'Update',
            'servcategory' => ServiceCategory::all(),
        ]);
    }

    public function update(ServicePortfolioRequest $request, $id)
    {
        $thumbnail = request()->file('thumbnail') ? request()->file('thumbnail')->store('images/portfolio') : null;

        ServicePortfolio::where('id', $id)
            ->update([
                'service_category_id' => $request->service_category_id,
                'thumbnail' => $thumbnail,
            ]);
        Alert::toast('<p style="color:#ffffff">Data berhasil diupdate!</p>', 'success')
            ->width('24rem')->background('#486a34')->padding('0,25rem');

        if (Auth::guard('owner')) {
            return redirect()->route('owner.port.index'); //using name route
        } elseif (Auth::guard('admin')) {
            return redirect()->route('admin.port.index');
        }
    }

    public function destroy($id)
    {
        ServicePortfolio::where('id', $id)->delete();
        return response()->json(['status' => 'Data anda berhasil dihapus.']);
    }

    public function show()
    {
        return view('portfolio', [
            'portfolio' => ServicePortfolio::latest()->paginate(6),
            'category' => ServiceCategory::all(),
            'title' => 'Portfolio'
        ]);
    }
}
