<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CPL | Input Nilai</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style_raport_input.css') }}" rel="stylesheet">
    <link rel="icon" type="png" href="{{ asset('img/Logo UNAIR.png') }}">
    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0" style="background: #0E5CA9;">

        <!-- Sidebar Start -->
        @if (Auth::user()->role_id == 1)
        <div class="sidebar pe-4 pb-3">
          <nav class="navbar">
              <a href="index.html" class="navbar-brand mx-4 mb-3">
                  <img src="{{ asset('img/logo_ftmm.png') }}" class=""  style="width: auto; height: 45px; margin-top: 20px;" alt="">
              </a>
              <div class="navbar-nav w-100">
                  <div class="nav-item dropdown">
                    <a href="/inputNilai" class="nav-link active"><i class="fa fa-laptop me-2" style="color: #191C24;"></i>Input Nilai</a>
                </div>
              </div>
          </nav>
      </div>
        @else
        <div class="sidebar pe-4 pb-3">
          <nav class="navbar">
              <a href="index.html" class="navbar-brand mx-4 mb-3">
                  <img src="{{ asset('img/logo_ftmm.png') }}" class=""  style="width: auto; height: 45px; margin-top: 20px;" alt="">
              </a>

              <div class="navbar-nav w-100">
                  <a href="/viewIndex" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2" style="color: #191C24;"></i>Dashboard</a>
                  <div class="nav-item dropdown">
                      <a href="/inputNilai" class="nav-link active"><i class="fa fa-laptop me-2" style="color: #191C24;"></i>Input Nilai</a>
                  </div>
                  <a href="/editcpmk" class="nav-item nav-link "><i class="fa fa-chart-bar me-2" style="color: #191C24;"></i>Edit CPMK</a>
                  <a href="/raport" class="nav-item nav-link "><i class="fa fa-table me-2" style="color: #191C24;"></i>Raport</a>
              </div>
          </nav>
      </div>
        @endif

        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content" style="border-radius: 50px 0px 0px 50px;">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  sticky-top px-4 pt-4">
                <a href="#" class="sidebar-toggler flex-shrink-0" id="tiga_strip" >
                    <i class="fa fa-bars" style="color: white;"></i>
                </a>
                
                <div class="navbar-nav align-items-center ms-auto">
            
                    <div class="navbar-atas d-flex">
                        <!-- notification -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <i class="fa fa-bell" style="width: 20px;"></i>
                                <!-- <span class="d-none d-lg-inline-flex">Notificatin tai</span> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Profile updated</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">New user added</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item">
                                    <h6 class="fw-normal mb-0">Password changed</h6>
                                    <small>15 minutes ago</small>
                                </a>
                                <hr class="dropdown-divider">
                                <a href="#" class="dropdown-item text-center">
                                    See all notifications
                                </a>
                            </div>
                        </div>

                        <!-- profile -->
                        <div class="nav-item dropdown">
                          <a href="#" class="nav-link" data-bs-toggle="dropdown">
                              @auth
                                  @if(Auth::user()->image)
                                      <img src="{{ asset('users/' . Auth::user()->image) }}" alt="image" style="width: 40px; height: 40px;" class="rounded-circle">
                                  @else
                                      <img src="{{ asset('users/profiledefault.png') }}" alt="default profile image" style="width: 40px; height: 40px;" class="rounded-circle">
                                  @endif
                              @else
                                  <img src="{{ asset('users/profiledefault.png') }}" alt="default profile image" style="width: 40px; height: 40px;" class="rounded-circle">
                              @endauth
                          </a>
                          <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                              <a href="/edit-profile" class="dropdown-item">Edit Profile</a>
                              <a href="/logout" class="dropdown-item">Log Out</a>
                          </div>
                      </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Table Start -->
            <div class="container">
                <div class="judul-table" style="color: black; font-size: 3rem; margin-bottom: 20px; margin-top: 0px;">
                    Input Nilai
                </div>

            <form method="POST" action = "/inputNilaiMahasiswa" id="nilaimasuk">

                @csrf
      
              <div class="filter">
                <label for="prodi-filter" style="font-family: 'Outfit'; font-size: x-large; color: black; font-weight: bold;">Program Studi</label>
                <select id="prodi-filter">
                    <option disabled selected >Pilih Prodi</option>
                    <option value="TSD">Teknologi Sains Data</option>
                    <option value="TRKB">Teknik Robotika dan Kecerdasan Buatan</option>
                    <option value="TE">Teknik Elektro</option>
                    <option value="TI">Teknik Industri</option>
                    <option value="RN">Rekayasa Nanoteknologi</option>
                </select>
            </div>

            <div class="filter">
              <label for="prodi-filter" style="font-family: 'Outfit'; font-size: x-large; color: black; font-weight: bold;">Mata Kuliah</label>
              <select id="matkul-filter">
                <option disabled selected class = "pilih-prodi">Pilih Matkul</option>
              </select>
          </div>

       <div class="upload-container" style="margin-top: 3%">
        <div id="content" class="hidden" style="z-index: 2">
          <script src="{{ asset('js/loadElement.js') }}"></script>
        </div>
       </div>
          <br /><br />
            
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="background-color: #0E5CA9; font-weight: bold;">No</th>
                        <th style="background-color: #0E5CA9; font-weight: bold;">NIM</th>
                        <th style="background-color: #0E5CA9; font-weight: bold">Nama Mahasiswa</th>
                        <th style="background-color: #0E5CA9; font-weight: bold">Nilai</th>
                      </tr>
                    </thead>
                    <tbody id="myTableBody">
                 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" value="Simpan Edit" class="submit-button-hh" />
            </form>
        </div>

        <!-- Content End -->

    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script>
        // Mendapatkan elemen select dan paragraf hasil
        var selectElement = document.getElementById("prodi-filter");
        var matkulFilter2 = document.getElementById("matkul-filter");
        
      
        // Menambahkan event listener ke elemen select
        selectElement.addEventListener("change", function() {
        var selectElement1 = document.getElementById("matkul-filter"); // Ganti "nama-select" dengan ID sesuai elemen <select> Anda

// Mengosongkan semua opsi, kecuali yang disabled
        var opsi = selectElement1.querySelectorAll("option");
        for (var i = 0; i < opsi.length; i++) {
          var option1 = opsi[i];
          if (!option1.disabled) {
            option1.remove();
          }
        }


        selectElement1.querySelector('option.pilih-prodi').selected = true;
          // Mendapatkan nilai terpilih dari select
          var selectedValue = selectElement.value;
      
          // Memperbarui teks hasil dengan nilai terpilih
          var url = `http://127.0.0.1:8000/getMatkul/${selectedValue}`;
  
          fetch(url)
          .then(function(response) {
              if (response.ok) {
              return response.json();
              }
              throw new Error("Network response was not ok.");
          })
          .then(function(data) {
              // Lakukan sesuatu dengan data yang diterima
              var matkulFilter = document.getElementById("matkul-filter");
              
              
            
    // Melakukan perulangan pada data dan menambahkan opsi ke elemen select
            data.forEach(function(item) {
                var option = document.createElement("option");
                option.textContent = item.angkatan+ "-" + item.nama;
                option.value = item.id;
                matkulFilter.appendChild(option);
                // Mengubah atribut 'action' dari elemen form


              
          })

        })
          .catch(function(error) {
              // Tangani kesalahan jika terjadi
              console.log("Ada kesalahan:", error.message);
          });
        });

        
        if(matkulFilter2.value){
            matkulFilter2.addEventListener("change", function() {
              // Mengubah atribut 'action' dari elemen form
                var myForm = document.getElementById("nilaimasuk");
                myForm.action = "/inputNilaiMahasiswa/"+matkulFilter2.value;

          // Mendapatkan nilai terpilih dari select
          var matkulValue = matkulFilter2.value;
      
          // Memperbarui teks hasil dengan nilai terpilih
         
          var url = `http://127.0.0.1:8000/getMahasiswa/${matkulValue}`;
  
          fetch(url)
          .then(function(response) {
              if (response.ok) {
              return response.json();
              }
              throw new Error("Network response was not ok.");
          })
          .then(function(data) {
              // Lakukan sesuatu dengan data yang diterima
            //   var matkulFilter = document.getElementById("matkul-filter");
            //   matkulFilter.innerHTML = ""
            console.log(data)

            var tableBody = document.getElementById("myTableBody");

// Menghapus baris yang ada sebelumnya (opsional)
            tableBody.innerHTML = "";
            var counter = 1
            // Membuat baris HTML berdasarkan setiap data dari fetch
            data.forEach(function(item) {
            var row = document.createElement("tr");
            var idCell = document.createElement("td");
            idCell.textContent = counter;
            counter += 1;
            var nimCell = document.createElement("td");
            var input = document.createElement("input");
            input.readOnly = true;
            nimCell.classList.add("nilai-input");
            input.type = "text";
            input.name = "nim[]";
            // let str = "Contoh\u00a0teks\u00a0dengan\u00a0karakter\u00a0\u00a0spasi\u00a0non-breaking.";
            let cleanedStr = item.NimMahasiswa.replace(/\u00a0/g, "");

            input.value = cleanedStr;
            nimCell.appendChild(input);
            var nameCell = document.createElement("td");
            nameCell.textContent = item.Nama;
            var nilaiCell = document.createElement("td");
            var input = document.createElement("input");
            nilaiCell.classList.add("nilai-input");
            input.type = "number";
            input.step = "any";
            input.name = "nilai[]";
            input.placeholder = "Nilai";
            input.value = item.nilai;
            input.setAttribute("min", "0");
            input.setAttribute("max", "100");
            nilaiCell.appendChild(input);

            // Menambahkan sel-sel ke dalam baris
            row.appendChild(idCell);
            row.appendChild(nimCell);
            row.appendChild(nameCell);
            row.appendChild(nilaiCell);

            // Menambahkan baris ke dalam tabel
            tableBody.appendChild(row);
            });

        })
          .catch(function(error) {
              // Tangani kesalahan jika terjadi
              console.log("Ada kesalahan:", error.message);
          });
        });
        }


      </script>
    <script src="{{ asset('js/main_raport.js') }}"></script>
</body>

</html>