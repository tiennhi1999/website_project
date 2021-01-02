use master
go
drop database QLHoiNghi
go

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
   THOIGIAN_BD            datetime             null,
   THOIGIAN_KT            datetime             null,
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

/*==============================================================*/
/*======================== RÀNG BUỘC TOÀN VẸN ============================*/
/*==============================================================*/

go
-- trigger kiểm tra thời gian kết thúc phải lớn hơn thời gian bắt đầu
create trigger Trg_kiem_tra_thoi_gian_HN
on HOI_NGHI
for insert
as
begin
		declare @thoigian_bd datetime = (select THOIGIAN_BD from inserted)
		declare @thoigian_kt datetime = (select THOIGIAN_KT from inserted)

		if @thoigian_bd >= @thoigian_kt
		begin
				raiserror(N'Thời gian bắt đầu (hoặc thời gian kết thúc) không hợp lệ', 16,1)
				rollback
		end
		
end

go
-- Trigger mỗi khi có người tham gia HN, kiểm tra xem số người tham gia có vượt quá sức chứa hay không
create trigger Trg_cap_nhat_HN_khi_co_user_thamgia
on DS_THAMGIA
for insert
as
begin
		declare @ma_HN int = (select MAHN from inserted)

		if exists (select * from HOI_NGHI hn, DIADIEMTC dd 
					where hn.MAHN = @ma_HN and hn.MADD = dd.MADD and dd.SUCCHUA <= 
						(select COUNT(*) from DS_THAMGIA where MAHN = @ma_HN))
		begin
				raiserror(N'Số người tham gia vượt quá sức chứa', 16,1)
				rollback
		end
end
 
go
-- Trigger kiểm tra HN mới thêm có bị trùng địa điểm và thời gian hay không
create trigger Trg_kiem_tra_diadiem_thoigian_HN_co_trung_khong
on HOI_NGHI
for insert
as
begin
		declare @ma_DD int = (select MADD from inserted)
		declare @thoigian_bd datetime = (select THOIGIAN_BD from inserted)
		declare @thoigian_kt datetime = (select THOIGIAN_KT from inserted)

		if exists (select * from HOI_NGHI hn
					where @ma_DD = hn.MADD and @thoigian_bd >= hn.THOIGIAN_BD and @thoigian_bd <= hn.THOIGIAN_KT)
		begin
				raiserror(N'Địa điểm và thời gian bắt đầu bị trùng!',16,1)
				rollback
		end

		if exists (select * from HOI_NGHI hn
					where @ma_DD = hn.MADD and @thoigian_kt >= hn.THOIGIAN_BD)
		begin
				raiserror(N'Địa điểm và thời gian kết thúc bị trùng bị trùng!',16,1)
				rollback
		end
end
