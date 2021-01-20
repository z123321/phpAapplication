<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Tables - Ace Admin</title>

    <meta name="description" content="Static &amp; Dynamic Tables" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--basic styles-->

    <link href="__PUBLIC__/css/bootstrap.min.css" rel="stylesheet" />
    <link href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet" />
    <link href="__PUBLIC__/css/animate.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="__PUBLIC__/css/font-awesome.min.css" />

    <style type="text/css" title="currentStyle">
        @import "__PUBLIC__/css/TableTools.css";
    </style>

    <!--[if IE 7]>
    <link rel="stylesheet" href="__PUBLIC__/css/font-awesome-ie7.min.css" />
    <![endif]-->

    <!--page specific plugin styles-->

    <!--fonts-->

    <!--bbc styles-->

    <link rel="stylesheet" href="__PUBLIC__/css/bbc.min.css" />
    <link rel="stylesheet" href="__PUBLIC__/css/bbc-responsive.min.css" />
    <link rel="stylesheet" href="__PUBLIC__/css/bbc-skins.min.css" />
    <script src="__PUBLIC__/js/My97DatePicker/WdatePicker.js"></script>
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="__PUBLIC__/css/bbc-ie.min.css" />
    <![endif]-->

    <!--inline styles if any-->
</head>

<body>
<!--导航-->
<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-leaf"></i>
							内部销售系统
						</small>
					</a><!--/.brand-->

					<ul class="nav ace-nav pull-right">




						<li class="light-blue user-profile">
							<a data-toggle="dropdown" href="#" class="user-menu dropdown-toggle">
								<img class="nav-user-photo" src="__PUBLIC__/avatars/avatar2.png"/>
								<span id="user_info">
									<small>管理员</small>
									<?php echo (session('adminusername')); ?>
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer" id="user_menu">
								<li>
									<a href="<?php echo U(GROUP_NAME.'/Index/Logout');?>">
										<i class="icon-off"></i>
										安全退出
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
        
        
<style>
#page_search input{ border:0px; background:#ccc;color:#ffffff; margin-left:5px;}
#page_search .current{ background:#005580; color:#ffffff;}
.page a{font-size:16px;}
a.active{ color:#C30 !important; font-size:18px;}

</style>        
        

<div class="container-fluid" id="main-container">
    <a id="menu-toggler" href="#">
        <span></span>
    </a>

    <!--边栏-->
    <div id="sidebar">
<?php $acc = session("_ACCESS_LIST");?>
				<div id="sidebar-shortcuts">
				
					<div id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li>
						<a href="<?php echo U(GROUP_NAME.'/Index/index');?>">
							<i class="icon-dashboard"></i>
							<span>首页</span>
						</a>
					</li>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Memberuncheck_Membercheck" <?php if(MODULE_NAME == 'Member'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-edit"></i>
							<span>会员管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Member'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('check')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Membercheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/check');?>">
									<i class="icon-double-angle-right"></i>
									会员列表
								</a>
							</li><?php endif; ?>

							<li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/lockuser');?>">
									<i class="icon-double-angle-right"></i>
									封停会员
								</a>
							</li>


	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Member')][strtoupper('shu_list')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Membercheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/shu_list');?>">
									<i class="icon-double-angle-right"></i>
									团队树形图
								</a>
							</li><?php endif; ?>	

							<li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/gaward');?>">
									<i class="icon-double-angle-right"></i>
									赠送太阳能光伏
								</a>
							</li>

							<li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Member/awardlist');?>">
									<i class="icon-double-angle-right"></i>
									发放奖励记录
								</a>
							</li>

						
						</ul>
					</li><?php endif; ?>

<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Dai')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li <?php if(MODULE_NAME == 'Dai'): ?>class="open"<?php endif; ?>>
	<a href="#" class="dropdown-toggle">
		<i class="icon-book"></i>
		<span class="menu-text"> 任务管理 </span>

		<b class="arrow icon-angle-down"></b>
	</a><?php endif; ?>

	<ul class="submenu" <?php if(MODULE_NAME == 'Dai'): ?>style="display: block;"<?php endif; ?>>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Dai')][strtoupper('uncheck')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
			<a href="<?php echo U(GROUP_NAME.'/Dai/uncheck');?>">
				<i class="icon-double-angle-right"></i>
				发布任务
			</a>
		</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Dai')][strtoupper('notcheck')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
			<a href="<?php echo U(GROUP_NAME.'/Dai/notcheck');?>">
				<i class="icon-double-angle-right"></i>
				任务审核
			</a>
		</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Dai')][strtoupper('check')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
			<a href="<?php echo U(GROUP_NAME.'/Dai/check');?>">
				<i class="icon-double-angle-right"></i>
				审核通过
			</a>
		</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Dai')][strtoupper('kaijiang')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
			<a href="<?php echo U(GROUP_NAME.'/Dai/pin_list');?>">
				<i class="icon-double-angle-right"></i>
				激活码生成
			</a>
		</li><?php endif; ?>
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Dai')][strtoupper('kaijiang')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
			<a href="<?php echo U(GROUP_NAME.'/Dai/pin_loglist');?>">
				<i class="icon-double-angle-right"></i>
				激活码日志
			</a>
		</li><?php endif; ?>
		</ul>
		</li>
	</if>

	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="top"  <?php if(MODULE_NAME == 'Shop'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list"></i>
							<span>商城管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Shop'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('shopbanner')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/shopbanner');?>">
									<i class="icon-double-angle-right"></i>
									商城滚动横幅
								</a>
							</li><?php endif; ?>

						</ul>
					</li><?php endif; ?>		
	<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shai')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li <?php if(MODULE_NAME == 'Shai'): ?>class="open"<?php endif; ?>>
		<a href="#" class="dropdown-toggle">
			<i class="icon-asterisk"></i>
			<span class="menu-text"> 骰子游戏 </span>

			<b class="arrow icon-angle-down"></b>
		</a><?php endif; ?>

		<ul class="submenu" <?php if(MODULE_NAME == 'Shai'): ?>style="display: block;"<?php endif; ?>>
		<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shai')][strtoupper('gonggao')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
				<a href="<?php echo U(GROUP_NAME.'/Shai/gonggao');?>">
					<i class="icon-double-angle-right"></i>
					游戏公告
				</a>
			</li><?php endif; ?>
		<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shai')][strtoupper('goumai')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
				<a href="<?php echo U(GROUP_NAME.'/Shai/goumai');?>">
					<i class="icon-double-angle-right"></i>
					购买列表
				</a>
			</li><?php endif; ?>
		<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shai')][strtoupper('kaijiang')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li>
				<a href="<?php echo U(GROUP_NAME.'/Shai/kaijiang');?>">
					<i class="icon-double-angle-right"></i>
					开奖列表
				</a>
			</li><?php endif; ?>
		</ul>
	</li>
</if>			
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="top"  <?php if(MODULE_NAME == 'Shop'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-random"></i>
							<span>太阳能光伏管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Shop'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Banner')][strtoupper('type_list')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/banner');?>">
									<i class="icon-double-angle-right"></i>
									首页滚动横幅
								</a>
							</li><?php endif; ?>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('type_list')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/type_list');?>">
									<i class="icon-double-angle-right"></i>
									分类列表
								</a>
							</li><?php endif; ?>	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('lists')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/lists');?>">
									<i class="icon-double-angle-right"></i>
									太阳能光伏列表
								</a>
							</li><?php endif; ?>					
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Shop')][strtoupper('orderlist')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Memberuncheck">
								<a href="<?php echo U(GROUP_NAME.'/Shop/orderlist');?>">
									<i class="icon-double-angle-right"></i>
									已购太阳能光伏
								</a>
							</li><?php endif; ?>							
						</ul>
					</li><?php endif; ?>						
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Bonusindex_Jinbidetailindex_JinbidetailjinbiAddList_Jinzhongzidetailindex" <?php if(MODULE_NAME == 'Jinbidetail'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-calendar"></i>
							<span>资金管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Jinbidetail'): ?>style="display: block;"<?php endif; ?>>

				
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('index')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/index');?>">
									<i class="icon-double-angle-right"></i>
									SUBY明细
								</a>
							</li><?php endif; ?>

<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('index')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U('Jinbidetail/index',array('type'=>1));?>">
									<i class="icon-double-angle-right"></i>
									太阳能光伏收益
								</a>
	
						</li><?php endif; ?>	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('qjinbi')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Jinbidetailindex">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/qjinbi');?>">
									<i class="icon-double-angle-right"></i>
									冻结钱包明细
								</a>
							</li><?php endif; ?>	
						
 <?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('paylists')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="JinbidetailjinbiAddList">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/paylist');?>">
									<i class="icon-double-angle-right"></i>
									充值管理
								</a>
							</li><?php endif; ?> 


<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Jinbidetail')][strtoupper('emoneyWithdraw')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="JinbidetailjinbiAddList">
								<a href="<?php echo U(GROUP_NAME.'/Jinbidetail/emoneyWithdraw');?>">
									<i class="icon-double-angle-right"></i>
									提现管理
								</a>
							</li><?php endif; ?>

						</ul>
					</li><?php endif; ?>					
					
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Infoannounce_InfoannType_InfomsgReceive_InfomsgSend" <?php if(MODULE_NAME == 'Info'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-list-alt"></i>
							<span>信息交流</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Info'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('announce')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Infoannounce">
								<a href="<?php echo U(GROUP_NAME.'/Info/announce');?>">
									<i class="icon-double-angle-right"></i>
									公告管理
								</a>
							</li><?php endif; ?>							
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('annType')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="InfoannType">
								<a href="<?php echo U(GROUP_NAME.'/Info/annType');?>">
									<i class="icon-double-angle-right"></i>
									公告类别
								</a>
							</li><?php endif; ?>						
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Info')][strtoupper('msgReceive')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="InfomsgReceive">
								<a href="<?php echo U(GROUP_NAME.'/Info/msgReceive');?>">
									<i class="icon-double-angle-right"></i>
									聊天室
								</a>
							</li><?php endif; ?>
						</ul>
					</li><?php endif; ?>			
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Rbacindex_Rbacrole_Rbacnode" <?php if(MODULE_NAME == 'Rbac'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-file"></i>
							<span>权限管理</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'Rbac'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')][strtoupper('index')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Rbacindex">
								<a href="<?php echo U(GROUP_NAME.'/Rbac/index');?>">
									<i class="icon-double-angle-right"></i>
									管理员列表
								</a>
							</li><?php endif; ?>	
						
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')][strtoupper('role')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Rbacrole">
								<a href="<?php echo U(GROUP_NAME.'/Rbac/role');?>">
									<i class="icon-double-angle-right"></i>
									角色列表
								</a>
							</li><?php endif; ?>	




<!--							
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('Rbac')][strtoupper('node')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="Rbacnode">
								<a href="<?php echo U(GROUP_NAME.'/Rbac/node');?>">
									<i class="icon-double-angle-right"></i>
									节点列表
								</a>
							</li><?php endif; ?>
-->				
				
						</ul>
						
					</li><?php endif; ?>	
		
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('System')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li sid="Logindex_BakbackUp_SystemcustomSetting"  <?php if(MODULE_NAME == 'System'): ?>class="open"<?php endif; ?>>
						<a href="#" class="dropdown-toggle">
							<i class="icon-text-width"></i>
							<span>系统设置</span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu" <?php if(MODULE_NAME == 'System'): ?>style="display: block;"<?php endif; ?>>
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('System')][strtoupper('backUp')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="BakbackUp">
								<a href="<?php echo U(GROUP_NAME.'/System/backUp');?>">
									<i class="icon-double-angle-right"></i>
									数据备份
								</a>
							</li><?php endif; ?>	
<?php if((isset($acc[strtoupper(GROUP_NAME)][strtoupper('System')][strtoupper('customSetting')])) or (!empty($_SESSION[C('ADMIN_AUTH_KEY')]))): ?><li url="SystemcustomSetting">
								<a href="<?php echo U(GROUP_NAME.'/System/customSetting');?>">
									<i class="icon-double-angle-right"></i>
									自定义配置
								</a>
							</li><?php endif; ?>								
							
						</ul>
					</li><?php endif; ?>					
					
				</ul><!--/.nav-list-->

				<div id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

<script type="text/javascript">
	window.jQuery || document.write("<script src='__PUBLIC__/js/jquery-1.9.1.min.js">"+"<"+"/script>");
</script>
<script type="text/javascript">
	$(function() {
		var method = '<?php echo ($_SERVER['PATH_INFO']); ?>';
		var middle = method.split('/')[2];
		var end = method.split('/')[3];

		$('li[sid*='+ middle + end +']').addClass("active open");
		$('li[url*='+ middle + end +']').addClass("active");
	});
</script>

    <div id="main-content" class="clearfix">
        <div id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="#">Home</a>

							<span class="divider">
								<i class="icon-angle-right"></i>
							</span>
                </li>
                <li class="active">游戏管理</li>
            </ul><!--.breadcrumb-->
        </div>

        <div id="page-content" class="clearfix">
            <div class="page-header position-relative">
                <h1> 游戏购买管理 </h1><span>购买总金额:&nbsp;&nbsp;<?php echo ($zgoumai); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>赢利总金额:&nbsp;&nbsp;<?php echo ($zyingmoney); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span>已消除泡沫:&nbsp;&nbsp;<?php echo ($yixiaochu); ?></span>
            </div><!--/.page-header-->

            <div class="row-fluid">
                <!--PAGE CONTENT BEGINS HERE-->
                <form id="table-searchbar" method="POST" action="<?php echo U(GROUP_NAME.'/Shai/goumai');?>" class="form-inline well well-small">
                    <div class="row-fluid">&nbsp;&nbsp;用户ID
                        <input type="text" class="input-small" name="id" value="<?php echo $_POST['id'];?>">
                        &nbsp;&nbsp;开始日期
                        <input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="<?php echo $_POST['starttime'];?>"class="input-small" name="starttime">
                        &nbsp;&nbsp;截止日期
                        <input type="text" onclick="WdatePicker({dateFmt:'yyyy-MM-dd'})" value="<?php echo $_POST['endtime'];?>" class="input-small" name="endtime">
                        <button type="submit" class="btn btn-small no-border" id="btn-query" type="button"><i class="icon-search"></i>查询</button>
                    </div>
                </form>
			
                <table id="table_report" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>

                        <th>ID</th>
                        <th>会员id</th>
                        <th>会员编号</th>
                        <th>金额</th>
                        <th>购买</th>
                        <th>下单时间</th>
                        <th>结束时间</th>
                        <th>状态</th>
                        <th>开奖点数</th>
                        <th>中奖金额</th>
                        <th>开奖结果</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($list)): foreach($list as $key=>$vo): ?><tr>
                            <td><?php echo ($vo["id"]); ?></td>
                            <td><?php echo ($vo["uid"]); ?></td>
                            <td><a target="_blank" href="<?php echo U('Member/inMember',array('u'=>$vo['username']));?>"><?php echo ($vo["username"]); ?></a></td>
                            <td><?php echo ($vo["money"]); ?></td>
                            <td><?php if($vo['buyid']<=6){echo $vo['buyid'];}elseif($vo['buyid']==7){ echo '大';}else{echo '小';}?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["starttime"])); ?></td>
                            <td><?php echo (date("Y-m-d H:i:s",$vo["endtime"])); ?></td>
                            <td><?php if($vo['status']==1){ echo '<span style="color:#ea2000;">进行中</span>';}if($vo['status']==2){ echo '已结束';}?></td>
                            <td><?php echo ($vo["isid"]); ?></td>
                            <td><?php echo ($vo["yingmoney"]); ?></td>
                            <td>
                                <?php if($vo['isid']!=0){ if($vo['isid']==$vo['buyid']){ echo '<span style="color:#ed5859">中奖</span>'; }else if($vo['isid']>3 && $vo['buyid']==7){ echo '<span style="color:#ed5859">中奖</span>'; }else if($vo['isid']<=3 && $vo['buyid']==8){ echo '<span style="color:#ed5859">中奖</span>'; }else{ echo '未中奖'; } }else{ echo '未开奖'; } ?>
                            </td>
                        </tr><?php endforeach; endif; ?>
                    <tr>
                        <td colspan="18" style="text-align:center;"><div class="page"><?php echo ($page); ?></div></td>
                    </tr>
                    </tbody>
                </table>


                </form>
            </div>
            <!--PAGE CONTENT ENDS HERE-->
        </div><!--/row-->
    </div><!--/#page-content-->
</div><!--/#main-content-->
</div><!--/.fluid-container#main-container-->

<a href="#" id="btn-scroll-up" class="btn btn-small btn-inverse">
    <i class="icon-double-angle-up icon-only bigger-110"></i>
</a>

<!--basic scripts-->
<script src="__PUBLIC__/js/jquery-1.9.1.min.js"></script>

<script src="__PUBLIC__/js/bootstrap.min.js"></script>

<!--page specific plugin scripts-->
<script src="__PUBLIC__/js/bootbox.min.js"></script>
<script src="__PUBLIC__/js/jquery.dataTables.min.js"></script>
<script src="__PUBLIC__/js/jquery.dataTables.bootstrap.js"></script>
<script src="__PUBLIC__/js/TableTools.min.js"></script>
<!--bbc scripts-->

<script src="__PUBLIC__/js/bbc-elements.min.js"></script>
<script src="__PUBLIC__/js/bbc.min.js"></script>

<script src="__PUBLIC__/js/bootstrap.notification.js"></script>
<script src="__PUBLIC__/js/jquery.easing.1.3.js"></script>
<script type="text/javascript">
    function clear1(){
        var start,end;
        if(confirm("确认要导出会员信息吗?")){
            if($("#start_time").val()){
                start = $("#start_time").val();
            }else{
                start =0;
            }
            if($("#end_time").val()){
                end   =  $("#end_time").val();
            }else{
                end   = 0;
            }

            window.location.href = "/index.php/Systemlogined/Excel/member/";
        }
    }
</script>
<!--inline scripts related to this page-->
</body>
</html>