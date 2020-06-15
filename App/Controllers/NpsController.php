<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\DAO\NpsDAO;
use App\Models\Nps;

class NpsController extends Action {

    public function index() {
        $this->view->empty = false;

        $this->render('nps');
    }

    public function show() {
        $npsDAO = new NpsDAO();

        if(isset($_GET['target']) && $_GET['target'] == 'dia') {

            $this->view->data = $_POST['data'];

            $dataFormated = str_replace('-', '/', $this->view->data);

            $npsDia = $npsDAO->getNpsDia($dataFormated);

            if(count($npsDia) > 0) {

                $this->view->npsDia = $this->showNps($npsDia);
                $this->view->notasDia = $npsDAO->showNotas($dataFormated);
                $this->view->empty = false;

                $this->render('/nps');

            } else {

                $this->view->empty = true;
                $this->render('/nps');

            }

    
        } else if(isset($_GET['target']) && $_GET['target'] == 'mes') {

            $this->view->data = $_POST['data'];

            $dataFormated = str_replace('-', '/', $this->view->data);

            $npsMes = $npsDAO->getNpsMes($dataFormated);

            if(count($npsMes) > 0) {

                $this->view->npsMes = $this->showNps($npsMes);
                $this->view->empty = false;

                $this->render('/nps');

            } else {

                $this->view->empty = true;
                $this->render('/nps');

            }

        } else if(isset($_GET['target']) && $_GET['target'] == 'ano') {

            $data = $_POST['data'];

            $npsAno = $npsDAO->getNpsAno($data);

            if(count($npsAno) > 0) {

                $this->view->npsAno = $this->showNps($npsAno);
                $this->view->empty = false;

                $this->render('/nps');

            } else {

                $this->view->empty = true;
                $this->render('/nps');

            }

        }
    }

    public function porcentagem($args, $total) {
        $result = ($args * 100) / $total;
        return number_format($result, 2);
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

	public function store() {

        $npsDAO = new NpsDAO();
        $nps = new Nps();

        $nps->__set('nota', $_GET['nota']);
        $nps->__set('usuario', $_SESSION['usuario']);

        $npsDAO->insert($nps);

        header('Location: /agradecimento');

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