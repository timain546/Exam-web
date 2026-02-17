insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (17, '2026-02-16', 1, 1, 800,800);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (4, '2026-02-15', 1, 2, 1500,1500);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (23, '2026-02-16', 1, 3, 120,120);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (1, '2026-02-15', 1, 4, 200,200);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (12, '2026-02-16', 1, 5, 12000000,12000000); --5

insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (9, '2026-02-15', 2, 1, 500,500);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (25, '2026-02-16', 2, 6, 120,120);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (6, '2026-02-15', 2, 3, 80,80);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (19, '2026-02-16', 2, 7, 60,60);
insert into bngrc_besoins (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (3, '2026-02-15',2, 5, 6000000,6000000); --10

insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (21, '2026-02-16', 3, 1, 600,600);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (14, '2026-02-15', 3, 2, 1000,1000);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (8, '2026-02-16', 3, 4, 150.150);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (26, '2026-02-15', 3, 8, 100,100);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (10, '2026-02-16', 3, 5, 8000000,8000000); --15

insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (5, '2026-02-15', 4, 1, 300,300);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (18, '2026-02-16', 4, 9, 200,200);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (2, '2026-02-15', 4, 3, 40,40);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (24, '2026-02-16', 4, 7, 30,30);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (7, '2026-02-15', 4, 5, 4000000,4000000); --20

insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (11, '2026-02-16', 5, 1, 700,700);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (20, '2026-02-15', 5, 2, 1200,1200);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (15, '2026-02-16', 5, 4, 180,180);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (22, '2026-02-15', 5, 8, 150,150);
insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (13, '2026-02-16', 5, 5, 1000000,1000000); --25

insert into bngrc_besoins  (id_besoin, date_besoin, id_ville, id_produit, quantite, quantite_restante) values (16, '2026-02-16', 1, 10, 3,3); --26

--ok region
insert into bngrc_regions (id_region,nom) values (1,'Madagascar');

-- ok villes
insert into bngrc_villes (id_ville, nom, id_region) values (1,'Toamasina', 1);
insert into bngrc_villes (id_ville, nom, id_region) values (2,'Mananjary', 1);
insert into bngrc_villes (id_ville, nom, id_region) values (3,'Farafangana', 1);
insert into bngrc_villes (id_ville, nom, id_region) values (4,'Nosy Be', 1);
insert into bngrc_villes (id_ville, nom, id_region) values (5,'Morondava', 1);

-- ok categories
insert into bngrc_categories (id_categorie, nom) values (1,'nature');
insert into bngrc_categories (id_categorie, nom) values (2,'materiel');
insert into bngrc_categories (id_categorie, nom) values (3,'argent');

-- ok produits
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (1,1,'Riz','kg',3000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (2,1,'Eau','L',1000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (3,2,'Tole','unites',25000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (4,2,'Bache','unites',15000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (5,3,'Argent','Ar',1);

insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (6,1,'Huile','L',6000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (7,2,'Clous','kg',8000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (8,2,'Bois','unites',10000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (9,1,'Haricots','unites',4000);
insert into bngrc_produits (id_produit, id_categorie, nom, unite, prix_unitaire) values (10,2,'Groupe','unites',6750000);


insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (1, '2026-02-16', 3, 5, 5000000, 5000000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (2, '2026-02-16', 3, 5, 3000000, 3000000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (3, '2026-02-17', 3, 5, 4000000, 4000000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (4, '2026-02-17', 3, 5, 1500000, 1500000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (5, '2026-02-17', 3, 5, 6000000, 6000000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (6, '2026-02-16', 1, 1, 400, 400);

insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (7, '2026-02-16', 1, 2, 600, 600);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (8, '2026-02-17', 2, 3, 50, 50);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (9, '2026-02-17', 2, 4, 70, 70);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (10, '2026-02-17', 1, 9, 100, 100);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (11, '2026-02-18', 1, 1, 2000, 2000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (12, '2026-02-18', 2, 3, 300, 300);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (13, '2026-02-18', 1, 2, 5000, 5000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (14, '2026-02-19', 3, 5, 20000000, 20000000);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (15, '2026-02-19', 2, 4, 500, 500);
insert into bngrc_dons (id_don, date_don, id_produit,quantite,quantite_restante) values (16, '2026-02-17', 1, 9, 88, 88);
