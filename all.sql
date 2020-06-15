CREATE table users(
 	id int not null PRIMARY KEY AUTO_INCREMENT,
    username varchar(100) not null,
    senha varchar(50) not null,
    permissao varchar(20) not null DEFAULT 'usuario',
    created_at datetime not null DEFAULT CURRENT_TIMESTAMP
);

create table nps(
	id int not null PRIMARY KEY AUTO_INCREMENT,
    nota int not null,
    usuario varchar(50) not null,
    created_at datetime not null DEFAULT CURRENT_TIMESTAMP
);