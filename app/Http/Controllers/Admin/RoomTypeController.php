<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\RoomType;

class RoomTypeController extends BaseController
{
    public function show()
    {
        $model = RoomType::all();
        return view('admin.room-type.show', compact('model'));
    }
                                             
    public function create()
    {
        $formRoute = ['room-type.add'];
        $room_type = new RoomType();
        return view('admin.room-type.create',compact('formRoute','room_type'));
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name_hy' => 'required|min:3|max:50|unique:room_types',
            'name_en' => 'required|min:3|max:50|unique:room_types',
            'name_ru' => 'required|min:3|max:50|unique:room_types'
        ]);

        RoomType::create($request->all());

       return redirect()->route('room-type.show')
           ->with(['success', 'Successfully saved to DB!']);
    }
    public function update(Request $request, $id)
    {
        $formRoute = ['room-type.edit', $id];
        $model = RoomType::whereId($id)->firstOrFail();

        return view('admin.room-type.update',compact('model','formRoute'));
    }
    public function edit(Request $request, $id)
    {
        $model = RoomType::find($id);
        $model->update($request->all());

        return redirect()->back()->with(['success' => 'Region was successfully updated!']);
    }
    public function delete(Request $request, $id)
    {
        RoomType::whereId($id)->delete();
        return redirect()->back()->with(['success' => 'Region was successfully deleted!']);
    }
}