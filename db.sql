-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema loja
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema loja
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `loja` DEFAULT CHARACTER SET utf8 ;
USE `loja` ;

-- -----------------------------------------------------
-- Table `loja`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`cliente` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `CPF` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `status` INT NOT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE INDEX `CPF_UNIQUE` (`CPF` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`categoria` (
  `id_cat` INT NOT NULL AUTO_INCREMENT,
  `nome_cat` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_cat`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`fornecedor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`fornecedor` (
  `id_forn` INT NOT NULL AUTO_INCREMENT,
  `CNPJ` VARCHAR(18) NOT NULL,
  `razao_social` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `status` CHAR(1) NOT NULL,
  PRIMARY KEY (`id_forn`),
  UNIQUE INDEX `CNPJ_UNIQUE` (`CNPJ` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`produtos` (
  `id_produto` INT(6) ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `quantidade` INT NOT NULL,
  `unidade` VARCHAR(5) NOT NULL,
  `preco` DECIMAL(6,2) NOT NULL,
  `categoria_id_cat` INT NOT NULL,
  `data_criacao` DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  `status` INT NOT NULL,
  `fornecedor_id_forn` INT NULL,
  PRIMARY KEY (`id_produto`),
  INDEX `fk_produtos_categoria1_idx` (`categoria_id_cat` ASC),
  INDEX `fk_produtos_fornecedor1_idx` (`fornecedor_id_forn` ASC),
  CONSTRAINT `fk_produtos_categoria1`
    FOREIGN KEY (`categoria_id_cat`)
    REFERENCES `loja`.`categoria` (`id_cat`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_produtos_fornecedor1`
    FOREIGN KEY (`fornecedor_id_forn`)
    REFERENCES `loja`.`fornecedor` (`id_forn`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `loja`.`funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `loja`.`funcionario` (
  `id_func` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `sexo` CHAR(1) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `telefone` VARCHAR(11) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `user` VARCHAR(50) NOT NULL,
  `senha` VARCHAR(20) NOT NULL,
  `status` INT NOT NULL,
  `adm` INT NOT NULL,
  PRIMARY KEY (`id_func`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `user_UNIQUE` (`user` ASC))
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;


INSERT INTO loja.fornecedor (CNPJ, razao_social, email, telefone, endereco, status) VALUES
('', 'N/A', '', '', '', 1),
('98765432101234', 'Verde&Fresco Distribuidora', 'verdeefresco@gmail.com', '81987654321', 'Rua das Acácias, 123 - Boa Vista, Recife', 1),
('65432109801234', 'SaborArte Alimentos', 'saborarte@gmail.com', '81654321098', 'Av dos Coqueiros, 456 - Piedade, Jaboatão dos Guararapes', 1),
('11111111111111', 'Mundo dos Sabores Importadora', 'mundodosabores@gmail.com', '81898765432', 'Mangueiras, 789 - Olinda', 0),
('22222222222222', 'Origens Naturais Co.', 'origensnaturais@gmail.com', '81765432109', 'Alameda das Palmeiras, 101 - Centro, Caruaru', 0),
('33333333333333', 'Delícias da Terra Exportadora', 'deliciasdaterra@gmail.com', '81901234567', 'Praça das Rosas, 202 - Madalena, Recife', 1),
('44333333333333', 'Eletrônicos PE', 'eletronicospe@gmail.com', '81876543210', 'Rua das Flores, 321 - Candeias, Jaboatão dos Guararapes', 1),
('55555555555555', 'Qualidade e Sabor Distribuidora', 'qualidadesabor@gmail.com', '81987654321', 'Avenida Principal, 567 - Boa Viagem, Recife', 1),
('66666666666666', 'Sabores Regionais Ltda.', 'saboresregionais@gmail.com', '81654321098', 'Rua das Mangueiras, 890 - Piedade, Jaboatão dos Guararapes', 1),
('77777777777777', 'Bem Estar Alimentos', 'bemestar@gmail.com', '81898765432', 'Avenida Central, 345 - Olinda', 0),
('88888888888888', 'Naturais do Sertão', 'naturaisdosertao@gmail.com', '81765432109', 'Rua das Serras, 202 - Centro, Caruaru', 0),
('99999999999999', 'Sabor do Interior', 'sabordointerior@gmail.com', '81901234567', 'Praça dos Sabores, 505 - Madalena, Recife', 1);



INSERT INTO loja.funcionario (cpf, nome, sexo, endereco, telefone, email, user, senha, status, adm) VALUES
('123.456.789-12', 'Abynadark Souza', 'F', 'Avenida das Orquídeas, 567 - Graças, Recife', '81989944555', 'abynadarksouza@gmail.com', 'abynadark_souza', 'senha1', 1, 0),
('987.654.321-90', 'Mateus Dizeu', 'M', 'Travessa dos Manacás, 890 - Casa Forte, Recife', '81996677788', 'mateusdizeu@email.com', 'dizeu', '123', 1, 1),
('111.222.333-45', 'Vitória das Dores', 'F', 'Alameda das Tulipas, 112 - Centro, Petrolina', '81998677599', 'vitoriadores@email.com', 'vitoria_dores', 'senha3', 1, 0),
('222.333.444-56', 'Grabriel Dias', 'M', 'Praça das Azaleias, 223 - Pina, Recife', '81994621755', 'gabrieldias@email.com', 'gabriel_dias', 'senha4', 0, 1),
('333.444.555-67', 'Luis Gabriel', 'M', 'Avenida das Palmas, 786 - Piedade, Jaboatão dos Guararapes', '81984612727', 'luisgabriel@email.com', 'luis_gabriel', 'senha5', 1, 1),
('444.555.666-78', 'Kauã Rameh', 'M', 'Travessa das Orquídeas, 999 - Santo Amaro, Recife', '81991287258', 'kauarameh@email.com', 'kaua_rameh', 'senha6', 0, 1),
('555.666.777-89', 'André Barros', 'M', 'Praça dos Lírios, 667 - Olinda', '81993727885', 'andrebarros@email.com', 'andre_barros', 'senha7', 1, 1);

INSERT INTO loja.cliente (CPF, nome, email, telefone, status) VALUES
('123.456.789-01', 'João Silva', 'joao.silva@email.com', '81543210987', 0),
('234.567.890-12', 'Maria Oliveira', 'maria.oliveira@email.com', '81123456789', 0),
('345.678.901-23', 'Pedro Santos', 'pedro.santos@email.com', '81876543210', 1),
('456.789.012-34', 'Ana Pereira', 'ana.pereira@email.com', '81901234567', 0),
('567.890.123-45', 'Carlos Lima', 'carlos.lima@email.com', '81678901234', 1),
('678.901.234-56', 'Juliana Martins', 'juliana.martins@email.com', '81789012345', 1),
('789.012.345-67', 'Fernando Costa', 'fernando.costa@email.com', '81890123456', 1),
('890.123.456-78', 'Mariana Souza', 'mariana.souza@email.com', '81912345678', 1),
('901.234.567-89', 'Lucas Pereira', 'lucas.pereira@email.com', '81623456789', 1),
('012.345.678-90', 'Amanda Oliveira', 'amanda.oliveira@email.com', '81734567890', 1);

INSERT INTO loja.categoria (nome_cat) VALUES
('N/A'),
('Frutas e Verduras'),
('Eletrônicos'),
('Limpeza'),
('Bebidas Alcoólicas'),
('Bebidas Não Alcoólicas'),
('Padaria'),
('Carnes'),
('Higiene Pessoal'),
('Cuidados com o Lar'),
('Produtos de Higiene');

INSERT INTO loja.produtos (nome, quantidade, unidade, preco, categoria_id_cat, data_criacao, status, fornecedor_id_forn) VALUES
('Banana Prata (kg)', 30, 'kg', 3.00, 2, '2023-04-01', 1, 1),
('Monitor LED 24 polegadas', 12, 'un', 800.00, 3, '2023-04-01', 0, 6),
('Sabonete Líquido Lavanda (250ml)', 25, 'ml', 6.50, 10, '2023-04-01', 1, 3),
('Whisky Escocês 12 anos', 15, 'un', 120.00, 5, '2023-04-01', 1, 4),
('Refrigerante Cola (2L)', 20, 'litro', 4.00, 6, '2023-04-01', 1, 5),
('Croissant de Chocolate (unidade)', 50, 'un', 2.50, 7, '2023-04-01', 1, 2),
('Peito de Frango Desossado (kg)', 18, 'kg', 12.00, 8, '2023-04-01', 0, 2),
('Protetor Solar FPS 50', 30, 'un', 20.00, 9, '2023-04-01', 1, 1),
('Amaciante de Roupas Comfort (1L)', 40, 'litro', 8.00, 10, '2023-04-01', 1, 3),
('Lâmpada LED Econômica (unidade)', 60, 'un', 5.00, 3, '2023-04-01', 1, 6),
('Maçã Gala (kg)', 50, 'kg', 5.00, 2, '2023-01-01', 1, 1),
('Smartphone Samsung Galaxy S21', 20, 'un', 3000.00, 3, '2023-01-01', 0, 6),
('Detergente Líquido Ypê', 30, 'un', 3.00, 4, '2023-01-01', 0, 3),
('Vinho Tinto Reserva', 40, 'un', 50.00, 5, '2023-01-01', 1, 4),
('Água Mineral sem Gás (500ml)', 100, 'un', 1.50, 6, '2023-01-01', 1, 5),
('Pão Francês (unidade)', 80, 'un', 0.50, 7, '2023-01-01', 1, 2),
('Filé de Frango (kg)', 60, 'kg', 15.00, 8, '2023-01-01', 0, 2),
('Shampoo Dove Nutritivo', 70, 'un', 15.00, 9, '2023-01-01', 1, 1),
('Detergente Multiuso Veja', 25, 'un', 5.00, 4, '2023-02-01', 1, 2),
('Sabonete em Barra Neutro (unidade)', 15, 'un', 2.00, 10, '2023-02-01', 0, 3),
('Abacaxi (unidade)', 30, 'un', 6.00, 2, '2023-02-01', 1, 4),
('Notebook Dell Inspiron 15', 15, 'un', 5000.00, 3, '2023-03-01', 1, 6),
('Sabão em Pó Omo Multiação', 25, 'kg', 10.00, 4, '2023-03-01', 0, 2),
('Cerveja Artesanal IPA (lata)', 50, 'un', 9.00, 5, '2023-03-01', 1, 1),
('Suco de Laranja Natural (litro)', 40, 'litro', 4.00, 6, '2023-03-01', 1, 1),
('Baguete Integral (unidade)', 60, 'un', 2.00, 7, '2023-03-01', 1, 2),
('Costela Bovina (kg)', 20, 'kg', 23.00, 8, '2023-03-01', 0, 3),
('Condicionador Pantene Hidratação', 35, 'un', 15.00, 9, '2023-03-01', 1, 4),
('Desinfetante Lysoform Original', 30, 'litro', 12.00, 10, '2023-03-01', 1, 5),
('Escova de Dentes Oral-B (unidade)', 40, 'un', 3.00, 1, '2023-03-01', 0, 2);
