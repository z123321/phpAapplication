<?php

//消息相关控制器
Class WalletAction extends CommonAction
{


    public function index()
    {
        $member = M('member');
        $username = session('username');
        $minfo = $member->where(array('username' => $username))->find();

        $count = M('order')->where(array('user' => $username, 'zt' => 1))->count();
        $chengzhu = C('chengzhu');
        $ztcount = M('order')->where(array('tuijian' => $username, 'zt' => 1))->count();
        if ($ztcount >= $chengzhu) {
            $data['level'] = 1;
            M('member')->where(array('username' => $username))->save($data);
        }
        $this->assign('count', $count);
        $this->assign('minfo', $minfo);
        $this->display();
    }


    //提现
    public function tixian()
    {
        $username = session('username');
        $money = M('member')->where(array('username' => $username))->getField('money');

        $yiti = M('emoneydetail')->where(array('username' => $username, 'status' => 1))->sum('amount');
        $money = sprintf('%.2f', $money);
        $yiti = sprintf('%.2f', $yiti);

        $this->assign('money', $money);
        $this->assign('yiti', $yiti);
        $this->display();
    }

    //提现
    public function withdrawn()
    {

        //是否开启提现功能
        if (C('WITHDRAW_STATUS') == 'off') {
            alert('Withdrawal is not yet open', U('Index/wallet/change'));
        }
        $tx_time = C('tx_time');
        $shouxu = C('WITHDRAW_TAX');
        if (!empty($tx_time)) {
            $tx_time_arr = explode('-', $tx_time);
            $s_time = strtotime(date("Y-m-d " . $tx_time_arr[0]));
            $o_time = strtotime(date("Y-m-d " . $tx_time_arr[1]));
            if (time() < $s_time || time() > $o_time) {
                alert('提现时间为' . $tx_time, U('Index/wallet/index'));
                exit;
            }
        }
        $this->assign('shouxu', $shouxu);
        $this->display();
    }

    //提现执行
    public function withpost()
    {

        if (IS_AJAX) {

            $type = I('post.type');
            $txmoney = I('post.money');
            $username = session('username');
            $member = M('member')->where(array('id' => session('mid')))->find();
            $bank = M('bankcard')->where(array('userid' => session('mid')))->count();

            $balance = M('member')->where(array('id' => session('mid')))->getField('money');
            $txcount = M('emoneydetail')->where(array('username' => session('username'), 'status' => 0))->count();

            if ($txcount > 0) {

                $this->ajaxReturn(array('info' => '您当前有未处理完成的提现订单！'));
            }
            $s_time = strtotime(date("Y-m-d 00:00:01"));
            $o_time = strtotime(date("Y-m-d 23:59:59"));
            $cishu = C('WITHDRAW_IN_DAY_NUM');
            $ztxcount = M('emoneydetail')->where("addtime > {$s_time} and addtime < {$o_time} and username = {$username}")->count();
            if ($ztxcount >= $cishu) {

                $this->ajaxReturn(array('info' => '每天最多可提现次数为' . $cishu . '次！'));
            }

            if ($txmoney == 0) {

                $this->ajaxReturn(array('info' => '请正确填写提现金额！'));
            }
            if ($txmoney > $balance) {
                $this->ajaxReturn(array('info' => '对不起，您的可提现金额不足！'));
            }

            if ($type == '') {

                $this->ajaxReturn(array('info' => '请选择提现方式！'));
            }
            //是否开启提现功能
            if (C('WITHDRAW_STATUS') == 'off') {

                $this->ajaxReturn(array('info' => '提现暂未开放！', 'result' => '1', 'url' => U('Index/Wallet/index')));
            }
            $tx_time = C('tx_time');
            if (!empty($tx_time)) {
                $tx_time_arr = explode('-', $tx_time);
                $s_time = strtotime(date("Y-m-d " . $tx_time_arr[0]));
                $o_time = strtotime(date("Y-m-d " . $tx_time_arr[1]));
                if (time() < $s_time || time() > $o_time) {

                    $this->ajaxReturn(array('info' => '提现时间为\'.$tx_time', 'result' => '1'));
                    exit;
                }
            }
            //一次性提现最少额度
            if ($txmoney < C('WITHDRAW_MIN')) {

                $this->ajaxReturn(array('info' => '您输入的提现金额小于最少提现金额，请输入至少' . C('WITHDRAW_MIN') . '提现额！'));
            }
            //设置提现整数倍
            if (C('WITHDRAW_INT') > 0) {
                if ($txmoney % C('WITHDRAW_INT') != 0) {

                    $this->ajaxReturn(array('info' => '您输入的提现金额必须为' . C('WITHDRAW_INT') . '的整数倍！'));
                }
            }
            //提现手续费点位、手续费上限、手续费下限	设置提现的时候要扣除的手续费即x%
            if (C('WITHDRAW_TAX') > 0) {
                $withdrawtaxnum = $txmoney * (C('WITHDRAW_TAX') / 100);
            }
            $withdrawtaxnum = intval($withdrawtaxnum);
            $txmoney = intval($txmoney);
            //正式处理
            $banks = M('bankcard')->where(array('userid' => session('mid')))->find();
            //提现方式
            if ($type == 1) {

                if ($bank == 0) {

                    $this->ajaxReturn(array('info' => 'You have not bound the bank card, please bind the bank card first！', 'result' => '1', 'url' => U('Index/index/personal')));
                } else {
                    $data['username'] = session('username');
                    $data['amount'] = $txmoney;
                    $data['charge'] = $withdrawtaxnum;
                    $data['payment'] = $txmoney - $withdrawtaxnum;
                    $data['type'] = $type;
                    $data['addtime'] = time();
                    $data['card'] = $banks['card'];
                    $data['kaihuhang'] = $banks['kaihuhang'];
                    $data['mode'] = $banks['name'];
                    $data['remark'] = 'Withdrawal' . $txmoney . '₹,deduction' . $withdrawtaxnum . 'fees';
                }

            } elseif ($type == 2) {
                if ($member['zhifu'] == "") {

                    $this->ajaxReturn(array('info' => '您还未上传支付宝收款二维码，请先上传支付宝二维码！', 'result' => '1', 'url' => U('Index/index/personal')));
                } else {
                    $data['username'] = session('username');
                    $data['mode'] = $type;
                    $data['amount'] = $txmoney;
                    $data['charge'] = $withdrawtaxnum;
                    $data['payment'] = $txmoney - $withdrawtaxnum;
                    $data['type'] = $type;
                    $data['addtime'] = time();
                    $data['zhifu'] = $member['zhifu'];
                    $data['remark'] = '申请提现' . $txmoney . '元,扣除' . $withdrawtaxnum . '作为手续费扣除';
                }

            } elseif ($type == 3) {
                if ($member['wei'] == "") {

                    $this->ajaxReturn(array('info' => '您还没未上传微信收款二维码，请先上传微信二维码！', 'result' => '1', 'url' => U('Index/index/personal')));
                } else {
                    $data['username'] = session('username');
                    $data['mode'] = $type;
                    $data['amount'] = $txmoney;
                    $data['charge'] = $withdrawtaxnum;
                    $data['payment'] = $txmoney - $withdrawtaxnum;
                    $data['type'] = $type;
                    $data['addtime'] = time();
                    $data['wei'] = $member['wei'];
                    $data['remark'] = '申请提现' . $txmoney . '₹,扣除' . $withdrawtaxnum . '作为手续费扣除';
                }
            }


            if (M('emoneydetail')->data($data)->add()) {
                M('member')->where(array('username' => session('username')))->setDec('money', $txmoney);
                account_log($data['username'], $txmoney, ' 提现', 0);
                M('member')->where(array('username' => session('username')))->setInc('dongjie', $txmoney);
                account_log4($data['username'], $txmoney, ' 提现冻结', 1);

                $this->ajaxReturn(array('info' => '提现成功！', 'result' => '1', 'url' => U('Index/Wallet/withdrawnlog')));
            } else {

                $this->ajaxReturn(array('info' => '提现失败！', 'result' => '1', 'url' => U('Index/Wallet/withdrawn')));
            }
        }
    }

    //提现记录
    public function withdrawnlog()
    {
        $emoneydetail = M('emoneydetail');
        $username = session('username');

        $list = $emoneydetail->where(array('username' => $username))->order('addtime desc')->select();


        $this->assign('list', $list);
        $this->display();
    }

    //全部奖励
    public function award()
    {

        $data = M('jinbidetail');
        import('ORG.Util.Page');
        $map['member'] = session('username');
        $count = $data->where($map)->count();
        $page = new Page($count, 8);
        $page->setConfig('theme', '%first% %upPage% %linkPage% %downPage% %end%');
        $show = $page->show();// 分页显示输出
        $list = $data->where($map)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();

        $shouyi = M('order')->where(array('user' => $map['member']))->sum('already_profit');
        $yue = M('member')->where(array('username' => session('username')))->getField('money');
        $yiti = M('emoneydetail')->where(array('username' => $map['member'], 'status' => 1))->sum('amount');
        $shouyi = sprintf('%.2f', $shouyi);
        $yue = sprintf('%.2f', $yue);
        $yiti = sprintf('%.2f', $yiti);

        $this->assign('shouyi', $shouyi);
        $this->assign('yue', $yue);
        $this->assign('yiti', $yiti);
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->display();
    }

    //流量奖励
    public function llaward()
    {

        $data = M('jinbidetail');
        import('ORG.Util.Page');
        $map['member'] = session('username');
        $map['type'] = array("eq", 1);
        $count = $data->where($map)->count();
        $page = new Page($count, 8);
        $page->setConfig('theme', '%first% %upPage% %linkPage% %downPage% %end%');
        $show = $page->show();// 分页显示输出
        $list = $data->where($map)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();

        $shouyi = M('order')->where(array('user' => $map['member']))->sum('already_profit');
        $yue = M('member')->where(array('username' => session('username')))->getField('money');
        $yiti = M('emoneydetail')->where(array('username' => $map['member'], 'status' => 1))->sum('amount');
        $shouyi = sprintf('%.2f', $shouyi);
        $yue = sprintf('%.2f', $yue);
        $yiti = sprintf('%.2f', $yiti);

        $this->assign('shouyi', $shouyi);
        $this->assign('yue', $yue);
        $this->assign('yiti', $yiti);
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->display();
    }

    //推广奖励
    public function tgaward()
    {

        $data = M('jinbidetail');
        import('ORG.Util.Page');
        $map['member'] = session('username');
        $map['type'] = array("eq", 2);
        $count = $data->where($map)->count();
        $page = new Page($count, 8);
        $page->setConfig('theme', '%first% %upPage% %linkPage% %downPage% %end%');
        $show = $page->show();// 分页显示输出
        $list = $data->where($map)->order('id desc')->limit($page->firstRow . ',' . $page->listRows)->select();

        $shouyi = M('order')->where(array('user' => $map['member']))->sum('already_profit');
        $yue = M('member')->where(array('username' => session('username')))->getField('money');
        $yiti = M('emoneydetail')->where(array('username' => $map['member'], 'status' => 1))->sum('amount');
        $shouyi = sprintf('%.2f', $shouyi);
        $yue = sprintf('%.2f', $yue);
        $yiti = sprintf('%.2f', $yiti);

        $this->assign('shouyi', $shouyi);
        $this->assign('yue', $yue);
        $this->assign('yiti', $yiti);
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->display();
    }

    //充值记录
    public function rechargelog()
    {
        $username = session('username');
        $Dao = new Model();
        $list = $Dao->query("select * from codepay_order where pay_id=$username and status = 2");

        $this->assign('list', $list);

        $this->display();
    }

    //
    public function onlinerecharge()
    {
        $username = session('username');
        $this->assign('username', $username);
        $this->display();
    }
//QWJ_QUICK	快捷支付
//2004	支付宝扫码
//3002	支付宝H5
//5001	微信扫码
//3008	微信H5
//3011	银联扫码
//7001	网银支付	不需要传网银编码
//8001	对公账户
    public function orderupdate()
    {
        $time = time();
        $pay_no = date('YmdHis',$time).'0000'.mt_rand(10,99).$time;
        $pay_id = array(
            'QWJ_QUICK',
            '2004',
            '3002',
            '5001',
            '3008',
            '3011',
            '7001',
            '8001',
        );
        $appid = 'S9KHZ7GY';
        $appkey = 'cd4a4fa7cbbc05f854171cd46b829a93';
        $user = i('user');
        $type = i('type');
        $money = i('money');
        $data['total_fee'] = number_format($money, 2, ".", "");
        $data['appid'] = $appid;
        $secret = $appkey;
        $data['version'] = '1.1';//固定1.1
        $data['pay_id'] = $pay_id[$type];
        $data['out_trade_no'] = $pay_no;
        $data['return_url'] =  $_SERVER['HTTP_HOST'].'/index.php/Nig/orderNotify';
        $data['notify_url'] =  $_SERVER['HTTP_HOST'].'/index.php/Nig/orderNotify';
        $insert = array(
            'pay_id'=>$user,
            'money'=>$money,
            'price'=>$money,
            'type'=>$type,
            'pay_no'=>$pay_no,
            'param'=>NULL,
            'status'=>0,
            'creat_time'=>$time
        );
        $Model = new Model();
        $zhixing = $Model->table('codepay_order')->add($insert);
        ksort($data);
        $fieldString = array();
        foreach ($data as $key => $value) {
            if(!empty($value)){
                $fieldString [] = $key . "=" . $value . "";
            }
        }
        $fieldString = implode('&', $fieldString);
        $data['sign'] = md5($fieldString . $secret);
        $payUrl = 'http://pay.jr8789.com/api.php/webRequest/tradePay';//支付接口地址
        $result = $this->post_json($payUrl, $data);
        $result = json_decode($result, true);
//dump($result);
        if($result['data']['resp_code']=='00'){
            header("Location:".$result['data']['payment']);
            return;
        }else{
            $this->assign('data', $result['result']);
            $this->display();
        }
    }
    //回调地址

    public function post_json($url, $post)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        $s = curl_exec($ch);
        curl_close($ch);
        return $s;
    }
}

?>