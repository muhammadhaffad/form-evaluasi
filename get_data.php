<?php
require_once 'db.php';
require_once 'utils.php';

$stmt = $conn->prepare('select * from infrastruktur where id = :infrastruktur_id');
$stmt->execute(['infrastruktur_id' => $_GET['id'] ?? 1]);
$infrastruktur = $stmt->fetch(PDO::FETCH_ASSOC);
$stmt = $conn->prepare('select * from infrastruktur_evaluasi where infrastruktur_id = :infrastruktur_id');
$stmt->execute(['infrastruktur_id' => $infrastruktur['id'] ?? 0]);
$infrastrukturEvaluasi = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query('select * from infrastruktur_evaluasi_sub');
$infrastrukturEvaluasiSub = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query('select * from infrastruktur_evaluasi_sub_indikator');
$infrastrukturEvaluasiSubIndikator = $stmt->fetchAll(PDO::FETCH_ASSOC);
$stmt = $conn->query('select * from infrastruktur_evaluasi_sub_indikator_kriteria');
$infrastrukturEvaluasiSubIndikatorKriteria = $stmt->fetchAll(PDO::FETCH_ASSOC);

$datas = [];
foreach ($infrastrukturEvaluasi as $section) {
	$sectionItem = [
		'section_id' => $section['id'],
		'section_nama' => $section['section_nama'],
		'section_kategori_decision' => $section['section_kategori_decision'],
		'section_skor' => $section['section_skor'],
		'section_skor_kategori' => $section['section_skor_kategori'],
		'section_sub' => []
	];

	foreach ($infrastrukturEvaluasiSub as $sectionSub) {
		if ($sectionSub['infrastruktur_evaluasi_id'] == $section['id']) {
			$sectionSubItem = [
				'section_sub_id' => $sectionSub['id'],
				'section_sub_nama' => $sectionSub['section_sub_nama'],
				'section_sub_bobot' => $sectionSub['section_sub_bobot'],
				'section_sub_kategori_decision' => $sectionSub['section_sub_kategori_decision'],
				'section_sub_skor' => $sectionSub['section_sub_skor'],
				'section_sub_skor_result' => $sectionSub['section_sub_skor_result'],
				'section_sub_skor_kategori' => $sectionSub['section_sub_skor_kategori'],
				'indikator' => []
			];

			foreach ($infrastrukturEvaluasiSubIndikator as $indikator) {
				if ($indikator['infrastruktur_evaluasi_sub_id'] == $sectionSub['id']) {
					$indikatorItem = [
						'indikator_id' => $indikator['id'],
						'indikator_nama' => $indikator['indikator_nama'],
						'indikator_bobot' => $indikator['indikator_bobot'],
						'indikator_skor' => $indikator['indikator_skor'],
						'indikator_nilai' => $indikator['indikator_nilai'],
						'indikator_kriteria' => []
					];

					foreach ($infrastrukturEvaluasiSubIndikatorKriteria as $indikatorKriteria) {
						if ($indikatorKriteria['infrastruktur_evaluasi_sub_indikator_id'] == $indikator['id']) {
							$indikatorKriteriaItem = [
								'nilai' => $indikatorKriteria['nilai'],
								'id' => $indikatorKriteria['id'],
								'nama' => $indikatorKriteria['indikator_kriteria_nama']
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
$infrastruktur['infrastruktur_skor'] = array_sum(array_column($infrastrukturEvaluasi, 'section_skor')) / count($infrastrukturEvaluasi);
ob_start();
?>
<div class="space-y-6">
	<div class="p-2 border-l-4! border-l-primary-700! border border-gray-200 rounded-lg grid grid-cols-1 gap-4 bg-white" style="padding: 1rem 1.5rem;">
		<h2 class="text-xl font-bold text-primary-900"><?= $infrastruktur['nama_infra'] ?></h2>
		<div class="flex gap-2 text-gray-900/60">
			<p>Lokasi: <?= $infrastruktur['lokasi_infra'] ?> | Tahun: <?= date('d F Y', strtotime($infrastruktur['tahun_mulai'])) ?> s/d <?= date('d F Y', strtotime($infrastruktur['tahun_selesai'])) ?> | Nilai Kontrak: Rp<?= formatRupiahSingkat($infrastruktur['nilai_kontrak'], 0, ',', '.') ?></p>
		</div>
	</div>
	<div class="max-h-screen overflow-auto bg-white border border-gray-200 rounded-lg shadow-sm flex flex-col gap-4">
		<table class="border border-collapse w-full text-base text-left rtl:text-right">
			<thead class="sticky top-0 z-20 hidden md:table-header-group text-base [&_th]:uppercase [&_th]:text-white md:[&_th]:outline-[1px] [&_th]:outline-primary-600 [&_th]:font-medium [&_th]:text-center [&_th]:bg-gradient-to-r [&_th]:from-primary-700 [&_th]:to-primary-600">
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
					<tr class="bg-gradient-to-r to-primary-500 from-primary-800 text-white md:[&_td]:border [&_td]:border-primary-600 [&_td]">
						<td colspan="9" class="block md:table-cell px-6 py-3 uppercase font-bold bg-primary-700/60">
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
									<span data-section-id="<?= $section['section_id'] ?>" class="section-result-<?= $section['section_id'] ?> block md:hidden nilai-section"><?= $section['section_skor'] ?></span>
									<span data-section-id="<?= $section['section_id'] ?>" class="section-result-kategori-<?= $section['section_id'] ?> block md:hidden uppercase font-bold"><?= $section['section_skor_kategori'] ?></span>
								</div>

							</div>
						</td>
						<td class="hidden md:table-cell px-6 py-3 nilai-section">
							<span data-section-id="<?= $section['section_id'] ?>" class="section-result-<?= $section['section_id'] ?>">
								<?= $section['section_skor'] ?>
							</span>
							<span data-section-id="<?= $section['section_id'] ?>" class="section-result-kategori-<?= $section['section_id'] ?> uppercase font-bold"><?= $section['section_skor_kategori'] ?></span>
						</td>
					</tr>
					<?php foreach ($section['section_sub'] as $data): ?>
						<!-- Section Sub -->
						<tr class="[&_td]:bg-primary-700/10 md:[&_td]:border-b [&_td]:border-primary-900/20">
							<td colspan="9" class="block md:table-cell px-6 py-3">
								<div class="flex">
									<span>
										<?= $data['section_sub_nama']; ?> (<?= $data['section_sub_bobot']; ?>%)
									</span>
									<span data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> md:hidden ml-auto">
										<?= $data['section_sub_skor_result'] ?>
									</span>
								</div>
								<div data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-kategori-decision-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden">
									<?= $data['section_sub_kategori_decision']; ?>
								</div>
							</td>
							<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell px-6 py-3 nilai-sub">
								<?= $data['section_sub_skor_result'] ?>
							</td>
						</tr>
						<?php foreach ($data['indikator'] as $key => $sub): ?>
							<!-- Indikator -->
							<tr>
								<td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="hidden md:table-cell md:border-b md:border-primary-900/20 md:bg-primary-500/10 px-6 py-3"><?= $key + 1; ?></td>
								<td rowspan="<?= count($sub['indikator_kriteria']) ?>" class="block md:table-cell border-y border-y-gray-200 md:border-b md:border-primary-900/20 px-6 py-3">
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
									<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" data-indikator-kriteria-id="<?= $value_kriteria['id'] ?>" class="kriteria-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?>-<?= $value_kriteria['id'] ?> <?= ($key_kriteria == 0) ? 'md:table-cell' : 'md:hidden' ?> block md:border-b md:border-primary-900/20 md:bg-primary-500/10 px-6 py-3">
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
								<td rowspan="<?= count($sub['indikator_kriteria']) ?>" data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" class="indikator-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?> hidden md:table-cell md:border-b md:border-primary-900/20 px-6 py-3"><?= $sub['indikator_bobot'] ?></td>
								<td class="hidden md:table-cell md:border-b md:border-primary-900/20 md:bg-primary-500/10 px-6 py-3"><?= $sub['indikator_kriteria'][0]['nilai'] ?></td>
								<td rowspan="<?= count($sub['indikator_kriteria']) ?>" data-label="Nilai Indikator:" class="block md:table-cell md:border-b md:border-primary-900/20 px-6 py-3 before:content-[attr(data-label)] before:me-1 before:font-semibold before before:inline-block md:before:hidden before:mb-1">
									<?= $sub['indikator_nilai'] ?>
								</td>
								<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" data-indikator-id="<?= $sub['indikator_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) ?>" data-label="Bobot Evaluasi:" class="indikator-bobot-eval-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?>-<?= $sub['indikator_id'] ?> block md:table-cell md:border-b md:border-primary-900/20 md:bg-primary-500/10 border-t border-t-gray-200 px-6 py-3 before:content-[attr(data-label)] before:me-1 before:font-semibold before before:inline-block md:before:hidden before:mb-1">
									<?= $sub['indikator_skor'] ?>
								</td>
								<?php if ($key == 0): ?>
									<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-total-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell md:border-b md:border-primary-900/20 px-6 py-3">
										<?= $data['section_sub_skor'] ?>
									</td>
									<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-kategori-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> uppercase hidden md:table-cell md:border-b md:border-primary-900/20 md:bg-primary-500/10 px-6 py-3">
										<?= $data['section_sub_skor_kategori'] ?>
									</td>
									<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" rowspan="<?= count($sub['indikator_kriteria']) * count($data['indikator']) ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> hidden md:table-cell md:border-b md:border-primary-900/20 px-6 py-3">
										<?= $data['section_sub_skor_result'] ?>
									</td>
								<?php endif; ?>
							</tr>
							<?php foreach ($sub['indikator_kriteria'] as $key => $value): ?>
								<!-- Indikator Kriteria -->
								<?php if ($key == 0) continue; ?>
								<tr class="hidden md:table-row">
									<td class="md:border-b md:border-primary-900/20 md:bg-primary-500/10 px-6 py-3"><?= $value['nama'] ?></td>
									<td class="md:border-b md:border-primary-900/20 md:bg-primary-500/10 px-6 py-3"><?= $value['nilai'] ?></td>
								</tr>
							<?php endforeach; ?>
						<?php endforeach; ?>
						<tr class="md:hidden">
							<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-total-bobot-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> bg-gray-700/10/20 block md:border px-6 py-3 before:content-[attr(data-label)] before:me-1 before:font-semibold before:inline-block md:before:hidden before:mb-1" data-label="Total Bobot: ">
								<?= $data['section_sub_skor'] ?>
							</td>
							<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-kategori-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> uppercase bg-gray-700/10/20 block md:border px-6 py-3 before:content-[attr(data-label)] before:normal-case before:me-1 before:font-semibold before:inline-block md:before:hidden before:mb-1" data-label="Kategori: ">
								<?= $data['section_sub_skor_kategori'] ?>
							</td>
							<td data-section-id="<?= $section['section_id'] ?>" data-section-sub-id="<?= $data['section_sub_id'] ?>" class="section-sub-result-<?= $section['section_id'] ?>-<?= $data['section_sub_id'] ?> bg-gray-700/10/20 block md:border px-6 py-3 before:content-[attr(data-label)] before:me-1 before:font-semibold before:inline-block md:before:hidden before:mb-1" data-label="Nilai Akhir: ">
								<?= $data['section_sub_skor_result'] ?>
							</td>
						</tr>
					<?php endforeach; ?>
					<tr>
						<td class="bg-gray-700/20/40 block md:border md:hidden px-6 py-3 nilai-section">
							<span data-section-id="<?= $section['section_id'] ?>" class="section-result-<?= $section['section_id'] ?>">
								<?= $section['section_skor'] ?>
							</span>
							<span data-section-id="<?= $section['section_id'] ?>" class="section-result-kategori-<?= $section['section_id'] ?> uppercase font-bold"><?= $section['section_skor_kategori'] ?></span>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<div class="p-2 border-l-4! border-l-primary-700! border border-gray-200 rounded-lg grid grid-cols-1 gap-3 bg-white" style="padding: 1rem 1.5rem;">
		<h2 class="text-lg font-bold flex items-center gap-2 text-primary-700">
			<i class="fas fa-chart-pie"></i>
			Kesimpulan Evaluasi
		</h2>
		<span class="text-primary-900" style="opacity: 0.8;">
			<?= ($infrastruktur['infrastruktur_skor'] > 93.5 ? 'Infrastruktur Berfungsi' : ($infrastruktur['infrastruktur_skor'] > 33 ? 'Infrastruktur Kurang Berfungsi' : 'Infrastruktur Tidak Berfungsi')) ?>
		</span>
		<strong class="font-bold text-lg text-primary-900" style="font-weight: 900;">
			Total Skor: <?= $infrastruktur['infrastruktur_skor'] ?>/100
		</strong>
	</div>
</div>
<?php
$content = ob_get_clean();
echo $content;
