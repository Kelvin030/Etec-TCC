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
    userEmail varchar(120),
    userCurso varchar(250),
    userDTCadastro date NOT NULL,
    userDTUltLogin date NOT NULL,
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
    provaNome varchar(300) NOT NULL UNIQUE,
    provaCadastro date NOT NULL,
    provaStatus varchar(20) NOT NULL,
    provaMateria int,
    foreign key (provaMateria) references materias(mateID)
);

create table questoes (
	questID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    questPergunta varchar(700) NOT NULL UNIQUE,
    questCadastro date NOT NULL,
    questStatus varchar(20) NOT NULL,
    questDificuldade int NOT NULL,
    questProva int NOT NULL,
    foreign key (questProva) references prova(provaID)
);

create table alternativa (
	alterID int NOT NULL PRIMARY KEY AUTO_INCREMENT,
    alterAlternativa varchar(500) NOT NULL UNIQUE,
    alterCadastro date NOT NULL,
    alterStatus varchar(20) NOT NULL,
    alterCorreta varchar(3) NOT NULL,
    alterQuestao int NOT NULL,
    alterProva int NOT NULL,
    foreign key (alterQuestao) references questoes(questID),
    foreign key (alterProva) references prova(provaID)
);

create table respostaUsario (
	respUserID int NOT NULL,
    respUserAlterID int NOT NULL,
    respUserCadastro date NOT NULL,
    respUserQuestao int NOT NULL,
    respUserProva int NOT NULL,
    foreign key (respUserQuestao) references questoes(questID),
    foreign key (respUserProva) references prova(provaID),
    foreign key (respUserAlterID) references alternativa(alterID),
    foreign key (respUserID) references usuarios(userID)
);

INSERT INTO etecpolo (etecNome, etecEndereco, etecContato, etecCadastro)
values ('ETEC Lauro Gomes', 'Av. Pereira Barreto, 400 - Baeta Neves', '(11) 4125-2288', '20241003'),
('ETEC Jorge Street', 'R. Bel Aliance, 149 - Jardim Sao Caetano', '(11) 4238-7955', '20241016'),
('ETEC Júlio de Mesquita', 'R. Pref. Justino Paixão, 150 - Vila Bastos', '(11) 4990-2577', '20241003');

INSERT INTO materias (mateNome, mateCadastro, mateStatus)
VALUES ('Biologia - Ecologia', '20241016', 'Ativo');

INSERT INTO prova (provaNome, provaCadastro, provaStatus, provaMateria)
VALUES ('Prova de Ecologia 2024', '20241016', 'Ativo', 1);

INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('Qual é o principal gás responsável pelo efeito estufa?', '20241016', 'Ativo', 1, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Oxigênio (O2)', '20241016', 'Ativo', 'Não', 1, 1),
('Dióxido de Carbono (CO2)', '20241016', 'Ativo', 'Sim', 1, 1),
('Vapor de Água (H2O)', '20241016', 'Ativo', 'Não', 1, 1),
('Metano (CH4)', '20241016', 'Ativo', 'Não', 1, 1),
('Nitrogênio (N2)', '20241016', 'Ativo', 'Não', 1, 1);



INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('Qual é o bioma brasileiro conhecido por sua biodiversidade?', '20241016', 'Ativo', 2, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Caatinga', '20241016', 'Ativo', 'Não', 2, 1),
('Pantanal', '20241016', 'Ativo', 'Não', 2, 1),
('Amazônia', '20241016', 'Ativo', 'Sim', 2, 1),
('Mata Atlântica', '20241016', 'Ativo', 'Não', 2, 1),
('Cerrado', '20241016', 'Ativo', 'Não', 2, 1);




INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('Qual é o principal órgão de troca de gases nos peixes?', '20241016', 'Ativo', 1, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Pulmões', '20241016', 'Ativo', 'Não', 3, 1),
('Brânquias', '20241016', 'Ativo', 'Sim', 3, 1),
('Pele', '20241016', 'Ativo', 'Não', 3, 1),
('Bexiga Natatória', '20241016', 'Ativo', 'Não', 3, 1),
('Coração', '20241016', 'Ativo', 'Não', 3, 1);




INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('Como é classificada a interação entre abelhas e flores?', '20241016', 'Ativo', 2, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Predação', '20241016', 'Ativo', 'Não', 4, 1),
('Comensalismo', '20241016', 'Ativo', 'Não', 4, 1),
('Mutualismo', '20241016', 'Ativo', 'Sim', 4, 1),
('Parasitismo', '20241016', 'Ativo', 'Não', 4, 1),
('Competição', '20241016', 'Ativo', 'Não', 4, 1);





INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('O que caracteriza o ciclo do carbono?', '20241016', 'Ativo', 2, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Transformação do carbono em oxigênio', '20241016', 'Ativo', 'Não', 5, 1),
('Ciclo de absorção e liberação de carbono pelos seres vivos', '20241016', 'Ativo', 'Sim', 5, 1),
('Fixação do carbono no solo', '20241016', 'Ativo', 'Não', 5, 1),
('Acúmulo de carbono nas rochas', '20241016', 'Ativo', 'Não', 5, 1),
('Conversão de carbono em nitrogênio', '20241016', 'Ativo', 'Não', 5, 1);




INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('Qual fator é essencial para a realização da fotossíntese?', '20241016', 'Ativo', 1, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Oxigênio', '20241016', 'Ativo', 'Não', 6, 1),
('Luz Solar', '20241016', 'Ativo', 'Sim', 6, 1),
('Nutrientes do solo', '20241016', 'Ativo', 'Não', 6, 1),
('CO2', '20241016', 'Ativo', 'Sim', 6, 1),
('Água', '20241016', 'Ativo', 'Sim', 6, 1);



INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('O que é biodiversidade?', '20241016', 'Ativo', 1, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('A variedade de espécies em um ecossistema', '20241016', 'Ativo', 'Sim', 7, 1),
('A quantidade de biomassa em um bioma', '20241016', 'Ativo', 'Não', 7, 1),
('A diversidade genética de uma espécie', '20241016', 'Ativo', 'Sim', 7, 1),
('O número de nichos ecológicos', '20241016', 'Ativo', 'Não', 7, 1),
('A diversidade climática em um ecossistema', '20241016', 'Ativo', 'Não', 7, 1);



INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('O que significa eutrofização?', '20241016', 'Ativo', 2, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Processo de aumento da salinidade da água', '20241016', 'Ativo', 'Não', 8, 1),
('Aumento de nutrientes em corpos da água, resultando em crescimento excessivo de algas', '20241016', 'Ativo', 'Sim', 8, 1),
('Diminuição do pH da água', '20241016', 'Ativo', 'Não', 8, 1),
('Diminuição dos níveis de oxigênio na atmosfera', '20241016', 'Ativo', 'Não', 8, 1),
('Processo de salinização de solos', '20241016', 'Ativo', 'Não', 8, 1);



INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('Qual é o papel dos decompositores nos ecossistemas?', '20241016', 'Ativo', 1, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('Fixar nitrogênio no solo', '20241016', 'Ativo', 'Não', 9, 1),
('Reciclar nutrientes a partir da matéria orgânica morta', '20241016', 'Ativo', 'Sim', 9, 1),
('Produzir oxigênio através da fotossíntese', '20241016', 'Ativo', 'Não', 9, 1),
('Transformar CO2 em oxigênio', '20241016', 'Ativo', 'Não', 9, 1),
('Regular a temperatura do ambiente', '20241016', 'Ativo', 'Não', 9, 1);



INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
VALUES ('O que é sucessão ecológica?', '20241016', 'Ativo', 1, 1);

INSERT INTO alternativa (alterAlternativa, alterCadastro, alterStatus, alterCorreta, alterQuestao, alterProva)
VALUES 
('A mudança de temperatura ao longo do tempo', '20241016', 'Ativo', 'Não', 10, 1),
('O processo de colonização e mudança gradual em uma comunidade ecológica', '20241016', 'Ativo', 'Sim', 10, 1),
('A evolução de espécies ao longo de milhões de anos', '20241016', 'Ativo', 'Não', 10, 1),
('A extinção de espécies devido à competição', '20241016', 'Ativo', 'Não', 10, 1),
('O deslocamento de espécies migratórias', '20241016', 'Ativo', 'Não', 10, 1);






INSERT INTO materias (mateNome, mateCadastro, mateStatus)
values ('Simulado',20241016,'Ativo');

INSERT INTO prova (provaNome, provaCadastro,provaStatus, provaMateria)
values ('Vestibulinho 2024 - Simulado',20241016,'Ativo', 2);

INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
values ('Nos rios que cortam a Floresta Amazônica, são encontradas várias espécies de vertebrados, como, por
exemplo, o pirarucu, o poraquê (peixe elétrico), a arraia (ou raia), o tucunaré, o peixe-boi e o boto-cor-de-rosa.
Este último é conhecido por ser personagem de uma lenda do folclore brasileiro.
Com relação a todos os animais citados, é correto afirmar que',20241016,'Ativo', 1,2);

INSERT INTO alternativa (alterAlternativa, alterCadastro,alterStatus, alterCorreta, alterQuestao, alterProva)
values ('realizam as trocas gasosas por meio de um par de pulmões do tipo alveolar com paredes muito
delgadas',20241016,'Ativo', 'Não',11,2),
('conseguem manter a temperatura corporal constante apesar de alterações da temperatura ambiental.',20241016,'Ativo', 'Não',11,2),
('dependem de oxigênio, que é usado na oxidação de moléculas orgânicas, como a glicose, a fim de
obter energia.',20241016,'Ativo', 'Sim',11,2),
('apresentam fecundação externa, com desenvolvimento indireto por meio de fase larval, seguida de
metamorfose.',20241016,'Ativo', 'Não',11,2),
('possuem bexiga natatória, que é um órgão responsável pela manutenção do equilíbrio hidrostático.',20241016,'Ativo', 'Não',11,2);

INSERT INTO questoes (questPergunta, questCadastro, questStatus, questDificuldade, questProva)
values ('No final do século XIX, eclodiu uma rebelião no Acre, que se prolongou por alguns anos e, ante a ameaça
de uma intervenção direta do governo brasileiro, foi firmado o Tratado de Petrópolis entre os governos
da Bolívia e do Brasil, em 1903. Foi por isso que a Bolívia cedeu o território do Acre ao Brasil em troca
de dois milhões de libras esterlinas; e o governo brasileiro se comprometeu a construir a estrada de ferro
Madeira – Mamoré.
Sobre esse estado da federação, é correto afirmar que nele se encontra o ponto',20241016,'Ativo', 2,2);

INSERT INTO alternativa (alterAlternativa, alterCadastro,alterStatus, alterCorreta, alterQuestao, alterProva)
values 
('central Geodésico do território brasileiro, localizado em sua capital.',20241016,'Ativo', 'Não',12,2),
('mais ocidental do território brasileiro, a nascente do Rio Moa.',20241016,'Ativo', 'Sim',12,2),
('mais setentrional do território brasileiro, a nascente do Rio Ailã.',20241016,'Ativo', 'Não',12,2),
('mais oriental do território brasileiro, a Ponta do Seixas.',20241016,'Ativo', 'Não',12,2),
('mais meridional do território brasileiro, o Arroio Chuí.',20241016,'Ativo', 'Não',12,2);

