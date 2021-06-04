<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LogRecords
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
        // logger('array => ', request()->all());
        Log::channel('api_received')->debug('data => ', request()->all());
        Log::channel('api_received')->debug('host => ' . $request->header('host'));
        Log::channel('api_received')->debug('ip => ' . request()->ip());
        Log::channel('api_received')->debug('path => ' . $request->path());
        Log::channel('api_received')->debug('=====================================================================================================');

        return $next($request);
    }

    //整體結束後執行
    public function terminate($request, $response)
    {   
        // $req_content = mb_substr(json_encode(Arr::except(request()->all(),'_token')),0,1000,"utf-8");
        // $req_content = json_encode(
        //     collect($request->all())->map(function ($value, $key) {
        //         return mb_convert_encoding($value, 'utf-8', 'utf-8, big5');
        //     }
        // )->toArray(), JSON_UNESCAPED_UNICODE);

        // DB::table('api_game_logs')
        //     ->insert([
        //         'admin_no' => request()->has('agent_key')? substr( strchr(request('agent_key'), "_") , 1):"" ,
        //         'route' => $request->path(),
        //         'method' => request()->method(),
        //         'req_content' => $req_content,
        //         'res_content' => mb_convert_encoding($response->getContent(), 'utf-8', 'utf-8, big5'),
        //         'res_httpcode' => $response->getstatuscode(), 
        //         'note' => "", 
        //         'ip' => request()->ip()
        //     ]);

    }

}
