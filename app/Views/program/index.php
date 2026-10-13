<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1">
<title>Program Unggulan | SMPIT Al Firdaus Purwodadi</title>
<style>
:root{--navy:#102b4e;--blue:#24558b;--gold:#e8b75b;--ink:#172b45;--muted:#657991;--bg:#f3f7fc}
*{box-sizing:border-box}body{margin:0;font-family:Inter,Arial,sans-serif;color:var(--ink);background:var(--bg)}a{color:inherit;text-decoration:none}.wrap{width:min(1160px,90%);margin:auto}
header{background:#fff;border-bottom:1px solid #e4ebf4}.nav{min-height:76px;display:flex;align-items:center;justify-content:space-between;gap:18px}.brand{font-weight:800;color:var(--navy)}.brand small{display:block;color:#718198;font-size:10px;letter-spacing:1px;margin-top:4px}.navlinks{display:flex;gap:20px;font-size:13px;font-weight:700}.btn{display:inline-flex;align-items:center;justify-content:center;background:var(--blue);color:#fff;padding:12px 17px;border-radius:11px;font-weight:750;font-size:13px}
.hero{padding:54px 0;background:linear-gradient(120deg,#102b4e,#24558b);color:#fff}.eyebrow{font-size:11px;letter-spacing:2px;font-weight:800;color:#f4d18a;text-transform:uppercase}.hero h1{font-size:clamp(32px,5vw,48px);margin:12px 0;line-height:1.12}.hero p{max-width:650px;color:#e1ebf8;line-height:1.8;margin:0}
main{padding:36px 0 70px}.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}.card{display:flex;flex-direction:column;overflow:hidden;background:#fff;border:1px solid #e0e9f5;border-radius:20px;box-shadow:0 12px 28px #102b4e0c;transition:.2s}.card:hover{transform:translateY(-4px);box-shadow:0 18px 36px #102b4e18}.image{height:190px;background:linear-gradient(135deg,#dce9f8,#f5f8fc);overflow:hidden}.image img{width:100%;height:100%;object-fit:cover}.body{padding:22px;display:flex;flex-direction:column;flex:1}.body h2{color:var(--navy);margin:0 0 12px;font-size:23px}.body p{color:var(--muted);font-size:14px;line-height:1.8;margin:0 0 20px}.learn{margin-top:auto;color:var(--blue);font-weight:800;font-size:13px}.empty{padding:40px;background:#fff;border-radius:16px;color:var(--muted);grid-column:1/-1}
footer{background:#102b4e;color:#dce8f7;padding:25px 0;font-size:12px}
@media(max-width:800px){.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.navlinks{gap:12px}}@media(max-width:560px){.nav{padding:14px 0;align-items:flex-start}.navlinks{display:none}.grid{grid-template-columns:1fr}.hero{padding:40px 0}}
</style>
</head><body>
<header><div class="wrap nav"><a class="brand" href="<?= site_url('/') ?>">SMPIT AL FIRDAUS<small>PURWODADI · SEKOLAH ISLAM TERPADU</small></a><nav class="navlinks"><a href="<?= site_url('/') ?>#profil">Profil</a><a href="<?= site_url('program') ?>">Program</a><a href="<?= site_url('berita') ?>">Berita</a><a href="<?= site_url('galeri') ?>">Galeri</a></nav><a class="btn" href="<?= site_url('pps') ?>">PPS 2027/2028 ↗</a></div></header>
<section class="hero"><div class="wrap"><div class="eyebrow">Program unggulan</div><h1>Temukan Potensi Terbaik Siswa</h1><p>Program pembelajaran SMPIT Al Firdaus Purwodadi dirancang untuk menumbuhkan karakter Qur'ani, keterampilan teknologi, dan wawasan global.</p></div></section>
<main class="wrap"><div class="grid">
<?php if (! empty($programs)): foreach ($programs as $program): ?>
<article class="card">
<div class="image"><?php if (! empty($program['image'])): ?><img src="<?= base_url('assets/images/' . esc($program['image'], 'attr')) ?>" alt="<?= esc($program['name'], 'attr') ?>" loading="lazy"><?php endif; ?></div>
<div class="body"><h2><?= esc($program['name']) ?></h2><p><?= esc($program['description'] ?: 'Informasi program unggulan sekolah.') ?></p><a class="learn" href="<?= site_url('program/' . $program['slug']) ?>">Pelajari program →</a></div>
</article>
<?php endforeach; else: ?><div class="empty">Informasi program unggulan belum tersedia. Silakan kembali lagi nanti.</div><?php endif; ?>
</div></main><footer><div class="wrap">© <?= date('Y') ?> SMPIT Al Firdaus Purwodadi · <a href="<?= site_url('/') ?>">Kembali ke halaman utama</a></div></footer>
</body></html>