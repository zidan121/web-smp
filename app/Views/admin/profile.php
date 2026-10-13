<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Sekolah | CMS SMPIT Al Firdaus</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            padding: 24px;
            font-family: Arial, sans-serif;
            background: #eef2f8;
            color: #172b4d;
        }
        main { max-width: 850px; margin: auto; }
        .card {
            background: white;
            padding: 28px;
            border-radius: 16px;
            box-shadow: 0 8px 24px #14294a12;
        }
        label { display: block; margin: 18px 0 8px; font-weight: bold; }
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
        }
        textarea { min-height: 100px; resize: vertical; }
        button, .back {
            display: inline-block;
            margin-top: 22px;
            padding: 12px 18px;
            border: 0;
            border-radius: 8px;
            background: #142d52;
            color: white;
            text-decoration: none;
            cursor: pointer;
        }
        .message { padding: 12px; border-radius: 8px; margin: 14px 0; }
        .error { background: #fff0f0; color: #a11; }
        .success { background: #eaf8ee; color: #176534; }
        .photo-preview{display:block;width:min(100%,420px);aspect-ratio:16/9;object-fit:cover;border-radius:12px;border:1px solid #d6e0ee;background:#eef3f9;margin:8px 0 12px}
        .hint{font-size:13px;color:#64748b;line-height:1.6}
    </style>
</head>
<body>
<main>
    <p><a href="<?= site_url('admin/dashboard') ?>">← Kembali ke Dashboard</a></p>

    <section class="card">
        <h1>Profil Sekolah</h1>
        <p>Perubahan disimpan ke database CMS.</p>

        <?php if ($error = session()->getFlashdata('error')): ?>
            <div class="message error"><?= esc($error) ?></div>
        <?php endif; ?>

        <?php if ($success = session()->getFlashdata('success')): ?>
            <div class="message success"><?= esc($success) ?></div>
        <?php endif; ?>

        <?php $p = $profile ?? []; ?>

        <form action="<?= site_url('admin/profil/simpan') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <label for="profile_image">Foto bagian Profil Sekolah</label>
            <?php if (! empty($p['profile_image'])): ?>
                <img class="photo-preview" id="profileImagePreview" src="<?= base_url('assets/images/' . $p['profile_image']) ?>" alt="Foto profil sekolah saat ini">
            <?php else: ?>
                <img class="photo-preview" id="profileImagePreview" src="" alt="Pratinjau foto profil" hidden>
            <?php endif; ?>
            <input id="profile_image" name="profile_image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
            <p class="hint">JPG, PNG, atau WebP maksimal 3 MB. Kosongkan jika tidak ingin mengganti foto.</p>
            <label for="hero_image">Gambar utama halaman depan</label>
            <?php if (! empty($p['hero_image'])): ?>
                <img class="photo-preview" id="heroImagePreview" src="<?= base_url('assets/images/' . $p['hero_image']) ?>" alt="Gambar utama halaman depan saat ini">
            <?php else: ?>
                <img class="photo-preview" id="heroImagePreview" src="<?= base_url('assets/images/hero-sekolah.jpg') ?>" alt="Gambar utama halaman depan" onerror="this.hidden=true">
            <?php endif; ?>
            <input id="hero_image" name="hero_image" type="file" accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp">
            <p class="hint">Gambar yang tampil di sebelah kanan judul halaman utama. JPG, PNG, atau WebP maksimal 5 MB. Kosongkan jika tidak ingin mengganti gambar.</p>

            <label for="profile_video_url">URL video YouTube bagian Profil Sekolah</label>
            <input id="profile_video_url" name="profile_video_url" type="url" maxlength="500" placeholder="https://www.youtube.com/watch?v=..." value="<?= esc(old('profile_video_url', $p['profile_video_url'] ?? '')) ?>">
            <p class="hint">Tempel tautan video YouTube biasa atau tautan youtu.be. Kosongkan untuk menampilkan foto profil.</p>
            <label for="school_name">Nama sekolah *</label>
            <input id="school_name" name="school_name" required maxlength="200"
                   value="<?= esc(old('school_name', $p['school_name'] ?? 'SMPIT Al Firdaus Purwodadi')) ?>">

            <label for="tagline">Tagline</label>
            <input id="tagline" name="tagline" maxlength="255"
                   value="<?= esc(old('tagline', $p['tagline'] ?? '')) ?>">

            <label for="about">Tentang sekolah</label>
            <textarea id="about" name="about"><?= esc(old('about', $p['about'] ?? '')) ?></textarea>

            <label for="vision">Visi sekolah</label>
            <textarea id="vision" name="vision"><?= esc(old('vision', $p['vision'] ?? '')) ?></textarea>

            <label for="mission">Misi sekolah</label>
            <textarea id="mission" name="mission"><?= esc(old('mission', $p['mission'] ?? '')) ?></textarea>

            <label for="address">Alamat</label>
            <textarea id="address" name="address"><?= esc(old('address', $p['address'] ?? '')) ?></textarea>

            <label for="phone">Nomor telepon/WhatsApp</label>
            <input id="phone" name="phone" maxlength="30"
                   value="<?= esc(old('phone', $p['phone'] ?? '')) ?>">

            <label for="email">Email sekolah</label>
            <input id="email" type="email" name="email" maxlength="150"
                   value="<?= esc(old('email', $p['email'] ?? '')) ?>">

            <button type="submit">Simpan Profil</button>
        </form>
    </section>
</main>
<script>
document.getElementById('hero_image')?.addEventListener('change', function () {\n const file=this.files&&this.files[0]; if(!file)return;\n const preview=document.getElementById('heroImagePreview');\n preview.src=URL.createObjectURL(file); preview.hidden=false;\n});\ndocument.getElementById('profile_image')?.addEventListener('change', function () {
 const file=this.files&&this.files[0]; if(!file)return;
 const preview=document.getElementById('profileImagePreview');
 preview.src=URL.createObjectURL(file); preview.hidden=false;
});
</script>
</body>
</html>