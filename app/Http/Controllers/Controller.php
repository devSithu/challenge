<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Website_info;
use App\User;
use Illuminate\Http\Request;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function get_all_contact(Request $request){
       return json_encode(Website_info::orderBy('id','desc')->get());
   }

   public function update_contact(Request $request,$id){
    $updated=Website_info::findOrFail($id)->update($request->all());
    return $updated?json_encode(['status'=>"success"]):json_encode(['status'=>"fail"]);
    }

    public function getAccount(Request $request){
        return json_encode(User::orderBy('id','desc')->get());
    }

    public function updateAccount(Request $request,$id){
        $updated=User::findOrFail($id)->update($request->all());
        return $updated?json_encode(['status'=>"success"]):json_encode(['status'=>"fail"]);
        }

   
}
