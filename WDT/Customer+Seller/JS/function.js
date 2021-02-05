function home() {
    window.open("../HTML/Customer(Home).php","_self")
}

function seller() {
    window.open("../HTML/Seller(Home).php", "_self")
}

function customer(){
    window.location.href="../HTML/Customer(Home).php";
}

var loader = function(e){
    let file = e.target.files;

    let show = "<span>Selected file : </span>" + file[0].name;

    let output = document.getElementById("selector");
    output.innerHTML = show;
    output.classList.add("active");
};

let fileInput = document.getElementById("file");
fileInput.addEventListener("change", loader);

var loader2 = function(e){
    let file = e.target.files;

    let show = "<span>Selected file : </span>" + file[0].name;

    let output = document.getElementById("selector2");
    output.innerHTML = show;
    output.classList.add("active");
};

let fileInput2 = document.getElementById("file2");
fileInput2.addEventListener("change", loader2);

function sellonbb(){
    window.location.href="../HTML/Seller(Login).php";
}

function customerlogout(){
    window.location.href="../PHP/Customer(logout).php";
}

function sellerlogin(){
    window.location.href="../HTML/Seller(Login).php";
}