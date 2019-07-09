<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;

class ServiceController extends Controller
{
     public function show()
    {
        $model = Service::all();
        return view('admin.service.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['service.add'];
        $service = new Service();
        return view('admin.service.create',compact('formRoute','service'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:services',
            'name_en' => 'required|min:3|max:50|unique:services',
            'name_ru' => 'required|min:3|max:50|unique:services',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
        ]);
        $req = $request->all();
        $req['slug'] = str_slug($req['name_en']) ; 
        $id = Service::create($req)->id;

        // dd('dw');
        return redirect()->route('service.show')
           ->with(['success', 'Successfully saved to DB!']);
    }

    public function update(Request $request, $id)
    {
        $formRoute = ['service.edit', $id];
        $model = Service::whereId($id)->first();
        return view('admin.service.update',compact('model','formRoute'));
    }

    public function edit(Request $request, $id)
    {
        $model = Service::find($id);
        $model->update($request->all());
        return redirect()->route('service.show')->with(['success' => 'Service was successfully updated!']);
    }

    public function delete(Request $request,$id)
    {
        Service::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Service was successfully deleted!']);
    }
}
