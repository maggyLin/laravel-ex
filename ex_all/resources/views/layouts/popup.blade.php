
<script>

	//檢查進入頁面是否有提醒視窗
	var have_popup = '{!! session("enter_page_info") !!}';
	if(have_popup){
		loadWithMag(have_popup,0);
	}

    function loadWithMag(str,time,icon=-1,shade=0.5){
		layer.msg( str , {
			icon: icon, //-1 沒有icon
			time: time, //0=不自动关闭
			shade: shade, //0=沒有遮罩
			skin: '#fff',
            btn: ['確認'],
            yes: function(index){
                layer.close(index);
            }
		});
	}

	//loading 層
	var loadingShow; 
	function load(){
		loadingShow = layer.load(1, {
			shade: [0.3,'#fff'] //0.2透明度的白色背景
		});
	}
	function loadClose(){
		layer.close(loadingShow);
	}

</script>