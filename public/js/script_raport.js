  var mahasiswaData = [
    {
      nama: "Ravikasha Davva Imawant",
      nim: "162112133034",
      prodi: "TSD",
      nilai: [
        {
          mataKuliah: "Algoritma Pemrograman II",
          S1: 100, S2: 0, S3: 0, S4: 0, S5: 0, S6: 0, S7: 0, S8: 0, S9: 0, S10: 0,S11: 0,
          KU1:0, KU2:0, KU3:0, KU4:0, KU5:0, KU6:0, KU7:0, KU8:0, KU9:0, 
        },
        {
          mataKuliah: "Pengantar Basis Data",
          S1: 100, S2: 0, S3: 0, S4: 0, S5: 0, S6: 0, S7: 0, S8: 0, S9: 0, S10: 0,S11: 0,
          KU1:0, KU2:0, KU3:0, KU4:0, KU5:0, KU6:0, KU7:0, KU8:0, KU9:0,
        },
        // Tambahkan data mata kuliah dan nilai lainnya di sini
      ],
    },
    // Tambahkan data mahasiswa lainnya di sini
  ];

var prodiData = [
  {
    prodi: "TSD",
    nilaiRerata: [
      {
        mataKuliah: "Algoritma Pemrograman II",
        S1: 80,S2: 0,S3: 0,S4: 0,S5: 0,S6: 0,S7: 0,S8: 0,S9: 0,S10: 0,S11: 0,
        KU1: 0,KU2: 0,KU3: 0,KU4: 0,KU5: 0,KU6: 0,KU7: 0,KU8: 0,KU9: 0,
      },
      {
        mataKuliah: "Pengantar Basis Data",
        S1: 80,S2: 0,S3: 0,S4: 0,S5: 0,S6: 0,S7: 0,S8: 0,S9: 0,S10: 0,S11: 0,
        KU1: 0,KU2: 0,KU3: 0,KU4: 0,KU5: 0,KU6: 0,KU7: 0,KU8: 0,KU9: 0,
      },
      // Tambahkan data mata kuliah dan nilai rerata lainnya di sini
    ],
  },
  // Tambahkan data prodi lainnya di sini
];


// Function to open tab
function openTab(tabName) {
  var i, tabContent;
  tabContent = document.getElementsByClassName("tab-content");
  for (i = 0; i < tabContent.length; i++) {
    tabContent[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}

// Function to filter mahasiswa by prodi
function filterMahasiswa() {
  var prodiFilter = document.getElementById("prodi-filter").value;
  var filteredMahasiswa;
  if (prodiFilter === "all") {
    filteredMahasiswa = mahasiswaData;
  } else {
    filteredMahasiswa = mahasiswaData.filter(function (mahasiswa) {
      return mahasiswa.prodi === prodiFilter;
    });
  }
  return filteredMahasiswa;
}

function showSuggestions() {
  var searchInput = document.getElementById("search-input");
  var searchValue = searchInput.value.toLowerCase();
  var suggestionsDiv = document.getElementById("search-suggestions");
  suggestionsDiv.innerHTML = "";

  var filteredMahasiswa = filterMahasiswa();

  var filteredSuggestions = filteredMahasiswa.filter(function (mahasiswa) {
    return (
      mahasiswa.nama.toLowerCase().includes(searchValue) ||
      mahasiswa.nim.includes(searchValue)
    );
  });

  filteredSuggestions.forEach(function (mahasiswa) {
    var suggestionDiv = document.createElement("div");
    suggestionDiv.textContent = mahasiswa.nim + " - " + mahasiswa.nama;
    suggestionDiv.addEventListener("click", function () {
      searchInput.value = mahasiswa.nim + " - " + mahasiswa.nama;
    });
    suggestionsDiv.appendChild(suggestionDiv);
  });
}

// Event listener for search input
var searchInput = document.getElementById("search-input");
searchInput.addEventListener("input", showSuggestions);

// Function to show raport table
function showRaport() {
  var searchInput = document.getElementById("search-input").value;
  var raportTable = document.getElementById("raport-table");
  var raportBody = document.getElementById("raport-body");
  var raportmhs = document.getElementById("outer-wrapper-mhs");
  var lulus = document.getElementById("box-lulus");
  

  if (!searchInput) {
    alert("Silahkan masukkan Nama atau NIM Mahasiswa terlebih dahulu.");
    return;
  }

  var selectedMahasiswa = mahasiswaData.find(function (mahasiswa) {
    return (
      mahasiswa.nama.toLowerCase() === searchInput.toLowerCase() ||
      mahasiswa.nim === searchInput.split(" - ")[0]
    );
  });

  if (!selectedMahasiswa) {
    alert("Mahasiswa tidak ditemukan.");
    raportBody.innerHTML = "";
    raportTable.style.display = "none";
    return;
  };

  raportTable.style.display = "table";
  raportmhs.style.display = "block";
  


  var raportHeader = "<tr>";
  var headerColumns = ["Mata Kuliah", "S1", "S2", "S3", "S4", "S5", "S6", "S7", "S8", "S9", "S10", "S11",
                       "KU1", "KU2", "KU3", "KU4", "KU5", "KU6", "KU7", "KU8", "KU9"];
  for (var i = 0; i < headerColumns.length; i++) {
    raportHeader += "<th>" + headerColumns[i] + "</th>";
  }
  raportHeader += "</tr>";

  var raportRows = selectedMahasiswa.nilai.map(function (nilai) {
    var row = "<tr>";
    var columnData = [nilai.mataKuliah, nilai.S1, nilai.S2, nilai.S3, nilai.S4, nilai.S5, nilai.S6, nilai.S7, nilai.S8, nilai.S9, nilai.S10, nilai.S11,
                      nilai.KU1, nilai.KU2, nilai.KU3, nilai.KU4, nilai.KU5, nilai.KU6,nilai.KU7, nilai.KU8, nilai.KU9];
    for (var j = 0; j < columnData.length; j++) {
      row += "<td>" + columnData[j] + "</td>";
    }
    row += "</tr>";
    return row;
  });

  var raportTitle = "<h3 style='color: black;'>" + selectedMahasiswa.nama + " - " + selectedMahasiswa.nim + "</h3>";
  raportTable.innerHTML = raportTitle + raportHeader + raportRows.join("");
  
  //lulus.style.display = "contents";
}


// Function to show prodi raport table
function showProdiRaport() {
  var prodiSelect = document.getElementById("prodi-select");
  var selectedProdi = prodiSelect.value;
  var prodiRaportTable = document.getElementById("prodi-raport-table");
  var prodiRaportBody = document.getElementById("prodi-raport-body");
  var raportprodi = document.getElementById("outer-wrapper-prodi");

  prodiRaportTable.style.display = "table";
  raportprodi.style.display = "block";

  var selectedProdiData = prodiData.find(function (prodi) {
    return prodi.prodi === selectedProdi;
  });

  var prodiRaportHeader = "<tr>";
  var headerColumns = ["Mata Kuliah","S1","S2","S3","S4","S5","S6","S7","S8","S9","S10","S11",
                                     "KU1","KU2","KU3","KU4","KU5","KU6","KU7","KU8","KU9"];
  for (var i = 0; i < headerColumns.length; i++) {
    prodiRaportHeader += "<th>" + headerColumns[i] + "</th>";
  }
  prodiRaportHeader += "</tr>";

  var prodiRaportRows = selectedProdiData.nilaiRerata.map(function (cpl) {
    var row = "<tr>";
    var columnData = [cpl.mataKuliah, cpl.S1, cpl.S2, cpl.S3, cpl.S4, cpl.S5, cpl.S6, cpl.S7, cpl.S8, cpl.S9, cpl.S10, cpl.S11,
                      cpl.KU1, cpl.KU2, cpl.KU3, cpl.KU4, cpl.KU5, cpl.KU6, cpl.KU7, cpl.KU8 ,cpl.KU9];
    for (var j = 0; j < columnData.length; j++) {
      row += "<td>" + columnData[j] + "</td>";
    }
    row += "</tr>";
    return row;
  });

  var prodiRaportTitle = "<h3 style='color: black;'>Prodi " + selectedProdi + "</h3>";
  prodiRaportTable.innerHTML = prodiRaportTitle + prodiRaportHeader + prodiRaportRows.join("");
}



// Initialize the website
openTab("raport-mahasiswa");

