<?php

namespace App\Controllers;

base_url().'/vendor/autoload.php';

class Relatorio extends BaseController
{
    function index() {
        $model = model('MovimentsModel');
        $dateStart = null;
        $dateEnd = null;
        $listMoviments=$model->list($dateStart, $dateEnd);
        $data['moviments'] = $listMoviments;
        //PDF
        $html = view('moviments/pdf', $data);
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML($html);
        $this->response->setHeader('Content-Type', 'application/pdf');
        $mpdf->Output('relatorio-movimentos.pdf', 'I');
    }
}