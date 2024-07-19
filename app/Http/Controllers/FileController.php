<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function imageUpload(Request $req) {
        if($req->hasFile('image')) {
            $fileName = $req->file('image')->getClientOriginalName();
            $getFileNameWithoutText = pathinfo($fileName, PATHINFO_FILENAME); // get the file name without extension
            $getFileExtension = $req->file('image')->getClientOriginalExtension(); // get the file extension
            $createNewFileName = time().'_'.str_replace(' ','_', $getFileNameWithoutText).'.'.$getFileExtension; // create new random file name
            // php artisan storage:link
            $imgPath = $req->file('image')->storeAs('public/post_img', $createNewFileName); // get the image path
            return ['result' => $imgPath];
        }
        return ['result' => false];

    }

    public function fileUpload(Request $req) {
        // $result=$request->file('file')->store('apiFile');

        if($req->hasFile('file')) {
            $fileName = $req->file('file')->getClientOriginalName();
            $imgPath = $req->file('file')->storeAs('public/file', $fileName);
            return ['result' => $imgPath];
        }
        return ['result' => false];
    }
}
