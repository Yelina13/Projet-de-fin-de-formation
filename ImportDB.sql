-- Adminer 4.8.1 MySQL 5.5.5-10.3.38-MariaDB-0ubuntu0.20.04.1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_from_id` int(11) DEFAULT NULL,
  `publish_id` int(11) DEFAULT NULL,
  `title` varchar(64) NOT NULL,
  `overview` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `published_date` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `updated_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_23A0E666EF25FC3` (`is_from_id`),
  KEY `IDX_23A0E668734ED60` (`publish_id`),
  CONSTRAINT `FK_23A0E666EF25FC3` FOREIGN KEY (`is_from_id`) REFERENCES `article_category` (`id`),
  CONSTRAINT `FK_23A0E668734ED60` FOREIGN KEY (`publish_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `article` (`id`, `is_from_id`, `publish_id`, `title`, `overview`, `content`, `published_date`, `image`, `updated_date`) VALUES
(37,	2,	15,	'Transporter des plantes lors d\'un déménagement',	'Vos plantes vous suivront partout !',	'Déménager dans une nouvelle maison est une aventure passionnante, mais cela peut aussi être une tâche intimidante, surtout lorsqu\'il s\'agit de transporter vos plantes bien-aimées. Les plantes nécessitent des soins et une attention particuliers pendant le processus de déménagement pour assurer leur santé et leur bien-être. Dans cet article, nous vous fournirons des conseils et des directives essentiels pour transporter vos plantes en toute sécurité et les aider à prospérer dans leur nouvel environnement.\r\n\r\nPlanifier à l\'avance:\r\nCommencez à planifier le transport de vos plantes bien avant la date de votre déménagement. Cela vous permettra de prendre les dispositions nécessaires et d\'assurer une transition en douceur pour vos plantes.\r\nRecherchez les besoins spécifiques de chaque plante pour comprendre comment elles doivent être emballées, les conditions de température idéales et les exigences de soins particuliers pendant le déménagement.\r\n\r\nTaillez et rempotez :\r\nTaillez vos plantes quelques semaines avant le déménagement pour réduire leur taille et les rendre plus maniables pour le transport.\r\nPensez à rempoter vos plantes dans des contenants légers et incassables. Cela permettra d\'éviter les bris et d\'offrir un meilleur soutien aux racines pendant le déménagement.\r\n\r\nPréparez les matériaux d\'emballage appropriés :\r\nRassemblez les matériaux d\'emballage appropriés tels que des boîtes solides, des contenants en plastique ou des boîtes de déménagement spécifiques à l\'usine.\r\nTapisser le fond des boîtes avec des cacahuètes d\'emballage ou du papier journal froissé pour fournir un rembourrage pour les plantes.\r\nUtilisez des matériaux souples comme du papier bulle ou du papier d\'emballage pour fixer les plantes dans leurs contenants et éviter qu\'elles ne se déplacent pendant le transport.\r\n\r\nArrosage et timing :\r\nArrosez vos plantes un jour ou deux avant le déménagement, permettant au sol d\'être humide mais pas trop saturé. Cela aidera à garder les plantes hydratées pendant le voyage.\r\nÉvitez d\'arroser vos plantes juste avant de les emballer, car un sol humide peut alourdir les conteneurs et entraîner des fuites ou des dommages.\r\n\r\nTransport des plantes :\r\nPlacez les plantes en pot dans leurs contenants désignés, en vous assurant qu\'elles sont bien ajustées et bien soutenues.\r\nSi vous avez de grandes plantes ou de grands arbres, pensez à envelopper le feuillage dans un matériau respirant comme la toile de jute pour protéger les feuilles pendant le transport.\r\nSécurisez les plantes dans votre véhicule, en vous assurant qu\'elles ne sont pas exposées à des températures extrêmes, à la lumière directe du soleil ou à des vents violents. Maintenez une température confortable à l\'intérieur du véhicule pour éviter les dommages causés par la chaleur ou le froid.\r\n\r\nDéballage et acclimatation :\r\nÀ votre arrivée dans votre nouvelle maison, déballez les plantes dès que possible et trouvez-leur des endroits appropriés.\r\nAcclimatez progressivement les plantes à leur nouvel environnement en les exposant progressivement au soleil et en ajustant les routines d\'arrosage en fonction de leurs besoins.\r\n\r\nEn suivant ces conseils et directives, vous pouvez assurer le transport sécuritaire de vos plantes lors d\'un déménagement et leur donner les meilleures chances de prospérer dans leur nouvel environnement. N\'oubliez pas de leur fournir les soins appropriés, de surveiller leur état et de leur donner le temps de s\'adapter. Bon déménagement et bon jardinage !\r\n\r\nMots clé: Plantes - Transport - Déménagement - Emballage - Arrosage - Jardinage - Conseils',	'2008-03-17 00:00:00',	'https://images.pexels.com/photos/4153146/pexels-photo-4153146.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2017-06-15 00:00:00'),
(38,	1,	13,	'Comment organiser efficacement votre déménagement en 5 étapes',	'Plus de perte de temps et d\'énergie',	'Le déménagement est souvent considéré comme l\'une des étapes les plus stressantes de la vie, mais avec une planification minutieuse et une organisation adéquate, il peut être bien plus fluide et agréable. Dans cet article, nous vous guiderons à travers un plan en cinq étapes pour organiser efficacement votre déménagement. Suivez ces étapes simples pour rendre le processus de déménagement beaucoup plus gérable.\r\n\r\nÉtape 1 : Créez une liste de tâches détaillée\r\nLa première étape pour organiser votre déménagement est de créer une liste de tâches détaillée. Notez tout ce qui doit être fait, des petites tâches comme changer d\'adresse postale aux grandes tâches comme louer un camion de déménagement ou embaucher des déménageurs professionnels. Organisez votre liste par ordre de priorité et fixez des dates limites pour chaque élément afin de rester sur la bonne voie.\r\n\r\nÉtape 2 : Triez et désencombrez\r\nLe déménagement est une excellente occasion de faire le tri dans vos affaires et de vous débarrasser de ce que vous n\'utilisez plus. Prenez le temps de désencombrer chaque pièce de votre maison et décidez ce que vous voulez garder, donner, vendre ou jeter. Cela réduira non seulement le volume de vos biens à déménager, mais cela vous permettra également de commencer une nouvelle étape de votre vie dans un environnement plus léger et plus organisé.\r\n\r\nÉtape 3 : Emballez méthodiquement\r\nL\'emballage peut être l\'une des tâches les plus fastidieuses du déménagement. Pour vous faciliter la tâche, commencez à emballer vos affaires par pièce, en veillant à étiqueter clairement chaque boîte avec son contenu et la pièce de destination. Utilisez des matériaux d\'emballage de qualité pour protéger vos biens fragiles et investissez dans des fournitures telles que des cartons, du papier bulle, du ruban adhésif et des marqueurs pour l\'emballage.\r\n\r\nÉtape 4 : Organisez les formalités administratives\r\nAvant votre déménagement, assurez-vous de régler toutes les formalités administratives liées à votre changement d\'adresse. Informez les entreprises de services publics, les établissements financiers, les compagnies d\'assurance et les organismes gouvernementaux de votre nouvelle adresse. N\'oubliez pas de transférer votre abonnement postal et de mettre à jour votre adresse auprès de la sécurité sociale, de l\'assurance maladie et d\'autres entités importantes.\r\n\r\nÉtape 5 : Planifiez le jour du déménagement\r\nLe grand jour est enfin arrivé ! Assurez-vous de coordonner tous les détails, y compris l\'accès au lieu de chargement et de déchargement, les horaires des déménageurs ou du camion de location, ainsi que la présence de personnes pour vous aider. Préparez également une trousse de survie avec des articles essentiels tels que des collations, de l\'eau, des articles de toilette et des documents importants que vous devrez peut-être consulter pendant le déménagement.\r\n\r\nEn suivant ces cinq étapes, vous pouvez organiser efficacement votre déménagement et vous sentir plus en contrôle tout au long du processus. Rappelez-vous que la clé d\'un déménagement réussi réside dans la planification et la préparation, alors commencez tôt et gardez votre objectif final en tête : profiter de votre nouvelle maison sans le stress inutile d\'un déménagement mal organisé. Bon déménagement !',	'2012-03-15 00:00:00',	'https://images.pexels.com/photos/1036936/pexels-photo-1036936.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2019-10-17 00:00:00'),
(39,	4,	16,	'Les erreurs courantes à éviter',	'Pas de faux pas !',	'Le déménagement est une étape de vie importante qui peut être remplie d\'excitation et de nouvelles opportunités. Cependant, il est essentiel de rester attentif et d\'éviter certaines erreurs courantes qui pourraient transformer cette expérience en un cauchemar stressant. Dans cet article, nous examinerons les erreurs fréquentes commises lors d\'un déménagement et vous fournirons des conseils pratiques pour les éviter avec succès.\r\n\r\nErreur n°1 : Le manque de planification adéquate\r\nL\'une des erreurs les plus courantes lors d\'un déménagement est de ne pas planifier suffisamment à l\'avance. Laisser les choses à la dernière minute peut entraîner des retards, des coûts supplémentaires et une grande dose de stress. Contournez cette erreur en créant un plan détaillé dès que vous avez confirmé votre déménagement. Établissez une liste de tâches, des échéances et des étapes à suivre pour vous assurer que tout est organisé à temps.\r\n\r\nErreur n°2 : Ignorer le désencombrement\r\nLe déménagement est l\'occasion idéale de trier et de désencombrer vos affaires, mais beaucoup de gens ignorent cette étape importante. Le résultat est souvent un déménagement d\'objets inutiles et indésirables vers le nouvel endroit. Pour éviter cela, prenez le temps de faire le tri avant l\'emballage. Décidez quels objets conserver, donner, vendre ou jeter. Non seulement cela vous fera économiser du temps et de l\'espace, mais cela vous permettra également de commencer votre nouvelle vie dans un environnement plus léger et plus organisé.\r\n\r\nErreur n°3 : Ne pas se renseigner sur le déménageur ou la société de location de camions\r\nSi vous décidez de faire appel à un déménageur professionnel ou de louer un camion de déménagement, il est essentiel de bien se renseigner sur l\'entreprise. Laisser faire le hasard peut conduire à des problèmes tels que des frais cachés, des retards ou des dommages à vos biens. Avant de choisir une entreprise, lisez les avis, demandez des recommandations et obtenez plusieurs devis. Assurez-vous également que l\'entreprise est dûment autorisée et assurée.\r\n\r\nErreur n°4 : Ne pas protéger correctement vos biens fragiles\r\nEmballer vos biens fragiles à la va-vite sans les protéger correctement est une autre erreur fréquente. Pour éviter la casse, utilisez des matériaux d\'emballage appropriés tels que du papier bulle, des coussins d\'air et des couvertures pour protéger vos objets délicats. Emballez-les avec soin dans des cartons appropriés et étiquetez clairement les boîtes \"fragiles\" pour informer les déménageurs de leur contenu délicat.\r\n\r\nErreur n°5 : Oublier de changer d\'adresse\r\nAprès le déménagement, beaucoup de gens oublient de changer leur adresse auprès des entreprises et des organismes importants. Cela peut entraîner des retards dans la réception du courrier et des factures importantes. Avant le déménagement, établissez une liste des entités à informer de votre changement d\'adresse, y compris les services publics, les banques, les compagnies d\'assurance, les fournisseurs d\'accès internet, etc. Pensez également à informer vos amis et votre famille de votre nouvelle adresse.\r\n\r\nEn évitant ces erreurs courantes et en adoptant une approche réfléchie et méthodique, vous pouvez rendre votre déménagement beaucoup plus fluide et agréable. N\'oubliez pas de rester organisé, de planifier à l\'avance et de demander de l\'aide si nécessaire. Avec une bonne préparation, vous pourrez vous installer confortablement dans votre nouveau chez-vous et commencer cette nouvelle étape passionnante de votre vie sans stress inutile. Bon déménagement !',	'2012-03-17 00:00:00',	'https://images.pexels.com/photos/5699826/pexels-photo-5699826.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2016-07-13 00:00:00'),
(40,	3,	11,	'Déménagement économique',	'Astuces pour réduire les coûts',	'Le déménagement est souvent associé à des coûts élevés, mais il est possible de réaliser des économies sans sacrifier la qualité du processus. Dans cet article, nous vous présenterons des astuces pratiques pour effectuer un déménagement économique sans compromettre l\'efficacité ni la sécurité de vos biens. Suivez ces conseils pour alléger votre budget et rendre votre déménagement plus abordable.\r\n\r\nPlanifiez à l\'avance\r\nLa planification préalable est essentielle pour réaliser un déménagement économique. Commencez tôt en établissant un calendrier détaillé et en fixant un budget précis. Cela vous permettra de mieux gérer vos dépenses et d\'éviter les achats impulsifs de dernière minute.\r\n\r\nFaites le tri avant le déménagement\r\nProfitez de l\'occasion pour désencombrer votre maison avant le déménagement. Plus vous avez d\'objets à déménager, plus les frais seront élevés. Faites le tri dans vos affaires et donnez, vendez ou jetez ce que vous n\'utilisez plus. Vous économiserez ainsi sur les frais d\'emballage, de transport et de stockage.\r\n\r\nRecherchez des fournitures d\'emballage gratuites\r\nAu lieu d\'acheter de nouvelles fournitures d\'emballage, cherchez des alternatives gratuites. Demandez à des amis, à des magasins locaux ou à des entreprises de distribution de vous donner des cartons et des matériaux d\'emballage. Vous pouvez également utiliser des serviettes, des draps et des vêtements pour protéger vos biens fragiles au lieu d\'acheter du papier bulle.\r\n\r\nEmballez vous-même\r\nEngager des déménageurs professionnels pour emballer vos affaires peut être pratique, mais cela représente un coût supplémentaire. Si vous avez le temps et l\'énergie, emballez vous-même vos biens. Non seulement vous économiserez de l\'argent, mais vous pourrez également vous assurer que vos affaires sont emballées soigneusement selon vos propres normes.\r\n\r\nComparez les devis de différentes entreprises de déménagement\r\nSi vous décidez de faire appel à des déménageurs professionnels, n\'hésitez pas à comparer les devis de plusieurs entreprises. Assurez-vous de demander des devis détaillés et de vérifier ce qui est inclus dans les tarifs. Optez pour une entreprise fiable et réputée qui propose des services de qualité à un prix abordable.\r\n\r\nOptez pour un déménagement en basse saison\r\nLes tarifs des entreprises de déménagement peuvent varier en fonction de la saison. Évitez les périodes de pointe, comme les mois d\'été, lorsque les coûts sont généralement plus élevés. Optez plutôt pour un déménagement en basse saison, si cela est possible, pour bénéficier de tarifs plus avantageux.\r\n\r\nLouez un camion de déménagement\r\nSi vous avez peu de biens à déménager, envisagez de louer un camion de déménagement et de vous occuper du transport vous-même. Cela peut être moins cher que de faire appel à des déménageurs professionnels, surtout si vous avez des amis ou des membres de la famille prêts à vous aider.\r\n\r\nNégociez les frais supplémentaires\r\nLorsque vous négociez les services d\'une entreprise de déménagement, n\'hésitez pas à discuter des frais supplémentaires. Certaines entreprises peuvent être disposées à négocier les tarifs ou à offrir des réductions pour obtenir votre entreprise.\r\n\r\nEn suivant ces astuces, vous pouvez réduire considérablement les coûts liés à votre déménagement tout en assurant un déplacement efficace et sans souci. Rester organisé, prévoir à l\'avance et faire preuve de créativité dans la recherche de solutions peu coûteuses vous permettra de réaliser un déménagement économique tout en préservant votre budget.',	'2011-02-16 00:00:00',	'https://images.pexels.com/photos/1602726/pexels-photo-1602726.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2018-08-15 00:00:00'),
(41,	3,	12,	'Déménager avec des enfants',	'Conseils pour une transition en douceur',	'Le déménagement peut être une expérience émotionnellement intense pour les adultes, mais il en va de même, voire davantage, pour les enfants. Changer de maison et de quartier peut susciter des inquiétudes et des angoisses chez les plus jeunes. Cependant, avec une préparation adéquate et une approche bienveillante, il est possible de faciliter cette transition pour vos enfants. Dans cet article, nous partagerons des conseils pratiques pour déménager avec des enfants tout en rendant cette étape de vie aussi douce et positive que possible.\r\n\r\nCommuniquez ouvertement avec vos enfants\r\nAvant même de commencer à planifier le déménagement, prenez le temps de discuter ouvertement avec vos enfants de ce qui va se passer. Répondez à toutes leurs questions et préoccupations de manière honnête et rassurante. Impliquez-les dans le processus de prise de décision, autant que possible, en leur faisant part des raisons du déménagement et des avantages que cela peut apporter.\r\n\r\nExplorez le nouveau quartier ensemble\r\nSi possible, faites une visite du nouveau quartier avec vos enfants avant le déménagement. Explorez les environs, visitez des parcs, des écoles et des endroits amusants pour les enfants. Cela aidera vos enfants à se familiariser avec leur nouvel environnement et à se sentir plus à l\'aise lorsqu\'ils s\'y installeront.\r\n\r\nFaites participer les enfants dans le processus de préparation\r\nImpliquez vos enfants dans la préparation du déménagement. Laissez-les aider à emballer leurs affaires, à décorer les cartons ou à choisir comment organiser leur nouvelle chambre. Cela leur donnera un sentiment de contrôle et d\'investissement dans le processus de déménagement.\r\n\r\nCréez un espace familier dès l\'emménagement\r\nDès que vous emménagez dans votre nouvelle maison, essayez de créer un espace familier pour vos enfants. Décorez leur chambre avec leurs affaires préférées, exposez des photos de famille ou des dessins qu\'ils ont faits. Cela les aidera à se sentir plus à l\'aise et en sécurité dans leur nouvel environnement.\r\n\r\nMaintenez les routines habituelles\r\nPendant le déménagement et après l\'emménagement, essayez de maintenir autant que possible les routines habituelles de vos enfants. Les repères et les habitudes rassureront les enfants et leur permettront de mieux s\'adapter à leur nouvelle vie.\r\n\r\nEncouragez les rencontres sociales\r\nEncouragez vos enfants à se faire de nouveaux amis dans le nouveau quartier. Organisez des rencontres sociales avec les voisins ayant des enfants du même âge, inscrivez-les à des activités locales ou à des clubs sportifs. Les nouvelles amitiés aideront vos enfants à se sentir intégrés et heureux dans leur nouvel environnement.\r\n\r\nSoyez patients et compréhensifs\r\nChaque enfant réagit différemment au déménagement, il est donc important d\'être patients et compréhensifs envers leurs émotions. Laissez-les exprimer leurs sentiments, qu\'ils soient positifs ou négatifs, et montrez-leur que vous êtes là pour les soutenir.\r\n\r\nCréez de nouveaux souvenirs ensemble\r\nProfitez de cette période de transition pour créer de nouveaux souvenirs ensemble en famille. Organisez des sorties, des jeux, des pique-niques ou des activités spéciales dans votre nouvel environnement. Ces moments de qualité renforceront les liens familiaux et aideront à créer une atmosphère positive autour du déménagement.\r\n\r\nEn suivant ces conseils, vous pouvez aider vos enfants à faire une transition en douceur lors du déménagement. Soyez attentif à leurs besoins émotionnels et faites de cette expérience une opportunité de croissance et d\'épanouissement pour toute la famille. Avec du temps, de l\'amour et du soutien, vos enfants finiront par s\'adapter à leur nouvel environnement et considéreront cette étape comme une aventure excitante et positive dans leur vie.',	'2013-03-16 00:00:00',	'https://images.pexels.com/photos/3905730/pexels-photo-3905730.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2016-08-15 00:00:00'),
(42,	2,	17,	'Comment emballer vos objets fragiles',	'No more drama, no more broken plate',	'Lors d\'un déménagement, l\'une des principales préoccupations est de protéger vos objets fragiles afin qu\'ils arrivent en bon état dans votre nouvelle maison. Les verres, la vaisselle, les miroirs, les cadres et autres objets délicats nécessitent une attention particulière lors de l\'emballage pour éviter tout dommage pendant le transport. Dans cet article, nous vous donnerons des conseils pratiques sur la manière d\'emballer et de protéger vos objets fragiles lors d\'un déménagement.\r\n\r\nPréparez les fournitures d\'emballage adéquates\r\nAvant de commencer à emballer vos objets fragiles, assurez-vous d\'avoir les fournitures nécessaires à portée de main. Vous aurez besoin de cartons de différentes tailles, de papier bulle, de papier d\'emballage, de ruban adhésif, de marqueurs et de matériaux de calage tels que des coussins d\'air ou des journaux froissés.\r\n\r\nEmballez individuellement chaque objet fragile\r\nLa clé pour protéger vos objets fragiles est de les emballer individuellement. Enveloppez chaque objet avec du papier d\'emballage ou du papier bulle pour le protéger des chocs et des frottements. Assurez-vous de couvrir toutes les surfaces délicates et les coins pointus.\r\n\r\nUtilisez des cartons adaptés\r\nChoisissez des cartons de qualité adaptés à la taille de vos objets fragiles. Évitez d\'utiliser des cartons trop grands, car cela peut entraîner des mouvements excessifs et des risques de casse. Remplissez les espaces vides avec des matériaux de calage pour éviter que les objets ne bougent pendant le transport.\r\n\r\nPlacez les objets les plus lourds en bas\r\nLorsque vous empilez vos objets fragiles dans le carton, assurez-vous de placer les articles les plus lourds au fond. Cela garantira que les objets légers ne seront pas écrasés sous le poids des objets plus lourds et réduira le risque de bris.\r\n\r\nSéparez les objets avec des matériaux de protection\r\nPour éviter les contacts directs entre les objets fragiles, placez une couche de papier bulle, de coussins d\'air ou de papier d\'emballage entre chaque article. Cela créera une barrière protectrice qui minimisera les frottements et les chocs entre les objets.\r\n\r\nMarquez clairement les cartons fragiles\r\nUne fois que vous avez emballé vos objets fragiles, n\'oubliez pas de les étiqueter clairement comme \"fragile\" ou \"verre\". Cela informera les déménageurs de la nature délicate du contenu du carton, et ils pourront ainsi manipuler ces boîtes avec plus de précaution.\r\n\r\nEmballez les miroirs et les cadres avec soin\r\nPour les miroirs et les cadres, utilisez du ruban adhésif pour former un \"X\" sur la surface en verre. Cela aidera à prévenir les bris en cas de choc. Enveloppez ensuite le miroir ou le cadre avec du papier bulle ou du papier d\'emballage, puis placez-le dans un carton adapté avec du matériel de calage.\r\n\r\nNe surchargez pas les cartons\r\nÉvitez de surcharger les cartons avec des objets fragiles. Lorsqu\'un carton est trop lourd, il devient plus difficile à manipuler et augmente le risque de bris. Essayez de garder les cartons de taille moyenne et assurez-vous que le poids est réparti uniformément.\r\n\r\nEn suivant ces conseils, vous pouvez emballer et protéger efficacement vos objets fragiles lors d\'un déménagement. Prenez votre temps lors de l\'emballage et assurez-vous de manipuler les objets avec précaution. Avec une préparation minutieuse et des matériaux de protection adéquats, vous pouvez avoir l\'assurance que vos objets fragiles arriveront en toute sécurité dans votre nouvelle maison.',	'2009-04-16 00:00:00',	'https://images.pexels.com/photos/6717606/pexels-photo-6717606.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2015-08-17 00:00:00'),
(43,	3,	5,	'Trouver le bon déménageur',	'Les critères à prendre en compte',	'Lorsque vient le moment de planifier un déménagement, choisir le bon déménageur est une décision cruciale pour garantir une expérience sans soucis et réussie. Un déménageur professionnel fiable peut vous offrir une assistance précieuse tout au long du processus, réduisant ainsi le stress lié à votre déménagement. Cependant, avec autant d\'entreprises de déménagement sur le marché, il peut être difficile de faire le bon choix. Dans cet article, nous examinerons les critères essentiels à prendre en compte pour trouver le bon déménageur pour votre déménagement.\r\n\r\nRéputation et recommandations\r\nLa réputation d\'une entreprise de déménagement est l\'un des critères les plus importants à évaluer. Recherchez des avis et des témoignages de clients précédents en ligne pour vous faire une idée de leur satisfaction et de leur expérience. Demandez également des recommandations à vos amis, votre famille ou vos voisins qui ont récemment déménagé pour obtenir des avis de confiance.\r\n\r\nLicence et assurances\r\nAssurez-vous que l\'entreprise de déménagement possède toutes les licences et les assurances nécessaires. Une entreprise légitime doit être en mesure de vous fournir des preuves de leur licence professionnelle et d\'assurance responsabilité civile et assurance cargo. Ces documents vous protègeront en cas de dommages matériels ou de blessures pendant le déménagement.\r\n\r\nEstimations détaillées\r\nObtenez des estimations détaillées de plusieurs entreprises de déménagement. Assurez-vous que les devis incluent tous les frais, y compris les coûts du transport, les assurances, les fournitures d\'emballage et les services supplémentaires. Comparer les devis vous aidera à comprendre les coûts réels de chaque déménageur et à faire un choix éclairé.\r\n\r\nServices proposés\r\nVérifiez les services proposés par chaque entreprise de déménagement. Certaines entreprises offrent des services complets, y compris l\'emballage, le déballage, le montage des meubles, tandis que d\'autres ne se concentrent que sur le transport. Assurez-vous de choisir une entreprise qui propose les services dont vous avez besoin pour répondre à vos besoins spécifiques.\r\n\r\nExpérience et expertise\r\nL\'expérience et l\'expertise de l\'entreprise de déménagement sont importantes pour assurer un déménagement réussi. Les entreprises ayant une longue histoire et des déménageurs expérimentés sont plus susceptibles de gérer les défis potentiels de manière professionnelle et efficace.\r\n\r\nFlexibilité et disponibilité\r\nAssurez-vous que le déménageur est flexible en termes de dates de déménagement et de disponibilité pour répondre à vos besoins. Certaines périodes de l\'année peuvent être plus chargées que d\'autres pour les entreprises de déménagement, donc planifiez à l\'avance pour vous assurer de réserver les services à temps.\r\n\r\nContrat clair\r\nAvant de signer un contrat avec une entreprise de déménagement, lisez attentivement toutes les conditions et les modalités. Assurez-vous de comprendre les délais de paiement, les politiques d\'annulation et les responsabilités de chaque partie. Si vous avez des questions ou des préoccupations, n\'hésitez pas à les poser à l\'entreprise de déménagement avant de signer le contrat.\r\n\r\nEn suivant ces critères importants, vous pourrez choisir le déménageur qui répond le mieux à vos besoins et qui vous assure une expérience de déménagement positive et sans stress. Prenez le temps de faire des recherches et de comparer les différentes options pour prendre la meilleure décision possible et commencer votre nouvelle vie dans votre nouveau foyer en toute tranquillité d\'esprit.',	'2009-03-15 00:00:00',	'https://images.pexels.com/photos/7464643/pexels-photo-7464643.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2016-07-15 00:00:00'),
(44,	3,	16,	'Déménager dans une autre ville',	'Guide pratique pour s\'adapter rapidement',	'Déménager dans une autre ville est une aventure excitante, mais cela peut également être une expérience déroutante et stressante. S\'adapter rapidement à votre nouvel environnement est essentiel pour vous sentir chez vous et commencer à profiter pleinement de votre nouvelle vie. Dans ce guide pratique, nous vous fournirons des conseils utiles pour faciliter votre transition et vous aider à vous adapter rapidement à votre nouvelle ville.\r\n\r\nFaites des recherches préalables\r\nAvant même de déménager, prenez le temps de faire des recherches approfondies sur votre nouvelle ville. Renseignez-vous sur les quartiers, les écoles, les commodités, les activités locales et les transports en commun. Plus vous en saurez sur votre nouvel environnement, plus vous vous sentirez préparé pour votre déménagement.\r\n\r\nExplorez votre quartier\r\nUne fois que vous avez emménagé, prenez le temps d\'explorer votre quartier à pied ou à vélo. Repérez les magasins, les parcs, les restaurants et d\'autres commodités à proximité. Plus vous vous familiariserez avec votre quartier, plus vous vous sentirez à l\'aise et connecté à votre nouvel environnement.\r\n\r\nSoyez ouvert aux nouvelles rencontres\r\nFaites un effort pour rencontrer de nouvelles personnes dans votre nouvelle ville. Participez à des activités locales, assistez à des événements communautaires ou rejoignez des groupes sociaux en ligne qui partagent vos intérêts. Être ouvert aux nouvelles rencontres vous permettra de vous intégrer rapidement et de vous faire de nouveaux amis.\r\n\r\nRestez connecté avec vos proches\r\nGarder le contact avec vos proches dans votre ancienne ville peut vous aider à faire face aux sentiments de nostalgie et de solitude. Utilisez les appels vidéo, les messages et les réseaux sociaux pour rester en contact avec votre famille et vos amis. Ils peuvent vous apporter un soutien émotionnel précieux pendant votre transition.\r\n\r\nPrenez le temps d\'explorer la culture locale\r\nApprenez à connaître la culture locale de votre nouvelle ville en assistant à des événements culturels, en visitant des musées et en dégustant la cuisine locale. S\'immerger dans la culture de votre nouvelle ville vous permettra de mieux comprendre votre environnement et de vous sentir connecté à la communauté.\r\n\r\nTrouvez de nouvelles activités\r\nCherchez des activités qui vous passionnent dans votre nouvelle ville. Rejoignez des clubs de sport, des cours de loisirs, des groupes de lecture ou toute autre activité qui vous intéresse. Trouver de nouvelles activités vous donnera l\'occasion de rencontrer des personnes partageant les mêmes centres d\'intérêt et de vous sentir plus engagé dans votre nouvel environnement.\r\n\r\nSoyez patient avec vous-même\r\nS\'adapter à une nouvelle ville peut prendre du temps, alors soyez patient avec vous-même. Il est normal de se sentir déboussolé et un peu perdu au début. Donnez-vous le temps d\'explorer et de vous habituer à votre nouvel environnement, et rappelez-vous que chaque transition nécessite un ajustement.\r\n\r\nEn suivant ces conseils pratiques, vous pourrez vous adapter rapidement à votre nouvelle ville et commencer à vous sentir chez vous. Déménager dans une autre ville est une opportunité excitante de découvrir de nouvelles choses, de rencontrer de nouvelles personnes et de vous ouvrir à de nouvelles expériences. Prenez les choses étape par étape, soyez ouvert d\'esprit et profitez de cette nouvelle aventure dans votre vie.',	'2008-03-17 00:00:00',	'https://images.pexels.com/photos/3800149/pexels-photo-3800149.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2013-05-15 00:00:00'),
(45,	3,	19,	'Conseils pour optimiser l\'espace dans votre nouveau logement',	'Ohlala il y a de la place !',	'Après avoir déménagé dans un nouveau logement, il est important d\'optimiser l\'espace disponible pour créer un environnement fonctionnel et agréable. Que vous ayez emménagé dans une petite maison ou un appartement spacieux, l\'organisation et l\'optimisation de l\'espace sont essentielles pour tirer le meilleur parti de votre nouvel endroit. Voici quelques conseils pratiques pour vous aider à optimiser l\'espace dans votre nouveau logement après le déménagement :\r\n\r\nFaites du désencombrement une priorité\r\nAvant de commencer à organiser vos affaires dans votre nouveau logement, prenez le temps de faire du désencombrement. Triez vos affaires et débarrassez-vous de tout ce que vous n\'utilisez plus ou qui ne convient pas à votre nouvel espace. Le désencombrement vous permettra de libérer de l\'espace et de vous concentrer sur les objets essentiels.\r\n\r\nUtilisez des meubles multifonctionnels\r\nInvestissez dans des meubles multifonctionnels qui peuvent servir à plusieurs fins. Par exemple, un canapé-lit peut être utilisé comme un espace de détente pendant la journée et se transformer en un lit confortable la nuit. Les meubles avec des espaces de rangement intégrés sont également utiles pour maximiser l\'espace de rangement.\r\n\r\nUtilisez les espaces de rangement verticaux\r\nOptimisez l\'utilisation de l\'espace vertical en utilisant des étagères, des crochets et des patères pour ranger vos affaires. Les murs peuvent être utilisés pour accrocher des étagères flottantes, des cadres photo et des décorations, libérant ainsi de l\'espace au sol pour d\'autres utilisations.\r\n\r\nInvestissez dans des solutions de rangement adaptées\r\nUtilisez des solutions de rangement adaptées à votre nouvel espace. Par exemple, des boîtes de rangement sous le lit, des organisateurs pour tiroirs, des paniers pour les placards et des séparateurs pour les étagères peuvent vous aider à garder vos affaires organisées et à maximiser l\'espace de rangement.\r\n\r\nCréez des zones de rangement dédiées\r\nAttribuez des zones de rangement spécifiques pour différents types d\'objets. Par exemple, créez une zone de rangement pour les vêtements, une autre pour les articles de cuisine, une pour les fournitures de bureau, etc. Cela vous aidera à garder vos affaires organisées et faciles à retrouver.\r\n\r\nPensez à l\'efficacité de l\'espace\r\nLorsque vous organisez vos meubles, assurez-vous de penser à l\'efficacité de l\'espace. Placez les meubles de manière à optimiser la circulation et à maximiser l\'espace disponible. Évitez de surcharger une pièce avec des meubles trop grands qui peuvent rendre l\'espace étroit et encombré.\r\n\r\nUtilisez des miroirs pour créer une illusion d\'espace\r\nLes miroirs peuvent être de précieux alliés pour créer une illusion d\'espace dans votre nouvel endroit. Placez des miroirs stratégiquement pour refléter la lumière naturelle et ouvrir visuellement la pièce.\r\n\r\nAdoptez un style de vie minimaliste\r\nAdopter un style de vie minimaliste peut vous aider à garder votre nouvel espace propre, organisé et dégagé. Limitez vos achats à l\'essentiel et évitez d\'accumuler des objets inutiles. Un espace épuré permet de mieux apprécier ce que vous possédez et de profiter pleinement de votre nouvel environnement.\r\n\r\nEn suivant ces conseils pour optimiser l\'espace dans votre nouveau logement, vous pourrez créer un environnement confortable, organisé et agréable. L\'efficacité de l\'espace est essentielle pour profiter pleinement de votre nouvel endroit et vous permettra de vous sentir chez vous dès le premier jour après le déménagement.',	'2010-03-17 00:00:00',	'https://images.pexels.com/photos/17120681/pexels-photo-17120681/free-photo-of-drawers-in-a-store.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2013-06-15 00:00:00'),
(46,	1,	17,	'Déménager à l\'étranger',	'Préparation et formalités indispensables',	'Déménager à l\'étranger est une expérience excitante qui peut ouvrir de nouvelles perspectives, mais cela nécessite une préparation minutieuse et la gestion de certaines formalités administratives. Que vous partiez pour étudier, travailler ou vivre dans un autre pays, il est essentiel de suivre ces conseils pour que votre déménagement à l\'étranger se déroule sans accroc et que vous puissiez vous installer confortablement dans votre nouvel environnement.\r\n\r\nRecherchez votre destination\r\nCommencez par faire des recherches approfondies sur votre nouvelle destination. Renseignez-vous sur le coût de la vie, les coutumes locales, les lois, les normes culturelles et les langues parlées. Plus vous en saurez sur votre nouveau pays d\'accueil, plus il sera facile de vous adapter à votre nouvel environnement.\r\n\r\nPlanifiez à l\'avance\r\nDéménager à l\'étranger demande une planification à long terme. Commencez à planifier votre déménagement plusieurs mois à l\'avance. Cela vous donnera suffisamment de temps pour vous organiser, faire les réservations nécessaires et accomplir toutes les formalités administratives.\r\n\r\nObtenez les visas et les autorisations nécessaires\r\nVérifiez les exigences en matière de visas et d\'autorisations de travail ou de résidence pour votre pays de destination. Certaines destinations peuvent exiger un visa de travail, un visa d\'étudiant ou un permis de résidence. Assurez-vous de remplir toutes les formalités nécessaires à temps pour éviter tout problème lors de votre arrivée.\r\n\r\nAssurez-vous de vos documents d\'identité\r\nVérifiez que votre passeport est valide pendant toute la durée de votre séjour à l\'étranger. Assurez-vous également de faire des copies de vos documents importants tels que votre passeport, votre permis de conduire, votre carte d\'identité et vos diplômes. Conservez les copies dans un endroit sûr en cas de perte ou de vol des originaux.\r\n\r\nOrganisez votre déménagement\r\nFaites appel à une entreprise de déménagement internationale pour vous aider à organiser votre déménagement à l\'étranger. Choisissez une entreprise expérimentée et réputée pour garantir que vos biens seront transportés en toute sécurité vers votre nouvelle destination. Demandez des devis détaillés et comparez les services proposés.\r\n\r\nGérez vos finances\r\nInformez votre banque de votre déménagement à l\'étranger pour éviter tout blocage de vos cartes bancaires ou de vos comptes. Prenez également des dispositions pour gérer vos finances à l\'étranger, comme l\'ouverture d\'un compte bancaire dans votre nouveau pays si nécessaire.\r\n\r\nAssurez-vous de votre santé\r\nVérifiez si vous avez besoin de vaccins spécifiques pour votre destination. Souscrivez une assurance santé internationale pour vous protéger en cas de problèmes de santé à l\'étranger. Assurez-vous également d\'avoir accès à vos dossiers médicaux et à vos prescriptions médicales si nécessaire.\r\n\r\nApprenez la langue\r\nSi votre nouveau pays parle une langue différente, essayez d\'apprendre les bases avant votre départ. Cela vous aidera à vous sentir plus à l\'aise et à communiquer plus facilement avec les locaux une fois sur place.\r\n\r\nEn suivant ces conseils de préparation et en accomplissant toutes les formalités indispensables, vous pouvez vous assurer que votre déménagement à l\'étranger se déroulera sans heurts. Prévoyez du temps pour vous adapter à votre nouvel environnement, soyez ouvert d\'esprit et profitez pleinement de cette nouvelle aventure internationale qui s\'offre à vous. Bon déménagement à l\'étranger !',	'2009-04-17 00:00:00',	'https://images.pexels.com/photos/1381415/pexels-photo-1381415.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1',	'2015-08-16 00:00:00');

DROP TABLE IF EXISTS `article_category`;
CREATE TABLE `article_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `article_category` (`id`, `name`) VALUES
(1,	'Logistique'),
(2,	'Emballage'),
(3,	'Mode de vie'),
(4,	'Autre');

DROP TABLE IF EXISTS `doctrine_migration_versions`;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230724115736',	'2023-07-24 13:57:43',	172);

DROP TABLE IF EXISTS `messenger_messages`;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sticker`;
CREATE TABLE `sticker` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `craft_id` int(11) DEFAULT NULL,
  `is_about_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_8FEDBCFDE836CCC8` (`craft_id`),
  KEY `IDX_8FEDBCFD452EAD5D` (`is_about_id`),
  CONSTRAINT `FK_8FEDBCFD452EAD5D` FOREIGN KEY (`is_about_id`) REFERENCES `sticker_category` (`id`),
  CONSTRAINT `FK_8FEDBCFDE836CCC8` FOREIGN KEY (`craft_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sticker` (`id`, `craft_id`, `is_about_id`) VALUES
(4,	5,	8),
(6,	19,	1),
(8,	6,	6),
(9,	23,	12),
(10,	27,	10),
(11,	4,	10),
(13,	7,	5),
(14,	24,	2),
(19,	11,	12),
(20,	19,	21),
(21,	25,	11),
(22,	14,	11),
(23,	25,	2),
(24,	11,	11),
(25,	8,	1);

DROP TABLE IF EXISTS `sticker_category`;
CREATE TABLE `sticker_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sticker_category` (`id`, `name`) VALUES
(1,	'Cuisine'),
(2,	'Salon'),
(3,	'Salle à manger'),
(4,	'Salle de bain'),
(5,	'Toilettes'),
(6,	'Buanderie'),
(8,	'Dressing'),
(9,	'Chambre'),
(10,	'Chambre 2'),
(11,	'Chambre 3'),
(12,	'Chambre 4'),
(21,	'Garage');

DROP TABLE IF EXISTS `sticker_item`;
CREATE TABLE `sticker_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sticker_item` (`id`, `name`) VALUES
(1,	'couverts'),
(2,	'vaisselle'),
(3,	'verres'),
(4,	'torchons'),
(5,	'serviettes'),
(6,	'casseroles'),
(7,	'produits ménagers'),
(8,	'épices'),
(9,	'épicerie sèche'),
(10,	'vêtements'),
(11,	'linge de lit'),
(12,	'produits de beauté'),
(13,	'livres'),
(14,	'films'),
(15,	'bibelots'),
(16,	'informatique'),
(17,	'câbles'),
(18,	'bouteilles'),
(19,	'animaux'),
(20,	'documents'),
(21,	'pharmacie'),
(22,	'vrac'),
(23,	'disques'),
(24,	'jouets'),
(25,	'jeux de société'),
(26,	'bougies'),
(27,	'ustensiles de cuisine'),
(28,	'poêles'),
(29,	'coussins'),
(30,	'accessoires'),
(31,	'savon'),
(32,	'tapis'),
(33,	'lampes de chevet'),
(34,	'lampes'),
(35,	'produits hygéniques'),
(36,	'décorations'),
(37,	'planches à découper'),
(38,	'brosse à dents'),
(39,	'bols'),
(40,	'horloges'),
(41,	'poubelles'),
(42,	'cafetière'),
(43,	'oreillers'),
(44,	'maquillage'),
(45,	'miroir'),
(46,	'mixeur'),
(47,	'sac à dos'),
(48,	'casques'),
(49,	'vélo'),
(50,	'planche à roulette'),
(51,	'raquette de tennis'),
(52,	'vases'),
(53,	'guitares'),
(54,	'ventilateur'),
(55,	'rideaux'),
(56,	'jumelles');

DROP TABLE IF EXISTS `sticker_sticker_item`;
CREATE TABLE `sticker_sticker_item` (
  `sticker_id` int(11) NOT NULL,
  `sticker_item_id` int(11) NOT NULL,
  PRIMARY KEY (`sticker_id`,`sticker_item_id`),
  KEY `IDX_35BD04B14D965A4D` (`sticker_id`),
  KEY `IDX_35BD04B17CF0B873` (`sticker_item_id`),
  CONSTRAINT `FK_35BD04B14D965A4D` FOREIGN KEY (`sticker_id`) REFERENCES `sticker` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_35BD04B17CF0B873` FOREIGN KEY (`sticker_item_id`) REFERENCES `sticker_item` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sticker_sticker_item` (`sticker_id`, `sticker_item_id`) VALUES
(4,	21),
(6,	25),
(8,	3),
(9,	16),
(10,	20),
(11,	15),
(13,	11),
(14,	16),
(19,	6),
(20,	11),
(21,	24),
(22,	4),
(23,	7),
(24,	10),
(25,	11);

DROP TABLE IF EXISTS `todolist`;
CREATE TABLE `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `make_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `listing` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_DD4DF6DBCFBF73EB` (`make_id`),
  CONSTRAINT `FK_DD4DF6DBCFBF73EB` FOREIGN KEY (`make_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `todolist` (`id`, `make_id`, `name`, `listing`) VALUES
(26,	17,	'Demdemdéo',	'Manger des frites'),
(27,	17,	'Demdemdéo',	'Se laver les mains'),
(28,	17,	'Demdemdéo',	'Faire les cartons'),
(29,	17,	'Demdemdéo',	'Appeler les voisins'),
(30,	13,	'DemAoût',	'Appeler les copains'),
(31,	13,	'DemAoût',	'Démarrer le barbecue'),
(32,	13,	'DemAoût',	'Faire la surprise qu\'ils sont en fait là pour porter les meubles'),
(33,	13,	'DemAoût',	'Se faire d\'autres amis');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `username`, `roles`, `password`, `email`) VALUES
(1,	'admin',	'[\"ROLE_ADMIN\"]',	'$2y$13$G9e/G8Uj5ulyjIhjpgH89e8Ly4gVGqB5CJJPMpZTQ4KCB7sxW7exG',	'admin@admin.com'),
(2,	'user',	'[\"ROLE_USER\"]',	'$2y$13$ODCQMuHDk52ESeCTcUPqHeYLKmtMhnmgDlPUbKIhY36j6/MEqYhlq',	'user@user.com'),
(3,	'Alex',	'[\"ROLE_USER\"]',	'$2y$13$1bMFj/JPFOA4YaVk0vfy8e6LvSGJodLc23Lyi5E2pXguUNcPEhJrO',	'cousin.nathalie@live.com'),
(4,	'Benjamin',	'[\"ROLE_USER\"]',	'$2y$13$E2spcvgEChpcwMWod.g.Ne86Jgzbz6RGYpbSMJzUly4Z7oOOEExci',	'catherine69@free.fr'),
(5,	'Henri',	'[\"ROLE_USER\"]',	'$2y$13$aINLVFl.PEXjXJHmFW7SyuHeiNLLtAxHiY8BX6LLVgYDgNuxZtt7u',	'anne.launay@bouygtel.fr'),
(6,	'Emmanuel',	'[\"ROLE_USER\"]',	'$2y$13$a.tZOKl4g8rKtXcDs9mV1OCOQaEdE8dBVy22XbSFoZlELPWl3kV0C',	'william.martel@sfr.fr'),
(7,	'Clémence',	'[\"ROLE_USER\"]',	'$2y$13$HwmnyWaDXZhoFnNnRoQPbOxSLZZSEtmKidlDEwOrZ2qOemrfN0Eem',	'alfred27@live.com'),
(8,	'Roger',	'[\"ROLE_USER\"]',	'$2y$13$SkRgYNulr/AT0cXxTIareOLWETr2AFzHqX7IUwZG8Dcfjm3wHs/KO',	'yves.arnaud@laposte.net'),
(9,	'Susanne',	'[\"ROLE_USER\"]',	'$2y$13$aN.IfnELN/0Ph62rrKxWM.rZiRj1SeHDo5G6mDUiHVhXrtV0LGIyq',	'gerard43@free.fr'),
(10,	'Victoire',	'[\"ROLE_USER\"]',	'$2y$13$7BU5sP5gKWVKzCJ8fe3HKuySOXinfePglPgcQT7YfNp3v6.AIQDaO',	'tledoux@voila.fr'),
(11,	'David',	'[\"ROLE_USER\"]',	'$2y$13$X1GgRyphtOzRbtsOQ2s9NubB/YQnm3KwsXgLv.ISe12pLIyQpiDhm',	'aimee.louis@tiscali.fr'),
(12,	'Marc',	'[\"ROLE_USER\"]',	'$2y$13$N82W1PdvTxq4/fyyxrrO5edx.2uKORzYhBpm85FKbHKyAqHsZWtKe',	'gautier.suzanne@hotmail.fr'),
(13,	'Alain',	'[\"ROLE_USER\"]',	'$2y$13$IzJiakbHDqFokqR5jB/y3OqXWPBbs/jNWFLji5M.dibFEDT69EouW',	'aime58@charrier.fr'),
(14,	'Simone',	'[\"ROLE_USER\"]',	'$2y$13$Z3OAQZGKYhC/oB0Dr3hbJexypSpm3.jKtSxDiyMKYx/6AZxHIlr0i',	'celina.hubert@yahoo.fr'),
(15,	'Joseph',	'[\"ROLE_USER\"]',	'$2y$13$ps62FRUnCFLxy4b6HU9Lo.xY4qZW02X1K1zuxoEDMn15qfJuInNJ.',	'zoe.valette@jean.com'),
(16,	'Laure',	'[\"ROLE_USER\"]',	'$2y$13$zKIKdmSDjl5APZbWmH9f5eQbp4S5iwLiH62rzDClWBdwUWFcxJVwG',	'remy.foucher@joseph.fr'),
(17,	'Audrey',	'[\"ROLE_USER\"]',	'$2y$13$2e4QM4KHEMVeE5I5BxgrdejcdeO8s9HmX6LHVRb12LDcWTjenx5Vq',	'william.delmas@pages.fr'),
(18,	'Adrien',	'[\"ROLE_USER\"]',	'$2y$13$SHu17PmY3Qk8jgi6HcuHw.OmZOirGIX4B65H2MTD9eCic1IZ82KeS',	'thibault63@rocher.com'),
(19,	'Édouard',	'[\"ROLE_USER\"]',	'$2y$13$wRmhzjPh7ElBCiyzk4AqKeTP9TtCD.feo5R8qjSLjODGwtaq13IjG',	'baron.martin@yahoo.fr'),
(20,	'Henriette',	'[\"ROLE_USER\"]',	'$2y$13$wSIiZ0nH2UzoAC1..thpa.bvvFKySulbIsoYLAIkhZmIKU8Baavcq',	'bigot.arthur@live.com'),
(21,	'Catherine',	'[\"ROLE_USER\"]',	'$2y$13$RD0QL.cofnntAmRaSz8ImOsmr6FETa1Xhfa/vReb/bQeGDIJuk5na',	'aimee65@lopez.com'),
(22,	'Jacqueline',	'[\"ROLE_USER\"]',	'$2y$13$Lk8YLr80/zmvcvJ5kQZ7Iew9C1nK.YK3kVUQPLsWP1QY811KuRlnu',	'denise54@pelletier.net'),
(23,	'Manon',	'[\"ROLE_USER\"]',	'$2y$13$PuCvaazVLSPa1YpmdazkouqrVVIDkVnxQDKNNMczaEIiB1MRQQKMK',	'fdelahaye@dbmail.com'),
(24,	'Gabriel',	'[\"ROLE_USER\"]',	'$2y$13$DCjEYIZ6zxVDi5T9R9N2buENnxg.WD3nlBNpiGVFaqNrHPVRgSOv.',	'suzanne.guibert@sanchez.com'),
(25,	'Adèle',	'[\"ROLE_USER\"]',	'$2y$13$aRm/B7cVfbeh1lMZDi.ple/XTJuR3pSD8jzVG/QG7Ok.E7U0OvwfO',	'knormand@tiscali.fr'),
(26,	'Patrick',	'[\"ROLE_USER\"]',	'$2y$13$xLwdCokELNdYzA./riOBJe2Ot8l7xadHcJ4q/V/Ur/1aOARAcSmxS',	'pantoine@noos.fr'),
(27,	'Thérèse',	'[\"ROLE_USER\"]',	'$2y$13$hA92HHY6YIUWO.8Wpo0vr.1bkMPa/nLACjYrdZuhR/QbYA0.0j4ha',	'lpages@deschamps.org');

-- 2023-07-27 11:29:25