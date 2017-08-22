<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Server\Operation;

class OperationController extends Controller
{
    //冻结操作
    public function freeze(Request $request){
        $account_id=$request->input('account_id');
        $change_amount=$request->input('change_amount');
        $operation_id=$request->input('operation_id');
        $billing_type=$request->input('billing_type');
        $Operation=new Operation();
        $message=$Operation->freeze($account_id,$change_amount,$operation_id,$billing_type);
        return $message;
    }
}