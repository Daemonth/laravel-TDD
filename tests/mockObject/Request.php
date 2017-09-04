<?php
namespace  Test\mockObject;

class Request {
    public $account_id;
    public $change_amount;

    //模拟冻结请求的发送
    public function sendRequest(){
        $response = $this->call('POST', '/Freeze', ['account_id' => '1','change_amount'=>'200']);
    }
}