<?php

Class NigAction extends Action
{
    public function orderNotify(){
        $info = i();
        if ($info['resp_code']==00){
            $data = array(
                'status'=>2,
                'pay_time'=>time()
            );
            $Model = new Model();
            $update = $Model->table('codepay_order')->where('pay_no='.$info['out_trade_no'])->save($data);
        }

    }
}