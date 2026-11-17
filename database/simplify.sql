CREATE DATABASE IF NOT EXISTS simplify DEFAULT CHARACTER SET utf8mb4;
USE simplify;

CREATE TABLE usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(100),
	email VARCHAR(100),
	senha VARCHAR(255),
	perfil VARCHAR(20)
);

CREATE TABLE produtos (
	id INT AUTO_INCREMENT PRIMARY KEY,
	codigo VARCHAR(20),
	nome VARCHAR(100),
	categoria VARCHAR(50),
	preco DECIMAL(10,2),
	estoque INT
);

CREATE TABLE vendas (
	id INT AUTO_INCREMENT PRIMARY KEY,
	produto_id INT,
	usuario_id INT,
	quantidade INT,
	valor_total DECIMAL(10,2),
	data_venda DATETIME DEFAULT CURRENT_TIMESTAMP,
	FOREIGN KEY (produto_id) REFERENCES produtos(id),
	FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);

INSERT INTO usuarios (nome, email, senha, perfil) VALUES
('Marcos da Silva', 'marcos@simplify.com', '$2y$10$28v6ii2H.ugRxYGl2c3iD.Pz2PQqKk87gAjlv4RiyTmXH/4WMU1pG', 'gestor'),
('Juliana de Souza', 'juliana@simplify.com', '$2y$10$28v6ii2H.ugRxYGl2c3iD.Pz2PQqKk87gAjlv4RiyTmXH/4WMU1pG', 'vendedor');

INSERT INTO produtos (codigo, nome, categoria, preco, estoque) VALUES
('001', 'Camiseta Basica Branca', 'Roupas', 39.90, 25),
('002', 'Calca Jeans Masculina', 'Roupas', 129.90, 10),
('003', 'Tenis Esportivo', 'Calcados', 199.90, 4),
('004', 'Bone Preto', 'Acessorios', 49.90, 15),
('005', 'Meia Kit 3 pares', 'Acessorios', 24.90, 3),
('006', 'Jaqueta Corta Vento', 'Roupas', 159.90, 7);