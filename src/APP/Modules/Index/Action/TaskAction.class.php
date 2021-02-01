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
                    $data['jinbi'] = $jinbi;
                    $data['addtime'] = time();
                    $result=M('complete')->add($data);

                    if(!empty($result)){

                        alert('Submission is successful, please wait for system review!',U('Index/task/index'));
                    }else{

                        alert('Submission failed, please resubmit!',U('Index/task/complete'));
                    }
                }



		}

		//完成记录
		public function completelog(){
			$list =M('complete')->where(array('username'=>session('username'),'status'=>1))->select();
			$this->assign('list',$list);
			$this->display();
		}

        //订单提交
        public function duihuan(){

            $id =  C('faquan');
            $product = M("product");

            //查询太阳能光伏信息
            $data = $product -> find($id);
            if(empty($data)){
                alert('Solar photovoltaic does not exist', U('Robot/index'));
            }

            $letter = M('type')->where(array('id'=>$data['tid']))->getField('name');
            // Determine whether the purchase limit has been reached
            $my_gounum=M("order")->where(array("user"=>session('username'),"sid"=>$id))->count();
            if($my_gounum >=$data['xiangou']){
                echo'<script>alert("The online gold coin exchange for solar photovoltaic has been reached!");window.history.back(-1);</script>';
                die;
            }
            if($data['stock'] <1){
                echo'<script>alert("Solar photovoltaic has been redeemed, please come back another day!");window.history.back(-1);</script>';
                die;
            }
            $faquan = C('faquan');

            $username = session('username');
            if($id == $faquan) {
                $jifen = M('member')->where(array('username' => $username))->getField('jifen');
                if ($jifen <$data['price']) {
                    alert('Insufficient gold coins, go to the circle to earn gold coins!', U('task/index'));
                }

                M("member")->where(array('username' => session('username')))->setDec('jifen', $data['price']);
                $map = array();
                $map['kjbh'] = $letter . date('d') . substr(time(), -5) . sprintf('%02d', rand(0, 99));
                $map['user'] = $username;
                $map['user_id'] = session('mid');
                $map['project'] = $data['title'];
                $map['sid'] = $data['id'];
                $map['yxzq'] = $data['yxzq'];
                $map['shouyi'] = $data['shouyi'];
                $map['sumprice'] = $data['price'];
                $map['addtime'] = date('Y-m-d H:i:s');
                $map['imagepath'] = $data['thumb'];
                $map['zt'] = 1;
                $map['UG_getTime'] = time();
                if (M('order')->add($map)) {
                    M('member')->where(array('username' => $username))->setInc('robotcount');
                }
            }
            $product->where(array("id" => $id))->setDec("stock");
alert('Solar photovoltaic exchange succeeded', U('Robot/robot'));
        }

		//upload image
//ajax picture upload

public function uploads(){



if(isset($_POST) and $_SERVER['REQUEST_METHOD'] == "POST"){


$name = $_FILES['photoimg']['name'];
$size = $_FILES['photoimg']['size'];

$file_time=date('Ymd',time());
$file_name ='./Public/Uploads';
if(!file_exists($file_name)){
mkdir($file_name);
}
$path = $file_name.'/';

$extArr = array("jpg", "png", "gif", "jpeg");
if(empty($name)){
echo json_encode(array('result' => 0,'msg'=>'Please select the picture to upload'));
return;

}
$ext = $this->extend($name);
if(!in_array($ext,$extArr)){
echo json_encode(array('result' => 0,'msg'=>'picture format error'));
return;

}
if($size>(300*1024*1024)){
echo json_encode(array('result' => 0,'msg'=>'The picture size cannot exceed 3M'));
return;

}
$image_name = time().rand(100,999).".".$ext;
$tmp = $_FILES['photoimg']['tmp_name'];

$uploadip = substr($path,9);
if(move_uploaded_file($tmp, $path.$image_name)){
echo json_encode(array('result' => 1,'url'=>$uploadip.$image_name));
return;
}else{
echo json_encode(array('result' => 0,'msg'=>'Upload error'));
					return;
				}
				exit;
			}
			exit;

		}

		public function extend($file_name){
			$extend = pathinfo($file_name);
			$extend = strtolower($extend["extension"]);
			return $extend;
		}
	}
?>