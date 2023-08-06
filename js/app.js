let menubtn = document.querySelector("#menubtn");
let closeMenuBtn = document.querySelector(".closebtn");
let fromSearch = document.querySelector("#search");
let btnSearch = document.querySelector("#btnsearch i");



closeMenuBtn.addEventListener("click", closeNav);
menubtn.addEventListener("click", openNav);

btnSearch.addEventListener("click", submitSearchFrom);

function openNav() {
    menubtn.style.visibility = "hidden";
    document.getElementById("mySidenav").style.width = "230px";
    document.getElementById("main").style.marginLeft = "250px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
    menubtn.style.visibility = "visible";
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft = "0";
    document.body.style.backgroundColor = "white";
}

function submitSearchFrom() {
    // console.log(btnSearch);
    fromSearch.submit();
}

// console.log(btnSearch);


