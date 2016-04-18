<?php
namespace Home\Controller;

use Home\Model\AccountModel;
use Home\Model\CashModel;
use Home\Model\PayModel;
use Home\Model\UserModel;

class AccountController extends ManagerController{
    private $account;
    private $pay;
    private $cash;
    private $user;
    public function __construct() {
        parent::__construct();
        $this->pay=new PayModel();
        $this->cash=new CashModel();
        $this->user=new UserModel();
        $this->account=new AccountModel();
        $this->assign('pay_type',C('PAY_TYPE'));
        $this->assign('pay_status',C('PAY_STATUS'));
    }
    
    public function index() {
        $username=I('get.username');
        $true_name=I('get.truename');
        $start_time=I('get.start_time');
        $end_time=I('get.end_times');
        if($username){
            $query['username']=$username;
            $this->assign('username',$username);
        }
        if($true_name){
            $query['true_name']=$true_name;
            $this->assign('truename',$true_name);
        }
        if($start_time&&$end_time){
            $query['create_time']=array('between',array(strtotime($start_time),strtotime($end_time)));
            $this->assign('start_time',$start_time);
            $this->assign('end_time',$end_time);
        }

        if($start_time&&!$end_time){
            $query['create_time']=array('egt',$start_time);
            $this->assign('start_time',$start_time);
        }
        if(!$start_time&&$end_time){
            $query['create_time']=array('elt',$end_time);
            $this->assign('end_time',$end_time);
        }
        $list=$this->user->where($query)->select();
        $this->assign('list',$list);
        $this->display();
    }

    public function check_withraw(){
        if(IS_GET){
            $this->error('非法访问');
        }

        $data=I('post.');
        
    }

    public function pay_index(){
        $user_name=I('get.username');
        $order_number=I('get.order_number');
        $start_time=I('get.start_time');
        $end_time=I('get.end_times');
        $status=I('get.status');
        $type=I('get.type');
        if($user_name){
            $query['u.username']=$user_name;
            $this->assign('username',$user_name);
        }

        if($order_number){
            $query['order_number']=$order_number;
            $this->assign('order_number',$order_number);
        }

        if($start_time&&$end_time){
            $query['p.create_time']=array('between',array(strtotime($start_time),strtotime($end_time)));
            $this->assign('start_time',$start_time);
            $this->assign('end_time',$end_time);
        }

        if($start_time&&!$end_time){
            $query['p.create_time']=array('egt',$start_time);
            $this->assign('start_time',$start_time);
        }
        if(!$start_time&&$end_time){
            $query['p.create_time']=array('elt',$end_time);
            $this->assign('end_time',$end_time);
        }

        if($status){
            $query['p.status']=$status;
            $this->assign('status',$status);
        }

        if($type){
            $query['p.type']=$type;
            $this->assign('type',$type);
        }

        $list=$this->pay->get_pay_info($query);
        $this->assign('list',$list);
        $this->display();

    }


    public function cash_index(){
        $username=I('get.username');
        $start_time=I('get.start_time');
        $end_time=I('get.end_times');
        $status=I('get.status');

        if($username){
            $query['u.username']=$username;
            $this->assign('username',$username);
        }
        if($start_time&&$end_time){
            $query['c.create_time']=array('between',array(strtotime($start_time),strtotime($end_time)));
            $this->assign('start_time',$start_time);
            $this->assign('end_time',$end_time);
        }

        if($start_time&&!$end_time){
            $query['c.create_time']=array('egt',$start_time);
            $this->assign('start_time',$start_time);
        }
        if(!$start_time&&$end_time){
            $query['c.create_time']=array('elt',$end_time);
            $this->assign('end_time',$end_time);
        }

        if($status){
            $query['c.status']=$status;
            $this->assign('status',$status);
        }

        $list=$this->cash->get_cash_info($query);
        $this->assign('list',$list);
        $this->display();
    }

    
    
}