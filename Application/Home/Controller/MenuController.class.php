<?php
namespace Home\Controller;

use Home\Model\MenuModel;
use Think\Model;
class MenuController extends ManagerController{
    private $menu;
    private $admin_group;
    public function __construct(){
        parent::__construct();
        $this->menu=new MenuModel();
        $this->admin_group=M('admin_group');
    }
    
    
    public function index(){
        $menu_list=$this->menu->select();
        $parent_menu=$this->menu->get_parent_menu_name();
       
        foreach ($menu_list as $k => $v){
            if($v['pid']!=0){
                $menu_list[$k]['parent_menu_name']=$parent_menu[$v['pid']]['title'];
            }else{
                $menu_list[$k]['parent_menu_name']='顶级模块';
            }
        }
        
        
        $this->assign('menu_list',$menu_list);
        $this->display();
    }
    
    public function edit(){
        
        $this->assign('title',' 编辑模块');
        $this->assign('menu_list',$this->menu->get_parent_menu());
        $this->assign('a');
        $this->display();
    }
    
    public function add(){
        $this->assign('title','新增模块');
        $this->assign('menu_list',$this->menu->get_parent_menu());
        $this->assign('admin_group_list');
        $this->display();
    }
    
    
    public function write_data(){
        $data=I('request.');
        if($data['id']){
                if($this->menu->save($data)===false){
                    $this->error('编辑失败');
                }
            $this->success('编辑成功',U('index'));
        }else{
            $data['creat_time']=time();
            if(!$this->menu->add($data)){
                $this->error('新增失败');
            }

            $this->success('新增成功',U('index'));
        }
    }
    
    
    public function del(){
        if(IS_POST){
            
        }
    }
    
    
}