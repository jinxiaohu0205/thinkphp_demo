<?php  
namespace Home\Model;  
use Think\Model;  
class CategoryModel extends Model{  
    //查询address表中所有数据  
    public function sel_all(){  
        $arr = $this->Table('category')->select();  
//		$arr = M("category")->select();
//      var_dump($arr);die;
        return $this->list_level($arr,$pid=0,$level=0);  
    }  
    //递归遍历数据  
    public function list_level($arr,$pid=0,$level=0){  
        //定义一个静态数组  
        static $data = array();  
        foreach($arr as $k => $v){
            if($v['pid'] == $pid){  
                $v['level'] = $level;  
                $data[] = $v;  
                $this->list_level($arr,$v['cid'],$level+1);  
            }  
        }
        return $data;  
    }  
}  