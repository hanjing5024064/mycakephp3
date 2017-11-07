$(function() { 
	//切换左侧菜单高亮显示
	$(".treeview-menu").on("click", "a", function() {
		$(".treeview-menu .active").removeClass("active");
		$(this).parent().addClass("active");
	});
	
	//点击页面空白区域，隐藏右侧栏
	$(".content-wrapper").on("click", function() {
		$(".control-sidebar-open").removeClass("control-sidebar-open");
	});
	
	//换肤
	var skinArr = [
		"skin-blue", 
		"skin-red", 
		"skin-green", 
		"skin-yellow", 
		"skin-pruple",
		"skin-blue-light", 
		"skin-red-light", 
		"skin-green-light", 
		"skin-yellow-light", 
		"skin-purple-light"
	];
	$("#skinLinks").on("click", ".skin-link", function(e) {
		e.preventDefault();
		if(!$(this).hasClass("active")) {
			$(".skin-link").removeClass("active");
			$(this).addClass("active");
			
			var skinCls = $(this).data("skin");
			$.each(skinArr, function(i) {
				$("body").removeClass(skinArr[i]);
			});
			$("body").addClass(skinCls);
		}
	});
	
	//	点击列表变颜色
	  $(".table-striped tr").click(function(){
	    $(this).toggleClass("active").siblings("tr").removeClass("active")
	  });
});