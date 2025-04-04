create table categoria(
	id int primary key not null auto_increment,
    nome varchar(127) NOT NULL
);

create table artigo(
	id int primary key not null auto_increment,
    titulo varchar(127) NOT NULL,
    idCategoria int not null,
    foreign key (idCategoria) references categoria(id) on delete cascade,
    conteudo varchar(2047)
);

create table usuario(
	id int primary key not null auto_increment,
    nome varchar(127) NOT NULL,
    email varchar(127),
    dataNascimento date, 
    cpf varchar(11) NOT NULL,
    telefone varchar(15)
);


INSERT INTO categoria (nome) VALUES
('Tecnologia'),
('Saúde'),
('Educação'),
('Cultura'),
('Ciência'),
('Esportes'),
('Entretenimento'),
('Negócios'),
('Política'),
('Arte');

INSERT INTO artigo (titulo, idCategoria, conteudo) VALUES
('Introdução à Programação', (SELECT id FROM categoria WHERE nome = 'Tecnologia'), 'Conteúdo sobre introdução à programação...'),
('Dicas para uma Vida Saudável', (SELECT id FROM categoria WHERE nome = 'Saúde'), 'Conteúdo sobre dicas de saúde...'),
('Melhores Cursos Online', (SELECT id FROM categoria WHERE nome = 'Educação'), 'Conteúdo sobre melhores cursos online...'),
('História da Arte Moderna', (SELECT id FROM categoria WHERE nome = 'Cultura'), 'Conteúdo sobre arte moderna...'),
('Avanços da Medicina', (SELECT id FROM categoria WHERE nome = 'Saúde'), 'Conteúdo sobre avanços na medicina...'),
('A Revolução Científica', (SELECT id FROM categoria WHERE nome = 'Ciência'), 'Conteúdo sobre a revolução científica...'),
('Como Começar a Praticar Esportes', (SELECT id FROM categoria WHERE nome = 'Esportes'), 'Conteúdo sobre como começar a praticar esportes...'),
('Filmes que Marcaram Época', (SELECT id FROM categoria WHERE nome = 'Entretenimento'), 'Conteúdo sobre filmes históricos...'),
('Dicas de Negócios para Empreendedores', (SELECT id FROM categoria WHERE nome = 'Negócios'), 'Conteúdo sobre dicas de negócios...'),
('O Impacto da Política no Cotidiano', (SELECT id FROM categoria WHERE nome = 'Política'), 'Conteúdo sobre o impacto da política...');

INSERT INTO usuario (nome, email, dataNascimento, cpf, telefone) VALUES
('João Silva', 'joao.silva@email.com', '1985-07-12', '12345678901', '11987654321'),
('Maria Oliveira', 'maria.oliveira@email.com', '1990-05-23', '98765432100', '11976543210'),
('Pedro Costa', 'pedro.costa@email.com', '1983-02-10', '19283746501', '11965432109'),
('Ana Pereira', 'ana.pereira@email.com', '1995-11-30', '11223344556', '11954321098'),
('Carlos Souza', 'carlos.souza@email.com', '1980-09-15', '22334455667', '11943210987'),
('Fernanda Lima', 'fernanda.lima@email.com', '1992-12-05', '33445566778', '11932109876'),
('Lucas Alves', 'lucas.alves@email.com', '1987-01-20', '44556677889', '11921098765'),
('Juliana Rocha', 'juliana.rocha@email.com', '1993-08-18', '55667788990', '11910987654'),
('Ricardo Martins', 'ricardo.martins@email.com', '1986-03-11', '66778899001', '11899876543'),
('Larissa Ferreira', 'larissa.ferreira@email.com', '1998-06-25', '77889900112', '11888765432');