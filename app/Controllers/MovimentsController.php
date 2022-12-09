<?php

namespace App\Controllers;

class MovimentsController extends BaseController
{
    public function index()
    {
        $model = model("MovimentsModel");
        $dateStart = null;
        $dateEnd = null;
        $listMoviments=$model->list($dateStart, $dateEnd);
		$data['moviments']=$listMoviments;
        $itens = $model->cash_balance();
		$data['cash_balance']=$itens;
        //var_dump($data);
        return view('moviments/index', $data);
    }

    public function filtrar()
    {
        if(isset($_POST['filtrar'])){
            $year = $this->request->getPost('year');
            $mes = $this->request->getPost('mes');
            $m = model('MovimentsModel');
            $dateStart = "".(int)$year."-".(int)$mes."-01";
            $dateEnd = "".(int)$year."-".(int)$mes."-31";
            //var_dump((int)$year);
            //var_dump($dateEnd);
            $listMoviments=$m->list($dateStart, $dateEnd);
            //var_dump($listMoviments);
            $data['moviments']=$listMoviments;
            $itens = $m->cash_balance();
            $data['cash_balance']=$itens;
            //var_dump($data);
            return view('moviments/index', $data);
        }
    }

    public function form() 
    {
        return view("moviments/form");
    }

    public function add() 
    {
        if(isset($_POST['save_moviment'])){
            $params['date'] = $this->request->getPost('date');
            $params['description'] = $this->request->getPost('description');
            $params['value'] = $this->request->getPost('value');
            $params['type'] = $this->request->getPost('type');
            // $params = [
            //     $name = $this->request->getPost('name'),
            //     $email = $this->request->getPost('email'),
            //     $password = $this->request->getPost('password'),
            //     $type = $this->request->getPost('type')
            // ];
            //var_dump($params);
            $model = model("MovimentsModel");
            $resp = $model->add($params);
            if($resp) {
                header("url =".base_url()."/moviments");
            } else {
                header("url =".base_url()."/moviments/form");
            }
        }
    }
}
