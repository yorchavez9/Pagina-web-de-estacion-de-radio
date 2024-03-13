CREATE DATABASE radio_vivo CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

use sis_radio;


create table usuarios(
	id_usuario int primary key auto_increment,
    nombre varchar(100) not null,
    apellidos varchar(150) not null,
    perfil varchar(100) default "usuario",
    correo varchar(100) not null unique,
    password varchar(255) not null,
    estado int not null default 1,
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table categorias(
	id_categoria int not null primary key auto_increment,
    nombre varchar(100) not null,
    estado int default 1,
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table banners(
	id_banner int not null primary key auto_increment,
    imagen varchar(255) not null,
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table patrocinadores(
	id_patrocinador int not null primary key auto_increment,
    nombre varchar(255) not null,
    empresa varchar(255) not null,
    correo varchar(255) not null unique,
    telefono varchar(20) not null,
    sitio_web varchar(255),
    direccion varchar(255),
    mensaje text not null
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table noticias(
	id_noticia int not null primary key auto_increment,
    titulo varchar(255) not null,
    imagen varchar(255) not null,
    fecha date not null,
    descripcion text not null,
	estado int default 1
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table conductores(
	id_conductor int not null primary key auto_increment,
    tipo varchar(100) not null,
    nombre varchar(255) not null,
    apellidos varchar(255) not null,
    correo varchar(255) not null,
    telefono varchar(20) not null,
    experiencia int not null,
    habilidades text,
    estado int default 1,
    fecha datetime default current_timestamp
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table programaciones_radial(
	id_radial int not null primary key auto_increment,
    id_conductor int not null,
    dia varchar(50) not null,
    titulo varchar(255) not null,
    imagen varchar(255) not null,
    hora time not null,
    estado int not null,
    foreign key(id_conductor) references conductores(id_conductor)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table programaciones_tv(
	id_tv int not null primary key auto_increment,
    id_conductor int not null,
    dia varchar(50) not null,
    titulo varchar(255) not null,
    imagen varchar(255) not null,
    hora time not null,
    estado int not null,
    foreign key(id_conductor) references conductores(id_conductor)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


create table ranking(
	id_ranking int not null primary key auto_increment,
    puesto int not null,
    cancion varchar(255) not null,
    artista varchar(255) not null,
    letra text,
    video_url varchar(300) not null,
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


create table videos(
	id_video int not null primary key auto_increment,
    titulo varchar(255) not null,
    video_url varchar(300) not null,
    estado int not null,
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table eventos(
	id_evento int not null primary key auto_increment,
    titulo varchar(255) not null,
    imagen varchar(255) not null,
    estado int not null
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table galarias(
	id_galeria int not null primary key auto_increment,
	tipo varchar(100) not null,
    imagen varchar(255) not null,
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table redes_sociales(
	id_redes int not null primary key auto_increment,
    facebook varchar(300),
    whatsapp varchar(300),
    youtube varchar(300),
    linkedin varchar(300),
    twitter varchar(300),
    tiktok varchar(300)
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table visitas(
	id_visita int not null primary key auto_increment,
    ip varchar(100),
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table data_contactos(
	id_data_contacto int not null primary key auto_increment,
    localizacion varchar(300) not null,
    telefono varchar(20) not null,
    correo varchar(100) not null
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


create table contactos(
	id_contacto int not null primary key auto_increment,
    nombre varchar(255) not null,
    correo varchar(255),
    telefono varchar(20) not null,
    compania varchar(255),
    mensaje text not null,
    estado int default 0,
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

create table suscriptores(
	id_suscribir int not null primary key auto_increment,
    correo varchar(100),
    fecha datetime default current_timestamp()
)CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;




