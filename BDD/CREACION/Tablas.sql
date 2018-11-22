use volunta1;

create table persona (
dni varchar(10) primary key,
nombre varchar(20),
apellidos varchar(50),
telefono int(15),
direccion varchar(50),
ciudad varchar(20),
email varchar(40)
);

create table coordinador (
idcoordinador int auto_increment primary key,
persona varchar(10),
FOREIGN KEY (persona) REFERENCES persona(dni)
);

create table voluntario (
idvoluntario int auto_increment primary key,
persona varchar(10),
horas int(4),
FOREIGN KEY (persona) REFERENCES persona(dni)
);

create table lugar (
idlugar int auto_increment primary key,
nombre varchar(50),
longitud float,
latitud float
);

create table evento (
idevento int auto_increment primary key,
coordinador int,
voluntario int,
lugar int,
nombre varchar(50),
tipo varchar(50),
estado boolean,
FOREIGN KEY (coordinador) REFERENCES coordinador(idcoordinador),
FOREIGN KEY (voluntario) REFERENCES voluntario(idvoluntario),
FOREIGN KEY (lugar) REFERENCES lugar(idlugar)
);

create table evento_voluntario (
voluntario int,
evento int,
FOREIGN KEY (voluntario) REFERENCES voluntario(idvoluntario),
FOREIGN KEY (evento) REFERENCES evento(idevento)
);


create table incidencia (
idincidencia int auto_increment primary key,
voluntario int,
evento int,
FOREIGN KEY (voluntario) REFERENCES voluntario(idvoluntario),
FOREIGN KEY (evento) REFERENCES evento(idevento)
);


