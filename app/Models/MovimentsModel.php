<?php

namespace App\Models;

use CodeIgniter\Model;

class MovimentsModel extends Model
{
    protected $table      = 'moviment';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['description', 'date', 'value', 'type', 'user_id'];

    public function list($dateStart, $dateEnd){
        if($dateStart != null && $dateEnd != null) {
            $sql="SELECT * FROM moviment m WHERE m.date BETWEEN ? and ?";

            $retorno=$this->db->query($sql, [$dateStart, $dateEnd]);
            //var_dump($retorno);
            // while($item=$retorno->fetch(PDO::FETCH_ASSOC)){
            // 	$resultado[]=$item;
            // }
            $resultado = [];
            foreach ($retorno->getResult() as $row) {
                $resultado[] = $row;
            }
            return $resultado;
        } else {
            $sql="SELECT * FROM moviment";

            $retorno=$this->db->query($sql, null);
            // while($item=$retorno->fetch(PDO::FETCH_ASSOC)){
            // 	$resultado[]=$item;
            // }
            $resultado = [];
            foreach ($retorno->getResult() as $row) {
                $resultado[] = $row;
            }
            return $resultado;
        }
    }
    
    public function cash_balance(){
        $sql = "SELECT sum(value) AS input FROM moviment WHERE type='input'";
        $result=$this->db->query($sql, null);
        $input;
        $output;
        foreach ($result->getResult() as $row) {
            $input = $row->input;
        }
        //$input=$result->fetch(PDO::FETCH_ASSOC);
        $sql = "SELECT sum(value) AS output FROM moviment WHERE type='output'";
        $result=$this->db->query($sql, null);
        foreach ($result->getResult() as $row) {
            $output = $row->output;
        }
        //$output=$result->fetch(PDO::FETCH_ASSOC);
        return $input-$output;
    }

    public function dashboard($dataInicial, $dataFinal) {
		//Busca no banco de dados
        //var_dump($dataInicial['ano']);
        //var_dump($dataFinal);
        $sql='SELECT DISTINCT m.date as data, (SELECT SUM(value) FROM moviment WHERE date = m.date and 
        type = "input") AS valorInput, (SELECT SUM(value) FROM moviment WHERE date = m.date and type 
        = "output") AS valorOutput FROM moviment m WHERE m.date >= "?-?-01" and m.date <= "?-?-31";';
        $result=$this->db->query($sql, [(int)$dataInicial['ano'], (int)$dataInicial['mes'], (int)$dataFinal['ano'], (int)$dataFinal['mes']]);
        //var_dump($result);
        $array = [];
        foreach ($result->getResult() as $row) {
            $array[] = $row;
        }
        //var_dump($array);
        // while($input=$result->fetch(PDO::FETCH_ASSOC)){
		// 	$array[] = $input;
		// };
        return $array;
    }

    public function add($data){
        $sql = "INSERT INTO moviment (date, description, value, type, user_id) VALUE (?, ?, ?, ?, ?)"; 
        $result = $this->db->query($sql, [$data['date'], $data['description'], $data['value'], $data['type'], $_SESSION['idUser']]);
        return $result;
    }
}