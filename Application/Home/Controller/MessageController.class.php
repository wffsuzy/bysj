<?php
namespace Home\Controller;
class MessageController extends ManagerController{
    private $message;
    public function __construct() {
        parent::__construct();
        $this->message=M('message');
    }
    
    public function index(){
        $this->assign('all_msg',$this->message->select());
        $this->display();
    }
    public function add_message(){
        
        $this->title='发布消息';
        $this->display();
    }
    
    public function edit_message(){
        $this->assign('msg_info',$this->message->find('get.id'));
        $this->display();
    }
    public function edit_add_message() {
        if(IS_GET){
            $this->error('非法访问');
        }
        $msg_id=I('request.msg_id');
        $data['title']=I('request.title');
        $data['content']=I('request.content');
        $data['author']=$this->admin_info['username'];
        if($msg_id){
            $data['id']=$msg_id;
            $data['update_time']=time();
            if($this->message->save($data)===false){
                $this->error('修改失败');
            }
            $this->success('修改成功');
        }
        $data['create_time']=time();
        
        if(!$this->message->add($data)){
            $this->error('发布失败');
        }
        $this->success('发布成功');
        
            
    }
    
    public function delete_message() {
        if (IS_POST){
            if(!$this->message->delete(I('post.id'))){
                $this->error('删除失败');
            }
        }
    }
}