<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Program Unggulan | CMS SMPIT Al Firdaus</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            color: #203653;
            background: #f2f5fa;
        }

        main { max-width: 1100px; margin: auto; }

        .panel {
            background: white;
            padding: 25px;
            border-radius: 14px;
            border: 1px solid #e1e7f0;
            margin-bottom: 22px;
        }

        .field { margin-bottom: 16px; }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 7px;
        }

        input, textarea, select {
            width: 100%;
            padding: 11px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font: inherit;
        }

        textarea { min-height: 110px; resize: vertical; }

        button, .btn {
            display: inline-block;
            padding: 10px 15px;
            border: 0;
            border-radius: 7px;
            background: #19365f;
            color: white;
            text-decoration: none;
            cursor: pointer;
            font-size: 13px;
        }

        .edit { background: #315f91; }
        .delete { background: #b42336; }

        .message {
            padding: 12px;
            border-radius: 8px;
            margin: 15px 0;
        }

        .success { background: #e8f7ed; color: #176534; }
        .error { background: #fff0f0; color: #a11; }

        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; }

        th, td {
            padding: 13px;
            border-bottom: 1px solid #e6ebf2;
            text-align: left;
            vertical-align: middle;
        }

        th { background: #f7f9fc; font-size: 13px; }
        td { font-size: 13px; }

        .actions { display: flex; gap: 7px; flex-wrap: wrap; }
        .status { font-weight: bold; }

        .hint {
            display: block;
            color: #64748b;
            font-size: 12px;
            margin-top: 6px;
        }

        .preview {
            display: none;
            width: 100%;
            max-width: 440px;
            height: 190px;
            object-fit: cover;
            border-radius: 12px;
            border: 1px solid #dbe4f0;
            margin-top: 12px;
        }

        .icon-options {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 10px;
        }

        .icon-choice {
            position: relative;
            cursor: pointer;
        }

        .icon-choice input {
            position: absolute;
            opacity: 0;
            width: 1px;
            height: 1px;
        }

        .icon-choice span {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 7px;
            min-height: 88px;
            padding: 10px 4px;
            border: 1px solid #dbe4f0;
            border-radius: 10px;
            text-align: center;
            font-size: 12px;
            background: #fff;
        }

        .icon-choice .emoji { font-size: 27px; }

        .icon-choice input:checked + span {
            border: 2px solid #315f91;
            background: #edf5ff;
        }

        .icon-choice input:focus-visible + span {
            outline: 2px solid #2563eb;
        }

        .table-image {
            width: 90px;
            height: 58px;
            object-fit: cover;
            border-radius: 7px;
        }

        .table-icon { font-size: 24px; }

        @media (max-width: 600px) {
            body { padding: 12px; }
            .panel { padding: 16px; }
            .icon-options { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        }
    </style>
</head>

<body>
<main>
    <p><a href="<?= site_url('admin/dashboard') ?>">← Kembali ke Dashboard</a></p>

    <section class="panel">
        <h1>Program Unggulan</h1>
        <p>Kelola nama, deskripsi, foto latar, dan ikon TCP, ICP, serta ICT.</p>

        <?php if ($message = session()->getFlashdata('success')): ?>
            <div class="message success"><?= esc($message) ?></div>
        <?php endif; ?>

        <?php if ($message = session()->getFlashdata('error')): ?>
            <div class="message error"><?= esc($message) ?></div>
        <?php endif; ?>

        <h2 id="form-title">Tambah Program</h2>

        <form
            id="program-form"
            action="<?= site_url('admin/programs/simpan') ?>"
            method="post"
            enctype="multipart/form-data"
        >
            <?= csrf_field() ?>

            <input type="hidden" name="id" id="program-id" value="">

            <div class="field">
                <label for="name">Nama Program *</label>
                <input
                    id="name"
                    name="name"
                    maxlength="150"
                    required
                    value="<?= esc(old('name', '')) ?>"
                    placeholder="Contoh: ICT"
                >
            </div>

            <div class="field">
                <label for="description">Deskripsi Program</label>
                <textarea
                    id="description"
                    name="description"
                    maxlength="5000"
                    placeholder="Jelaskan program unggulan sekolah"
                ><?= esc(old('description', '')) ?></textarea>
            </div>

            <div class="field">
                <label>Ikon Program *</label>

                <?php
                $builtinIcons = [
                    'book-open'      => ['📖', 'Buku / TCP'],
                    'globe'          => ['🌐', 'Globe / ICP'],
                    'laptop'         => ['💻', 'Laptop / ICT'],
                    'graduation-cap' => ['🎓', 'Pendidikan'],
                    'microscope'     => ['🔬', 'Sains'],
                    'code'           => ['👨‍💻', 'Pemrograman'],
                    'heart'          => ['❤️', 'Karakter'],
                    'star'           => ['⭐', 'Prestasi'],
                ];

                $selectedIcon = old('icon', 'book-open');
                $selectedProgramIconId = old('program_icon_id', '');
                ?>

                <div class="icon-options">
                    <?php foreach ($builtinIcons as $value => $details): ?>
                        <label class="icon-choice">
                            <input
                                type="radio"
                                name="icon"
                                value="<?= esc($value) ?>"
                                <?= $selectedIcon === $value && $selectedProgramIconId === '' ? 'checked' : '' ?>
                                required
                            >
                            <span>
                                <span class="emoji"><?= $details[0] ?></span>
                                <?= esc($details[1]) ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <p><strong>Atau pilih ikon dari CMS</strong></p>

                <div class="icon-options">
                    <?php foreach (($programIcons ?? []) as $programIcon): ?>
                        <label class="icon-choice">
                            <input
                                type="radio"
                                name="program_icon_id"
                                value="<?= (int) $programIcon['id'] ?>"
                                <?= (string) $selectedProgramIconId === (string) $programIcon['id'] ? 'checked' : '' ?>
                                onchange="clearBuiltinIcon()"
                            >

                            <span>
                                <?php if ($programIcon['icon_type'] === 'image'): ?>
                                    <img
                                        src="<?= base_url('assets/images/program-icons/' . rawurlencode($programIcon['icon_value'])) ?>"
                                        alt="<?= esc($programIcon['name']) ?>"
                                        style="width:32px;height:32px;object-fit:contain;vertical-align:middle"
                                    >
                                <?php else: ?>
                                    <span class="emoji">
                                        <?= esc($programIcon['icon_value']) ?>
                                    </span>
                                <?php endif; ?>

                                <?= esc($programIcon['name']) ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>

                <small class="hint">
                    Pilih satu ikon bawaan atau satu ikon dari CMS.
                </small>
            </div>

            <script>
            function clearBuiltinIcon() {
                document.querySelectorAll('input[name="icon"]').forEach(function (input) {
                    input.checked = false;
                });
            }

            document.querySelectorAll('input[name="icon"]').forEach(function (input) {
                input.addEventListener('change', function () {
                    if (this.checked) {
                        document.querySelectorAll('input[name="program_icon_id"]').forEach(function (cmsIcon) {
                            cmsIcon.checked = false;
                        });
                    }
                });
            });
            }
            </script>
            <div class="field">
            <label for="image">Foto Banner Halaman Detail Program (TCP / ICT / ICP)</label>
            <input
                id="image"
                type="file"
                name="image"
                accept="image/jpeg,image/png,image/webp"
            >
            <small class="hint">
                Format JPG, PNG, atau WebP. Maksimal 2 MB.
                Foto ini tampil pada banner besar di sisi kanan halaman detail program. Kosongkan jika tidak ingin mengganti foto.
            </small>

            <img
                id="image-preview"
                class="preview"
                alt="Pratinjau foto program"
            >
            <div id="current-image-info" class="hint"></div>
        </div>

        <div class="field">
            <label for="sort_order">Urutan Tampilan</label>
            <input
                id="sort_order"
                type="number"
                name="sort_order"
                min="0"
                required
                value="<?= esc(old('sort_order', '0')) ?>"
            >
        </div>

        <div class="field">
            <label for="is_active">Status</label>
            <select id="is_active" name="is_active" required>
                <option value="1" <?= old('is_active', '1') === '1' ? 'selected' : '' ?>>
                    Aktif
                </option>
                <option value="0" <?= old('is_active') === '0' ? 'selected' : '' ?>>
                    Nonaktif
                </option>
            </select>
        </div>

        <button type="submit">Simpan Program</button>
        <button type="button" class="edit" onclick="resetForm()">
            Batal Edit
        </button>
        </form>
        </section>

<section class="panel" id="data-program">
    <h2>Data Program Unggulan</h2>
    <p>Daftar program yang sudah tersimpan.</p>
    <?php if (empty($programs)): ?>
        <p>Belum ada data program.</p>
    <?php else: ?>
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>No.</th><th>Nama Program</th><th>Ikon</th>
                    <th>Deskripsi</th><th>Urutan</th><th>Status</th><th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($programs as $index => $program): ?>
                <?php
                $cmsIconRow = null;
                foreach (($programIcons ?? []) as $availableIcon) {
                    if ((int) ($availableIcon['id'] ?? 0) === (int) ($program['program_icon_id'] ?? 0)) {
                        $cmsIconRow = $availableIcon;
                        break;
                    }
                }
                $programJson = json_encode($program, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT);
                $iconMapRow = [
                    'book-open' => '📖', 'globe' => '🌐', 'laptop' => '💻',
                    'graduation-cap' => '🎓', 'microscope' => '🔬', 'code' => '👨‍💻',
                    'heart' => '❤️', 'star' => '⭐'
                ];
                ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td>
                        <strong><?= esc($program['name']) ?></strong><br>
                        <small><?= esc($program['slug']) ?></small>
                        <?php if (!empty($program['image'])): ?>
                            <br><img class="table-image"
                                src="<?= base_url('assets/images/programs/' . rawurlencode($program['image'])) ?>"
                                alt="<?= esc($program['name']) ?>" loading="lazy">
                        <?php endif; ?>
                    </td>
                    <td class="table-icon">
                        <?php if ($cmsIconRow && $cmsIconRow['icon_type'] === 'image'): ?>
                            <img src="<?= base_url('assets/images/program-icons/' . rawurlencode($cmsIconRow['icon_value'])) ?>"
                                alt="<?= esc($cmsIconRow['name']) ?>"
                                style="width:34px;height:34px;object-fit:contain">
                        <?php elseif ($cmsIconRow): ?>
                            <?= esc($cmsIconRow['icon_value']) ?>
                        <?php else: ?>
                            <?= esc($iconMapRow[$program['icon'] ?? 'book-open'] ?? '🎓') ?>
                        <?php endif; ?>
                    </td>
                    <td><?= esc(mb_strimwidth((string) ($program['description'] ?? ''), 0, 90, '…')) ?></td>
                    <td><?= (int) $program['sort_order'] ?></td>
                    <td>
                        <?php if ((int) $program['is_active'] === 1): ?>
                            <span class="status" style="color:#16803d">Aktif</span>
                        <?php else: ?>
                            <span class="status" style="color:#a11">Nonaktif</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <div class="actions">
                            <button type="button" class="edit"
                                data-program="<?= esc($programJson, 'attr') ?>"
                                onclick="editProgram(this)">Edit</button>
                            <form action="<?= site_url('admin/programs/hapus/' . (int) $program['id']) ?>"
                                method="post" onsubmit="return confirm('Yakin ingin menghapus program ini?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="delete">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php endif; ?>
</section>

<script>
const imageInput = document.getElementById('image');
const imagePreview = document.getElementById('image-preview');
const currentImageInfo = document.getElementById('current-image-info');

let existingImage = '';
let temporaryPreviewUrl = null;

function showCurrentImage(filename) {
    existingImage = filename || '';

    if (temporaryPreviewUrl) {
        URL.revokeObjectURL(temporaryPreviewUrl);
        temporaryPreviewUrl = null;
    }

    if (existingImage) {
        imagePreview.src =
            <?= json_encode(base_url('assets/images/programs/')) ?> +
            encodeURIComponent(existingImage);

        imagePreview.style.display = 'block';
        currentImageInfo.textContent =
            'Foto tersimpan: ' + existingImage +
            '. Pilih file baru jika ingin menggantinya.';
    } else {
        imagePreview.removeAttribute('src');
        imagePreview.style.display = 'none';
        currentImageInfo.textContent = 'Belum ada foto tersimpan.';
    }

    imageInput.value = '';
}

imageInput.addEventListener('change', function () {
    const file = this.files[0];

    if (temporaryPreviewUrl) {
        URL.revokeObjectURL(temporaryPreviewUrl);
        temporaryPreviewUrl = null;
    }

    if (!file) {
        showCurrentImage(existingImage);
        return;
    }

    if (!['image/jpeg', 'image/png', 'image/webp'].includes(file.type)) {
        alert('Pilih file JPG, PNG, atau WebP.');
        this.value = '';
        showCurrentImage(existingImage);
        return;
    }

    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran foto maksimal 2 MB.');
        this.value = '';
        showCurrentImage(existingImage);
        return;
    }

    temporaryPreviewUrl = URL.createObjectURL(file);
    imagePreview.src = temporaryPreviewUrl;
    imagePreview.style.display = 'block';
    currentImageInfo.textContent = 'Pratinjau foto baru: ' + file.name;
});

function editProgram(button) {
    const p = JSON.parse(button.dataset.program);

    document.getElementById('program-id').value = p.id;
    document.getElementById('name').value = p.name;
    document.getElementById('description').value = p.description || '';
    document.getElementById('sort_order').value = p.sort_order;
    document.getElementById('is_active').value = p.is_active;
    document.getElementById('form-title').textContent = 'Edit Program';

    // Kosongkan pilihan ikon sebelumnya.
    document.querySelectorAll(
        'input[name="icon"], input[name="program_icon_id"]'
    ).forEach(function (input) {
        input.checked = false;
    });

    // Pilih ikon CMS jika program menggunakannya.
    if (p.program_icon_id) {
        const cmsIcon = document.querySelector(
            'input[name="program_icon_id"][value="' +
            p.program_icon_id + '"]'
        );

        if (cmsIcon) {
            cmsIcon.checked = true;
        }
    } else {
        // Jika tidak, pilih ikon bawaan.
        const builtinIcon = document.querySelector(
            'input[name="icon"][value="' + p.icon + '"]'
        );

        if (builtinIcon) {
            builtinIcon.checked = true;
        }
    }

    showCurrentImage(p.image || '');
    window.scrollTo({ top: 0, behavior: 'smooth' });
}
function resetForm() {
    document.getElementById('program-form').reset();
    document.getElementById('program-id').value = '';
    document.getElementById('name').value = '';
    document.getElementById('description').value = '';
    document.getElementById('sort_order').value = '0';
    document.getElementById('is_active').value = '1';
    document.getElementById('form-title').textContent = 'Tambah Program';

    const defaultIcon = document.querySelector(
        'input[name="icon"][value="book-open"]'
    );

    if (defaultIcon) {
        defaultIcon.checked = true;
    }

    showCurrentImage('');
}

showCurrentImage('');
</script>
</body>
</html>