
var data = [
    {
      "No": "1",
      "namaMahasiswa": "Christian Arya Ahmad",
      "Nilai": ""
    },
    {
      "No": "2",
      "namaMahasiswa": "Asfa Jungkook",
      "Nilai": ""
    },
    {
      "No": "3",
      "namaMahasiswa": "cape ngerjain web",
      "Nilai": ""
    },
    {
      "No": "4",
      "namaMahasiswa": "Maryamah Cantik",
      "Nilai": ""
    },
    {
      "No": "5",
      "namaMahasiswa": "survive statmat",
      "Nilai": ""
    }

  ];

var tableBody = document.getElementById("myTableBody");

data.forEach(function(item) {
  var row = document.createElement("tr");
  
  var noCell = document.createElement("td");
  noCell.textContent = item["No"];
  row.appendChild(noCell);
  
  var namaMahasiswaCell = document.createElement("td");
  namaMahasiswaCell.textContent = item["namaMahasiswa"];
  row.appendChild(namaMahasiswaCell);
  
  var nilaiCell = document.createElement("td");
  var nilaiInput = document.createElement("input");
  nilaiInput.type = "number";
  nilaiInput.name = "masukkan nilai";
  nilaiInput.placeholder = "Nilai";
  nilaiCell.appendChild(nilaiInput);
  row.appendChild(nilaiCell);

  nilaiCell.classList.add("nilai-input");
  
  tableBody.appendChild(row);
});

function toggleContent() {
  var content = document.getElementById("content");
  content.classList.toggle("hidden");
}

