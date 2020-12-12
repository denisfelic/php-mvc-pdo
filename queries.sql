USE mvc_pdo;

# CREATE TABLE
CREATE TABLE IF NOT EXISTS usuarios(
                                       id INT PRIMARY KEY  AUTO_INCREMENT,
                                       email VARCHAR(40) NOT NULL,
                                       senha VARCHAR(255) NOT NULL
);

CREATE  TABLE IF NOT EXISTS cursos (
                                       id INT PRIMARY KEY AUTO_INCREMENT,
                                       descricao VARCHAR(255) NOT NULL,
                                       user_id INT NOT NULL,
                                       FOREIGN KEY (user_id) REFERENCES usuarios(id)
);

DESC usuarios;
DESC cursos;

# INSERT
INSERT INTO usuarios (email, senha) VALUES
( 'usuario2@gmail.com', '4321');

INSERT INTO cursos (descricao, user_id) VALUES
( 'Curso de Matemática', 1);

# SELECT
SELECT * FROM usuarios;
SELECT * FROM cursos;

# JUNÇÃO DE DUAS TABELAS
SELECT usuarios.id, usuarios.email, usuarios.senha,
       c.id,
       c.descricao
FROM usuarios
         JOIN cursos c
              ON usuarios.id = c.user_id
WHERE usuarios.id = 1;


# OBTER CURSOS DO USUÁRIO
SELECT * FROM  cursos
WHERE  user_id = 1;

