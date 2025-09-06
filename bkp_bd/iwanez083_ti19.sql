-- Backup Geral do banco de dados iwanez83_ti19
-- Excluir o usuário iwanez83_ti19 caso ele exista
DROP USER IF EXISTS 'iwanez83_ti19'@'localhost';

-- Criar o usuário iwanez83_ti19 se ele não existir
CREATE USER IF NOT EXISTS 'iwanez83_ti19'@'localhost'
    IDENTIFIED BY 'iwanez83_ti19';
GRANT ALL PRIVILEGES ON *.* TO 'iwanez83_ti19'@'localhost'
    WITH GRANT OPTION;
    FLUSH PRIVILEGES;

-- Excluir o banco de dados iwanez83_ti19 caso ele exista
DROP DATABASE IF EXISTS iwanez83_ti19;

-- Criar o banco de dados iwanez83_ti19 se ele não existir
CREATE DATABASE IF NOT EXISTS iwanez83_ti19
    DEFAULT CHARACTER SET utf8
    COLLATE utf8_general_ci;

-- Usamos o banco de dados iwanez83_ti19
USE iwanez83_ti19;

-- Estrutura da tabela tbtipos
CREATE TABLE tbtipos(
    id_tipo INT(11) NOT NULL,
    sigla_tipo VARCHAR(3) NOT NULL,
    rotulo_tipo VARCHAR(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Extraindo dados da tabela tbtipos
INSERT INTO tbtipos(id_tipo,sigla_tipo,rotulo_tipo) VALUES
    (1,'chu','Churrasco'),
    (2,'sob','Sobremesa');

-- Estrutura da tabela tbprodutos
CREATE TABLE tbprodutos(
    id_produto INT(11) NOT NULL,
    id_tipo_produto INT(11) NOT NULL,
    descri_produto VARCHAR(100) NOT NULL,
    resumo_produto VARCHAR(1000) NULL,
    valor_produto DECIMAL(9,2) NULL,
    imagem_produto VARCHAR(50) NULL,
    destaque_produto enum('Sim','Não') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Extraindo dados da tabela `tbprodutos`
INSERT INTO tbprodutos (id_produto, id_tipo_produto, descri_produto, resumo_produto, valor_produto, imagem_produto, destaque_produto) VALUES
(1, 1, 'Picanha ao alho', ' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre', 29.90, 'picanha_alho.jpg', 'Sim'),
(2, 1, 'Fraldinha', 'Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura', 29.90, 'fraldinha.jpg', 'Não'),
(3, 1, 'Costela', 'A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria', 29.90, 'costelona.jpg', 'Sim'),
(4, 1, 'Cupim', 'Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ', 29.90, 'cupim.jpg', 'Sim'),
(5, 1, 'Picanha ', 'Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura', 29.90, 'picanha_sem.jpg', 'Não'),
(6, 1, 'Apfelstrudel', 'Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete', 29.90, 'strudel.jpg', 'Não'),
(7, 1, 'Alcatra', 'Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.', 29.90, 'alcatra_pedra.jpg', 'Não'),
(8, 1, 'Maminha', 'Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.', 29.90, 'maminha.jpg', 'Não'),
(9, 2, 'Abacaxiiiiiiii', 'Abacaxi assado com canela ao creme de leite condensado ', 29.90, 'abacaxi.jpg', 'Não');

-- ------ CHAVES ------
ALTER TABLE tbprodutos
    ADD PRIMARY KEY (id_produto),
    ADD KEY id_tipo_produto_fk(id_tipo_produto);

ALTER TABLE tbtipos
    ADD PRIMARY KEY (id_tipo);

-- ----- AUTO INCREMENTS -----
ALTER TABLE tbprodutos
    MODIFY id_produto INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE tbtipos
    MODIFY id_tipo INT(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- Limitadores e referências da Chave Estrangeira
ALTER TABLE tbprodutos
    ADD CONSTRAINT id_tipo_produto_fk FOREIGN KEY(id_tipo_produto)
        REFERENCES tbtipos(id_tipo)
        ON DELETE NO ACTION
        ON UPDATE NO ACTION;