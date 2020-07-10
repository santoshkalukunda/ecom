<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable=['title','link','status','image','added_by'];
    public function getAddRules(){
        $rules=array(
            'title'=>'required|string',
            'link'=>'required|url',
            'status'=>'required|in:active,inactive',
            'image'=>'required|image|max:5000'
        );
        return $rules;
    }
    public function getEditRules(){
        $rules=array(
            'title'=>'required|string',
            'link'=>'required|url',
            'status'=>'required|in:active,inactive',
            'image'=>'sometimes|image|max:5000'
        );
        return $rules;
    }
}
