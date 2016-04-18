<?php
namespace Home\Controller;
use Think\Controller;
class PublicController extends Controller {
    public function __construct(){
        parent::__construct();
    }
    
    
    
    
    public function login() {
       if(IS_POST){
           $username=I('post.username','','trim');
           $password=I('post.password','','trim');
           
           if($admin_info=M('admin')->where(array('username'=>$username))->find()){
               if($admin_info['password']==md5($password)){
                   if($admin_info['id']==1&&$admin_info['username']=='admin'){
                       $admin_info['is_root']=true;
                   }
                   session('admin_info',$admin_info);
                   $this->success('登录成功',U('Index/index'));
            
               }else{
                   $this->error('密码错误');
               }
           }else{
               $this->error('用户名不存在');
           }
       }
       
       $this->display();
           
    }
    
    
    public function logout() {
        session('admin_info',null);
        $this->redirect('login');
    }
}