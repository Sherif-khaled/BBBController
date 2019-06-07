<?php


namespace BBBController\Helpers;


use Illuminate\Http\Request;

class File
{
    public static function imageUpload($image){

        $imageName = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('images'), $imageName);

        return $image;

    }
}