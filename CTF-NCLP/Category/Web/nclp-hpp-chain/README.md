# NCLP CTF – Web Exploitation: HTTP Parameter Pollution Chain

## 🎯 Challenge Story
Sebuah portal admin dipasang berlapis dengan tiga dashboard sebelum mencapai server internal.  
Setiap dashboard diklaim "aman", tetapi ternyata masih memiliki kelemahan **HTTP Parameter Pollution (HPP)**.

Tugas kamu adalah:
1. **Bypass Dashboard A** dengan memanfaatkan duplikasi parameter (`role`).
2. **Bypass Dashboard B** dengan memanfaatkan alternate separator (`;`).
3. **Bypass Dashboard C** dengan memanfaatkan array/nested parameter (`scope[]`).
4. **Pivot** ke server internal dan ambil **flag final**.

## 🏁 Flag
- Format: `NCLP{uuid-v4}`
- Contoh: `NCLP{74ab6628-f9f0-4b4f-98c3-95a51676d8fa}`
- **Hanya flag final** yang valid untuk submit.
- Token dari Dashboard A/B/C hanya sebagai breadcrumb.

## 🔧 Installation & Run
```bash
docker compose up -d --build
```
Akses di browser: [http://localhost:8000](http://localhost:8000)

## 🔍 Hint Cepat
- **Dashboard A** → `?role=user&role=admin`
- **Dashboard B** → `?ip=127.0.0.1;ip=10.0.0.1`
- **Dashboard C** → `?scope=read&scope[]=elevated` lalu proxy ke `/internal/flag`

## 📂 Project Structure
```
nclp-hpp-chain/
├─ docker-compose.yml
├─ reverse-proxy/
│  └─ nginx.conf
├─ dashboard-a/
│  └─ index.php
├─ dashboard-b/
│  └─ index.php
├─ dashboard-c/
│  └─ index.php
└─ internal-server/
   ├─ index.php
   └─ .env
```

## 📝 Notes
- Aplikasi ini **sengaja insecure** dan hanya untuk tujuan edukasi CTF.
- Jangan pernah deploy ke environment production.
- Semua service berbasis `php:8.2-apache`.
