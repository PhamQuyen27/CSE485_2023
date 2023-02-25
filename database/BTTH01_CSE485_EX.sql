/*a*/
SELECT * FROM baiviet INNER JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai WHERE ten_tloai = "Nhạc trữ tình";

/*b*/
SELECT * FROM baiviet INNER JOIN tacgia on baiviet.ma_tgia = tacgia.ma_tgia where ten_tgia = "Nhacvietplus";
/*c*/
SELECT ten_tloai FROM theloai WHERE ma_tloai NOT IN(SELECT ma_tloai from baiviet);

/*d*/
SELECT bv.ma_bviet, bv.tieude, bv.ten_bhat,tg.ten_tgia, tl.ten_tloai, bv.ngayviet FROM baiviet as bv JOIN theloai as tl ON bv.ma_tloai = tl.ma_tloai
JOIN tacgia as tg ON bv.ma_tgia = tg.ma_tgia;

/*e*/
SELECT theloai.ten_tloai, COUNT(baiviet.ma_tloai) as COUNT FROM baiviet JOIN theloai ON baiviet.ma_tloai = theloai.ma_tloai GROUP BY baiviet.ma_tloai ORDER BY count DESC LIMIT 1;

/*f*/
SELECT tacgia.ten_tgia, COUNT(baiviet.ma_tgia) as COUNT FROM baiviet JOIN tacgia ON baiviet.ma_tgia = tacgia.ma_tgia GROUP BY baiviet.ma_tgia ORDER BY count DESC LIMIT 2;

/*g*/
SELECT * FROM baiviet WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE'%em%';

/*h*/
SELECT * FROM baiviet WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE'%em%' OR tieude LIKE '%yêu%' OR tieude LIKE '%thương%' OR tieude LIKE '%anh%' OR tieude LIKE '%em%';

/*i*/
CREATE VIEW vw_Music AS SELECT bv.ma_bviet, bv.tieude,bv.ten_bhat,bv.ma_tloai,bv.tomtat,bv.noidung, bv.ma_tgia, bv.ngayviet, bv.hinhanh, tl.ten_tloai, tg.ten_tgia FROM baiviet as bv JOIN theloai as tl ON bv.ma_tloai = tl.ma_tloai JOIN tacgia as tg ON bv.ma_tgia = tg.ma_tgia;



/*l*/
CREATE TABLE Users (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(200) NOT NULL,
    password VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    UNIQUE KEY (username)
);
