<?php
namespace app\models;

class Besoins {
    private $pdo;

    public function __construct(\PDO $pdo) { $this->pdo = $pdo; }

    public function create(array $input) {
        $stt = $this->pdo->prepare('INSERT INTO bngrc_besoins(date_besoin, id_ville, id_produit, quantite, quantite_restante) VALUES (?, ?, ?, ?)');
        $stt->execute([$input['date_besoin'], $input['id_ville'], $input['id_produit'], $input['quantite'], $input['quantite']]);
    }

    public function find($id_besoin) {
        $stt = $this->pdo->prepare('SELECT * FROM bngrc_besoins WHERE id_besoin = ?');
        $stt->execute([$id_besoin]);
        return $stt->fetch();
    }

    public function getAllBesoins() {
        $stmt = $this->pdo->query("SELECT b.id_besoin, b.date_besoin, b.id_ville, v.nom as nom_ville, b.id_produit, b.quantite, b.quantite_restante, p.nom as nom_produit, p.unite as unite_produit FROM bngrc_besoins b JOIN bngrc_produits p ON b.id_produit = p.id_produit JOIN bngrc_villes v ON b.id_ville = v.id_ville WHERE p.nom != 'Argent'");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getTotalBesoinsParProduit($id_ville){
        $stmt = $this->pdo->prepare("SELECT id_produit, SUM(quantite) as quantite FROM bngrc_besoins WHERE id_ville = ? GROUP BY id_produit");
        $stmt->execute([$id_ville]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBesoinsTrierParDate() {
        $stmt = $this->pdo->query('SELECT * FROM bngrc_besoins ORDER BY date_besoin ASC');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getBesoinsTrierParQuantiteMin() {
        $stmt = $this->pdo->query('SELECT * FROM bngrc_besoins ORDER BY quantite_restante ASC');
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function getMontantsTotaux() {
        $stmt = $this->app->db()->prepare("
            SELECT
              SUM(quantite*prix_unitaire) as besoin_total,
              SUM(quantite_restante*prix_unitaire) as besoin_restant
            FROM
              bngrc_v_besoins_totaux
            JOIN
              bngrc_produits
            ON
              bngrc_v_besoins_totaux.id_produit = bngrc_produits.id_produit
        ");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function reduireQuantiteRestante($id_besoin, $quantite) {
        $stt = $this->pdo->prepare('UPDATE bngrc_besoins SET quantite_restante = quantite_restante - ? WHERE id_besoin = ?');
        $stt->execute([$quantite, $id_besoin]);
    }
}
