//////////////////////////////////////////////////////////////util function

/**
 * 调试模式时命令行输出
 */
var conLog = function(message){
	if(debug !== undefined && debug == true){
		console.log(message);
	}
}

/**
 * 判断是否是微信访问
 * @returns {boolean}
 */
var isWeChat = function isWeiXin(){
	var ua = window.navigator.userAgent.toLowerCase();
	 if(ua.match(/MicroMessenger/i) == 'micromessenger'){
		return true;
	 }else{
		return false;
	 }
};
/*
 获得当前URL的文件名
 http://dsfwx.dengshifu.me/set.html -> set.html
 */
var getNowFilename = function getFilename(){
	var strUrl=window.location.href;
	var arrUrl=strUrl.split("/");
	var strPage=arrUrl[arrUrl.length-1];
	return strPage;
}
/**
 * 封装ajax请求
 * @param url, 请求地址, 省略根路径, 'order/projectInfo'
 * @param succfn, 成功后回调函数
 * @param failFn, 失败后D回调函数
 * @param data, 数据
 */
var ajaxRequest = function(url, data, succFn){
	conLog('ajax request: '+ url);
	$.ajax({
		url:url,
		data: data,
		method:'post',
		dataType: 'json',
		success:function(data){
			conLog(data);
			if('success' == data.status){
				conLog('success');
				succFn(data.data);
			}else{
				conLog(data.message);
			}
		}
	});
}

/**
 *
 */
var isEmpty = function isEmpty(object){
	if(typeof(object) == 'undefined' || object == '' || object == 0 || object == null)return true;
	else return false;
}

/**
 * 上一步按钮动作
 */
var goback = function goback(type){
	switch(type){
		case 'package':
			jump("set.html");
			break;
		case 'lampinfo':
			jump("noset.html");
			break;
		default:
			history.back();
			break;
	}
}

/*
 * 用UIKIT的模块重写alert方法
 */
var alert =
	function(message) {
		UIkit.modal.alert(message, {
			center: true,
			labels: {
				Ok: '确定'
			}
		});
	}

/*
 * 用UIKIT的模块重写confirm方法
 */
var confirm =
	function(message, callback) {
		UIkit.modal.confirm(
				message,
			function() {
				callback();
			}, {
				center: true,
				labels: {
					Ok: '确认 ',
					Cancel: '取消'
				}
			});
	}

/*
 * 页面跳转
 */
var jump =
	function(action) {
		window.location.href = action;
	}

/*
 * @modal_name modal的ID或CLASS
 */
var modal =
	function(modal_name) {
	return UIkit.modal(modal_name, {
		center: true
	});
}

/*
 * get url GET data
 */
var getPar =
	function(par) {
		//获取当前URL
		var local_url = document.location.href;
		//获取要取得的get参数位置
		var get = local_url.indexOf(par + "=");
		if (get == -1) {
			return false;
		}
		//截取字符串
		var get_par = local_url.slice(par.length + get + 1);
		//判断截取后的字符串是否还有其他get参数
		var nextPar = get_par.indexOf("&");
		if (nextPar != -1) {
			get_par = get_par.slice(0, nextPar);
		}
		return get_par;
	};