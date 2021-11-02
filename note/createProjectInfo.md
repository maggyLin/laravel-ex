## 使用 composer 開專案
* 指定版本
```
composer create-project laravel/laravel=5.2.* 專案名稱 --prefer-dist
```

## 查詢laravel專案版本
* 路徑需要指向專案資料夾
```
php artisan --version
```
##
專案下載後 安裝vendor
composer update

忽略版本問題 (Your requirements could not be resolved to an installable set of packages)
composer update --ignore-platform-reqs  

## 初始化檔案
* 路徑需要指向專案資料夾
```
composer install
```

## 本地開發serve
```
php artisan serve
```

## 建立model
* php artisan make:model Animal(資料夾\php檔名) -rmc
> 後方 -rmc 的意思是在建立Model 同時建立 Migration and Controller ( r 的意思是載入預設CRUD方法)

## 創建controller
```
php artisan make:controller 控制器檔案名稱(不用.php)
php artisan make:controller 資料夾\控制器檔案名稱(不用.php)(資料夾根目錄為Http\Controllers)

php artisan make:controller 控制器檔案名稱 --resource   (RESTful 资源控制器)
```
## 創建 resource (資料夾根目錄為app/http/resource)
```
php artisan make:resource TypeResource
```

## 創建 middleware (資料夾根目錄為app/http/middleware)
```
php artisan make:middleware 資料夾\php檔名(不用.php)
```

## 創建 Requests (驗證規則) (資料夾根目錄為app/http/Requests)
```
php artisan make:request <Request 名稱>
```

## 創建 Migrations (資料夾根目錄為database/migrations)
```
php artisan make:migration create 檔名
```

## 使用 Migrations 創建 資料庫表格 
```
php artisan migrate  //全部創建
php artisan migrate --path=xxx  //指定遷移資料夾下的檔案
```

## 使用 Seeding 填充資料表
```
php artisan make:seeder 資料庫名稱TableSeeder  //創建 seeder
php artisan db:seed //填充到資料庫
```

## 使用 auth 會員認證、註冊帳號
```
php artisan make:auth
```

## 所有路由的List
```
php artisan route:list
```

## 修改專案 .env 中 APP_KEY 
```
php artisan key:generate
```

## 終端機執行php
```
php artisan tinker
```

## 快取相關
```
php artisan cache:clear

php artisan config:cache
php artisan config:clear

php artisan route:cache
php artisan route:clear

php artisan view:clear   

composer clear-cache  
composer dump-autoload
```

## artisan list
php artisan list


----------------------------------------------------------------

## 專案注意事項
* 修改.env 中 APP_KEY (會有Crypt問題-清除cache)

* 修改.env 中 APP_KEY APP_DEBUG=true -> false 關閉debug

* 配置.env設定檔設定(DB_ 區塊資料庫設定)

* 使用 migrate 資料表時間設定(created_at/updated_at)要注意(可能有非laravel使用)

* 資料庫庫 與 設定檔 中的編碼是否相同 config/database.php

* 修改時區 config/app.php ( 'timezone' => 'Asia/Taipei' )

* 修改語系 config/app.php (下載中文語言包https://github.com/caouecs/Laravel-lang)
```
'locale' => 'zh-Hant-TW', //系統預設語系
'fallback_locale' => 'zh-Hant-TW', //如果使用者設定，系統並沒有該語系，會使用這個邊設定的值
'faker_locale' => 'zh_TW', //生成假資料的語系格式
```

* config > database.php > mysql strict修改為false  是否資料庫要嚴格模式

