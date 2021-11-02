
## CSRF 檢查 (測試)
* 修改 laravel/app/Middleware/VerifyCsrfToken.php
* form tab {{csrf_field()}}

* 參考 : https://blog.csdn.net/LJFPHP/article/details/78563297
* CSRF介紹 : https://blog.techbridge.cc/2017/02/25/csrf-introduction/

----------------------------------------------------------------

## 相關路徑說明

*app/Exceptions - Handler (捕捉異常處理/自定義攔截錯誤)

*app/Http/Resources -> resouce - {} 整理輸出資料 ( 使用 find() 單筆資料 - 回傳{} 資料項目樣式設定) 
*app/Http/Resources -> collection  - [{}] 整理輸出資料 ( 使用get() 多筆資料 -回傳[{}] 資料項目樣式設定 )  (apitest 專案參考)


*app/Providers/AppServiceProvider.php -> boot() 可自定義response格式 Response::macro()


----------------------------------------------------------------

## 使用 model 資料日期格式
```
> 在指定的model.php中
protected function serializeDate(\DateTimeInterface $date)
{
	return $date->format('Y-m-d H:i:s');
}
```

## 獲取 ip ----------------------------------------------------
```
$request->ip();
request()->getClientIp();
```
## 獲取 route name ----------------------------------------------------
```
1.$route = request()->route()->getName();
2.Illuminate\Support\Facades\Route::currentRouteName();
```

## 獲取 .env 中參數 ----------------------------------------------------
```
env('TOKEN')
```

## 傳遞參數  ----------------------------------------------------
return redirect('home')->with('title', 'Hello Laravel');

// 将表单值保存到 Session 中，可以用 {{ session('param') }} 来获取
return redirect('home')->withInput();

// 接收一个字符串或数组，传递的变量名为 $errors
return redirect('home')->withErrors('Error');



$items = $this->fbShareService->method();  //collection 資料格式
$data = $items->toArray();  //轉array
$data = $items->toJson();  //轉json
$data = ShareItemResource::collection($items)->toJson();  //套用resource,自訂資歷格式



## view() 或 redirect()  ----------------------------------------------------


​ 1.使用 return view() 不会改变当前访问的 url ， return redirect() 会改变改变当前访问的 url

​ 2.使用 return view() 不会使当前 Session 的 Flash 失效 ，但是 return redirect() 会使 Flash 失效
 3.在 RESTful 架构中，访问 Get 方法时推荐使用 return view() ，访问其他方法推荐使用 return redirect()

 
return view('admin/login');
return view('admin/create', compact('data'));
return redirect('admin/create');
return redirect()->route('login');  (需定義name , 不受prefix前綴影響!!!)
return redirect()->action('UserController@index') 
return back()->with('msg','帳號或密碼錯誤!'); ->blade自己抓取session msg
return back()-> withErrors("帳號或密碼錯誤"); ->blade使用內建參數 $errors


## session ----------------------------------------------------------------
session(['log_msg' =>'紀錄session']);
session()->has('err_msg')
session()->all()
session('err_msg')
session()->forget('log_msg');
session()->flush(); //刪除 session 內所有的資料


## request -------------------------------------------------------------------
request()->has('name')
$request->has(['name', 'email'])

request('start_date')

$request->bearerToken(); ->不會有Bear
request()->header('Authorization'); ->有 Bear

## use ------------------------------------------------------------------------
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

## dispatch --------------------------------------------------------------------
App\Events -> 監聽事件
App\Listeners ->監聽到 要處理事件
App\Providers\EventServiceProvider ->定義event listener對應

## app and rule ----------------------------------------------------------------
App\Providers\AppServiceProvider 定義 規則 指向


## auth ----------------------------------------------------------------
*config/auth.php

//預設 user 檢查密碼狀態
Auth::attempt(['account' => $account, 'password' => $password, 'status' => 1])

//手動登入
$user = User::where('account', $account)->first();
Auth::login($user);

//預設 user
Auth::logout();
$user = Auth::user();
$id = Auth::id();

//用戶是否已經登入
if (Auth::check())

//對應admin
Auth::guard('admin')->attempt()...
Auth::guard('admin')->login($user);
auth()->guard('admin')->logout();
*在config/auth.php需要定義 guards內
'admin' => [
	'driver' => 'session',
	'provider' => 'admins',
]
