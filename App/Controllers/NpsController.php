<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\DAO\NpsDAO;
use App\Models\Nps;

class NpsController extends Action {

    public function index() {

        $this->render('nps');
    }

    public function showDia() {
        
        $npsDAO = new NpsDAO();
        
        $data = $_POST['data'];

        $dataFormated = str_replace('-', '/', $data);

        $this->view->npsDia = $this->showNps($npsDAO->getNpsDia($dataFormated));
        $this->view->notasDia = $npsDAO->showNotas($dataFormated);

        print_r(json_encode($this->view->notasDia));

        //print_r(json_encode($this->view->npsDia));

    }

    public function porcentagem($args, $total) {
        return ($args * 100) / $total;
    }

    public function showNps($args) {

        $detrators = null;
        $detrators_porc = null;
        $passives = null;
        $passives_porc = null;
        $promoters = null;
        $promoters_porc = null;
        $total = null;

        foreach($args as $notas) {

            if($notas->nota < 7) {
                $detrators += $notas->total;
            } else if($notas->nota > 8) {
                $promoters += $notas->total;
            } else {
                $passives += $notas->total;
            }

            $total += $notas->total;
        }

        $detrators_porc = $this->porcentagem($detrators, $total);
        $passives_porc = $this->porcentagem($passives, $total);
        $promoters_porc = $this->porcentagem($promoters, $total);

        $nps_total = $promoters_porc - $detrators_porc;

        return array(
            'detrators' => $detrators,
            'passives' => $passives,
            'promoters' => $promoters, 
            'detrators_porc' => $detrators_porc,
            'passives_porc' => $passives_porc,
            'promoters_porc' => $promoters_porc,
            'nps_total' => $nps_total
        );
    }

    public function showNpsMes() {
        
        $npsDAO = new NpsDAO();

        $data = $_GET['ano'] . '/' . $_GET['mes'];

        $this->view->notasMes = $npsDAO->getNpsMes($data);

        print_r(json_encode($this->showNps($this->view->notasMes)));
        //print_r(json_encode($this->view->notasMes));
    }

	public function store() {

        $npsDAO = new NpsDAO();
        $nps = new Nps();

        $nps->__set('nota', $_GET['nota']);
        $nps->__set('usuario', $_SESSION['usuario']);

        $npsDAO->insert($nps);

        header('Location: /nota');

    }
    
    public function delete() {
        
        $npsDAO = new NpsDAO();
        $nps = new Nps();

        $nps->__set('id', $_GET['id']);

        $npsDAO->delete($nps);

        header('Location: /nps');
    }

}


?>