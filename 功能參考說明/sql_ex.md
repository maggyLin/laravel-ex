## try catch  lockForUpdate() 
```
DB::beginTransaction();
try {
	//將 NewsList 中 fre 次數+1,重新存入表格
	$data = NewsList::query()->where('code',$code)->lockForUpdate()->first();
	$fre_click = $data->fre;
	$fre_click++;
	$data->fre_click = $fre_click;
	$data->save();   
	
} catch (\Exception $e) {
	DB::rollback();
	// throw new HttpException(500, $e->getMessage(), $e, [], 0);
	DB::table('logs')->insert(
		['user_id' => 0, 'status' => 'fail', 'doing' => 'test', 'content' => '新增次數失敗', 'ip' => request()->getClientIp()]
	);
}

DB::commit();
```

## Left Join  ------------------------------

$records = Record::select(
            'records.no',
            'records.share_item_id',
            'records.amount',
            'records.total_price',
            'records.share_url',
            'records.created_at',
            'records.name_ch'
        )
        ->leftJoin('share_items','records.share_item_id','=','share_items.id')
        ->where('records.user_id', 1)->where('records.status', 1)
		

$result = DB::table($tables,'tables')
            ->select(
                'tables.id',
                'tables.name',
                'tables.status',
                DB::raw('IFNULL(records.count,0) as count'),
                DB::raw('IFNULL(records.sum,0) as sum'),
            )
            ->leftJoinSub($records,'records',function($join){
                $join->on('records.table_id','=','tables.id');
            })
            ->where(function($q) use ($t_now,$t_tomorrow){
                return $q->where('bet_records.created_at','>=',$t_now)
                         ->where('bet_records.created_at','<=',$t_tomorrow);
            })
            ->groupBy('tables.id');


$data = Record::with('Item')->where('id', 1)->where('status', 1)->get();

## Where ------------------------------

$data = Itme::::where([
            ['use','=',1],
            ['status','=',0]
        ]);


## insert ----------------------------
```
User::insert(
	['status' => 1, 'domain' => "https://"]
);

DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);

DB::table('user_logs')
    ->insert(
        ['user_id' => $id, 'status' => '-1', 'route' => request()->route()->getName() , 'ip' => request()->getClientIp()]
    );

```


##  update ------------------------------
		
$data = User::query()->where('account',$account)->update(['password' => bcrypt($new_pw)]);	


$data = DepositRecord::where([
            ['code','=',$self_order_num],
            ['status','=',0]
        ])->update(
            [
                'status' => 1,
                'order_no_second' => $data['order_no_second'],
                'processor' => $data['processor'],
                'processor_no' => $data['processor_no'],
                'processor_name' => $data['processor_name'],
                'pay_time' => $data['pay_time'],
                'callback_sign' => $data['callback_sign'],
                'ip_callback' => request()->getClientIp()
            ]
        );	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		