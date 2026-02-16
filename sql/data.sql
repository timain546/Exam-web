INSERT INTO bngrc_regions (nom) VALUES
    ('Atsinanana');

INSERT INTO bngrc_villes (nom, id_region) VALUES
    ('Toamasina', 1),
    ('Mahanoro', 1),
    ('Vatomandry', 1),
    ('Soanierana-Ivongo', 1),
    ('Foulpointe', 1);

INSERT INTO bngrc_categories (nom) VALUES
    ('Vivres'),
    ('Eau'),
    ('Santé'),
    ('Abris'),
    ('Logistique');

INSERT INTO bngrc_produits (id_categorie, nom, unite, prix_unitaire) VALUES
    (1, 'Riz (sac 50kg)', 50, 75000.00),
    (1, 'Lentilles (sac 25kg)', 25, 62000.00),
    (2, 'Eau potable (bidon 20L)', 20, 12000.00),
    (3, 'Kit de premiers secours', 1, 45000.00),
    (4, 'Tente familiale', 1, 250000.00),
    (5, 'Kit d''hygiène', 1, 28000.00);

INSERT INTO bngrc_besoins (date_besoin, id_ville, id_produit, quantite) VALUES
    ('2026-02-10', 2, 1, 120),  -- Mahanoro
    ('2026-02-10', 2, 3, 85),   -- Mahanoro
    ('2026-02-11', 5, 4, 30),   -- Foulpointe
    ('2026-02-12', 3, 2, 70),   -- Vatomandry
    ('2026-02-13', 1, 5, 200),  -- Toamasina
    ('2026-02-14', 4, 6, 150);  -- Soanierana-Ivongo

INSERT INTO bngrc_dons (date_don, id_produit, quantite) VALUES
    ('2026-02-09', 1, 60),
    ('2026-02-11', 3, 120),
    ('2026-02-11', 4, 15),
    ('2026-02-12', 2, 40),
    ('2026-02-13', 6, 180);
