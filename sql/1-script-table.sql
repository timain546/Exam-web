CREATE DATABASE IF NOT EXISTS bngrc;
USE bngrc;

CREATE TABLE IF NOT EXISTS bngrc_regions(
    id_region INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS bngrc_villes(
    id_ville INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    id_region INT NOT NULL,
    FOREIGN KEY (id_region) REFERENCES bngrc_regions(id_region)
);

CREATE TABLE IF NOT EXISTS bngrc_categories(
    id_categorie INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS bngrc_produits(
    id_produit INT AUTO_INCREMENT PRIMARY KEY,
    id_categorie INT NOT NULL,
    nom VARCHAR(255) NOT NULL,
    unite INT NOT NULL,
    prix_unitaire DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (id_categorie) REFERENCES bngrc_categories(id_categorie)
);

CREATE TABLE IF NOT EXISTS bngrc_besoins(
    id_besoin INT AUTO_INCREMENT PRIMARY KEY,
    date_besoin DATE, -- date nangatahana
    id_ville INT NOT NULL,
    id_produit INT NOT NULL,
    quantite INT NOT NULL,
    FOREIGN KEY (id_ville) REFERENCES bngrc_villes(id_ville),
    FOREIGN KEY (id_produit) REFERENCES bngrc_produits(id_produit)
);

CREATE TABLE IF NOT EXISTS bngrc_dons(
    id_don INT AUTO_INCREMENT PRIMARY KEY,
    date_don DATE NOT NULL,
    id_produit INT NOT NULL,
    quantite INT NOT NULL,
    FOREIGN KEY (id_produit) REFERENCES bngrc_produits(id_produit)
);
