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

        <form action="<?= site_url('admin/settings/simpan') ?>" method="post">
            <?= csrf_field() ?>
            <div class="grid">
                <div class="field wide">
                    <label for="site_name">Nama Website / Sekolah *</label>
                    <input id="site_name" name="site_name" required maxlength="150"
                        value="<?= esc(old('site_name', $settings['site_name'] ?? 'SMPIT Al Firdaus Purwodadi')) ?>">
                </div>
                <div class="field wide">
                    <label for="tagline">Slogan / Tagline</label>
                    <input id="tagline" name="tagline" maxlength="255"
                        value="<?= esc(old('tagline', $settings['tagline'] ?? '')) ?>"
                        placeholder="Slogan sekolah">
                </div>
                <div class="field">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" maxlength="150"
                        value="<?= esc(old('email', $settings['email'] ?? '')) ?>" placeholder="info@sekolah.sch.id">
                </div>
                <div class="field">
                    <label for="phone">Nomor Telepon</label>
                    <input id="phone" name="phone" maxlength="50"
                        value="<?= esc(old('phone', $settings['phone'] ?? '')) ?>" placeholder="Nomor telepon sekolah">
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
                <div class="field wide">
                    <label for="address">Alamat Sekolah</label>
                    <textarea id="address" name="address" maxlength="1000" placeholder="Alamat lengkap sekolah"><?= esc(old('address', $settings['address'] ?? '')) ?></textarea>
                </div>
            </div>
            <button type="submit">Simpan Pengaturan</button>
        </form>
    </section>
</main>
</body>
</html>
