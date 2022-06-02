document.getElementById("jenisUjian").addEventListener("click", function () {
    setInput("jenis-ujian", "jenisSelect", "jenisUjian", "data-slug-jenis");
});
document.getElementById("tahunUjian").addEventListener("click", function () {
    setInput("tahun-ujian", "tahunSelect", "tahunUjian", "data-slug-tahun");
});
function showButton() {
    document.getElementById("cek-nilai-btn").classList.remove("d-none");
}
