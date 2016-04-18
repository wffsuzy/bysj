<?php
namespace Home\Controller;
use Home\Model\UserModel;

class UserController extends ManagerController{
    private $user;
    public function __construct() {
        parent::__construct();
        $this->user=new UserModel();
    }
    
    
    public function index() {
        $username=I('request.username');
        $status=I('request.status');
        $start_time=I('get.start_time');
        $end_time=I('get.end_times');
        $query=array();
        if($username){
            $this->assign('username',$username);
            $query['username']=$username;
        }
        
        if($status){
            $this->assign('status',$status);
            $query['status']=$status;
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
        $this->assign('list',$this->user->get_user_info($query));
        $this->display();
    }
    

    public function del(){
        if(IS_GET){
            $this->error('非法操作');
        }

        $id=I('request.id');
        if(!$this->user->find($id)){
            $this->error('用户不存在');
        }
        if(!$this->user->delete($id)){
            $this->error('删除失败');
        }
        $this->success('删除成功');
    }


    public function edit(){
        $id=I('request.id');
        if(!$info=$this->user->get_info_by_id($id)){
            $this->error('该用户信息不存在');
        }
        $this->assign('info',$info);
        $this->display();
    }

    public function change_money(){
        
    }

    public function write_data(){
        if(IS_POST){
            $data=I('post.');
            if(isset($data['password'])&&$data['password']){
                $data['password']=md5($data['password']);
            }
            if(isset($data['pay_password'])&&$data['pay_password']){
                $data['pay_password']=md5($data['pay_password']);
            }
            if($this->user->save($data)===false){
                $this->error('修改失败');
            }
            $this->success('修改成功',U('index'));
        }
    }



}