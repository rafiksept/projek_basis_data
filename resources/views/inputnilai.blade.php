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
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="{{asset('css/style_raport_input.css')}}" rel="stylesheet">
    <link rel="icon" type="png" href="{{asset('img/Logo UNAIR.png')}}">
    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0" style="background: #0E5CA9;">

        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <img src="{{asset('img/logo_ftmm.png')}}" class=""  style="width: auto; height: 45px; margin-top: 20px;" alt="">
                </a>

                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2" style="color: #191C24;"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="inputNilai.html" class="nav-link active"><i class="fa fa-laptop me-2" style="color: #191C24;"></i>Input Nilai</a>
                    </div>
                    <a href="editcpmk.html" class="nav-item nav-link "><i class="fa fa-chart-bar me-2" style="color: #191C24;"></i>Edit CPMK</a>
                    <a href="raport.html" class="nav-item nav-link "><i class="fa fa-table me-2" style="color: #191C24;"></i>Raport</a>
                </div>
            </nav>
        </div>
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
                                <img class="rounded-circle" src="{{asset('img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                                <!-- <span class="d-none d-lg-inline-flex">John Doe</span> -->
                            </a>
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

            <form>
      
              <div class="filter">
                <label for="prodi-filter" style="font-family: 'Outfit'; font-size: x-large; color: black; font-weight: bold;">Program Studi</label>
                <select id="prodi-filter">
                    <option value="TSD">Teknologi Sains Data</option>
                    <option value="TRKB">Teknik Robotika dan Kecerdasan Buatan</option>
                    <option value="TE">Teknik Elektro</option>
                    <option value="TI">Teknik Industri</option>
                    <option value="RN">Rekayasa Nanoteknologi</option>
                </select>
            </div>

            <div class="filter">
              <label for="prodi-filter" style="font-family: 'Outfit'; font-size: x-large; color: black; font-weight: bold;">Mata Kuliah</label>
              <select id="prodi-filter">
                  <option>MK 1</option>
                  <option>MK 2</option>
                  <option>MK 3</option>
                  <option>Mk 4</option>
                  <option>MK 5</option>
              </select>
          </div>

       <div class="upload-container" style="margin-top: 3%">
        <label for="file_upload"> Upload File
          <img src="{{asset('assets/iconUpload.svg')}}" alt="upload icon" class="iconup" onclick="toggleContent()">
        </label>

        <div id="content" class="hidden" style="z-index: 2">
          <script src="{{asset('./js/loadElement.js')}}"></script>
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
                        <th style="background-color: #0E5CA9; font-weight: bold">Nama Mahasiswa</th>
                        <th style="background-color: #0E5CA9; font-weight: bold">Nilai</th>
                      </tr>
                    </thead>
                    <tbody id="myTableBody">
                      <script src="{{asset('./js/script_nilai.js')}}"></script>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <input type="submit" value="Simpan Edit" class="submit-button-hh" />
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
    <script src="{{asset('js/main_raport.js')}}"></script>
</body>

</html>