<?php
$title = 'Formulir Evaluasi Infrastruktur';

ob_start();
?>

<div class="space-y-6">
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-4">
        <h5 class="mb-2 text-xl font-semibold tracking-tight text-gray-900 dark:text-white flex items-center gap-2">
            <i class="fas fa-info-circle text-2xl"></i>
            Informasi Infrastruktur
        </h5>
        <hr class="text-gray-500">
        <div class="grid md:grid-cols-2 gap-4">
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
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-4">
        <table class="block border-collapse border w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="hidden text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">No</th>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">Indikator</th>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">Kriteria Penilaian</th>
                    <th class="border dark:border-gray-700 px-6 py-3" colspan="2">Acuan</th>
                    <th class="border dark:border-gray-700 px-6 py-3" colspan="2">Hasil Evaluasi</th>
                    <th class="border dark:border-gray-700 px-6 py-3" colspan="2">Skor Penilaian</th>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">Nilai Akhir</th>
                </tr>
                <tr>
                    <th class="border dark:border-gray-700 px-6 py-3">Bobot (%)</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Nilai</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Nilai</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Bobot</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Total Bobot</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <tr class="font-semibold">
                    <td class="border dark:border-gray-700 px-6 py-3">a</td>
                    <td class="border dark:border-gray-700 px-6 py-3" colspan="8">Struktur (40%)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">(Nilai Sub)</td>
                </tr>
                <tr>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">1</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Kondisi Struktur Bawah (Fondasi)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">Tidak ada penurunan/retak, fondasi stabil.</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">30</td>
                    <td class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">
                        <select id="dropdown1" class="w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Bobot Eval</td>
                    <td rowspan="12" class="border dark:border-gray-700 px-6 py-3">Total Bobot</td>
                    <td rowspan="12" class="border dark:border-gray-700 px-6 py-3">Kategori</td>
                    <td rowspan="12" class="border dark:border-gray-700 px-6 py-3">Nilai Akhir</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Ada retakan kecil/penurunan sebagian namun masih aman digunakan.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">2</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Retak besar, penurunan signifikan, tidak mampu menahan beban.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">1</td>
                </tr>
                <tr>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">2</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Kondisi Struktur Atas (Kolom, Sloof, Balok, Pelat Lantai)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">Tidak retak besar, tidak miring, tidak ada deformasi.</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">30</td>
                    <td class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">
                        <select id="dropdown2" class="w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Bobot Eval</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Ada kerusakan ringan/sedang, tapi struktur masih berdiri.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">2</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Retak berat, deformasi signifikan, atau roboh.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">1</td>
                </tr>
                <tr>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Kondisi Rangka Atap (Rangka, Gording)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">Tidak melengkung, kokoh, tidak terlepas.</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">30</td>
                    <td class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">
                        <select id="dropdown1" class="w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Bobot Eval</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Ada kelengkungan ringan, baut/koneksi melemah, masih berfungsi sebagian.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">2</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Rangka goyah, roboh, atau terlepas dari struktur utama.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">1</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col gap-4">
        <table class="border-collapse border w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                <tr>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">No</th>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">Indikator</th>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">Kriteria Penilaian</th>
                    <th class="border dark:border-gray-700 px-6 py-3" colspan="2">Acuan</th>
                    <th class="border dark:border-gray-700 px-6 py-3" colspan="2">Hasil Evaluasi</th>
                    <th class="border dark:border-gray-700 px-6 py-3" colspan="2">Skor Penilaian</th>
                    <th class="border dark:border-gray-700 px-6 py-3" rowspan="2">Nilai Akhir</th>
                </tr>
                <tr>
                    <th class="border dark:border-gray-700 px-6 py-3">Bobot (%)</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Nilai</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Nilai</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Bobot</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Total Bobot</th>
                    <th class="border dark:border-gray-700 px-6 py-3">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <tr class="font-semibold">
                    <td class="border dark:border-gray-700 px-6 py-3">a</td>
                    <td colspan="8" class="border dark:border-gray-700 px-6 py-3">Struktur (40%)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">(Nilai Sub)</td>
                </tr>
                <tr>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">1</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Kondisi Struktur Bawah (Fondasi)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">Tidak ada penurunan/retak, fondasi stabil.</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">30</td>
                    <td class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">
                        <select id="dropdown1" class="w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Bobot Eval</td>
                    <td rowspan="12" class="border dark:border-gray-700 px-6 py-3">Total Bobot</td>
                    <td rowspan="12" class="border dark:border-gray-700 px-6 py-3">Kategori</td>
                    <td rowspan="12" class="border dark:border-gray-700 px-6 py-3">Nilai Akhir</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Ada retakan kecil/penurunan sebagian namun masih aman digunakan.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">2</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Retak besar, penurunan signifikan, tidak mampu menahan beban.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">1</td>
                </tr>
                <tr>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">2</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Kondisi Struktur Atas (Kolom, Sloof, Balok, Pelat Lantai)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">Tidak retak besar, tidak miring, tidak ada deformasi.</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">30</td>
                    <td class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">
                        <select id="dropdown2" class="w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Bobot Eval</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Ada kerusakan ringan/sedang, tapi struktur masih berdiri.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">2</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Retak berat, deformasi signifikan, atau roboh.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">1</td>
                </tr>
                <tr>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Kondisi Rangka Atap (Rangka, Gording)</td>
                    <td class="border dark:border-gray-700 px-6 py-3">Tidak melengkung, kokoh, tidak terlepas.</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">30</td>
                    <td class="border dark:border-gray-700 px-6 py-3">3</td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">
                        <select id="dropdown1" class="w-max bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Pilih</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </td>
                    <td rowspan="3" class="border dark:border-gray-700 px-6 py-3">Bobot Eval</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Ada kelengkungan ringan, baut/koneksi melemah, masih berfungsi sebagian.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">2</td>
                </tr>
                <tr>
                    <td class="border dark:border-gray-700 px-6 py-3">Rangka goyah, roboh, atau terlepas dari struktur utama.</td>
                    <td class="border dark:border-gray-700 px-6 py-3">1</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
