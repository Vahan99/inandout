<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function fileUpload($files, $path)
    {
        if(count($files) == 1){
            $fileName = rand(0, 10000) . '_' . time() . '.' . $files->getClientOriginalExtension();
            $files->move($path, $fileName);
            return $fileName;
        }if(!is_null($files)) {
            $fileNames = [];
            foreach ($files as $file) {
                $fileName = rand(0, 10000) . '_' . time() . '.' . $file->getClientOriginalExtension();
                array_push($fileNames, $fileName);
                $file->move($path, $fileName);
            }
            return $fileNames;	
        }
    }
}
