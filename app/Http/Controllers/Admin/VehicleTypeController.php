<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\VehicleType;
use Illuminate\Http\Request;

class VehicleTypeController extends BaseController
{
    public function show()
    {
        $model = VehicleType::all();
        return view('admin.vehicle-type.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['vehicle-type.add'];
        $vehicle_type = new VehicleType();
        return view('admin.vehicle-type.create',compact('formRoute','vehicle_type'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:vehicle_types',
            'name_en' => 'required|min:3|max:50|unique:vehicle_types',
            'name_ru' => 'required|min:3|max:50|unique:vehicle_types'
        ]);

        VehicleType::create($request->all());

        return redirect()->route('vehicle-type.show')
            ->with(['success', 'Successfully saved to DB!']);
    }
    public function update(Request $request, $id)
    {
        $formRoute = ['vehicle-type.edit', $id];
        $model = VehicleType::whereId($id)->firstOrFail();

        return view('admin.vehicle-type.update',compact('model','formRoute'));
    }
    public function edit(Request $request, $id)
    {
        $model = VehicleType::find($id);
        $model->update($request->all());

        return redirect()->back()->with(['success' => 'Region was successfully updated!']);
    }
    public function delete(Request $request, $id)
    {
        VehicleType::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Region was successfully deleted!']);
    }
}