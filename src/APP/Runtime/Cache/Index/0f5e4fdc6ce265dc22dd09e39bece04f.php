<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html class="pixel-ratio-3 retina android android-5 android-5-0 watch-active-state"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="cache-control" content="no-cache">
    <meta http-equiv="expires" content="0">

    <title>My Solar Photovoltaic</title>
    <link rel="stylesheet" href="/Public/dianyun/css/app.css">
    <link rel="stylesheet" href="/Public/dianyun/css/iconfont.css">


    <link rel="stylesheet" type="text/css" href="/Public/css/common.css">
    <link rel="stylesheet" type="text/css" href="/Public/css/style1.css">
    <style type="text/css">
                .toolbar:before {display: none;}
                .bxxxx-top{
                width: 100%; float: left; height: 40px;background: ;font-size: 16px;line-height: 40px;padding-left: 20px;box-sizing: border-box;color: #000000;
                margin-top: 0.2rem;
                }
                .bxxxx-top a{
                font-size: 14px;background: #FFC102;width: 120px;height: 30px;display: inline-block;line-height: 30px;border-radius: 30px;text-align: center;margin-left: 10px;margin -top: -2px;color: #000000;
                }
                .boooooss{
                width: 92%;
                height: 400px;
                /*background: red;*/
                float: left;
                margin-left: 4%;
                margin-top: 5px;
                }
                .boooooss li{
                width: 100%;
                height: 100px;
                background: #0078d0;
                border-radius: 10px;
                margin-bottom: 10px;
                }
                .sssee{
                width: 100%;
                height: 30px;
                line-height: 30px;
                font-size: 18px;
                color: #ffffff;
                float: left;
                margin-top: 10px;
                }
                .sssee img{
                width: 30px;
                height: 30px;
                float: left;
                margin-left: 10px;
                margin-right: 4px;
                }
                .sssee span{
                color: #ffc102;
                font-size: 16px;
                float: right;
                margin-right: 10px;
                }
                .yyx_f{
                width: 65%;
                height: 50px;
                float: left;
                }
                .yyx_f p{
                height: 25px;
                line-height: 25px;
                font-size: 14px;
                padding-left: 10px;
                color: #ffffff;
                To
                }
                .lqkd_r{
                width: 30%;
                height: 50px;
                float: right;
                }
                .lqkd_r a{
                width: 80%;
                background: #FFC102;
                height: 30px;
                display: block;
                text-align: center;
                line-height: 30px;
                margin: 10px 10%;
                border-radius: 30px;
color: #000000;

                }
            </style>



</head>
<body style="background: #ffffff;">
<div class="navbar theme-white" style="margin-bottom: 10px">
<div class="navbar-inner">
<div class="left">
<a href="javascript:history.go(-1);" class="external link"> <i class="icon iconfont icon-angleleft" style="transform: translate3d(0px, 0px, 0px);line- height: 3rem;"></i>Back</a>
</div>
<div class="center" data-i18n="member.myinfo" style="left: -24px;color: #fff;margin-top: -35px;">Aurora Solar Photovoltaic</div>
<div class="right"></div>
</div>
</div>
            <div class="neirbg_f">
                        <div class="neirbg_f_in">
                            <h2>Solar photovoltaic restarts every <?php echo ($jiesuan_time); ?> hours to receive rewards</h2>
                            <div class="twobf_f">
                                <ul>
                                    <li>
                                        <em>Number of solar photovoltaics</em>
                                        <p><?php echo ($count1); ?> <font>Group</font></p>
                                    </li>
                                    <li>
                                        <em>Solar photovoltaic revenue</em>
                                        <p><?php echo ($sum); ?><font>$</font></p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            
            <div class="boooooss">
            
            	<ul>
            		<?php if(is_array($orders)): foreach($orders as $key=>$v): ?><li>
            				<p class="sssee"><img src="data:image/png;base64,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" /><?php echo ($v["project"]); ?> <span>In operation</span></p>
            
             <div class="yyx_f">
             <p>Run:
             <?php if($v['zt'] == 1): echo (set_number($v["a_time"],'0')); ?> hours
             <?php else: ?> -<?php endif; ?>
             <p>Already earned: <?php echo (four_number($v["already_profit"])); ?>元</p>
             </div>
            
             <div class="lqkd_r">
            
             <?php if($v["zt"] == 1): if($v["is_jiesuan"] == 1): ?><a href="<?php echo U('Robot/jiesuan',array('id'=>$v['id']));?>" style="padding:3px 5px; background:#ffc102; color:#000000 ; border-radius:4px;">Receive battery</a>
             <?php else: ?>
             <a href="javascript:alert(&#39;Do not operate, solar photovoltaic is working hard to generate electricity!&#39;);">In operation</a><?php endif; ?>
            						<?php else: ?> ----<?php endif; ?>
            
            				</div>
            
            			</li><?php endforeach; endif; ?>
            	</ul>
            
            </div>
            
            
            
            <footer>
            
            	<div class="foot_bo">
            		<a href="<?php echo U('Index/New/index');?>">
            			<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAKTWlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjanVN3WJP3Fj7f92UPVkLY8LGXbIEAIiOsCMgQWaIQkgBhhBASQMWFiApWFBURnEhVxILVCkidiOKgKLhnQYqIWotVXDjuH9yntX167+3t+9f7vOec5/zOec8PgBESJpHmomoAOVKFPDrYH49PSMTJvYACFUjgBCAQ5svCZwXFAADwA3l4fnSwP/wBr28AAgBw1S4kEsfh/4O6UCZXACCRAOAiEucLAZBSAMguVMgUAMgYALBTs2QKAJQAAGx5fEIiAKoNAOz0ST4FANipk9wXANiiHKkIAI0BAJkoRyQCQLsAYFWBUiwCwMIAoKxAIi4EwK4BgFm2MkcCgL0FAHaOWJAPQGAAgJlCLMwAIDgCAEMeE80DIEwDoDDSv+CpX3CFuEgBAMDLlc2XS9IzFLiV0Bp38vDg4iHiwmyxQmEXKRBmCeQinJebIxNI5wNMzgwAABr50cH+OD+Q5+bk4eZm52zv9MWi/mvwbyI+IfHf/ryMAgQAEE7P79pf5eXWA3DHAbB1v2upWwDaVgBo3/ldM9sJoFoK0Hr5i3k4/EAenqFQyDwdHAoLC+0lYqG9MOOLPv8z4W/gi372/EAe/tt68ABxmkCZrcCjg/1xYW52rlKO58sEQjFu9+cj/seFf/2OKdHiNLFcLBWK8ViJuFAiTcd5uVKRRCHJleIS6X8y8R+W/QmTdw0ArIZPwE62B7XLbMB+7gECiw5Y0nYAQH7zLYwaC5EAEGc0Mnn3AACTv/mPQCsBAM2XpOMAALzoGFyolBdMxggAAESggSqwQQcMwRSswA6cwR28wBcCYQZEQAwkwDwQQgbkgBwKoRiWQRlUwDrYBLWwAxqgEZrhELTBMTgN5+ASXIHrcBcGYBiewhi8hgkEQcgIE2EhOogRYo7YIs4IF5mOBCJhSDSSgKQg6YgUUSLFyHKkAqlCapFdSCPyLXIUOY1cQPqQ28ggMor8irxHMZSBslED1AJ1QLmoHxqKxqBz0XQ0D12AlqJr0Rq0Hj2AtqKn0UvodXQAfYqOY4DRMQ5mjNlhXIyHRWCJWBomxxZj5Vg1Vo81Yx1YN3YVG8CeYe8IJAKLgBPsCF6EEMJsgpCQR1hMWEOoJewjtBK6CFcJg4Qxwicik6hPtCV6EvnEeGI6sZBYRqwm7iEeIZ4lXicOE1+TSCQOyZLkTgohJZAySQtJa0jbSC2kU6Q+0hBpnEwm65Btyd7kCLKArCCXkbeQD5BPkvvJw+S3FDrFiOJMCaIkUqSUEko1ZT/lBKWfMkKZoKpRzame1AiqiDqfWkltoHZQL1OHqRM0dZolzZsWQ8ukLaPV0JppZ2n3aC/pdLoJ3YMeRZfQl9Jr6Afp5+mD9HcMDYYNg8dIYigZaxl7GacYtxkvmUymBdOXmchUMNcyG5lnmA+Yb1VYKvYqfBWRyhKVOpVWlX6V56pUVXNVP9V5qgtUq1UPq15WfaZGVbNQ46kJ1Bar1akdVbupNq7OUndSj1DPUV+jvl/9gvpjDbKGhUaghkijVGO3xhmNIRbGMmXxWELWclYD6yxrmE1iW7L57Ex2Bfsbdi97TFNDc6pmrGaRZp3mcc0BDsax4PA52ZxKziHODc57LQMtPy2x1mqtZq1+rTfaetq+2mLtcu0W7eva73VwnUCdLJ31Om0693UJuja6UbqFutt1z+o+02PreekJ9cr1Dund0Uf1bfSj9Rfq79bv0R83MDQINpAZbDE4Y/DMkGPoa5hpuNHwhOGoEctoupHEaKPRSaMnuCbuh2fjNXgXPmasbxxirDTeZdxrPGFiaTLbpMSkxeS+Kc2Ua5pmutG003TMzMgs3KzYrMnsjjnVnGueYb7ZvNv8jYWlRZzFSos2i8eW2pZ8ywWWTZb3rJhWPlZ5VvVW16xJ1lzrLOtt1ldsUBtXmwybOpvLtqitm63Edptt3xTiFI8p0in1U27aMez87ArsmuwG7Tn2YfYl9m32zx3MHBId1jt0O3xydHXMdmxwvOuk4TTDqcSpw+lXZxtnoXOd8zUXpkuQyxKXdpcXU22niqdun3rLleUa7rrStdP1o5u7m9yt2W3U3cw9xX2r+00umxvJXcM970H08PdY4nHM452nm6fC85DnL152Xlle+70eT7OcJp7WMG3I28Rb4L3Le2A6Pj1l+s7pAz7GPgKfep+Hvqa+It89viN+1n6Zfgf8nvs7+sv9j/i/4XnyFvFOBWABwQHlAb2BGoGzA2sDHwSZBKUHNQWNBbsGLww+FUIMCQ1ZH3KTb8AX8hv5YzPcZyya0RXKCJ0VWhv6MMwmTB7WEY6GzwjfEH5vpvlM6cy2CIjgR2yIuB9pGZkX+X0UKSoyqi7qUbRTdHF09yzWrORZ+2e9jvGPqYy5O9tqtnJ2Z6xqbFJsY+ybuIC4qriBeIf4RfGXEnQTJAntieTE2MQ9ieNzAudsmjOc5JpUlnRjruXcorkX5unOy553PFk1WZB8OIWYEpeyP+WDIEJQLxhP5aduTR0T8oSbhU9FvqKNolGxt7hKPJLmnVaV9jjdO31D+miGT0Z1xjMJT1IreZEZkrkj801WRNberM/ZcdktOZSclJyjUg1plrQr1zC3KLdPZisrkw3keeZtyhuTh8r35CP5c/PbFWyFTNGjtFKuUA4WTC+oK3hbGFt4uEi9SFrUM99m/ur5IwuCFny9kLBQuLCz2Lh4WfHgIr9FuxYji1MXdy4xXVK6ZHhp8NJ9y2jLspb9UOJYUlXyannc8o5Sg9KlpUMrglc0lamUycturvRauWMVYZVkVe9ql9VbVn8qF5VfrHCsqK74sEa45uJXTl/VfPV5bdra3kq3yu3rSOuk626s91m/r0q9akHV0IbwDa0b8Y3lG19tSt50oXpq9Y7NtM3KzQM1YTXtW8y2rNvyoTaj9nqdf13LVv2tq7e+2Sba1r/dd3vzDoMdFTve75TsvLUreFdrvUV99W7S7oLdjxpiG7q/5n7duEd3T8Wej3ulewf2Re/ranRvbNyvv7+yCW1SNo0eSDpw5ZuAb9qb7Zp3tXBaKg7CQeXBJ9+mfHvjUOihzsPcw83fmX+39QjrSHkr0jq/dawto22gPaG97+iMo50dXh1Hvrf/fu8x42N1xzWPV56gnSg98fnkgpPjp2Snnp1OPz3Umdx590z8mWtdUV29Z0PPnj8XdO5Mt1/3yfPe549d8Lxw9CL3Ytslt0utPa49R35w/eFIr1tv62X3y+1XPK509E3rO9Hv03/6asDVc9f41y5dn3m978bsG7duJt0cuCW69fh29u0XdwruTNxdeo94r/y+2v3qB/oP6n+0/rFlwG3g+GDAYM/DWQ/vDgmHnv6U/9OH4dJHzEfVI0YjjY+dHx8bDRq98mTOk+GnsqcTz8p+Vv9563Or59/94vtLz1j82PAL+YvPv655qfNy76uprzrHI8cfvM55PfGm/K3O233vuO+638e9H5ko/ED+UPPR+mPHp9BP9z7nfP78L/eE8/sl0p8zAAAABGdBTUEAALGOfPtRkwAAACBjSFJNAAB6JQAAgIMAAPn/AACA6QAAdTAAAOpgAAA6mAAAF2+SX8VGAAAGQ0lEQVR42uyda4hVVRTHf5rjiFikJZFkKaallFSgKdRM+aGH6TA96IFFWaQZUSkh9vighZWQRQTRRBhlNT7KLF8FRaZBD+2d+ZzGSjIbNVNnKhk8fVhbuNxmxnPv2a8zrj9c7sydc/c+Z//cj7XX2ssuSZKgikddtQkUiEqBKBCVAlEgKgWiQFQKRIGoFIhKgSgQlQJRICrb6pajex0OVAP9gKHAQKAXUGneAQ4C/wIHgEZgE/AbsBr4Pg8P2SViB1U3YCxQBYwDzspY3iZgGbAGWAkcViDpdBFwA1ADnO6oju3AUmAR8KkCaVtVwFSg1nO9bwJPxwImBiCnAU8CEwLfxzzgYeD3Y3mVdR/wXQQwAG4393L3sdhD+gKvAldEuqB4C5hoVmudvodcBqyLGAbAtcCXZoHRqYFMAd4HzsiBSTAYWAvc3FmBzAae91TXXGCOpbLmAzM6G5A5wEOe6loMPGB5GfuEt/tPksT1a3riTxuSJOlm6l3moPxJrtvL9SrramCJp57xD3AusA3oCWw2No5tjQE+yuOytz+wBejhCch4YLn5eQTwhaN6moAhwL68zSELPcKYWQADYKRjG2p+3ib1B4HRnmAsAWYVfXaJ4zrHGcMxF0PWAGArfnwtW4FzgEMFn3U380h/x3UfMPbUn7H3kDpPMA4aq/9Q0efDPcAAOB54LvYha4xpJB+qQfwaxRqJP00wK7togTzqqSHu7WDpWeV5i2VmrHPIxYh71LXmAXe09zyIL933XtlQxEUcVQ+Z5OHBP+sABmaCD7FxeVtsQ9YJZkx3qb3G8u9IIwij62MDMt5Acalaju5eHR0IyEDg0piAXOX4gacgvok081gojY0FSFckgM2V6oAXUlw3jOyxW1mX/FEAuRCJJnShNcBdKa8dRVidh4U4MhsWtauJdFeKSbxQq5A9rMS8ytFhoBUJ1Jtaxj/ukcAvoYEMcAAjMWPy3hK+s9O8bKjcIThzD7ExZA1yAOQW4KtAQ08t5fvjB8YAxLYhNhd4PRCMIYhPnjwD6WWxQT5AAhRCqAcSHZ9lGO8TA5DulhpkO/4DrQu12PSQrDsWwYH0tFBGq5nEmwPBeBzxAmZV7xiAtFoo40ZgYyAYExCXsw0dFwOQ/Rm/PwsJbg6hEcBrFsvbHwOQlgzffQfLDp4SJ+CllstsjgHIX2V+b13gSXwl9rd89mUtwIal3kh5btNn27iXCvNe+Kpo5/dKYA8SoViqXkL24GzrpxiANGSYOyaapWL3gsauKGr44r8VajniiylF99Cx1zGLtsXSQ8rRILJvu6wv8fpqHITuWGgLq3PI5wHngVKA9DOWuCslNtrCBpCtgWyIv5FDmmmfcxUS3OZKP8TSQyCde9W2GoBfU177BhLR6FKrbRRiC8iKAEC+TnndDMTh5ForYgKyEkny4lNpxusa5Diaa/2MHGaNBkgrch7Ep442fwxF0mb4kLXtF5uhpMOADZ4aYB+yVd7Uzt8rgW+Asz3dz5kZ7DEnPQTgR+BdTw2wsQMYmJ7hC8YCWzBsAwF4zFMjfNvB3+Zix7eRVrNtFmYbyHpPvaS9Cf1WYJpHGPXG/rAmF0faTjUGUqXDhjjfzBGFcnnyti01Iye1oj/SthN7Hri2tAM5bl2o3gFsofttw3AFBOAZ4EOHWxQtbdhBfT3CeBvZwicvQDDW8R8Oyi3OLvoifuN6G3GYcM0lkD1I3inbKtzhnQTc6XmougbZ2MwdEIBPkNR5tpQUTOajkKMKPnVdG4uJXAEBeJn/Z1rIYhBuQbyMqzzDmIaH6Bhf+bJmWjKg+gDTkZDTEz3CmG4WKs7lOwnmZNKdhopFh5EUf/W+KvSdc7EOuJL0jqWQ2oxE09T7rDRUmthTgFeAyyOFsQiJiGnxXXGoRMq7kDSx03CUCCzDLsNkY0O1hLiBGFKN90dOLN0U+D7qgEeA3SFvIqZk/NWmx9R4rnch8BSlx3h1eiBHVGWGjPG4y3vVgOxHLcbvDnEugRxRBZIhotq8D864fN2IBMp9DLwX60PHDKRYFyC5THojx4/7ASeZ30821zQhR6l3I1EwO8zPaxEXc/TKE5BjQvq/tCkQlQJRICoFokBUCkSBqBSIAlEpEJUCUSAqBaJAVNb13wCzrZtOEsOCegAAAABJRU5ErkJggg==" />
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
            			<p>MY</p>
            		</a>
            	</div>
            
            </footer>
                

</body>
</html>