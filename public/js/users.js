const searchBar = document.querySelector(".search input"),
    searchIcon = document.querySelector(".search button"),
    usersList = document.querySelector(".users-list");
    // jsUser = usersList.querySelector(".js-user");

searchIcon.onclick = () => {
    searchBar.classList.toggle("show");
    searchIcon.classList.toggle("active");
    searchBar.focus();
    if (searchBar.classList.contains("active")) {
        searchBar.value = "";
        searchBar.classList.remove("active");
    }
};

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value.toLowerCase();
    if (searchTerm != "") {
        searchBar.classList.add("active");
    } else {
        searchBar.classList.remove("active");
    }
    let a = usersList.querySelectorAll("a.js-user");
    // console.log(a);

    for(i = 0; i < a.length; i++) {
        let span = a[i].querySelectorAll(".details span")[0];
        txtValue = span.textContent || span.innerText;
        // console.log(span);
        if (txtValue.toLowerCase().indexOf(searchTerm) > -1) {
            a[i].style.display = "";
        }
        else {
            a[i].style.display = "none";
        }
    }
};

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/tinnhan/getlistuser", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains("active")) {
                    usersList.innerHTML = data;
                }
            }
        }
    };
    xhr.send();
}, 500);

