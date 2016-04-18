<?php
namespace Home\Controller;
use Home\Model\AccountModel;
use Home\Model\UserModel;

class IndexController extends ManagerController{
    private $user;
    private $account;
    public function __construct() {
        parent::__construct();
        $this->account=new AccountModel();
        $this->user=new UserModel();
    }
    
    public function index() {
        $this->assign('today_new_user',$this->user->today_new_user());
        $this->assign('all_user_count',$this->user->all_user_count());
        $this->assign('chongzhi',$this->account->today_account_change(1));
        $this->assign('chongzhi',$this->account->today_account_change(2));
        $this->display();
    }

    private function login_info(){
        
    }
    
   
}