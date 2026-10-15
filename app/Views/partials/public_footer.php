<?php
$publicSettings = $settings ?? [];
$publicAddress = trim((string) ($publicSettings['address'] ?? ''));
$publicPhone = preg_replace('/\\D+/', '', (string) ($publicSettings['phone'] ?? ''));
$publicEmail = trim((string) ($publicSettings['email'] ?? ''));
$publicName = $publicSettings['site_name'] ?? 'SMPIT Al Firdaus Purwodadi';
?>
<style>
.shared-site-footer{background:#0b1d35;color:#d8e5f5;padding:48px 24px 0;margin-top:52px;font-size:14px;line-height:1.8}
.shared-footer-inner{width:min(1240px,92%);margin:0 auto}
.shared-footer-grid{display:grid;grid-template-columns:1.2fr .8fr 1fr;gap:38px;padding-bottom:34px}
.shared-site-footer h2{font-size:16px;color:#fff;margin:0 0 13px;font-weight:800}
.shared-site-footer p{margin:0 0 10px;color:#c0d0e3}
.shared-footer-nav{display:flex;flex-direction:column;align-items:flex-start;gap:7px}
.shared-footer-nav a,.shared-footer-contact a{color:#d8e5f5;text-decoration:none}
.shared-footer-nav a:hover,.shared-footer-contact a:hover{color:#fff;text-decoration:underline}
.shared-footer-bottom{border-top:1px solid #ffffff20;padding:17px 0;display:flex;justify-content:space-between;gap:16px;flex-wrap:wrap;color:#9fb3cb;font-size:12px}
@media(max-width:700px){.shared-site-footer{padding:34px 20px 0}.shared-footer-grid{grid-template-columns:1fr;gap:25px}.shared-footer-bottom{flex-direction:column;gap:5px}}
</style>
<footer class="shared-site-footer" id="kontak">
 <div class="shared-footer-inner">
  <div class="shared-footer-grid">
   <section><h2><?= esc($publicName) ?></h2><p>Pendidikan Islam terpadu untuk generasi yang bertakwa, berprestasi, dan berwawasan global.</p></section>
   <nav class="shared-footer-nav" aria-label="Navigasi footer"><h2>Navigasi</h2>
    <a href="<?= site_url('/') ?>#profil">Profil sekolah</a><a href="<?= site_url('/') ?>#program">Program unggulan</a><a href="<?= site_url('berita') ?>">Berita &amp; pengumuman</a><a href="<?= site_url('galeri') ?>">Galeri kegiatan</a><a href="<?= site_url('prestasi') ?>">Prestasi siswa</a><a href="https://smpit.alfirdauspurwodadi.sch.id/" target="_blank" rel="noopener noreferrer">PPS</a>
   </nav>
   <section class="shared-footer-contact"><h2>Kontak Sekolah</h2>
    <?php if ($publicAddress !== ''): ?><p><?= esc($publicAddress) ?></p><?php endif; ?>
    <?php if ($publicPhone !== ''): ?><p>WhatsApp: <a href="https://wa.me/<?= esc($publicPhone, 'attr') ?>" target="_blank" rel="noopener noreferrer"><?= esc($publicSettings['phone']) ?></a></p><?php endif; ?>
    <?php if ($publicEmail !== ''): ?><p>Email: <a href="mailto:<?= esc($publicEmail, 'attr') ?>"><?= esc($publicEmail) ?></a></p><?php endif; ?>
   </section>
  </div>
  <div class="shared-footer-bottom"><span>© <?= date('Y') ?> <?= esc($publicName) ?>. Hak cipta dilindungi.</span><span>Ilmu · Akhlak · Prestasi</span></div>
 </div>
</footer>