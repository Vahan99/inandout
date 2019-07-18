<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function fileUpload($files, $path)
    {
        if(!is_null($files)) {
            $fileNames = [];
            dd($files[0]->getClientOriginalExtension());
            foreach ($files as $file) {
                $fileName = rand(0, 10000) . '_' . time() . '.' . $file->getClientOriginalExtension();
                array_push($fileNames, $fileName);
                $file->move($path, $fileName);
            }
            return $fileNames;	
        }
    }
}
