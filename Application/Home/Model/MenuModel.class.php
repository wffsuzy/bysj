<?php
namespace Home\Model;
use Think\Model;
class MenuModel extends Model{
    public function __construct(){
        parent::__construct();
    }
    
    public function get_parent_menu() {
        $where['pid']=0;
        return $this->where($where)->field('id,title')->select();
    }
    
    
    
    
    public function get_menu_id($where) {
        return $this->where($where)->getField('id');
    }
    
    public function get_parent_menu_name() {
        $where['pid']=0;
        return $this->where($where)->field('title')->select();
    }
}