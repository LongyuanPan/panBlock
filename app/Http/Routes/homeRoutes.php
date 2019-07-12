<?php
namespace App\Http\Routes;

use Illuminate\Contracts\Routing\Registrar;

class HomeRoutes
{
    public function map(Registrar $router)
    {
        $router->group(['middleware' => 'auth:api'], function ($router) {
            $router->get('test3',function (){
                echo "33";exit();
            });
        });
    }
}