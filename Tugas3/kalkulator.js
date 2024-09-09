function hitung(operasi) {
    var bil1 = parseFloat(document.getElementById("bilangan1").value);
    var bil2 = parseFloat(document.getElementById("bilangan2").value);
    var hasil = 0;

    // Mengecek apakah bilangan telah diisi
    if (isNaN(bil1) || isNaN(bil2)) {
        document.getElementById("hasil").value = "Input tidak valid";
        return;
    }

    // Melakukan operasi berdasarkan tombol yang ditekan
    if (operasi === '+') {
        hasil = bil1 + bil2;
    } else if (operasi === '-') {
        hasil = bil1 - bil2;
    } else if (operasi === '*') {
        hasil = bil1 * bil2;
    } else if (operasi === '/') {
        // Cek pembagian dengan nol
        if (bil2 === 0) {
            document.getElementById("hasil").value = "Tidak bisa bagi nol";
            return;
        }
        hasil = bil1 / bil2;
    }

    // Menampilkan hasil perhitungan
    document.getElementById("hasil").value = hasil;

}