<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use \App\Restaurant;
use \App\Region;
use \App\RestaurantImage ;

class RestaurantController extends BaseController
{
    public function show()
    {
        $model = Restaurant::all();
        return view('admin.restaurant.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['restaurant.add'];
        $region = new Region();
        return view('admin.restaurant.create',compact('formRoute','region'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:restaurants',
            'name_en' => 'required|min:3|max:50|unique:restaurants',
            'name_ru' => 'required|min:3|max:50|unique:restaurants',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
            'address_hy' => 'required',
            'address_en' => 'required',
            'address_ru' => 'required',
            'image' => 'required|max:1000',
        ]);
        $req = $request->all();
        $req['slug'] = str_slug($req['name_en']) ; 
        $req['grid_image'] = $this->fileUpload($request->file('grid_image'), public_path('uploads/'))[0];
        $id = Restaurant::create($req)->id;
        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        foreach($images as $image) {
            RestaurantImage::create([
                'restaurant_id' => $id,
                'image' => $image,
            ]);
        }

       return redirect()->route('restaurant.show')
           ->with(['success', 'Successfully saved to DB!']);
    }

    public function update(Request $request, $id)
    {
        $formRoute = ['restaurant.edit', $id];
        $model = Restaurant::whereId($id)->with('images')->first();
        return view('admin.restaurant.update',compact('model','formRoute'));
    }

    public function edit(Request $request, $id)
    {
        $model = Restaurant::find($id);
        $req = $request->all();
        if(isset($req['grid_image'])) {
            unlink(public_path('uploads/') . $model->grid_image);
            $req['grid_image'] = $this->fileUpload($request->file('grid_image'), public_path('uploads/'))[0];
        }

        $model->update($req);
        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));
        if(!is_null($images)) {
            foreach($images as $image) {
                RestaurantImage::create([
                    'restaurant_id' => $id,
                    'image' => $image
                ]);
            }
        }
        return redirect()->back()->with(['success' => 'Tour was successfully updated!']);
    }

    public function delete(Request $request,$id)
    {
        Restaurant::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Restaurant was successfully deleted!']);
    }

    public function deleteImage($id)
    {
        $image = RestaurantImage::find($id);
        unlink(public_path('uploads/') . $image->image);
        $image->delete();
        return redirect()->back()->with(['success' => 'Image was successfully deleted!']);
    }
}
