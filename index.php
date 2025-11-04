<?php
require_once 'db.php';
$title = 'Formulir Evaluasi Infrastruktur';
$subtitle = 'Sistem Evaluasi Keberfungsian Kawasan Strategis Terbangun Jawa Timur';
$active = 'index';
$icon = 'clipboard-check';
// Data Struktur (Data Dummy)
$datas = [];

// ambil semua data
$sections = $conn->query('SELECT * FROM section')->fetchAll(PDO::FETCH_ASSOC);
$sectionSubs = $conn->query('SELECT * FROM section_sub')->fetchAll(PDO::FETCH_ASSOC);
$indikators = $conn->query('SELECT * FROM indikator')->fetchAll(PDO::FETCH_ASSOC);
$indikatorKriterias = $conn->query('SELECT * FROM indikator_kriteria')->fetchAll(PDO::FETCH_ASSOC);

foreach ($sections as $section) {
    $sectionItem = [
        'section_id' => $section['id'],
        'section_nama' => $section['section_nama'],
        'section_kategori_decision' => $section['section_kategori_decision'],
        'section_skor' => 0,
        'section_skor_kategori' => '',
        'section_info' => $section['info'],
        'section_sub' => []
    ];

    foreach ($sectionSubs as $sectionSub) {
        if ($sectionSub['section_id'] == $section['id']) {
            $sectionSubItem = [
                'section_sub_id' => $sectionSub['id'],
                'section_sub_nama' => $sectionSub['section_sub_nama'],
                'section_sub_bobot' => $sectionSub['section_sub_bobot'],
                'section_sub_kategori_decision' => $sectionSub['section_sub_kategori_decision'],
                'section_sub_skor' => 0,
                'section_sub_skor_result' => 0,
                'section_sub_skor_kategori' => '',
                'indikator' => []
            ];

            foreach ($indikators as $indikator) {
                if ($indikator['section_sub_id'] == $sectionSub['id']) {
                    $indikatorItem = [
                        'indikator_id' => $indikator['id'],
                        'indikator_nama' => $indikator['indikator_nama'],
                        'indikator_bobot' => $indikator['indikator_bobot'],
                        'indikator_skor' => 0,
                        'indikator_nilai' => 0,
                        'indikator_kriteria' => []
                    ];

                    foreach ($indikatorKriterias as $indikatorKriteria) {
                        if ($indikatorKriteria['indikator_id'] == $indikator['id']) {
                            $indikatorKriteriaItem = [
                                'indikator_kriteria_id' => $indikatorKriteria['id'],
                                'nilai' => $indikatorKriteria['nilai'],
                                'id' => $indikatorKriteria['id'],
                                'nama' => $indikatorKriteria['kriteria_nama']
                            ];

                            $indikatorItem['indikator_kriteria'][] = $indikatorKriteriaItem;
                        }
                    }

                    $sectionSubItem['indikator'][] = $indikatorItem;
                }
            }

            $sectionItem['section_sub'][] = $sectionSubItem;
        }
    }

    $datas[] = $sectionItem;
}

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
<div id="data" class="hidden">
    <?= json_encode($datas, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>
</div>
<form method="post" onsubmit="handleSubmit(event)">
    <div class="space-y-6">
        <div id="infrastructure-card" class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-500 flex flex-col gap-4">
            <div class="flex items-center justify-between">
                <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white flex items-center gap-2">
                    <i class="fas fa-info-circle text-2xl"></i>
                    Informasi Infrastruktur
                </h5>
                <button id="toggle-card" type="button" class=" text-sm text-blue-600 hover:underline">
                    Sembunyikan
                </button>
            </div>
            <hr class="text-gray-500">
            <div id="card-content" class="grid md:grid-cols-2 gap-4 transition-all duration-300">
                <div>
                    <label for="nama_infra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <i class="fas fa-building"></i>
                        Nama Infrastruktur
                    </label>
                    <input type="text" id="nama_infra" name="nama_infra" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div>
                    <label for="lokasi_infra" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <i class="fas fa-map-marker-alt"></i>
                        Lokasi Infrastruktur
                    </label>
                    <input type="text" id="lokasi_infra" name="lokasi_infra" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                </div>
                <div>
                    <label for="nilai_kontrak" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        <i class="fas fa-money-bill-wave"></i>
                        Nilai Kontrak
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 top-0 flex items-center ps-3.5 pointer-events-none">
                            <span class="text-gray-500 dark:text-gray-400 text-sm">Rp</span>
                        </div>
                        <input type="number" id="nilai_kontrak" name="nilai_kontrak" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                </div>
                <div class="flex gap-4 w-full">
                    <div class="w-1/2">
                        <label for="tahun_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-calendar-alt"></i>
                            Mulai Kontrak
                        </label>
                        <input min="2020-01-01" max="2024-12-31" type="date" id="tahun_mulai" name="tahun_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    <div class="w-1/2">
                        <label for="tahun_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            <i class="fas fa-calendar-check"></i>
                            Selesai Kontrak
                        </label>
                        <input min="2020-01-01" max="2024-12-31" type="date" id="tahun_selesai" name="tahun_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                </div>
            </div>
        </div>
        <div class="max-h-screen overflow-auto bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-500 flex flex-col gap-4">
            <table class="border border-collapse w-full text-sm text-left rtl:text-right dark:text-gray-400">
                <thead class="sticky top-0 z-20 hidden md:table-header-group text-xs [&_th]:uppercase [&_th]:text-white md:[&_th]:outline-[1px] [&_th]:outline-blue-900 [&_th]:dark:outline-gray-500 bg-blue-700 dark:bg-gray-700 dark:text-gray-200">
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
                        <tr class="bg-blue-700/80 dark:bg-gray-700/80 text-white md:[&_td]:border [&_td]:border-blue-900 [&_td]:dark:border-gray-500">
                            <td colspan="9" class="block md:table-cell px-6 py-3 uppercase font-bold">
                                <div data-section-id="<?= $section['section_id'] ?>" class="section-kategori-decision-<?= $section['section_id'] ?> hidden">
                                    <?= $section['section_kategori_decision'] ?>
                                </div>

                                <div class="flex gap-2 items-center">
                                    <span>
                                        <i class="fas fa-building"></i>
                                    </span>
                                    <span>
                                        <?= $section['section_nama']; ?>
                                    </span>
                                    <div class="relative group">
                                        <button data-popover-placement="bottom" data-popover-target="popover-<?= $section['section_id'] ?>" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm h-6 w-6 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            <i class="fas fa-info"></i>
                                        </button>
                                        <div id="popover-<?= $section['section_id'] ?>" role="tooltip" class="absolute shadow-lg opacity-0 mt-1 invisible group-hover:opacity-100 group-hover:visible transition duration-200 z-10 top-6 w-xs text-sm text-gray-500 bg-white border border-gray-200 rounded-lg dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                                            <div class="px-3 py-2 bg-gray-100 border-b border-gray-200 rounded-t-lg dark:border-gray-600 dark:bg-gray-700">
                                                <h3 class="font-semibold text-gray-900 dark:text-white"><?= $section['section_nama']; ?></h3>
                                            </div>
                                            <div class="px-3 py-2 max-h-60 overflow-auto normal-case dark:[&_div]:text-white! [&_div]:font-normal">
                                                <?= $section['section_info']; ?>
                                            </div>
                                        </div>
                                    </div>
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
                            <tr class="font-semibold [&_td]:bg-blue-700/60 dark:[&_td]:bg-gray-700/60 text-white md:[&_td]:border [&_td]:border-blue-900 [&_td]:dark:border-gray-500">
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
                                    <td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="hidden md:table-cell md:border dark:border-gray-500 px-6 py-3"><?= $key + 1; ?></td>
                                    <td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="block md:table-cell border-y border-y-gray-200 md:border-y-inherit md:border dark:border-gray-500 px-6 py-3">
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
                                        <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" data-indikator-kriteria-id="<?= $value_kriteria['id'] ?>" class="block kriteria-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?>-<?= $value_kriteria['id'] ?> <?= ($key_kriteria == 0) ? 'md:table-cell' : 'md:hidden' ?> md:border dark:border-gray-500 px-6 py-3">
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
                                    <td rowspan="<?= count($sub['indikator_kriteria']) ?>" data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" class="hidden indikator-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?> md:table-cell md:border dark:border-gray-500 px-6 py-3"><?= $sub['indikator_bobot'] ?></td>
                                    <td class="hidden md:table-cell md:border dark:border-gray-500 px-6 py-3"><?= $sub['indikator_kriteria'][0]['nilai'] ?></td>
                                    <td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="block md:table-cell md:border dark:border-gray-500 px-6 py-3">
                                        <select required data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" id="input-nilai-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?>" class="w-full md:w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" onchange="handleSelectChage(event)">
                                            <option value="">Pilih</option>
                                            <?php foreach ($sub['indikator_kriteria'] as $key_option => $value_option): ?>
                                                <option value="<?= $value_option['id'] ?>"><?= $value_option['nilai'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </td>
                                    <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) ?>" data-label="Bobot Evaluasi: " class="indikator-bobot-eval-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?> block md:table-cell md:border border-t border-t-gray-200 dark:border-gray-500 px-6 py-3 before:content-[attr(data-label)] before:me-2 before:font-semibold before:dark:text-gray-200 before:inline-block md:before:hidden before:mb-1">-</td>
                                    <?php if ($key == 0): ?>
                                        <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-total-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell md:border dark:border-gray-500 px-6 py-3">-</td>
                                        <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-kategori-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> uppercase hidden md:table-cell md:border dark:border-gray-500 px-6 py-3">-</td>
                                        <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell md:border dark:border-gray-500 px-6 py-3">-</td>
                                    <?php endif; ?>
                                </tr>
                                <?php foreach ($sub['indikator_kriteria'] as $key => $value): ?>
                                    <!-- Indikator Kriteria -->
                                    <?php if ($key == 0) continue; ?>
                                    <tr class="hidden md:table-row">
                                        <td class="md:border dark:border-gray-500 px-6 py-3"><?= $value['nama'] ?></td>
                                        <td class="md:border dark:border-gray-500 px-6 py-3"><?= $value['nilai'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                            <tr class="md:hidden">
                                <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-total-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> bg-gray-700/10 dark:bg-gray-700/20 block md:border dark:border-gray-500 px-6 py-3 before:content-[attr(data-label)] before:me-2 before:font-semibold dark:before:text-gray-200 before:inline-block md:before:hidden before:mb-1" data-label="Total Bobot: ">-</td>
                                <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-kategori-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> uppercase bg-gray-700/10 dark:bg-gray-700/20 block md:border dark:border-gray-500 px-6 py-3 before:content-[attr(data-label)] before:me-2 before:font-semibold dark:before:text-gray-200 before:inline-block before:normal-case md:before:hidden before:mb-1" data-label="Kategori: ">-</td>
                                <td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> bg-gray-700/10 dark:bg-gray-700/20 block md:border dark:border-gray-500 px-6 py-3 before:content-[attr(data-label)] before:me-2 before:font-semibold dark:before:text-gray-200 before:inline-block md:before:hidden before:mb-1" data-label="Nilai Akhir: ">-</td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td class="bg-gray-700/20 dark:bg-gray-700/40 block md:border dark:border-gray-500 md:hidden px-6 py-3 nilai-section">
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
        <div class="w-full flex justify-end">
            <button type="submit" class="flex items-center justify-center gap-2 w-full md:w-max uppercase text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <i class="fas fa-paper-plane"></i>Submit Evaluasi</button>
        </div>
    </div>
</form>

<script>
    const data = JSON.parse(document.getElementById('data').textContent);
    console.log(data);

    function handleSelectChage(e) {
        const sectionId = e.target.getAttribute('data-section-id');
        const sectionSubId = e.target.getAttribute('data-section-sub-id');
        const indikatorId = e.target.getAttribute('data-indikator-id');
        const nilai = data
            .find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .indikator.find(d => d.indikator_id == indikatorId)
            .indikator_kriteria.find(d => d.id == e.target.value).nilai;
        const kriteriaList = data
            .find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .indikator.find(d => d.indikator_id == indikatorId)
            .indikator_kriteria;

        /* Hitung Skor Indikator */
        const skorIndikator = data
            .find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .indikator.find(d => d.indikator_id == indikatorId)
            .indikator_bobot;

        const evalSkorIndikator = (parseInt(nilai) - 1) / (kriteriaList.length - 1) * 100 / 100 * skorIndikator;

        document.querySelectorAll(`.indikator-bobot-eval-${sectionId}-${sectionSubId}-${indikatorId}`).forEach(el => el.textContent = evalSkorIndikator.toFixed(2));
        data.find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .indikator.find(d => d.indikator_id == indikatorId)
            .indikator_skor = evalSkorIndikator;
        data.find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .indikator.find(d => d.indikator_id == indikatorId)
            .indikator_nilai = nilai;

        /* Hitung Total Skor Sub Section */
        const totalSkorIndikator = data.find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .indikator.map(d => d.indikator_skor).reduce((a, b) => a + b, 0);

        document.querySelectorAll(`.section-sub-total-bobot-${sectionId}-${sectionSubId}`).forEach(el => el.textContent = totalSkorIndikator.toFixed(2));
        data.find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .section_sub_skor = totalSkorIndikator;

        const nilaiSubSection = data.find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .indikator.map(d => ({
                nilai: d.indikator_nilai,
                id: d.indikator_id
            }));

        const kategoriDecision = document.querySelector(`.section-sub-kategori-decision-${sectionId}-${sectionSubId}`).textContent;
        const fn1 = new Function('x', 'nilai_arr', kategoriDecision);
        const [kategoriSectionSub, nilaiKategoriSectionSub] = fn1(totalSkorIndikator, nilaiSubSection);
        document.querySelectorAll(`.section-sub-kategori-${sectionId}-${sectionSubId}`).forEach(el => el.textContent = kategoriSectionSub);
        document.querySelectorAll(`.section-sub-result-${sectionId}-${sectionSubId}`).forEach(el => el.textContent = nilaiKategoriSectionSub);
        data.find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .section_sub_skor_result = nilaiKategoriSectionSub;
        data.find(d => d.section_id == sectionId)
            .section_sub.find(d => d.section_sub_id == sectionSubId)
            .section_sub_skor_kategori = kategoriSectionSub;

        /* Hitung skor section */
        const nilaiSubSectionList = data.find(d => d.section_id == sectionId)
            .section_sub.map(d => d.section_sub_skor_result);
        const totalNilaiSection = nilaiSubSectionList.reduce((a, b) => a + b, 0) / nilaiSubSectionList.length;
        document.querySelectorAll(`.section-result-${sectionId}`).forEach(el => el.textContent = totalNilaiSection.toFixed(2));
        data.find(d => d.section_id == sectionId)
            .section_skor = totalNilaiSection;
        const sectionKategoriDecision = document.querySelector(`.section-kategori-decision-${sectionId}`).textContent;
        const fn2 = new Function('x', sectionKategoriDecision);
        const sectionKategori = fn2(totalNilaiSection);
        document.querySelectorAll(`.section-result-kategori-${sectionId}`).forEach(el => el.textContent = sectionKategori);
        data.find(d => d.section_id == sectionId)
            .section_skor_kategori = sectionKategori;
    }

    function handleSubmit(e) {
        e.preventDefault();
        const formData = Object.fromEntries(new FormData(e.target));
        formData.evaluasi = data;
        fetch('store.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(formData),
            })
            .then(response => response.json())
            .then(data => {
                if (data.status == 'success') {
                    alert('Data berhasil disimpan');
                    window.location.reload();
                }
            })
            .catch((error) => {
                alert('Data gagal disimpan');
                console.error('Error:', error);
            });
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
