<?php  
	
	/**
	 * 会员前台登录控制器
	 */
	Class LoginAction extends Action{

			public function _initialize(){
				//判断是否关闭了网站
				$open_web=C('open_web');
				if(empty($open_web)){
					$this->open_web_notice=C('open_web_notice');
					$this->display('Index:404');
					exit;
				}	
				
			}
		
		
		
		/**
		 * 会员登录视图
		 * @return [type] [description]
		 */
		public function index(){
			
				if(IS_AJAX){
					
						//验证系统是否为开放状态
						if (C('MEMBER_LOGIN') == 'off') {
							$this->ajaxReturn(array('result'=>'0','info'=>'system did not open！'));					
						}
						
						if (I('username')=="" || I('password')=="") {
							$this->ajaxReturn(array('result'=>'0','info'=>'username or password is null！'));			
						}
						


						
						$model_m = M('member');
						//验证用户名和密码
						$member = $model_m->where(array('username'=>I('username'),'password'=>I('password','','md5')))->find();
						if(!$member){
							$this->ajaxReturn(array('result'=>'0','info'=>'Username or password error!'));								
						}
						

						//禁止锁定会员登录
						if($member['lock']){
							$this->ajaxReturn(array('result'=>'0','info'=>'Your account is locked ,please Contact Customer Service'));			
						}				
						
						//更新上一次IP和登录时间
						$prologin['preloginip']      = $member['loginip'];
						$prologin['preloginaddress'] = '';
						$prologin['prelogintime']    = $member['logintime'];

						$model_m->where(array('id'   =>$member['id']))->save($prologin);
						//更新最后一次登录的IP和登录时间
						//$area = $Ip->getlocation(get_client_ip());
						//$area = get_ip_address(get_client_ip());
			  
						$data = array(
							'id'           => $member['id'],
							'logintime'    => time(),
							'loginip'      => '',
							'loginaddress' => ''
						);
						$model_m->save($data);

						//添加登录总次数
						$model_m->where(array('username'=>I('username')))->setInc('logincount'); 
						//保存session
						session('mid',$member['id']);
						session('username',$member['username']);
						session('member','memberlogin');
						
						$remember=I("post.remember",0,'intval');
						$mypassword=I('post.password');
						if(!empty($remember)){
							setcookie('rememberusername', $member['username'], time() + 3600 * 24 * 30);  
           					setcookie('rememberpassword', $mypassword, time() + 3600 * 24 * 30);  
								
						}else{
							setcookie('rememberusername', null, time() - 3600 * 24 * 30);  
           					setcookie('rememberpassword', mull, time() - 3600 * 24 * 30);  
								
						}
						
						//添加日志操作
						//$desc = '会员['.session('username').']登录';
						//write_log(session('username'),'member',$desc);
							$this->ajaxReturn(array('result'=>'1','info'=>'Login success！','url'=>U('Index/Wallet/Index')));
					
				}else{
					
					$rememberusername=$_COOKIE['rememberusername'];
					$rememberpassword=$_COOKIE['rememberpassword'];
					if(!empty($_COOKIE['rememberusername'])){
						$rememberusername=$_COOKIE['rememberusername'];
					}
					if(!empty($_COOKIE['rememberpassword'])){
						$rememberpassword=$_COOKIE['rememberpassword'];
					}
					$shipin = C('shipin');
					$this->assign('shipin',$shipin);
					$this->assign('rememberusername',$rememberusername);
					$this->assign('rememberpassword',$rememberpassword);
					$this->display();
				}
		}

		//修改密码
		public function editPwd(){
			header("Content-type:text/html;charset=utf-8");
    			if (IS_POST) {
    				$mobile = I('post.mobile','','strval');
    
    				if(!preg_match("/^(1)[0-9]{10}$/",$mobile)){
    					$this->ajaxReturn(array('info'=>'Mobile phone number format is incorrect!'));
                }
                if (!M('member')->where(array('mobile'=>trim($mobile)))->getField('id')) {
                $this->ajaxReturn(array('info'=>'Mobile phone number does not exist, please re-enter!'));
                }
                $code = I('post.code','');
                if(!$code){
                $this->ajaxReturn(array('info'=>'Please enter the SMS verification code!'));
                }
                $check_code = sms_code_verify($mobile,$code,session_id());
                if($check_code['status'] != 1){
                $this->ajaxReturn(array('info'=>$check_code['msg']));
                }
                $password = I('post.password','','md5');
                $password1 = I('post.password1','','md5');
                
                if ($password != $password1) {
                $this->ajaxReturn(array('info'=>'The password and the confirmed password are inconsistent!'));
                }
                //Start to change the password
                $data = array();
                $data['password'] = $password;
                M('member')->where(array('username'=>$mobile))->save($data);
                $this->ajaxReturn(array('info'=>'Password reset successfully!','result'=>1,'url'=>U('Index/Login')));
                			}
			$this->display();
		}
        public function reg(){

            
            $this->display();
        }
        //前台注册
        public function regSempost(){

            if (IS_AJAX) {
                import('ORG.Net.IpLocation');// 导入IpLocation类
                $Ip = new IpLocation(); // 实例化类
                $location = $Ip->getlocation(get_client_ip()); // 获取某个IP地址所在的位置


                $parent=I('post.parent','','strval');

                if(empty($parent)){
                    $this->ajaxReturn(array('result'=>0,'info'=>'The recommender cannot be empty!'));
                }
                $data['parent_id']=M('member')->where(array('username'=>$parent))->getField('id');
                $data['parent']=$parent;

                $data['username'] = $data['mobile'] = I('post.mobile','','strval');
                $code = I('post.code','');
                
                $data['truename'] = I('post.truename');
                $password = I('post.password','','strval');

                //Verify whether the recommender information already exists and review
                if (!M('member')->where(array('username'=>$data['parent']))->getField('id')) {
                    $this->ajaxReturn(array('result'=>0,'info'=>'The recommender does not exist'));
                }
                if(empty($data['username'])){
                    $this->ajaxReturn(array('result'=>0,'info'=>'Please fill in the phone number!'));
                }
                //手机号码验证
                // preg_match("/^1[34578]{1}\d{9}$/",$data['username']
                if(!preg_match("/^\d{10}$/",$data['username'])){
                    $this->ajaxReturn(array('result'=>0,'info'=>'Mobile phone number format is incorrect!'));
                }
                if (M('member')->where(array('mobile'=>trim($data['mobile'])))->getField('id')) {
                    $this->ajaxReturn(array('result'=>0,'info'=>'The phone number already exists, please change it!'));
                }
                if (M('member')->where(array('username'=>trim($data['username'])))->getField('id')) {
                    $this->ajaxReturn(array('result'=>0,'info'=>'This user already exists, please replace it!'));
                }

                //短信验证码
                // if(!$code){
                //     $this->ajaxReturn(array('result'=>0,'info'=>'Please enter the SMS verification code!'));
                //  }
                //  $check_code = sms_code_verify($data['username'],$code,session_id());
                //  if($check_code['status'] != 1){
                //      $this->ajaxReturn(array('result'=>0,'info'=>$check_code['msg']));
                //  }

                 if (empty($password)) {
                     $this->ajaxReturn(array('result'=>0,'info'=>'Login password cannot be empty'));
                }
                
                //图形验证码
                if(!$code){
                    $this->ajaxReturn(array('result'=>0,'info'=>'Please enter the verification code!'));
                }
                if(!$this->checkVerify(md5($code))){
                     $this->ajaxReturn(array('result'=>0,'info'=>'Verification code error'));
                }
                if (empty($password)) {
                     $this->ajaxReturn(array('result'=>0,'info'=>'Login password cannot be empty'));
                }


				$hongbao = C('hongbao');
                $data['regaddress'] =$location['country'].$location['area']; // 所在国家或者地区
                $data['regip'] =get_client_ip(); // 所在国家或者地区

                $data['password']  = md5($password);
                $data['money']  = $hongbao;
                $parentinfo = M('member')->where(array('username'=>$data['parent']))->find();
                $data['parentpath']  = trim($parentinfo['parentpath'] . $parentinfo['id'] . '|');;
                $data['parentlayer'] = $parentinfo['parentlayer'] + 1;
                $data['regdate']     = time();
                M('member')->add($data);
				
                //我的上级直推加一
				
                M('member')->where(array('username' => $data['parent']))->setInc('parentcount',1);
                mmtjrennumadd($data['parent_id']);//  所有上级加一人

                $this->ajaxReturn(array('result'=>1,'info'=>'Regiest success！'));

            }
        }
		/**
		 * 生成验证码
		 */
		public function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify(4,1,'png',60,20);
		}

		public function showcode(){
			$this->display();
		}
        
        //验证码验证
        public function checkVerify($code){
            if (session('verify') != $code) {
                return false;
            }else{
                return true;
            }
        }
        
        public function checkUsername($username){
            if (!$id = M('member')->where(array('username'=>$username))->getField('id')) {
                alert('username not found！',-1);
            }else{
                return $id;
            }
        }


		
		
		
	}
?>