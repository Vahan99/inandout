<?php

namespace App\Http\Controllers\Admin;

use App\NewsImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Http\Controllers\BaseController;
class NewsController extends BaseController
{
    public function show()
    {
        $model = News::all();
        return view('admin.news.show', compact('model'));
    }

    public function create()
    {
        $formRoute = ['news.add'];
        return view('admin.news.create',compact('formRoute'));
    }

    public function add(Request $request)
    {
        $req = $request->all();
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:news',
            'name_en' => 'required|min:3|max:50|unique:news',
            'name_ru' => 'required|min:3|max:50|unique:news',
            'desc_hy' => 'required',
            'desc_en' => 'required',
            'desc_ru' => 'required',
            'image' => 'max:1000',
        ]);
        $req['slug'] = str_slug($req['name_en']);
        $req['grid_image'] = $this->fileUpload($request->file('grid_image'), public_path('uploads/'))[0];
        $id = News::create($req)->id;
        $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

        foreach ($images as $image) {
            NewsImage::create([
                'news_id' => $id,
                'image' => $image
            ]);
        }

       return redirect()->route('news.show')
           ->with(['success', 'Successfully saved to DB!']);
    }
    public function update(Request $request, $id)
    {
        $formRoute = ['news.edit', $id];
        $model = News::whereId($id)->first();
        return view('admin.news.update',compact('model','formRoute'));
    }
    public function edit(Request $request, $id)
    {
        $model = News::find($id);
        $req = $request->all();

        if(isset($req['grid_image'])) {
            unlink(public_path('uploads/') . $model->grid_image);
            $req['grid_image'] = $this->fileUpload($request->grid_image, public_path('uploads/'))[0];
        }

        if(isset($request->image)) {
            $images = $this->fileUpload($request->file('image'), public_path('uploads/'));

            foreach ($images as $image) {
                NewsImage::create([
                    'news_id' => $id,
                    'image' => $image
                ]);
            }
        }

        $model->update($req);

        return redirect()->route('news.show', [$model->slug])->with(['success' => 'News was successfully updated!']);
    }
    public function delete(Request $request,$id)
    {
        News::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'News was successfully deleted!']);
    }

    public function deleteImage($id)
    {
        $tourImage = NewsImage::find($id);
        unlink(public_path('uploads/') . $tourImage->image);
        $tourImage->delete();
        return redirect()->back()->with(['success' => 'Image was successfully deleted!']);
    }
}
