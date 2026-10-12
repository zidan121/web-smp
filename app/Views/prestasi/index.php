<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Prestasi Siswa | SMPIT Al Firdaus Purwodadi</title>
<style>
:root{--navy:#102b55;--blue:#1559a6;--gold:#e8b33e;--ink:#183657;--muted:#718198;--line:#e2eaf4;--bg:#f4f7fc}
*{box-sizing:border-box}body{margin:0;font-family:Inter,system-ui,-apple-system,"Segoe UI",Arial,sans-serif;color:var(--ink);background:var(--bg)}a{text-decoration:none;color:inherit}
.header{background:white;border-bottom:1px solid var(--line)}.nav{max-width:1200px;margin:auto;padding:14px 24px;display:flex;align-items:center;justify-content:space-between;gap:20px}.brand{display:flex;align-items:center;gap:12px;color:var(--navy);font-weight:850}.mark{display:grid;place-items:center;width:44px;height:44px;border-radius:13px;background:linear-gradient(145deg,#1559a6,#102b55);color:#fff;font-size:23px}.brand small{display:block;font-size:10px;letter-spacing:1.2px;color:#b18220;margin-top:4px}.links{display:flex;align-items:center;gap:24px;font-size:14px;font-weight:650}.links a:hover{color:var(--blue)}.ppdb{background:var(--blue);color:white!important;padding:12px 16px;border-radius:10px}
.hero{background:radial-gradient(circle at 85% 20%,#2b5f93 0,transparent 35%),linear-gradient(115deg,#10264a,#174d80);color:white}.hero-inner{max-width:1200px;margin:auto;padding:46px 24px 52px}.crumb{font-size:13px;color:#d6e7fb;margin-bottom:25px}.crumb a{color:white}.eyebrow{font-size:11px;text-transform:uppercase;letter-spacing:2px;font-weight:800;color:#ffd77b}.hero h1{font-size:clamp(34px,5vw,52px);line-height:1.1;margin:12px 0}.hero p{margin:0;color:#e1edfb;line-height:1.8;max-width:650px}
.container{max-width:1200px;margin:0 auto;padding:38px 24px 70px}.section-head{display:flex;justify-content:space-between;align-items:end;gap:18px;margin-bottom:24px}.section-head h2{margin:0 0 8px;color:var(--navy);font-size:clamp(23px,3vw,30px)}.section-head p{margin:0;color:var(--muted);font-size:14px;line-height:1.7}.count{white-space:nowrap;border:1px solid #dbe7f5;background:#fff;border-radius:999px;padding:9px 14px;font-size:12px;font-weight:750;color:var(--blue)}
.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}.card{overflow:hidden;border:1px solid var(--line);background:#fff;border-radius:17px;box-shadow:0 12px 30px #17395b0a;transition:transform .2s,box-shadow .2s}.card:hover{transform:translateY(-4px);box-shadow:0 18px 35px #17395b16}.image-wrap{height:205px;background:linear-gradient(135deg,#e4efff,#f7faff);position:relative;overflow:hidden}.image-wrap img{width:100%;height:100%;object-fit:cover;display:block}.image-placeholder{height:100%;display:grid;place-items:center;font-size:54px;color:#7ca1ce}.level{position:absolute;top:14px;left:14px;border-radius:999px;background:#fff;color:#164c8a;padding:7px 11px;font-size:11px;font-weight:800;box-shadow:0 4px 12px #102b551a}.body{padding:21px}.date{font-size:11px;color:#7d8ca1;font-weight:650;letter-spacing:.04em;text-transform:uppercase}.body h3{font-size:19px;line-height:1.4;margin:10px 0;color:var(--navy)}.student{font-size:13px;color:var(--blue);font-weight:750;margin-bottom:12px}.desc{font-size:13px;line-height:1.8;color:#687c94;margin:0}.empty{grid-column:1/-1;background:#fff;border:1px dashed #cbd9e9;border-radius:16px;padding:48px 24px;text-align:center}.empty strong{display:block;font-size:20px;color:var(--navy);margin-bottom:8px}.empty p{margin:0;color:var(--muted);font-size:14px}.footer{background:#0e2544;color:#d7e5f5;padding:25px;text-align:center;font-size:12px}
@media(max-width:900px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.links{gap:13px}}@media(max-width:650px){.nav{padding:12px 16px}.links{display:none}.hero-inner{padding:32px 18px 38px}.container{padding:27px 15px 50px}.section-head{align-items:start;flex-direction:column}.grid{grid-template-columns:1fr;gap:16px}.image-wrap{height:220px}.body{padding:18px}}
</style>
</head>
<body>
<header class="header"><div class="nav">
<a class="brand" href="<?= site_url('/') ?>"><span class="mark">✦</span><span>SMPIT<small>AL FIRDAUS PURWODADI</small></span></a>
<nav class="links"><a href="<?= site_url('/') ?>">Beranda</a><a href="<?= site_url('profil') ?>">Profil</a><a href="<?= site_url('program') ?>">Program</a><a class="ppdb" href="<?= site_url('ppdb') ?>">PPDB 2027/2028 ↗</a><a href="<?= site_url('berita') ?>">Berita</a></nav>
</div></header>
<section class="hero"><div class="hero-inner"><div class="crumb"><a href="<?= site_url('/') ?>">Beranda</a> &nbsp;›&nbsp; Prestasi</div><div class="eyebrow">Bangga dengan pencapaian siswa</div><h1>Prestasi & Apresiasi</h1><p>Ruang untuk merayakan kerja keras, bakat, dan pencapaian siswa SMPIT Al Firdaus Purwodadi di bidang akademik maupun nonakademik.</p></div></section>
<main class="container">
<div class="section-head"><div><h2>Prestasi Siswa</h2><p>Setiap pencapaian adalah langkah untuk tumbuh, berani mencoba, dan menginspirasi.</p></div><span class="count"><?= count($achievements) ?> prestasi</span></div>
<div class="grid">
<?php if (!empty($achievements)): ?>
<?php foreach ($achievements as $achievement): ?>
<article class="card">
<div class="image-wrap">
<?php if (!empty($achievement['image'])): ?><img src="<?= base_url('assets/images/achievements/' . rawurlencode($achievement['image'])) ?>" alt="<?= esc($achievement['title']) ?>" loading="lazy"><?php else: ?><div class="image-placeholder" aria-hidden="true">🏆</div><?php endif; ?>
<?php if (!empty($achievement['level'])): ?><span class="level"><?= esc($achievement['level']) ?></span><?php endif; ?>
</div>
<div class="body">
<div class="date"><?= !empty($achievement['achievement_date']) ? esc(date('d M Y', strtotime($achievement['achievement_date']))) : 'Prestasi sekolah' ?></div>
<h3><?= esc($achievement['title']) ?></h3>
<?php if (!empty($achievement['student_name'])): ?><div class="student">✦ <?= esc($achievement['student_name']) ?></div><?php endif; ?>
<?php if (!empty($achievement['competition'])): ?><p class="desc"><strong><?= esc($achievement['competition']) ?></strong></p><?php endif; ?>
<?php if (!empty($achievement['description'])): ?><p class="desc"><?= esc($achievement['description']) ?></p><?php endif; ?>
</div>
</article>
<?php endforeach; ?>
<?php else: ?>
<div class="empty"><strong>Prestasi segera hadir</strong><p>Data prestasi siswa belum tersedia. Silakan tambahkan prestasi melalui panel admin setelah fitur pengelolaan prestasi diaktifkan.</p></div>
<?php endif; ?>
</div>
</main>
<footer class="footer">© <?= date('Y') ?> SMPIT Al Firdaus Purwodadi · Ilmu, Akhlak, Prestasi</footer>
</body></html>
