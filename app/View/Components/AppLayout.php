<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Fitness Tracker</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, #eef2f3, #8e9eab);
            min-height: 100vh;
        }

        /* HEADER */
        header {
            background: #2c3e50;
            color: white;
            padding: 16px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h2 {
            margin: 0;
            letter-spacing: 1px;
        }

        nav a {
            color: white;
            text-decoration: none;
            margin-left: 18px;
            font-weight: bold;
            transition: 0.3s;
        }

        nav a:hover {
            color: #1abc9c;
        }

        /* MAIN CONTENT AREA */
        main {
            max-width: 1000px;
            margin: 40px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }

        main h1 {
            margin-bottom: 15px;
            color: #2c3e50;
        }

        /* INFO BOX */
        .info-box {
            background: #1abc9c;
            padding: 15px;
            color: white;
            border-radius: 10px;
            margin: 15px 0;
        }

        /* BUTTON */
        .btn {
            display: inline-block;
            background: #2c3e50;
            color: white;
            padding: 10px 18px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover{
            background: #1abc9c;
        }

        /* FOOTER */
        footer {
            background: #2c3e50;
            color:white;
            text-align:center;
            padding: 12px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<header>
    <h2>FITNESS TRACKER</h2>

    <nav>
        <a href="/">Ana Sayfa</a>
        <a href="/programlar">Programlar</a>
        <a href="/beslenme">Beslenme</a>
        <a href="/iletisim">İletişim</a>
    </nav>
</header>

<main>

    <!-- DYNAMIC CONTENT -->
    {{ $slot }}

    <!-- SAMPLE UI BLOCK -->
    <div class="info-box">
        🏋️‍♀️  Günlük antrenman programını buradan takip edebilirsin.
    </div>

    <a href="#" class="btn">
        Programımı Gör
    </a>

</main>

<footer>
    2025 © Fitness Tracker | Tüm Hakları Saklıdır
</footer>

</body>
</html>


