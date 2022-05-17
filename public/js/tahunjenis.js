// function addTahunJenis(btnTambah, btnClose, create) {
//     document.getElementById(btnTambah).addEventListener("click", function () {
//         var btnTambah = document.getElementById(btnTambah),
//             formTambah = document.getElementById(create);

//         btnTambah.classList.add("d-none");
//         formTambah.classList.remove("d-none");
//     });
//     document.getElementById(btnClose).addEventListener("click", function () {
//         var btnTambah = document.getElementById(btnTambah),
//             formTambah = document.getElementById(create);

//         btnTambah.classList.remove("d-none");
//         formTambah.classList.add("d-none");
//     });
// }
function addTahunJenis(btnTambahParm, createParm) {
    var btnTambah = document.getElementById(btnTambahParm),
        formTambah = document.getElementById(createParm);

    btnTambah.classList.add("d-none");
    formTambah.classList.remove("d-none");
}
function closeTahunJenis(btnTambahParm, createParm) {
    var btnTambah = document.getElementById(btnTambahParm),
        formTambah = document.getElementById(createParm);

    btnTambah.classList.remove("d-none");
    formTambah.classList.add("d-none");
}

document
    .getElementById("btnTambahTahun")
    .addEventListener("click", function () {
        addTahunJenis("btnTambahTahun", "createTahun");
    });
document.getElementById("closeTahun").addEventListener("click", function () {
    closeTahunJenis("btnTambahTahun", "createTahun");
});

document
    .getElementById("btnTambahJenis")
    .addEventListener("click", function () {
        addTahunJenis("btnTambahJenis", "createJenis");
    });
document.getElementById("closeJenis").addEventListener("click", function () {
    closeTahunJenis("btnTambahJenis", "createJenis");
});
