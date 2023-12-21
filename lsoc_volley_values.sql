-- CLUBS--
INSERT INTO `club` (`id`, `nom`, `ville`, `adresse`) VALUES (NULL, 'Test Championz', 'TEST', '12 rue du Test - 77530 TEST');
INSERT INTO `club` (`id`, `nom`, `ville`, `adresse`) VALUES (NULL, 'Test2 Gang', 'TEST2', '12 rue du Test2 - 78530 TEST2');

-- EQUIPES --
INSERT INTO `equipe` (`id`, `club_id`, `libelle`, `classement`) VALUES (NULL, '1', 'Loisir', 'Aucun');
INSERT INTO `equipe` (`id`, `club_id`, `libelle`, `classement`) VALUES (NULL, '2', 'Loisir', 'Aucun');

-- MATCHS --
INSERT INTO `match_volley` (`id`, `club_id`, `id_equipe_vainqueur`, `id_equipe_perdant`, `score`, `duree`, `date_match`) VALUES (NULL, '1', NULL, NULL, NULL, NULL, '2023-12-27');

-- EQUIPES-MATCH_VOLLEY --
INSERT INTO `equipe_match_volley` (`equipe_id`, `match_volley_id`) VALUES ('1', '1');
INSERT INTO `equipe_match_volley` (`equipe_id`, `match_volley_id`) VALUES ('2', '1');
