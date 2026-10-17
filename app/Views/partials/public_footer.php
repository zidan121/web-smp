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
    ['key' => 'facebook', 'label' => 'Facebook'],
    ['key' => 'instagram', 'label' => 'Instagram'],
    ['key' => 'youtube', 'label' => 'YouTube'],
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
.shared-footer-socials a{width:34px;height:34px;display:inline-flex;align-items:center;justify-content:center;border:1px solid #6796c5;border-radius:50%;color:#fff;text-decoration:none;background:rgba(255,255,255,.08);transition:background .2s ease,transform .2s ease,border-color .2s ease}
.shared-footer-socials a svg{display:block;width:17px;height:17px;fill:currentColor}
.shared-footer-socials a:hover{background:#1267a9;color:#fff;border-color:#9bd5ff;transform:translateY(-2px)}
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
      <?php
       $socialUrl = trim((string) ($publicSettings[$social['key']] ?? ''));
       $socialIcon = match ($social['key']) {
        'facebook' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1v-2c0-.9.3-1.5 1.6-1.5h1.7V3.6c-.3 0-1.3-.1-2.5-.1-2.5 0-4.2 1.5-4.2 4.3v2.1H7.3V13h2.8v8h3.4z"/></svg>',
        'instagram' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7.5 2.8h9A4.7 4.7 0 0 1 21.2 7.5v9a4.7 4.7 0 0 1-4.7 4.7h-9a4.7 4.7 0 0 1-4.7-4.7v-9a4.7 4.7 0 0 1 4.7-4.7zm0 2A2.7 2.7 0 0 0 4.8 7.5v9a2.7 2.7 0 0 0 2.7 2.7h9a2.7 2.7 0 0 0 2.7-2.7v-9a2.7 2.7 0 0 0-2.7-2.7h-9zM12 7.1a4.9 4.9 0 1 1 0 9.8 4.9 4.9 0 0 1 0-9.8zm0 2a2.9 2.9 0 1 0 0 5.8 2.9 2.9 0 0 0 0-5.8zm5.1-3.3a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4z"/></svg>',
        'youtube' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M23.2 7a3 3 0 0 0-2.1-2.1C19.2 4.4 12 4.4 12 4.4s-7.2 0-9.1.5A3 3 0 0 0 .8 7 31 31 0 0 0 .3 12a31 31 0 0 0 .5 5 3 3 0 0 0 2.1 2.1c1.9.5 9.1.5 9.1.5s7.2 0 9.1-.5a3 3 0 0 0 2.1-2.1 31 31 0 0 0 .5-5 31 31 0 0 0-.5-5zM9.6 15.6V8.4l6.2 3.6-6.2 3.6z"/></svg>',
       };
      ?>
      <?php if ($socialUrl !== ''): ?><a href="<?= esc($socialUrl, 'attr') ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= esc($social['label'], 'attr') ?>"><?= $socialIcon ?></a><?php endif; ?>
     <?php endforeach; ?>
     <?php if ($publicPhone !== ''): ?><a href="https://wa.me/<?= esc($publicPhone, 'attr') ?>" target="_blank" rel="noopener noreferrer" aria-label="WhatsApp"><svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20.5 3.5A11.7 11.7 0 0 0 2.1 17.6L.6 23.2l5.8-1.5a11.7 11.7 0 0 0 5.6 1.4h.1A11.7 11.7 0 0 0 20.5 3.5zM12.1 21a9.7 9.7 0 0 1-4.9-1.3l-.4-.2-3.4.9.9-3.3-.2-.4A9.7 9.7 0 1 1 12.1 21zm5.3-7.3c-.3-.2-1.7-.9-2-1s-.5-.2-.7.2-.8 1-1 1.2-.4.2-.7.1a8 8 0 0 1-2.4-1.5 9 9 0 0 1-1.7-2.1c-.2-.3 0-.5.1-.7l.5-.6c.2-.2.2-.4.3-.6.1-.2 0-.4 0-.6s-.7-1.7-1-2.3c-.2-.5-.5-.4-.7-.4h-.6c-.2 0-.6.1-.9.4s-1.2 1.2-1.2 2.8 1.2 3.2 1.4 3.4a11.8 11.8 0 0 0 4.5 4c.6.2 1.1.4 1.5.5.6.2 1.2.2 1.6.1.5-.1 1.7-.7 1.9-1.4s.2-1.3.2-1.4-.2-.2-.5-.4z"/></svg></a><?php endif; ?>
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