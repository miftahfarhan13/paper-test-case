<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SebastianBergmann\Environment\Console;

class FinanceController extends Controller
{
    //
    public function index(Request $request)
    {   
        $token = $request->session()->get('token');

        $getFinanceAccount = $this->getFinanceAccount($token);
        $getFinance = $this->getFinance($token);
    
        // return $getFinance;
        
        return view('finance', ['finance_account'=> $getFinanceAccount, 'finance' => $getFinance]);
        
    }

    public function getFinance($token){
        $responseFinance = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer '.$token,
        ])->get('https://development.paper.id:3500/test-case/api/v1/finances', [
            'sort_field' => 'name',
            'sort_type' => 1,
        ]);

        $response = json_decode($responseFinance, true);

        $test = $response['data'];
        return $test;
    }

    public function getFinanceAccount($token){
        $responseFinanceAccount = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer '.$token,
        ])->get('https://development.paper.id:3500/test-case/api/v1/finance-accounts', [
            'sort_field' => 'name',
            'sort_type' => 1,
        ]);

        $response = json_decode($responseFinanceAccount, true);

        $test = $response['data'];
        return $test;
    }

    public function createFinanceAccount(Request $request)
    {   
        $token = $request->session()->get('token');

        $name = $request->get('names');
        $description = $request->get('descriptions');
        $type = $request->get('types');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer '.$token,
        ])->post('https://development.paper.id:3500/test-case/api/v1/finance-accounts', [
            'name' => $name,
            'description' => $description,
            'type' => $type,
        ]);
        
        return response()->json([true]);
        
    }

    public function createFinance(Request $request)
    {   
        $token = $request->session()->get('token');

        $title = $request->get('title');
        $debit_amount = $request->get('debit_amount');
        $credit_amount = $request->get('credit_amount');
        $description = $request->get('description');
        $finance_account_id = $request->get('finance_account_id');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer '.$token,
        ])->post('https://development.paper.id:3500/test-case/api/v1/finances', [
            'title' => $title,
            'debit_amount' => $debit_amount,
            'credit_amount' => $credit_amount,
            'description' => $description,
            'finance_account_id' => $finance_account_id,
        ]);
        
        return response()->json([true]);
        
    }

    public function deleteFinanceAccount(Request $request)
    {   
        $token = $request->session()->get('token');

        $id = $request->get('id');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer '.$token,
        ])->delete('https://development.paper.id:3500/test-case/api/v1/finance-accounts/'.$id);
        
        return response()->json([true]);
        
    }

    public function updateFinanceAccount(Request $request)
    {   
        $token = $request->session()->get('token');

        $id = $request->get('id');
        $name = $request->get('names');
        $description = $request->get('descriptions');
        $type = $request->get('types');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json; charset=utf-8',
            'Authorization' => 'Bearer '.$token,
        ])->patch('https://development.paper.id:3500/test-case/api/v1/finance-accounts/'.$id, [
            'name' => $name,
            'description' => $description,
            'type' => $type,
        ]);
        
        return response()->json([true]);
        
    }


}
