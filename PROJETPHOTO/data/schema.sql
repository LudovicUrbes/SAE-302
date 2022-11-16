drop table users;
drop table questions;

CREATE TABLE users (
	`id` INT NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(20) NOT NULL,
	`password` VARCHAR(250) NOT NULL,
	`role` VARCHAR(20) NOT NULL default "users",
	`score` INT NOT NULL default 0,
	`is_published` INT NOT NULL default 1,
	PRIMARY KEY (`id`),
	UNIQUE (`username`)
) ENGINE=InnoDB;

INSERT INTO `users` (`username`, `password`, `role`, `is_published`) VALUES ("root", "f924f1d0cd508d9a22863d71e5c4172b", "admin", 0);

CREATE TABLE questions (
	`id` INT NOT NULL AUTO_INCREMENT,
	`question` TEXT NOT NULL,
	`reponse` VARCHAR(250) NOT NULL,
	`detail` TEXT NOT NULL,
	`prop1` VARCHAR(250) NOT NULL,
	`prop2` VARCHAR(250) NOT NULL,
	`prop3` VARCHAR(250) NOT NULL,
	`prop4` VARCHAR(250) NOT NULL,
	`reward` INT NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("1", "Quel terme désigne un réseau qui offre un accès sécurisé à des bureaux 
d'entreprise pour les fournisseurs, les clients et les collaborateurs ?", "extranet", "Le terme Internet désigne l'ensemble des réseaux connectés dans le monde. Un intranet 
est une connexion privée à des LAN et à des WAN appartenant à une entreprise. Il offre un accès aux membres de l'entreprise, à ses employés ou à d'autres personnes sous 
réserve d'une autorisation. Les extranets offrent un accès sûr et sécurisé aux fournisseurs, aux clients et aux collaborateurs. L'extendednet n'est pas un type de réseau. ",
"Internet", "extranet", "intranet", "extended net", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward` ) VALUES ("2", "Quelle interface est la SVI par défaut d'un commutateur Cisco?", "VLAN1", 
"Les commutateurs de couche 2 utilisent des interfaces virtuelles de commutation (SVIS) pour fournir un moyen d'accès à distance sur IP. Le SVI par défaut sur un commutateur Cisco est VLAN1.",
"VLAN1", "VLAN99", "VLAN100", "VLAN999", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("3", "Quel emplacement de mémoire sur un routeur ou un commutateur 
Cisco perdra tout le contenu lorsque l'appareil est redémarré ?", "Dans la mémoire RAM", "Le fichier de configuration de démarrage d'un routeur ou d'un commutateur Cisco est stocké dans NVRAM, 
qui est de la mémoire non volatile.", "Dans la mémoire RAM", "Mémoire ROM", "Dans la mémoire NVRAM", "Dans la mémoire FLASH", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("4", "Quel est l'un des outils de sécurité les plus efficaces pour protéger 
les utilisateurs contre les menaces externes?", "Le pare feu", "Un pare-feu est l'un des outils de sécurité les plus efficaces pour protéger les utilisateurs internes du réseau contre les menaces 
venant de l'extérieur. Un pare-feu se trouve entre deux réseaux, ou plus, contrôle le trafic entre eux et contribue à éviter les accès non autorisés. Un système de prévention des intrusions peut 
contribuer à empêcher l'infiltration d'intrus et doit être utilisé sur tous les systèmes", "Les serveurs de correctifs", "Le routeur sur lequel les services AAA sont actifs", "Les techniques de chiffrement par mot de passe", 
"Le pare feu", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("5", "Quelle attaque de code malveillant est autonome et tente d'exploiter 
une vulnérabilité spécifique dans un système attaqué ?", "Un ver", "Un ver est un programme informatique qui est auto-répliqué dans l'intention d'attaquer un système et d'essayer d'exploiter une 
vulnérabilité spécifique dans la cible. Les virus et les chevaux de Troie comptent sur un mécanisme de distribution pour les transporter d'un hôte à l'autre. L'ingénierie sociale n'est pas un type 
d'attaque de code malveillant.", "Un virus", "Un ver", "De l'ingénierie sociale", "Le cheval de Troie", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("6", "Que signifie le terme vulnérabilité ?", "Une faiblesse qui rend une cible 
susceptible aux attaques", "Le terme vulnérabilité ne signifie pas que le réseau est menacé, mais qu'il est affaibli et qu'un ordinateur ou un logiciel pourrait être la cible d'attaques", "Une faiblesse qui rend une cible susceptible aux attaques", 
"Une cible connue ou l'ordinateur de la victime", "Une méthode d'attaque pour exploiter une cible", "Une menace potentielle créée par un hacker", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("7", "Un administrateur réseau établit une connexion à un commutateur via SSH. 
Quelle caractéristique décrit de manière unique la connexion SSH ?", "Accès à distance à un commutateur où les données sont chiffrées pendant la session", "SSH fournit une connexion à distance 
sécurisée via une interface virtuelle. SSH fournit une authentification par mot de passe plus forte que Telnet. SSH crypte également les données pendant la session.", "Accès direct au commutateur grâce à l'utilisation d'un programme d'émulation de terminal", 
"Accès hors bande à un commutateur via l'utilisation d'un terminal virtuel avec authentification par mot de passe", "Accès à distance à un commutateur où les données sont chiffrées pendant la session", 
"Accès sur site à un commutateur grâce à l'utilisation d'un PC directement connecté et d'un câble de console", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("8", "Quel mécanisme TCP est utilisé pour empêcher l'encombrement des réseaux ?",
 "Une fenêtre glissante", "CP utilise des fenêtres pour tenter de gérer le débit de transmission au maximum que le réseau et le dispositif de destination peuvent supporter tout en minimisant les pertes 
 et les retransmissions. Si elle est saturée de données, la destination peut envoyer une demande pour réduire la taille de fenêtre. Le glissement de fenêtre est le mécanisme utilisé pour empêcher l'encombrement 
 des réseaux.", "Un échange en deux étapes", "Une fenêtre glissante", "Une connexion en trois étapes", "Une paire d'interfaces de connexion", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("9", "Quel nombre ou ensemble de nombres représente une socket?", "192.168.1.1:80", 
"Une socket est défini par la combinaison d'une adresse IP et d'un numéro de port, et identifie de manière unique une communication particulière.", "10.1.1.15", "192.168.1.1:80", "01-23-45-67-89-AB", "21", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("10", "À quel type d'application le protocole UDP est-il le mieux adapté ?",
 "Les applications sensibles au temps de propagation", "UDP n'est pas un protocole orienté connexion et ne fournit pas de mécanismes de retransmission, de séquencement ou de contrôle de flux. 
 Il offre les fonctions de base de la couche transport avec beaucoup moins de surcharge que le protocole TCP. Grâce à sa faible surcharge, le protocole UDP est mieux adapté aux applications sensibles 
 au temps de propagation.", "Les applications sensibles au temps de propagation", "Les applications qui sont sensibles à la perte de paquets", "Les applications qui nécessitent la retransmission de segments perdus",
  "Les applications qui nécessitent une livraison fiable", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("11", "Quelle est une fonction de la commande tracert qui diffère de la commande 
ping lorsqu'elles sont utilisées sur un poste de travail ?", "La commande tracert affiche les informations des routeurs dans le chemin d'accès", "La commande tracert envoie trois pings à chaque saut 
(routeur) dans le chemin vers la destination et affiche le nom de domaine et l'adresse IP des sauts à partir de leurs réponses. Parce qu'elle tracert utilise la commande ping , le temps de déplacement 
est le même qu'une ping commande autonome. La fonction principale d'une commande ping autonome est de tester la connectivité entre deux hôtes.", "La commande tracert affiche les informations des routeurs dans le chemin d'accès",
 "La commande tracert atteint la destination plus rapidement", "La commande tracert envoie un message ICMP à chaque saut dans le chemin", "La commande tracert est utilisé pour vérifier la connectivité entre deux périphériques", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("12", "Quel utilitaire utilise le protocole ICMP ?", "Un ping", "ICMP est utilisé 
par les périphériquea réseau pour envoyer des messages d'erreur.", "DNS", "RIP", "Un ping", "Le Protocole NTP", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("13", "Quel contenu de champ est utilisé par ICMPv6 pour déterminer qu'un paquet a expiré?",
 "Champ Limite de saut", "ICMPv6 envoie un message de délai dépassé si le routeur ne peut pas transmettre un paquet IPv6 parce que le paquet a expiré. Le routeur utilise un champ de limite de saut pour déterminer 
 si le paquet a expiré, et ne dispose pas d'un champ TTL.", "Champ Limite de saut", "Champ Délai dépassé", "Champ CRC", "Champ TTL", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("14", "À quoi sert le masque de sous-réseau lorsqu'il est conjugué à une adresse IP ?",
 "A déterminer le sous-réseau auquel l'hôte appartient", "Avec l'adresse IPv4 , un masque de sous-réseau est également nécessaire. Un masque de sous-réseau est un type spécial d'adresse IPv4 qui, conjugué à 
 l'adresse IP, détermine à quel sous-réseau le terminal appartient.", "A identifier de manière unique un hôte sur le réseau", "A masquer l'adresse IP pour ceux situés en dehors du réseau", "A déterminer le 
 sous-réseau auquel l'hôte ppartient", "A determiner si l'adresse est publique ou privé", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("15", "Quelle est la notation de longueur du préfixe pour le masque de sous-réseau 255.255.255.224 ?",
 "/27", "Le format binaire pour 255.255.255.224 est 11111111.1111111111.111111.111111.11100000. La longueur du préfixe est le nombre de bits mis à 1 dans le masque de sous-réseau. Par conséquent, la longueur du préfixe est /27.",
  "/28", "/26", "/25", "/27", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("16", "Lorsqu'un routeur reçoit un paquet, quelles informations vérifie-t-il afin de transmettre le paquet à une 
destination distante ?", "Adresse IP de destination", " Lorsqu'un routeur reçoit un paquet, il examine l'adresse de destination du paquet et utilise la table de routage pour rechercher le meilleur chemin vers ce réseau.", "Adresse IP de destination",
 "Adresse IP source", "Adresse MAC de destination", "Adresse MAC d'origine", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("17", "Quel champ dans un paquet IPv6 est utilisé par le routeur pour déterminer si un paquet
 a expiré et doit être supprimé ?", "Limite de nombre de tronçons", "ICMPv6, comme IPv4, envoie un message de dépassement de temps si le routeur ne peut pas transférer un paquet IPv6 parce que le paquet a expiré. 
 Cependant, le paquet IPv6 n'a pas de champ TTL. Il utilise plutôt le champ Hop Limit pour déterminer si le paquet a expiré.", "Limite de nombre de tronçons", "Adresse inaccessible", "Pour faciliter la lecture d'une adresse de 32 bits",
  "Aucun itinéraire vers la destination", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("18", "Quelles informations sont ajoutées lors de l’encapsulation se produisant au niveau de la couche 3 du modèle OSI ?",
 "Les adresses IP de la source et de la destination", "L'IP est un protocole de couche 3. Les périphériques de la couche 3 peuvent ouvrir l'en-tête de la couche 3 pour l'inspecter et identifier les informations d'adressage IP, notamment les 
 adresses IP source et de destination.", "Le protocole application de la source et de la destination", "Les adresses MAC de la source et de la destination", "Le numéro de port de la source et de la destination", "Les adresses IP de la source 
 et de la destination", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("19", "Lors d'une inspection de routine, un technicien a découvert que le logiciel installé sur un ordinateur recueillait 
secrètement des données sur les sites Web visités par les utilisateurs de l'ordinateur. Quel type de menace affecte cet ordinateur?", "Un logiciel espion", "Les logiciels espions sont des logiciels installés sur un périphérique réseau et qui 
collectent des informations.", "Attaque zéro jour", "Attaque par déni de service (DoS)", "Usurpation d'identité", "Un logiciel espion", 10);

INSERT INTO `questions` (`id`, `question`, `reponse`, `detail`, `prop1`, `prop2`, `prop3`, `prop4`, `reward`) VALUES ("20", "Un employé souhaite accéder au réseau de l'entreprise à distance et de manière la plus sécurisée possible. 
Quelle caractéristique du réseau lui permettrait d'avoir un accès distant et sécurisé au réseau de l'entreprise ?", "VPN", "Les réseaux privés virtuels (VPN) sont utilisés pour fournir un accès sécurisé aux travailleurs à distance.",
 "ACL", "VPN", "BYOD", "IPS", 10);