<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Upload
{

    public function imageupload(Request $request)
    {
        $data = $request->all();
        $image = $request->file("image");
        if ($image) {
            $image_name = date("dmy_H_s_i");
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "media/";
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $data["image"] = $image_url;
        }
        return $data;
    }

    public function updateimage($img, $model)
    {
        if ($model->image)
            unlink($model->image);

        $image_name = date("dmy_H_s_i");
        $ext = strtolower($img->getClientOriginalExtension());
        $image_full_name = $image_name . $ext;
        $upload_path = "media/";
        $image_url = $upload_path . $image_full_name;
        $success = $img->move($upload_path, $image_full_name);
        return $image_url;
    }
}
