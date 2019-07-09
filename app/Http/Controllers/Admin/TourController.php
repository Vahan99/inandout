<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Tour;
use App\Region;
use App\TourImage;
use App\TourType;
class TourController extends BaseController
{
    public function show()
    {
        $model = Tour::all();
        return view('admin.tour.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['tour.add'];
        $region = new Region();
        return view('admin.tour.create',compact('formRoute','region'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|unique:tours',
            'name_en' => 'required|min:3|unique:tours',
            'name_ru' => 'required|min:3|unique:tours',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
            'image' => 'max:500',
        ]);
        $req = $request->all();
//        dd($req);
        $req['grid_image'] = $this->fileUpload($request->file('grid_image'), public_path('uploads/'))[0];
        $req['slug'] = str_slug($req['name_en']);
        if(isset($req['tour_type_id'])) {
            $req['tour_type_id'] = isset($req['tour_type_children']) ? $req['tour_type_children'] :  $req['tour_type_id'];
            if(isset($req['tour_type_children'])) {
                unset($req['tour_type_children']);
            }
        }

        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));
//        dd($req);

        $id = Tour::create($req)->id;

        foreach($images as $image) {
            TourImage::create([
                'tour_id' => $id,
                'image' => $image,
            ]);
        }

        return redirect()->route('tour.show')
            ->with(['success', 'Successfully saved to DB!']);
    }

    public function update(Request $request, $id)
    {
        $formRoute = ['tour.edit', $id];
        $model = Tour::whereId($id)->with('images', 'type.parentTourType', 'type.childrenTourTypes')->first();

        return view('admin.tour.update',compact('model','formRoute'));
    }

    public function edit(Request $request, $id)
    {
        $model = Tour::find($id);
        $req = $request->all();
        if(isset($req['tour_type_id'])) {
            $req['tour_type_id'] = isset($req['tour_type_children']) ? $req['tour_type_children'] :  $req['tour_type_id'];
            if(isset($req['tour_type_children'])) {
                unset($req['tour_type_children']);
            }
        }

        if(isset($req['grid_image'])) {
            unlink(public_path('uploads/') . $model->grid_image);
            $req['grid_image'] = $this->fileUpload($request->grid_image, public_path('uploads/'))[0];
        }

        $req['sightseeing_place'] = isset($req['sightseeing_place']);

        $model->update($req);
        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        if(!is_null($images)) {
            foreach($images as $image) {
                TourImage::create([
                    'tour_id' => $id,
                    'image' => $image
                ]);
            }
        }
        return redirect()->back()->with(['success' => 'Tour was successfully updated!']);
    }

    public function delete(Request $request,$id)
    {
        Tour::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Tour was successfully deleted!']);
    }

    public function deleteImage($id)
    {
        $tourImage = TourImage::find($id);
        unlink(public_path('uploads/') . $tourImage->image);
        $tourImage->delete();
        return redirect()->back()->with(['success' => 'Image was successfully deleted!']);
    }

    // Tour Types
    public function createTourType()
    {
        $formRoute = ['tour.addTourType'];
        $model = new TourType;
        return view('admin.tour-type.create', compact('model', 'formRoute'));
    }

    public function addTourType(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:150',
            'name_en' => 'required|min:3|max:150',
            'name_ru' => 'required|min:3|max:150',
        ]);
        $req = $request->all();
        $req['image'] = $this->fileUpload($request->file('image'), public_path('uploads/'))[0];
        $req['slug'] = str_slug($req['name_en']);
        TourType::create($req);
        return redirect()->route('tour.all-tour-types')
            ->with(['success', 'Successfully saved to DB!']);
    }

    public function allTourTypes()
    {
        $model = TourType::all();
        return view('admin.tour-type.show', compact('model'));
    }

    public function deleteTourType($id)
    {
        TourType::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Tour Type was successfully deleted!']);
    }

    public function updateTourType($id)
    {
        $formRoute = ['tour.update-tour-type-post', $id];
        $model = TourType::whereId($id)->first();
        return view('admin.tour-type.update',compact('model','formRoute'));
    }

    public function updateTourTypePost(Request $request, $id)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:150',
            'name_en' => 'required|min:3|max:150',
            'name_ru' => 'required|min:3|max:150',
        ]);

        $model = TourType::find($id);
        $req = $request->all();
        if(isset($request->image)) {
            $req['image'] = $this->fileUpload($request->file('image'), public_path('uploads/'))[0];
            if($model->image) {
                unlink(public_path('uploads/') . $model->image);
            }
        }
        $model->update($req);
        return redirect()->route('tour.all-tour-types')
            ->with(['success', 'Successfully updated!']);
    }

    public function getChildrenTourTypes(Request $request)
    {
        if(!is_null($request->id)) {
            $model = TourType::whereId($request->id)->with('childrenTourTypes')->first()->childrenTourTypes->toArray();
            return response()->json($model);
        } else {
            return response()->json(false);
        }
    }

    public function createUpdateData(Request $request, $id)
    {
        $model = Tour::findOrFail($id);
        $showUrl = route('tour.show');
        $createUrl = route('tour.create-update-data-save', $model->id);
        return view('admin.templates.tour-price-policy', compact('model', 'createUrl', 'showUrl'));
    }
    public function deleteData(Request $request, $id)
    {
        $model = Tour::findOrFail($id);
        $model->update([
            $model->data = null
        ]);
        return redirect()->back()->with(['success' => 'Success']);
    }
    public function createUpdateDataSave(Request $request)
    {
        if($request->ajax()) {
            $model = Tour::findOrFail($request->id);
            $model->update([
                'data' => json_encode($request->data),
                'duration' => json_encode($request->duration)
            ]);
            $model->save();
        }
        return response('success', 200);
    }

}
