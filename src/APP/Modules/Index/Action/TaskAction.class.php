<?php  
	//消息相关控制器
	Class TaskAction extends CommonAction{


		public function index(){
            $username = session('username');
            $jifen = M('member')->where(array('username'=>$username))->getField('jifen');
            $banner = M('banner')->order('addtime desc')->select();
            $duihuan = C('duihuan');
            $this->assign('jifen',$jifen);
            $this->assign('duihuan',$duihuan);
            $this->assign('banner',$banner);
			$this->display();
		}


		public function complete(){
			$this->display();
		}
		public function completepost(){

			$username = session('username');

			$pic =  I('post.image');
            if(empty($pic)){
                alert('Please select the picture to upload!',U('Index/task/complete'));
            }

            $s_time=strtotime(date("Y-m-d 00:00:01"));
            $o_time=strtotime(date("Y-m-d 23:59:59"));
            $jinbi = C('jinbi');
            $count = M('complete')->where("addtime> {$s_time} and addtime <{$o_time} and username = {$username} ")->count(); //Personal upload or not

                if($count >= 1){

                    alert('You have uploaded a picture today, please come back tomorrow!',U('Index/task/index'));
                }else{

                    $data['username'] = $username;
                    $data['pic'] = $pic;
                    $d