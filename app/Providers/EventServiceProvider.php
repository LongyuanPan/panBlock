<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\OrderShipped' => [
            'App\Listeners\SendShipmentNotification',
        ],
        'App\Events\OrderShipped2' => [
            'App\Listeners\SendShipmentNotification2',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        //一般来说，事件必须通过 EventServiceProvider 类的 $listen 数组进行注册；不过，你也可以在 EventServiceProvider 类的 boot 方法中注册闭包事件
        Event::listen('event.*', function ($eventName, array $data) {
            //
        });
    }
}
