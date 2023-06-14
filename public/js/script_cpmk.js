var data = [
  {
    "No": "1",
    "mataKuliah": "Statmat",
    "Nilai1": "",
    "Nilai2": "",
    "Nilai3": ""
  },
  {
    "No": "2",
    "mataKuliah": "Alpro",
    "Nilai1": "",
    "Nilai2": "",
    "Nilai3": ""
  },
  {
    "No": "3",
    "mataKuliah": "Stat Nonpar",
    "Nilai1": "",
    "Nilai2": "",
    "Nilai3": ""
  },
  {
    "No": "4",
    "mataKuliah": "metmat",
    "Nilai1": "",
    "Nilai2": "",
    "Nilai3": ""
  },
  {
    "No": "5",
    "mataKuliah": "Big Data",
    "Nilai1": "",
    "Nilai2": "",
    "Nilai3": ""
  },
  {
    "No": "6",
    "mataKuliah": "Dosen Basdat Kontol",
    "Nilai1": "",
    "Nilai2": "",
    "Nilai3": ""
  }
];

var tableBody = document.getElementById("myTableBody");

data.forEach(function (item) {
  var row = document.createElement("tr");

  var noCell = document.createElement("td");
  noCell.textContent = item["No"];
  row.appendChild(noCell);

  var namaMK = document.createElement("td");
  namaMK.textContent = item["mataKuliah"];
  row.appendChild(namaMK);

  var nilaiS1Cell = document.createElement("td");
  var nilaiS1Input = document.createElement("input");

  var nilaiS2Cell = document.createElement("td");
  var nilaiS2Input = document.createElement("input");

  var nilaiK1Cell = document.createElement("td");
  var nilaiK1Input = document.createElement("input");

  nilaiS1Input.type = "number";
  nilaiS2Input.type = "number";
  nilaiK1Input.type = "number";

  nilaiS1Input.name = "masukkan nilai";
  nilaiS2Input.name = "masukkan nilai";
  nilaiK1Input.name = "masukkan nilai";

  nilaiS1Input.placeholder = "Nilai";
  nilaiS2Input.placeholder = "Nilai";
  nilaiK1Input.placeholder = "Nilai";

  nilaiS1Cell.appendChild(nilaiS1Input);
  nilaiS2Cell.appendChild(nilaiS2Input);
  nilaiK1Cell.appendChild(nilaiK1Input);

  row.appendChild(nilaiS1Cell);
  row.appendChild(nilaiS2Cell);
  row.appendChild(nilaiK1Cell);

  nilaiS1Cell.classList.add("nilai-input");
  nilaiS2Cell.classList.add("nilai-input");
  nilaiK1Cell.classList.add("nilai-input");

  tableBody.appendChild(row);
});

function toggleContent() {
  var content = document.getElementById("content");
  content.classList.toggle("hidden");
}