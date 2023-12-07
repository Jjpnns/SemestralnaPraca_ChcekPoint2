CREATE TABLE produkt (
                         id_pr integer NOT NULL,
                         nazov_pr nvarchar(255) NOT NULL,
                         cena decimal NOT NULL,
                         dos_mnozstvo integer,
                         id_kategorie integer NOT NULL,
                         primary key(id_pr));


CREATE TABLE kategoria (
                           id_kategorie integer NOT NULL,
                           nazov nvarchar(255) NOT NULL,
                           popis text,
                           primary key(id_kategorie));


CREATE TABLE zakaznik (
                          id_zak integer NOT NULL ,
                          meno nvarchar(255) NOT NULL,
                          priezvisko nvarchar(255)NOT NULL,
                          email nvarchar(255) NOT NULL,
                          tel_cislo nvarchar(25) NOT NULL,
                          adresa nvarchar(255) NOT NULL,
                          jeAdmin booelan,
                          primary key(id_zak));


CREATE TABLE historia_objed (
                                id_historia integer not null,
                                id_zak integer not null,
                                obsah text,
                                datum date,
                                primary key(id_historia,id_zak));


CREATE TABLE recenzie (
                          id_rec integer not null,
                          id_zak integer not null,
                          id_pr integer not null,
                          recenzia text,
                          datum date,
                          hodnotenie integer,
                          primary key(id_rec,id_zak,id_pr));


CREATE TABLE objednavky (
                            id_objednavky integer,
                            id_zak integer,
                            datum date,
                            stav nvarchar(255),
                            sposob_platby nvarchar(255),
                            primary key(id_objednavky, id_zak));

/


ALTER TABLE produkt ADD FOREIGN KEY (id_pr) REFERENCES kategoria (id_kategorie)
    /

ALTER TABLE recenzie ADD FOREIGN KEY (id_rec) REFERENCES zakaznik (id_zak)
    /

ALTER TABLE objednavky ADD FOREIGN KEY (id_objednavky) REFERENCES zakaznik (id_zak)
    /

ALTER TABLE historia_objed ADD FOREIGN KEY (id_historia) REFERENCES [zakaznik] ([id_zak])
    /

ALTER TABLE recenzie ADD FOREIGN KEY (id_rec) REFERENCES [produkt] ([id_pr])
    /
