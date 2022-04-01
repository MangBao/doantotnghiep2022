
CREATE TABLE IF NOT EXISTS `quyen` (
  `idquyen` varchar(20) PRIMARY KEY NOT NULL,
  `tenquyen` varchar(100) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `cathi` (
  `idca` varchar(10) PRIMARY KEY NOT NULL,
  `giobatdau` time NOT NULL,
  `gioketthuc` time NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `giangduong` (
  `idgiangduong` varchar(10) PRIMARY KEY NOT NULL,
  `tengiangduong` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `phongthi` (
  `idphongthi` varchar(10) PRIMARY KEY NOT NULL,
  `tenphongthi` varchar(50) NOT NULL,
  `idgiangduong` varchar(10) NOT NULL,
   FOREIGN KEY (`idgiangduong`) REFERENCES `giangduong` (`idgiangduong`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `phongthi_ca` (
  `idphongthi` varchar(10) NOT NULL,
  `idca` varchar(10) NOT NULL,
  `ngaythi` date NOT NULL,
   PRIMARY KEY ( `idphongthi`, `idca`, `ngaythi`),
   FOREIGN KEY (`idphongthi`) REFERENCES `phongthi` (`idphongthi`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`idca`) REFERENCES `cathi` (`idca`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `khoa` (
  `idkhoa` varchar(10) PRIMARY KEY NOT NULL,
  `tenkhoa` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `bomon` (
  `idbomon` varchar(10) PRIMARY KEY NOT NULL,
  `tenbomon` varchar(50) NOT NULL,
  `idkhoa` varchar(10) NOT NULL,
   FOREIGN KEY (`idkhoa`) REFERENCES `khoa` (`idkhoa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `monthi` (
  `idmonthi` varchar(10) PRIMARY KEY NOT NULL,
  `tenmonthi` varchar(50) NOT NULL,
  `idbomon` varchar(10) NOT NULL,
   FOREIGN KEY (`idbomon`) REFERENCES `bomon` (`idbomon`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `giangvien` (
  `idgiangvien` varchar(10) PRIMARY KEY NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tengiangvien` varchar(50) NOT NULL,
  `connho` tinyint(4),
  `ngaysinh` date,
  `diachi` 	varchar(50),
  `sdt` varchar(20),
  `avatar` varchar(250),
  `idbomon` varchar(10) NOT NULL,
   FOREIGN KEY (`idbomon`) REFERENCES `bomon` (`idbomon`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `quyen_giangvien` (
  `idquyen` varchar(20) NOT NULL,
  `idgiangvien` varchar(10) NOT NULL,
   PRIMARY KEY ( `idquyen`, `idgiangvien`),
   FOREIGN KEY (`idgiangvien`) REFERENCES `giangvien` (`idgiangvien`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE IF NOT EXISTS `xeplichcoithi` (
  `idlichcoithi` varchar(10) NOT NULL,
  `idgiangvien` varchar(10) NOT NULL,
  `idmonthi` varchar(10) NOT NULL,
  `idphongthi` varchar(10) NOT NULL,
  `idca` varchar(10) NOT NULL,
  `idgiangduong` varchar(10) NOT NULL,
   PRIMARY KEY ( `idlichcoithi`, `idgiangvien`, `idphongthi`, `idca`),
   FOREIGN KEY (`idgiangvien`) REFERENCES `giangvien` (`idgiangvien`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`idmonthi`) REFERENCES `monthi` (`idmonthi`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`idphongthi`) REFERENCES `phongthi` (`idphongthi`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`idca`) REFERENCES `cathi` (`idca`) ON DELETE CASCADE ON UPDATE CASCADE,
   FOREIGN KEY (`idgiangduong`) REFERENCES `giangduong` (`idgiangduong`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8mb4;
