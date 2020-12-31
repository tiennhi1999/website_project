--drop database QLHoiNghi
create database QLHoiNghi
go
use [QLHoiNghi]
go 
/*==============================================================*/
/* Table: ADMIN                                                 */
/*==============================================================*/
create table ADMIN 
(
   MAAD                 int identity(1,1)  not null,
   TENAD                varchar(50)         null,
   USERNAME             varchar(50)         null,
   PASSWORD             varchar(50)         null,
   EMAIL                varchar(100)        null,
   constraint PK_ADMIN primary key (MAAD)
);
go

/*==============================================================*/
/* Table: DIADIEMTC                                             */
/*==============================================================*/
create table DIADIEMTC 
(
   MADD                 int identity(1,1)    not null,
   TENDD                varchar(100)         null,
   DIACHI               varchar(100)         null,
   SUCCHUA              int                  null,
   constraint PK_DIADIEMTC primary key (MADD)
);
go

/*==============================================================*/
/* Table: DS_DANGKI                                             */
/*==============================================================*/
create table DS_DANGKI 
(
   MA_DSDK              int identity(1,1)    not null,
   MA_USER              int                  null,
   HN_ID                int                  null,
   MAAD                 int                  null,
   constraint PK_DS_DANGKI primary key(MA_DSDK)
);
go

/*==============================================================*/
/* Table: DS_THAMGIA                                            */
/*==============================================================*/
create table DS_THAMGIA 
(
   MA_DSTG              int identity(1,1)    not null,
   MA_USER              int                  null,
   MAHN                 int                  null,
   constraint PK_DS_THAMGIA primary key(MA_DSTG)
);
go

/*==============================================================*/
/* Table: HOI_NGHI                                              */
/*==============================================================*/
create table HOI_NGHI 
(
   MAHN                 int identity(1,1)    not null,
   MADD                 int                  null,
   MAAD                 int                  null,
   TENHN                varchar(100)         null,
   MOTANG               varchar(100)         null,
   MOTA                 varchar(100)         null,
   HINHANH              text                 null,
   THOIGIAN             datetime             null,
   constraint PK_HOI_NGHI primary key(MAHN)
);
go

/*==============================================================*/
/* Table: "USER"                                                */
/*==============================================================*/
create table USER_
(
   MA_USER              int identity(1,1)    not null,
   TENUSER              varchar(50)         null,
   USERNAME             varchar(50)         null,
   USER_PWD             varchar(50)         null,
   USER_EMAIL           varchar(100)         null,
   ADMIN                int                  null,
   CHAN                 bit                  null,
   constraint PK_USER primary key (MA_USER)
);
go

/*==============================================================*/
/* Index: QUA_N_LY__FK                                          */
/*==============================================================*/
go

alter table DS_DANGKI
   add constraint FK_DS_DANGK_CO__USER foreign key (MA_USER)
      references USER_ (MA_USER)
go

alter table DS_DANGKI
   add constraint FK_DS_DANGK_CO__TRONG_HOI_NGHI foreign key (HN_ID)
      references HOI_NGHI (MAHN)
go

alter table DS_DANGKI
   add constraint FK_DS_DANGK_DUYE_T_ADMIN foreign key (MAAD)
      references ADMIN (MAAD)
go

alter table DS_THAMGIA
   add constraint FK_DS_THAMG_CO___USER foreign key (MA_USER)
      references USER_ (MA_USER)
go

alter table DS_THAMGIA
   add constraint FK_DS_THAMG_THUO_C_HOI_NGHI foreign key (MAHN)
      references HOI_NGHI (MAHN)
go

alter table HOI_NGHI
   add constraint FK_HOI_NGHI_QUAN_LI_ADMIN foreign key (MAAD)
      references ADMIN (MAAD)
go

alter table HOI_NGHI
   add constraint FK_HOI_NGHI_TO__CHU_C_DIADIEMT foreign key (MADD)
      references DIADIEMTC (MADD)
go

alter table USER_
   add constraint FK_USER_QUA_N_LY__ADMIN foreign key (ADMIN)
      references ADMIN (MAAD)
go

