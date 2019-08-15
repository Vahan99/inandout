<?php

namespace App\Http\Controllers\Admin;

use App\CarDriverSliderImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\CarDriver;
use Illuminate\Validation\Rule;
class CarDriverController extends BaseController
{
    public function show()
    {
        $model = CarDriver::all();
        return view('admin.driver.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['driver.add'];
        return view('admin.driver.create',compact('formRoute'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:car_driver',
            'name_en' => 'required|min:3|max:50|unique:car_driver',
            'name_ru' => 'required|min:3|max:50|unique:car_driver',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
            'image' => 'max:1000',
            // 'grid_image' => ''
        ]);
        $req = $request->all();
        $req['grid_image'] = $this->fileUpload($request->file('grid_image'), public_path('uploads/'))[0];
        $req['slug'] = str_slug($req['name_en']);

        $id = CarDriver::create($req)->id;

        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        if(!is_null($images)) {
            foreach($images as $image) {
                CarDriverSliderImage::create([
                    'car_driver_id' => $id,
                    'name' => $image,
                ]);
            }
        }
       return redirect()->route('driver.show')
           ->with(['success', 'Successfully saved to DB!']);
    }

    public function update(Request $request, $id)
    {
        $formRoute = ['driver.edit', $id];
        $model = CarDriver::whereId($id)->first();
        return view('admin.driver.update',compact('model','formRoute'));
    }

    public function edit(Request $request, $id)
    {
        $model = CarDriver::find($id);
        $req = $request->all();
        if(isset($req['grid_image'])){
            if($model->grid_image && file_exists(public_path('uploads/'.$model->grid_image))) {
                unlink(public_path() . '/uploads/' . $model->grid_image);
                $req['grid_image'] = $this->fileUpload($request->grid_image, public_path('uploads/'))[0];
            }else{
                $req['grid_image'] = $this->fileUpload($request->grid_image, public_path('uploads/'))[0];
            }
        }

        $req['with_driver'] = isset($req['with_driver']);

        if($req['with_driver'] != $model->with_driver) {
            $model['data'] = '';
        }

        $model->update($req);
        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        if(!is_null($images)) {
            foreach($images as $image) {
                CarDriverSliderImage::create([
                    'car_driver_id' => $id,
                    'name' => $image,
                ]);
            }
        }

        return redirect()->route('driver.show', [$model->slug])->with(['success' => 'CarDriver was successfully updated!']);
    }
    public function delete(Request $request,$id)
    {
        CarDriver::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'CarDriver was successfully deleted!']);
    }

    public function createUpdateData(Request $request, $id)
    {
        $model = CarDriver::findOrFail($id);
        $showUrl = route('driver.show');
        $createUrl = route('driver.create-update-data-save', ['id' => $model->id]);
        if($model->with_driver) {
            return view('admin.driver.with-driver-pp', compact('model', 'createUrl', 'showUrl'));
        }
        return view('admin.driver.driver-price-policy', compact('model', 'createUrl', 'showUrl'));
    }
    public function deleteData(Request $request, $id)
    {
        $model = CarDriver::findOrFail($id);
        $model->update([
            $model->data = null
        ]);
        return redirect()->back()->with(['success' => 'Success']);
    }
    public function createUpdateDataSave(Request $request)
    {
        if($request->ajax()) {
            $model = CarDriver::findOrFail($request->id);
            $model->update([
                'data' => json_encode($request->data)
            ]);
            $model->save();
        }
        return response('success', 200);        
    }
    public function deleteSliderImage($id)
    {
        $image = CarDriverSliderImage::find($id)->name;
        CarDriverSliderImage::destroy($id);
        unlink(public_path() . '/uploads/' . $image);

        return redirect()->back();
    }

    public function createUpdateAmenities(Request $request, $id)
    {
        $model = CarDriver::findOrFail($id);
        $showUrl = route('driver.show');
        $createUrl = route('driver.create-update-amenities-save', ['id' => $model->id]);
        return view('admin.driver.amenities', compact('model', 'showUrl', 'createUrl'));
    }
    public function deleteAmenities(Request $request, $id)
    {
        $model = CarDriver::findOrFail($id);
        $model->update([
            $model->amenities = null
        ]);
        return redirect()->back()->with(['success' => 'Success']);
    }
    public function createUpdateAmenitiesSave(Request $request)
    {
        if($request->ajax()) {
            $model = CarDriver::findOrFail($request->id);
            $model->update([
                'amenities' => json_encode($request->data)
            ]);
            $model->save();
        }
        return response('success', 200);
    }
}
