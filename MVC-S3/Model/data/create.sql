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
  message STRING,
  messagereponse STRING,
  datemessage STRING,
  datereponse STRING
);
