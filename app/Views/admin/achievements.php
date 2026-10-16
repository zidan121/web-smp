<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kelola Prestasi | Admin SMPIT Al Firdaus</title>
<style>
*{box-sizing:border-box}body{margin:0;padding:28px;background:#f2f5fa;font-family:Inter,system-ui,-apple-system,'Segoe UI',sans-serif;color:#17365e}.wrap{max-width:1240px;margin:auto}.back{display:inline-flex;align-items:center;color:#245a91;font-size:13px;font-weight:700;text-decoration:none;padding:10px 0}.panel{margin-top:18px;background:#fff;border:1px solid #e1e9f4;border-radius:20px;padding:28px;box-shadow:0 12px 32px #17395b0b}h1{margin:0 0 8px;color:#102b50;font-size:clamp(25px,3vw,32px);letter-spacing:-.7px}h2{margin:0 0 18px;font-size:20px}p{color:#657991;font-size:14px;line-height:1.6}.field{margin:15px 0}.field label{display:block;font-size:13px;font-weight:700;margin-bottom:7px}.field input:not([type=file]),.field textarea,.field select{width:100%;padding:11px 12px;border:1px solid #cbd8e8;border-radius:12px;font:inherit;color:#203653;background:#fff}.field textarea{min-height:100px;resize:vertical}.field input[type=file]{width:100%;padding:10px;border:1px solid #cbd8e8;border-radius:8px}.hint{font-size:12px;color:#6e8095}.preview{display:none;margin-top:10px;width:190px;height:130px;object-fit:cover;border-radius:10px;background:#edf2f8}.actions{display:flex;gap:8px;flex-wrap:wrap}.btn{border:0;cursor:pointer;display:inline-block;background:#1c3b63;color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;font-size:13px}.btn.secondary{background:#e8eef6;color:#1c3b63}.btn.danger{background:#a92e35}.notice{padding:12px 14px;border-radius:8px;margin:14px 0;font-size:13px}.success{background:#e0f5e8;color:#167343}.error{background:#fde8e7;color:#a32d27}.table-wrap{overflow-x:auto;margin-top:12px;border:1px solid #e5ebf3;border-radius:13px}table{width:100%;border-collapse:collapse;min-width:900px}th,td{padding:12px;border-bottom:1px solid #e5ebf3;text-align:left;font-size:13px;vertical-align:middle}th{background:#edf3fa;color:#17365e;font-weight:800;white-space:nowrap}tbody tr:hover{background:#f8fbff}.thumb{width:100px;height:68px;object-fit:cover;border-radius:8px;background:#edf2f8}.status{display:inline-block;padding:5px 9px;border-radius:99px;background:#e0f5e8;color:#167343;font-size:12px}.status.off{background:#fce8e7;color:#a32d27}.empty{text-align:center;padding:35px;color:#6e8095}.table-actions{display:flex;gap:6px;align-items:center}.table-actions form{margin:0}@media(max-width:600px){body{padding:14px}.panel{padding:17px}}
</style>
</head>
<body><main class="wrap">
<a class="back" href="<?= site_url('admin/dashboard') ?>">← Kembali ke Dashboard</a>
<section class="panel">
<h1>Prestasi Siswa</h1>
<p>Tambah, ubah, tampilkan, atau sembunyikan pencapaian siswa. Prestasi berstatus Aktif akan muncul di halaman publik Prestasi.</p>
<?php if (session()->getFlashdata('success')): ?><div class="notice success"><?= esc(session()->getFlashdata('success')) ?></div><?php endif; ?>
<?php if (session()->getFlashdata('error')): ?><div class="notice error"><?= esc(session()->getFlashdata('error')) ?></div><?php endif; ?>
</section>
<section class="panel" id="form-panel">
<h2 id="form-title">Tambah Prestasi</h2>
<form id="achievement-form" action="<?= site_url('admin/achievements/simpan') ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
<input type="hidden" name="id" id="achievement-id" value="<?= esc(old('id','')) ?>">
<div class="field"><label for="title">Nama / Judul Prestasi *</label><input id="title" name="title" maxlength="200" required value="<?= esc(old('title','')) ?>" placeholder="Contoh: Juara 1 Lomba Robotik Tingkat Kabupaten"></div>
<div class="field"><label for="student_name">Nama Siswa / Tim</label><input id="student_name" name="student_name" maxlength="200" value="<?= esc(old('student_name','')) ?>" placeholder="Nama siswa atau tim"></div>
<div class="field"><label for="competition">Nama Lomba / Bidang</label><input id="competition" name="competition" maxlength="200" value="<?= esc(old('competition','')) ?>" placeholder="Contoh: Kompetisi Robotik"></div>
<div class="field"><label for="level">Tingkat Prestasi</label><select id="level" name="level"><option value="">Pilih tingkat</option><?php foreach (['Sekolah','Kecamatan','Kabupaten','Provinsi','Nasional','Internasional'] as $levelOption): ?><option value="<?= esc($levelOption) ?>" <?= old('level','')===$levelOption?'selected':'' ?>><?= esc($levelOption) ?></option><?php endforeach; ?></select></div>
<div class="field"><label for="achievement_date">Tanggal Prestasi</label><input id="achievement_date" type="date" name="achievement_date" value="<?= esc(old('achievement_date','')) ?>"></div>
<div class="field"><label for="description">Deskripsi</label><textarea id="description" name="description" maxlength="10000" placeholder="Keterangan singkat tentang pencapaian siswa"><?= esc(old('description','')) ?></textarea></div>
<div class="field"><label for="image">Foto / Dokumentasi Prestasi</label><input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp"><div class="hint">JPG, PNG, WebP maksimal 4 MB. Saat mengedit, kosongkan jika tetap memakai foto lama.</div><img id="image-preview" class="preview" alt="Pratinjau foto"><div id="image-info" class="hint"></div></div>
<div class="field"><label for="is_active">Status Tampilan</label><select id="is_active" name="is_active"><option value="1" <?= old('is_active','1')==='1'?'selected':'' ?>>Aktif — tampil di website</option><option value="0" <?= old('is_active')==='0'?'selected':'' ?>>Nonaktif — sembunyikan</option></select></div>
<div class="actions"><button class="btn" type="submit">Simpan Prestasi</button><button class="btn secondary" type="button" onclick="resetAchievementForm()">Batal / Reset</button></div>
</form>
</section>
<section class="panel">
<h2>Data Prestasi</h2>
<p>Prestasi aktif ditampilkan di halaman publik. Klik Edit untuk mengubah data yang sudah tersimpan.</p>
<div class="table-wrap"><table><thead><tr><th>Foto</th><th>Prestasi</th><th>Siswa / Tim</th><th>Tingkat</th><th>Tanggal</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
<?php if (!empty($achievements)): foreach ($achievements as $achievement): ?>
<tr>
<td><?php if (!empty($achievement['image'])): ?><img class="thumb" src="<?= base_url('assets/images/achievements/' . rawurlencode($achievement['image'])) ?>" alt="<?= esc($achievement['title']) ?>"><?php else: ?><div class="thumb"></div><?php endif; ?></td>
<td><strong><?= esc($achievement['title']) ?></strong><br><span class="hint"><?= esc($achievement['competition'] ?? '') ?></span><br><span class="hint"><?= esc($achievement['description'] ?? '') ?></span></td>
<td><?= esc($achievement['student_name'] ?: '-') ?></td><td><?= esc($achievement['level'] ?: '-') ?></td>
<td><?= !empty($achievement['achievement_date']) ? esc(date('d-m-Y', strtotime($achievement['achievement_date']))) : '-' ?></td>
<td><span class="status <?= empty($achievement['is_active'])?'off':'' ?>"><?= !empty($achievement['is_active'])?'Aktif':'Nonaktif' ?></span></td>
<td><div class="table-actions"><button class="btn" type="button" onclick="editAchievement(this)" data-achievement="<?= esc(json_encode($achievement, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP), 'attr') ?>">Edit</button><form action="<?= site_url('admin/achievements/hapus/' . (int) $achievement['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus prestasi ini?')"><?= csrf_field() ?><button class="btn danger" type="submit">Hapus</button></form></div></td>
</tr>
<?php endforeach; else: ?><tr><td colspan="7" class="empty">Belum ada data prestasi. Tambahkan prestasi pertama melalui formulir di atas.</td></tr><?php endif; ?>
</tbody></table></div>
<div class="actions" style="margin-top:16px"><a class="btn" href="<?= site_url('prestasi') ?>" target="_blank" rel="noopener">Lihat Halaman Publik</a></div>
</section>
</main>
<script>
const achievementForm = document.getElementById('achievement-form');
const achievementFields = ['id','title','student_name','competition','level','achievement_date','description','is_active'];
function editAchievement(button) {
 const item = JSON.parse(button.dataset.achievement);
 achievementFields.forEach((key) => { const field = document.getElementById(key === 'id' ? 'achievement-id' : key); if (field) field.value = item[key] ?? (key === 'is_active' ? '1' : ''); });
 document.getElementById('form-title').textContent = 'Edit Prestasi';
 document.getElementById('image-info').textContent = item.image ? 'Foto saat ini: ' + item.image + ' (unggah foto baru hanya jika ingin mengganti).' : 'Belum ada foto tersimpan.';
 document.getElementById('image-preview').style.display = item.image ? 'block' : 'none';
 document.getElementById('image-preview').src = item.image ? '<?= base_url('assets/images/achievements/') ?>' + encodeURIComponent(item.image) : '';
 document.getElementById('form-panel').scrollIntoView({behavior:'smooth',block:'start'});
}
function resetAchievementForm() {
 achievementForm.reset();
 document.getElementById('achievement-id').value = '';
 document.getElementById('form-title').textContent = 'Tambah Prestasi';
 document.getElementById('image-info').textContent = '';
 document.getElementById('image-preview').style.display = 'none';
 document.getElementById('image-preview').src = '';
}
document.getElementById('image').addEventListener('change', function () {
 const file = this.files && this.files[0];
 const preview = document.getElementById('image-preview');
 if (!file) return;
 preview.src = URL.createObjectURL(file);
 preview.style.display = 'block';
 document.getElementById('image-info').textContent = file.name;
});
</script>
</body></html>
