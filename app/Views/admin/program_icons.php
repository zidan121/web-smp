<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Ikon Program - SMPIT Al Firdaus</title>

    <style>
        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            color: #203653;
            background: #f2f5fa;
        }

        main {
            max-width: 1100px;
            margin: auto;
        }

        .card {
            background: #fff;
            padding: 20px;
            margin-bottom: 24px;
            border-radius: 12px;
            box-shadow: 0 3px 12px rgba(0, 0, 0, .06);
        }

        .form-control,
        .form-select {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: 10px;
            margin: 8px 0 16px;
            border: 1px solid #ccd5e0;
            border-radius: 6px;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: 0;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary {
            color: white;
            background: #203653;
        }

        .btn-danger {
            color: white;
            background: #c0392b;
        }

        .alert {
            padding: 12px;
            margin-bottom: 16px;
            border-radius: 6px;
        }

        .alert-success {
            background: #dff5e5;
            color: #176534;
        }

        .alert-danger {
            background: #fde8e7;
            color: #922b21;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }

        th {
            background: #edf2f8;
        }

        [hidden] {
            display: none !important;
        }
    </style>
</head>
<body>
<main>
    <!-- Konten CMS ikon yang sudah ada dimulai di sini -->
    <div class="container-fluid">
    <h2 class="mb-4">CMS Ikon Program</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success">
            <?= esc(session()->getFlashdata('success')) ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger">
            <?= esc(session()->getFlashdata('error')) ?>
        </div>
    <?php endif; ?>

    <div class="card mb-4">
        <div class="card-header">
            <strong>Tambah Ikon Baru</strong>
        </div>

        <div class="card-body">
            <form action="<?= site_url('admin/program-icons/simpan') ?>"
                  method="post"
                  enctype="multipart/form-data">

                <?= csrf_field() ?>

                <div class="mb-3">
                    <label class="form-label">Nama Ikon</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           maxlength="100"
                           placeholder="Contoh: Program ICT"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Ikon</label>
                    <select name="icon_type"
                            id="icon_type"
                            class="form-select"
                            required>
                        <option value="builtin">Ikon Bawaan</option>
                        <option value="image">Upload Gambar Sendiri</option>
                    </select>
                </div>

                <div class="mb-3" id="builtin_group">
                    <label class="form-label">Pilih Ikon Bawaan</label>

                    <select name="icon_value"
                            id="icon_value"
                            class="form-select">
                        <option value="book-open">Buku</option>
                        <option value="globe">Globe / Dunia</option>
                        <option value="laptop">Laptop</option>
                        <option value="graduation-cap">Topi Wisuda</option>
                        <option value="microscope">Mikroskop</option>
                        <option value="code">Coding</option>
                        <option value="heart">Hati</option>
                        <option value="star">Bintang</option>
                    </select>
                </div>

                <div class="mb-3" id="image_group" hidden>
                    <label class="form-label">Upload Gambar Ikon</label>
                    <input type="file"
                           name="icon_image"
                           id="icon_image"
                           class="form-control"
                           accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                           disabled>
                    <small class="text-muted">
                        Format JPG, PNG, atau WebP. Maksimal 2 MB.
                    </small>
                    <div class="mt-3">
                        <img id="icon_preview"
                             alt="Pratinjau ikon"
                             style="display:none; width:90px;height:90px;object-fit:contain;">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">
                    Simpan Ikon
                </button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <strong>Daftar Ikon Tersedia</strong>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead>
                        <tr>
                            <th>Pratinjau</th>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Nilai Ikon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php if (empty($icons)): ?>
                        <tr>
                            <td colspan="5" class="text-center">
                                Belum ada ikon. Silakan tambahkan ikon pertama.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($icons as $icon): ?>
                            <tr>
                                <td>
                                    <?php if ($icon['icon_type'] === 'image'): ?>
                                        <img
                                            src="<?= base_url('assets/images/program-icons/' . rawurlencode($icon['icon_value'])) ?>"
                                            alt="<?= esc($icon['name']) ?>"
                                            style="width:55px;height:55px;object-fit:contain;">
                                    <?php else: ?>
                                        <span class="badge bg-primary">
                                            <?= esc($icon['icon_value']) ?>
                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td><?= esc($icon['name']) ?></td>
                                <td>
                                    <?= $icon['icon_type'] === 'image'
                                        ? 'Gambar sendiri'
                                        : 'Ikon bawaan' ?>
                                </td>
                                <td><?= esc($icon['icon_value']) ?></td>

                                <td>
                                    <form action="<?= site_url('admin/program-icons/hapus/' . $icon['id']) ?>"
                                          method="post"
                                          onsubmit="return confirm('Yakin ingin menghapus ikon ini?')">
                                        <?= csrf_field() ?>
                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const type = document.getElementById('icon_type');
    const builtinGroup = document.getElementById('builtin_group');
    const imageGroup = document.getElementById('image_group');
    const builtinValue = document.getElementById('icon_value');
    const imageInput = document.getElementById('icon_image');
    const preview = document.getElementById('icon_preview');

    function updateIconType() {
        const isImage = type.value === 'image';

        builtinGroup.hidden = isImage;
        imageGroup.hidden = !isImage;

        builtinValue.disabled = isImage;
        imageInput.disabled = !isImage;
        imageInput.required = isImage;

        if (!isImage) {
            preview.style.display = 'none';
            preview.removeAttribute('src');
            imageInput.value = '';
        }
    }

    type.addEventListener('change', updateIconType);

    imageInput.addEventListener('change', function () {
        const file = this.files[0];

        if (!file) {
            preview.style.display = 'none';
            return;
        }

        if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)
            || file.size > 2 * 1024 * 1024) {
            alert('Pilih gambar JPG, PNG, atau WebP maksimal 2 MB.');
            this.value = '';
            preview.style.display = 'none';
            return;
        }

        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    });

    updateIconType();
});
</script>
</main>
</body>
</html>