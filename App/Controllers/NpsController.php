<?php

namespace App\Controllers;

use MF\Controller\Action;
use App\DAO\NpsDAO;
use App\Models\Nps;

class NpsController extends Action {

    public function showDia() {
        $npsDAO = new NpsDAO();

        if(isset($_POST['data'])) {
            $this->view->data = $_POST['data'];
        } else {
            $this->view->data = $_GET['data'];
        }

        $dataFormated = str_replace('-', '/', $this->view->data);

        $npsDia = $npsDAO->getNpsDia($dataFormated);

        if(count($npsDia) > 0) {

            if(isset($_GET['order'])) {
                $this->view->notasDia = $npsDAO->showNotas($dataFormated, $_GET['order']);
            } else {
                $this->view->notasDia = $npsDAO->showNotas($dataFormated);
            }

            $dadosMes = $npsDAO->getGraficoMes($this->data->format('Y/m'));
            
            foreach($dadosMes as $diario) {
                $result[] = $this->showNps($diario, $diario[0]->dia);
            } 
            
            $this->view->graficoDiario = $result;

            $this->view->npsDia = $this->showNps($npsDia);  
            
            $this->view->npsColor = $this->corNps($this->view->npsDia);

            $this->render('/nps-dia');

        } else {

            $this->render('/nps-dia');

        }
    }

    public function showMes() {

        $npsDAO = new NpsDAO();

        if(isset($_POST['data'])) {
            $this->view->data = $_POST['data'];
        } else {
            $this->view->data = $_GET['data'];
        }

        $dataFormated = str_replace('-', '/', $this->view->data);

        $npsMes = $npsDAO->getNpsMes($dataFormated);

        if(count($npsMes) > 0) {

            $this->view->npsMes = $this->showNps($npsMes);

            $dadosAno = $npsDAO->getGraficoAno($this->data->format('Y'));
            
            foreach($dadosAno as $mensal) {
                $result[] = $this->showNps($mensal, $mensal[0]->mes);
            } 
            
            $this->view->graficoMensal = $result;

            $this->view->npsColor = $this->corNps($this->view->npsMes);
            
            $this->render('/nps-mes');

        } else {

            $this->render('/nps-mes');

        }        

    }

    public function showAno() {
        
        $npsDAO = new NpsDAO();

        if(isset($_POST['data'])) {
            $this->view->data = $_POST['data'];
        } else {
            $this->view->data = $_GET['data'];
        }

        $npsAno = $npsDAO->getNpsAno($this->view->data);

        if(count($npsAno) > 0) {

            $this->view->npsAno = $this->showNps($npsAno);
            
            $dadosGeral = $npsDAO->getGraficoGeral();
            
            foreach($dadosGeral as $dadosGeral) {
                $result[] = $this->showNps($dadosGeral, $dadosGeral[0]->ano);
            } 
            
            $this->view->graficoAnual = $result;
            
            $this->view->npsColor = $this->corNps($this->view->npsAno);
            
            $this->render('/nps-ano');

        } else {

            $this->render('/nps-ano');

        }
    }

    public function porcentagem($args, $total) {
        $result = ($args * 100) / $total;
        return number_format($result, 0);
    }

    public function corNps($value) {
        if($value['nps_total'] > 75)                                     
            return "#1FB257";

        else if($value['nps_total'] >= 40 && $value['nps_total'] <= 75)
            return "#0089CD";

        else if($value['nps_total'] <= 0)
            return "#F62119";

        else
            return "#E7BA28";
    }

    public function showNps($args, $dia = null) {

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
            'nps_total' => $nps_total,
            'data' => $dia
        );
    }

	public function store() {

        $npsDAO = new NpsDAO();
        $nps = new Nps();

        $nps->__set('nota', $_GET['nota']);
        $nps->__set('usuario', $_SESSION['usuario']);
        $nps->__set('created_at', $this->data->format('Y-m-d H:i:s'));

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