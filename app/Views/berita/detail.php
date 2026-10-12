<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($post['title']) ?> | SMPIT Al Firdaus Purwodadi</title>
    <meta name="description" content="<?= esc($post['excerpt'] ?? $post['title']) ?>">
    <style>
        :root{--navy:#102e56;--blue:#1559a6;--sky:#eaf3ff;--ink:#183657;--muted:#6d7e93;--line:#e3ebf5;--page:#f4f8fd}
        *{box-sizing:border-box}
        html{scroll-behavior:smooth}
        body{margin:0;font-family:Inter,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",Arial,sans-serif;background:var(--page);color:var(--ink)}
        a{color:inherit}
        .site-header{background:#fff;border-bottom:1px solid var(--line);position:relative;z-index:2}
        .nav-wrap{max-width:1180px;margin:auto;padding:15px 24px;display:flex;align-items:center;justify-content:space-between;gap:24px}
        .brand{display:flex;align-items:center;gap:12px;text-decoration:none;font-weight:800;color:var(--navy);line-height:1.15}
        .brand-mark{width:44px;height:44px;border-radius:13px;display:grid;place-items:center;background:linear-gradient(145deg,#eaf4ff,#d3e6ff);color:var(--blue);font-size:23px}
        .brand small{display:block;font-size:11px;letter-spacing:.08em;color:var(--muted);font-weight:700;margin-top:4px}
        .nav-links{display:flex;align-items:center;gap:25px;font-size:14px;font-weight:650}
        .nav-links a{text-decoration:none;color:#294563}
        .nav-links a:hover,.nav-links .active{color:var(--blue)}
        .ppdb{background:var(--blue);color:#fff!important;padding:12px 17px;border-radius:10px;box-shadow:0 6px 16px #1559a626}
        .hero{background:radial-gradient(circle at 82% 10%,#2b5d8f 0,transparent 35%),linear-gradient(115deg,#10294c,#174a7d);color:white;overflow:hidden}
        .hero-inner{max-width:1180px;margin:auto;padding:28px 24px 38px;position:relative}
        .breadcrumbs{font-size:12px;color:#d8e7fa;margin-bottom:22px}
        .breadcrumbs a{text-decoration:none}
        .eyebrow{font-size:11px;letter-spacing:.16em;text-transform:uppercase;color:#a8d1ff;font-weight:800}
        .hero h1{font-size:clamp(28px,4vw,44px);line-height:1.1;margin:10px 0 12px;max-width:720px}
        .hero p{margin:0;color:#e0edfc;max-width:650px;line-height:1.7}
        .hero-decoration{position:absolute;right:45px;bottom:-18px;font-size:clamp(80px,14vw,160px);opacity:.09;line-height:1;pointer-events:none}
        .layout{max-width:1180px;margin:28px auto 70px;padding:0 24px;display:grid;grid-template-columns:minmax(0,1fr) 300px;gap:24px;align-items:start}
        .article-card,.side-card{background:#fff;border:1px solid var(--line);border-radius:18px;box-shadow:0 12px 35px #17395b0b}
        .article-card{padding:clamp(22px,4vw,38px);min-width:0}
        .category{display:inline-flex;align-items:center;background:#e8f2ff;color:#1559a6;border-radius:999px;padding:7px 12px;font-size:11px;font-weight:800;letter-spacing:.07em;text-transform:uppercase}
        .article-title{font-size:clamp(26px,3.4vw,38px);line-height:1.22;letter-spacing:-.025em;color:var(--navy);margin:16px 0}
        .meta-row{display:flex;flex-wrap:wrap;gap:12px 20px;align-items:center;color:var(--muted);font-size:12px;margin:0 0 22px}
        .meta-item{display:inline-flex;align-items:center;gap:7px}
        .meta-dot{width:6px;height:6px;border-radius:50%;background:#6ea4e4}
        .share-row{display:flex;align-items:center;gap:9px;margin:-3px 0 22px;color:var(--muted);font-size:12px}
        .share-btn{width:34px;height:34px;border:1px solid var(--line);border-radius:50%;display:grid;place-items:center;background:#fff;color:var(--blue);cursor:pointer;font-weight:800;font-size:13px}
        .share-btn:hover{background:var(--sky)}
        .cover{display:block;width:100%;max-height:460px;aspect-ratio:16/8.5;object-fit:cover;border-radius:14px;margin:0 0 25px;background:#e7eef7}
        .no-cover{min-height:210px;border-radius:14px;margin-bottom:25px;background:linear-gradient(135deg,#e6f1ff,#f7faff);display:grid;place-items:center;color:#7b9cc5;font-size:52px}
        .excerpt{margin:0 0 24px;padding:18px 20px;background:linear-gradient(110deg,#edf5ff,#f7faff);border:1px solid #dceaff;border-left:4px solid #3983d7;border-radius:0 12px 12px 0;font-size:16px;line-height:1.75;font-weight:650;color:#21476f}
        .article-body{font-size:16px;line-height:1.95;color:#354d68;overflow-wrap:anywhere}
        .article-body p{margin:0 0 20px}
        .article-body img{max-width:100%;height:auto;border-radius:12px}
        .article-footer{border-top:1px solid var(--line);margin-top:30px;padding-top:22px;display:flex;justify-content:space-between;align-items:center;gap:16px;flex-wrap:wrap}
        .back-link{display:inline-flex;align-items:center;gap:9px;background:var(--navy);color:#fff;padding:12px 16px;border-radius:10px;text-decoration:none;font-size:13px;font-weight:750}
        .back-link:hover{background:var(--blue)}
        .footer-note{font-size:12px;color:var(--muted)}
        .sidebar{display:grid;gap:18px}
        .side-card{padding:22px}
        .side-heading{font-size:16px;font-weight:800;color:var(--navy);margin:0 0 17px;display:flex;align-items:center;gap:9px}
        .side-icon{width:30px;height:30px;border-radius:9px;background:var(--sky);display:grid;place-items:center;color:var(--blue)}
        .side-copy{font-size:13px;line-height:1.8;color:var(--muted);margin:0}
        .category-list{display:grid;gap:4px}
        .category-link{display:flex;justify-content:space-between;align-items:center;text-decoration:none;font-size:13px;color:#49617e;padding:10px;border-radius:9px}
        .category-link:hover{background:#f0f6ff;color:var(--blue)}
        .category-link strong{font-size:11px;background:#edf3fa;border-radius:20px;padding:3px 8px}
        .subscribe-card{background:linear-gradient(145deg,#10315b,#1760a4);color:white;border-radius:18px;padding:24px;overflow:hidden;position:relative}
        .subscribe-card h3{margin:0 0 9px;font-size:18px}
        .subscribe-card p{font-size:13px;line-height:1.7;color:#dcecff;margin:0 0 18px}
        .subscribe-card a{display:inline-block;background:white;color:#174a7d;border-radius:9px;padding:11px 14px;text-decoration:none;font-size:12px;font-weight:800}
        .site-footer{background:#0e2544;color:#d7e5f5;padding:26px 24px;text-align:center;font-size:12px}
        @media(max-width:900px){.nav-links{gap:14px}.layout{grid-template-columns:minmax(0,1fr) 260px}}
        @media(max-width:720px){.nav-wrap{padding:12px 18px}.nav-links{display:none}.hero-inner{padding:24px 20px 30px}.hero-decoration{right:12px}.layout{display:block;padding:0 14px;margin-top:16px}.article-card{padding:22px 18px}.sidebar{margin-top:18px}.article-title{font-size:27px}.meta-row{gap:10px 14px}.cover{aspect-ratio:4/3}.article-body{font-size:15px}}
    
/* Header utama seragam di semua halaman publik */
.shared-site-header{position:sticky;top:0;z-index:1000;width:100%;background:rgba(255,255,255,.97);backdrop-filter:blur(16px);border-bottom:1px solid #e4ebf4;box-shadow:0 4px 20px rgba(16,43,78,.035)}
.shared-header-inner{width:min(1440px,90%);min-height:88px;margin:0 auto;display:grid;grid-template-columns:minmax(300px,1fr) auto minmax(170px,1fr);align-items:center;gap:28px}
.shared-brand{display:flex;align-items:center;gap:16px;min-width:0;text-decoration:none;color:#102b4e}
.shared-brand-mark{width:72px;height:72px;flex:0 0 72px;display:grid;place-items:center;border-radius:22px;color:#fff;background:linear-gradient(145deg,#2d639e,#102b4e);box-shadow:5px 7px 16px rgba(16,43,78,.2),inset 1px 1px 2px #ffffff70;font:800 34px/1 Inter,system-ui,sans-serif}
.shared-brand-copy{display:flex;flex-direction:column;gap:7px;white-space:nowrap}
.shared-brand-copy strong{font:800 23px/1.1 Poppins,Inter,system-ui,sans-serif;letter-spacing:-.45px;color:#102b4e}
.shared-brand-copy small{font:500 14px/1.3 Inter,system-ui,sans-serif;letter-spacing:1.7px;color:#71839d}
.shared-nav-links{display:flex;align-items:center;justify-content:center;gap:clamp(20px,2.2vw,38px);white-space:nowrap}
.shared-nav-links a{font:650 18px/1.2 Inter,system-ui,sans-serif;color:#253953;text-decoration:none;transition:color .2s}
.shared-nav-links a:hover{color:#2b6098}
.shared-ppdb-button{justify-self:end;display:inline-flex;align-items:center;justify-content:center;gap:9px;padding:21px 28px;border-radius:18px;background:linear-gradient(135deg,#2b6098,#102b4e);box-shadow:0 10px 24px rgba(16,43,78,.17);color:#fff!important;text-decoration:none;font:750 18px/1 Inter,system-ui,sans-serif;white-space:nowrap;transition:transform .2s,box-shadow .2s}
.shared-ppdb-button:hover{transform:translateY(-2px);box-shadow:0 14px 28px rgba(16,43,78,.23)}
.shared-menu-toggle{display:none;border:1px solid #dce6f2;background:#fff;color:#102b4e;border-radius:12px;padding:10px 12px;font-size:22px;cursor:pointer}
@media(max-width:1050px){.shared-header-inner{width:94%;grid-template-columns:minmax(0,1fr) auto auto;gap:16px}.shared-brand-mark{width:58px;height:58px;flex-basis:58px;border-radius:17px;font-size:28px}.shared-brand-copy strong{font-size:18px}.shared-brand-copy small{font-size:10px;letter-spacing:1px}.shared-nav-links{gap:16px}.shared-nav-links a{font-size:14px}.shared-ppdb-button{padding:16px 18px;font-size:14px;border-radius:13px}}
@media(max-width:760px){.shared-header-inner{min-height:76px;grid-template-columns:minmax(0,1fr) auto auto;gap:10px}.shared-brand{gap:10px}.shared-brand-mark{width:48px;height:48px;flex-basis:48px;border-radius:14px;font-size:24px}.shared-brand-copy{gap:4px}.shared-brand-copy strong{font-size:14px}.shared-brand-copy small{font-size:8px;letter-spacing:.5px;white-space:normal}.shared-menu-toggle{display:block}.shared-nav-links{display:none;position:absolute;top:100%;left:0;right:0;padding:18px 5% 22px;background:#fff;border-bottom:1px solid #e4ebf4;box-shadow:0 12px 18px rgba(16,43,78,.08);flex-direction:column;align-items:stretch;gap:0}.shared-nav-links.is-open{display:flex}.shared-nav-links a{padding:13px 4px;font-size:15px}.shared-ppdb-button{padding:13px 12px;border-radius:12px;font-size:12px;gap:5px}}
@media(max-width:420px){.shared-header-inner{width:96%;gap:7px}.shared-brand-copy strong{font-size:12px}.shared-brand-copy small{max-width:125px;font-size:7px}.shared-brand-mark{width:42px;height:42px;flex-basis:42px}.shared-ppdb-button{font-size:11px;padding:12px 9px}}

</style>
</head>
<body>
<header class="shared-site-header">
  <div class="shared-header-inner">
    <a href="<?= site_url('/') ?>" class="shared-brand" aria-label="SMPIT Al Firdaus Purwodadi">
      <span class="shared-brand-mark">AF</span>
      <span class="shared-brand-copy"><strong>SMPIT AL FIRDAUS</strong><small>PURWODADI · SEKOLAH ISLAM TERPADU</small></span>
    </a>
    <button class="shared-menu-toggle" type="button" aria-label="Buka menu" aria-expanded="false" onclick="const nav=this.nextElementSibling;nav.classList.toggle('is-open');this.setAttribute('aria-expanded',nav.classList.contains('is-open'))">☰</button>
    <nav class="shared-nav-links" aria-label="Navigasi utama">
      <a href="<?= site_url('/') ?>#profil">Profil</a>
      <a href="<?= site_url('/') ?>#program">Program</a>
      <a href="<?= site_url('/') ?>#keunggulan">Keunggulan</a>
      <a href="<?= site_url('/') ?>#kontak">Kontak</a>
    </nav>
    <a class="shared-ppdb-button" href="https://smpit.alfirdauspurwodadi.sch.id/" target="_blank" rel="noopener noreferrer">Daftar PPS <span aria-hidden="true">↗</span></a>
  </div>
</header>

<section class="hero">
    <div class="hero-inner">
        <div class="breadcrumbs"><a href="<?= site_url('/') ?>">Beranda</a> &nbsp;›&nbsp; <a href="<?= site_url('berita') ?>">Berita</a> &nbsp;›&nbsp; Artikel</div>
        <div class="eyebrow">Informasi Sekolah</div>
        <h1>Artikel Berita</h1>
        <p>Informasi, kegiatan, dan kabar terbaru dari SMPIT Al Firdaus Purwodadi.</p>
        <div class="hero-decoration" aria-hidden="true">✦</div>
    </div>
</section>

<main class="layout">
    <article class="article-card">
        <span class="category"><?= esc($post['category'] ?: 'Berita') ?></span>
        <h2 class="article-title"><?= esc($post['title']) ?></h2>
        <div class="meta-row">
            <span class="meta-item"><span class="meta-dot"></span><?= esc($post['published_at'] ?: $post['created_at']) ?></span>
            <?php if (!empty($post['author'])): ?><span class="meta-item">✍ <?= esc($post['author']) ?></span><?php endif; ?>
            <span class="meta-item">✦ SMPIT Al Firdaus</span>
        </div>

        <div class="share-row">
            <span>Bagikan:</span>
            <button class="share-btn" type="button" aria-label="Bagikan ke WhatsApp" onclick="shareWhatsApp()">WA</button>
            <button class="share-btn" type="button" aria-label="Salin tautan artikel" onclick="copyArticleLink()">↗</button>
        </div>

        <?php if (!empty($post['image'])): ?>
            <img class="cover" src="<?= base_url('assets/images/posts/' . rawurlencode($post['image'])) ?>" alt="<?= esc($post['title']) ?>">
        <?php else: ?>
            <div class="no-cover" aria-label="Gambar berita belum tersedia">✦</div>
        <?php endif; ?>

        <?php if (!empty($post['excerpt'])): ?>
            <blockquote class="excerpt"><?= esc($post['excerpt']) ?></blockquote>
        <?php endif; ?>

        <div class="article-body"><?= nl2br(esc($post['content'])) ?></div>

        <div class="article-footer">
            <a class="back-link" href="<?= site_url('berita') ?>">← Kembali ke semua berita</a>
            <span class="footer-note">SMPIT Al Firdaus Purwodadi · Ilmu, Akhlak, Prestasi</span>
        </div>
    </article>

    <aside class="sidebar">
        <section class="side-card">
            <h3 class="side-heading"><span class="side-icon">▤</span> Kategori Berita</h3>
            <div class="category-list">
                <a class="category-link" href="<?= site_url('berita') ?>">Semua berita <strong>›</strong></a>
                <a class="category-link" href="<?= site_url('berita') ?>">Berita sekolah <strong>›</strong></a>
                <a class="category-link" href="<?= site_url('berita') ?>">Kegiatan <strong>›</strong></a>
                <a class="category-link" href="<?= site_url('berita') ?>">Pengumuman <strong>›</strong></a>
                <a class="category-link" href="<?= site_url('berita') ?>">Prestasi siswa <strong>›</strong></a>
            </div>
        </section>
        <section class="side-card">
            <h3 class="side-heading"><span class="side-icon">i</span> Tentang Berita Ini</h3>
            <p class="side-copy">Ikuti informasi kegiatan, program pendidikan, pengumuman, dan prestasi siswa SMPIT Al Firdaus Purwodadi melalui halaman berita sekolah.</p>
        </section>
        <section class="subscribe-card">
            <h3>Jangan lewatkan kabar terbaru</h3>
            <p>Kunjungi halaman berita untuk membaca informasi dan kegiatan terbaru dari sekolah.</p>
            <a href="<?= site_url('berita') ?>">Lihat berita lainnya →</a>
        </section>
    </aside>
</main>

<footer class="site-footer">© <?= date('Y') ?> SMPIT Al Firdaus Purwodadi. Ilmu, Akhlak, Prestasi.</footer>
<script>
function shareWhatsApp() {
    const url = window.location.href;
    const title = document.querySelector('.article-title')?.textContent || document.title;
    window.open('https://wa.me/?text=' + encodeURIComponent(title + ' ' + url), '_blank', 'noopener,noreferrer');
}
async function copyArticleLink() {
    try {
        await navigator.clipboard.writeText(window.location.href);
        alert('Tautan artikel berhasil disalin.');
    } catch (error) {
        window.prompt('Salin tautan artikel ini:', window.location.href);
    }
}
</script>
</body>
</html>
