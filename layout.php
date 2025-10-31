<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Formulir Evaluasi Infrastruktur' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="./dist/style.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <main class="max-w-[1400px] w-full mx-auto p-5 space-y-4">
        <header>
            <div class="rounded-2xl p-8 bg-gradient-to-r from-blue-700 to-blue-900 flex gap-4 items-center">
                <div class="bg-white/30 rounded-full h-20 w-20 flex items-center justify-center">
                    <i class="fas fa-clipboard-check text-4xl text-white"></i>
                </div>
                <div class="flex flex-col gap-4">
                    <h1 class="text-white text-4xl font-bold">Formulir Evaluasi Infrastruktur</h1>
                    <p class="description text-white text-lg">Sistem Evaluasi Keberfungsian Kawasan Strategis Terbangun Jawa Timur</p>
                </div>
            </div>
        </header>
        <nav>
            <div class="p-2 shadow-lg rounded-lg flex gap-2 bg-white">
                <button class="rounded-lg p-3 w-full bg-blue-800 hover:bg-blue-900 text-white font-bold flex items-center gap-2 justify-center" onclick="window.location.href='index.html'">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Formulir Evaluasi</span>
                </button>
                <button class="rounded-lg p-3 w-full hover:bg-blue-100 font-bold flex items-center gap-2 justify-center" onclick="window.location.href='hasil2.html'">
                    <i class="fas fa-chart-bar"></i>
                    <span>Hasil Evaluasi</span>
                </button>
            </div>
        </nav>
        <section>
            <?= $content ?>
        </section>
    </main>
</body>

</html>