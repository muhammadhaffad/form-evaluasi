<?php
$title = 'Formulir Evaluasi Infrastruktur';
// Data Struktur (Data Dummy)
$datas = [
    [
        'section_id' => 1,
        'section_nama' => 'Kondisi Bangunan',
        'section_kategori_decision' => "return x > 93.5 ? '(Berfungsi)' : x > 33 ? '(Kurang Berfungsi)' : '(Tidak Berfungsi)'",
        'section_sub' => [
            [
                'section_sub_id' => 1,
                'section_sub_nama' => 'Struktur',
                'section_sub_bobot' => 40,
                'section_sub_kategori_decision' => "return x > 80 ? ['baik', 100] : x > 30 ? ['kurang baik', 50] : ['tidak baik', 0]",
                'indikator' => [
                    [
                        'indikator_id' => 1,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 1,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 2,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 3,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 2,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 4,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 5,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 6,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 3,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 7,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 8,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 9,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ]
                ]
            ],
            [
                'section_sub_id' => 2,
                'section_sub_nama' => 'Struktur',
                'section_sub_bobot' => 40,
                'section_sub_kategori_decision' => "return x > 80 ? ['baik', 100] : x > 40 ? ['kurang baik', 50] : ['tidak baik', 0]",
                'indikator' => [
                    [
                        'indikator_id' => 4,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 10,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 11,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 12,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 5,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 13,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 14,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 15,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 6,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 16,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 17,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 18,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ],
    [
        'section_id' => 2,
        'section_nama' => 'Kondisi Bangunan',
        'section_kategori_decision' => "return x > 93.5 ? '(Berfungsi)' : x > 33 ? '(Kurang Berfungsi)' : '(Tidak Berfungsi)'",
        'section_sub' => [
            [
                'section_sub_id' => 3,
                'section_sub_nama' => 'Struktur',
                'section_sub_bobot' => 40,
                'section_sub_kategori_decision' => "return x > 80 ? ['baik', 100] : x > 35 ? ['kurang baik', 50] : ['tidak baik', 0]",
                'indikator' => [
                    [
                        'indikator_id' => 7,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 19,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 20,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 21,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 8,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 22,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 23,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 24,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 9,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 25,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 26,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 27,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ]
                ]
            ],
            [
                'section_sub_id' => 4,
                'section_sub_nama' => 'Struktur',
                'section_sub_bobot' => 40,
                'section_sub_kategori_decision' => "return x > 80 ? ['baik', 100] : x > 60 ? ['kurang baik', 50] : ['tidak baik', 0]",
                'indikator' => [
                    [
                        'indikator_id' => 10,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 28,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 29,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 30,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 11,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 31,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 32,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 33,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ],
                    [
                        'indikator_id' => 12,
                        'indikator_nama' => 'Kondisi Struktur Bawah (Fondasi)',
                        'indikator_bobot' => 30,
                        'indikator_kriteria' => [
                            [
                                'id' => 34,
                                'nama' => 'Tidak ada penurunan/retak, fondasi stabil.',
                                'nilai' => 3
                            ],
                            [
                                'id' => 35,
                                'nama' => 'Ada retakan kecil/penurunan sebagian namun masih aman digunakan.',
                                'nilai' => 2
                            ],
                            [
                                'id' => 36,
                                'nama' => 'Retak besar, penurunan signifikan, tidak mampu menahan beban.',
                                'nilai' => 1
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];
ob_start();
?>
<style>
    #infrastructure-card.collapsed #card-content {
        max-height: 0;
        opacity: 0;
        overflow: hidden;
    }

    #infrastructure-card:not(.collapsed) #card-content {
        max-height: 1000px;
        /* arbitrary besar biar muat semua */
        opacity: 1;
    }
</style>

<div class="space-y-6">
    <div id="infrastructure-card" class="sticky top-6 p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-4">
        <div class="flex items-center justify-between">
            <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white flex items-center gap-2">
                <i class="fas fa-info-circle text-2xl"></i>
                Informasi Infrastruktur
            </h5>
            <button id="toggle-card" class=" text-sm text-blue-600 hover:underline">
                Sembunyikan
            </button>
        </div>
        <hr class="text-gray-500">
        <div id="card-content" class="grid md:grid-cols-2 gap-4 transition-all duration-300">
            <div>
                <label for="infrastructure_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <i class="fas fa-building"></i>
                    Nama Infrastruktur
                </label>
                <input type="text" id="infrastructure_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
            </div>
            <div>
                <label for="infrastructure_location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <i class="fas fa-map-marker-alt"></i>
                    Lokasi Infrastruktur
                </label>
                <input type="text" id="infrastructure_location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
            </div>
            <div>
                <label for="infrastructure_value" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    <i class="fas fa-money-bill-wave"></i>
                    Nilai Kontrak
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                        <span class="text-gray-500 dark:text-gray-400 text-sm">Rp</span>
                    </div>
                    <input type="text" id="infrastructure_value" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                </div>
            </div>
            <div class="flex gap-4 w-full">
                <div class="w-1/2">
                    <label for="infrastructure_start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <i class="fas fa-calendar-alt"></i>
                        Mulai Kontrak
                    </label>
                    <input min="2020-01-01" max="2024-12-31" type="date" id="infrastructure_start_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                </div>
                <div class="w-1/2">
                    <label for="infrastructure_end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <i class="fas fa-calendar-check"></i>
                        Selesai Kontrak
                    </label>
                    <input min="2020-01-01" max="2024-12-31" type="date" id="infrastructure_end_date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="John" required />
                </div>
            </div>
        </div>
    </div>
    <div class="overflow-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-4">
        <table class="border border-collapse w-full text-sm text-left rtl:text-right dark:text-gray-400">
            <thead class="hidden md:table-header-group text-xs [&_th]:uppercase [&_th]:text-white md:[&_th]:border [&_th]:border-blue-900 [&_th]:dark:border-gray-700 bg-blue-700 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th class="px-6 py-3" rowspan="2">No</th>
                    <th class="px-6 py-3" rowspan="2">Indikator</th>
                    <th class="px-6 py-3" rowspan="2">Kriteria Penilaian</th>
                    <th class="px-6 py-3" colspan="2">Acuan</th>
                    <th class="px-6 py-3" colspan="2">Hasil Evaluasi</th>
                    <th class="px-6 py-3" colspan="2">Skor Penilaian</th>
                    <th class="px-6 py-3" rowspan="2">Nilai Akhir</th>
                </tr>
                <tr>
                    <th class="px-6 py-3">Bobot (%)</th>
                    <th class="px-6 py-3">Nilai</th>
                    <th class="px-6 py-3">Nilai</th>
                    <th class="px-6 py-3">Bobot</th>
                    <th class="px-6 py-3">Total Bobot</th>
                    <th class="px-6 py-3">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datas as $section): ?>
                    <!-- Section -->
                    <tr class="bg-blue-700/80 dark:bg-gray-700/80 text-white md:[&_td]:border [&_td]:border-blue-900 [&_td]:dark:border-gray-700">
                        <td colspan="9" class="block md:table-cell px-6 py-3 uppercase font-bold">
                            <div data-section-id="<?= $section['section_id'] ?>" class="section-kategori-decision-<?= $section['section_id'] ?> hidden">
                                <?= $section['section_kategori_decision'] ?>
                            </div>

                            <div class="flex gap-2">
                                <span>
                                    <i class="fas fa-building"></i>
                                </span>
                                <span>
                                    <?= $section['section_nama']; ?>
                                </span>
                                <div class="flex gap-2 ml-auto">
                                    <span data-section-id="<?= $section['section_id'] ?>" class="section-result-<?= $section['section_id'] ?> block md:hidden nilai-section">-</span>
                                    <span data-section-id="<?= $section['section_id'] ?>" class="section-result-kategori-<?= $section['section_id'] ?> block md:hidden uppercase font-bold">(-)</span>
                                </div>

                            </div>
                        </td>
                        <td class="hidden md:table-cell px-6 py-3 nilai-section">
                            <span data-section-id="<?= $section['section_id'] ?>" class="section-result-<?= $section['section_id'] ?>">
                                -
                            </span>
                            <span data-section-id="<?= $section['section_id'] ?>" class="section-result-kategori-<?= $section['section_id'] ?> uppercase font-bold">(-)</span>
                        </td>
                    </tr>
                    <?php foreach ($section['section_sub'] as $data): ?>
                        <!-- Section Sub -->
                        <tr class="font-semibold [&_td]:bg-blue-700/60 dark:[&_td]:bg-gray-700/60 text-white md:[&_td]:border [&_td]:border-blue-900 [&_td]:dark:border-gray-700">
                            <td colspan="9" class="block md:table-cell px-6 py-3">
                                <div class="flex">
                                    <span>
                                        <?= $data['section_sub_nama']; ?> (<?= $data['section_sub_bobot']; ?>%)
                                    </span>
                                    <span data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> md:hidden ml-auto">
                                        -
                                    </span>
                                </div>
                                <div data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-kategori-decision-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden">
                                    <?= $data['section_sub_kategori_decision']; ?>
                                </div>
                            </td>
                            <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell px-6 py-3 nilai-sub">-</td>
                        </tr>
                        <?php foreach ($data['indikator'] as $key => $sub): ?>
                            <!-- Indikator -->
                            <tr>
                                <td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="hidden md:table-cell md:border dark:border-gray-700 px-6 py-3"><?= $key + 1; ?></td>
                                <td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="block md:table-cell border-y border-y-gray-200 md:border dark:border-gray-700 px-6 py-3">
                                    <div class="flex gap-2">
                                        <span class="md:hidden">
                                            <?= $key + 1; ?>.
                                        </span>
                                        <span>
                                            <?= $sub['indikator_nama'] ?>
                                        </span>
                                        <span data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" class="indikator-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?> md:hidden ml-auto">
                                            (<?= $sub['indikator_bobot'] ?>%)
                                        </span>
                                    </div>
                                </td>
                                <?php foreach ($sub['indikator_kriteria'] as $key_kriteria => $value_kriteria): ?>
                                    <!-- Indikator kriteria -->
                                    <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" data-indikator-kriteria-id="<?= $value_kriteria['id'] ?>" class="block kriteria-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?>-<?= $value_kriteria['id'] ?> <?= ($key_kriteria == 0) ? 'md:table-cell' : 'md:hidden' ?> md:border dark:border-gray-700 px-6 py-3">
                                        <div class="flex gap-2 items-center">
                                            <span class="md:hidden aspect-square w-8 h-8 flex items-center justify-center rounded-full bg-green-500 font-bold text-white">
                                                <?= $value_kriteria['nilai'] ?>
                                            </span>
                                            <span>
                                                <?= $value_kriteria['nama'] ?>
                                            </span>
                                        </div>
                                    </td>
                                <?php endforeach; ?>
                                <td rowspan="<?= count($sub['indikator_kriteria']) ?>" data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" class="hidden indikator-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?> md:table-cell md:border dark:border-gray-700 px-6 py-3"><?= $sub['indikator_bobot'] ?></td>
                                <td class="hidden md:table-cell md:border dark:border-gray-700 px-6 py-3"><?= $sub['indikator_kriteria'][0]['nilai'] ?></td>
                                <td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="block md:table-cell md:border dark:border-gray-700 px-6 py-3">
                                    <select data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" id="input-nilai-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?>" class="w-full md:w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="handleSelectChage(event)">
                                        <option selected>Pilih</option>
                                        <?php foreach ($sub['indikator_kriteria'] as $key_option => $value_option): ?>
                                            <option value="<?= $value_option['nilai'] ?>"><?= $value_option['nilai'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </td>
                                <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) ?>" class="indikator-bobot-eval-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?> block md:table-cell md:border border-t border-t-gray-200 dark:border-gray-700 px-6 py-3">-</td>
                                <?php if ($key == 0): ?>
                                    <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-total-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell md:border dark:border-gray-700 px-6 py-3">-</td>
                                    <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-kategori-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> uppercase hidden md:table-cell md:border dark:border-gray-700 px-6 py-3">-</td>
                                    <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell md:border dark:border-gray-700 px-6 py-3">-</td>
                                <?php endif; ?>
                            </tr>
                            <?php foreach ($sub['indikator_kriteria'] as $key => $value): ?>
                                <!-- Indikator Kriteria -->
                                <?php if ($key == 0) continue; ?>
                                <tr class="hidden md:table-row">
                                    <td class="md:border dark:border-gray-700 px-6 py-3"><?= $value['nama'] ?></td>
                                    <td class="md:border dark:border-gray-700 px-6 py-3"><?= $value['nilai'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                        <tr class="md:hidden">
                            <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-total-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> bg-gray-700/10 dark:bg-gray-700/20 block md:border dark:border-gray-700 px-6 py-3" data-label="Total Bobot">-</td>
                            <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-kategori-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> uppercase bg-gray-700/10 dark:bg-gray-700/20 block md:border dark:border-gray-700 px-6 py-3" data-label="Kategori">-</td>
                            <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> bg-gray-700/10 dark:bg-gray-700/20 block md:border dark:border-gray-700 px-6 py-3" data-label="Nilai Akhir">-</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="bg-gray-700/20 dark:bg-gray-700/40 block md:border dark:border-gray-700 md:hidden px-6 py-3 nilai-section">
                            <span data-section-id="<?= $section['section_id'] ?>" class="section-result-<?= $section['section_id'] ?>">
                                -
                            </span>
                            <span data-section-id="<?= $section['section_id'] ?>" class="section-result-kategori-<?= $section['section_id'] ?> uppercase font-bold">(-)</span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    function handleSelectChage(e) {
        const sectionId = e.target.getAttribute('data-section-id');
        const sectionSubId = e.target.getAttribute('data-section-sub-id');
        const indikatorId = e.target.getAttribute('data-indikator-id');
        const kriteriaList = [...document.querySelectorAll('[class]')].filter(el => [...el.classList].some(c => c.startsWith(`kriteria-${sectionId}-${sectionSubId}-${indikatorId}`)));

        /* Hitung Skor Indikator */
        const skorIndikator = parseFloat(document.querySelector(`.indikator-bobot-${sectionId}-${sectionSubId}-${indikatorId}`).textContent.replace(/\D/g, ''));
        const evalSkorIndikator = (parseInt(e.target.value) - 1) / (kriteriaList.length - 1) * 100 / 100 * skorIndikator;
        document.querySelectorAll(`.indikator-bobot-eval-${sectionId}-${sectionSubId}-${indikatorId}`).forEach(el => el.textContent = evalSkorIndikator.toFixed(2));

        /* Hitung Total Skor Sub Section */
        const totalSkorIndikator = [...document.querySelectorAll('[class]')].filter(el => [...el.classList].some(c => c.startsWith(`indikator-bobot-eval-${sectionId}-${sectionSubId}`))).map(el => parseFloat(el.textContent.replace('-', '0'))).reduce((a, b) => a + b, 0);
        document.querySelectorAll(`.section-sub-total-bobot-${sectionId}-${sectionSubId}`).forEach(el => el.textContent = totalSkorIndikator.toFixed(2));
        const kategoriDecision = document.querySelector(`.section-sub-kategori-decision-${sectionId}-${sectionSubId}`).textContent;
        const fn1 = new Function('x', kategoriDecision);
        const [kategoriSectionSub, nilaiKategoriSectionSub] = fn1(totalSkorIndikator);
        document.querySelectorAll(`.section-sub-kategori-${sectionId}-${sectionSubId}`).forEach(el => el.textContent = kategoriSectionSub);
        document.querySelectorAll(`.section-sub-result-${sectionId}-${sectionSubId}`).forEach(el => el.textContent = nilaiKategoriSectionSub);

        /* Hitung skor section */
        const nilaiSubSectionList = [...document.querySelectorAll(`span[class*="section-sub-result-${sectionId}"]`)];
        const totalNilaiSection = nilaiSubSectionList.map(el => parseFloat(el.textContent.replace('-', '0'))).reduce((a, b) => a + b, 0) / nilaiSubSectionList.length;
        document.querySelectorAll(`.section-result-${sectionId}`).forEach(el => el.textContent = totalNilaiSection.toFixed(2));
        const sectionKategoriDecision = document.querySelector(`.section-kategori-decision-${sectionId}`).textContent;
        const fn2 = new Function('x', sectionKategoriDecision);
        const sectionKategori = fn2(totalNilaiSection);
        document.querySelectorAll(`.section-result-kategori-${sectionId}`).forEach(el => el.textContent = sectionKategori);
    }


    const card = document.getElementById('infrastructure-card');
    const content = document.getElementById('card-content');
    const toggleBtn = document.getElementById('toggle-card');

    toggleBtn.addEventListener('click', () => {
        const collapsed = card.classList.toggle('collapsed');
        toggleBtn.textContent = collapsed ? 'Tampilkan' : 'Sembunyikan';
        isCollapsed = collapsed;
        userToggled = true;

        // reset flag biar auto-expand bisa aktif lagi nanti
        if (!collapsed) {
            setTimeout(() => (userToggled = false), 2000);
        }
    });
</script>
<?php
$content = ob_get_clean();
include 'layout.php';
