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

CREATE TABLE newsletters (
  id STRING,
  email STRING
);
