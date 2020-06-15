<?php

namespace App\DAO;

use App\DAO\Connection;
use App\Models\Nps;

class NpsDAO extends Connection {

    public function showNotas($data) {

        $query = "select * from nps where DATE_FORMAT(created_at, '%Y/%m/%d') = '$data' order BY created_at desc";

        return $this->select($query);

    }

    public function getNpsDia($data) {

        $query = "select nota, count(*) as total from nps where DATE_FORMAT(created_at, '%Y/%m/%d') = '$data' group by nota";

        return $this->select($query); 

    }

    public function getNpsMes($data) {

        $query = "select nota, count(*) as total from nps where DATE_FORMAT(created_at, '%Y/%m') = '$data' group by nota";

        return $this->select($query); 

    }

    public function getNpsAno($data) {

        $query = "select nota, count(*) as total from nps where DATE_FORMAT(created_at, '%Y') = '$data' group by nota";

        return $this->select($query); 

    }

	public function insert(Nps $nps) {
                
        $query = "insert into nps(nota, usuario)values(:nota, :usuario)";

        $this->query($query, array(
            ':nota' => $nps->__get('nota'),
            ':usuario' => $nps->__get('usuario')
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