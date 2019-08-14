<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Http\Request;
use App\Setting;
class SettingController extends BaseController
{
    public function update(Request $request)
    {
        $formRoute = ['setting.edit'];
        $model = Setting::whereSlug('setting')->first();
        return view('admin.setting.update',compact('model','formRoute'));
    }

    public function edit(Request $request)
    {
        $model = Setting::first();
        $admin = User::first();
        $req = $request->all();
        if(isset($model->image)) {
            if ($model->image && file_exists(public_path('uploads/' . $model->image))) {
                unlink(public_path('uploads/' . $model->image));
                $req['image'] = $this->fileUpload($request->file('image'), public_path('uploads/'))[0];
            } else {
                $req['image'] = $this->fileUpload($request->file('image'), public_path('uploads/'))[0];
            }
        }
        if($req['password']){
           $admin->update([
               'password' => bcrypt($req['password'])
           ]);
        }

        $model->update($req);
        return redirect()->back()->with(['success' => 'Setting was successfully updated!']);
    }
}
