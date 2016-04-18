<?php
namespace Home\Model;
use Think\Model;
class UserModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function get_infos($id,$fields) {
        return $this->where(array('id'=>$id))->field($fields)->find();
    }
    
    
    public function get_info($id,$field){
        return $this->where(array('id'=>$id))->getField($field);
    }
    
    /**
     * 今日注册用户
     */
    public function today_new_user(){
        $t_time=time();
        $day_time=date('Y-m-d',$t_time);
        $time=strtotime($day_time);
        $query['create_time']=array(array('gt'=>$time),array('lt'=>$t_time));
        return $this->where($query)->count();
    }
    
    /**
     * 总注册用户
     */
    
    public function all_user_count(){
        return $this->count();
    }
    
    public function get_user_info($where){
        return $this->where($where)->select();
    }


    public function get_info_by_id($id){
        return $this->where(array('id'=>$id))->find();
    }
    
   
}