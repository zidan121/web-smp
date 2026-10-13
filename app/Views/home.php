
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMPIT Al Firdaus Purwodadi</title>
    <meta name="description" content="SMPIT Al Firdaus Purwodadi — Berprestasi, Bertakwa, Berwawasan Global.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Poppins:wght@500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --navy: #102b4e;
            --blue: #24558b;
            --gold: #e8b75b;
            --light: #f3f7fc;
            --text: #172b45;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background: white;
            overflow-x: hidden;
        }

        a { color: inherit; text-decoration: none; }

        .container {
            width: min(1160px, 90%);
            margin: auto;
        }

        header {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(255,255,255,.94);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid #e6edf5;
        }

        .navbar {
            min-height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .brand-mark {
            width: 48px;
            height: 48px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            color: white;
            background: linear-gradient(145deg, #2d639e, #102b4e);
            box-shadow: 5px 6px 12px #102b4e30, inset 1px 1px 2px #ffffff70;
            font-size: 23px;
            font-weight: 800;
        }

        .brand h2 {
            font: 700 16px 'Poppins', sans-serif;
            color: var(--navy);
        }

        .brand p {
            margin-top: 3px;
            font-size: 10px;
            letter-spacing: 1.1px;
            color: #667a92;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
            font-size: 13px;
            font-weight: 600;
        }

        .nav-links a:hover { color: var(--blue); }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 13px 19px;
            border-radius: 12px;
            font-weight: 700;
            font-size: 13px;
            transition: transform .25s, box-shadow .25s;
            cursor: pointer;
            border: 0;
        }

        .button:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 25px #102b4e35;
        }

        .button-primary {
            background: linear-gradient(135deg, #2b6098, #102b4e);
            color: white;
            box-shadow: 0 7px 15px #102b4e25;
        }

        .button-outline {
            border: 1px solid #cbd8e8;
            background: white;
            color: var(--navy);
        }

        .hero {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            background:
                radial-gradient(ellipse at 85% 15%, #315c8b35, transparent 35%),
                linear-gradient(135deg, #f5f8fd, #e8f0fa);
            padding: 80px 0 90px;
        }

        .hero::before, .hero::after {
            content: "";
            position: absolute;
            z-index: -1;
            border-radius: 50%;
            filter: blur(1px);
        }

        .hero::before {
            width: 360px;
            height: 360px;
            background: #d5e4f7;
            right: -120px;
            top: 30px;
        }

        .hero::after {
            width: 180px;
            height: 180px;
            background: #f2dba9;
            left: -100px;
            bottom: -70px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 65px;
        }

        .eyebrow {
            display: inline-flex;
            gap: 8px;
            align-items: center;
            background: white;
            border: 1px solid #dce6f2;
            color: var(--blue);
            padding: 9px 13px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .7px;
            margin-bottom: 24px;
        }

        .eyebrow span {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: #dca943;
        }

        h1, h2, h3 {
            font-family: 'Poppins', sans-serif;
        }

        .hero h1 {
            font-size: clamp(36px, 4.5vw, 59px);
            line-height: 1.16;
            letter-spacing: -2px;
            color: var(--navy);
        }

        .hero h1 em {
            font-style: normal;
            color: #2e639a;
        }

        .hero-copy {
            margin: 23px 0 27px;
            max-width: 500px;
            line-height: 1.85;
            font-size: 15px;
            color: #61738a;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .hero-note {
            margin-top: 28px;
            font-size: 12px;
            color: #687c94;
        }

        .hero-visual {
            position: relative;
            perspective: 1000px;
        }

        .photo-frame {
            position: relative;
            padding: 10px;
            border-radius: 30px;
            background: linear-gradient(145deg, #ffffff, #d0ddec);
            box-shadow: 22px 25px 55px #18385d30,
                        -8px -8px 25px #ffffffc9;
            transform: rotateY(-7deg) rotateX(3deg);
            transition: transform .5s;
        }

        .photo-frame:hover {
            transform: rotateY(0) rotateX(0) translateY(-5px);
        }

        .hero-photo {
            display: block;
            width: 100%;
            height: 390px;
            object-fit: cover;
            border-radius: 22px;
            background: #dce7f5;
        }

        .floating-card {
            position: absolute;
            padding: 17px 19px;
            border: 1px solid #ffffffd9;
            border-radius: 17px;
            background: #ffffffed;
            box-shadow: 0 16px 35px #102b4e25;
            backdrop-filter: blur(12px);
            animation: float 4s ease-in-out infinite;
        }

        .floating-card strong {
            display: block;
            font: 700 14px 'Poppins', sans-serif;
            color: var(--navy);
        }

        .floating-card small {
            display: block;
            margin-top: 5px;
            color: #718198;
            font-size: 11px;
        }

        .float-one { left: -40px; bottom: 45px; }
        .float-two { right: -20px; top: 35px; animation-delay: -2s; }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(-1deg); }
            50% { transform: translateY(-12px) rotate(1deg); }
        }

        section { padding: 85px 0; }

        .section-heading {
            text-align: center;
            max-width: 660px;
            margin: 0 auto 43px;
        }

        .section-heading .label {
            color: #2c6098;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .section-heading h2 {
            margin: 12px 0;
            color: var(--navy);
            font-size: clamp(27px, 3vw, 38px);
            letter-spacing: -1px;
        }

        .section-heading p {
            color: #6b7d91;
            line-height: 1.8;
            font-size: 14px;
        }

        /* Kartu program dengan foto latar */
        .program-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 24px;
        }

        .program-card {
            position: relative;
            isolation: isolate;
            overflow: hidden;
            min-height: 390px;
            padding: 28px;
            border: 1px solid #d9e6f8;
            border-radius: 28px;
            background: #f2f7ff;
            box-shadow: 0 14px 32px rgba(22, 52, 91, 0.09);
            display: flex;
            flex-direction: column;
            align-items: stretch;
            transition: transform .25s ease, box-shadow .25s ease;
        }

        /* Foto latar dan lapisan putih transparan */
        .program-card::before {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -2;
            background-size: cover;
            background-position: center;
            transition: transform .4s ease;
        }

        .program-card::after {
            content: "";
            position: absolute;
            inset: 0;
            z-index: -1;
            background: linear-gradient(
                to bottom,
                rgba(255,255,255,.25) 0%,
                rgba(255,255,255,.78) 38%,
                rgba(245,249,255,.98) 62%,
                #f5f9ff 100%
            );
        }

        .program-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 22px 42px rgba(22, 52, 91, 0.15);
        }

        .program-card:hover::before {
            transform: scale(1.05);
        }

        /* Foto tiap program */
        .program-card.program-tcp::before {
            background-image: url("/assets/images/program-tcp.jpg");
        }

        .program-card.program-icp::before {
            background-image: url("/assets/images/program-icp.jpg");
        }

        .program-card.program-ict::before {
            background-image: url("/assets/images/program-ict.jpg");
        }

        /* Ikon dan singkatan di tengah */
        .program-card .program-icon {
            align-self: center;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 76px;
            height: 76px;
            margin: 12px auto 16px;
            border-radius: 22px;
            background: rgba(235, 243, 255, .94);
            box-shadow: 0 8px 22px rgba(28, 67, 115, .12);
            font-size: 34px;
        }

        .program-card h3 {
            margin: 0 0 16px;
            text-align: center;
            color: #17385f;
            font-size: 28px;
            font-weight: 800;
        }

        .program-card h3::after {
            content: "";
            display: block;
            width: 48px;
            height: 4px;
            margin: 14px auto 0;
            border-radius: 10px;
            background: #26a9ef;
        }

        .program-card p {
            color: #5c7392;
            line-height: 1.7;
            margin: 10px 0 24px;
        }

        .program-card .learn-more {
            margin-top: auto;
            color: #1762ad;
            font-weight: 700;
            text-decoration: none;
        }

        .program-card .learn-more:hover {
            text-decoration: underline;
        }

        @media (max-width: 900px) {
            .program-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 600px) {
            .program-grid {
                grid-template-columns: 1fr;
            }

            .program-card {
                min-height: 360px;
            }
        }

        .learn-more {
            display: inline-block;
            margin-top: 22px;
            color: #2c6098;
            font-size: 12px;
            font-weight: 800;
        }

        .profile {
            background: #f4f7fc;
        }

        .profile-grid {
            display: grid;
            grid-template-columns: .9fr 1.1fr;
            gap: 55px;
            align-items: center;
        }

        .profile-visual {
            min-height: 340px;
            border-radius: 28px;
            padding: 22px;
            display: flex;
            align-items: end;
            background: linear-gradient(145deg, #204b7c, #102b4e);
            box-shadow: 15px 20px 40px #102b4e25;
        }

        .profile-visual div {
            color: white;
            padding: 10px;
        }

        .profile-visual h3 { font-size: 26px; margin-bottom: 8px; }
        .profile-visual p { color: #d5e3f4; font-size: 13px; line-height: 1.8; }

        .profile-copy h2 {
            font-size: clamp(28px, 3vw, 38px);
            color: var(--navy);
            line-height: 1.3;
        }

        .profile-copy > p {
            margin-top: 17px;
            color: #64768c;
            font-size: 14px;
            line-height: 1.9;
        }

        .vision-list {
            margin: 23px 0;
            display: grid;
            gap: 13px;
        }

        .vision-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #415770;
            font-size: 13px;
            line-height: 1.7;
        }

        .vision-item span {
            color: #2c6098;
            font-weight: 800;
        }

        .cta {
            padding: 0 0 85px;
            background: #f4f7fc;
        }

        .cta-box {
            padding: 48px;
            border-radius: 27px;
            background: linear-gradient(125deg, #1f4e82, #102b4e 75%);
            box-shadow: 0 22px 40px #102b4e30;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
            color: white;
        }

        .cta-box h2 { font-size: clamp(25px, 3vw, 36px); }
        .cta-box p { color: #d1deee; margin-top: 10px; font-size: 13px; line-height: 1.8; }
        .button-gold { background: linear-gradient(135deg, #f5d68e, #dca943); color: #102b4e; white-space: nowrap; }

        footer {
            background: #0b1d35;
            padding: 48px 0 25px;
            color: white;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 35px;
        }

        footer h3 { font-size: 16px; margin-bottom: 16px; }
        footer p, footer a { color: #b8c8dc; font-size: 12px; line-height: 2; }
        .footer-links { display: grid; gap: 5px; }
        .copyright { margin-top: 35px; padding-top: 20px; border-top: 1px solid #ffffff20; color: #91a6c0; font-size: 11px; }

        .reveal {
            opacity: 0;
            transform: translateY(22px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .reveal.visible {
            opacity: 1;
            transform: translateY(0);
        }

        @media (max-width: 850px) {
            .nav-links { gap: 13px; font-size: 11px; }
            .hero-grid { gap: 35px; }
            .hero-photo { height: 330px; }
            .float-one { left: -15px; }
            .float-two { right: -10px; }
            .profile-grid { gap: 30px; }
        }

        @media (max-width: 650px) {
            .navbar { min-height: 70px; }
            .nav-links { display: none; }
            .brand h2 { font-size: 14px; }
            .hero { padding: 52px 0 65px; }
            .hero-grid, .profile-grid { grid-template-columns: 1fr; }
            .hero-grid { gap: 45px; }
            .hero h1 { font-size: 39px; }
            .hero-photo { height: 290px; }
            .program-grid { grid-template-columns: 1fr; }
            section { padding: 65px 0; }
            .profile-visual { min-height: 240px; }
            .cta { padding-bottom: 60px; }
            .cta-box { padding: 30px 24px; align-items: flex-start; flex-direction: column; }
            .footer-grid { grid-template-columns: 1fr; }
            .float-one { left: -5px; bottom: 20px; }
            .float-two { top: 15px; }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important;
            }
            .reveal { opacity: 1; transform: none; }
        }
        /* Ikon dan nama program berada di tengah */
        .program-card .program-icon {
            margin-left: auto;
            margin-right: auto;
        }

        .program-card h3 {
            text-align: center;
        }
    /* Shared responsive footer */
.site-footer{background:#0b1d35!important;color:#d8e5f5!important;padding:58px 24px 0!important;margin-top:52px;border:0!important;text-align:left!important;font-size:15px!important;line-height:1.8}.site-footer *{box-sizing:border-box}.site-footer-inner{max-width:1320px;margin:0 auto}.site-footer-grid{display:grid;grid-template-columns:1.25fr .75fr 1fr;gap:clamp(28px,5vw,86px);padding:0 0 42px}.site-footer h2{margin:0 0 20px;color:#fff;font-size:21px;line-height:1.35;font-weight:800;letter-spacing:-.02em}.site-footer p{margin:0 0 12px;color:#b9cce3;font-size:15px;line-height:1.9}.site-footer-nav{display:flex;flex-direction:column;align-items:flex-start;gap:8px}.site-footer-nav h2{margin-bottom:10px}.site-footer a{color:#c5d8ef;text-decoration:none;transition:color .2s ease,transform .2s ease}.site-footer a:hover{color:#fff}.site-footer-nav a:hover{transform:translateX(3px)}.site-footer-cta{display:inline-flex;align-items:center;gap:10px;margin-top:8px;padding:9px 15px;border:1px solid #456487;border-radius:10px;color:#fff!important;font-weight:700;font-size:13px}.site-footer-cta:hover{background:#17395e}.site-footer-bottom{display:flex;justify-content:space-between;align-items:center;gap:18px;min-height:68px;border-top:1px solid rgba(203,221,243,.18);color:#8eafd4;font-size:13px}@media(max-width:760px){.site-footer{padding:38px 20px 0!important;margin-top:36px}.site-footer-grid{grid-template-columns:1fr;gap:28px;padding-bottom:28px}.site-footer h2{font-size:19px;margin-bottom:12px}.site-footer-bottom{align-items:flex-start;flex-direction:column;justify-content:center;gap:3px;padding:15px 0;line-height:1.7}}

/* Alignment correction: all footer columns start on the same baseline */
.site-footer-grid{align-items:start!important;justify-items:stretch!important}
.site-footer-grid>.site-footer-about,.site-footer-grid>.site-footer-nav,.site-footer-grid>.site-footer-contact{align-self:start!important;justify-self:stretch!important;margin:0!important;padding:0!important;position:static!important;transform:none!important;min-width:0}
.site-footer-about h2,.site-footer-nav h2,.site-footer-contact h2{margin-top:0!important}
.site-footer-nav{display:flex!important;flex-direction:column!important;align-items:flex-start!important;justify-content:flex-start!important;gap:8px!important}
.site-footer-nav a{display:block;line-height:1.8}


        /* Refined profile section */
        .profile{position:relative;overflow:hidden;background:linear-gradient(180deg,#f7faff 0%,#edf3fb 100%);padding:clamp(64px,8vw,108px) 0}
        .profile:before{content:"";position:absolute;width:430px;height:430px;right:-210px;top:30px;border-radius:50%;background:radial-gradient(circle,#dce9fa 0%,rgba(220,233,250,0) 70%);pointer-events:none}
        .profile-grid{position:relative;grid-template-columns:minmax(0,.92fr) minmax(0,1.08fr);gap:clamp(34px,5vw,76px);align-items:center}
        .profile-visual{position:relative;isolation:isolate;min-height:clamp(340px,34vw,480px);padding:clamp(22px,3vw,36px);overflow:hidden;border:1px solid rgba(255,255,255,.35);border-radius:30px;background:radial-gradient(ellipse at 80% 15%,rgba(95,151,211,.38),transparent 38%),linear-gradient(145deg,#24558b 0%,#17395f 52%,#0d2340 100%);box-shadow:0 26px 65px rgba(16,43,78,.18)}
        .profile-visual:before,.profile-visual:after{content:"";position:absolute;z-index:-1;border:1px solid rgba(255,255,255,.13);border-radius:50%;pointer-events:none}
        .profile-visual:before{width:300px;height:300px;right:-70px;top:-95px}
        .profile-visual:after{width:210px;height:210px;right:-25px;top:-50px}
        .profile-visual div{max-width:410px;padding:0}
        .profile-visual h3{font-size:clamp(27px,2.5vw,36px);letter-spacing:-.035em;margin-bottom:13px}
        .profile-visual p{max-width:390px;color:#e0ebf8;font-size:15px;line-height:1.9}
        .profile-copy{max-width:690px}
        .profile-copy .section-heading .label{margin-bottom:16px}
        .profile-copy h2{max-width:720px;font-size:clamp(31px,3.25vw,48px);line-height:1.15;letter-spacing:-.04em;text-wrap:balance}
        .profile-copy>.section-heading{margin-bottom:0!important}
        .profile-copy>p{margin-top:22px;font-size:16px;line-height:1.95;color:#60748d}
        .vision-list{margin:27px 0 30px;gap:13px}
        .vision-item{padding:12px 14px;border:1px solid #e0e9f5;border-radius:13px;background:rgba(255,255,255,.7);font-size:14px;line-height:1.75;gap:12px;align-items:flex-start}.vision-item>div{flex:1;min-width:0}.vision-item strong{display:block;margin-bottom:4px}.vision-item>div br{display:block;content:"";margin-top:4px}
        .vision-item span{flex:0 0 24px;width:24px;height:24px;display:grid;place-items:center;border-radius:8px;background:#e7f0ff;color:#24558b}
        .profile-copy>.button{margin-top:0;box-shadow:0 12px 26px rgba(25,66,111,.16)}
        @media(max-width:900px){.profile-grid{grid-template-columns:1fr;gap:32px}.profile-visual{min-height:300px}.profile-copy{max-width:none}.profile-copy h2{max-width:760px}}
        @media(max-width:600px){.profile{padding:54px 0}.profile-visual{min-height:260px;border-radius:23px}.profile-copy>p{font-size:14px}.vision-item{font-size:13px;padding:10px 11px}}


        /* Foto profil sekolah: letakkan file di public/assets/images/profil-sekolah.jpg */
        .profile-photo{position:relative;display:flex;align-items:flex-end;isolation:isolate;overflow:hidden;padding:0;background:#17395f}
        .profile-photo-image{position:absolute;inset:0;z-index:-2;width:100%;height:100%;object-fit:cover;object-position:center}
        .profile-photo:before{content:"";position:absolute;inset:0;z-index:-1;background:linear-gradient(180deg,rgba(8,24,45,.02) 20%,rgba(8,24,45,.18) 48%,rgba(8,24,45,.91) 100%)}
        .profile-photo:after{display:none}
        .profile-photo .profile-photo-caption{width:100%;max-width:none;padding:clamp(24px,3vw,38px);color:#fff}
        /* Make the YouTube player fill the entire profile frame with no inner letterboxing */
        .profile-photo:has(.profile-video-wrap){padding:0!important;min-height:0!important;height:auto!important;aspect-ratio:16/9;display:block;background:#102b4e;max-width:none!important}
        .profile-photo:has(.profile-video-wrap) .profile-video-wrap{max-width:none!important;max-height:none!important;margin:0!important;padding:0!important;left:0!important;right:0!important;top:0!important;bottom:0!important}
        .profile-photo:has(.profile-video-wrap) .profile-video{max-width:none!important;max-height:none!important}
        .profile-video{position:absolute;inset:0;width:100%;height:100%;border:0;display:block;border-radius:0;background:#102b4e}
        .profile-video-wrap{position:absolute;inset:0;width:100%;height:100%;overflow:hidden;border-radius:inherit;background:#102b4e}
        /* Video YouTube tampil bersih tanpa overlay teks agar kontrol player terlihat */
        .profile-video-wrap:after{display:none}
        .profile-video-wrap .profile-photo-caption{display:none!important}
        .profile-video-wrap .profile-video{z-index:1}
        .profile-photo:has(.profile-video-wrap):before,.profile-photo:has(.profile-video-wrap):after{display:none}
        .profile-video-wrap:fullscreen{width:100vw;height:100vh;border-radius:0}
        .profile-video-wrap:fullscreen .profile-video{border-radius:0}
        .profile-photo-tag{display:inline-block;margin-bottom:12px;padding:7px 10px;border:1px solid rgba(255,255,255,.35);border-radius:999px;background:rgba(255,255,255,.14);color:#fff;font-size:10px;font-weight:800;letter-spacing:.12em}
        .profile-photo h3{color:#fff}
        .profile-photo p{max-width:420px;color:#e5eef9}

</style>
</head>
<body>

<header>
    <div class="container navbar">
        <a href="/" class="brand">
            <div class="brand-mark">AF</div>
            <div>
                <h2>SMPIT AL FIRDAUS</h2>
                <p>PURWODADI · SEKOLAH ISLAM TERPADU</p>
            </div>
        </a>

        <nav class="nav-links" aria-label="Navigasi utama">
            <a href="#profil">Profil</a>
            <a href="#program">Program</a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#kontak">Kontak</a>
        </nav>

        <a
            class="button button-primary"
            href="<?= site_url('pps') ?>"
            target="_blank"
            rel="noopener noreferrer"
        >
            Daftar PPS
        </a>
    </div>
</header>

<main>
    <section class="hero">
        <div class="container hero-grid">
            <div class="hero-content reveal">
                <div class="eyebrow"><span></span> SEKOLAH ISLAM TERPADU</div>
                <h1>Membangun Generasi <em>Unggul</em> untuk Masa Depan.</h1>
                <p class="hero-copy">
                    Pendidikan Islam terpadu yang menumbuhkan karakter Qur'ani,
                    prestasi akademik, keterampilan teknologi, dan wawasan global.
                </p>
                <div class="hero-actions">
                    <a
                        href="<?= site_url('pps') ?>"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="button button-primary"
                    >
                        Daftar PPS 2027/2028
                    </a>
                    <a href="#profil" class="button button-outline">Kenali Sekolah</a>
                </div>
                
            </div>

            <div class="hero-visual reveal">
                <div class="photo-frame">
                    <img
                        class="hero-photo"
                        src="<?= base_url('assets/images/' . (! empty($profile['hero_image']) ? $profile['hero_image'] : 'hero-sekolah.jpg')) ?>"
                        alt="Kegiatan siswa SMPIT Al Firdaus Purwodadi"
                        onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=1100&q=85'">
                </div>
                <div class="floating-card float-one">
                    <strong>
                        <?php if (! empty($programs)): ?>
                            <?= esc(implode(' · ', array_column($programs, 'name'))) ?>
                        <?php else: ?>
                            TCP · ICT · ICP
                        <?php endif; ?>
                    </strong>
                    <small>Program unggulan sekolah</small>
                </div>
                <div class="floating-card float-two">
                    <strong>Iman & Ilmu</strong>
                    <small>Karakter dan prestasi</small>
                </div>
            </div>
        </div>
    </section>

    <section id="program">
        <div class="container">
            <div class="section-heading reveal">
                <div class="label">Program Unggulan</div>
                <h2>Potensi Siswa, Dikembangkan Bersama</h2>
                <p>Mendukung pertumbuhan siswa melalui pembelajaran Al-Qur'an, teknologi, dan wawasan internasional.</p>
            </div>

            <div class="program-grid">
                <?php if (! empty($programs)): ?>
                    <?php foreach ($programs as $program): ?>
                        <article class="program-card program-<?= esc(strtolower($program['slug'])) ?> reveal">
                            <div class="program-icon">
                                <?php
                                $cmsIcon = null;

                                if (! empty($program['program_icon_id'])) {
                                    $cmsIcon = $programIconsById[$program['program_icon_id']] ?? null;
                                }

                                if ($cmsIcon && $cmsIcon['icon_type'] === 'image') :
                                ?>
                                    <img
                                        src="<?= base_url('assets/images/program-icons/' . rawurlencode($cmsIcon['icon_value'])) ?>"
                                        alt="<?= esc($cmsIcon['name']) ?>"
                                        style="width:48px;height:48px;object-fit:contain;"
                                    >
                                <?php elseif ($cmsIcon && $cmsIcon['icon_type'] === 'builtin') : ?>
                                    <?php
                                    $builtinEmoji = [
                                        'book-open'      => '📖',
                                        'globe'          => '🌐',
                                        'laptop'         => '💻',
                                        'graduation-cap' => '🎓',
                                        'microscope'     => '🔬',
                                        'code'           => '💻',
                                        'heart'          => '❤️',
                                        'star'           => '⭐',
                                    ];

                                    echo esc($builtinEmoji[$cmsIcon['icon_value']] ?? '🎓');
                                    ?>
                                <?php else : ?>
                                    <?php
                                    $programName = strtoupper($program['name']);

                                    if (str_contains($programName, 'TCP')) {
                                        echo '📖';
                                    } elseif (str_contains($programName, 'ICT')) {
                                        echo '💻';
                                    } elseif (str_contains($programName, 'ICP')) {
                                        echo '🌐';
                                    } else {
                                        echo '🎓';
                                    }
                                    ?>
                                <?php endif; ?>
                            </div>

                            <h3><?= esc($program['name']) ?></h3>

                            <p>
                                <?= esc(
                                    $program['description']
                                    ?: 'Informasi program unggulan sekolah.'
                                ) ?>
                            </p>

                            <a
                                href="<?= site_url('program/' . $program['slug']) ?>"
                                class="learn-more"
                            >
                                Pelajari program →
                            </a>
                        </article>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>Informasi program unggulan akan segera tersedia.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <section class="profile" id="profil">
        <div class="container profile-grid">
            <div class="profile-visual profile-photo reveal">
                <?php
                $videoUrl = trim((string) ($profile['profile_video_url'] ?? ''));
                $videoId = '';
                if ($videoUrl !== '') {
                    $videoParts = parse_url($videoUrl);
                    $videoHost = strtolower($videoParts['host'] ?? '');
                    $videoPath = trim($videoParts['path'] ?? '', '/');
                    if (in_array($videoHost, ['youtu.be', 'www.youtu.be'], true)) {
                        $videoId = explode('/', $videoPath)[0] ?? '';
                    } elseif (in_array($videoHost, ['youtube.com', 'www.youtube.com', 'm.youtube.com', 'youtube-nocookie.com', 'www.youtube-nocookie.com'], true)) {
                        parse_str($videoParts['query'] ?? '', $videoQuery);
                        if (($videoParts['path'] ?? '') === '/watch') {
                            $videoId = $videoQuery['v'] ?? '';
                        } elseif (preg_match('~^(embed|shorts)/([A-Za-z0-9_-]+)~', $videoPath, $videoMatch)) {
                            $videoId = $videoMatch[2];
                        }
                    }
                }
                $videoId = preg_match('/^[A-Za-z0-9_-]{11}$/', $videoId) ? $videoId : '';
                ?>
                <?php if ($videoId !== ''): ?>
                    <div class="profile-video-wrap">
                        <iframe class="profile-video" src="https://www.youtube-nocookie.com/embed/<?= esc($videoId, 'attr') ?>?rel=0" title="Video profil SMPIT Al Firdaus Purwodadi" loading="lazy" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                <?php else: ?>
                    <img class="profile-photo-image" src="<?= base_url('assets/images/' . (! empty($profile['profile_image']) ? $profile['profile_image'] : 'profil-sekolah.jpg')) ?>" alt="Foto kegiatan SMPIT Al Firdaus Purwodadi" loading="lazy">
                    <div class="profile-photo-caption">
                        <span class="profile-photo-tag">SMPIT AL FIRDAUS PURWODADI</span>
                        <h3>Iman. Ilmu. Amal.</h3>
                        <p>Mendidik dengan keteladanan, mengembangkan potensi, dan menumbuhkan semangat belajar sepanjang hayat.</p>
                    </div>
                <?php endif; ?>
            </div>

            <?php
            $schoolName = trim((string) ($profile['school_name'] ?? '')) ?: 'SMPIT Al Firdaus Purwodadi';
            $schoolTagline = trim((string) ($profile['tagline'] ?? '')) ?: 'Pendidikan yang Membentuk Karakter dan Masa Depan';
            $schoolAbout = trim((string) ($profile['about'] ?? '')) ?: 'SMPIT Al Firdaus Purwodadi berkomitmen mengembangkan potensi siswa melalui pendidikan Islam terpadu, pembelajaran akademik, dan keterampilan yang relevan dengan perkembangan zaman.';
            $schoolVision = trim((string) ($profile['vision'] ?? '')) ?: 'Generasi bertakwa, berprestasi, dan berwawasan global.';
            $schoolMission = trim((string) ($profile['mission'] ?? '')) ?: 'Pembiasaan ibadah, adab, tanggung jawab, dan kepedulian.';
            ?>
            <div class="profile-copy reveal">
                <div class="section-heading" style="text-align:left;margin:0">
                    <div class="label">Profil Sekolah</div>
                    <h2><?= esc($schoolName) ?></h2>
                </div>
                <p><?= nl2br(esc($schoolAbout)) ?></p>
                <div class="vision-list" id="keunggulan">
                    <div class="vision-item"><span>✦</span><div><strong>Visi pendidikan:</strong> <?= nl2br(esc($schoolVision)) ?></div></div>
                    <div class="vision-item"><span>✦</span><div><strong>Misi sekolah:</strong> <?= nl2br(esc($schoolMission)) ?></div></div>
                    <div class="vision-item"><span>✦</span><div><strong>✦ Berprestasi ✦ Bertakwa ✦ Berwawasan Global</strong></div></div>
                </div>
                <a href="<?= site_url('profil') ?>" class="button button-primary">Selengkapnya tentang sekolah →</a>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="section-heading reveal">
                <div class="label">Informasi Sekolah</div>
                <h2>Kabar dan Aktivitas Al Firdaus</h2>
                <p>Informasi kegiatan, pengumuman, dan pencapaian siswa akan ditampilkan di sini.</p>
            </div>
            <div class="program-grid">
                <article class="program-card reveal">
                    <div class="program-icon">📰</div>
                    <h3>Berita Sekolah</h3>
                    <p>Dokumentasi pembelajaran, kegiatan siswa, dan informasi terbaru sekolah.</p>
                    <a href="<?= site_url('berita') ?>" class="learn-more">Lihat berita →</a>
                </article>
                <article class="program-card reveal">
                    <div class="program-icon">🏆</div>
                    <h3>Prestasi Siswa</h3>
                    <p>Ruang untuk mengapresiasi pencapaian akademik, karakter, dan kompetisi siswa.</p>
                    <a href="<?= site_url('prestasi') ?>" class="learn-more">Lihat prestasi →</a>
                </article>
                <article class="program-card reveal">
                    <div class="program-icon">📸</div>
                    <h3>Galeri Kegiatan</h3>
                    <p>Potret kegiatan belajar, program unggulan, dan aktivitas sekolah.</p>
                    <a href="<?= site_url('galeri') ?>" class="learn-more">Lihat galeri →</a>
                </article>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="container">
            <div class="cta-box reveal">
                <div>
                    <h2>Siapkan Masa Depan Bersama Al Firdaus</h2>
                    <p>Kenali program, persyaratan, dan proses Penerimaan Peserta Didik Baru (PPS) tahun ajaran 2027/2028.</p>
                </div>
                <a
                href="<?= site_url('pps') ?>"
                target="_blank"
                rel="noopener noreferrer"
                class="button button-gold"
                >
                Informasi & Pendaftaran
                </a>
            </div>
        </div>
    </section>
</main>

<footer class="site-footer" id="kontak"><div class="site-footer-inner"><div class="site-footer-grid">
<section class="site-footer-about"><h2><?= esc($profile['school_name'] ?? 'SMPIT Al Firdaus Purwodadi') ?></h2><p><?= esc(($profile['tagline'] ?? '') ?: 'Pendidikan Islam terpadu untuk generasi yang bertakwa, berprestasi, dan berwawasan global.') ?></p></section>
<nav class="site-footer-nav" aria-label="Navigasi footer"><h2>Navigasi</h2><a href="<?= site_url('profil') ?>">Profil sekolah</a><a href="<?= site_url('program') ?>">Program unggulan</a><a href="<?= site_url('berita') ?>">Berita &amp; pengumuman</a><a href="<?= site_url('galeri') ?>">Galeri kegiatan</a><a href="<?= site_url('prestasi') ?>">Prestasi siswa</a><a href="<?= site_url('pps') ?>">PPS 2027/2028</a></nav>
<section class="site-footer-contact"><h2>Kontak Sekolah</h2>
<?php $schoolAddress = trim((string) ($settings['address'] ?? $profile['address'] ?? '')); ?>
<?php $contactPhone = (string) ($settings['phone'] ?? $profile['phone'] ?? ''); $schoolPhone = preg_replace('/[^0-9+]/', '', $contactPhone); ?>
<?php $schoolEmail = trim((string) ($settings['email'] ?? $profile['email'] ?? '')); ?>
<?php if ($schoolAddress !== ''): ?>
<p><a href="https://www.google.com/maps/search/?api=1&amp;query=<?= rawurlencode($schoolAddress) ?>" target="_blank" rel="noopener noreferrer"><?= nl2br(esc($schoolAddress)) ?></a></p>
<?php endif; ?>
<?php if ($schoolPhone !== ''): ?>
<p><a href="https://wa.me/<?= esc(ltrim($schoolPhone, '+'), 'attr') ?>" target="_blank" rel="noopener noreferrer">WhatsApp: <?= esc($contactPhone) ?></a></p>
<?php endif; ?>
<?php if ($schoolEmail !== ''): ?>
<p><a href="mailto:<?= esc($schoolEmail, 'attr') ?>">Email: <?= esc($schoolEmail) ?></a></p>
<?php endif; ?>
<a class="site-footer-cta" href="<?= site_url('pps') ?>">Informasi PPS</a></section>
</div><div class="site-footer-bottom"><span>© <?= date('Y') ?> SMPIT Al Firdaus Purwodadi. Hak cipta dilindungi.</span><span>Ilmu · Akhlak · Prestasi</span></div></div></footer>

<script>
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.12 });

    document.querySelectorAll('.reveal').forEach((element) => {
        observer.observe(element);
    });
</script>
</body>
</html>
