// Fungsi untuk membuat opsi tahun dari 1990 hingga tahun sekarang
function populateYearDropdown() {
  const yearSelect = document.getElementById('tanggalMulai');
  const yearSelect2 = document.getElementById('tanggalSelesai');

  // Tambahkan opsi tahun dari 1990 hingga tahun sekarang
  for (let year = 2024; year >= 2020; year--) {
    const option = document.createElement('option');
    option.value = year;
    option.textContent = year;
    yearSelect.appendChild(option);
  }
  for (let year = 2024; year >= 2020; year--) {
    const option = document.createElement('option');
    option.value = year;
    option.textContent = year;
    yearSelect2.appendChild(option);
  }
}

document.addEventListener('DOMContentLoaded', function () {


  const submitBtn = document.getElementById('submitBtn');

  // Calculate total number of evaluable rows
  const totalRows = document.querySelectorAll('.custom-dropdown').length;

  // Initialize dropdown functionality
  const dropdowns = document.querySelectorAll('.custom-dropdown');

  dropdowns.forEach(dropdown => {
    const select = dropdown.querySelector('.dropdown-select');
    const options = dropdown.querySelector('.dropdown-options');
    const selectedValue = dropdown.querySelector('.selected-value');

    // Toggle dropdown on click
    select.addEventListener('click', function (e) {
      e.stopPropagation();

      // Close all other open dropdowns
      document.querySelectorAll('.dropdown-options').forEach(opt => {
        if (opt !== options) {
          opt.style.display = 'none';
        }
      });

      // Toggle current dropdown
      if (options.style.display === 'block') {
        options.style.display = 'none';
      } else {
        options.style.display = 'block';
      }
    });

    // Handle option selection
    dropdown.querySelectorAll('.dropdown-option').forEach(option => {
      option.addEventListener('click', function () {
        const value = this.getAttribute('data-value');
        const text = this.textContent;

        selectedValue.textContent = text;
        selectedValue.className = 'selected-value ' + this.className.split(' ')[1];

        options.style.display = 'none';

        // Store the selected value in data attribute
        dropdown.setAttribute('data-selected', value);
      });
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function () {
      options.style.display = 'none';
    });
  });


  // Handle form submission
  submitBtn.addEventListener('click', function () {
    // Validasi input nama infrastruktur
    const infrastructureName = document.getElementById('infrastructureName').value.trim();
    if (!infrastructureName) {
      alert('Harap masukkan nama infrastruktur!');
      return;
    }
    const lokasiInfra = document.getElementById('infrastructureLocation').value.trim();
    if (!lokasiInfra) {
      alert('Harap masukkan lokasi infrastruktur!');
      return;
    }
    const nilaiKontrak = document.getElementById('infrastructureValue').value.trim();
    if (!nilaiKontrak) {
      alert('Harap masukkan nilai kontrak infrastruktur!');
      return;
    }

    // Validasi pilihan tahun
    const constructionYear = document.getElementById('tanggalMulai').value;
    const constructionYear2 = document.getElementById('tanggalSelesai').value;
    if (!constructionYear) {
      alert('Harap pilih tahun infrastruktur terbangun!');
      return;
    } else if (!constructionYear2) {
      alert('Harap pilih tahun infrastruktur terbangun!');
      return;
    }
    // Validate if all dropdowns have been selected
    const completed = document.querySelectorAll('.custom-dropdown[data-selected]').length;

    if (completed === totalRows) {
      // Collect all data
      const formData = {};
      let nilaiAkhir = 0;
      formData["namaInfra"] = infrastructureName;
      formData["lokasiInfra"] = lokasiInfra;
      formData["nilaiKontrak"] = nilaiKontrak;
      formData["tahunMulai"] = constructionYear;
      formData["tahunSelesai"] = constructionYear2;
      document.querySelectorAll('.custom-dropdown').forEach(dropdown => {
        const id = dropdown.getAttribute('data-id');
        const value = dropdown.getAttribute('data-selected');
        const text = dropdown.querySelector('.selected-value').textContent;
        formData[id] = value;
        if (formData[id] == "sangat baik") {
          nilaiAkhir = nilaiAkhir + 4;
        } else if (formData[id] == "baik") {
          nilaiAkhir = nilaiAkhir + 3;
        } else if (formData[id] == "kurang baik") {
          nilaiAkhir = nilaiAkhir + 2;
        } else if (formData[id] == "tidak baik") {
          nilaiAkhir = nilaiAkhir + 1;
        }
      });
      formData["nilaiAkhir"] = nilaiAkhir;
      console.log(nilaiAkhir);
      nilaiAkhir = 0;

      console.log('Form data:', formData);
      alert('Evaluasi berhasil disubmit! Terima kasih telah mengisi formulir.');

      // kirim ke PHP
      fetch("save.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(formData)
      })
        .then(res => res.json())
        .then(data => {
          alert("Server response: " + data.message);
        })
        .catch(err => console.error(err));
      // Here you would typically send the data to a server
    } else {
      alert('Harap lengkapi evaluasi untuk semua baris sebelum submit!');
    }
  });

  // Initialize progress bar
  populateYearDropdown()
});

