<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= esc($gallery['title']) ?> | Galeri SMPIT Al Firdaus Purwodadi</title>
<meta name="description" content="<?= esc(mb_substr(strip_tags((string) ($gallery['description'] ?? 'Dokumentasi kegiatan SMPIT Al Firdaus Purwodadi.')), 0, 160), 'attr') ?>">
<style>
:root{--navy:#102b50;--blue:#0c4b9b;--ink:#17365e;--muted:#647894;--pale:#f4f7fc;--line:#e5ebf4}
*{box-sizing:border-box}body{margin:0;background:var(--pale);font-family:Inter,system-ui,-apple-system,"Segoe UI",sans-serif;color:var(--ink)}a{color:inherit;text-decoration:none}
.wrap{width:min(900px,calc(100% - 32px));margin:0 auto}
.detail-top{padding:26px 0 16px}.back-link{display:inline-flex;align-items:center;gap:8px;color:var(--blue);font-size:14px;font-weight:750}.back-link:hover{text-decoration:underline}
.detail-card{background:#fff;border:1px solid var(--line);border-radius:20px;overflow:hidden;box-shadow:0 12px 34px #193a6110;margin-bottom:48px}
.detail-photo{width:100%;max-height:560px;aspect-ratio:16/9;background:#e5edf7;display:grid;place-items:center;overflow:hidden}.detail-photo img{display:block;width:100%;height:100%;object-fit:contain;background:#e5edf7}.detail-content{padding:clamp(22px,5vw,48px)}
.category{display:inline-flex;padding:7px 12px;border-radius:30px;background:#eaf2ff;color:var(--blue);font-size:12px;font-weight:800}
h1{font-size:clamp(28px,4.5vw,44px);line-height:1.2;letter-spacing:-.8px;color:var(--navy);margin:16px 0 12px}
.meta{font-size:13px;color:var(--muted);margin-bottom:26px}.description{font-size:16px;line-height:1.9;color:#405673;overflow-wrap:anywhere}.description p{margin:0 0 1.15em}.description p:last-child{margin-bottom:0}
.detail-bottom{margin-top:30px;padding-top:22px;border-top:1px solid var(--line)}
@media(max-width:600px){.detail-top{padding-top:20px}.detail-card{border-radius:14px}.detail-photo{aspect-ratio:4/3}.description{font-size:15px;line-height:1.85}}
</style>
</head>
<body>
<?= view('partials/public_navbar', ['settings' => $settings ?? []]) ?>
<main class="wrap">
  <div class="detail-top"><a class="back-link" href="<?= site_url('galeri') ?>">← Kembali ke Galeri</a></div>
  <article class="detail-card">
    <?php
    $imageValue = trim((string) ($gallery['image'] ?? ''));
    $isRemoteImage = preg_match('#^https://images\\.unsplash\\.com/[a-zA-Z0-9?&=._%-]+$#', $imageValue) === 1;
    $localImage = basename($imageValue);
    $imageDirectory = (string) ($gallery['image_path'] ?? 'assets/images/galleries/');
    $localImagePath = FCPATH . trim($imageDirectory, '/\\\\') . DIRECTORY_SEPARATOR . $localImage;
    ?>
    <div class="detail-photo">
      <?php if ($isRemoteImage): ?>
        <img src="<?= esc($imageValue, 'attr') ?>" alt="<?= esc($gallery['title'], 'attr') ?>">
      <?php elseif ($localImage !== '' && is_file($localImagePath)): ?>
        <img src="<?= base_url(trim($imageDirectory, '/\\\\') . '/' . rawurlencode($localImage)) ?>" alt="<?= esc($gallery['title'], 'attr') ?>">
      <?php else: ?>
        <span aria-label="Foto belum tersedia">Dokumentasi Sekolah</span>
      <?php endif; ?>
    </div>
    <div class="detail-content">
      <span class="category"><?= esc($gallery['category'] ?: 'Kegiatan Sekolah') ?></span>
      <h1><?= esc($gallery['title']) ?></h1>
      <div class="meta">SMPIT Al Firdaus Purwodadi<?php if (! empty($gallery['created_at'])): ?> · <?= esc(date('d F Y', strtotime($gallery['created_at']))) ?><?php endif; ?></div>
      <div class="description"><?= nl2br(esc(trim((string) ($gallery['description'] ?? '')) ?: 'Dokumentasi kegiatan siswa SMPIT Al Firdaus Purwodadi.')) ?></div>
      <div class="detail-bottom"><a class="back-link" href="<?= site_url('galeri') ?>">← Lihat dokumentasi lainnya</a></div>
    </div>
  </article>
</main>
<?= view('partials/public_footer', ['settings' => $settings ?? []]) ?>
</body>
</html>
