CREATE DATABASE cadastro_aumigos;

use cadastro_aumigos;

CREATE TABLE clientes(
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(100) NOT NULL,
    email_cliente VARCHAR(100) NOT NULL,
    numero_clientes INT NOT NULL
);

CREATE TABLE animais(
    id_animais INT PRIMARY KEY AUTO_INCREMENT,
    nome_animal VARCHAR(100) NOT NULL,
    raca_animal VARCHAR(100) NOT NULL,
    idade_animal INT NOT NULL,
    id_clientes INT NOT NULL,
    FOREIGN KEY (id_clientes) REFERENCES clientes(id)
);



