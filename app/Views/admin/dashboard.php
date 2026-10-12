<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard CMS | SMPIT Al Firdaus</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f5f9;
            color: #263653;
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 255px;
            flex-shrink: 0;
            background: #10072d;
            color: #fff;
            padding: 22px 14px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 8px 25px;
            border-bottom: 1px solid #302647;
            margin-bottom: 20px;
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            background: #fff;
            color: #142d52;
            font-weight: bold;
        }

        .brand strong {
            display: block;
            font-size: 13px;
            line-height: 1.5;
        }

        .brand small {
            display: block;
            color: #c7c1d9;
            font-size: 11px;
        }

        .menu-label {
            margin: 22px 10px 9px;
            color: #aaa2c3;
            font-size: 10px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        .menu a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 10px;
            margin: 3px 0;
            border-radius: 7px;
            color: #e6e2f0;
            text-decoration: none;
            font-size: 13px;
        }

        .menu a:hover,
        .menu a.active {
            background: #30234f;
            color: #fff;
        }

        .menu-icon {
            width: 22px;
            height: 22px;
            flex: 0 0 22px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .menu-icon svg {
            width: 19px;
            height: 19px;
            display: block;
            fill: none;
            stroke: currentColor;
            stroke-width: 1.8;
            stroke-linecap: round;
            stroke-linejoin: round;
        }

        .main {
            flex: 1;
            min-width: 0;
        }

        .topbar {
            height: 66px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 28px;
            background: #fff;
            border-bottom: 1px solid #e7eaf0;
        }

        .topbar small { color: #7a8497; }

        .content {
            padding: 28px;
        }

        .page-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            margin-bottom: 24px;
        }

        h1 {
            margin: 0 0 8px;
            font-size: 25px;
        }

        .breadcrumb {
            color: #8b94a6;
            font-size: 12px;
        }

        .welcome {
            margin-bottom: 24px;
            color: #68758b;
            font-size: 14px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 25px;
        }

        .stat-card {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 12px;
            padding: 22px;
        }

        .stat-card span {
            display: block;
            color: #77839a;
            font-size: 12px;
            margin-bottom: 12px;
        }

        .stat-card strong {
            font-size: 28px;
            color: #172c50;
        }

        .panel {
            background: #fff;
            border: 1px solid #e9edf3;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 22px;
        }

        .panel h2 {
            font-size: 17px;
            margin: 0 0 18px;
        }

        .cms-menu {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
        }

        .cms-menu a {
            display: block;
            padding: 19px;
            border: 1px solid #e0e6ef;
            border-radius: 10px;
            text-decoration: none;
            color: #233957;
            transition: 0.2s;
        }

        .cms-menu a:hover {
            border-color: #8298bd;
            transform: translateY(-2px);
            box-shadow: 0 7px 18px #172c500c;
        }

        .cms-menu strong {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .cms-menu span {
            color: #78849a;
            font-size: 12px;
            line-height: 1.6;
        }

        .logout {
            display: inline-block;
            padding: 9px 13px;
            border-radius: 7px;
            background: #f1f3f7;
            color: #394a64;
            text-decoration: none;
            font-size: 12px;
        }

        @media (max-width: 1000px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
            .cms-menu { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 650px) {
            .sidebar { width: 68px; padding: 15px 7px; }
            .brand { justify-content: center; padding: 0 0 18px; }
            .brand > div:last-child,
            .menu-label,
            .menu a span:last-child { display: none; }
            .menu a { justify-content: center; padding: 13px 4px; }
            .menu-icon { width: auto; }
            .topbar { padding: 0 14px; }
            .content { padding: 18px 12px; }
            .stats, .cms-menu { grid-template-columns: 1fr; }
            .panel { padding: 17px; }
        }
    </style>
</head>

<body>
<div class="layout">

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">AF</div>
            <div>
                <strong>SMPIT AL FIRDAUS</strong>
                <small>Purwodadi</small>
            </div>
        </div>

        <nav class="menu">
            <a class="active" href="<?= site_url('admin/dashboard') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="3" width="7" height="7" rx="1"/>
                        <rect x="14" y="3" width="7" height="7" rx="1"/>
                        <rect x="3" y="14" width="7" height="7" rx="1"/>
                        <rect x="14" y="14" width="7" height="7" rx="1"/>
                    </svg>
                </span>
                <span>Dashboard</span>
            </a>

            <div class="menu-label">PENGATURAN</div>

            <a href="<?= site_url('admin/profil') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M3 21h18M5 21V8l7-5 7 5v13"/>
                        <path d="M9 21v-6h6v6M9 10h.01M15 10h.01"/>
                    </svg>
                </span>
                <span>Profil Sekolah</span>
            </a>

            <a href="<?= site_url('admin/programs') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M4 5.5A3.5 3.5 0 0 1 7.5 2H20v16H7.5A3.5 3.5 0 0 0 4 21.5z"/>
                        <path d="M4 5.5v16M8 6h8M8 10h8"/>
                    </svg>
                </span>
                <span>Program Unggulan</span>
            </a>

            <a href="<?= site_url('admin/settings') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="m19.4 15 .1.1 1.4 1.1-1.5 2.6-1.7-.7a8 8 0 0 1-1.5.9l-.3 1.8h-3l-.3-1.8a8 8 0 0 1-1.5-.9l-1.7.7-1.5-2.6 1.4-1.1a7 7 0 0 1 0-1.8l-1.4-1.1 1.5-2.6 1.7.7a8 8 0 0 1 1.5-.9l.3-1.8h3l.3 1.8a8 8 0 0 1 1.5.9l1.7-.7 1.5 2.6-1.4 1.1a7 7 0 0 1 0 1.7z" transform="translate(-1 -1)"/>
                    </svg>
                </span>
                <span>Pengaturan Website</span>
            </a>

            <div class="menu-label">PUBLIKASI</div>

            <a href="<?= site_url('admin/posts') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M5 3h14v18H5z"/>
                        <path d="M8 7h8M8 11h8M8 15h5"/>
                    </svg>
                </span>
                <span>Berita &amp; Pengumuman</span>
            </a>

            <a href="<?= site_url('admin/galleries') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                        <circle cx="8.5" cy="8.5" r="1.5"/>
                        <path d="m21 15-5-5L5 21"/>
                    </svg>
                </span>
                <span>Galeri</span>
            </a>

            <a href="<?= site_url('admin/achievements') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <circle cx="12" cy="8" r="5"/>
                        <path d="m8.5 12-1 9 4.5-2.5 4.5 2.5-1-9"/>
                        <path d="m12 5 1 2h2l-1.5 1.5.5 2-2-1-2 1 .5-2L9 7h2z"/>
                    </svg>
                </span>
                <span>Prestasi</span>
            </a>

            <div class="menu-label">AKUN</div>

            <a href="<?= site_url('admin/logout') ?>">
                <span class="menu-icon">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M10 17l5-5-5-5M15 12H3"/>
                        <path d="M12 3h6a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-6"/>
                    </svg>
                </span>
                <span>Logout</span>
            </a>
        </nav>
    </aside>

    <div class="main">
        <header class="topbar">
            <strong>CMS SMPIT Al Firdaus Purwodadi</strong>
            <small><?= esc(session()->get('admin_full_name')) ?></small>
        </header>

        <main class="content">
            <div class="page-heading">
                <div>
                    <h1>Dashboard</h1>
                    <div class="breadcrumb">Home &nbsp; › &nbsp; Dashboard</div>
                </div>
                <a class="logout" href="<?= site_url('admin/logout') ?>">Keluar</a>
            </div>

            <p class="welcome">
                Selamat datang, <?= esc(session()->get('admin_full_name')) ?>.
                Kelola informasi website sekolah dari halaman ini.
            </p>

            <section class="stats">
                <div class="stat-card">
                    <span>Program Unggulan</span>
                    <strong>TCP · ICT · ICP</strong>
                </div>
                <div class="stat-card">
                    <span>Berita & Pengumuman</span>
                    <strong>Kelola</strong>
                </div>
                <div class="stat-card">
                    <span>Galeri Sekolah</span>
                    <strong>Kelola</strong>
                </div>
                <div class="stat-card">
                    <span>Prestasi Sekolah</span>
                    <strong>Kelola</strong>
                </div>
            </section>

            <section class="panel">
                <h2>Menu Pengelolaan Website</h2>

                <div class="cms-menu">
                    <a href="<?= site_url('admin/profil') ?>">
                        <strong>Profil Sekolah</strong>
                        <span>Kelola visi, misi, alamat, kontak, dan informasi sekolah.</span>
                    </a>

                    <a href="<?= site_url('admin/programs') ?>">
                        <strong>Program Unggulan</strong>
                        <span>Kelola informasi TCP, ICT, dan ICP.</span>
                    </a>

                    <a href="<?= site_url('admin/posts') ?>">
                        <strong>Berita & Pengumuman</strong>
                        <span>Buat, edit, dan publikasikan artikel sekolah.</span>
                    </a>

                    <a href="<?= site_url('admin/galleries') ?>">
                        <strong>Galeri Kegiatan</strong>
                        <span>Kelola foto kegiatan sekolah.</span>
                    </a>

                    <a href="<?= site_url('admin/achievements') ?>">
                        <strong>Prestasi</strong>
                        <span>Catat dan tampilkan prestasi siswa.</span>
                    </a>

                    <a href="<?= site_url('admin/settings') ?>">
                        <strong>Pengaturan Website</strong>
                        <span>Atur identitas, kontak, dan tautan website.</span>
                    </a>
                </div>
            </section>
        </main>
    </div>
</div>
</body>
</html>