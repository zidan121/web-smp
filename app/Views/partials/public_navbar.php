<?php
/**
 * Shared public navigation. Include this partial on all public pages.
 * The subtitle is synchronized with Admin → Profil Sekolah → Tagline.
 */
if (! isset($profile) || ! is_array($profile)) {
    $profile = (new \App\Models\SchoolProfileModel())->first() ?? [];
}
$headerTagline = trim((string) ($profile['tagline'] ?? ''));
if ($headerTagline === '') {
    $headerTagline = 'PURWODADI · SEKOLAH ISLAM TERPADU';
}
?>
<style>
.shared-site-header{height:78px;min-height:78px;width:100%;position:sticky;top:0;z-index:1000;display:flex;align-items:center;background:rgba(255,255,255,.97);backdrop-filter:blur(16px);border-bottom:1px solid #e4ebf4;box-sizing:border-box}
.shared-header-inner{width:min(1240px,92%);min-height:78px;margin:0 auto;padding:0;display:flex;flex-direction:row;flex-wrap:nowrap;align-items:center;justify-content:space-between;gap:24px;box-sizing:border-box}
.shared-brand{display:flex;align-items:center;gap:12px;min-width:290px;flex:0 1 auto;color:#102b50;text-decoration:none;font-weight:800;line-height:1.15}
.shared-brand-logo,.shared-brand-mark{width:48px;height:48px;min-width:48px;flex:0 0 48px;box-sizing:border-box;border-radius:14px}
.shared-brand-logo{display:block;object-fit:contain;object-position:center;padding:4px;background:#fff}
.shared-brand-mark{display:grid;place-items:center;background:linear-gradient(145deg,#0d4d9e,#15315e);color:#fff;font-size:25px;box-shadow:0 6px 14px #0b3e8324}
.shared-brand-copy{display:block}.shared-brand-copy strong{display:block;margin:0;font-size:16px;font-weight:800;color:#102b50;white-space:nowrap}.shared-brand-copy small{display:block;margin-top:5px;font-size:10px;letter-spacing:1.2px;color:#718198;white-space:nowrap}
.shared-nav-links{display:flex;flex:1 1 auto;flex-direction:row;align-items:center;justify-content:center;gap:clamp(16px,2.2vw,32px);margin:0;padding:0;font-size:14px;font-weight:650}
.shared-nav-links a{display:block;margin:0;padding:28px 0;border:0;background:transparent;color:#344965;text-decoration:none;white-space:nowrap;font-size:14px;font-weight:650}
.shared-nav-links a:hover{color:#0c4b9b}
.shared-menu-toggle{display:none;border:0;border-radius:9px;padding:8px 11px;background:#edf3fb;color:#102b50;font-size:20px}
.shared-ppdb-button{display:inline-flex;align-items:center;justify-content:center;flex:0 0 auto;margin:0;padding:14px 20px;border:0;border-radius:13px;background:linear-gradient(120deg,#2b6098,#102b50);color:#fff;text-decoration:none;font-size:13px;font-weight:750;white-space:nowrap;box-shadow:0 8px 20px #0b4b9b20}
@media(max-width:850px){.shared-header-inner{width:94%;gap:14px}.shared-brand{min-width:0;gap:9px}.shared-brand-copy strong{font-size:13px}.shared-brand-copy small{font-size:8px;letter-spacing:.6px}.shared-nav-links{gap:13px}.shared-nav-links a{font-size:12px}.shared-ppdb-button{padding:12px 14px;font-size:12px}}
@media(max-width:650px){.shared-site-header{height:auto;min-height:70px}.shared-header-inner{width:92%;min-height:70px;flex-wrap:wrap;gap:10px;padding:10px 0}.shared-brand{flex:1 1 auto;min-width:0}.shared-brand-logo,.shared-brand-mark{width:42px;height:42px;min-width:42px;flex-basis:42px;border-radius:12px}.shared-brand-copy strong{font-size:12px}.shared-brand-copy small{font-size:7px;letter-spacing:.25px;white-space:normal}.shared-menu-toggle{display:block;order:2}.shared-ppdb-button{padding:10px 11px;font-size:11px;border-radius:10px}.shared-nav-links{display:none;position:absolute;top:100%;left:0;right:0;order:3;width:100%;flex:0 0 100%;padding:10px 4% 16px;background:#fff;border-bottom:1px solid #e4ebf4;box-shadow:0 12px 18px rgba(16,43,78,.08);flex-direction:column;align-items:stretch;gap:0}.shared-nav-links.is-open{display:flex}.shared-nav-links a{padding:12px 4px;border-top:1px solid #edf1f7;font-size:14px}}
</style>
<header class="shared-site-header">
  <div class="shared-header-inner">
    <a href="<?= site_url('/') ?>" class="shared-brand" aria-label="SMPIT Al Firdaus Purwodadi">
      <?php if (! empty($settings['site_logo'])): ?>
        <img class="shared-brand-logo" src="<?= base_url('assets/images/' . esc($settings['site_logo'], 'attr')) ?>" alt="Logo SMPIT Al Firdaus">
      <?php else: ?>
        <span class="shared-brand-mark">AF</span>
      <?php endif; ?>
      <span class="shared-brand-copy"><strong><?= esc($settings['site_name'] ?? ($profile['school_name'] ?? 'SMPIT AL FIRDAUS')) ?></strong><small><?= esc($headerTagline) ?></small></span>
    </a>
    <button class="shared-menu-toggle" type="button" aria-label="Buka menu" aria-expanded="false" onclick="const nav=this.nextElementSibling;nav.classList.toggle('is-open');this.setAttribute('aria-expanded',nav.classList.contains('is-open'))">☰</button>
    <nav class="shared-nav-links" aria-label="Navigasi utama">
      <a href="<?= site_url('/') ?>#profil">Profil</a>
      <a href="<?= site_url('/') ?>#program">Program</a>
      <a href="<?= site_url('/') ?>#keunggulan">Keunggulan</a>
      <a href="<?= site_url('/') ?>#kontak">Kontak</a>
    </nav>
    <a class="shared-ppdb-button" href="https://smpit.alfirdauspurwodadi.sch.id/" target="_blank" rel="noopener noreferrer">Daftar PPS</a>
  </div>
</header>