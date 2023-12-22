use lsoc_volley ;
-- CLUBS--
INSERT INTO `club` (`id`, `nom`, `ville`, `adresse`) VALUES (NULL, 'Test Championz', 'TEST', '12 rue du Test - 77530 TEST');
INSERT INTO `club` (`id`, `nom`, `ville`, `adresse`) VALUES (NULL, 'Test2 Gang', 'TEST2', '12 rue du Test2 - 78530 TEST2');
INSERT INTO `club` (`id`, `nom`, `ville`, `adresse`) VALUES (NULL, 'LSOC', 'COLOMBES', '288 Rue du Président Salvador Allende, 92700 Colombes');

-- EQUIPES --
INSERT INTO `equipe` (`id`, `club_id`, `libelle`, `classement`) VALUES (NULL, '1', 'Loisir', 'Aucun');
INSERT INTO `equipe` (`id`, `club_id`, `libelle`, `classement`) VALUES (NULL, '2', 'Loisir', 'Aucun');
INSERT INTO `equipe` (`id`, `club_id`, `libelle`, `classement`) VALUES (NULL, '1', 'M18 Féminin', 'Régional');
INSERT INTO `equipe` (`id`, `club_id`, `libelle`, `classement`) VALUES (NULL, '2', 'M18 Féminin', 'Régional');
INSERT INTO `equipe` (`id`, `club_id`, `libelle`, `classement`) VALUES (NULL, '3', 'M18 Féminin', NULL);

-- JOUEURS --
INSERT INTO joueur (numero_licence, numero, nom, prenom, age, poste,date_naissance) VALUES (45321, 5613473, 'G', 'Soleyne', 21, 'R4','1995-12-11');
INSERT INTO joueur (numero_licence, numero, nom, prenom, age, poste,date_naissance) VALUES (45321, 5613473, 'albares', 'elodie', 21, 'R4','1995-12-11');
INSERT INTO joueur (numero_licence, numero, nom, prenom, age, poste,date_naissance) VALUES (45321, 5613473, 'G', 'Marie', 21, 'Passeuse','1995-12-11');
INSERT INTO joueur (numero_licence, numero, nom, prenom, age, poste,date_naissance) VALUES (45321, 5613473, 'P', 'Sarah', 21, 'R4','1995-12-11');

-- JOUEUR EQUIPE --
INSERT INTO `joueur_equipe` (`joueur_id`, `equipe_id`) VALUES ('3', '5');
INSERT INTO `joueur_equipe` (`joueur_id`, `equipe_id`) VALUES ('2', '5');
INSERT INTO `joueur_equipe` (`joueur_id`, `equipe_id`) VALUES ('4', '5');
INSERT INTO `joueur_equipe` (`joueur_id`, `equipe_id`) VALUES ('5', '5');

-- MATCHS --
INSERT INTO `match_volley` (`id`, `club_id`, `id_equipe_vainqueur`, `id_equipe_perdant`, `score`, `duree`, `date_match`) VALUES (NULL, '1', NULL, NULL, NULL, NULL, '2023-12-27');
INSERT INTO `match_volley` (`id`, `club_id`, `id_equipe_vainqueur`, `id_equipe_perdant`, `score`, `duree`, `date_match`) VALUES (NULL, '2', NULL, NULL, NULL, NULL, '2022-12-22');

-- EQUIPES-MATCH_VOLLEY --
INSERT INTO `equipe_match_volley` (`equipe_id`, `match_volley_id`) VALUES ('1', '1');
INSERT INTO `equipe_match_volley` (`equipe_id`, `match_volley_id`) VALUES ('2', '1');
INSERT INTO `equipe_match_volley` (`equipe_id`, `match_volley_id`) VALUES ('2', '2');
INSERT INTO `equipe_match_volley` (`equipe_id`, `match_volley_id`) VALUES ('3', '2');

-- EVENEMENTS --
INSERT INTO `evenement` (`id`, `club_id`, `libelle`, `date_evenement`, `heure_evenement`, `description`) VALUES (NULL, '1', 'Soirée Noël', '2023-12-22', '19:30:00', 'Ce vendredi 22 décembre à 19h30, plongez dans l\'atmosphère chaleureuse et festive d\'une soirée de Noël inoubliable au Club de Volley local. L\'énergie palpitante de la compétition se mêle à la magie de la saison pour créer un événement qui ravira les amateurs de volley et les amoureux de l\'esprit festif.\r\n\r\nDès votre arrivée, l\'entrée du club s\'illumine de guirlandes scintillantes, créant une ambiance accueillante et joyeuse. À l\'intérieur, une décoration de Noël soigneusement pensée, avec des sapins étincelants, des boules de Noël chatoyantes et des étoiles scintillantes, enveloppe le lieu dans une féérie propre à cette période de l\'année.\r\n\r\nLes équipes s\'affronteront dans des matchs endiablés, animant le terrain de jeu avec une passion débordante. L\'esprit sportif et la camaraderie seront au rendez-vous, créant une atmosphère électrique où les compétiteurs donneront le meilleur d\'eux-mêmes pour remporter les victoires de Noël.\r\n\r\nEntre les sets palpitants, les convives auront l\'occasion de se détendre et de profiter des délices festifs proposés au bar. Des cocktails spéciaux aux saveurs hivernales, des bouchées gourmandes et des douceurs sucrées seront servis, régalant les papilles et ajoutant une touche gastronomique à l\'événement.\r\n\r\nUne playlist spéciale Noël résonnera dans tout le club, créant une ambiance sonore entraînante. Les participants pourront se déhancher sur des airs festifs, ajoutant une dimension ludique et conviviale à cette soirée unique.\r\n\r\nEnveloppés dans l\'esprit de Noël, les passionnés de volley, les amis et les familles se réuniront pour célébrer cette soirée mémorable. L\'événement se clôturera avec un échange de vœux chaleureux, symbolisant l\'esprit de partage et de joie qui caractérise la saison des fêtes.\r\n\r\nNe manquez pas cette soirée exceptionnelle au Club de Volley le 22 décembre à 19h30, où sport, camaraderie et célébration de Noël se combinent pour créer des souvenirs impérissables.');
