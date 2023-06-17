<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CPL | Edit Profile</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/styledash.css" rel="stylesheet">
    <link rel="icon" type="png" href="img/Logo UNAIR.png">
    
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0" style="background: #0E5CA9;">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar" >
                <a href="/viewIndex" class="navbar-brand mx-4 mb-3">
                    <img src="img/logo_ftmm.png" class=""  style="width: auto; height: 45px; margin-top: 20px;" alt="">
                </a>

                <div class="navbar-nav w-100">
                    <a href="/viewIndex" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2" style="color: #191C24;"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="inputNilai" class="nav-link" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2" style="color: #191C24;"></i>Input Nilai</a>
                    </div>
                    <a href="editcpmk" class="nav-item nav-link"><i class="fa fa-chart-bar me-2" style="color: #191C24;"></i>Edit CMPK</a>
                    <a href="raport" class="nav-item nav-link"><i class="fa fa-table me-2" style="color: #191C24;"></i>Raport</a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


       <!-- Content Start -->
       <div class="content" style="border-radius: 60px 0px 0px 60px; ">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand  sticky-top px-4 pt-4" style="background-color: white; border-radius: 60px 0px 0px 60px;">
            <div style="display: flex; align-items: center; justify-content: space-between; width: 100%;" >
                <div>
                    <a href="#" class="sidebar-toggler flex-shrink-0" id="tiga_strip" style="margin: auto; margin-left: 0;">
                        <i class="fa fa-bars" style="color: white;"></i>
                    </a>
                </div>
                
                <div class="navbar-nav align-items-center ms-auto" >
            
                    <div class="navbar-atas d-flex" >
                        <!-- notification -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <i id="bell-icon" class="fa fa-bell"></i>
                                <!-- <span class="d-none d-lg-inline-flex">Notificatin tai</span> -->
                            </a>
                            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                    @if (Session::has('profile_updated'))
                                        <a href="#" class="dropdown-item">
                                        <h6 class="fw-normal mb-0">{{ session('profile_updated')['message'] }}</h6>
                                        <small>{{ session('profile_updated')['time'] }}</small>
                                    </a>
                                @endif
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
                                <a href="#" class="dropdown-item">Edit Profile</a>
                                <a href="logout" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>



        <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="edit-personal" style="margin-bottom: 5%;">
                <div class="edit-profile" style=" margin-bottom: 2%; color: black; font-size: 3rem; font-weight: bold; font-family: 'Outfit'; text-align: center; margin-left: 1.5%;">
                    <p>Edit Profile</p>
                </div>
                <div style="width: 100%; display: flex; justify-content: center;">
                    @auth
                        @if(Auth::user()->image)
                            <img src="{{ asset('users/' . Auth::user()->image) }}" alt="image" style="width: 85px; height: 85px;" class="rounded-circle">
                        @else
                            <img src="{{ asset('users/profiledefault.png') }}" alt="default profile image" style="width: 85px; height: 85px;" class="rounded-circle">
                        @endif
                    @else
                        <img src="{{ asset('users/profiledefault.png') }}" alt="default profile image" style="width: 85px; height: 85px;" class="rounded-circle">
                    @endauth
                </div>
                <div style="width: 50%; margin: 0 auto; margin-top: 3%;" >
                    <div class="mb-3 d-flex justify-content-center">
                        <label for="image">Profile Picture</label>
                        <input type="file" name="image" class="form-control-file" id="image" style="max-width: 250px; max-height: 250px;">
                        @error('image')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="input-name" class="form-label" style="color: black; font-size: 1em; font-family: 'Outfit';">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" style="background-color: white; border: 1px solid grey;" value={{Auth::user()->name}}>
                    </div>
                    <div class="mb-3">
                        <label for="input-peran" class="form-label" style="color: black; font-size: 1em; font-family: 'Outfit';">Peran</label>
                        <select class="form-select mb-3" aria-label="Default select example" id="peran" name="peran" style="background-color: white; font-family: 'Outfit'; border: 1px solid grey;">
                            <option selected style="font-family: 'Outfit'">Pilih Peranan Anda</option>
                            <option value="pjmk" style="font-family: 'Outfit'">PJMK</option>
                            <option value="admin" style="font-family: 'Outfit'">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="input-prodi" class="form-label" style="color: black; font-size: 1em; font-family: 'Outfit';">Prodi</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="prodi" id="prodi" style="background-color: white; font-family: 'Outfit'; border: 1px solid grey;">
                            <option selected>Pilih Prodi Anda</option>
                            <option value="rn" style="font-family: 'Outfit'">Rekayasa Nanoteknologi</option>
                            <option value="te" style="font-family: 'Outfit'">Teknik Elektro</option>
                            <option value="ti" style="font-family: 'Outfit'">Teknik Industri</option>
                            <option value="trkb" style="font-family: 'Outfit'">Teknik Robotika dan Kecerdasan Buatan</option>
                            <option value="tsd" style="font-family: 'Outfit'">Teknologi Sains Data</option>
                        </select>
                    </div>
                    <div class=" mb-3">
                        <label for="input-nik" class="form-label" style="color: black; font-size: 1em; font-family: 'Outfit';">NIK</label>
                        <input type="number" class="form-control" id="nik" name="nik"  style="background-color: white; border: 1px solid grey;" value={{Auth::user()->nik}}>
                    </div>
                    <button type="submit" class="btn btn-success rounded-pill m-2">Simpan Edit</button>
                </div>
            </div>
        </form>

        
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
    <script src="js/maindash.js"></script>
    <style>
        .fa-bell.animate {
            animation: bellAnimation 1s infinite;
            color: rgb(194, 0, 0)
        }
    
        @keyframes bellAnimation {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
    
    <script>
        // Animasi bell jika ada notifikasi profile_updated
        document.addEventListener("DOMContentLoaded", function() {
            var bellIcon = document.getElementById("bell-icon");
            var profileUpdatedNotification = document.querySelector(".dropdown-menu .dropdown-item");
    
            if (profileUpdatedNotification) {
                bellIcon.classList.add("animate");
            }
    
            bellIcon.addEventListener("click", function() {
                bellIcon.classList.remove("animate");
            });
        });
    </script>
    
    
</body>

</html>
