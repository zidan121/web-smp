<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Galeri Kegiatan | SMPIT Al Firdaus Purwodadi</title>
<style>
:root{--navy:#102b50;--blue:#075bc8;--ink:#17365e;--muted:#647894;--pale:#f4f7fc;--gold:#ffd76b;--line:#e5ebf4}
*{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--pale);font-family:Inter,ui-sans-serif,system-ui,-apple-system,"Segoe UI",sans-serif;color:var(--ink)}a{color:inherit;text-decoration:none}
.wrap{width:min(1240px,calc(100% - 48px));margin:auto}
.hero{position:relative;isolation:isolate;overflow:hidden;color:#fff;background:radial-gradient(ellipse at 78% 5%,rgba(26,111,202,.65),transparent 38%),linear-gradient(120deg,#0c2447,#164c83 68%,#2466a1);padding:26px 0 42px}
.hero:before{content:"";position:absolute;z-index:-1;inset:0;background:radial-gradient(circle at 15% 20%,rgba(255,255,255,.06) 0 2px,transparent 3px);background-size:25px 25px;mask-image:linear-gradient(90deg,#000,transparent 70%)}
.breadcrumb{display:flex;gap:10px;align-items:center;font-size:13px;color:#d8e8fb;margin-bottom:28px}.breadcrumb a:hover{color:#fff}
.hero-layout{display:grid;grid-template-columns:1.02fr .98fr;gap:35px;align-items:center}
.eyebrow{font-size:11px;font-weight:800;letter-spacing:2.3px;text-transform:uppercase;color:#c5ddfa}
h1{font-size:clamp(38px,5vw,64px);letter-spacing:-1.8px;line-height:1.04;margin:13px 0 16px;color:#fff}h1 span{color:var(--gold)}
.hero-copy>p{font-size:16px;line-height:1.75;color:#e1edfc;max-width:570px;margin:0}
.stats{display:flex;gap:12px;flex-wrap:wrap;margin-top:28px}.stat{display:flex;align-items:center;gap:11px;padding:11px 14px;border-radius:14px;background:rgba(4,26,58,.26);border:1px solid rgba(255,255,255,.1)}.stat-icon{width:36px;height:36px;border-radius:10px;display:grid;place-items:center;background:var(--gold);color:#16365f;font-size:18px}.stat strong{display:block;font-size:15px}.stat small{display:block;color:#d5e5f8;font-size:11px;margin-top:2px}
.hero-art{position:relative;min-height:265px;display:flex;align-items:center;justify-content:center}.hero-frame{width:78%;height:260px;transform:rotate(-3deg);border:7px solid #fff;border-radius:24px;overflow:hidden;box-shadow:0 22px 50px #061b3b55;background:#214d78}.hero-frame img{width:100%;height:100%;object-fit:cover}.float-frame{position:absolute;right:0;bottom:0;width:37%;height:135px;border:6px solid white;border-radius:20px;overflow:hidden;transform:rotate(6deg);box-shadow:0 15px 32px #061b3b55;background:#dce8f5}.float-frame img{width:100%;height:100%;object-fit:cover}.decor{position:absolute;font-size:48px;color:var(--gold);font-weight:900;left:1%;top:8%;transform:rotate(-20deg)}
main{padding:24px 0 65px}.controls{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:24px;flex-wrap:wrap}.filters{display:flex;align-items:center;gap:10px;flex-wrap:wrap;flex:1}.filter{display:inline-flex;align-items:center;justify-content:center;gap:5px;white-space:nowrap;border:1px solid transparent;border-radius:30px;padding:12px 17px;background:#fff;color:#415673;font-size:13px;font-weight:700;cursor:pointer;transition:background .2s,color .2s,box-shadow .2s;text-decoration:none;box-shadow:0 4px 14px #19375b08}.filter:hover{background:#edf4ff;color:#0c4b9b}.filter.active{background:#0c4b9b;color:#fff;box-shadow:0 8px 18px #0b4b9b25}.search{display:flex;align-items:center;gap:8px;flex:0 1 360px;min-width:260px;padding:0;background:transparent;border:0;border-radius:0;box-shadow:none}.search input{width:100%;min-width:0;border:1px solid #e7edf5;border-radius:13px;padding:13px 16px;background:#fff;font:inherit;font-size:13px;outline:none}.search input:focus{border-color:#79a7e2;box-shadow:0 0 0 3px #0b4b9b12}.search button{min-height:44px;border:0;border-radius:12px;padding:0 20px;background:#0c4b9b;color:#fff;font-weight:750;cursor:pointer}.search button:hover{background:#083d80}.section-heading{display:flex;justify-content:space-between;align-items:end;gap:12px;margin:0 0 17px}.section-heading h2{font-size:23px;letter-spacing:-.5px;margin:0;color:var(--navy)}.section-heading p{font-size:12px;color:var(--muted);margin:5px 0 0}
.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}.card{min-width:0;background:#fff;border:1px solid #e7edf5;border-radius:17px;overflow:hidden;box-shadow:0 9px 25px #193a610a;transition:transform .22s,box-shadow .22s}.card:hover{transform:translateY(-5px);box-shadow:0 18px 38px #193a6117}.photo{height:225px;position:relative;overflow:hidden;background:linear-gradient(135deg,#e2eaf5,#f7f9fc)}.photo img{width:100%;height:100%;display:block;object-fit:cover;transition:transform .4s}.card:hover .photo img{transform:scale(1.045)}.photo:after{content:"";position:absolute;inset:50% 0 0;background:linear-gradient(transparent,rgba(8,24,48,.2));pointer-events:none}.badge{position:absolute;z-index:1;top:13px;left:13px;background:#fff;color:#234b7c;border-radius:30px;padding:7px 11px;font-size:11px;font-weight:800;box-shadow:0 4px 12px #102b5015}.photo-placeholder{height:100%;display:grid;place-items:center;color:#8ea5c0;font-size:40px}.body{padding:17px 19px 18px}.card h3{font-size:16px;line-height:1.45;margin:0 0 7px;color:var(--navy)}.card p{font-size:13px;line-height:1.65;color:var(--muted);margin:0 0 15px}.card-foot{display:flex;align-items:center;justify-content:space-between;color:var(--blue);font-size:12px;font-weight:800}.arrow{display:grid;place-items:center;width:30px;height:30px;border-radius:50%;background:#e8f0fb;font-size:18px}.empty{grid-column:1/-1;background:#fff;border:1px dashed #ccd8e8;border-radius:18px;text-align:center;padding:55px 20px;color:var(--muted)}.empty strong{display:block;color:var(--navy);font-size:18px;margin-bottom:8px}.footer{padding:24px 0;text-align:center;color:#7b8da5;border-top:1px solid var(--line);font-size:12px}
@media(max-width:960px){.hero-layout{grid-template-columns:1fr .8fr;gap:15px}.hero-art{min-height:230px}.hero-frame{height:220px}.float-frame{height:110px}.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.controls{align-items:stretch}.search{max-width:100%}}
@media(max-width:650px){.wrap{width:calc(100% - 30px)}.hero{padding:22px 0 32px}.breadcrumb{margin-bottom:22px}.hero-layout{grid-template-columns:1fr}.hero-art{min-height:205px;margin-top:6px}.hero-frame{width:75%;height:200px}.float-frame{height:105px}.stats{gap:8px}.stat{flex:1;min-width:135px;padding:9px}.controls{margin-bottom:22px}.filters{gap:7px}.filter{padding:10px 12px}.search{width:100%}.grid{grid-template-columns:1fr;gap:16px}.photo{height:230px}.section-heading h2{font-size:20px}}

/* Header publik disamakan ukurannya dengan header beranda */
.shared-site-header{position:sticky;top:0;z-index:1000;width:100%;background:rgba(255,255,255,.94);backdrop-filter:blur(16px);border-bottom:1px solid #e6edf5;box-shadow:none}
.shared-header-inner{width:min(1160px,90%);min-height:78px;margin:0 auto;display:flex;align-items:center;justify-content:space-between;gap:24px}
.shared-brand{display:flex;align-items:center;gap:12px;min-width:0;text-decoration:none;color:#102b4e}
.shared-brand-mark{width:48px;height:48px;flex:0 0 48px;display:grid;place-items:center;border-radius:15px;color:#fff;background:linear-gradient(145deg,#2d639e,#102b4e);box-shadow:5px 6px 12px #102b4e30,inset 1px 1px 2px #ffffff70;font:800 23px/1 Inter,system-ui,sans-serif}
.shared-brand-copy{display:flex;flex-direction:column;gap:3px;white-space:nowrap}
.shared-brand-copy strong{font:700 16px/1.2 Poppins,Inter,system-ui,sans-serif;letter-spacing:0;color:#102b4e}
.shared-brand-copy small{font:500 10px/1.3 Inter,system-ui,sans-serif;letter-spacing:1.1px;color:#667a92}
.shared-nav-links{display:flex;align-items:center;justify-content:center;gap:25px;white-space:nowrap}
.shared-nav-links a{font:600 13px/1.2 Inter,system-ui,sans-serif;color:#253953;text-decoration:none;transition:color .2s}
.shared-nav-links a:hover{color:#2d639e}
.shared-ppdb-button{justify-self:auto;display:inline-flex;align-items:center;justify-content:center;gap:8px;padding:13px 19px;border-radius:12px;background:linear-gradient(135deg,#2b6098,#102b4e);box-shadow:0 7px 15px #102b4e25;color:#fff!important;text-decoration:none;font:700 13px/1 Inter,system-ui,sans-serif;white-space:nowrap;transition:transform .2s,box-shadow .2s}
.shared-ppdb-button:hover{transform:translateY(-2px);box-shadow:0 12px 25px #102b4e35}
.shared-menu-toggle{display:none;border:1px solid #dce6f2;background:#fff;color:#102b4e;border-radius:10px;padding:8px 10px;font-size:19px;cursor:pointer}
@media(max-width:900px){.shared-header-inner{width:92%;gap:14px}.shared-nav-links{gap:13px}.shared-nav-links a{font-size:12px}.shared-brand-copy strong{font-size:14px}.shared-brand-copy small{font-size:9px;letter-spacing:.7px}.shared-ppdb-button{padding:12px 14px;font-size:12px}}
@media(max-width:650px){.shared-header-inner{width:92%;min-height:70px;gap:10px}.shared-brand{gap:9px}.shared-brand-mark{width:42px;height:42px;flex-basis:42px;border-radius:13px;font-size:21px}.shared-brand-copy strong{font-size:13px}.shared-brand-copy small{font-size:8px;letter-spacing:.3px;white-space:normal}.shared-menu-toggle{display:block}.shared-nav-links{display:none;position:absolute;top:100%;left:0;right:0;padding:12px 5% 18px;background:#fff;border-bottom:1px solid #e6edf5;box-shadow:0 12px 18px rgba(16,43,78,.08);flex-direction:column;align-items:stretch;gap:0}.shared-nav-links.is-open{display:flex}.shared-nav-links a{padding:12px 4px;font-size:14px}.shared-ppdb-button{padding:11px 12px;border-radius:10px;font-size:11px;gap:5px}}
@media(max-width:380px){.shared-header-inner{width:96%;gap:6px}.shared-brand-copy strong{font-size:11px}.shared-brand-copy small{max-width:115px;font-size:7px}.shared-brand-mark{width:38px;height:38px;flex-basis:38px}.shared-ppdb-button{font-size:10px;padding:10px 8px}}
/* Shared responsive footer */
.site-footer{background:#0b1d35!important;color:#d8e5f5!important;padding:58px 24px 0!important;margin-top:52px;border:0!important;text-align:left!important;font-size:15px!important;line-height:1.8}.site-footer *{box-sizing:border-box}.site-footer-inner{max-width:1320px;margin:0 auto}.site-footer-grid{display:grid;grid-template-columns:1.25fr .75fr 1fr;gap:clamp(28px,5vw,86px);padding:0 0 42px}.site-footer h2{margin:0 0 20px;color:#fff;font-size:21px;line-height:1.35;font-weight:800;letter-spacing:-.02em}.site-footer p{margin:0 0 12px;color:#b9cce3;font-size:15px;line-height:1.9}.site-footer-nav{display:flex;flex-direction:column;align-items:flex-start;gap:8px}.site-footer-nav h2{margin-bottom:10px}.site-footer a{color:#c5d8ef;text-decoration:none;transition:color .2s ease,transform .2s ease}.site-footer a:hover{color:#fff}.site-footer-nav a:hover{transform:translateX(3px)}.site-footer-cta{display:inline-flex;align-items:center;gap:10px;margin-top:8px;padding:9px 15px;border:1px solid #456487;border-radius:10px;color:#fff!important;font-weight:700;font-size:13px}.site-footer-cta:hover{background:#17395e}.site-footer-bottom{display:flex;justify-content:space-between;align-items:center;gap:18px;min-height:68px;border-top:1px solid rgba(203,221,243,.18);color:#8eafd4;font-size:13px}@media(max-width:760px){.site-footer{padding:38px 20px 0!important;margin-top:36px}.site-footer-grid{grid-template-columns:1fr;gap:28px;padding-bottom:28px}.site-footer h2{font-size:19px;margin-bottom:12px}.site-footer-bottom{align-items:flex-start;flex-direction:column;justify-content:center;gap:3px;padding:15px 0;line-height:1.7}}

/* Alignment correction: all footer columns start on the same baseline */
.site-footer-grid{align-items:start!important;justify-items:stretch!important}
.site-footer-grid>.site-footer-about,.site-footer-grid>.site-footer-nav,.site-footer-grid>.site-footer-contact{align-self:start!important;justify-self:stretch!important;margin:0!important;padding:0!important;position:static!important;transform:none!important;min-width:0}
.site-footer-about h2,.site-footer-nav h2,.site-footer-contact h2{margin-top:0!important}
.site-footer-nav{display:flex!important;flex-direction:column!important;align-items:flex-start!important;justify-content:flex-start!important;gap:8px!important}
.site-footer-nav a{display:block;line-height:1.8}


/* Filter toolbar disamakan dengan halaman Berita */ 
.toolbar{display:flex;align-items:center;justify-content:space-between;gap:16px;margin-bottom:24px}
.filters{display:flex;gap:10px;flex-wrap:wrap}
.filter{border:1px solid transparent;background:#fff;border-radius:30px;padding:12px 17px;font-weight:700;color:#415673;font-size:13px;cursor:pointer;box-shadow:0 4px 14px #19375b08;transition:.2s;text-decoration:none;white-space:nowrap}
.filter:hover,.filter.active{background:var(--blue);color:#fff;box-shadow:0 8px 18px #0b4b9b25}
.search{display:flex;gap:8px;min-width:300px;flex:0 1 360px}
.search input{width:100%;min-width:0;border:1px solid #e7edf5;border-radius:13px;padding:13px 16px;background:#fff;font:inherit;font-size:13px;outline:none}
.search input:focus{border-color:#79a7e2;box-shadow:0 0 0 3px #0b4b9b12}
.search button{min-height:44px;border:0;border-radius:12px;padding:0 20px;background:var(--blue);color:#fff;font-weight:750;cursor:pointer}
@media(max-width:960px){.toolbar{align-items:stretch;flex-direction:column}.search{max-width:100%;min-width:0;width:100%}}
@media(max-width:650px){.filters{gap:7px}.filter{padding:10px 12px;font-size:12px}}

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
<section class="hero"><div class="wrap">
<nav class="breadcrumb"><a href="<?= site_url('/') ?>">⌂ &nbsp;Beranda</a><span>›</span><span>Galeri</span></nav>
<div class="hero-layout">
<div class="hero-copy">
<div class="eyebrow">Dokumentasi Sekolah</div>
<h1>Galeri <span>Kegiatan</span></h1>
<p>Momen pembelajaran, kegiatan siswa, prestasi, dan kebersamaan keluarga besar SMPIT Al Firdaus Purwodadi.</p>
<div class="stats">
<div class="stat"><span class="stat-icon">▧</span><div><strong><?= count($galleries ?? []) ?>+</strong><small>Dokumentasi</small></div></div>
<div class="stat"><span class="stat-icon">♧</span><div><strong>Siswa</strong><small>Aktif Berkegiatan</small></div></div>
<div class="stat"><span class="stat-icon">🏆</span><div><strong>Prestasi</strong><small>Terus Berkembang</small></div></div>
</div>
</div>
<div class="hero-art" aria-label="Cuplikan kegiatan sekolah">
<span class="decor">〝</span>
<div class="hero-frame"><img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?auto=format&fit=crop&w=1200&q=85" alt="Suasana lingkungan sekolah" loading="lazy"></div>
<div class="float-frame"><img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=700&q=80" alt="Kegiatan pembelajaran siswa" loading="lazy"></div>
</div>
</div></div></section>
<main><div class="wrap">
<div class="toolbar">
    <div class="filters" role="group" aria-label="Navigasi kategori galeri">
      <button class="filter active" type="button" data-category="all" aria-pressed="true">▦ &nbsp; Semua</button>
      <button class="filter" type="button" data-category="berita" aria-pressed="false">▤ &nbsp; Berita</button>
      <button class="filter" type="button" data-category="kegiatan" aria-pressed="false">▦ &nbsp; Kegiatan</button>
      <button class="filter" type="button" data-category="pengumuman" aria-pressed="false">⚑ &nbsp; Pengumuman</button>
      <button class="filter" type="button" data-category="prestasi" aria-pressed="false">🏆 &nbsp; Prestasi</button>
      <a class="filter" href="<?= site_url('galeri') ?>">▧ &nbsp; Galeri Kegiatan</a>
    </div>
    <form class="search" id="gallery-search" role="search">
      <input id="gallery-query" type="search" placeholder="⌕  Cari kegiatan..." aria-label="Cari kegiatan">
      <button type="submit">Cari</button>
    </form>
  </div>
<div class="section-heading"><div><h2>Momen dari Sekolah</h2><p>Kenangan dan cerita dari kegiatan siswa</p></div><span id="result-count" class="count"><?= count($galleries ?? []) ?> dokumentasi</span></div>
<div class="grid" id="gallery-grid">
<?php if (!empty($galleries)): ?>
<?php foreach ($galleries as $gallery): ?>
<?php
$imageValue = trim((string) ($gallery['image'] ?? ''));
$isRemoteImage = preg_match('#^https://images\\.unsplash\\.com/[a-zA-Z0-9?&=._%-]+$#', $imageValue) === 1;
$localImage = basename($imageValue);
$localImagePath = FCPATH . 'assets/images/galleries/' . $localImage;
$category = (string) ($gallery['category'] ?? 'Kegiatan Sekolah');
$searchText = strtolower(($gallery['title'] ?? '') . ' ' . ($gallery['description'] ?? '') . ' ' . $category);
?>
<article class="card gallery-card" data-category="<?= esc(strtolower($category), 'attr') ?>" data-search="<?= esc($searchText, 'attr') ?>">
<div class="photo">
<?php if ($isRemoteImage): ?>
<img src="<?= esc($imageValue, 'attr') ?>" alt="<?= esc($gallery['title']) ?>" loading="lazy" referrerpolicy="no-referrer">
<?php elseif ($localImage !== '' && is_file($localImagePath)): ?>
<img src="<?= base_url('assets/images/galleries/' . rawurlencode($localImage)) ?>" alt="<?= esc($gallery['title']) ?>" loading="lazy">
<?php else: ?><div class="photo-placeholder" aria-label="Foto belum tersedia">▧</div><?php endif; ?>
<span class="badge"><?= esc($category) ?></span>
</div>
<div class="body"><h3><?= esc($gallery['title']) ?></h3>
<p><?= esc($gallery['description'] ?: 'Dokumentasi kegiatan siswa SMPIT Al Firdaus Purwodadi.') ?></p>
<div class="card-foot"><span>Lihat Dokumentasi</span><span class="arrow">›</span></div>
</div></article>
<?php endforeach; ?>
<?php else: ?><div class="empty"><strong>Galeri segera hadir</strong>Dokumentasi kegiatan sekolah akan ditampilkan di sini setelah ditambahkan melalui panel admin.</div><?php endif; ?>
<div class="empty" id="no-results" hidden><strong>Belum ada kegiatan yang cocok</strong>Coba kata kunci atau kategori yang berbeda.</div>
</div>
</div></main>
<footer class="site-footer" id="kontak">
  <div class="site-footer-inner">
    <div class="site-footer-grid">
      <section class="site-footer-about"><h2>SMPIT Al Firdaus Purwodadi</h2><p>Pendidikan Islam terpadu untuk generasi yang bertakwa, berprestasi, dan berwawasan global.</p></section>
      <nav class="site-footer-nav" aria-label="Navigasi footer"><h2>Navigasi</h2>
        <a href="<?= site_url('profil') ?>">Profil sekolah</a><a href="<?= site_url('program') ?>">Program unggulan</a><a href="<?= site_url('berita') ?>">Berita &amp; pengumuman</a><a href="<?= site_url('galeri') ?>">Galeri kegiatan</a><a href="<?= site_url('prestasi') ?>">Prestasi siswa</a><a href="<?= site_url('pps') ?>">PPS 2027/2028</a>
      </nav>
      <section class="site-footer-contact"><h2>Kontak Sekolah</h2><p>Jl. Soponyono V, Jetis Barat, Purwodadi, Grobogan, Jawa Tengah.</p><p>Informasi pendaftaran dan kontak resmi sekolah dapat diperoleh melalui halaman PPS.</p><a class="site-footer-cta" href="<?= site_url('pps') ?>">Informasi PPS <span aria-hidden="true">↗</span></a></section>
    </div>
    <div class="site-footer-bottom"><span>© <?= date('Y') ?> SMPIT Al Firdaus Purwodadi. Hak cipta dilindungi.</span><span>Ilmu · Akhlak · Prestasi</span></div>
  </div>
</footer>
<script>
(function(){
 const cards=[...document.querySelectorAll('.gallery-card')];
 const filters=[...document.querySelectorAll('button.filter[data-category]')];
 const query=document.getElementById('gallery-query');
 const form=document.getElementById('gallery-search');
 const count=document.getElementById('result-count');
 const noResults=document.getElementById('no-results');
 let active='all';

 function categoryMatches(card, selected){
  const category=(card.dataset.category||'').trim().toLocaleLowerCase('id');
  const text=(card.dataset.search||'').toLocaleLowerCase('id');
  if(selected==='all') return true;
  if(selected==='berita') return category.includes('berita') || /berita|artikel|kabar/.test(text);
  if(selected==='kegiatan') return !/prestasi|pengumuman/.test(category) && !/pengumuman resmi|jadwal pendaftaran/.test(text);
  if(selected==='pengumuman') return category.includes('pengumuman') || /pengumuman|jadwal pendaftaran|informasi resmi/.test(text);
  if(selected==='prestasi') return category.includes('prestasi') || text.includes('prestasi');
  return true;
 }

 function render(){
  const term=query.value.trim().toLocaleLowerCase('id');
  let visible=0;
  cards.forEach(card=>{
   const text=(card.dataset.search||'').toLocaleLowerCase('id');
   const show=categoryMatches(card,active)&&(!term||text.includes(term));
   card.hidden=!show;
   if(show) visible++;
  });
  count.textContent=visible+' dokumentasi';
  noResults.hidden=visible!==0;
 }

 filters.forEach(button=>button.addEventListener('click',()=>{
  active=button.dataset.category||'all';
  filters.forEach(item=>{
   const selected=item===button;
   item.classList.toggle('active',selected);
   item.setAttribute('aria-pressed',selected?'true':'false');
  });
  document.querySelector('.gallery-current')?.classList.remove('active');
  render();
 }));
 form.addEventListener('submit',event=>{event.preventDefault();render()});
 query.addEventListener('input',render);
 render();
})();
</script>
</body></html>