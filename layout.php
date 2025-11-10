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
    <script type="module" src="<?= vite('resources/js/app.js') ?>"></script>
</head>

<body class="bg-gray-100">
    <main class="max-w-[1400px] overflow-hidden w-full mx-auto p-5 space-y-6">
        <header>
            <div class="relative rounded-2xl px-8 py-12 bg-gradient-to-r from-primary-700 to-primary-900 flex flex-col md:flex-row  gap-4 items-center">
                <div class="absolute w-56 h-56 rounded-full bg-white/20 top-0 right-0 -translate-y-1/3 translate-x-1/3"></div>
                <img src="logo-pu.jpg" alt="Logo" class="w-20 h-20">
                <div class="flex flex-col gap-4 text-center md:text-start">
                    <h1 class="text-white text-4xl font-bold"><?= $title ?></h1>
                    <p class="description text-white text-lg"><?= $subtitle ?></p>
                </div>
            </div>
        </header>
        <nav>
            <div class="p-2 shadow-lg rounded-lg grid grid-cols-1 md:grid-cols-3 gap-2 bg-white">
                <button type="button"
                    class="<?= $active == 'index'
                                ? 'flex items-center gap-3 justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-md px-6 py-3.5 focus:outline-none'
                                : 'relative overflow-hidden group transition-colors duration-500 flex items-center gap-3 justify-center text-gray-600 bg-white focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-6 py-3.5' ?>"
                    onclick="window.location.href='index.php'">

                    <!-- Shine effect -->
                    <span
                        class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-primary-700/10 to-transparent transition-all duration-500 group-hover:left-[100%]">
                    </span>
                    <i class="fas fa-clipboard-check"></i>
                    <span>Formulir Evaluasi</span>
                </button>
                <button type="button"
                    class="<?= $active == 'hasil'
                                ? 'flex items-center gap-3 justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-md px-6 py-3.5 focus:outline-none'
                                : 'relative overflow-hidden group transition-colors duration-500 flex items-center gap-3 justify-center text-gray-600 bg-white focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-6 py-3.5' ?>" onclick="window.location.href='hasil.php'">
                    <i class="fas fa-chart-bar"></i>
                    <span
                        class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-primary-700/10 to-transparent transition-all duration-500 group-hover:left-[100%]">
                    </span>
                    <span>Hasil Evaluasi</span>
                </button>
                <button type="button"
                    class="<?= $active == 'tutorial' ?
                                'flex items-center gap-3 justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-md px-6 py-3.5 focus:outline-none'
                                : 'relative overflow-hidden group transition-colors duration-500 flex items-center gap-3 justify-center text-gray-600 bg-white focus:outline-none hover:bg-gray-100 hover:text-primary-700 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-md px-6 py-3.5' ?>" onclick="window.location.href='tutorial.php'">
                    <i class="fas fa-list-ol"></i>
                    <span
                        class="absolute top-0 left-[-100%] w-full h-full bg-gradient-to-r from-transparent via-primary-700/10 to-transparent transition-all duration-500 group-hover:left-[100%]">
                    </span>
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