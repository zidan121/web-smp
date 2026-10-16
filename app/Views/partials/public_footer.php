<?php
$publicSettings = $settings ?? [];
$publicAddress = trim((string) ($publicSettings['address'] ?? ''));
$publicPhoneRaw = trim((string) ($publicSettings['phone'] ?? ''));
$publicPhone = preg_replace('/\\D+/', '', $publicPhoneRaw);
$publicEmail = trim((string) ($publicSettings['email'] ?? ''));
$publicName = trim((string) ($publicSettings['site_name'] ?? 'SMPIT Al Firdaus Purwodadi'));
$publicLogo = trim((string) ($publicSettings['site_logo'] ?? ''));
$mapQuery = $publicAddress !== '' ? $publicAddress : $publicName;
$mapUrl = 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode($mapQuery);
$socialLinks = [
    ['key' => 'facebook', 'label' => 'Facebook', 'icon' => 'f'],
    ['key' => 'instagram', 'label' => 'Instagram', 'icon' => '◎'],
    ['key' => 'youtube', 'label' => 'YouTube', 'icon' => '▶'],
];
?>
<style>
.shared-site-footer{background:linear-gradient(115deg,#06325c 0%,#073968 52%,#062c52 100%);color:#d8eaff;padding:22px 24px 0;margin-top:0;font-family:Inter,Arial,sans-serif;font-size:12px;line-height:1.55}
.shared-footer-inner{width:min(1380px,94%);margin:0 auto}
.shared-site-footer,.shared-site-footer *{box-sizing:border-box}
.shared-site-footer section,.shared-site-footer nav{display:block;padding:0!important;margin:0!important;min-width:0;float:none;position:static}
.shared-site-footer h2{font-family:Inter,Arial,sans-serif;line-height:1.35}
.shared-site-footer a{line-height:1.55}
.shared-site-footer .shared-footer-grid{display:grid!important;align-items:start!important;grid-template-columns:minmax(0,1.2fr) minmax(120px,.65fr) minmax(0,1fr) minmax(0,1fr);gap:clamp(18px,3vw,48px);padding:0 0 22px!important}
.shared-site-footer .shared-footer-about{align-self:start!important}
.shared-site-footer .shared-footer-nav{display:flex!important;flex-direction:column;align-items:flex-start}
.shared-site-footer .shared-footer-contact,.shared-site-footer .shared-footer-location{align-self:start!important}
.shared-site-footer .shared-footer-bottom{margin:0!important;clear:both}
.shared-footer-grid{display:grid!important;grid-template-columns:minmax(0,1.25fr) minmax(140px,.7fr) minmax(0,1fr) minmax(0,1fr);gap:clamp(18px,2.8vw,42px);align-items:start!important;padding:0 0 22px!important}
.shared-footer-brand{display:flex;align-items:center;gap:10px;margin-bottom:8px;min-width:0}
.shared-footer-logo,.shared-footer-logo-fallback{width:42px;height:42px;flex:0 0 42px;border-radius:50%;border:1px solid #91b7df}
.shared-footer-logo{object-fit:contain;background:#fff;padding:2px}
.shared-footer-logo-fallback{display:grid;place-items:center;background:#fff;color:#07539a;font-size:17px;font-weight:850}
.shared-footer-brand strong{display:block;color:#fff;font-size:15px;line-height:1.25;font-weight:800}
.shared-footer-brand small{display:block;color:#9edcff;font-size:9px;letter-spacing:.6px;margin-top:3px}
.shared-site-footer p{margin:0 0 7px;color:#bfe0fb;font-size:11px;line-height:1.65}
.shared-footer-socials{display:flex;align-items:center;gap:8px;margin-top:12px}
.shared-footer-socials a{width:25px;height:25px;display:inline-flex;align-items:center;justify-content:center;border:1px solid #6796c5;border-radius:50%;color:#fff;font-weight:800;font-size:13px;text-decoration:none;background:#ffffff0a}
.shared-footer-socials a:hover{background:#1267a9;color:#fff}
.shared-site-footer h2{font-size:11px;color:#fff;margin:0 0 9px;font-weight:800}
.shared-footer-nav{display:flex;flex-direction:column;align-items:flex-start;gap:2px}
.shared-footer-nav a,.shared-footer-contact a{color:#d8eaff;text-decoration:none;font-size:11px}
.shared-footer-nav a:before{content:'›';display:inline-block;margin-right:9px;font-size:17px;line-height:1;vertical-align:-1px}
.shared-footer-nav a:hover,.shared-footer-contact a:hover{color:#fff;text-decoration:underline}
.shared-footer-contact .contact-row{display:flex;align-items:flex-start;gap:9px;margin:0 0 6px;color:#d8eaff;font-size:11px;line-height:1.6}
.shared-footer-contact .contact-icon{width:15px;flex:0 0 15px;text-align:center;color:#fff;font-size:14px;font-weight:800}
.shared-footer-map{display:block;width:100%;height:60px;overflow:hidden;border:1px solid #7da5ce;border-radius:7px;background:#e9f0f3;margin:0 0 5px}
.shared-footer-map iframe{width:100%;height:100%;border:0;display:block}
.shared-footer-map-link{display:flex;align-items:center;justify-content:center;gap:7px;width:100%;min-height:29px;border:1px solid #8bb5df;border-radius:18px;background:#0b5793;color:#fff!important;font-size:10px;font-weight:750;text-decoration:none}
.shared-footer-map-link:hover{background:#1472b7;text-decoration:none!important}
.shared-footer-bottom{border-top:1px solid #ffffff24;padding:10px 0;display:flex;justify-content:center;align-items:center;gap:16px;color:#9dc7ee;font-size:10px;text-align:center;position:relative}
.shared-footer-bottom .footer-tagline{position:absolute;right:0}
@media(max-width:760px){.shared-site-footer{padding:28px 18px 0}.shared-footer-inner{width:100%}.shared-site-footer .shared-footer-grid{grid-template-columns:repeat(2,minmax(0,1fr));gap:25px 20px;padding-bottom:22px!important}.shared-footer-bottom{justify-content:flex-start;flex-direction:column;gap:3px;padding:12px 0}.shared-footer-bottom .footer-tagline{position:static}}
@media(max-width:480px){.shared-site-footer .shared-footer-grid{grid-template-columns:1fr;gap:22px}.shared-footer-map{height:110px}.shared-footer-brand strong{font-size:14px}}
</style>
<footer class="shared-site-footer" id="kontak">
 <div class="shared-footer-inner">
  <div class="shared-footer-grid">
   <section class="shared-footer-about">
    <div class="shared-footer-brand">
     <?php if ($publicLogo !== ''): ?>
      <img class="shared-footer-logo" src="<?= base_url('assets/images/' . ltrim($publicLogo, '/')) ?>" alt="Logo <?= esc($publicName, 'attr') ?>">
     <?php else: ?>
      <span class="shared-footer-logo-fallback" aria-hidden="true">AF</span>
     <?php endif; ?>
     <div><strong><?= esc($publicName) ?></strong><small>PURWODADI · SEKOLAH ISLAM TERPADU</small></div>
    </div>
    <p>Mewujudkan generasi berilmu, berakhlak mulia,<br>mandiri dan berdaya saing.</p>
    <div class="shared-footer-socials" aria-label="Media sosial">
     <?php foreach ($socialLinks as $social): ?>
      <?php $socialUrl = trim((string) ($publicSettings[$social['key']] ?? '')); ?>
      <?php if ($socialUrl !== ''): ?><a href="<?= esc($socialUrl, 'attr') ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= esc($social['label'], 'attr') ?>"><?= esc($social['icon']) ?></a><?php endif; ?>
     <?php endforeach; ?>
     <?php if ($publicPhone !== ''): ?><a href="https://wa.me/<?= esc($publicPhone, 'attr') ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp">◉</a><?php endif; ?>
    </div>
   </section>
   <nav class="shared-footer-nav" aria-label="Tautan cepat">
    <h2>Tautan Cepat</h2>
    <a href="<?= site_url('/') ?>">Beranda</a><a href="<?= site_url('/') ?>#profil">Profil</a><a href="<?= site_url('/') ?>#program">Program</a><a href="<?= site_url('/') ?>#keunggulan">Keunggulan</a><a href="<?= site_url('berita') ?>">Berita</a><a href="<?= site_url('/') ?>#kontak">Kontak</a>
   </nav>
   <section class="shared-footer-contact">
    <h2>Kontak Kami</h2>
    <?php if ($publicAddress !== ''): ?><div class="contact-row"><span class="contact-icon">●</span><span><?= esc($publicAddress) ?></span></div><?php endif; ?>
    <?php if ($publicPhoneRaw !== ''): ?><div class="contact-row"><span class="contact-icon">☎</span><span><?= esc($publicPhoneRaw) ?></span></div><?php endif; ?>
    <?php if ($publicEmail !== ''): ?><div class="contact-row"><span class="contact-icon">✉</span><span><a href="mailto:<?= esc($publicEmail, 'attr') ?>"><?= esc($publicEmail) ?></a></span></div><?php endif; ?>
    <?php if ($publicPhone !== ''): ?><div class="contact-row"><span class="contact-icon">◉</span><span><a href="https://wa.me/<?= esc($publicPhone, 'attr') ?>" target="_blank" rel="noopener noreferrer"><?= esc($publicPhoneRaw) ?></a></span></div><?php endif; ?>
   </section>
   <section class="shared-footer-location">
    <h2>Peta Lokasi</h2>
    <a class="shared-footer-map" href="<?= esc($mapUrl, 'attr') ?>" target="_blank" rel="noopener noreferrer" aria-label="Buka lokasi sekolah di Google Maps"><iframe title="Peta lokasi sekolah" loading="lazy" referrerpolicy="no-referrer-when-downgrade" src="https://maps.google.com/maps?q=<?= rawurlencode($mapQuery) ?>&output=embed"></iframe></a>
    <a class="shared-footer-map-link" href="<?= esc($mapUrl, 'attr') ?>" target="_blank" rel="noopener noreferrer">▣ Lihat di Google Maps</a>
   </section>
  </div>
  <div class="shared-footer-bottom"><span>© <?= date('Y') ?> <?= esc($publicName) ?>. All rights reserved.</span><span class="footer-tagline">Sekolah Islam Terpadu</span></div>
 </div>
</footer>