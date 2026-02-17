<?php

namespace app\utils;

class Utils {

    public static function reinitAll(\PDO $pdo) {
      $pdo->exec("DELETE FROM bngrc_besoins");
      $pdo->exec("DELETE FROM bngrc_dons");
      $pdo->exec("DELETE FROM bngrc_achat");
      $pdo->exec("INSERT INTO bngrc_besoins (date_besoin, id_ville, id_produit, quantite, quantite_restante) VALUES
          ('2026-02-10', 2, 1, 120, 120),
          ('2026-02-10', 2, 3, 85, 85),
          ('2026-02-11', 5, 4, 30, 30),   -- Foulpointe
          ('2026-02-12', 3, 2, 70, 70),   -- Vatomandry
          ('2026-02-13', 1, 5, 200, 200),  -- Toamasina
          ('2026-02-14', 4, 6, 150, 150);  -- Soanierana-Ivongo");

      $pdo->exec("INSERT INTO bngrc_dons (date_don, id_produit, quantite, quantite_restante) VALUES
          ('2026-02-09', 1, 60, 60),
          ('2026-02-11', 3, 120, 120),
          ('2026-02-11', 4, 15, 15),
          ('2026-02-12', 2, 40, 40),
          ('2026-02-13', 6, 180, 180)");
    }
}
