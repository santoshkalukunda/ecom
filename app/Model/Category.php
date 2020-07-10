<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected  $fillable=['title','slug','parent_id','image','added_by','summary','status'];
}
