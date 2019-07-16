<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2019/7/12
 * Time: 9:53
 */

namespace App\Http\Controllers;


use App\Events\OrderShipped;
use App\Events\OrderShipped2;
use App\Http\Model\Article;
use App\Http\Model\OrderRecord;
use App\Http\Model\User;
use App\Http\Repository\PDO;
use App\Http\Repository\PDO1;
use App\Http\Repository\TnCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function test(Request $request)
    {
//        event(new OrderShipped());
        event(new OrderShipped2());
        return response()->json(['error' => 200]);
    }
    public function test3(Request $request)
    {
        $result=OrderRecord::all();
//        $result=$result->filter(function ($value,$key){
//            return $value->type==1;
//        });
        $result=$result->max('id');
        dump($result);exit();
//        dump($result->toArray());exit();
//        return response()->json(['error' => 200]);
    }
    //打印原声sql语句
   public function test4(Request $request){
        $result=OrderRecord::where('id',2)->toSql();
        dump($result);exit();
   }
    public function test2(Request $request){
//        $result=Cache::remember('article',5,function (){
//            return Article::where('id','>','25')->get()->toArray();
//        });
        $expiresAt = now()->addMinutes(1);
        Cache::put('test',"值",$expiresAt);//秒为单位也可以传$expiresAt就以分钟为单位
        $result=Cache::get('test');
        dump($result);exit();
    }
//    //跨数据库事务
    public function test5(Request $request){
       return view('order');
    }
    public function test6(Request $request){
       $tn=new TnCode();
        if($tn->check()){
            $_SESSION['tncode_check'] = 'ok';
            return response()->json(['code'=>200,'msg'=>"验证成功"]);
        }else{
            $_SESSION['tncode_check'] = 'error';
            return response()->json(['code'=>200,'msg'=>"验证成功"]);
        }
    }


}