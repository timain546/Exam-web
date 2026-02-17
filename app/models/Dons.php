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

  public function getTotalDonsPourUnProduit($id_produit) {
    $stmt = $this->pdo->prepare("SELECT quantite_restante as total FROM bngrc_v_dons_totaux WHERE id_produit = ?");
    $stmt->execute([$id_produit]);
    return ($row = $stmt->fetch()) ? (int)$row['total'] : 0;
  }

  public function getTotalDonsArgent() {
    $stmt = $this->pdo->query("SELECT SUM(d.quantite_restante) as total FROM bngrc_v_dons_totaux d JOIN bngrc_produits p ON d.id_produit = p.id_produit WHERE p.nom = 'Argent'");
    $stmt->execute();
    return ($row = $stmt->fetch()) ? (int)$row['total'] : 0;
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

  public function calculerDispatchProportionnelle() {
    $besoins_totaux = $this->besoin->getTotalBesoinsParProduitTouteVille();
    $besoins = $this->besoin->getBesoinsTrierParQuantiteMin();
    $dons = $this->getTotalDonsParProduit();

    $proportions_besoins = [];
    foreach ($besoins_totaux as $bt) {
        $proportions_besoins[$bt['id_produit']] = 0;
        foreach ($dons as $d) {
            if ($bt['id_produit'] == $d['id_produit']) {
                $proportions_besoins[$bt['id_produit']] = $d['quantite_restante'] / (double) $bt['quantite_totale'];
                if ($proportions_besoins[$bt['id_produit']] > 1) {
                    $proportions_besoins[$bt['id_produit']] = 1;
                }
            }
        }
    }

    $dons_restants = [];
    foreach ($dons as $d) {
        $dons_restants[$d['id_produit']] = $d['quantite_restante'];
    }

    $result = [];
    foreach ($besoins as $b) {
        if ($proportions_besoins[$b['id_produit']] == 0) continue;

        $don_attribue = $b['quantite_restante'] * $proportions_besoins[$b['id_produit']];
        $result[] = [
            'id_besoin' => $b['id_besoin'],
            'quantite_restante' => $b['quantite_restante'] - (int) $don_attribue,
            'decimal' => $don_attribue - (int) $don_attribue,
            'id_produit' => $b['id_produit']
        ];
        $dons_restants[$b['id_produit']] -= $don_attribue;
    }

    usort($result, function($a, $b) { return $a['decimal'] - $b['decimal']; });

    $result2 = [];
    foreach ($result as $r) {
        $r2 = [
            'id_besoin' => $r['id_besoin'],
            'quantite_restante' => $r['quantite_restante'],
        ];

        if ($r['decimal'] > 0) {
            if ($dons_restants[$r['id_produit']] > 0) {
                $dons_restants[$r['id_produit']]--;
                $r2['quantite_restante']--;
            }
        }

        $result2[] = $r2;
    }

    return $result2;
  }

    public function dispatch($mode) {
        $besoins = [];
        if($mode == 0)
            $besoins = $this->calculerDispatchParDate();
        else if($mode == 1)
            $besoins = $this->calculerDispatchParQuantiteMin();
        else if($mode == 2)
            $besoins = $this->calculerDispatchProportionnelle();

        $stt = $this->pdo->prepare('UPDATE bngrc_besoins SET quantite_restante = ? WHERE id_besoin = ?');
        foreach ($besoins as $b) {
            $stt->execute([$b['quantite_restante'], $b['id_besoin']]);
        }

        // TODO: et pour les dons?
    }
}
