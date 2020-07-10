<?php
if(!function_exists('uploadImage')){
    function uploadImage($file, $dir, $thumb=false){
        $path=public_path().'/uploads/'.$dir;
        if (!File::exists($path)){
            File::makeDirectory($path,0777, true,true);
        }
        $image_name="banner-".date('ymdhis').rand(0,9999).".".$file->getClientOriginalExtension();
        $success=$file->move($path,$image_name);
        if ($success){
            Image::make($path.'/'.$image_name)->resize(1500,400,function($aspet){
                return $aspet->aspectRatio();
            })->save($path."/Thumb-".$image_name);
            return $image_name;
        }else{
            return false;
        }
    }
}
/* deleting banner image*/
if (!function_exists(' deleteImage')){
    function  deleteImage($img_name,$dir){
        $path=public_path().'/uploads/'.$dir;
        if ($img_name!=null && file_exists($path.'/'.$img_name)){
            $status=unlink($path.'/'.$img_name);
            if ($status){
                if (file_exists($path.'/Thumb-'.$img_name )){
                    unlink($path.'/Thumb-'.$img_name);
                }
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }
}





?>
