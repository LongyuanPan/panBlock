<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\UserAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
class IndexController extends Controller
{
    public  function getList(Request $request){
       dump("欢迎光临");exit();
       dump($request->path());
       dump(UserAuth::get());exit();
   }
}
