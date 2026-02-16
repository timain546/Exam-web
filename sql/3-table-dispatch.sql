CREATE TABLE IF NOT EXISTS bngrc_dispatch(
    id_dispatch INT AUTO_INCREMENT PRIMARY KEY,
    id_don INT NOT NULL,
    quantite INT NOT NULL,
    id_ville INT NOT NULL,
    FOREIGN KEY (id_don) REFERENCES bngrc_dons(id_don),
    FOREIGN KEY (id_ville) REFERENCES bngrc_villes(id_ville)
);
