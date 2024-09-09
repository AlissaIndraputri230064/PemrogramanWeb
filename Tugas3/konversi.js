function konversiNilai() {
    var nilai = parseInt(document.getElementById("nilaiAngka").value);
    var nilaiHuruf = "";

    if (nilai >= 0 && nilai <= 40) {
        nilaiHuruf = "E";
    } else if (nilai >= 41 && nilai <= 55) {
        nilaiHuruf = "D";
    } else if (nilai >= 56 && nilai <= 60) {
        nilaiHuruf = "C";
    } else if (nilai >= 61 && nilai <= 65) {
        nilaiHuruf = "BC";
    } else if (nilai >= 66 && nilai <= 70) {
        nilaiHuruf = "B";
    } else if (nilai >= 71 && nilai <= 80) {
        nilaiHuruf = "AB";
    } else if (nilai >= 81 && nilai <= 100) {
        nilaiHuruf = "A";
    } else {
        nilaiHuruf = "Nilai tidak valid";
    }

    document.getElementById("result").innerHTML = "Nilai huruf: " + nilaiHuruf;

}