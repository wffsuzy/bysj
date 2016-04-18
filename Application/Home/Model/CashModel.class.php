<?php
/**
 * Created by PhpStorm.
 * User: suzy
 * Date: 2016/4/9
 * Time: 16:39
 */

namespace Home\Model;

use Think\Model;

class CashModel extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_cash_info($query){
        $join=C('PRE_FIX').'user as u on u.id = p.user_id';
        return $this->alia('c')->join($join)->where($query)->select();
    }
}