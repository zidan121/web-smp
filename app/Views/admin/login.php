<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin | SMPIT Al Firdaus</title>
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #eef2f8;
            color: #172b4d;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
            padding: 32px;
            border-radius: 18px;
            background: white;
            box-shadow: 0 15px 45px #14294a18;
        }
        h1 { margin-top: 0; font-size: 24px; }
        p { color: #64748b; line-height: 1.6; }
        label { display: block; margin: 18px 0 8px; }
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            font-size: 16px;
        }
        button {
            width: 100%;
            margin-top: 24px;
            padding: 13px;
            border: 0;
            border-radius: 8px;
            background: #142d52;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .message {
            margin: 12px 0;
            padding: 12px;
            border-radius: 8px;
            background: #fff0f0;
            color: #a11;
        }
        .success {
            background: #eaf8ee;
            color: #176534;
        }
    </style>
</head>
<body>
    <main class="login-card">
        <h1>Login Admin</h1>
        <p>Panel pengelolaan website SMPIT Al Firdaus Purwodadi.</p>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="message">
                <?= esc(session()->getFlashdata('error')) ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="message success">
                <?= esc(session()->getFlashdata('success')) ?>
            </div>
        <?php endif; ?>

        <form action="<?= site_url('admin/login') ?>" method="post">
            <?= csrf_field() ?>

            <label for="username">Username</label>
            <input
                id="username"
                name="username"
                type="text"
                maxlength="100"
                autocomplete="username"
                value="<?= esc(old('username') ?? '') ?>"
                required
            >

            <label for="password">Password</label>
            <input
                id="password"
                name="password"
                type="password"
                autocomplete="current-password"
                required
            >

            <button type="submit">Masuk ke Dashboard</button>
        </form>
    </main>
</body>
</html>