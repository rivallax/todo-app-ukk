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
