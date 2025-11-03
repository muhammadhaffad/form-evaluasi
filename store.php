<?php
require_once 'db.php';

$data = json_decode(file_get_contents('php://input'), true);
try {
    //code...
    $conn->beginTransaction();
    $sql = "insert into infrastruktur (nama_infra, lokasi_infra, nilai_kontrak, tahun_mulai, tahun_selesai) values (:nama_infra, :lokasi_infra, :nilai_kontrak, :tahun_mulai, :tahun_selesai)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'nama_infra' => $data['nama_infra'],
        'lokasi_infra' => $data['lokasi_infra'],
        'nilai_kontrak' => $data['nilai_kontrak'],
        'tahun_mulai' => $data['tahun_mulai'],
        'tahun_selesai' => $data['tahun_selesai'],
    ]);
    $infrastrukturId = $conn->lastInsertId();
    foreach ($data['evaluasi'] as $keySection => $section) {
        $sql = "insert into infrastruktur_evaluasi (infrastruktur_id, section_nama, section_kategori_decision, section_skor, section_skor_kategori) values (:infrastruktur_id, :section_nama, :section_kategori_decision, :section_skor, :section_skor_kategori)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            'infrastruktur_id' => $infrastrukturId,
            'section_nama' => $section['section_nama'],
            'section_kategori_decision' => $section['section_kategori_decision'],
            'section_skor' => $section['section_skor'],
            'section_skor_kategori' => $section['section_skor_kategori'],
        ]);
        $infrastrukturEvalId = $conn->lastInsertId();
        foreach ($section['section_sub'] as $keySectionSub => $sectionSub) {
            $sql = "insert into infrastruktur_evaluasi_sub (infrastruktur_evaluasi_id, section_sub_nama, section_sub_bobot, section_sub_kategori_decision, section_sub_skor, section_sub_skor_kategori, section_sub_skor_result) values (:infrastruktur_evaluasi_id, :section_sub_nama, :section_sub_bobot, :section_sub_kategori_decision, :section_sub_skor, :section_sub_skor_kategori, :section_sub_skor_result)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                'infrastruktur_evaluasi_id' => $infrastrukturEvalId,
                'section_sub_nama' => $sectionSub['section_sub_nama'],
                'section_sub_bobot' => $sectionSub['section_sub_bobot'],
                'section_sub_kategori_decision' => $sectionSub['section_sub_kategori_decision'],
                'section_sub_skor' => $sectionSub['section_sub_skor'],
                'section_sub_skor_kategori' => $sectionSub['section_sub_skor_kategori'],
                'section_sub_skor_result' => $sectionSub['section_sub_skor_result'],
            ]);
            $infrastrukturEvalSubId = $conn->lastInsertId();
            foreach ($sectionSub['indikator'] as $keyIndikator => $indikator) {
                $sql = "insert into infrastruktur_evaluasi_sub_indikator (infrastruktur_evaluasi_sub_id, indikator_nama, indikator_bobot, indikator_skor, indikator_nilai) values (:infrastruktur_evaluasi_sub_id, :indikator_nama, :indikator_bobot, :indikator_skor, :indikator_nilai)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([
                    'infrastruktur_evaluasi_sub_id' => $infrastrukturEvalSubId,
                    'indikator_nama' => $indikator['indikator_nama'],
                    'indikator_bobot' => $indikator['indikator_bobot'],
                    'indikator_skor' => $indikator['indikator_skor'],
                    'indikator_nilai' => $indikator['indikator_nilai']
                ]);
                $infrastrukturEvalSubIndId = $conn->lastInsertId();
                foreach ($indikator['indikator_kriteria'] as $keyIndikatorKriteria => $indikatorKriteria) {
                    $sql = "insert into infrastruktur_evaluasi_sub_indikator_kriteria (infrastruktur_evaluasi_sub_indikator_id, indikator_kriteria_nama, nilai) values (:infrastruktur_evaluasi_sub_indikator_id, :indikator_kriteria_nama, :nilai)";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([
                        'infrastruktur_evaluasi_sub_indikator_id' => $infrastrukturEvalSubIndId,
                        'indikator_kriteria_nama' => $indikatorKriteria['nama'],
                        'nilai' => $indikatorKriteria['nilai']
                    ]);
                }
            }
        }
    }
    $conn->commit();
    http_response_code(200);
    echo json_encode([
        'status' => 'success',
        'message' => 'Data berhasil disimpan'
    ]);
} catch (\Throwable $th) {
    $conn->rollBack();
    http_response_code(500);
    echo json_encode([
        'status' => 'error',
        'message' => 'Data gagal disimpan',
        'error' => $th->getMessage()
    ]);
    throw $th;
}
