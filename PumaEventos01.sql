/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     24/10/2017 09:59:59 a. m.                    */
/*==============================================================*/


drop table if exists ADMINISTRADOR;

drop table if exists EVENTOS;

drop table if exists USUARIOS;

/*==============================================================*/
/* Table: ADMINISTRADOR                                         */
/*==============================================================*/
create table ADMINISTRADOR
(
   ID_ADMIN             int not null,
   NOMBRES              varchar(20),
   APELLIDOS            varchar(20),
   TELEFONO             int,
   CORREO_INST          varchar(30),
   CONTRASENA           varchar(30),
   CARRERA              char(5),
   FOTO_PERFIL          longblob,
   primary key (ID_ADMIN)
)
engine = InnoDB;

/*==============================================================*/
/* Table: EVENTOS                                               */
/*==============================================================*/
create table EVENTOS
(
   ID_ADMIN             int not null,
   ID_EVENTO            int not null,
   ID_USUARIO           int,
   NOMBRE_EVENTO        varchar(30),
   DESCRIPCION          varchar(1200),
   FECHA                datetime,
   UBICACION            varchar(50),
   FOTOS                longblob,
   primary key (ID_ADMIN, ID_EVENTO)
)
engine = InnoDB;

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS
(
   NOMBRES              varchar(20),
   APELLIDOS            varchar(20),
   ID_USUARIO           int not null,
   CARRERA              char(5),
   CORREO_INST          varchar(30),
   CONTRASENA           varchar(30),
   FOTO_PERFIL          longblob,
   primary key (ID_USUARIO)
)
engine = InnoDB;

alter table EVENTOS add constraint FK_CREAR foreign key (ID_ADMIN)
      references ADMINISTRADOR (ID_ADMIN) on delete restrict on update restrict;

alter table EVENTOS add constraint FK_VER foreign key (ID_USUARIO)
      references USUARIOS (ID_USUARIO) on delete restrict on update restrict;

