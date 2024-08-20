
CREATE DATABASE loja;
USE loja;


CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_email VARCHAR(255) UNIQUE NOT NULL,
    role ENUM('comprador', 'fornecedor') DEFAULT 'comprador',
    password_hash VARCHAR(255) NOT NULL
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    imagem varchar(255) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL,
    estoque INT NOT NULL
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NULL,
    total_value DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);


INSERT INTO produtos (id, imagem, nome, preco, estoque) VALUES
('1','https://images.tcdn.com.br/img/img_prod/1044362/camisa_nba_los_angeles_lakers_nike_black_mamba_edition_jersey_lebron_james_23_967_1_eaed1045ddc1ebe73f75b0b0788d465c.png','Basketball Deluxe Premium', 79.99, 100),
('2','','Moletom Deluxe Premium', 79.99, 100),
('3','','Nike Boy Deluxe Premium', 79.99, 100),
('4','','Boné L. James Deluxe Premium', 79.99, 100);


INSERT INTO users (user_email, role, password_hash) VALUES ('guest@example.com', 'comprador', '');



SELECT * FROM produtos;



 DROP DATABASE loja;
