-- Geração de Modelo físico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE produto (
cod INTEGER PRIMARY KEY,
nome VARCHAR(100),
descricao VARCHAR(200),
preco DOUBLE,
imagem VARCHAR(100),
principal BOOLEAN
)

CREATE TABLE usuario (
cod INTEGER PRIMARY KEY,
tipo VARCHAR(100),
email VARCHAR(100),
senha VARCHAR(50)
)

CREATE TABLE configuracoes (
cod INTEGER PRIMARY KEY,
titulo VARCHAR(100),
nome VARCHAR(100),
slide1 VARCHAR(100),
slide2 VARCHAR(100),
frase1 VARCHAR(200),
frase2 VARCHAR(200),
subf1 VARCHAR(200),
subf2 VARCHAR(200),
bt1 VARCHAR(50),
bt2 VARCHAR(50),
local VARCHAR(50),
tel VARCHAR(100),
email VARCHAR(100)
)

CREATE TABLE categoria (
cod INTEGER PRIMARY KEY,
nome VARCHAR(100),
imagem VARCHAR(100),
descricao VARCHAR(200)
)

CREATE TABLE produto_categoria (
cod_cat INTEGER,
cod_prod INTEGER,
cod integer PRIMARY KEY,
FOREIGN KEY(cod_cat) REFERENCES categoria (cod),
FOREIGN KEY(cod_prod) REFERENCES produto (cod)
)

