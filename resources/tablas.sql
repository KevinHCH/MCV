drop table if exists noticias;

create table noticias(
    id int auto_increment,
    titulo varchar(30) not null,
    texto varchar (255) not null,
    fecha date not null,
    primary key(id)
);


-- Tabla Noticia
drop table if exists noticia;

create table noticia(
    id int auto_increment,
    titulo varchar(30) not null,
    texto varchar (255) not null,
    fecha date not null,
    primary key(id)
);

-- Mi primer MVC 
drop table if exists tienda;

create table tienda (
    id int auto_increment not null primary key,
    prenda varchar (255) not null,
    talla char (5) not null,
    precio int (3) not null,
    img varchar (255) ,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP NOT NULL
);


-- MVC persona
drop table if exists persona;
create table persona (
    dni varchar(9) not null,
    nombre varchar (20) not null,
    apellido varchar (20) not null,
    edad date not null,
    primary key (dni)
);


drop table if exists usuario;
create table usuario(
    id_usuario int auto_increment not null primary key,
    nombre_usuario varchar(20) not null,
    email varchar (20) not null,
    pass varchar (120) not null
);