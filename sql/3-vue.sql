CREATE VIEW bngrc_v_besoins_totaux AS (
    SELECT
        id_ville,
        id_produit,
        SUM(quantite) AS quantite,
        SUM(quantite_restante) AS quantite_restante
    FROM
        bngrc_besoins
    GROUP BY
        id_ville, id_produit
);

CREATE VIEW bngrc_v_dons_totaux AS (
    SELECT
        id_produit,
        SUM(quantite) AS quantite,
        SUM(quantite_restante) AS quantite_restante
    FROM
        bngrc_dons
    GROUP BY
        id_produit
);
