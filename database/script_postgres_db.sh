#!/bin/bash

set -e

psql -v ON_ERROR_STOP=1 --username "$POSTGRES_USER" --dbname "$POSTGRES_DB" <<-EOSQL
    CREATE TABLE famosos (
        codigo integer,
        nome varchar(40)
    );
    CREATE TABLE estado (
        id INTEGER PRIMARY KEY NOT NULL,
        sigla char(2),
        nome TEXT
    );
    CREATE TABLE cidade (
        id INTEGER PRIMARY KEY NOT NULL,
        nome text,
        id_estado INTEGER REFERENCES estado (id)
    );
    CREATE TABLE pessoa (
        id INTEGER PRIMARY KEY NOT NULL,
        nome text,
        endereco text,
        bairro text,
        telefone text,
        email text,
        id_cidade integer references cidade(id)
    );
    INSERT INTO estado VALUES (2, 'GO', 'Goias');
    INSERT INTO cidade VALUES (2, 'Goiania', 2);
    INSERT INTO estado VALUES (1, 'AC', 'Acre');
    INSERT INTO cidade VALUES (1, 'Rio Branco', 1);
EOSQL
