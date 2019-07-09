<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Region;
use App\RegionImage;
class RegionController extends BaseController
{
    public function show()
    {
        $model = Region::all();
        return view('admin.region.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['region.add'];
        $region = new Region();
        return view('admin.region.create',compact('formRoute','region'));
    }

    public function add(Request $request)
    {
//        dd($request->all());
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:regions',
            'name_en' => 'required|min:3|max:50|unique:regions',
            'name_ru' => 'required|min:3|max:50|unique:regions',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
            'image' => 'max:500'
        ]);
        $req = $request->all();
        $req['slug'] = str_slug($req['name_en']);
        $id = Region::create($req)->id;

        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        foreach($images as $image) {
            RegionImage::create([
                'region_id' => $id,
                'image' => $image,
            ]);
        }

       return redirect()->route('region.show')
           ->with(['success', 'Successfully saved to DB!']);
    }
    public function update(Request $request, $id)
    {
        $formRoute = ['region.edit', $id];
        $model = Region::whereId($id)->with('images')->first();
        return view('admin.region.update',compact('model','formRoute'));
    }
    public function edit(Request $request, $id)
    {
        $model = Region::find($id);
        $model->update($request->all());
        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        if(!is_null($images)) {
            foreach($images as $image) {
                RegionImage::create([
                    'region_id' => $id,
                    'image' => $image
                ]);
            }
        }

        return redirect()->back()->with(['success' => 'Region was successfully updated!']);
    }
    public function delete(Request $request,$id)
    {
        Region::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Region was successfully deleted!']);
    }
    public function deleteImage($id)
    {
        $model = RegionImage::find($id);
        unlink(public_path('uploads/') . $model->image);
        $model->delete();
        return redirect()->back()->with(['success' => 'Image was successfully deleted!']);
    }
}