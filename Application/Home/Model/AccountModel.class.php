<?php
namespace Home\Model;

use Think\Model;
class AccountModel extends Model{
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * 今日充值/提现
     */
    public function today_account_change($tag) {
        $e_time=time();
        $day_time=date('Y-m-d',$e_time);
        $s_time=strtotime($day_time);
        
        $query['create_time']=array(array('lt'=>$s_time),array('gt'=>$e_time));
        $query['tag']=$tag;
        return $this->where($query)->sum();
    }


    public function withdraw_count(){
        $where['status']=1;
        $where['type']=2;
        return $this->where($where)->count();
    }



    
    
}