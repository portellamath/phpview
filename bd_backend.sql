CREATE DATABASE bd_backend3;
USE bd_backend3;

DELIMITER $$
CREATE PROCEDURE salvar_categoria (
    IN var_id INT,
    IN var_nome VARCHAR(100),
    IN var_info TEXT
)
BEGIN

END$$
DELIMITER ;

CREATE TABLE cliente(
    var_id INT PRIMARY KEY, 
    var_nome VARCHAR(100),    
    var_email VARCHAR(255) NOT NULL
);

DELIMITER $$
CREATE PROCEDURE salvar_cliente (
    IN var_id INT,
    IN var_nome VARCHAR(100),
    IN var_email VARCHAR(255)
)
BEGIN

END$$
DELIMITER ;

CREATE TABLE fornecedor(
    var_id INT PRIMARY KEY,    
    var_nome VARCHAR(100),    
    var_cidade VARCHAR(50) NOT NULL
);

DELIMITER $$
CREATE PROCEDURE salvar_fornecedor (
    IN var_id INT,
    IN var_nome VARCHAR(100),
    IN var_cidade VARCHAR(50)
)
BEGIN

END$$
DELIMITER ;


CALL salvar_categoria(1, 'Eletrônicos', 'Celular, Notebook e mouse');
CALL salvar_cliente(1, 'Gabriel coelho', 'gaybriel.coelho@email.com');
CALL salvar_fornecedor(1, 'Samsung', 'São Paulo');