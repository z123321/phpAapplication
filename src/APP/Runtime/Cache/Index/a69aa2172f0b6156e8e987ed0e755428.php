<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html class="pixel-ratio-3 retina android android-5 android-5-0 watch-active-state"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">

    <title>My information</title>
     <link rel="stylesheet" href="/Public/dianyun/css/app.css">
     <link rel="stylesheet" href="/Public/dianyun/css/iconfont.css">
     <style type="text/css">
     *{
     margin: 0;
     padding: 0;
     }
     </style>

   </head>
   <body style="background: #ffffff;">
   <div class="navbar theme-white">
<div class="navbar-inner">
<div class="left">
<a href="javascript:history.go(-1);" class="external link"> <i class="icon iconfont icon-angleleft" style="transform: translate3d(0px, 0px, 0px);line- height: 3rem;"></i>Back</a>
</div>
<div class="center" data-i18n="member.myinfo" style="left: -24px;color: #fff;margin-top: -35px;">My information</div>
<div class="right"></div>
</div>
</div>
  
   <div class="pe-index-t">
   <p class="pe-index-t-t">My profile picture<img src="/favicon.ico"/> </p>
  		<p class="pe-index-t-c">My username <span><?php echo ($minfo["truename"]); ?></span> </p>
  		<p class="pe-index-t-c">My level<span><?php if($minfo['level'] == 0): ?>Ordinary member<?php else: ?>Leader<?php endif; ?></span></p>
  		<p class="pe-index-t-c">Bind mobile phone <span><?php echo ($minfo["mobile"]); ?></span> </p>
   <p class="pe-index-t-c">My bank card <span><?php echo ($list["card"]); ?></span> </p>
   </div>
   
   <p class="pe-index-zf">Binding the receiving account</p>
   
   <div class="pe-index-pp">
   <p>Withdraw Alipay</p>
   <p class="pe-index-pppp"> <?php if(empty($minfo['zhifu'])): ?><a style="color: rgb(255, 255, 255);;" class="external" href="<?php echo U('Index/Index/zhifu');?>" style="color: #000;">
                                         Click to bind
                                     </a>
<?php else: ?>Bounded<?php endif; ?></p>
   </div>
   
   <a class="xgwdxx" href="<?php echo U('Index/Index/edit');?>">Modify information and bind bank card</a>
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	
  	

<footer>
  	
  		<div class="foot_bo">
  			<a href="<?php echo U('Index/New/index');?>">
  				<img src="data:image/png;base64,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" />
  				<p>HOME</p>
  			</a>
  		</div>
  	
  		<div class="foot_cen">
  			<a href="<?php echo U('Index/Robot/robot');?>">
  				<img src="data:image/png;base64,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" />
  			</a>
  		</div>
  	
  		<div class="foot_bo">
  			<a href="<?php echo U('Index/Wallet/index');?>">
  				<img src="data:image/png;base64,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" />
  				<p class="xz">MY</p>
  			</a>
  		</div>
  	
  	</footer>
</body>
</html>