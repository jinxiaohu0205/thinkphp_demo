<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller{
	
//原生、	
//  public function index()
//  {
////      $this->show('<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>','utf-8');
////	echo "hello wrold";
//
//	$this->display();
//  }
//  public function hello(){
//  	echo "hello think";
//  }



//前置操作方法
//  public function _before_index(){
//      echo 'before<br/>';
//  }
//  public function index(){
//      echo 'index<br/>';
//  }
//  //后置操作方法
//  public function _after_index(){
//      echo 'after<br/>';
//  }


//demo1
//	public function index(){
//		$student = M('student'); //实例化User对象
//		$data=$student->select();
//		$this->assign("data",$data);
////		$this->display();
//		$this->redirect('index/read', array('cate_id' => 2), 5, '页面跳转中...');
//	}
//	public function read($id=0,$cid=0){ //参数这里写了就必须传 没传的话$id=0；
//      echo 'id='.$id;
//      echo 'cid='.$cid;
////      $this->display(); //找到的就是View/index下面的read.html;
//      $this->display("index/read"); //找到的就是View/index下面的read.html;
//  }
//  public function archive($year='2013',$month='01'){
//      echo 'year='.$year.'&month='.$month;
////		echo 'year='.$year;
//  }
//  {

//	public function index(){
//		
//		$this->display();
////		echo I('get.id');
//
//	}
	
//	接受参数 增删改查
	public function read(){
		$student=M('student');
		$name=I('name');echo $name; die;
		$student->create();
		$student->add();
		$this->success('保存完成');
		echo I('id/a');   //等效于echo I('param.id');
	}
	
	public function select(){
		$student = M('student'); //实例化User 对象
		$data=$student->where('id=132')->find();
		$data1=$student->order('id desc')->limit(5)->select();
		$data2=$student->where("num=2")->limit(2)->select();
//		echo  json_encode($data1);
//		var_dump($data1);
//		$this->assign('data',$data2);
//		$this->display();
		foreach($data1 as $key=> $value){
			$nameArr[]= ($value['id']);
//			echo $key;
			var_dump($data1[$key]);
			var_dump($value) ;
		}
		var_dump($nameArr);
	}
	public function delete(){
		$id='117';
		$student = M('student');
		$student->where("id=$id")->delete();
//		$this->success('jj');
	}
	
	public function edit(){
		$name="新";
		$id='114';
		$student = M('student');
		$data['name'] = $name;
		$student->where("id=$id")->save($data);
	}
    
    
    public function alldel(){
    	$id='115,116';
    	$student = M('student');
    	$map['id'] = array("in",'115,116');
    	$res=$student->where($map)->delete();
    	echo M('')->getLastSql();
    	echo "<br>";
    	print_r($map);
    }
    public function index(){
    	
    	$this->display();
    }
    public function img(){
    	$Verify = new \Think\Verify();
		$img=$Verify->entry(2);
    }
    public function image(){
    $image = new \Think\Image(); 
	$i=$image->open('./1.jpg');
	
	//	print_r($i);
	//	var_dump($i);
	//	echo "<pre>";
	//		print_r($i);
	//	echo "</pre>";	
		//将图片裁剪为400x400并保存为corp.jpg
	//	$image->crop(400, 400,100,30)->save('./crop.jpg');
    }
    
    //无限极分类
    public function tree(){  
        //实例化model  
        $User=D('Category');  
        $arr = $User->sel_all();  
//      var_dump($arr);
        $this->assign('arr',$arr);  
//      echo json_encode($arr);
        $this->display();  
    }  
    
    //分页
    public function page(){
		$User = M('student'); // 实例化User对象
		$count      = $User->count();// 查询满足要求的总记录数
		$Page       = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数(25);
		$Page->rollPage=3;
		$show       = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->order('id')->limit($Page->firstRow.','.$Page->listRows)->select();
		$this->assign('list',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	
	//原生的单图和多图上传
	public function Upload(){
		$this->display();
	}
	
	public function pload(){
	    $upload = new \Think\Upload();// 实例化上传类
	    $upload->maxSize   =     3145728 ;// 设置附件上传大小
	    $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg','txt','js');// 设置附件上传类型
	    $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
	    $upload->savePath  =     ''; // 设置附件上传（子）目录
	    // 上传文件这个是一起进来的 
   		 $info   =   $upload->upload();  		 
	    // 上传单个文件 
//  	$info   =   $upload->uploadOne($_FILES['photo']);
	    if(!$info) {// 上传错误提示错误信息
	        $this->error($upload->getError());
	    }else{// 上传成功
//	    	 $this->success('上传成功！');
	    	//多文件
//			foreach($info as $file){
//		        echo $file['savepath'].$file['savename'];
//		        $model = M('student');
//				// 取得成功上传的文件信息
//				// 保存当前数据对象
//				$data['age'] =$file['savepath'].$file['savename'];
//				$model->add($data);
//		    }
//		    die;
		    //单个文件
//			$model = M('student');
			// 取得成功上传的文件信息
			// 保存当前数据对象
//			$data['age'] =$info['savepath'].$info['savename'];
//			$model->add($data);
	    }
	}
	
	
	//webloder多图上传
	public function dtsc(){
		$this->display();
	}
	//是一条一条的进去的
	 public function webUpload(){
	 	// 指定允许其他域名访问
        header('Access-Control-Allow-Origin:*');
        // 响应类型
        header('Access-Control-Allow-Methods:POST');
        // 响应头设置
        header('Access-Control-Allow-Headers:x-requested-with,content-type');
//      $house_id = I('houseId');
	    $config = array(
	        'mimes'         =>  array(), //允许上传的文件MiMe类型
	        'maxSize'       =>  0, //上传的文件大小限制 (0-不做限制)
	        'exts'          =>  array('jpg', 'gif', 'png', 'jpeg'), //允许上传的文件后缀
	        'autoSub'       =>  true, //自动子目录保存文件
	        'subName'       =>  array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
	        'rootPath'      =>  'Upload/', //保存根路径
	        'savePath'      =>  'Goods/',//保存路径
	    );
	    $upload = new \Think\Upload($config);// 实例化上传类
	    $info   =   $upload->upload();
	    if(!$info) {
	        $this->error($upload->getError());// 上传错误提示错误信息
	    }else{// 上传成功
	        foreach ($info as $va){
                $suoluetu.=$va['savepath'].$va['savename'];
//              echo $suoluetu;
                $this->ajaxReturn($suoluetu);
	        }
	    }
	}
	
	public function save(){
		$file=I('imgfirst');
		$model=explode(",",$file);
//		var_dump($model);
		foreach ($model as $va){
			echo $va;
			$mode=M('student');
			$data['age']=$va;
			$data['num']=2;
			$mode->add($data);
		}
	}
	
	public function ms(){
		$starttimestr="11";
		$endtimestr="22";
		exit("活动还没开始,活动时间是：{$starttimestr}至{$endtimestr}");  
	}
	
	
	
	public function qrcode($url="www.baidu.com",$level=3,$size=4)
    {
              Vendor('phpqrcode.phpqrcode');
              $errorCorrectionLevel =intval($level) ;//容错级别 
              $matrixPointSize = intval($size);//生成图片大小 
             //生成二维码图片 q
              $object = new \QRcode();
              $object->png($url, false, $errorCorrectionLevel, $matrixPointSize, 2);   
    }
    
//  public function ceshi(){
//  	
//  }
	
}
    