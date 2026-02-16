CREATE VIEW bngrc_besoins_reels AS
SELECT quantite
FROM bngrc_besoins
UNION
SELECT (quantite*-1) AS quantite
FROM bngrc_dispatch;
