/* Function for link active */
// function activeLink() {
//     let page = location.pathname.split("/").pop();
//     // console.log(page);
//     $('#list-nav > .items-center > a[href="' + "/" + page + '"]').addClass(
//         "active-link"
//     );
// }
// activeLink();

/* Function for remove Vie */
function removeVietnameseTones(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
    str = str.replace(/đ/g, "d");
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, "A");
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, "E");
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, "I");
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, "O");
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, "U");
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, "Y");
    str = str.replace(/Đ/g, "D");
    // Some system encode vietnamese combining accent as individual utf-8 characters
    // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
    str = str.replace(/\u02C6|\u0306|\u031B/g, ""); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
    // Remove extra spaces
    // Bỏ các khoảng trắng liền nhau
    str = str.replace(/ + /g, " ");
    str = str.trim();
    // Remove punctuations
    // Bỏ dấu câu, kí tự đặc biệt
    str = str.replace(
        /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
        ""
    );
    return str;
}

/* Function for auto set value Ma mon hoc, Ma khoa */
function valMa() {
    let ma = $(this).val();
    ma = ma.split(" ");
    for (let i = 0; i < ma.length; i++) {
        ma[i] = ma[i].charAt(0).toUpperCase();
    }
    $("#monhoc_id, #khoa_id, #bomon_id").val(
        removeVietnameseTones(ma.join(""))
    );
}
$("#tenmonhoc, #tenkhoa, #tenbomon").on("keyup", valMa);
$("#tenmonhoc, #tenkhoa, #tenbomon").on("keyup");

/* Function for auto set value Ma phong thi */
function valTachMaGD() {
    let maGiangDuong = $("#giangduong_id option:selected").val();
    let tachSoPhong = $(this).val().split(" ");
    let soPhong = tachSoPhong[tachSoPhong.length - 1];
    $("#phongthi_id").val(maGiangDuong + "-" + soPhong);
}
$("#giangduong_id").on("change", valTachMaGD);
$("#tenphongthi").on("keyup", valTachMaGD);
$("#tenphongthi").on("keyup");

// Function for auto set value tengiangvien in lichcoithi
// Edit lich thi page
$("#giangvien_id1")
    .change(function () {
        var str = "";
        $("#giangvien_id1 option:selected").each(function () {
            str += $(this).text() + " ";
        });
        $("#tengiangvien1").val(str);
    })
    .change();

$("#giangvien_id2")
    .change(function () {
        var str = "";
        $("#giangvien_id2 option:selected").each(function () {
            str += $(this).text() + " ";
        });
        $("#tengiangvien2").val(str);
    })
    .change();

const city = document.querySelector("#city");
const cityName = document.querySelector("#cityName");
const Temp = document.querySelector("#temp");
const main = document.querySelector("#main");
const discription = document.querySelector("#discription");
const image = document.querySelector("#image");
weatherUpdate = (city) => {
    const xhr = new XMLHttpRequest();
    xhr.open(
        "GET",
        `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=cad7ec124945dcfff04e457e76760d90`
    );
    // in place of appid enter your open weather API Key
    // You can create it for free
    // https://home.openweathermap.org/users/sign_up

    xhr.send();
    xhr.onload = () => {
        if (xhr.status === 404) {
            alert("Place not found");
        } else {
            var data = JSON.parse(xhr.response);
            cityName.innerHTML = data.name;
            Temp.innerHTML = `${Math.round(data.main.temp - 273.15)}°C`;
            main.innerHTML = data.weather[0].main;
            discription.innerHTML = data.weather[0].description;
            image.src = `https://openweathermap.org/img/wn/${data.weather[0].icon}@2x.png`;
        }
    };
};
weatherUpdate("Nha Trang");
