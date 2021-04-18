create database Ctr1;
use Ctr1;
create table Fournisseur
(
  Idf int primary key NOT NULL AUTO_INCREMENT,
  Nomf varchar(50),
  Tel varchar(50),
  Email varchar(50)
);

create table Commande
(
    IdCmd int primary key NOT NULL AUTO_INCREMENT,
    Idffk int,
    DateC date
);
alter table Commande add foreign key (Idffk) references Fournisseur(Idf);

create table Produits
(
    IdP int primary key NOT NULL AUTO_INCREMENT,
    Designation varchar(50),
    Qte int,
    PrixUnit float,
    Imagee varchar(50)
);

create table DetailCmd
(
    IdDC int NOT NULL AUTO_INCREMENT,
    IdCmdfk int,
    IdPfk int,
    QteCommande int,
    PrixCommande float,
    primary key(IdDC,IdCmdfk,IdPfk)
);
alter table DetailCmd add foreign key (IdCmdfk) references Commande(IdCmd);
alter table DetailCmd add foreign key (IdPfk) references Produits(IdP);

create table Livraison
(
    IdL int primary key NOT NULL AUTO_INCREMENT,
    IdCmdfk int,
    DateL date
);
alter table Livraison add foreign key (IdCmdfk) references Commande(IdCmd);

create table DetailLiv
(
    IdDL int NOT NULL AUTO_INCREMENT,
    IdLfk int,
    IdDCfk int,
    IdPfk int,
    QteLiv int,
    prix float,
    primary key(IdDL,IdLfk,IdDCfk)
);
alter table DetailLiv add foreign key (IdLfk) references Livraison(IdL);
alter table DetailLiv add foreign key (IdDCfk) references DetailCmd(IdDC);

drop table DetailLiv;drop table DetailCmd;
















