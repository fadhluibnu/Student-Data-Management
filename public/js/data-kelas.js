document.getElementById("btnTambah").addEventListener("click", function () {
    var btnTambah = document.getElementById("btnTambah"),
        formTambah = document.getElementById("createkelas");

    btnTambah.classList.add("d-none");
    formTambah.classList.remove("d-none");
});
document.getElementById("closekelas").addEventListener("click", function () {
    var btnTambah = document.getElementById("btnTambah"),
        formTambah = document.getElementById("createkelas");

    btnTambah.classList.remove("d-none");
    formTambah.classList.add("d-none");
});
