<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $logado = $this->session->get("idUser");
        if($logado != 1){
            return redirect('login', 'location');
        }else{
        $model = model("MovimentsModel");
        $dataInicial['ano'] = '2022';
        $dataInicial['mes'] = '12';
        $dataFinal['ano'] = '2022';
        $dataFinal['mes'] = '12';
        $moviments['moviments'] = $model->dashboard($dataInicial, $dataFinal);
        $moviments['cash_balance'] = $model->cash_balance();
        return view('home/home', $moviments);
        }
    }
}
