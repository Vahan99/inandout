<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Http\Controllers\BaseController;
class GalleryController extends BaseController
{
    public function update(Request $request)
    {
        $formRoute = ['gallery.edit'];
        $model = Gallery::all()->pluck('image', 'page')->toArray();
        return view('admin.gallery.update',compact('model','formRoute'));
    }

    public function edit(Request $request)
    {
        // dd($request->file());
        $pages = array_keys($request->file());
        foreach ($pages as $key => $page) {
            $model = Gallery::wherePage($page)->first();
            unlink(public_path('uploads/') . $model->image);
            $model->image = $this->fileUpload($request->file($page), public_path('uploads'))[0];
            $model->save();
        }

        return redirect()->back()->with(['success' => 'gallery was successfully updated!']);
    }
}
