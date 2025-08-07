Ringkasan Soal:
Pengguna dapat menggunakan endpoint /redeem-voucher untuk klaim voucher. Namun, tidak ada rate limiting dan sistem menerima input dari User-Agent header. Jika disalahgunakan, ini bisa mengubah status pengguna dari biasa menjadi admin, membuka akses ke halaman admin.php yang menyimpan flag.

Target Soal:
Eksploitasi tidak adanya rate limiting dengan mengubah User-Agent secara berulang.

Trigger backend logic lemah yang mengandalkan input User-Agent.

Mendapatkan akses admin.php (privilege escalation) dan ambil flag.
