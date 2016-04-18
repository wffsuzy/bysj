<?php
namespace Home\Controller;
class OrderController extends ManagerController{
    private $order;
    public function __construct() {
   
        parent::__construct();
        $this->order=D('order');
    }
    
    public function index() {
        $user_id=I('request.uid');
        $status=I('request.status',-1);
        $order_type=I('request.order_type');
        $time=strtotime(I('request.time'));
        $query=array();
        if($user_id){
            $query['user_id']=$user_id;
            $this->assign('user_id',$user_id);
        }
        if($status!=-1){
            $query['status']=$status;
            $this->assign('status',$status);
         }
         
         if($order_type){
             $query['order_type']=$order_type;
             $this->assign('order_type',$order_type);
         }
         
         if($time){
             $query['time']=$time;
             $this-assign('time',$time);
         }
         $result=$this->order->where($query)->select();
         $this->assign('result',$result);
         $this->display();
    }

    public function check(){
        
    }

    
    
    
    
    
}