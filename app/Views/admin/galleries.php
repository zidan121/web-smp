<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kelola Galeri | Admin SMPIT Al Firdaus</title>
<style>
*{box-sizing:border-box}body{margin:0;padding:28px;background:#f2f5fa;font-family:Arial,sans-serif;color:#203653}.wrap{max-width:1180px;margin:auto}.back{color:#245a91;font-size:14px}.panel{margin-top:18px;background:#fff;border:1px solid #dfe7f1;border-radius:16px;padding:25px;box-shadow:0 10px 28px #17395b0b}h1{margin:0 0 8px;color:#17365e}p{color:#657991;font-size:14px;line-height:1.6}.table-wrap{overflow-x:auto;margin-top:20px}table{width:100%;border-collapse:collapse;min-width:700px}th,td{padding:13px 14px;border-bottom:1px solid #e5ebf3;text-align:left;font-size:14px}th{background:#edf3fa;color:#17365e}tbody tr:hover{background:#f8fbff}.thumb{width:100px;height:68px;object-fit:cover;border-radius:8px;background:#edf2f8}.status{display:inline-block;padding:5px 9px;border-radius:99px;background:#e0f5e8;color:#167343;font-size:12px}.status.off{background:#fce8e7;color:#a32d27}.empty{text-align:center!important;padding:38px;color:#6e8095}.button{display:inline-block;margin-top:14px;background:#1c3b63;color:white;padding:10px 14px;border-radius:8px;text-decoration:none;font-size:13px}@media(max-width:600px){body{padding:14px}.panel{padding:17px}}
</style>
</head>
<body><main class="wrap">
<a class="back" href="<?= site_url('admin/dashboard') ?>">← Kembali ke Dashboard</a>
<section class="panel">
<h1>Galeri Kegiatan</h1>
<p>Daftar dokumentasi kegiatan SMPIT Al Firdaus Purwodadi yang tersimpan di database.</p>
<div class="table-wrap"><table>
<thead><tr><th>Foto</th><th>Judul</th><th>Kategori</th><th>Urutan</th><th>Status</th></tr></thead>
<tbody>
<?php if (!empty($galleries)): ?>
<?php foreach ($galleries as $gallery): ?>
<tr>
<td><?php if (!empty($gallery['image'])): ?><img class="thumb" src="<?= base_url('assets/images/galleries/' . rawurlencode($gallery['image'])) ?>" alt="<?= esc($gallery['title']) ?>"><?php else: ?><div class="thumb"></div><?php endif; ?></td>
<td><strong><?= esc($gallery['title']) ?></strong><br><small><?= esc($gallery['description'] ?? '') ?></small></td>
<td><?= esc($gallery['category'] ?? '-') ?></td>
<td><?= (int) ($gallery['sort_order'] ?? 0) ?></td>
<td><span class="status <?= empty($gallery['is_active']) ? 'off' : '' ?>"><?= !empty($gallery['is_active']) ? 'Aktif' : 'Nonaktif' ?></span></td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr><td colspan="5" class="empty">Belum ada data galeri. Data akan tampil di tabel ini setelah ditambahkan ke database.</td></tr>
<?php endif; ?>
</tbody></table></div>
<a class="button" href="<?= site_url('galeri') ?>" target="_blank" rel="noopener">Lihat Galeri Publik ↗</a>
</section></main></body></html>
