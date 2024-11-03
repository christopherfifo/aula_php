CREATE database IF NOT EXISTS Login_site;

use Login_site;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    nome VARCHAR(255) NOT NULL,
    numero_celular VARCHAR(20) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    cpf VARCHAR(20)  UNIQUE,
    rg VARCHAR(20)  UNIQUE,
    data_nascimento DATE,
    sexo ENUM('M', 'F'),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS PROFISSIONAIS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    especialidade VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS EXAMES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    valor DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS CONSULTAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT NOT NULL,
    id_profissional INT NOT NULL,
    especialidade_profissional VARCHAR(255) NOT NULL,
    data_consulta DATE NOT NULL,
    hora_consulta TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    FOREIGN KEY (id_profissional) REFERENCES PROFISSIONAIS(id)
);

CREATE  TABLE IF NOT EXISTS DETALHES_CONSULTAS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_consulta INT NOT NULL,
    id_exame INT NOT NULL,
    nome_exame VARCHAR(255) NOT NULL,
    valor_exame DECIMAL(10,2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_consulta) REFERENCES CONSULTAS(id),
    FOREIGN KEY (id_exame) REFERENCES EXAMES(id)
);

CREATE TABLE IF NOT EXISTS PAGAMENTOS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_consulta INT NOT NULL,
    id_cliente INT NOT NULL,
    valor_pago DECIMAL(10,2),
    data_pagamento DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_consulta) REFERENCES CONSULTAS(id),
    FOREIGN KEY (id_cliente) REFERENCES usuarios(id)
);

INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo)
VALUES (
    'joao.silva@example.com',       -- Email do usuário
    'João Silva',                   -- Nome do usuário
    '11987654321',                  -- Número de celular
    'senhaSegura123',               -- Senha do usuário (idealmente, a senha deveria ser criptografada)
    '12345678909',                  -- CPF do usuário
    '123456789',                    -- RG do usuário
    '1990-05-15',                   -- Data de nascimento (no formato YYYY-MM-DD)
    'M'                             -- Sexo (M para masculino ou F para feminino)
);

INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo)
VALUES (
    'maria.santos@example.com',       -- Email do usuário
    'Maria Santos',                   -- Nome do usuário
    '11912345678',                    -- Número de celular
    'senhaForte456',                  -- Senha do usuário (idealmente, a senha deveria ser criptografada)
    '98765432100',                    -- CPF do usuário
    '987654321',                      -- RG do usuário
    '1995-08-25',                     -- Data de nascimento (no formato YYYY-MM-DD)
    'F'                                -- Sexo (M para masculino ou F para feminino)
);

INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo)
VALUES (
    'carlos.moraes@example.com',      -- Email do usuário
    'Carlos Moraes',                  -- Nome do usuário
    '11876543210',                    -- Número de celular
    'minhaSenha789',                  -- Senha do usuário (idealmente, a senha deveria ser criptografada)
    '12398745600',                    -- CPF do usuário
    '123987654',                      -- RG do usuário
    '1988-12-05',                     -- Data de nascimento (no formato YYYY-MM-DD)
    'M'                                -- Sexo (M para masculino ou F para feminino)
);

INSERT INTO usuarios (email, nome, numero_celular, senha, cpf, rg, data_nascimento, sexo)
VALUES (
    'ana.pereira@example.com',        -- Email do usuário
    'Ana Pereira',                    -- Nome do usuário
    '11765432109',                    -- Número de celular
    'senhaSuper123',                  -- Senha do usuário (idealmente, a senha deveria ser criptografada)
    '45678912345',                    -- CPF do usuário
    '456789123',                      -- RG do usuário
    '1992-03-30',                     -- Data de nascimento (no formato YYYY-MM-DD)
    'F'                                -- Sexo (M para masculino ou F para feminino)
);


delete from usuarios where id = 2;

select * from usuarios;

