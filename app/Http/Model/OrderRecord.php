<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/4
 * Time: 21:50
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class OrderRecord extends  Model
{
    public $table="product_record";
    public $timestamps = false;
}