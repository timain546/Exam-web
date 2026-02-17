CREATE Table bngrc_achat(
    id_achat INT AUTO_INCREMENT PRIMARY KEY,
    date_achat DATE NOT NULL,
    id_besoin INT NOT NULL,
    quantite INT NOT NULL,
    montant DECIMAL(10, 2) NOT NULL,
    taux DECIMAL(5, 2) NOT NULL,
    FOREIGN KEY (id_besoin) REFERENCES bngrc_besoin(id_besoin)
);
