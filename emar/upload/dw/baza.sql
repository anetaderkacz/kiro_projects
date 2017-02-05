# Struktura bazy danych
#--------------------------------------------------------

#
# Tworzenie tabeli pliki
#

CREATE TABLE pliki (
  id int(11) NOT NULL default '0' auto_increment,
  nazwa varchar(255) NOT NULL,
  url varchar(255) NOT NULL,
  opis varchar(255) NOT NULL,
  ilosc_pobran integer default '0',
  wielkosc integer default '0',
  data_dodania date default '0000-00-00' NOT NULL,
  kategoria integer NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE id (id)
);

#
# Tworzenie tabeli kategorie
#

CREATE TABLE kategorie (
  id int(11) NOT NULL default '0' auto_increment,
  nazwa varchar(255) NOT NULL,
  opis varchar(255) NOT NULL,
  PRIMARY KEY  (id),
  UNIQUE id (id)
);
