<!DOCTYPE html>

<html>
	<head>
	    <meta charset="utf-8" />
	    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
	    <title><?= $this->element('plantform_name'); ?></title>
	    <?= $this->Html->meta('icon') ?>
	    <?= $this->Html->css([
	    	'pc/bootstrap.min.css', 
	    	'pc/font-awesome.min.css', 
	    	'pc/adminx.min.css', 
	    	'pc/skins/_all-skins.min.css', 
	    	'pc/plugins/datepicker.min.css', 
	    	'pc/plugins/clockpicker.min.css', 
	    	'pc/plugins/ztree/zTreeStyle.css', 
	    	'pc/app.css']); 
	    ?>
		<!--[if lt IE 9]>
	        <?= $this->Html->script(['html5shiv.min.js', 'respond.min.js']) ?>
	    <![endif]-->
	    <!-- 引入页面脚本 -->
		<?= $this->Html->script([
			'pc/jquery-1.11.3.min.js', 
			'pc/bootstrap-3.3.5.min.js', 
			'pc/adminx.min.js', 
			'pc/plugins/jquery.slimscroll.min.js', 
			'pc/plugins/datepicker.min.js', 
			'pc/plugins/clockpicker.min.js', 
//			'pc/plugins/address.js',
			'pc/plugins/ztree/jquery.ztree.all-3.5.min.js',
			'pc/echarts.js',
			'pc/app.js']); 
		?>
	</head>

	<body class="hold-transition sidebar-mini skin-blue-light">
		<!-- Wrapper -->
		<div class="wrapper">
			<!-- Main Header -->
			<header class="main-header">
				<!-- Logo -->
				<a class="logo hidden-xs hidden-sm">
					<span class="logo-mini">
						<?php echo $this->Html->image('logo-mini.png') ?>
					</span>
					<span class="logo-lg">
						<?php echo $this->Html->image('logo.png') ?>
					</span>
				</a>
				<!-- /Logo -->
				
				<!-- Header Navbar -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
		            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
		                <span class="sr-only">切换导航栏</span>
		          	</a>
		          	<!-- /Sidebar toggle button-->
		          	
		          	<!-- Navbar Right Menu -->
          			<div class="navbar-custom-menu">
			            <ul class="nav navbar-nav">
			              	<!--<li class="dropdown messages-menu">
				                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				                    <i class="fa fa-envelope-o"></i>
				                    <span class="label label-success">4</span>
				                </a>
				                <ul class="dropdown-menu">
				                    <li class="header">您有4条新消息</li>
				                    <li>
					                    <ul class="menu">
					                    	<li>
						                        <a href="#">
						                          	<div class="pull-left">
						                            	<?php echo $this->Html->image('users/user02.jpg', ['alt'=>'', 'class'=>'image-circle']) ?>
						                          	</div>
						                          	<h4>
						                            	Jessica
						                            	<small><i class="fa fa-clock-o"></i> 5分钟前</small>
						                          	</h4>
						                          	<p>请使用Bootstrap来搭建微信后台管理平台</p>
						                        </a>
					                      	</li>
					                    </ul>
				                  	</li>
				                  	<li class="footer"><a href="#">查看更多消息</a></li>
				                </ul>
			                </li>-->
			              	<!--<li class="dropdown notifications-menu">
				                <a href="#" class="dropdown-toggle">
				                  	<i class="fa fa-bell-o"></i>
				                  	<span class="label label-danger"></span>
				                </a>
				                <ul class="dropdown-menu">
				                    <li class="header">您有10条新的系统公告</li>
				                    <li>
					                    <ul class="menu">
					                      <li>
					                        <a href="#">
					                          <i class="fa fa-users text-aqua"></i> 今天加入5名新会员
					                        </a>
					                      </li>
					                    </ul>
				                    </li>
				                    <li class="footer"><a href="#">查看所有</a></li>
				                </ul>
			              	</li>-->
			                <!--<li class="dropdown tasks-menu">
				                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				                  	<i class="fa fa-flag-o"></i>
				                  	<span class="label label-danger">1</span>
				                </a>
				                <ul class="dropdown-menu">
				                  	<li class="header">您有1条新任务</li>
				                  	<li>
					                    <ul class="menu">
					                        <li>
						                        <a href="#">
						                            <h3>
						                            	前端开发
						                            	<small class="pull-right">20%</small>
						                            </h3>
							                        <div class="progress xs">
							                            <div class="progress-bar progress-bar-aqua" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width:20%;">
							                                <span class="sr-only">20%</span>
							                            </div>
						                            </div>
						                        </a>
					                        </li>
					                    </ul>
				                  	</li>
					                <li class="footer">
					                    <a href="#">查看所有任务</a>
					                </li>
				                </ul>
			              	</li>-->

			                <li class="dropdown user user-menu">
				                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				                    <?php echo $this->Html->image('user.png', ['alt'=>'', 'class'=>'user-image']) ?>
				                    <!--<span class="hidden-xs"><?= h($this->request->session()->read('user')['account']) ?></span>-->
				                    <span class="hidden-xs">Admin</span>
				                </a>
				                <ul class="dropdown-menu">
				                    <li class="user-header">
					                    <?php echo $this->Html->image('user.png', ['alt'=>'', 'class'=>'image-circle']) ?>
					                    <p>
					                        <?= h($this->request->session()->read('Auth')['User']['username']) ?>
					                      	<!--Administrator-->
					                        <small><?= h($this->request->session()->read('Auth')['User']['roles'][0]['name']) ?></small>
					                        <!--<small>系统管理员</small>-->
					                    </p>
				                    </li>
					                <li class="user-footer">
					                    <div class="pull-left">
					                        <a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#pwtModal">修改密码</a>
					                    </div>
					                    <div class="pull-right">
					                    	<a href="<?php echo $this->Url->build(['controller'=>'Users','action'=>'logout']);?>" class="btn btn-default btn-flat">退出</a>
					                    	<!--<?= $this->Html->link('退出', ['controller'=>'Users', 'action'=>'logout'], ['class'=>'btn btn-default btn-flat']) ?>-->
					                    </div>
				                    </li>
				                </ul>
			                </li>
			                <li class="hidden-xs hidden-sm">
			                	<a href="#" data-toggle="control-sidebar" id="ctrlLink"><i class="fa fa-gears"></i></a>
			                </li>
			            </ul>
          			</div>
          			<!-- /Navbar Right Menu -->
				</nav>
				<!-- /Header Navbar -->
			</header>
			<!-- /Main Header -->
			
			<!-- Main Sidebar -->
			<?= $this->element('s1_menus');?>
			<!-- /Main Sidebar -->
			
			<!-- Content Wrapper -->
			<div class="content-wrapper">
				<div class="flash-div">
					<?= $this->Flash->render() ?>
				</div>
				<?= $this->fetch('content') ?>
			</div>
			<!-- /Content Wrapper -->
			
			<!-- Main Footer -->
      		<footer class="main-footer">
		        <div class="pull-right hidden-xs">
		          	版本 V1.0
		        </div>
		        Copyright &copy; 2017 <a href="#" target="_blank">###</a> 版权所有
      		</footer>
      		<!-- /Main Footer -->
      		
      		<!-- Control Sidebar -->
      		<aside class="control-sidebar control-sidebar-dark hidden-xs hidden-sm">
      			<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          			<li class="active">
          				<a href="#control-sidebar-skin-tab" data-toggle="tab">
          					<i class="fa fa-yelp"></i> 换肤
          				</a>
          			</li>
          			<!--<li>
          				<a href="#control-sidebar-layout-tab" data-toggle="tab">
          					<i class="fa fa-delicious"></i> 布局
          				</a>
          			</li>-->
        		</ul>
        		<div class="tab-content">
        			<div class="tab-pane active" id="control-sidebar-skin-tab">
        				<div class="row skin-links" id="skinLinks">
        					<div class="col-md-4">
        						<a href="#" data-skin="skin-blue-light" class="skin-link skin-link-blue active"></a>
        					</div>
        					<div class="col-md-4">
        						<a href="#" data-skin="skin-yellow-light" class="skin-link skin-link-yellow"></a>
        					</div>
        					<div class="col-md-4">
        						<a href="#" data-skin="skin-green-light" class="skin-link skin-link-green"></a>
        					</div>
        					<div class="col-md-4">
        						<a href="#" data-skin="skin-red-light" class="skin-link skin-link-red"></a>
        					</div>
        					<div class="col-md-4">
        						<a href="#" data-skin="skin-purple-light" class="skin-link skin-link-purple"></a>
        					</div>
        				</div>
        			</div>
        			<!--<div class="tab-pane" id="control-sidebar-layout-tab"></div>-->
        		</div>
      		</aside>
			<div class="control-sidebar-bg"></div>
			<!-- /Control Sidebar -->
		</div>
		<!-- /Wrapper -->
		
		<div class="modal fade" tabindex="-1" role="dialog" id="pwtModal">
		    <div class="modal-dialog" role="document">
		    	<div class="modal-content">
			        <div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        	<h4 class="modal-title">修改密码</h4>
			        </div>
			        <div class="modal-body">
			        	<div class="form-group">
			        		<label>原密码</label>
			        		<input type="password" class="form-control" id="originPwt" />
			        	</div>
			        	<div class="form-group">
			        		<label>新密码</label>
			        		<input type="password" class="form-control" id="newPwt" />
			        	</div>
			        	<div class="form-group">
			        		<label>确认新密码</label>
			        		<input type="password" class="form-control" id="confirmPwt" />
			        	</div>
			        	<p class="form-error"></p>
			        </div>
			        <div class="modal-footer">
			        	<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
			        	<button type="button" class="btn btn-skin" id="pwtBtn">保存</button>
			        </div>
		    	</div>
		    </div>
		</div>
		
		<script type="text/javascript">
			$(function() {
				//设置选中菜单
//				var ctrl = "<?//= $ctrl ?>//";
//				$(".sidebar-menu .active").removeClass("active");
//				$("[data-ctrl='"+ctrl+"']").addClass("active").parents(".treeview").addClass("active");
			
				//修改密码
				$("#pwtModal").on("show.bs.modal", function() {
					$("#pwtModal input").val("");
				});
				$("#pwtBtn").on("click", function(e) {
					e.preventDefault();
					
					var origin_pwt = $("#originPwt").val().trim(),
						new_pwt = $("#newPwt").val().trim(),
						confirm_pwt = $("#confirmPwt").val().trim(),
						$pwt_error = $(".form-error");
					if(!origin_pwt) {
						$pwt_error.html("请输入原密码！");
						return;
					}
					if(!new_pwt) {
						$pwt_error.html("请输入新密码！");
						return;
					}
					if(!confirm_pwt) {
						$pwt_error.html("请输入确认密码！");
						return;
					}
					if(new_pwt != confirm_pwt) {
						$pwt_error.html("两次密码输入不一致！");
						return;
					}
					
//					$.ajax({
//						type: "POST",
//						url: "<?= $this->Url->build(['controller'=>'Users', 'action'=>'changePwt']) ?>",
//						data: {"user_id":"<?= h($this->request->session()->read('user')['id']) ?>", "origin_pwt":origin_pwt, "new_pwt":new_pwt},
//						dataType: 'json',
//						success: function(data) {
//							if(data.status == "success") {
//								$("#pwtModal").modal("hide");
//								$(".flash-div").empty().append('<div class="message success" onclick="this.classList.add(\'hidden\')">'+data.msg+'</div>');
//							}else {
//								$(".form-error").html(data.msg);
//							}
//						}
//					});
				});
			});
		</script>

		<script type="text/javascript">
			$(function() {
				//初始化日期选择插件
				$(".datepicker").datepicker({
					language: "zh-CN",
					format: "yyyy-mm-dd",
//					startDate: "+0d",
					todayHighlight: true,
					todayBtn: true
				}).change(function() {
					var arr = $(this).val().split("-");
					//设置真正提交的日期值
					$("[name='door_time[year]']").val(arr[0]);
					$("[name='door_time[month]']").val(arr[1]);
					$("[name='door_time[day]']").val(arr[2]);
				});
				/*
				//初始化地区选择插件
				addressInit("cmbProvince", "cmbCity", "cmbArea", "上海", "市辖区", "长宁区");
				*/
			});
		</script>
	</body>
</html>