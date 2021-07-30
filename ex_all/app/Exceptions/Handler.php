<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        
        // 讓它顯示一下是哪一個異常狀況
        // dd($exception);

        //使用者請求回傳JSON 格式，發現有 ModelNotFoundException 錯誤被拋出，回傳 404 Not Found 並附上錯誤資訊。
        // if ($request->expectsJson()) {
        //     if ($exception instanceof ModelNotFoundException) {
        //         return response()->json(
        //             [
        //                 'message' => '找不到資源'
        //             ],
        //             Response::HTTP_NOT_FOUND
        //         );
        //     }
        // }
        
        // 發現有 ModelNotFoundException 錯誤被拋出，回傳 404 Not Found 並附上錯誤資訊。
        if ($exception instanceof ModelNotFoundException) {
            return response()->json(
                [
                    'message' => '找不到資源'
                ],
                Response::HTTP_NOT_FOUND
            );
        }

        
        //採用預設 response
        return parent::render($request, $exception);
    }
}
