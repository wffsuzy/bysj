<?php
/**
 * Created by PhpStorm.
 * User: suzy
 * Date: 2016/4/9
 * Time: 15:43
 */
namespace Home\Model;
class PayModel extends \Think\Model{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_pay_info($query){
        $join=C('PRE_FIX').'user as u on u.id = p.user_id';
        return $this->alia('p')->join($join)->where($query)->select();
    }
}