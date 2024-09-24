create database etecVestibulinho;

use etecVestibulinho;


create table etecPolo (
	etecID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    etecNome varchar(255) NOT NULL,
    etecEndereco varchar(255) NOT NULL,
    etecContato varchar(255) NOT NULL,
    etecCadastro date NOT NULL
);

create table usuarios (
	userID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    usuario varchar(50) NOT NULL UNIQUE,
    userSenha varchar(100) NOT NULL,
    userNome varchar(110) NOT NULL,
    userEmail varchar(120) NOT NULL,
    userCadastro date NOT NULL,
    userUltLogin date NOT NULL,
    userTipo varchar(50) NOT NULL,
    userStatus varchar(20) NOT NULL,
    userEtecID int NOT NULL,
    FOREIGN KEY (userEtecID) REFERENCES etecPolo(etecID)
);

create table materias (
	mateID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    mateNome varchar(150) NOT NULL UNIQUE,
    mateCadastro date NOT NULL,
    mateStatus varchar(20) NOT NULL 
);

create table prova (
	provaID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    provaNome varchar(150) NOT NULL UNIQUE,
    provaCadastro date NOT NULL,
    provaStatus varchar(20) NOT NULL,
    provaMateria int,
    foreign key (provaMateria) references materias(mateID)
);

create table questoes (
	questID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    questPergunta varchar(150) NOT NULL UNIQUE,
    questCadastro date NOT NULL,
    questStatus varchar(20) NOT NULL,
    questProva int NOT NULL,
    foreign key (questProva) references prova(provaID)
);

create table alternativa (
	alterID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    alterAlternativa varchar(150) NOT NULL UNIQUE,
    alterCadastro date NOT NULL,
    alterStatus varchar(20) NOT NULL,
    alterQuestao int NOT NULL,
    alterProva int NOT NULL,
    foreign key (alterQuestao) references questoes(questProva),
    foreign key (alterProva) references prova(provaID)
);


create table respostas (
	respID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    respResposta varchar(150) NOT NULL UNIQUE,
    respCadastro date NOT NULL,
    respStatus varchar(20) NOT NULL,
    respQuestao int NOT NULL,
    respProva int NOT NULL,
    foreign key (respQuestao) references questoes(questProva),
    foreign key (respProva) references prova(provaID)
);

create table respostaUsario (
	respUserID int NOT NULL,
    respUserResposta varchar(150) NOT NULL UNIQUE,
    respUserCadastro date NOT NULL,
    respUserStatus varchar(20) NOT NULL,
    respUserQuestao int NOT NULL,
    respUserProva int NOT NULL,
    foreign key (respUserQuestao) references questoes(questProva),
    foreign key (respUserProva) references prova(provaID),
    foreign key (respUserID) references usuarios(userID)
);