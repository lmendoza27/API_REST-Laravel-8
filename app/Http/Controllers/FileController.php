<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Image;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    public function testeo() {
        return ["result"=>"pass"];
    }
    
    public function upload(Request $request) {
        $result=$request->file('file')->store('apiDocs');
        return ["result"=>$result];
    }

    public function upload2(Request $request) {
        $pathToFile = $request->file('file')->store('testing', 'public');

        return $pathToFile;
    }

    public function upload3(Request $request) {

        if($request->hasFile('file')) {

            $image       = $request->file('file');
            $filename    = $image->getClientOriginalName();
         
            $image_resize = Image::make($image->getRealPath());              
            $image_resize->resize(300, 300);
            $image_resize->save(public_path('storage/Wrestling/' .$filename));
         
            return ["result"=>"Subido Correctamente"];

         }

    }

    public function upload4(Request $request) {

        $image = $request->file('file');
        $input['file'] = time().'.'.$image->getClientOriginalExtension();
        $img = Image::make($image->getRealPath());
        $img->greyscale()->save(public_path('/storage/Wrestling').'/'.$input['file']);

        return ["result"=>"Subido Correctamente"];
    }

    public function upload5(Request $request) {

        /*$extension = $request->file('file')->extension();
        // or
        //$extension = $file->getClientOriginalExtension();
        if($extension != 'jpg' || $extension != 'png' || $extension != 'jpeg') {
            return ["result"=>"No podemos subir este tipo de Archivos, por favor aloja un archivo de tipo .png, .jpeg o .jpg."];
        }else {
            $image = $request->file('file')->store('Wrestling', 'public');;
            return ["result"=>$image];
        }*/

        /*$request->validate([
            'file' => ['required', 'file', 'image'];
        ]);*/

        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'
        ]);
        if ($validator->fails()) {
            return ["result"=>"No se puede subir"];
        }else {
            $result=$request->file('file')->store('Wrestling', 'public');
            return ["result"=>$result];
        }
    }

}