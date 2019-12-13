<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Website_info extends Model
{
    protected $fillable=['website_name','email','phone','address','googleMap','about_us'];
}
