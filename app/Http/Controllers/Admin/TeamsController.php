<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Team;
use App\TeamImage;
class TeamsController extends BaseController
{
    public function show()
    {
        $model = Team::all();
        return view('admin.team.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['team.add'];
        return view('admin.team.create',compact('formRoute'));
    }

    public function add(Request $request)
    {
    	$req = $request->all();
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:teams',
            'name_en' => 'required|min:3|max:50|unique:teams',
            'name_ru' => 'required|min:3|max:50|unique:teams',
            'description_hy' => 'required',
            'description_en' => 'required',
            'description_ru' => 'required',
            'image' => 'max:1000'
        ]);
        
        $req['image'] = $this->fileUpload($request->file('image'), public_path('uploads/'))[0];
      
        Team::create($req);

       return redirect()->route('page.update', ['slug' => 'about'])
           ->with(['success', 'Successfully saved to DB!']);
    }
    public function update(Request $request, $id)
    {
        $formRoute = ['team.edit', $id];
        $model = Team::whereId($id)->first();
        return view('admin.team.update',compact('model','formRoute'));
    }
    public function edit(Request $request, $id)
    {
        $model = Team::find($id);
        $req = $request->all();
        if($request->file('image')) {
            unlink(public_path('uploads/') . $model->image);
            $req['image'] = $this->fileUpload($request->file('image'), public_path('uploads/'))[0];
        }
        $model->update($req);

        return redirect()->route('page.update', ['slug' => 'about'])->with(['success' => 'Team was successfully updated!']);
    }
    public function delete(Request $request,$id)
    {
        Team::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Team was successfully deleted!']);
    }
}
