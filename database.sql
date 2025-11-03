
create table section (
    id int primary key auto_increment,
    section_nama varchar(255),
    section_kategori_decision text
);

create table section_sub (
    id int primary key auto_increment,
    section_sub_nama varchar(255),
    section_sub_bobot int,
    section_sub_kategori_decision text
);

create table indikator (
    id int primary key auto_increment,
    indikator_nama varchar(255),
    indikator_bobot int
);

create table indikator_kriteria (
    id int primary key auto_increment,
    kriteria_nama varchar(255),
    nilai int
);

create table infrastruktur (
    id int primary key auto_increment,
    nama_infra varchar(255),
    lokasi_infra varchar(255),
    nilai_kontrak varchar(255),
    tahun_mulai varchar(255),
    tahun_selesai varchar(255)
);

create table infrastruktur_evaluasi (
    id int primary key auto_increment,
    infrastruktur_id int,
    section_nama varchar(255),
    section_kategori_decision text,
    section_skor int,
    section_skor_kategori varchar(255)
);

create table infrastruktur_evaluasi_sub (
    id int primary key auto_increment,
    infrastruktur_evaluasi_id int,
    section_sub_nama varchar(255),
    section_sub_bobot int,
    section_sub_kategori_decision text,
    section_sub_skor int,
    section_sub_skor_kategori varchar(255)
);

create table infrastruktur_evaluasi_sub_indikator (
    id int primary key auto_increment,
    infrastruktur_evaluasi_sub_id int,
    indikator_nama varchar(255),
    indikator_bobot int,
    indikator_skor int,
    indikator_nilai int,
    indikator_skor_kategori varchar(255)
);

create table infrastruktur_evaluasi_sub_indikator_kriteria (
    id int primary key auto_increment,
    infrastruktur_evaluasi_sub_indikator_id int,
    indikator_kriteria_nama varchar(255),
    nilai int
);

alter table indikator_kriteria 
    add column indikator_id int,
    add foreign key (indikator_id) references indikator(id);
alter table indikator add column section_sub_id int,
    add foreign key (section_sub_id) references section_sub(id);
alter table section_sub add column section_id int,
    add foreign key (section_id) references section(id);


alter table infrastruktur_evaluasi_sub add column section_sub_skor_result int;
alter table infrastruktur_evaluasi_sub_indikator drop column indikator_skor_kategori;

/* Buat data dummy */
start transaction;
insert into section (section_nama, section_kategori_decision) values ('Kondisi Bangunan', 'return x > 93.5 ? \'(Berfungsi)\' : x > 33 ? \'(Kurang Berfungsi)\' : \'(Tidak Berfungsi)\'');

set @section_id = last_insert_id();

insert into section_sub (section_sub_nama, section_sub_bobot, section_sub_kategori_decision, section_id) values ('StrukturA', 40, 'return x > 80 ? [\'baik\', 100] : x > 40 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', @section_id);

set @section_sub_id = last_insert_id();

insert into indikator (indikator_nama, indikator_bobot, section_sub_id) values ('Kondisi Struktur Bawah (Fondasi)', 30, @section_sub_id);
set @indikator_id = last_insert_id();
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Tidak ada penurunan/retak, fondasi stabil.', 3, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1, @indikator_id);


insert into indikator (indikator_nama, indikator_bobot, section_sub_id) values ('Kondisi Struktur Bawah (Fondasi)', 30, @section_sub_id);
set @indikator_id = last_insert_id();
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Tidak ada penurunan/retak, fondasi stabil.', 3, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1, @indikator_id);

insert into indikator (indikator_nama, indikator_bobot, section_sub_id) values ('Kondisi Struktur Bawah (Fondasi)', 30, @section_sub_id);
set @indikator_id = last_insert_id();
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Tidak ada penurunan/retak, fondasi stabil.', 3, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1, @indikator_id);

insert into section_sub (section_sub_nama, section_sub_bobot, section_sub_kategori_decision, section_id) values ('StrukturB', 40, 'return x > 80 ? [\'baik\', 100] : x > 40 ? [\'kurang baik\', 50] : [\'tidak baik\', 0]', @section_id);

set @section_sub_id = last_insert_id();

insert into indikator (indikator_nama, indikator_bobot, section_sub_id) values ('Kondisi Struktur Bawah (Fondasi)', 30, @section_sub_id);
set @indikator_id = last_insert_id();
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Tidak ada penurunan/retak, fondasi stabil.', 3, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1, @indikator_id);

insert into indikator (indikator_nama, indikator_bobot, section_sub_id) values ('Kondisi Struktur Bawah (Fondasi)', 30, @section_sub_id);
set @indikator_id = last_insert_id();
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Tidak ada penurunan/retak, fondasi stabil.', 3, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1, @indikator_id);

insert into indikator (indikator_nama, indikator_bobot, section_sub_id) values ('Kondisi Struktur Bawah (Fondasi)', 30, @section_sub_id);
set @indikator_id = last_insert_id();
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Tidak ada penurunan/retak, fondasi stabil.', 3, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Ada retakan kecil/penurunan sebagian namun masih aman digunakan.', 2, @indikator_id);
insert into indikator_kriteria (kriteria_nama, nilai, indikator_id) values ('Retak besar, penurunan signifikan, tidak mampu menahan beban.', 1, @indikator_id);

/* commit jika berhasil */
commit;
/* uncomment rollback jika gagal */
-- rollback;


ALTER TABLE infrastruktur_evaluasi
ADD CONSTRAINT fk_eval_infra
FOREIGN KEY (infrastruktur_id)
REFERENCES infrastruktur(id)
ON DELETE CASCADE;

ALTER TABLE infrastruktur_evaluasi_sub
ADD CONSTRAINT fk_eval_sub_eval
FOREIGN KEY (infrastruktur_evaluasi_id)
REFERENCES infrastruktur_evaluasi(id)
ON DELETE CASCADE;

ALTER TABLE infrastruktur_evaluasi_sub_indikator
ADD CONSTRAINT fk_eval_sub_indikator_sub
FOREIGN KEY (infrastruktur_evaluasi_sub_id)
REFERENCES infrastruktur_evaluasi_sub(id)
ON DELETE CASCADE;

ALTER TABLE infrastruktur_evaluasi_sub_indikator_kriteria
ADD CONSTRAINT fk_eval_sub_indikator_kriteria_indikator
FOREIGN KEY (infrastruktur_evaluasi_sub_indikator_id)
REFERENCES infrastruktur_evaluasi_sub_indikator(id)
ON DELETE CASCADE;