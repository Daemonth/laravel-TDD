<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;
use App\Server\Operation;

class FreezeTest extends TestCase
{
    use DatabaseTransactions;
    //设计一个存根的测试
    public  function  testFreezeAction(){
        $response=$this->call('POST','/freeze', ['account_id' => '2','change_amount'=>'100.00'
            , 'operation_id'=>'1','billing_type'=>'2']);
        $this->assertEquals(200, $response->status());
    }
    /* //设计一个对象的测试 测试通过
     public  function  testWriteBilling(){
         $Operation=new Operation();
         $this->assertEquals("suceess",$Operation->WriteBilling('2','100.00'));
     }
     //设计操作账户的测试 测试通过
     public  function  testOperationAccount(){
         $Operation=new Operation();
         $this->assertEquals("suceess",$Operation->OperationAccount('1','100.00'));
     }*/
    //设计一个功能整体测试
    public  function  testFreeze(){
        $Operation=new Operation();
        $this->assertEquals("2",$Operation->freeze('2','100.00','1','2'));
    }
    //设计一个冻结的金额超过可用余额测试
    public  function  testSecondFreeze(){
        $Operation=new Operation();
        $this->assertEquals("4",$Operation->freeze('2','700.00','1','2'));
    }

}
