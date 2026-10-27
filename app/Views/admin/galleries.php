<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Kelola Galeri | Admin SMPIT Al Firdaus</title>
<style>
*{box-sizing:border-box}body{margin:0;padding:28px;background:#f2f5fa;font-family:Inter,system-ui,-apple-system,'Segoe UI',sans-serif;color:#17365e}.wrap{max-width:1240px;margin:auto}.back{display:inline-flex;align-items:center;gap:8px;color:#245a91;font-size:13px;font-weight:700;text-decoration:none;padding:10px 0}.back:hover{color:#075bc8}.panel{margin-top:18px;background:#fff;border:1px solid #e1e9f4;border-radius:20px;padding:28px;box-shadow:0 12px 32px #17395b0b}h1{margin:0 0 8px;color:#102b50;font-size:clamp(25px,3vw,32px);letter-spacing:-.7px}h2{margin:0 0 18px;font-size:20px;letter-spacing:-.3px}p{color:#657991;font-size:14px;line-height:1.6}.field{margin:15px 0}.field label{display:block;font-size:13px;font-weight:700;margin-bottom:7px}.field input:not([type=file]),.field textarea,.field select{width:100%;padding:11px 12px;border:1px solid #cbd8e8;border-radius:12px;font:inherit;color:#203653;background:#fff;transition:border-color .2s,box-shadow .2s}.field input:focus,.field textarea:focus,.field select:focus{outline:none;border-color:#7ba9e3;box-shadow:0 0 0 3px #075bc815}.field textarea{min-height:100px;resize:vertical}.field input[type=file]{width:100%;padding:10px;border:1px solid #cbd8e8;border-radius:8px}.hint{font-size:12px;color:#6e8095}.preview{display:none;margin-top:10px;width:180px;height:120px;object-fit:cover;border-radius:10px;background:#edf2f8}.actions{display:flex;gap:8px;flex-wrap:wrap}.btn{border:0;cursor:pointer;display:inline-block;background:#1c3b63;color:#fff;padding:10px 14px;border-radius:8px;text-decoration:none;font-size:13px}.btn.secondary{background:#e8eef6;color:#1c3b63}.btn.danger{background:#a92e35}.notice{padding:12px 14px;border-radius:8px;margin:14px 0;font-size:13px}.success{background:#e0f5e8;color:#167343}.error{background:#fde8e7;color:#a32d27}.table-tools{display:flex;align-items:center;justify-content:space-between;gap:12px;flex-wrap:wrap;margin:18px 0 12px}.table-tools input,.table-tools select{border:1px solid #dce6f2;border-radius:12px;padding:11px 13px;background:#fff;color:#203653;font:inherit;font-size:13px}.table-tools input{flex:1;min-width:220px}.table-wrap{overflow-x:auto;margin-top:12px;border:1px solid #e5ebf3;border-radius:13px}table{width:100%;border-collapse:collapse;min-width:850px}th,td{padding:12px;border-bottom:1px solid #e5ebf3;text-align:left;font-size:13px;vertical-align:middle}th{background:#edf3fa;color:#17365e;font-weight:800;white-space:nowrap}tbody tr:hover{background:#f8fbff}.thumb{width:100px;height:68px;object-fit:cover;border-radius:8px;background:#edf2f8}.status{display:inline-block;padding:5px 9px;border-radius:99px;background:#e0f5e8;color:#167343;font-size:12px}.status.off{background:#fce8e7;color:#a32d27}.empty{text-align:center;padding:35px;color:#6e8095}.table-actions{display:flex;gap:6px;align-items:center}.table-actions form{margin:0}@media(max-width:600px){body{padding:14px}.panel{padding:17px}}
</style>
</head>
<body><main class="wrap">
<a class="back" href="<?= site_url('admin/dashboard') ?>">← Kembali ke Dashboard</a>
<section class="panel">
<h1>Galeri Kegiatan</h1>
<p>Tambah dan kelola foto serta video kegiatan SMPIT Al Firdaus Purwodadi. File video diunggah ke server website.</p>
<?php if (session()->getFlashdata('success')): ?><div class="notice success"><?= esc(session()->getFlashdata('success')) ?></div><?php endif; ?>
<?php if (session()->getFlashdata('error')): ?><div class="notice error"><?= esc(session()->getFlashdata('error')) ?></div><?php endif; ?>
</section>
<section class="panel" id="form-panel">
<h2 id="form-title">Tambah Dokumentasi Galeri</h2>
<form id="gallery-form" action="<?= site_url('admin/galleries/simpan') ?>" method="post" enctype="multipart/form-data">
<?= csrf_field() ?>
<input type="hidden" name="id" id="gallery-id" value="<?= esc(old('id','')) ?>">
<div class="field"><label for="title">Judul Dokumentasi *</label><input id="title" name="title" maxlength="200" required value="<?= esc(old('title','')) ?>" placeholder="Contoh: Kegiatan Belajar di Laboratorium"></div>
<div class="field"><label for="description">Deskripsi</label><textarea id="description" name="description" maxlength="5000" placeholder="Ceritakan kegiatan pada foto"><?= esc(old('description','')) ?></textarea></div>
<div class="field"><label for="category">Kategori</label><input id="category" name="category" maxlength="100" value="<?= esc(old('category','')) ?>" placeholder="Contoh: Kegiatan, Prestasi, Pembelajaran"></div>
<div class="field"><label for="video">Upload Video (opsional)</label><input id="video" type="file" name="video" accept="video/mp4,video/webm,video/ogg"><div class="hint">Format MP4, WebM, atau OGG. Maksimal 50 MB. Saat edit, kosongkan jika ingin memakai video lama.</div><video id="video-preview" class="preview" controls playsinline></video><div id="video-info" class="hint"></div></div>
<div class="field"><label for="image">Foto (opsional)</label><input id="image" type="file" name="image" accept="image/jpeg,image/png,image/webp"><div class="hint">JPG, PNG, atau WebP. Maksimal 4 MB. Saat edit, kosongkan jika ingin memakai foto lama.</div><img id="image-preview" class="preview" alt="Pratinjau foto"><div id="image-info" class="hint"></div></div>
<div class="field"><label for="sort_order">Urutan Tampilan</label><input id="sort_order" name="sort_order" type="number" min="0" required value="<?= esc(old('sort_order','0')) ?>"></div>
<div class="field"><label for="is_active">Status</label><select id="is_active" name="is_active"><option value="1" <?= old('is_active','1')==='1'?'selected':'' ?>>Aktif</option><option value="0" <?= old('is_active')==='0'?'selected':'' ?>>Nonaktif</option></select></div>
<div class="actions"><button class="btn" type="submit">Simpan Galeri</button><button class="btn secondary" type="button" onclick="resetGalleryForm()">Batal / Reset</button></div>
</form>
</section>
<section class="panel">
<h2>Data Galeri</h2>
<p>Daftar foto yang sudah disimpan. Gunakan tombol Edit untuk memperbarui data.</p>
<div class="table-wrap"><table><thead><tr><th>Foto</th><th>Judul & Deskripsi</th><th>Kategori</th><th>Urutan</th><th>Status</th><th>Aksi</th></tr></thead><tbody>
<?php if (!empty($galleries)): foreach ($galleries as $gallery): ?>
<tr>
<td><?php if (!empty($gallery['image'])): ?><img class="thumb" src="<?= base_url('assets/images/galleries/' . rawurlencode($gallery['image'])) ?>" alt="<?= esc($gallery['title']) ?>"><?php else: ?><div class="thumb"></div><?php endif; ?></td>
<td><strong><?= esc($gallery['title']) ?></strong><br><span class="hint"><?= esc($gallery['description'] ?? '') ?></span></td>
<td><?= esc($gallery['category'] ?: '-') ?></td><td><?= (int) $gallery['sort_order'] ?></td>
<td><span class="status <?= empty($gallery['is_active'])?'off':'' ?>"><?= !empty($gallery['is_active'])?'Aktif':'Nonaktif' ?></span></td>
<td><div class="table-actions"><button class="btn" type="button" onclick='editGallery(this)' data-gallery="<?= esc(json_encode($gallery, JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_TAG | JSON_HEX_AMP), 'attr') ?>">Edit</button><form action="<?= site_url('admin/galleries/hapus/' . (int) $gallery['id']) ?>" method="post" onsubmit="return confirm('Yakin ingin menghapus foto galeri ini?')"><?= csrf_field() ?><button class="btn danger" type="submit">Hapus</button></form></div></td>
</tr>
<?php endforeach; else: ?><tr><td colspan="6" class="empty">Belum ada foto galeri. Gunakan formulir di atas untuk menambahkan foto pertama.</td></tr><?php endif; ?>
</tbody></table></div>
<div class="actions"><a class="btn" href="<?= site_url('galeri') ?>" target="_blank" rel="noopener">Lihat Galeri Publik ↗</a></div>
</section></main>
<script>
const imageInput=document.getElementById('image');
const videoInput=document.getElementById('video');
const videoPreview=document.getElementById('video-preview');
const videoInfo=document.getElementById('video-info');
let currentVideo='';
let videoPreviewUrl=null;
function showGalleryVideo(filename){
 currentVideo=filename||'';
 if(videoPreviewUrl){URL.revokeObjectURL(videoPreviewUrl);videoPreviewUrl=null;}
 if(currentVideo && !/^https?:\/\//i.test(currentVideo)){
  videoPreview.src="<?= base_url('assets/videos/galleries/') ?>"+encodeURIComponent(currentVideo);
  videoPreview.style.display='block';videoInfo.textContent='Video tersimpan: '+currentVideo;
 }else{
  videoPreview.removeAttribute('src');videoPreview.load();videoPreview.style.display='none';
  videoInfo.textContent=currentVideo?'Video lama berupa tautan eksternal; unggah file video baru untuk menggantinya.':'Belum ada video tersimpan.';
 }
}
const imagePreview=document.getElementById('image-preview');
const imageInfo=document.getElementById('image-info');
let currentImage='';
let previewUrl=null;
function showGalleryImage(filename){
 currentImage=filename||'';
 if(previewUrl){URL.revokeObjectURL(previewUrl);previewUrl=null;}
 if(currentImage){imagePreview.src="<?= base_url('assets/images/galleries/') ?>"+encodeURIComponent(currentImage);imagePreview.style.display='block';imageInfo.textContent='Foto tersimpan: '+currentImage;}
 else{imagePreview.removeAttribute('src');imagePreview.style.display='none';imageInfo.textContent='Belum ada foto tersimpan.';}
}
imageInput.addEventListener('change',function(){
 const file=this.files[0];
 if(previewUrl){URL.revokeObjectURL(previewUrl);previewUrl=null;}
 if(!file){showGalleryImage(currentImage);return;}
 if(!['image/jpeg','image/png','image/webp'].includes(file.type)){alert('Pilih JPG, PNG, atau WebP.');this.value='';showGalleryImage(currentImage);return;}
 if(file.size>4*1024*1024){alert('Ukuran maksimal 4 MB.');this.value='';showGalleryImage(currentImage);return;}
 previewUrl=URL.createObjectURL(file);imagePreview.src=previewUrl;imagePreview.style.display='block';imageInfo.textContent='Pratinjau foto baru: '+file.name;
});
videoInput.addEventListener('change',function(){
 const file=this.files[0];if(videoPreviewUrl){URL.revokeObjectURL(videoPreviewUrl);videoPreviewUrl=null;}
 if(!file){showGalleryVideo(currentVideo);return;}
 if(!['video/mp4','video/webm','video/ogg'].includes(file.type)){alert('Pilih video MP4, WebM, atau OGG.');this.value='';showGalleryVideo(currentVideo);return;}
 if(file.size>50*1024*1024){alert('Ukuran maksimal video 50 MB.');this.value='';showGalleryVideo(currentVideo);return;}
 videoPreviewUrl=URL.createObjectURL(file);videoPreview.src=videoPreviewUrl;videoPreview.style.display='block';videoInfo.textContent='Pratinjau video baru: '+file.name;
});
function editGallery(button){
 const g=JSON.parse(button.dataset.gallery);
 document.getElementById('gallery-id').value=g.id;
 document.getElementById('title').value=g.title||'';
 document.getElementById('description').value=g.description||'';
 document.getElementById('category').value=g.category||'';
 document.getElementById('sort_order').value=g.sort_order||0;
 document.getElementById('is_active').value=String(g.is_active);
 showGalleryVideo(g.video_url||'');
 document.getElementById('form-title').textContent='Edit Foto Galeri';
 imageInput.value='';showGalleryImage(g.image||'');
 document.getElementById('form-panel').scrollIntoView({behavior:'smooth'});
}
function resetGalleryForm(){
 document.getElementById('gallery-form').reset();
 document.getElementById('gallery-id').value='';
 videoInput.value='';showGalleryVideo('');
 document.getElementById('sort_order').value='0';
 document.getElementById('is_active').value='1';
 document.getElementById('form-title').textContent='Tambah Foto Galeri';
 imageInput.value='';showGalleryImage('');
}
showGalleryImage('');showGalleryVideo('');
</script></body></html>
