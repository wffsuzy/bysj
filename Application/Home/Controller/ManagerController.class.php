<?php
namespace Home\Controller;
use Think\Controller;
use Think\Model;

class ManagerController extends Controller{
    public $admin_info;
    private $admin_group;
    public function __construct() {
        parent::__construct();

        $this->admin_group=M('admin_group');
        $this->check_login();

        define('IS_ROOT',$this->admin_info['is_root']);
        $this->_index = MODULE_NAME . '/'.CONTROLLER_NAME .'/'. ACTION_NAME ==  MODULE_NAME . '/Index/index' ? true : false;

        $this->assign('admin_info',$this->admin_info);
        $this->assign('index',$this->_index);
        $this->assign('menu',$this->get_menu());
    }
    
    private function check_login(){
        $this->admin_info=session('admin_info');
        if(empty($this->admin_info)){
            $this->redirect('Public/login');
        }
    }
    
    
   
    
    
    private function get_menu(){
        $p_menu=M('menu')->where(array('pid'=>0))->select();
        array_shift($p_menu);
         $result=array();
        foreach ($p_menu as $k => $v){
            if(!$this->check_rule($v['id'])){
                continue;
            }
           $result[$v['id']]['title']=$v['title'];
           $result[$v['id']]['child']=array();
           $result[$v['id']]['active']=true;
            
        }
        $all_menu=M('menu')->select();
        
       foreach ($all_menu as $v){
           if(!$this->check_rule($v['id'])){
               continue;
           }
           
           if(isset($result[$v['pid']])){
               array_push($result[$v['pid']]['child'],$v);
           }
       }
       
     return $result;
    }
    
    
    
    private function check_rule($menu_id){
        if(IS_ROOT) return true;
        $permisson=session('menu_ids');
        if(!$permisson){
            $where['id']=$this->admin_info['group_id'];
            $permisson=explode(',',$this->admin_group->where($where)->getField('permission'));
            session('menu_ids',$permisson);
        }
        
        if(!in_array($menu_id,$permisson)){
            return false;
        }
        
        return true;
    }
    private function check_permission($c=CONTROLLER_NAME,$m=MODULE_NAME){
        $url=MODULE_NAME.'/'.$c.'/'.$m;
        $where['url']=$url;
        $id=$this->menu->get_menu_id($where);
        $pms_ids=explode(',',$this->admin_group->where(array('id'=>$this->admin_info['admin_group_id']))->getField('permission'));
        if(!in_array($id,$pms_ids)){
            $this->error('没有权限，请联系管理员');
        }
    }


   
    
    
}