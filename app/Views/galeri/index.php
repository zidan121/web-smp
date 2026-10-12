<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Galeri Kegiatan | SMPIT Al Firdaus Purwodadi</title>
<style>
:root{--navy:#17365e;--blue:#24558a;--pale:#f2f6fb;--text:#243b56;--muted:#718198}
*{box-sizing:border-box}body{margin:0;background:var(--pale);font-family:Arial,Helvetica,sans-serif;color:var(--text)}a{color:inherit}.hero{background:linear-gradient(120deg,#112747,#28588c);color:#fff;padding:52px 22px 48px}.container{width:min(1120px,100% - 40px);margin:auto}.back{display:inline-block;color:#e8f1ff;text-decoration:none;font-size:14px;margin-bottom:20px}.back:hover{text-decoration:underline}.eyebrow{text-transform:uppercase;letter-spacing:2px;font-size:12px;font-weight:700;color:#c7dcf7}.hero h1{font-size:clamp(32px,5vw,48px);line-height:1.12;margin:10px 0 12px}.hero p{margin:0;max-width:680px;line-height:1.7;color:#e1eafa}.content{padding:34px 0 64px}.toolbar{display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap;margin-bottom:22px}.toolbar h2{margin:0;font-size:22px;color:var(--navy)}.count{font-size:13px;color:var(--muted)}.gallery-grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}.card{background:#fff;border:1px solid #e0e8f2;border-radius:16px;overflow:hidden;box-shadow:0 8px 24px rgba(22,54,94,.06);transition:transform .2s,box-shadow .2s}.card:hover{transform:translateY(-4px);box-shadow:0 14px 32px rgba(22,54,94,.12)}.photo{height:235px;background:linear-gradient(135deg,#e3ebf5,#f3f6fa);overflow:hidden}.photo img{width:100%;height:100%;display:block;object-fit:cover;transition:transform .35s}.card:hover .photo img{transform:scale(1.04)}.photo-placeholder{height:100%;display:flex;align-items:center;justify-content:center;color:#9aacc2;font-size:42px}.card-body{padding:19px 20px 21px}.category{display:inline-block;padding:5px 10px;border-radius:30px;background:#edf4fc;color:var(--blue);font-size:11px;font-weight:700;margin-bottom:11px}.card h3{font-size:18px;line-height:1.4;margin:0 0 8px;color:var(--navy)}.card p{font-size:14px;line-height:1.65;color:#65778d;margin:0;overflow-wrap:anywhere}.empty{background:#fff;border:1px dashed #cbd8e8;border-radius:16px;text-align:center;padding:55px 20px}.empty-icon{font-size:42px;margin-bottom:12px}.empty h3{color:var(--navy);margin:0 0 8px}.empty p{color:var(--muted);margin:0}.footer{text-align:center;padding:24px;color:#8291a5;font-size:12px;border-top:1px solid #e0e8f2}@media(max-width:850px){.gallery-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.photo{height:210px}}@media(max-width:560px){.container{width:min(100% - 28px,1120px)}.hero{padding:36px 0}.gallery-grid{grid-template-columns:1fr;gap:16px}.photo{height:230px}.content{padding-top:25px}}
</style>
</head>
<body>
<header class="hero"><div class="container">
<a class="back" href="<?= site_url('/') ?>">← Kembali ke Beranda</a>
<div class="eyebrow">Dokumentasi Sekolah</div>
<h1>Galeri Kegiatan</h1>
<p>Momen pembelajaran, kegiatan siswa, prestasi, dan kebersamaan keluarga besar SMPIT Al Firdaus Purwodadi.</p>
</div></header>
<main class="content"><div class="container">
<div class="toolbar"><h2>Momen dari Sekolah</h2><span class="count"><?= count($galleries ?? []) ?> dokumentasi</span></div>
<?php if (!empty($galleries)): ?>
<div class="gallery-grid">
<?php foreach ($galleries as $gallery): ?>
<article class="card">
<div class="photo">
<?php
$imageValue = trim((string) ($gallery['image'] ?? ''));
$isRemoteImage = preg_match('#^https://images\\.unsplash\\.com/[a-zA-Z0-9?&=._%-]+$#', $imageValue) === 1;
$localImage = basename($imageValue);
$localImagePath = FCPATH . 'assets/images/galleries/' . $localImage;
?>
<?php if ($isRemoteImage): ?>
<img src="<?= esc($imageValue) ?>" alt="<?= esc($gallery['title']) ?>" loading="lazy" referrerpolicy="no-referrer">
<?php elseif ($localImage !== '' && is_file($localImagePath)): ?>
<img src="<?= base_url('assets/images/galleries/' . rawurlencode($localImage)) ?>" alt="<?= esc($gallery['title']) ?>" loading="lazy">
<?php else: ?><div class="photo-placeholder" aria-label="Foto belum tersedia">▧</div><?php endif; ?>
</div>
<div class="card-body">
<?php if (!empty($gallery['category'])): ?><span class="category"><?= esc($gallery['category']) ?></span><?php endif; ?>
<h3><?= esc($gallery['title']) ?></h3>
<?php if (!empty($gallery['description'])): ?><p><?= nl2br(esc($gallery['description'])) ?></p><?php endif; ?>
</div></article>
<?php endforeach; ?>
</div>
<?php else: ?>
<div class="empty"><div class="empty-icon">▧</div><h3>Galeri segera hadir</h3><p>Dokumentasi kegiatan sekolah akan ditampilkan di halaman ini setelah ditambahkan melalui panel admin.</p></div>
<?php endif; ?>
</div></main>
<footer class="footer">© <?= date('Y') ?> SMPIT Al Firdaus Purwodadi · Berakhlak, Berilmu, Berprestasi</footer>
</body></html>