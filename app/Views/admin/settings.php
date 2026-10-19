<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengaturan Website | SMPIT Al Firdaus</title>
    <style>
        *{box-sizing:border-box}
        body{margin:0;padding:32px 18px;font-family:Arial,sans-serif;color:#203653;background:#f2f5fa}
        main{max-width:1000px;margin:auto}
        .back{display:inline-block;margin-bottom:18px;color:#214a7b}
        .panel{background:#fff;padding:28px;border:1px solid #e1e7f0;border-radius:14px;box-shadow:0 8px 24px #2036530a}
        h1{margin:0 0 8px;font-size:28px}
        .intro{margin:0 0 24px;color:#68788e}
        .alert{padding:12px 14px;border-radius:8px;margin:0 0 18px}
        .success{background:#e5f7ec;color:#17643a}.error{background:#fdeaea;color:#9c2525}
        .grid{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:18px}
        .field{display:flex;flex-direction:column;gap:7px}
        .wide{grid-column:1/-1}
        label{font-weight:600;font-size:14px}
        input,textarea{width:100%;padding:12px 13px;border:1px solid #cbd6e5;border-radius:8px;font:inherit;color:#203653;background:#fff}
        textarea{min-height:100px;resize:vertical}
        .hint{font-size:12px;color:#77869b}
        button{margin-top:22px;padding:12px 20px;border:0;border-radius:8px;background:#203653;color:#fff;font-weight:700;cursor:pointer}
        button:hover{background:#2d4d77}
        @media(max-width:650px){.grid{grid-template-columns:1fr}.wide{grid-column:auto}.panel{padding:20px}}
    </style>
</head>
<body>
<main>
    <a class="back" href="<?= site_url('admin/dashboard') ?>">← Kembali ke Dashboard</a>
    <section class="panel">
        <h1>Pengaturan Website</h1>
        <p class="intro">Atur identitas dan informasi kontak yang digunakan pada website sekolah.</p>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert success"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert error"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>

        <form action="<?= site_url('admin/settings/simpan') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="grid">
                <p class="hint wide">Kelola gambar utama, alamat, WhatsApp, email, dan kontak media sosial di halaman ini. Deskripsi, visi, dan misi tetap ada di menu Profil Sekolah.</p>
                <div class="field wide">
                    <label for="site_logo">Logo sekolah untuk website publik</label>
                    <?php if (! empty($settings['site_logo'])): ?>
                        <img id="siteLogoPreview" src="<?= base_url('assets/images/' . $settings['site_logo']) ?>" alt="Logo sekolah saat ini" style="display:block;width:120px;height:120px;object-fit:contain;background:#f3f7fc;padding:10px;border:1px solid #d6e0ee;border-radius:12px;margin:8px 0" onerror="this.style.display='none'">
                    <?php else: ?>
                        <div id="siteLogoPlaceholder" class="hint" style="padding:18px;border:1px dashed #cbd6e5;border-radius:10px;margin:8px 0">Belum ada logo. Logo akan tampil di sebelah nama sekolah pada header publik.</div>
                        <img id="siteLogoPreview" alt="Pratinjau logo" hidden style="width:120px;height:120px;object-fit:contain;background:#f3f7fc;padding:10px;border:1px solid #d6e0ee;border-radius:12px;margin:8px 0">
                    <?php endif; ?>
                    <input id="site_logo" name="site_logo" type="file" accept=".jpg,.jpeg,.png,.webp,.svg,image/jpeg,image/png,image/webp,image/svg+xml">
                    <span class="hint">Format JPG, PNG, WebP, atau SVG maksimal 3 MB. Logo akan menggantikan kotak huruf AF di website publik.</span>
                </div>
                <div class="field wide">
                    <label for="hero_image">Gambar utama halaman depan</label>
                    <?php if (! empty($profile['hero_image'])): ?>
                        <img id="heroImagePreview" src="<?= base_url('assets/images/' . $profile['hero_image']) ?>" alt="Gambar utama saat ini" style="display:block;width:min(100%,520px);aspect-ratio:16/9;object-fit:cover;border-radius:12px;margin:8px 0;border:1px solid #d6e0ee" onerror="this.style.display='none'">
                    <?php else: ?>
                        <div id="heroImagePlaceholder" class="hint" style="padding:18px;border:1px dashed #cbd6e5;border-radius:10px;margin:8px 0">Belum ada gambar utama yang diunggah. Pilih gambar di bawah untuk menambahkannya.</div>
                        <img id="heroImagePreview" alt="Pratinjau gambar utama" hidden style="display:block;width:min(100%,520px);aspect-ratio:16/9;object-fit:cover;border-radius:12px;margin:8px 0;border:1px solid #d6e0ee">
                    <?php endif; ?>
                    <input id="hero_image" name="hero_image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                    <span class="hint">JPG, PNG, atau WebP maksimal 5 MB.</span>
                </div>
                <div class="field wide">
                    <label for="prestasi_hero_image">Gambar latar halaman Prestasi</label>
                    <?php if (! empty($settings['prestasi_hero_image'])): ?>
                        <img id="prestasiHeroPreview" src="<?= base_url('assets/images/' . $settings['prestasi_hero_image']) ?>" alt="Gambar latar Prestasi saat ini" style="display:block;width:min(100%,520px);aspect-ratio:16/9;object-fit:cover;border-radius:12px;margin:8px 0;border:1px solid #d6e0ee" onerror="this.style.display='none'">
                    <?php else: ?>
                        <div id="prestasiHeroPlaceholder" class="hint" style="padding:18px;border:1px dashed #cbd6e5;border-radius:10px;margin:8px 0">Belum ada gambar khusus. Banner Prestasi menggunakan gambar bawaan website.</div>
                        <img id="prestasiHeroPreview" alt="Pratinjau gambar latar Prestasi" hidden style="width:min(100%,520px);aspect-ratio:16/9;object-fit:cover;border-radius:12px;margin:8px 0;border:1px solid #d6e0ee">
                    <?php endif; ?>
                    <input id="prestasi_hero_image" name="prestasi_hero_image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
                    <span class="hint">JPG, PNG, atau WebP maksimal 5 MB. Kosongkan jika ingin tetap menggunakan gambar yang sekarang.</span>
                </div>
                    <div class="field wide">
                        <label>Atur potongan gambar seperti edit foto profil WhatsApp</label>
                        <div id="prestasiCropFrame" style="position:relative;width:min(100%,720px);aspect-ratio:16/5;overflow:hidden;border-radius:14px;background:#102b50;touch-action:none;cursor:grab;border:1px solid #cbd6e5">
                            <img id="prestasiCropImage" src="<?= base_url('assets/images/' . rawurlencode($settings['prestasi_hero_image'] ?? 'program-ict.jpg')) ?>" alt="Pratinjau potongan banner Prestasi" draggable="false" style="position:absolute;width:100%;height:100%;object-fit:cover;user-select:none;pointer-events:none;left:0;top:0">
                            <div style="position:absolute;inset:0;pointer-events:none;background:linear-gradient(90deg,rgba(10,31,62,.70),rgba(18,57,99,.25));display:flex;align-items:center;padding:6%;color:#fff">
                                <div><div style="font-size:clamp(9px,1.3vw,13px);letter-spacing:2px;font-weight:800;color:#ffd77b">BANGGA DENGAN PENCAPAIAN SISWA</div><div style="font-size:clamp(20px,4vw,42px);font-weight:800;line-height:1.1;margin:8px 0">Prestasi &amp; Apresiasi</div><div style="font-size:clamp(9px,1.5vw,15px)">Pratinjau tampilan banner</div></div>
                            </div>
                        </div>
                        <span class="hint">Geser gambar langsung di area pratinjau, seperti saat mengatur foto profil WhatsApp.</span>
                    </div>
                    <div class="field">
                        <label for="prestasi_hero_position_x">Posisi horizontal</label>
                        <input id="prestasi_hero_position_x" name="prestasi_hero_position_x" type="range" min="0" max="100" step="1" value="<?= esc(old('prestasi_hero_position_x', $settings['prestasi_hero_position_x'] ?? '50')) ?>">
                    </div>
                    <div class="field">
                        <label for="prestasi_hero_position_y">Posisi vertikal</label>
                        <input id="prestasi_hero_position_y" name="prestasi_hero_position_y" type="range" min="0" max="100" step="1" value="<?= esc(old('prestasi_hero_position_y', $settings['prestasi_hero_position_y'] ?? '50')) ?>">
                    </div>
                    <div class="field wide">
                        <label for="prestasi_hero_zoom">Perbesar / perkecil gambar</label>
                        <input id="prestasi_hero_zoom" name="prestasi_hero_zoom" type="range" min="100" max="200" step="10" value="<?= esc(old('prestasi_hero_zoom', $settings['prestasi_hero_zoom'] ?? '100')) ?>">
                        <div id="prestasiPositionLabel" class="hint">Posisi gambar: <?= esc(old('prestasi_hero_position_x', $settings['prestasi_hero_position_x'] ?? '50')) ?>% horizontal, <?= esc(old('prestasi_hero_position_y', $settings['prestasi_hero_position_y'] ?? '50')) ?>% vertikal; zoom <?= esc(old('prestasi_hero_zoom', $settings['prestasi_hero_zoom'] ?? '100')) ?>%.</div>
                    </div>

                <div class="field wide">
                    <label for="address">Alamat sekolah</label>
                    <textarea id="address" name="address"><?= esc(old('address', $profile['address'] ?? $settings['address'] ?? '')) ?></textarea>
                </div>
                <div class="field">
                    <label for="phone">WhatsApp / nomor sekolah</label>
                    <input id="phone" name="phone" maxlength="50" value="<?= esc(old('phone', $profile['phone'] ?? $settings['phone'] ?? '')) ?>" placeholder="Contoh: 6281234567890">
                </div>
                <div class="field">
                    <label for="email">Email sekolah</label>
                    <input id="email" name="email" type="email" maxlength="150" value="<?= esc(old('email', $profile['email'] ?? $settings['email'] ?? '')) ?>" placeholder="nama@sekolah.sch.id">
                </div>
                <div class="field">
                    <label for="whatsapp">WhatsApp PPDB</label>
                    <input id="whatsapp" name="whatsapp" maxlength="50"
                        value="<?= esc(old('whatsapp', $settings['whatsapp'] ?? '')) ?>" placeholder="Contoh: 6281234567890">
                </div>
                <div class="field">
                    <label for="instagram">Tautan Instagram</label>
                    <input id="instagram" name="instagram" maxlength="255"
                        value="<?= esc(old('instagram', $settings['instagram'] ?? '')) ?>" placeholder="https://instagram.com/...">
                </div>
                <div class="field">
                    <label for="facebook">Tautan Facebook</label>
                    <input id="facebook" name="facebook" maxlength="255"
                        value="<?= esc(old('facebook', $settings['facebook'] ?? '')) ?>" placeholder="https://facebook.com/...">
                </div>
                <div class="field">
                    <label for="youtube">Tautan YouTube</label>
                    <input id="youtube" name="youtube" maxlength="255"
                        value="<?= esc(old('youtube', $settings['youtube'] ?? '')) ?>" placeholder="https://youtube.com/...">
                </div>
            </div>
            <button type="submit">Simpan Pengaturan</button>
        </form>
    </section>
</main>
<script>
document.getElementById('site_logo')?.addEventListener('change', function () {
    const file = this.files && this.files[0];
    if (!file) return;
    const preview = document.getElementById('siteLogoPreview');
    preview.src = URL.createObjectURL(file);
    preview.hidden = false;
    preview.style.display = 'block';
    const placeholder = document.getElementById('siteLogoPlaceholder');
    if (placeholder) placeholder.style.display = 'none';
});
const cropFrame = document.getElementById('prestasiCropFrame');
const cropImage = document.getElementById('prestasiCropImage');
const cropX = document.getElementById('prestasi_hero_position_x');
const cropY = document.getElementById('prestasi_hero_position_y');
const cropZoom = document.getElementById('prestasi_hero_zoom');
function updatePrestasiCrop() {
    const x = Number(cropX.value || 50), y = Number(cropY.value || 50), zoom = Number(cropZoom.value || 100);
    cropImage.style.width = zoom + '%';
    cropImage.style.height = zoom + '%';
    cropImage.style.left = ((100 - zoom) * x / 100) + '%';
    cropImage.style.top = ((100 - zoom) * y / 100) + '%';
    const label = document.getElementById('prestasiPositionLabel');
    if (label) label.textContent = 'Posisi: ' + x + '% horizontal, ' + y + '% vertikal · Zoom ' + zoom + '%.';
}
[cropX,cropY,cropZoom].forEach(control => control?.addEventListener('input', updatePrestasiCrop));
let cropDrag = null;
cropFrame?.addEventListener('pointerdown', event => {
    cropDrag = {x:event.clientX,y:event.clientY,left:Number(cropX.value),top:Number(cropY.value)};
    cropFrame.setPointerCapture(event.pointerId);
    cropFrame.style.cursor = 'grabbing';
});
cropFrame?.addEventListener('pointermove', event => {
    if (!cropDrag) return;
    const zoom = Math.max(1, Number(cropZoom.value) - 100);
    const scale = zoom || 1;
    cropX.value = String(Math.max(0,Math.min(100,Math.round(cropDrag.left - (event.clientX-cropDrag.x)/cropFrame.clientWidth*100/scale*100))));
    cropY.value = String(Math.max(0,Math.min(100,Math.round(cropDrag.top - (event.clientY-cropDrag.y)/cropFrame.clientHeight*100/scale*100))));
    updatePrestasiCrop();
});
function endPrestasiCrop(){cropDrag=null;if(cropFrame)cropFrame.style.cursor='grab'}
cropFrame?.addEventListener('pointerup',endPrestasiCrop);
cropFrame?.addEventListener('pointercancel',endPrestasiCrop);
document.getElementById('prestasi_hero_image')?.addEventListener('change', function () {
    const file = this.files && this.files[0];
    if (!file) return;
    cropImage.src = URL.createObjectURL(file);
    updatePrestasiCrop();
});
updatePrestasiCrop();
document.getElementById('prestasi_hero_image')?.addEventListener('change', function () {
    const file = this.files && this.files[0];
    if (!file) return;
    const preview = document.getElementById('prestasiHeroPreview');
    preview.src = URL.createObjectURL(file);
    preview.hidden = false;
    preview.style.display = 'block';
    const placeholder = document.getElementById('prestasiHeroPlaceholder');
    if (placeholder) placeholder.style.display = 'none';
});
document.getElementById('hero_image')?.addEventListener('change', function () {
    const file = this.files && this.files[0];
    if (!file) return;
    const preview = document.getElementById('heroImagePreview');
    preview.src = URL.createObjectURL(file);
    preview.hidden = false;
    const placeholder = document.getElementById('heroImagePlaceholder');
    if (placeholder) placeholder.style.display = 'none';
});
</script>
</body>
</html>
