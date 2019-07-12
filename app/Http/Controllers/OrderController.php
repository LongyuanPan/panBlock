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
use App\Http\Model\OrderRecord;
use App\Http\Model\User;
use Illuminate\Http\Request;
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
   public function test2(Request $request){
//        DB::enableQueryLog();
//       dump(DB::getQueryLog());
        $result=OrderRecord::where('id',2)->toSql();
        dump($result);exit();
   }
}