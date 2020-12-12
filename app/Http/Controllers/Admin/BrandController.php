<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Brand, Pictire};
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate();
        return view('admin.brands.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'     =>  'required|max:191',
            'logo'     =>  'mimes:jpg,jpeg,png|max:1000'
        ]);

        $params = $request->except('_token');
        $collection = collect($params);
        $logo = $this->uploadLogo($request->file("logo"));
        $merge = $collection->merge(compact('logo'));
        $brand = new Brand($merge->all());
        $brand->save();

        // $brand->Brand::create($params);

        if (!$brand) {
            return back()->withInput();
        }
        return redirect()->route('admin.brands.index');
    }

    private function uploadLogo(UploadedFile $file) : string
    {
        $filename = md5($file->getClientOriginalName() . time()).uniqid('', true);
        $file->storeAs("public/brands", $filename);
        return asset("storage/btands/". $filename);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brands.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->products()->delete();

    }
}
