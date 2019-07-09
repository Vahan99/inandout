<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Residence;
use App\ResidenceImage;
use App\Region;

class ResidenceController extends BaseController
{
    public function showHotels()
    {
        $model = Residence::whereResidenceType(Residence::residence_type_hotel)->get();
        return view('admin.residence.show', compact('model'));
    }
    public function showHostels()
    {
        $model = Residence::whereResidenceType(Residence::residence_type_hostel)->get();
        return view('admin.residence.show', compact('model'));
    }
    public function showApartments()
    {
        $model = Residence::whereResidenceType(Residence::residence_type_apartment)->get();
        return view('admin.residence.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['residence.add'];
        $region = new Region();
        return view('admin.residence.create',compact('formRoute','region'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:residences',
            'name_en' => 'required|min:3|max:50|unique:residences',
            'name_ru' => 'required|min:3|max:50|unique:residences',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
            'image' => 'max:500',
        ]);
        $req = $request->all();
        $req['slug'] = str_slug($req['name_en']);
        $req['amenities'] = json_encode($request->amenities);
        $req['grid_image'] = $this->fileUpload($request->file('grid_image'), public_path('uploads/'))[0];
        $id = Residence::create($req)->id;

        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        foreach ($images as $image) {
            ResidenceImage::create([
                'residence_id' => $id,
                'image' => $image
            ]);
        }

        if ($request->residence_type == Residence::residence_type_hotel) {
            return redirect()->route('hotel.show')
                ->with(['success', 'Successfully saved to DB!']);
        } elseif ($request->residence_type == Residence::residence_type_hostel) {
            return redirect()->route('hostel.show')
                ->with(['success', 'Successfully saved to DB!']);
        } else {
            return redirect()->route('apartment.show')
               ->with(['success', 'Successfully saved to DB!']);
        }
    }
    public function update(Request $request, $id)
    {
        $formRoute = ['residence.edit', $id];
        $model = Residence::whereId($id)->with('images')->first();
        return view('admin.residence.update',compact('model','formRoute'));
    }
    public function edit(Request $request, $id)
    {
        $model = Residence::find($id);
        $req = $request->all();
        $req['amenities'] = json_encode($request->amenities);

        if(isset($req['grid_image'])) {
            unlink(public_path() . '/uploads/' . $model->grid_image);
            $req['grid_image'] = $this->fileUpload($request->grid_image, public_path('uploads/'))[0];
        }
        
        $model->update($req);
        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        if(isset($req['residence_type'])) {
            $req['data'] = '';
        }

        if(!is_null($images)) {
            foreach($images as $key => $image) {
                ResidenceImage::create([
                    'residence_id' => $id,
                    'image' => $image
                ]);
            }
        }
        return redirect()->back()->with(['success' => 'Residence was successfully updated!']);
    }
    public function delete(Request $request,$id)
    {
        Residence::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Residence was successfully deleted!']);
    }
    public function createUpdateData(Request $request, $id) 
    {
        $model = Residence::findOrFail($id);
        if($model->residence_type == Residence::residence_type_hotel) {
            $createUrl = route('residence.create-update-data-save', ['id' => $model->id]);
            $showUrl = route('hotel.show');
            return view('admin.residence.create-update-data', compact('model', 'createUrl', 'showUrl'));
        } elseif($model->residence_type == Residence::residence_type_hostel) {
            $createUrl = route('residence.create-update-data-save', ['id' => $model->id]);
            $showUrl = route('hostel.show');
            return view('admin.residence.create-update-data', compact('model', 'createUrl', 'showUrl'));
        }
        else {
            $createUrl = route('residence.create-update-data-save', ['id' => $model->id]);
            $showUrl = route('apartment.show');
            return view('admin.templates.price-policy', compact('model', 'createUrl', 'showUrl'));
        }
    }
    public function deleteData(Request $request, $id)
    {
        $model = Residence::findOrFail($id);
        $model->update([
            $model->data = null
        ]);
        return redirect()->back()->with(['success' => 'Success']);
    }
    public function createUpdateDataSave(Request $request)
    {
        if($request->ajax()) {
            $model = Residence::findOrFail($request->id);
            $model->update([
                'data' => json_encode($request->data)
            ]);
            $model->save();
        }
        return response('success', 200);        
    }

    public function createUpdateAmenities(Request $request, $id) 
    {
        $model = Residence::findOrFail($id);
        if($model->residence_type == Residence::residence_type_apartment) {
            $showUrl = route('apartment.show');
        } elseif($model->residence_type == Residence::residence_type_hotel) {
            $showUrl = route('hotel.show');
        } else {
            $showUrl = route('hostel.show');
        }
        return view('admin.residence.amenities', compact('model', 'showUrl'));
    }
    public function deleteAmenities(Request $request, $id)
    {
        $model = Residence::findOrFail($id);
        $model->update([
            $model->amenities = null
        ]);
        return redirect()->back()->with(['success' => 'Success']);
    }
    public function createUpdateAmenitiesSave(Request $request)
    {
        if($request->ajax()) {
            $model = Residence::findOrFail($request->id);
            $model->update([
                'amenities' => json_encode($request->data)
            ]);
            $model->save();
        }
        return response('success', 200);        
    }
    public function deleteImage($id)
    {
        $image = ResidenceImage::find($id)->image;
        ResidenceImage::destroy($id);
        unlink(public_path() . '/uploads/' . $image);

        return redirect()->back()->with(['success' => 'Image was successfully deleted!']);
    }
}
