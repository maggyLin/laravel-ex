<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class UserLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        //路圖名稱
        $route = request()->route()->getName();  //此在route的php要設定name()
        // $route = Route::currentRouteName();  
        // $route = Route::getCurrentRoute()->getActionName();

        if( empty($route) ) $route = $request->path();
        

        //使用者確認
        if(Auth::check()) $user_id = Auth::id();
        else $user_id = -1;

        $httpCode = $response->getstatuscode();

        $massage = "";
        if(session('errors') ){
            $massage = session('errors')->toJson(JSON_UNESCAPED_UNICODE);
        }

        $data =[
            'user_id' => $user_id,
            'ip' => request()->ip(),
            'route'=> $route,
            'method'=> request()->method(),
            'httpcode' =>  $httpCode,
            'massage' =>  $massage,
            'content' =>  mb_substr($response->getContent(),0,500,"utf-8"),
            'req_content' => mb_substr(json_encode(Arr::except(request()->all(),'_token')),0,1000,"utf-8"),
        ];

        DB::table('user_logs')->insert($data);

        // if($route == 'logout' || $route == 'login')
        // {
        //     Auth::logout();
        // }

        return $response;
    }


}
