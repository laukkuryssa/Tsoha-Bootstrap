-- Lisää CREATE TABLE lauseet tähän tiedostoon



CREATE TABLE Opiskelija(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  opiskelijanumero INTEGER NOT NULL,
  email varchar(100) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(50) NOT NULL
);

CREATE TABLE Yllapito(
  username varchar(50) NOT NULL,
  password varchar(50) NOT NULL
);

CREATE TABLE Kurssi(
  id SERIAL PRIMARY KEY,
  name varchar(50) NOT NULL,
  luennoitsija varchar(50),
  opintopisteet INTEGER NOT NULL,
  luentoajat varchar(150),
  esitiedot varchar(400),
  kuvaus varchar(400),
  harjoitusryhmat varchar(500),
  alkamisajankohta DATE,
  loppumisajankohta DATE,
  ilmoalkaa DATE,
  ilmoloppuu DATE,
);

CREATE TABLE Ilmoittautuminen(
  id SERIAL PRIMARY KEY,
  opiskelija_id INTEGER REFERENCES Opiskelija(id),
  kurssi_id INTEGER REFERENCES Kurssi(id),
  maksettu boolean DEFAULT FALSE
);
