<?php
require_once 'db.php';
require_once 'utils.php';

$title = 'Hasil Evaluasi Infrastruktur';
$subtitle = 'Analisis dan Ringkasan Data Evaluasi Infrastruktur Jawa Timur';
$active = 'hasil';
$icon = 'chart-line';

$stmt = $conn->prepare('select * from infrastruktur');
$stmt->execute();
$infrastruktur = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query('select count(*) as total from infrastruktur');
$infrastrukturCount = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt = $conn->query('select distinct count(lokasi_infra) as total from infrastruktur');
$infrastrukturLokasiCount = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt = $conn->query('select sum(nilai_kontrak) as total from infrastruktur');
$infrastrukturNilaiKontrakCount = $stmt->fetch(PDO::FETCH_ASSOC);
ob_start();
?>
<div id="detail-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-6xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow-sm">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200">
                <h3 class="text-xl font-semibold text-gray-900">
                    Detail Infrastruktur
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center" data-modal-hide="detail-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div id="modal-content" class="p-4 md:p-5 space-y-4">
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b">
                <button data-modal-hide="detail-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="space-y-6">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white border-l-4 border-l-blue-500! border border-gray-200 rounded-lg shadow-sm flex flex-col items-center gap-4 p-4">
            <i class="fas fa-building text-blue-500 text-4xl"></i>
            <p class= text-4xl font-bold"><?= $infrastrukturCount['total'] ?></p>
            <h3 class="font-semibold text-gray-900">
                Total Proyek
            </h3>
        </div>
        <div class="bg-white border-l-4 border-l-blue-500! border border-gray-200 rounded-lg shadow-sm flex flex-col items-center gap-4 p-4">
            <i class="fas fa-map-marker-alt text-blue-500 text-4xl"></i>
            <p class= text-4xl font-bold"><?= $infrastrukturLokasiCount['total'] ?></p>
            <h3 class="font-semibold text-gray-900">
                Lokasi
            </h3>
        </div>
        <div class="bg-white border-l-4 border-l-blue-500! border border-gray-200 rounded-lg shadow-sm flex flex-col items-center gap-4 p-4">
            <i class="fas fa-money-bill text-blue-500 text-4xl"></i>
            <p class= text-4xl font-bold">Rp<?= formatRupiahSingkat($infrastrukturNilaiKontrakCount['total'] ?? 0, 0, ',', '.') ?></p>
            <h3 class="font-semibold text-gray-900">
                Total Nilai Kontrak
            </h3>
        </div>
    </div>
    <div class="overflow-auto bg-white border border-gray-200 rounded-lg shadow-sm flex flex-col gap-4">
        <table class="border border-collapse w-full text-sm text-left rtl:text-right">
            <thead class="text-xs [&_th]:uppercase [&_th]:text-white md:[&_th]:border [&_th]:border-blue-900 [&_th] bg-blue-700">
                <tr>
                    <th class="px-6 py-3">Nama Infrastruktur</th>
                    <th class="px-6 py-3">Lokasi</th>
                    <th class="px-6 py-3">Tahun Mulai</th>
                    <th class="px-6 py-3">Tahun Selesai</th>
                    <th class="px-6 py-3">Nilai Kontrak</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($infrastruktur as $infrastruktur): ?>
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4"><?= $infrastruktur['nama_infra'] ?></td>
                        <td class="px-6 py-4"><?= $infrastruktur['lokasi_infra'] ?></td>
                        <td class="px-6 py-4"><?= date('d F Y', strtotime($infrastruktur['tahun_mulai'])) ?></td>
                        <td class="px-6 py-4"><?= date('d F Y', strtotime($infrastruktur['tahun_selesai'])) ?></td>
                        <td class="px-6 py-4">Rp<?= formatRupiahSingkat($infrastruktur['nilai_kontrak'], 0, ',', '.') ?></td>
                        <td class="px-6 py-4">
                            <div class="flex gap-1">
                                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm justify-center items-center text-center inline-flex aspect-square w-8 h-8" onclick="showModal(<?= $infrastruktur['id'] ?>)" title="Lihat Detail" data-modal-target="detail-modal" data-modal-toggle="detail-modal">
                                    <i class="fas fa-eye"></i>
                                </button>
                                <button class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm aspect-square w-8 h-8" onclick="confirmDelete(<?= $infrastruktur['id'] ?>)" title="Hapus Data">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    async function showModal(id) {
        const response = await fetch('get_data.php?id=' + id);
        const data = await response.text();
        document.getElementById('modal-content').innerHTML = data;
    }
    function confirmDelete(id) {
        if (confirm('Yakin ingin menghapus data ini?')) {
            fetch('delete.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ id: id })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Data berhasil dihapus');
                        window.location.href = 'hasil.php';
                    } else {
                        alert('Gagal menghapus data: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menghapus data');
                });
        }
    }
</script>
<?php
$content = ob_get_clean();
include 'layout.php';
