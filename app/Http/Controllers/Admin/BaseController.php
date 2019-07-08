<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\UserAuth;
use App\Http\Model\UserRole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public $id='';
   public function __construct($id)
   {
    $this->id=$id;
    $path=request()->path();
    $this->getRole($path);
   }

   public function getRole($path){
     $result=UserRole::where(['user_id'=>$this->id,'status'=>0])->pluck('jurisdiction','id')->toArray();
     dump($result);exit();
   }
}
