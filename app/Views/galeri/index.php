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
main{padding:24px 0 65px}.controls{display:flex;align-items:center;justify-content:space-between;gap:18px;margin-bottom:24px;flex-wrap:wrap}.filters{display:flex;gap:9px;flex-wrap:wrap}.filter{border:0;border-radius:30px;padding:11px 16px;background:#e9eff7;color:#294b76;font-size:12px;font-weight:700;cursor:pointer;transition:.2s}.filter:hover{background:#dbe7f7}.filter.active{background:var(--blue);color:#fff;box-shadow:0 5px 14px #075bc833}.search{display:flex;gap:8px;min-width:min(340px,100%);padding:5px;background:#fff;border:1px solid var(--line);border-radius:30px;box-shadow:0 4px 16px #17365e08}.search input{border:0;outline:0;min-width:0;flex:1;padding:8px 13px;background:transparent;color:var(--ink);font-size:13px}.search button{border:0;border-radius:24px;background:var(--navy);color:#fff;padding:0 22px;font-weight:700;cursor:pointer}.section-heading{display:flex;justify-content:space-between;align-items:end;gap:12px;margin:0 0 17px}.section-heading h2{font-size:23px;letter-spacing:-.5px;margin:0;color:var(--navy)}.section-heading p{font-size:12px;color:var(--muted);margin:5px 0 0}
.grid{display:grid;grid-template-columns:repeat(3,minmax(0,1fr));gap:22px}.card{min-width:0;background:#fff;border:1px solid #e7edf5;border-radius:17px;overflow:hidden;box-shadow:0 9px 25px #193a610a;transition:transform .22s,box-shadow .22s}.card:hover{transform:translateY(-5px);box-shadow:0 18px 38px #193a6117}.photo{height:225px;position:relative;overflow:hidden;background:linear-gradient(135deg,#e2eaf5,#f7f9fc)}.photo img{width:100%;height:100%;display:block;object-fit:cover;transition:transform .4s}.card:hover .photo img{transform:scale(1.045)}.photo:after{content:"";position:absolute;inset:50% 0 0;background:linear-gradient(transparent,rgba(8,24,48,.2));pointer-events:none}.badge{position:absolute;z-index:1;top:13px;left:13px;background:#fff;color:#234b7c;border-radius:30px;padding:7px 11px;font-size:11px;font-weight:800;box-shadow:0 4px 12px #102b5015}.photo-placeholder{height:100%;display:grid;place-items:center;color:#8ea5c0;font-size:40px}.body{padding:17px 19px 18px}.card h3{font-size:16px;line-height:1.45;margin:0 0 7px;color:var(--navy)}.card p{font-size:13px;line-height:1.65;color:var(--muted);margin:0 0 15px}.card-foot{display:flex;align-items:center;justify-content:space-between;color:var(--blue);font-size:12px;font-weight:800}.arrow{display:grid;place-items:center;width:30px;height:30px;border-radius:50%;background:#e8f0fb;font-size:18px}.empty{grid-column:1/-1;background:#fff;border:1px dashed #ccd8e8;border-radius:18px;text-align:center;padding:55px 20px;color:var(--muted)}.empty strong{display:block;color:var(--navy);font-size:18px;margin-bottom:8px}.footer{padding:24px 0;text-align:center;color:#7b8da5;border-top:1px solid var(--line);font-size:12px}
@media(max-width:960px){.hero-layout{grid-template-columns:1fr .8fr;gap:15px}.hero-art{min-height:230px}.hero-frame{height:220px}.float-frame{height:110px}.grid{grid-template-columns:repeat(2,minmax(0,1fr))}.controls{align-items:stretch}.search{max-width:100%}}
@media(max-width:650px){.wrap{width:calc(100% - 30px)}.hero{padding:22px 0 32px}.breadcrumb{margin-bottom:22px}.hero-layout{grid-template-columns:1fr}.hero-art{min-height:205px;margin-top:6px}.hero-frame{width:75%;height:200px}.float-frame{height:105px}.stats{gap:8px}.stat{flex:1;min-width:135px;padding:9px}.controls{margin-bottom:22px}.filters{gap:7px}.filter{padding:10px 12px}.search{width:100%}.grid{grid-template-columns:1fr;gap:16px}.photo{height:230px}.section-heading h2{font-size:20px}}
</style>
</head>
<body>
<header class="hero"><div class="wrap">
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
</div></div></header>
<main><div class="wrap">
<div class="controls">
<div class="filters" aria-label="Filter kategori">
<button class="filter active" type="button" data-category="all">▣ &nbsp;Semua</button>
<button class="filter" type="button" data-category="pembelajaran">▤ &nbsp;Pembelajaran</button>
<button class="filter" type="button" data-category="kegiatan siswa">♧ &nbsp;Kegiatan Siswa</button>
<button class="filter" type="button" data-category="ict">▣ &nbsp;ICT &amp; Sains</button>
<button class="filter" type="button" data-category="keagamaan">⌂ &nbsp;Keagamaan</button>
<button class="filter" type="button" data-category="prestasi">🏆 &nbsp;Prestasi</button>
<button class="filter" type="button" data-category="ekstrakurikuler">⚽ &nbsp;Ekstrakurikuler</button>
</div>
<form class="search" id="gallery-search" role="search"><input id="gallery-query" type="search" placeholder="Cari kegiatan..." aria-label="Cari kegiatan"><button type="submit">Cari</button></form>
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
<footer class="footer"><div class="wrap">© <?= date('Y') ?> SMPIT Al Firdaus Purwodadi · Berakhlak, Berilmu, Berprestasi</div></footer>
<script>
(function(){
 const cards=[...document.querySelectorAll('.gallery-card')];
 const filters=[...document.querySelectorAll('.filter')];
 const query=document.getElementById('gallery-query');
 const form=document.getElementById('gallery-search');
 const count=document.getElementById('result-count');
 const noResults=document.getElementById('no-results');
 let active='all';
 function render(){
  const term=query.value.trim().toLowerCase(); let visible=0;
  cards.forEach(card=>{
   const category=(card.dataset.category||'').toLowerCase();
   const text=card.dataset.search||'';
   const categoryMatch=active==='all'||category.includes(active)||(active==='ict'&&category.includes('sains'));
   const searchMatch=!term||text.includes(term);
   const show=categoryMatch&&searchMatch;
   card.hidden=!show;if(show)visible++;
  });
  count.textContent=visible+' dokumentasi';
  noResults.hidden=visible!==0;
 }
 filters.forEach(button=>button.addEventListener('click',()=>{
  active=button.dataset.category;
  filters.forEach(item=>item.classList.toggle('active',item===button));
  render();
 }));
 form.addEventListener('submit',event=>{event.preventDefault();render()});
 query.addEventListener('input',render);
})();
</script>
</body></html>