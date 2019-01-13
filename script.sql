create table Formation(
    id_formation Integer  NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nom_formation varchar(40),
    Categorie varchar(40),
    domaine varchar(40),
    wilaya varchar(40),
    commune varchar(40),
    adresse varchar(40),
    téléphones varchar(60)
);
create table user(
    id_user Integer  NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username varchar(40),
    password varchar(40)
);
create table comments(
    id_comment Integer  NOT NULL PRIMARY KEY AUTO_INCREMENT,
    id_user Integer  NOT NULL,
    comment varchar(340),
    FOREIGN KEY (id_user) REFERENCES user (id_user) ON DELETE CASCADE
);
INSERT INTO user(username,password) values ("root","123")
INSERT INTO comments(id_user,comment) values (1,"Ce site web est parfait")
INSERT INTO comments(id_user,comment) values (1,"Ce site web est parfait pour une deuxième fois")
INSERT INTO comments(id_user,comment) values (1,"Ce site web est parfait pour une trosième fois")

INSERT INTO Formation (nom_formation,Categorie,domaine,wilaya,commune,adresse,téléphones)  VALUES ("Ecole Supérieure de Commerce","universitaires","Commerce et finance","Oran","Es-Senia","50 Rue des martyrs","031 56 25 70/031 56 30 50");
INSERT INTO Formation (nom_formation,Categorie,domaine,wilaya,commune,adresse,téléphones)  VALUES ("Ecole Supérieure d’Electronique","universitaires","Electronique","Boumerdes","Boumerdes-centre"," 3500 Rue de la liberté","035 56 25 70/035 56 25 70");

INSERT INTO Formation (nom_formation,Categorie,domaine,wilaya,commune,adresse,téléphones)  VALUES ("Institue d’hôtellerie et restauration","professionnelles",
"Hôtellerie","Tizi-Ouzou.","Es-Senia","0 Rue des martyrs.","021 56 25 70/021 56 30 50 / 56 51 54");
INSERT INTO Formation (nom_formation,Categorie,wilaya,commune,adresse,téléphones)  VALUES ("Ecole El-Falah","secondaires","Mostaganem",
"Mansoura","50 Rue de la liberté.","021 56 25 70/021 56 30 50 / 56 51 54");

INSERT INTO Formation (nom_formation,Categorie,wilaya,commune,adresse,téléphones)  VALUES ("Ecole Madrassati","moyennes"
"Alger","Hussein-Dey","50 Rue de la gare.","021 56 25 70/021 56 30 50 / 56 51 54");


INSERT INTO Formation (nom_formation,Categorie,wilaya,commune,adresse,téléphones)  VALUES ("
Ecole El-Nadjihine","primaires","Bouira","Lakhdaria","50 Rue des dunes","021 56 25 70/021 56 30 50 / 56 51 54");


INSERT INTO Formation (nom_formation,Categorie,wilaya,commune,adresse,téléphones)  VALUES ("Ecole Les Poussins",
"maternelles","Alger.","Dar-El-Beida","50 Rue de la liberté","021 56 25 70/021 56 30 50 / 56 51 54");
