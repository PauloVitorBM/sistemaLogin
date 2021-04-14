CREATE database DBEscola;

USE DBEscola;


CREATE TABLE USUARIOS (
	email varchar(100) primary key,
    senha char(32) not null,
    tipo enum('ALUNO','PROFESSOR','ADMINISTRADOR','SECRETARIA') not null
);

CREATE TABLE ALUNOS (
	matricula varchar(20) primary key,
    nome varchar(100) not null,
    sexo enum('m','f','o') not null,
    curso varchar(30) not null,
    email varchar(100) references USUARIOS (email)
);

-- POPULANDO DADOS INICIAIS

INSERT INTO USUARIOS (email,senha,tipo) VALUES ('jvc_vr@hotmail.com',MD5('joao123'),'ALUNO');
INSERT INTO USUARIOS (email,senha,tipo) VALUES ('mpparanhos1@gmail.com',MD5('123paranhos'),'ALUNO');
INSERT INTO USUARIOS (email,senha,tipo) VALUES ('paulo15254545@gmail.com',MD5('naruto123'),'ALUNO');
INSERT INTO USUARIOS (email,senha,tipo) VALUES ('rafael.iacillo@gmail.com',MD5('rafinha123'),'PROFESSOR');
INSERT INTO USUARIOS (email,senha,tipo) VALUES ('adm@gmail.com',MD5('adm123'),'ADMINISTRADOR');
 