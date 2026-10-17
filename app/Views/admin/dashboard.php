<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard CMS | SMPIT Al Firdaus Purwodadi</title>
    <style>
        :root{--navy:#0b2142;--blue:#1769e0;--blue2:#2f8cff;--ink:#173153;--muted:#71819a;--line:#e2eaf4;--bg:#f3f7fc;--white:#fff}
        *{box-sizing:border-box}
        body{margin:0;font-family:Inter,"Segoe UI",Arial,sans-serif;background:var(--bg);color:var(--ink)}
        a{color:inherit}
        .layout{display:flex;min-height:100vh}
        .sidebar{width:260px;flex:0 0 260px;background:linear-gradient(180deg,#0b2142,#0b1933);color:#fff;padding:22px 14px;display:flex;flex-direction:column}
        .brand{display:flex;align-items:center;gap:12px;padding:3px 9px 24px;border-bottom:1px solid #ffffff1c;margin-bottom:18px}
        .brand-icon{height:48px;width:48px;flex:0 0 48px;display:grid;place-items:center;overflow:hidden;border-radius:15px;background:linear-gradient(135deg,#fff,#dbeafe);color:#123d76;font-size:17px;font-weight:900;box-shadow:0 7px 20px #0002}.brand-logo{width:100%;height:100%;object-fit:contain;background:#fff;padding:4px;border-radius:15px}
        .brand strong{display:block;font-size:13px;letter-spacing:.2px}.brand small{display:block;color:#b8c9e4;margin-top:4px;font-size:12px}
        .menu-label{margin:19px 12px 8px;color:#91a9ca;font-size:10px;font-weight:800;letter-spacing:1.4px}
        .menu a{display:flex;align-items:center;gap:12px;padding:11px 12px;margin:4px 0;border-radius:11px;color:#dce8fa;text-decoration:none;font-size:13px;transition:background .18s,transform .18s}
        .menu a:hover{background:#ffffff12;transform:translateX(2px)}.menu a.active{background:linear-gradient(100deg,#1675f8,#2e8cff);color:#fff;box-shadow:0 7px 18px #1675f833}
        .menu-icon{width:22px;height:22px;display:inline-flex;align-items:center;justify-content:center;flex:0 0 22px}
        .menu-icon svg{width:19px;height:19px;fill:none;stroke:currentColor;stroke-width:1.8;stroke-linecap:round;stroke-linejoin:round}
        .sidebar-bottom{margin-top:auto;padding-top:20px}
        .admin-chip{display:flex;align-items:center;gap:10px;padding:12px;border:1px solid #ffffff20;background:#ffffff0b;border-radius:13px}
        .admin-avatar{height:38px;width:38px;border-radius:50%;display:grid;place-items:center;background:#e5efff;color:#123d76;font-weight:800}
        .admin-chip strong{display:block;font-size:12px}.admin-chip small{display:block;color:#b8c9e4;font-size:11px;margin-top:3px}
        .main{flex:1;min-width:0}
        .topbar{height:70px;display:flex;align-items:center;gap:18px;padding:0 30px;background:#fff;border-bottom:1px solid var(--line)}
        .hamburger{font-size:22px;color:#183b68}.search{flex:1;max-width:600px;position:relative}
        .search input{width:100%;height:42px;border:1px solid #e4ebf5;background:#f6f9fd;border-radius:12px;padding:0 15px;font:inherit;font-size:13px;outline:none}
        .search input:focus{border-color:#8bb8f7;box-shadow:0 0 0 3px #1769e015}
        .topbar-right{margin-left:auto;display:flex;align-items:center;gap:14px}.topbar-right .admin-avatar{height:37px;width:37px;background:#14365f;color:#fff}
        .topbar-right strong{display:block;font-size:12px}.topbar-right small{display:block;color:var(--muted);font-size:11px;margin-top:3px}
        .content{padding:26px 30px 36px;max-width:1700px;margin:auto}
        .page-heading{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:20px}
        h1{font-size:26px;letter-spacing:-.5px;margin:0 0 6px;color:#102b4d}.breadcrumb{font-size:12px;color:#8a9ab0}
        .logout{display:inline-flex;align-items:center;justify-content:center;padding:10px 15px;border:1px solid var(--line);border-radius:10px;background:#fff;text-decoration:none;color:#34516f;font-size:12px;font-weight:700}
        .logout:hover{border-color:#b7cff0;background:#f8fbff}
        .welcome-banner{position:relative;overflow:hidden;border-radius:18px;padding:27px 30px;margin-bottom:20px;background:linear-gradient(110deg,#0d3265 0%,#1559a5 55%,#2586ed 100%);color:#fff;box-shadow:0 12px 30px #174b841c}
        .welcome-banner:before,.welcome-banner:after{content:"";position:absolute;border-radius:50%;border:1px solid #ffffff22;pointer-events:none}
        .welcome-banner:before{width:300px;height:300px;right:7%;top:-190px}.welcome-banner:after{width:230px;height:230px;right:2%;bottom:-180px}
        .eyebrow{font-size:11px;letter-spacing:1.7px;font-weight:800;color:#c7e2ff;text-transform:uppercase}
        .welcome-banner h2{font-size:27px;margin:9px 0 8px;letter-spacing:-.4px}.welcome-banner p{font-size:13px;line-height:1.7;color:#e0edff;max-width:650px;margin:0}
        .banner-tag{position:absolute;right:28px;bottom:25px;border:1px solid #ffffff38;background:#ffffff12;padding:9px 13px;border-radius:999px;font-size:11px;color:#e9f4ff}
        .quick-stats{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:15px;margin-bottom:22px}
        .stat-card{display:flex;align-items:center;gap:13px;padding:18px;background:#fff;border:1px solid var(--line);border-radius:15px;min-width:0;box-shadow:0 4px 14px #16375a05}
        .stat-icon{width:46px;height:46px;border-radius:14px;display:grid;place-items:center;font-size:21px;flex:0 0 46px}
        .stat-icon.blue{background:#e5f1ff;color:#1674ed}.stat-icon.green{background:#def8ef;color:#0b9e74}.stat-icon.orange{background:#fff0df;color:#e8871a}.stat-icon.purple{background:#f0e8ff;color:#8250d8}
        .stat-card span{display:block;font-size:11px;color:var(--muted);margin-bottom:6px}.stat-card strong{display:block;font-size:17px;color:#173153;line-height:1.3}
        .dashboard-columns{display:grid;grid-template-columns:minmax(0,1.55fr) minmax(280px,.9fr);gap:18px;align-items:start}
        .panel{background:#fff;border:1px solid var(--line);border-radius:17px;padding:22px;box-shadow:0 5px 20px #16375a05;margin-bottom:18px}
        .panel-heading{display:flex;justify-content:space-between;align-items:center;gap:12px;margin-bottom:5px}
        .panel h2{font-size:17px;margin:0;color:#173153}.panel-subtitle{font-size:12px;color:#8493a9;margin:6px 0 18px}
        .cms-menu{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:12px}
        .cms-menu a{display:grid;grid-template-columns:42px minmax(0,1fr);grid-template-rows:auto 1fr;column-gap:12px;row-gap:7px;align-items:start;min-width:0;min-height:132px;padding:17px 15px;border:1px solid #e2eaf5;border-radius:13px;text-decoration:none;transition:transform .18s,border-color .18s,box-shadow .18s;background:linear-gradient(145deg,#fff,#fbfdff)}
        .cms-menu a:hover{transform:translateY(-3px);border-color:#a9cdfa;box-shadow:0 10px 22px #174b8410}
        .tile-icon{width:42px;height:42px;grid-column:1;grid-row:1 / span 2;display:grid;place-items:center;border-radius:13px;background:#e8f2ff;color:#1769e0;font-size:18px}
        .tile-icon.green{background:#e0f8ef;color:#0a9b72}.tile-icon.orange{background:#fff0df;color:#d97706}.tile-icon.purple{background:#f1eaff;color:#8151d4}.tile-icon.cyan{background:#dcf8fc;color:#0796ad}.tile-icon.rose{background:#ffe7ed;color:#d93463}
        .cms-menu strong{display:block;grid-column:2;min-width:0;font-size:13px;margin:2px 0 0;color:#173153;line-height:1.45;overflow-wrap:anywhere}.cms-menu span.desc{display:block;grid-column:2;min-width:0;color:#7d8da5;font-size:12px;line-height:1.65;overflow-wrap:anywhere}
        .arrow{display:none}
        .shortcut-link{font-size:11px;color:#1769e0;text-decoration:none;font-weight:700}
        .side-panel{padding:20px}.mini-list{display:grid;gap:0}.mini-row{display:flex;align-items:center;gap:11px;padding:13px 0;border-bottom:1px solid #edf1f7}.mini-row:last-child{border-bottom:0;padding-bottom:0}
        .mini-symbol{width:35px;height:35px;flex:0 0 35px;border-radius:11px;display:grid;place-items:center;background:#edf5ff;color:#1769e0;font-size:16px}
        .mini-row strong{display:block;font-size:12px;color:#294566}.mini-row small{display:block;font-size:11px;color:#8795aa;margin-top:4px;line-height:1.45}
        .notice{padding:13px 14px;border-radius:12px;background:#f3f8ff;color:#59718e;font-size:12px;line-height:1.65;border:1px solid #e3efff}
        .footer-note{text-align:center;font-size:11px;color:#9aa7b8;padding:4px 0 0}
        @media(max-width:1250px){.quick-stats{grid-template-columns:repeat(2,minmax(0,1fr))}.dashboard-columns{grid-template-columns:1fr}.cms-menu{grid-template-columns:repeat(3,minmax(0,1fr))}}
        @media(max-width:850px){.sidebar{width:76px;flex-basis:76px;padding:18px 8px}.brand{justify-content:center;padding:0 0 20px}.brand>div:last-child,.menu-label,.menu a span:last-child,.admin-chip>div:last-child{display:none}.menu a{justify-content:center;padding:13px 4px}.menu-icon{width:24px}.admin-chip{justify-content:center;padding:8px}.content{padding:22px 18px}.topbar{padding:0 18px}.banner-tag{display:none}}
        @media(max-width:600px){.topbar{height:60px;padding:0 12px;gap:10px}.topbar-right>div:last-child{display:none}.content{padding:18px 12px}.page-heading{align-items:flex-start}h1{font-size:23px}.welcome-banner{padding:22px 20px}.welcome-banner h2{font-size:23px}.quick-stats{grid-template-columns:1fr 1fr;gap:9px}.stat-card{padding:12px;gap:9px}.stat-icon{width:37px;height:37px;flex-basis:37px;border-radius:11px}.stat-card strong{font-size:14px}.stat-card span{font-size:10px}.panel{padding:16px}.cms-menu{grid-template-columns:repeat(2,minmax(0,1fr));gap:10px}.cms-menu a{display:grid;grid-template-columns:36px minmax(0,1fr);min-height:145px;padding:12px;column-gap:9px}.tile-icon{width:36px;height:36px;grid-column:1;grid-row:1 / span 2;margin:0}.cms-menu strong,.cms-menu span.desc{grid-column:2}.search input{font-size:11px}.logout{padding:8px 10px}}
        @media(max-width:390px){.quick-stats,.cms-menu{grid-template-columns:1fr}.stat-card{padding:15px}.cms-menu a{min-height:0}}
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">
            <?php $adminSiteLogo = trim((string) ($settings['site_logo'] ?? '')); ?>
            <div class="brand-icon"><?php if ($adminSiteLogo !== ''): ?><img class="brand-logo" src="<?= base_url('assets/images/' . ltrim($adminSiteLogo, '/')) ?>" alt="Logo sekolah" onerror="this.style.display='none';this.parentElement.textContent='AF'"><?php else: ?>AF<?php endif; ?></div>
            <div><strong><?= esc($settings['site_name'] ?? 'SMPIT AL FIRDAUS') ?></strong><small>Purwodadi</small></div>
        </div>
        <nav class="menu">
            <a class="active" href="<?= site_url('admin/dashboard') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg></span><span>Dashboard</span></a>
            <div class="menu-label">PENGELOLAAN</div>
            <a href="<?= site_url('admin/profil') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6"/></svg></span><span>Profil Sekolah</span></a>
            <a href="<?= site_url('admin/programs') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M4 5.5A3.5 3.5 0 0 1 7.5 2H20v16H7.5A3.5 3.5 0 0 0 4 21.5zM4 5.5v16M8 6h8M8 10h8"/></svg></span><span>Program Unggulan</span></a>
            <a href="<?= site_url('admin/posts') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M5 3h14v18H5zM8 7h8M8 11h8M8 15h5"/></svg></span><span>Berita &amp; Pengumuman</span></a>
            <a href="<?= site_url('admin/galleries') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m21 15-5-5L5 21"/></svg></span><span>Galeri Kegiatan</span></a>
            <a href="<?= site_url('admin/achievements') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="5"/><path d="m8.5 12-1 9 4.5-2.5 4.5 2.5-1-9"/></svg></span><span>Prestasi</span></a>
            <div class="menu-label">PENGATURAN</div>
            <a href="<?= site_url('admin/settings') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19 13.5a7 7 0 0 0 0-3l2-1.5-2-3.5-2.4 1a7 7 0 0 0-2.6-1L13.5 3h-4L9 5.5a7 7 0 0 0-2.6 1L4 5.5 2 9l2 1.5a7 7 0 0 0 0 3L2 15l2 3.5 2.4-1a7 7 0 0 0 2.6 1l.5 2.5h4l.5-2.5a7 7 0 0 0 2.6-1l2.4 1 2-3.5z"/></svg></span><span>Pengaturan Website</span></a>
            <a href="<?= site_url('admin/program-icons') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="3"/><circle cx="9" cy="9" r="2"/><path d="m21 15-5-5L5 21"/></svg></span><span>Pustaka Ikon Program</span></a>
            <div class="menu-label">AKUN</div>
            <a href="<?= site_url('admin/logout') ?>"><span class="menu-icon"><svg viewBox="0 0 24 24"><path d="M10 17l5-5-5-5M15 12H3M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/></svg></span><span>Keluar</span></a>
        </nav>
        <div class="sidebar-bottom"><div class="admin-chip"><div class="admin-avatar">AF</div><div><strong><?= esc(session()->get('admin_full_name') ?: 'Administrator') ?></strong><small>SMPIT Al Firdaus</small></div></div></div>
    </aside>
    <div class="main">
        <header class="topbar">
            <span class="hamburger" aria-hidden="true">☰</span>
            <label class="search"><input type="search" id="menuSearch" placeholder="Cari menu atau halaman..." aria-label="Cari menu dashboard"></label>
            <div class="topbar-right"><div class="admin-avatar">AF</div><div><strong><?= esc(session()->get('admin_full_name') ?: 'Administrator') ?></strong><small>Administrator sekolah</small></div></div>
        </header>
        <main class="content">
            <div class="page-heading">
                <div><h1>Dashboard</h1><div class="breadcrumb">Beranda &nbsp;›&nbsp; Dashboard</div></div>
                <a class="logout" href="<?= site_url('admin/logout') ?>">Keluar ↗</a>
            </div>
            <section class="welcome-banner">
                <div class="eyebrow">Panel pengelolaan sekolah</div>
                <h2>Selamat datang, <?= esc(session()->get('admin_full_name') ?: 'Administrator') ?> 👋</h2>
                <p>Kelola profil sekolah, program unggulan, berita, galeri, dan prestasi SMPIT Al Firdaus Purwodadi dari satu tempat.</p>
                <span class="banner-tag">✦ Cerdas · Berakhlak · Berprestasi</span>
            </section>
            <section class="quick-stats" aria-label="Ringkasan menu">
                <a class="stat-card" href="<?= site_url('admin/posts') ?>" style="text-decoration:none"><div class="stat-icon blue">▤</div><div><span>Publikasi sekolah</span><strong>Berita &amp; Pengumuman</strong></div></a>
                <a class="stat-card" href="<?= site_url('admin/galleries') ?>" style="text-decoration:none"><div class="stat-icon green">▧</div><div><span>Dokumentasi</span><strong>Galeri Kegiatan</strong></div></a>
                <a class="stat-card" href="<?= site_url('admin/achievements') ?>" style="text-decoration:none"><div class="stat-icon orange">🏆</div><div><span>Pencapaian siswa</span><strong>Prestasi Sekolah</strong></div></a>
                <a class="stat-card" href="<?= site_url('admin/programs') ?>" style="text-decoration:none"><div class="stat-icon purple">☆</div><div><span>Program aktif</span><strong>TCP · ICT · ICP</strong></div></a>
            </section>
            <div class="dashboard-columns">
                <section class="panel">
                    <div class="panel-heading"><h2>Menu Pengelolaan Website</h2></div>
                    <p class="panel-subtitle">Pilih menu untuk mengelola konten website sekolah.</p>
                    <div class="cms-menu" id="cmsMenu">
                        <a href="<?= site_url('admin/profil') ?>" data-search="profil sekolah visi misi sejarah alamat kontak"><div class="tile-icon">⌂</div><strong>Profil Sekolah</strong><span class="desc">Kelola visi, misi, sejarah, dan informasi sekolah.</span><span class="arrow">›</span></a>
                        <a href="<?= site_url('admin/programs') ?>" data-search="program unggulan tcp ict icp"><div class="tile-icon green">◆</div><strong>Program Unggulan</strong><span class="desc">Kelola informasi program TCP, ICT, dan ICP.</span><span class="arrow">›</span></a>
                        <a href="<?= site_url('admin/posts') ?>" data-search="berita pengumuman artikel publikasi"><div class="tile-icon orange">▤</div><strong>Berita &amp; Pengumuman</strong><span class="desc">Buat dan kelola artikel serta pengumuman.</span><span class="arrow">›</span></a>
                        <a href="<?= site_url('admin/galleries') ?>" data-search="galeri kegiatan foto dokumentasi"><div class="tile-icon purple">▧</div><strong>Galeri Kegiatan</strong><span class="desc">Kelola foto dan dokumentasi kegiatan sekolah.</span><span class="arrow">›</span></a>
                        <a href="<?= site_url('admin/achievements') ?>" data-search="prestasi penghargaan lomba siswa"><div class="tile-icon orange">🏆</div><strong>Prestasi Siswa</strong><span class="desc">Catat dan tampilkan pencapaian siswa.</span><span class="arrow">›</span></a>
                        <a href="<?= site_url('admin/settings') ?>" data-search="pengaturan website identitas kontak tautan"><div class="tile-icon cyan">⚙</div><strong>Pengaturan Website</strong><span class="desc">Atur identitas, kontak, dan tautan website.</span><span class="arrow">›</span></a>
                        <a href="<?= site_url('admin/program-icons') ?>" data-search="ikon program pustaka gambar ikon bawaan"><div class="tile-icon rose">✧</div><strong>Pustaka Ikon Program</strong><span class="desc">Kelola ikon bawaan dan gambar ikon sendiri.</span><span class="arrow">›</span></a>
                    </div>
                </section>
                <div>
                    <section class="panel side-panel">
                        <div class="panel-heading"><h2>Akses Cepat</h2></div>
                        <p class="panel-subtitle">Buka halaman publik untuk memeriksa tampilan konten.</p>
                        <div class="mini-list">
                            <div class="mini-row"><div class="mini-symbol">↗</div><div><strong>Website utama</strong><small>Lihat beranda yang dikunjungi publik</small></div><a class="shortcut-link" href="<?= site_url('/') ?>" target="_blank" rel="noopener">Buka</a></div>
                            <div class="mini-row"><div class="mini-symbol">▤</div><div><strong>Halaman berita</strong><small>Periksa berita dan pengumuman</small></div><a class="shortcut-link" href="<?= site_url('berita') ?>" target="_blank" rel="noopener">Buka</a></div>
                            <div class="mini-row"><div class="mini-symbol">▧</div><div><strong>Halaman galeri</strong><small>Periksa dokumentasi sekolah</small></div><a class="shortcut-link" href="<?= site_url('galeri') ?>" target="_blank" rel="noopener">Buka</a></div>
                            <div class="mini-row"><div class="mini-symbol">🏆</div><div><strong>Halaman prestasi</strong><small>Periksa pencapaian siswa</small></div><a class="shortcut-link" href="<?= site_url('prestasi') ?>" target="_blank" rel="noopener">Buka</a></div>
                        </div>
                    </section>
                    <section class="panel side-panel">
                        <div class="panel-heading"><h2>Catatan Pengelolaan</h2></div>
                        <div class="notice">💡 Setelah menyimpan perubahan, buka halaman publik di tab baru lalu muat ulang untuk memeriksa hasilnya. Pastikan gambar yang diunggah sesuai dengan kegiatan sekolah.</div>
                    </section>
                </div>
            </div>
            <div class="footer-note">CMS SMPIT Al Firdaus Purwodadi · Panel Administrator</div>
        </main>
    </div>
</div>
<script>
(function () {
    const search = document.getElementById('menuSearch');
    const links = Array.from(document.querySelectorAll('#cmsMenu a'));
    if (!search) return;
    search.addEventListener('input', function () {
        const query = this.value.trim().toLocaleLowerCase('id');
        links.forEach(function (link) {
            const text = ((link.innerText || '') + ' ' + (link.dataset.search || '')).toLocaleLowerCase('id');
            link.style.display = text.includes(query) ? '' : 'none';
        });
    });
})();
</script>
</body>
</html>