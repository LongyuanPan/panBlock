<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    public $successStatus = 200;
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    /**
     * login function
     *
     * @return void
     */
    public function login(Request $request)
    {
        if(Auth::attempt(['email'=>request('email'),'password'=>request('password')]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return Response()->json(['success'=>$success],$this->successStatus);
        }else{
            return Response()->json(['error'=>'Unauthorised'],401);
        }
    }

    /**
     * register function
     *
     * @param Request $request
     * @return void
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'       => 'required',
            'email'      => 'required|email',
            'password'   => 'required',
            'C_password' => 'required|same:password',
        ]);

        if($validator->fails())
        {
            return Response()->json(['error'=>$validator->errors()],401);
        }

        // 这里根据自己表结构修改
        $input                         = $request->all();
        $input['password']             = bcrypt($input['password']);
        $input['avatar']               = '/images/avatars/default.jpg';
        $input['emailverfiy_token']    = '';
        $input['state']                = 1;
        $user                          = User::create($input);
        $success['token']              = $user->createToken('MyApp')->accessToken;
        $success['name']               = $user->name;

        return Response()->json(['success'=>$success],$this->SuccessCode);
    }

    /**
     * get user infomation function
     *
     * @return void
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
