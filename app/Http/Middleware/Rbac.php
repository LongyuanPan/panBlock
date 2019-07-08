<?php

namespace App\Http\Middleware;

use App\Http\Model\UserAuth;
use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Rbac
{
    /**
     * 进行权限验证
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $urls=$this->getRole($request);
        $url_names=$this->getUrlName($urls);
        $check=$this->Check($request,$url_names);
        if(!$check){
            return response()->json(['error'=>'1001','msg'=>"没有权限进行该操作"]);
        }
        return $next($request);
    }

    /**
     * 获取权限
     */
    public function getRole($request){
        $user=Auth::user()->ToArray();
        $jurisdiction=User::from('users as u')->leftJoin('user_role as ur','u.id','=','ur.user_id')->value('jurisdiction');
        $urls=explode(',',$jurisdiction);
        return $urls;
    }
     public function Check($request,$url_names){
      $path=$request->path();
      if(isset($url_names[$path])){
          return true;
      }else{
          return false;
      }
     }
     public function getUrlName($urls){
        if(Cache::has('user_names')){
            return Cache::get('user_names');
        }else{
            $url_names=UserAuth::whereIn('id',$urls)->pluck('id','url_name');
            Cache::add('user_names',$url_names,10);
            return $url_names->toArray();
        }
     }
}
