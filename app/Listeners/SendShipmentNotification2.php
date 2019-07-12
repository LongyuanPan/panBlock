<?php

namespace App\Listeners;

use App\Events\OrderShipped2;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

//如果某个监听器需要执行的操作比较慢，可以放到消息队列进行异步处理。
class SendShipmentNotification2 implements ShouldQueue
{
    public $queue = 'listeners';
    public $connection = 'mysql';

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderShipped2  $event
     * @return void
     */
    public function handle(OrderShipped2 $event)
    {
        dump(22);
    }
}
