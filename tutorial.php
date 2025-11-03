<?php
require_once 'db.php';
$title = 'Cara Pengisian Evaluasi Infrastruktur';
$subtitle = 'Sistem Evaluasi Keberfungsian Kawasan Strategis Terbangun Jawa Timur';
$active = 'tutorial';
$icon = 'list-ol';
ob_start();
?>

<div class="space-y-6">
    <div class="p-6 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
        Test
    </div>
</div>

<?php
$content = ob_get_clean();
include 'layout.php';
