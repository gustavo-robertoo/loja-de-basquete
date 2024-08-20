CREATE DATABASE ggr_basketball;

USE ggr_basketball;

CREATE TABLE items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome varchar(255) NOT NULL,
    nova_categoria VARCHAR(80),
    tipo enum('Moletom', 'Camiseta', 'Bola', 'Boné') NOT NULL,
    valor VARCHAR(255) NOT NULL,	
    imagem VARCHAR(255) NOT NULL,
    descricao TEXT NOT NULL,
    data_adicao DATE NOT NULL
);
CREATE TABLE categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL UNIQUE
);


drop table items;
select * from items;
select * from categorias;

	