CREATE TABLE vinyle (
  id INTEGER,
  titre STRING,
  auteur STRING,
  url STRING,
  description STRING,
  prix FLOAT,
  genre STRING
);

CREATE TABLE membres (
  id STRING,
  name STRING,
  prenom STRING,
  email STRING,
  newsletters INTEGER,
  password STRING,
  mail_verif INTEGER
);

CREATE TABLE contact (
  id STRING,
  idmembre STRING,
  typeQuestion STRING,
  message STRING,
  datemessage STRING,
  reponse STRING,
  datereponse STRING
);
<<<<<<< HEAD

CREATE TABLE magasin (
  id INTEGER,
  pays STRING,
  ville STRING,
  codePostal STRING,
  adresse STRING,
  url STRING,
  description STRING
)
=======
>>>>>>> e930f3f6b08c51503c35f0f4699fa0505174afec
