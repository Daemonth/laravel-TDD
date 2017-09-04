<?php

namespace App\Server;

use Illuminate\Support\Facades\DB;

class Operation
{
    //冻结操作
    public function freeze($rowling_id,$change_amount,$operation_id,$billing_type)
    {
        $firstMessage=$this->writeBilling($rowling_id,$change_amount,$operation_id,$billing_type);
        $message=$this->operationAccount($rowling_id,$change_amount);
        return intval($message)+intval($firstMessage);
    }

    //写流水
    private function writeBilling($rowling_id, $change_amount, $operation_id, $billing_type)
    {
        $account = DB::table('rowling_account')->where('rowling_id', $rowling_id)->first();
        $after_amount = $account->balance - $change_amount;
        $Billing = DB::table('rowling_billing')->insert([
            'rowling_id' => $rowling_id,
            'operation_id' => $operation_id,
            'billing_type' => $billing_type,
            'before_amount' => $account->balance,
            'change_amount' => $change_amount,
            'after_amount' => $after_amount,
        ]);
        if ($Billing) {
            return "1";
        }
    }

    //改账户
    private function operationAccount($rowling_id, $change_amount)
    {
        $account = DB::table('rowling_account')->where('rowling_id', $rowling_id)->first();
        $balance = $account->balance - $change_amount;
        $freeze_amount = $account->freeze_amount + $change_amount;
        $updateAccount = DB::table('rowling_account')->where('rowling_id', $rowling_id)->update(
            ['balance' => $balance,'freeze_amount' => $freeze_amount]
        );
        if ($updateAccount){
            return "1";
        }
    }
}