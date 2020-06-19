<?php

namespace App\DAO;

use App\DAO\Connection;
use App\Models\Nps;

class NpsDAO extends Connection {

    public function showNotas($data, $order = 'created_at desc') {

        $query = "select * from nps where DATE_FORMAT(created_at, '%Y/%m/%d') = '$data' order BY $order";

        return $this->select($query);

    }

    public function getNpsDia($data) {

        $query = "select nota, DATE_FORMAT(created_at, '%d/%m') as dia, count(*) as total from nps where DATE_FORMAT(created_at, '%Y/%m/%d') = '$data' group by nota";

        return $this->select($query); 

    }

    public function getNpsMes($data) {

        $query = "select nota, DATE_FORMAT(created_at, '%m/%Y') as mes, count(*) as total from nps where DATE_FORMAT(created_at, '%Y/%m') = '$data' group by nota";

        return $this->select($query); 

    }

    
    public function getNpsAno($data) {

        $query = "select nota, DATE_FORMAT(created_at, '%Y') as ano,count(*) as total from nps where DATE_FORMAT(created_at, '%Y') = '$data' group by nota";

        return $this->select($query); 

    }

    public function getGraficoMes($data) {

        $query = "SELECT created_at FROM `nps` where DATE_FORMAT(created_at, '%Y/%m') = '$data' group by DAY(created_at)";

        $result = $this->select($query);

        foreach($result as $resultDia) {
            $date = new \DateTime($resultDia->created_at);
            $dataFormatada = $date->format('Y/m/d');

            $notas_dia_mes[] = $this->getNpsDia($dataFormatada);            
        }

        return $notas_dia_mes;

    }

    public function getGraficoAno($data) {

        $query = "SELECT created_at FROM `nps` where DATE_FORMAT(created_at, '%Y') = '$data' group by MONTH(created_at)";

        $result = $this->select($query);

        foreach($result as $resultMes) {
            $date = new \DateTime($resultMes->created_at);
            $dataFormatada = $date->format('Y/m');

            $notas_mes_ano[] = $this->getNpsMes($dataFormatada);
        }
        
        return $notas_mes_ano;
    }

    public function getGraficoGeral() {

        $query = "SELECT created_at FROM `nps` group by YEAR(created_at)";

        $result = $this->select($query);

        foreach($result as $resultGeral) {
            $date = new \DateTime($resultGeral->created_at);
            $dataFormatada = $date->format('Y');

            $notas_geral[] = $this->getNpsAno($dataFormatada);
        }
        
        return $notas_geral;
    }

	public function insert(Nps $nps) {
                
        $query = "insert into nps(nota, usuario, created_at)values(:nota, :usuario, :created_at)";

        $this->query($query, array(
            ':nota' => $nps->__get('nota'),
            ':usuario' => $nps->__get('usuario'),
            ':created_at' => $nps->__get('created_at')
        ));

    }
    
    public function delete(Nps $nps) {
        
        $query = 'delete from nps where id = :id';

        $this->query($query, array(
            ':id' => $nps->__get('id')
        ));
    }

}


?>