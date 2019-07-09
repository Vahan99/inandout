<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vacancy;
use App\Http\Controllers\BaseController;

class VacancyController extends BaseController
{
   public function show()
    {
        $model = Vacancy::all();
        return view('admin.vacancy.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['vacancy.add'];
        $vacancy = new Vacancy();
        return view('admin.vacancy.create',compact('formRoute','vacancy'));
    }

    public function add(Request $request)
    {
        
        $req = $request->all();
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:vacancy',
            'name_en' => 'required|min:3|max:50|unique:vacancy',
            'name_ru' => 'required|min:3|max:50|unique:vacancy',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
        ]);
        
        $req['slug'] = str_slug($req['name_en']) ; 

        Vacancy::create($req);

       return redirect()->route('vacancy.show')
           ->with(['success', 'Successfully saved to DB!']);
    }

   public function update(Request $request, $id)
    {
        $formRoute = ['vacancy.edit', $id];
        $model = Vacancy::whereId($id)->first();
        return view('admin.vacancy.update',compact('model','formRoute'));
    }
    public function edit(Request $request, $id)
    {
        $model = Vacancy::find($id);
        $req = $request->all();
        $model->update($req);

        return redirect()->route('vacancy.show', ['slug' => 'vacancy'])->with(['success' => 'Vacancy was successfully updated!']);
    }

    public function delete(Request $request,$id)
    {
        Vacancy::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Vacancy was successfully deleted!']);
    }   
}
