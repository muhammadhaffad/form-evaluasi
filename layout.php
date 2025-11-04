<?php
function vite($asset)
{
    $prod = true;
    if (!$prod) {
        // Saat development
        return "http://localhost:5173/$asset";
    } else {
        // Saat production (hasil build)
        $manifest = json_decode(file_get_contents('public/.vite/manifest.json'), true);
        return "public/{$manifest[$asset]['file']}";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Formulir Evaluasi Infrastruktur' ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="<?= vite('resources/css/app.css') ?>">
    <script src="<?= vite('resources/js/app.js') ?>"></script>
</head>

<body class="bg-gray-100">
    <main class="max-w-[1400px] overflow-hidden w-full mx-auto p-5 space-y-4">
        <header>
            <div class="rounded-2xl p-8 bg-gradient-to-r from-blue-700 to-blue-900 flex flex-col md:flex-row  gap-4 items-center">
                <div class="bg-white/30 rounded-full h-20 w-20 flex items-center justify-center">
                    <i class="fas fa-<?= $icon ?> text-4xl text-white"></i>
                </div>
                <div class="flex flex-col gap-4 text-center md:text-start">
                    <h1 class="text-white text-4xl font-bold"><?= $title ?></h1>
                    <p class="description text-white text-lg"><?= $subtitle ?></p>
                </div>
            </div>
        </header>
        <nav>
            <div class="p-2 shadow-lg rounded-lg grid grid-cols-1 md:grid-cols-3 gap-2 bg-white">
                <button type="button" class="<?= $active == 'index' ? 'flex items-center gap-2 justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5' ?>" onclick="window.location.href='index.php'">
                    <i class="fas fa-clipboard-check"></i>
                    <span>Formulir Evaluasi</span>
                </button>
                <button type="button" class="<?= $active == 'hasil' ? 'flex items-center gap-2 justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5' ?>" onclick="window.location.href='hasil.php'">
                    <i class="fas fa-chart-bar"></i>
                    <span>Hasil Evaluasi</span>
                </button>
                <button type="button" class="<?= $active == 'tutorial' ? 'flex items-center gap-2 justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 focus:outline-none' : 'text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5' ?>" onclick="window.location.href='tutorial.php'">
                    <i class="fas fa-list-ol"></i>
                    <span>Cara Pengisian</span>
                </button>
            </div>
        </nav>
        <section>
            <?= $content ?>
        </section>
    </main>
</body>

</html>