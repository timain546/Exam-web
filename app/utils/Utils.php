<?php

namespace app\utils;

class Utils {

    public static function reinitAll(\PDO $pdo) {
      $pdo->exec("DELETE FROM bngrc_besoins");
      $pdo->exec("DELETE FROM bngrc_dons");
      $pdo->exec("DELETE FROM bngrc_achat");

      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (1, '2026-02-15', 1, 4, 200,200)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (2, '2026-02-15', 4, 3, 40,40)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (3, '2026-02-15',2, 5, 6000000,6000000)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (4, '2026-02-15', 1, 2, 1500,1500)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (5, '2026-02-15', 4, 1, 300,300)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (6, '2026-02-15', 2, 3, 80,80)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (7, '2026-02-15', 4, 5, 4000000,4000000)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (8, '2026-02-16', 3, 4, 150,150)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (9, '2026-02-15', 2, 1, 500,500)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (10, '2026-02-16', 3, 5, 8000000,8000000)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (11, '2026-02-16', 5, 1, 700,700)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (12, '2026-02-16', 1, 5, 12000000,12000000)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (13, '2026-02-16', 5, 5, 1000000,1000000)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (14, '2026-02-15', 3, 2, 1000,1000)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (15, '2026-02-16', 5, 4, 180,180)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (16, '2026-02-16', 1, 10, 3,3)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (17, '2026-02-16', 1, 1, 800,800)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (18, '2026-02-16', 4, 9, 200,200)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (19, '2026-02-16', 2, 7, 60,60)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (20, '2026-02-15', 5, 2, 1200,1200)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (21, '2026-02-16', 3, 1, 600,600)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (22, '2026-02-15', 5, 8, 150,150)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (23, '2026-02-16', 1, 3, 120,120)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (24, '2026-02-16', 4, 7, 30,30)");
      $pdo->exec("insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (25, '2026-02-16', 2, 6, 120,120)");
      $pdo->exec("insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (26, '2026-02-15', 3, 8, 100,100)");

      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (1, '2026-02-16', 5, 5000000, 5000000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (2, '2026-02-16', 5, 3000000, 3000000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (3, '2026-02-17', 5, 4000000, 4000000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (4, '2026-02-17', 5, 1500000, 1500000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (5, '2026-02-17', 5, 6000000, 6000000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (6, '2026-02-16', 1, 400, 400)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (7, '2026-02-16', 2, 600, 600)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (8, '2026-02-17', 3, 50, 50)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (9, '2026-02-17', 4, 70, 70)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (10, '2026-02-17', 9, 100, 100)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (11, '2026-02-18', 1, 2000, 2000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (12, '2026-02-18', 3, 300, 300)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (13, '2026-02-18', 2, 5000, 5000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (14, '2026-02-19', 5, 20000000, 20000000)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (15, '2026-02-19', 4, 500, 500)");
      $pdo->exec("insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (16, '2026-02-17', 9, 88, 88)");
    }
}
