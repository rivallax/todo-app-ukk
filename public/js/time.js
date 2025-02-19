function updateTime() {
    let now = new Date();
    let hours = String(now.getHours()).padStart(2, '0');
    let minutes = String(now.getMinutes()).padStart(2, '0');
    let seconds = String(now.getSeconds()).padStart(2, '0');

    document.getElementById("real-time").innerText = `${hours}:${minutes}:${seconds}`;
}

// Memperbarui waktu setiap detik
setInterval(updateTime, 1000);

// Memanggil fungsi pertama kali agar tidak ada delay
updateTime();


setInterval(function() {
    fetch('/tasks/low') // Endpoint untuk mengambil data task dengan priority low
    .then(response => response.json())
    .then(data => {
        document.getElementById('completed_low').innerText = data.count;
        document.getElementById('last_updated').innerText = data.last_updated; // Menampilkan waktu perubahan
    });
}, 5000); // Memeriksa setiap 5 detik
