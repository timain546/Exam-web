<?php

namespace app\models;

use app\models\Besoins;

class Dons{
  private $pdo;
  private $besoin;

  public function __construct(\PDO $pdo){
    $this->pdo = $pdo;
    $this->besoin = new Besoins($pdo);
  }

  public function create(array $input) {
    $stt = $this->pdo->prepare('INSERT INTO bngrc_dons(date_don, id_produit, quantite, quantite_restante) VALUES (?, ?, ?, ?)');
    $stt->execute([$input['date_don'], $input['id_produit'], $input['quantite'], $input['quantite']]);
  }

  public function getTotalDonsParProduit(){
        $stmt = $this->pdo->prepare("SELECT * FROM bngrc_v_dons_totaux");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function calculerDispatchParDate() {
    $besoins = $this->besoin->getBesoinsTrierParDate();
    $dons = $this->getTotalDonsParProduit();
    $result = [];

    foreach($besoins as $b) {
      foreach($dons as $d) {
        if($b['id_produit'] == $d['id_produit'] && $d['quantite_restante'] > 0) {
          $result[] = [
            'id_besoin' => $b['id_besoin'],
            'quantite_restante' => $b['quantite_restante'] > $d['quantite_restante'] ? $b['quantite_restante'] - $d['quantite_restante'] : 0
          ];
          $d['quantite_restante'] = $b['quantite_restante'] > $d['quantite_restante'] ? 0 : $d['quantite_restante'] - $b['quantite_restante'];
          break;
        }
      }
    }
    return $result;
  }

  public function calculerDispatchParQuantiteMin() {
    $besoins = $this->besoin->getBesoinsTrierParQuantiteMin();
    $dons = $this->getTotalDonsParProduit();
    $result = [];

    foreach($besoins as $b) {
      foreach($dons as $d) {
        if($b['id_produit'] == $d['id_produit'] && $d['quantite_restante'] > 0) {
          $result[] = [
            'id_besoin' => $b['id_besoin'],
            'quantite_restante' => $b['quantite_restante'] > $d['quantite_restante'] ? $b['quantite_restante'] - $d['quantite_restante'] : 0
          ];
          $d['quantite_restante'] = $b['quantite_restante'] > $d['quantite_restante'] ? 0 : $d['quantite_restante'] - $b['quantite_restante'];
          break;
        }
      }
    }
    return $result;
  }

}
