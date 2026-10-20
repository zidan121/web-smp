<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Berita & Pengumuman | SMPIT Al Firdaus</title>
<style>
*{box-sizing:border-box}body{margin:0;padding:28px 16px;font-family:Arial,sans-serif;background:#f2f5fa;color:#203653}
main{max-width:1200px;margin:auto}.back{display:inline-block;margin-bottom:16px;color:#214a7b}
.panel{background:#fff;border:1px solid #e0e7f1;border-radius:13px;padding:24px;margin-bottom:22px;box-shadow:0 6px 20px #2036530a}
h1{font-size:26px;margin:0 0 8px}h2{font-size:19px;margin:0 0 18px}.muted{color:#718096;font-size:13px;margin:0 0 20px}
.alert{padding:12px 14px;border-radius:8px;margin:0 0 16px}.success{background:#e4f7eb;color:#17633a}.error{background:#fdeaea;color:#9b2020}
.grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:16px}.field{display:flex;flex-direction:column;gap:7px}.wide{grid-column:1/-1}
label{font-weight:600;font-size:13px}input,select,textarea{width:100%;padding:11px 12px;border:1px solid #cad6e6;border-radius:7px;font:inherit;color:#203653;background:#fff}textarea{min-height:145px;resize:vertical}
button{border:0;border-radius:7px;padding:10px 14px;cursor:pointer;font-weight:600;background:#203653;color:white}.secondary{background:#446b9e}.danger{background:#c7372f}.actions{display:flex;gap:7px;align-items:center;flex-wrap:wrap}.actions form{margin:0}.table-wrap{overflow-x:auto}table{width:100%;border-collapse:collapse;min-width:900px}th,td{text-align:left;padding:12px;border-bottom:1px solid #e2e8f0;vertical-align:top;font-size:13px}th{background:#edf2f8;color:#203653}td small{color:#718096}.thumb{width:76px;height:55px;object-fit:cover;border-radius:5px;margin-top:6px}.status{display:inline-block;padding:5px 8px;border-radius:99px;font-size:12px;background:#eef2f7}.published{background:#e4f7eb;color:#17633a}.draft{background:#fff2d6;color:#8a5a00}.hint{font-size:12px;color:#718096}.photo-preview{display:flex;flex-wrap:wrap;gap:8px;margin-top:8px}.photo-preview img,.thumb{width:76px;height:58px;object-fit:cover;border-radius:6px;border:1px solid #dbe4ef}.photo-preview img{width:88px;height:68px}
@media(max-width:650px){.grid{grid-template-columns:1fr}.wide{grid-column:auto}.panel{padding:17px}}
</style>
</head>
<body><main>
<a class="back" href="<?= site_url('admin/dashboard') ?>">← Kembali ke Dashboard</a>
<section class="panel">
<h1>Berita & Pengumuman</h1>
<p class="muted">Buat, edit, simpan sebagai draft, atau publikasikan artikel sekolah.</p>
<?php if (session()->getFlashdata('success')): ?><div class="alert success"><?= esc(session()->getFlashdata('success')) ?></div><?php endif; ?>
<?php if (session()->getFlashdata('error')): ?><div class="alert error"><?= esc(session()->getFlashdata('error')) ?></div><?php endif; ?>
<h2 id="form-title">Tambah Artikel</h2>
<form id="post-form" action="<?= site_url('admin/posts/simpan') ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
<input type="hidden" name="id" id="post-id" value="">
<div class="grid">
<div class="field wide"><label for="title">Judul Artikel *</label><input id="title" name="title" maxlength="200" required value="<?= esc(old('title','')) ?>" placeholder="Contoh: Kegiatan Pesantren Kilat"></div>
<div class="field"><label for="category">Kategori *</label><select id="category" name="category" required><option value="berita">Berita</option><option value="pengumuman">Pengumuman</option><option value="kegiatan">Kegiatan</option></select></div>
<div class="field"><label for="status">Status *</label><select id="status" name="status" required><option value="draft">Draft</option><option value="published">Publikasikan</option></select></div>
<div class="field"><label for="author">Penulis</label><input id="author" name="author" maxlength="100" value="<?= esc(old('author','')) ?>" placeholder="Nama penulis"></div>
<div class="field"><label for="gallery-images">Foto Artikel (maksimal 5 foto)</label><input id="gallery-images" type="file" name="gallery_images[]" accept="image/jpeg,image/png,image/webp" multiple><span class="hint">Pilih hingga 5 foto JPG, PNG, atau WebP. Maksimal 3 MB per foto. Jika mengunggah foto baru saat edit, foto lama akan diganti.</span><div id="current-images" class="hint">Belum ada foto.</div><div id="image-preview" class="photo-preview"></div></div>
<div class="field wide"><label for="excerpt">Ringkasan</label><textarea id="excerpt" name="excerpt" maxlength="5000" style="min-height:80px" placeholder="Ringkasan singkat untuk daftar berita"><?= esc(old('excerpt','')) ?></textarea></div>
<div class="field wide"><label for="content">Isi Artikel *</label><textarea id="content" name="content" required placeholder="Tuliskan isi berita atau pengumuman"><?= esc(old('content','')) ?></textarea><span class="hint">Isi disimpan sebagai teks. Hindari menempelkan kode HTML yang tidak dipercaya.</span></div>
</div>
<div class="actions" style="margin-top:18px"><button type="submit">Simpan Artikel</button><button type="button" class="secondary" onclick="resetPostForm()">Batal Edit / Artikel Baru</button></div>
</form>
</section>
<section class="panel" id="data-artikel">
<h2>Data Berita & Pengumuman</h2>
<?php if (empty($posts)): ?><p class="muted">Belum ada artikel. Tambahkan melalui formulir di atas.</p><?php else: ?>
<div class="table-wrap"><table><thead><tr><th>No.</th><th>Artikel</th><th>Kategori</th><th>Status</th><th>Tanggal</th><th>Aksi</th></tr></thead><tbody>
<?php foreach ($posts as $index => $post): ?>
<?php $postJson = json_encode($post, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT); ?>
<tr>
<td><?= $index + 1 ?></td><td><strong><?= esc($post['title']) ?></strong><br><small><?= esc($post['slug']) ?></small><?php $postImages = !empty($post['gallery_images']) ? json_decode((string) $post['gallery_images'], true) : []; if (!is_array($postImages)) { $postImages = []; } if (empty($postImages) && !empty($post['image'])) { $postImages = [$post['image']]; } ?><?php foreach (array_slice($postImages, 0, 5) as $postImage): ?><br><img class="thumb" src="<?= base_url('assets/images/posts/' . rawurlencode($postImage)) ?>" alt="<?= esc($post['title']) ?>" loading="lazy"><?php endforeach; ?></td>
<td><?= esc(ucfirst($post['category'])) ?></td>
<td><span class="status <?= $post['status'] === 'published' ? 'published' : 'draft' ?>"><?= $post['status'] === 'published' ? 'Terbit' : 'Draft' ?></span></td>
<td><?= esc($post['published_at'] ?: ($post['created_at'] ?? '-')) ?></td>
<td><div class="actions"><button type="button" class="secondary" data-post="<?= esc($postJson, 'attr') ?>" onclick="editPost(this)">Edit</button><form action="<?= site_url('admin/posts/hapus/' . (int) $post['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"><?= csrf_field() ?><button type="submit" class="danger">Hapus</button></form></div></td>
</tr>
<?php endforeach; ?>
</tbody></table></div>
<?php endif; ?>
</section>
<script>
function editPost(button){
 const p=JSON.parse(button.dataset.post);
 document.getElementById('post-id').value=p.id;
 document.getElementById('title').value=p.title||'';
 document.getElementById('category').value=p.category||'berita';
 document.getElementById('status').value=p.status||'draft';
 document.getElementById('author').value=p.author||'';
 document.getElementById('excerpt').value=p.excerpt||'';
 document.getElementById('content').value=p.content||'';
 document.getElementById('form-title').textContent='Edit Artikel';
 const images=Array.isArray(JSON.parse(p.gallery_images||'[]'))?JSON.parse(p.gallery_images||'[]'):[];
 const saved=images.length?images:(p.image?[p.image]:[]);
 document.getElementById('current-images').textContent=saved.length?'Foto tersimpan ('+saved.length+'): '+saved.join(', '):'Belum ada foto tersimpan.';
 document.getElementById('gallery-images').value='';
 document.getElementById('image-preview').innerHTML='';
 window.scrollTo({top:0,behavior:'smooth'});
}
function resetPostForm(){
 document.getElementById('post-form').reset();
 document.getElementById('post-id').value='';
 document.getElementById('form-title').textContent='Tambah Artikel';
 document.getElementById('current-images').textContent='Belum ada foto.';
 document.getElementById('gallery-images').value='';
 document.getElementById('image-preview').innerHTML='';
}
document.getElementById('gallery-images').addEventListener('change', function () {
 const preview=document.getElementById('image-preview');
 preview.innerHTML='';
 const files=Array.from(this.files||[]);
 if(files.length>5){alert('Maksimal 5 foto.');this.value='';return;}
 files.forEach(file=>{
  if(!/^image\/(jpeg|png|webp)$/.test(file.type)){alert('Gunakan foto JPG, PNG, atau WebP.');this.value='';preview.innerHTML='';return;}
  const img=document.createElement('img');img.alt=file.name;img.title=file.name;img.src=URL.createObjectURL(file);preview.appendChild(img);
 });
});
</script>
</main></body></html>
