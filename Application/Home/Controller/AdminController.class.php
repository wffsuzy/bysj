<?php
namespace Home\Controller;
use Home\Model;
class AdminController extends ManagerController{
    private  $admin;
    private  $admin_group;
    public function __construct() {
       parent::__construct();
       $this->admin= M('Admin');
       $this->admin_group=M('admin_group');
    }
    
   
    public function index(){
        
        $this->display();
    }
    
    public function change_password(){
        if(IS_POST){
            $old_psw=I('post.old_psw','','trim');
            $data['password']=I('post.password','','trim');
            $data['id']=$this->admin_info['id'];
            
            if($old_psw!=$this->admin->get_info($this->admin_info['id'],'password')){
                $this->error('密码错误');
            }
            
            if($this->admin->save($data)===false){
                $this->error('修改失败');
            }
            
            $this->success('修改成功');
        }
        $this->display();
    }
    
    
    public function add() {
        $group_list=$this->admin_group->field('id,group_name')->select();
        $this->assign('group_list',$group_list);
        $this->display();
    }
    
    public function edit() {
        $id=I('request.id');
        if($id){
            if($admin_info=$this->admin->find($id)){
                $this->assign('admin_info',$admin_info);
            }else{
                $this->error('数据不存在');
            }
        }else{
            $this->error('参数错误');
        }
        $group_list=$this->admin_group->field('id,group_name')->select();
        $this->assign('group_list',$group_list);
        $this->display();
    }
    
    
    public function write_data() {
        $data=I('request.');
        if($data['id']){
            if($this->admin->save($data)===false){
                $this->error('编辑失败');
            }
            $this->success('编辑成功',U('index'));
        }else{
            if(!$this->admin->add($data)){
                $this->error('新增失败');
            }

            $this->success('新增成功');
        }
    }
    
    
    public function del() {
        if(IS_GET){
            $this->error('非法访问');
        }
        if(IS_POST){
            if(!$this->admin->delete(I('request.id'))){
                $this->error('删除管理员失败');
            }
            $this->success('删除成功',U('index'));
        }
    }
    
}