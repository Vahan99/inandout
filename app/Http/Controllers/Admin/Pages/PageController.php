<?php

namespace App\Http\Controllers\Admin\Pages;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController;
use App\Page;
class PageController extends BaseController
{
    public function show()
    {
        $model = Page::all();
        return view('admin.indexPages', compact('model'));
    }

	public function update($slug)
    {
        $formRoute = ['page.edit', $slug];
        $model = Page::whereSlug($slug)->first();
        return view('admin.'.$slug.'.update', compact('formRoute','model'));
    }

    public function edit(Request $request, $slug)
    {
        $model = Page::whereSlug($slug)->first();

        $req = $request->all();
        if(isset($req['images']) && file_exists(public_path('uploads/'). $model->images)) {
            unlink(public_path('uploads/'). $model->images);
            $req['images'] = $this->fileUpload($request->images, public_path('uploads/'))[0];
            dd($req['images'].'if_block');
        }
        $req['images'] = $this->fileUpload($request->images, public_path('uploads/'))[0];
//        dd($req['images']);
        $model->update($req);
        $model->save();
        return redirect()->back()->with(['success' => 'Tour was successfully updated!']);
    }

    public function imageDelete(Request $request, $id, $image) {
        $page = Page::whereId($id)->first();
        $images = $page->slider_images;
        foreach ($images as $key => $img) {
            if($image === $img) {
                unset($images[$key]);
                unlink(public_path() . '/uploads/' . $image);
            }
        }

        $page->update([
            'images' => json_encode(array_values($images))
        ]);

        return redirect()->back()->with(['success' => 'Image was successfully deleted!']);
    }
}