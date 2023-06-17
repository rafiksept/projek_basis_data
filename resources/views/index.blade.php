<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CPL | Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Boxicons css -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/table.css" rel="stylesheet">
    <link href="css/styledash.css" rel="stylesheet">
    <link rel="icon" type="png" href="img/Logo UNAIR.png">
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0" style="background: #0E5CA9;">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <img src="img/logo_ftmm.png" class="" style="width: auto; height: 45px; margin-top: 20px;" alt="">
                </a>

                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"
                            style="color: #191C24;"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="inputNilai.html" class="nav-link"><i class="fa fa-laptop me-2"
                                style="color: #191C24;"></i>Input Nilai</a>

                        <a href="editcpmk.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"
                                style="color: #191C24;"></i>Edit CMPK</a>

                        <a href="raport.html" class="nav-item nav-link"><i class="fa fa-table me-2"
                                style="color: #191C24;"></i>Raport</a>
                    </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content" style="border-radius: 60px 0px 0px 60px;">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand  sticky-top px-4 pt-4">
                <a href="#" class="sidebar-toggler flex-shrink-0" id="tiga_strip">
                    <i class="fa fa-bars" style="color: white;"></i>
                </a>

                <h1 style="color: black; margin-left: 15px;">Dashboard</h1>

                <div class="navbar-nav align-items-center ms-auto">

                    <div class="navbar-atas d-flex">
                        <!-- notification -->
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link" data-bs-toggle="dropdown">
                                <i class="fa fa-bell" style="width: 20px;"></i>
                                <!-- <span class="d-none d-lg-inline-flex">Notificatin tai</span> -->
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
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
                                <img class="rounded-circle" src="img/user.jpg" alt=""
                                    style="width: 40px; height: 40px;">
                                <!-- <span class="d-none d-lg-inline-flex">John Doe</span> -->
                            </a>
                            <div
                                class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                                <a href="edit-profile" class="dropdown-item">Edit Profile</a>
                                <a href="#" class="dropdown-item">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <div class="label">
                <div class="filter" style="margin-top: 3%;">
                    <label for="prodi-filter" style="font-family: 'Outfit'; font-size: x-large; color: black; font-weight: bold;">Program Studi</label>
                    <select id="prodi-filter" name="prodi-filter">
                        <option value="Select">-- Pilih Program Studi --</option>
                        <option value="TSD">Teknologi Sains Data</option>
                        <option value="TRKB">Teknik Robotika dan Kecerdasan Buatan</option>
                        <option value="TE">Teknik Elektro</option>
                        <option value="TI">Teknik Industri</option>
                        <option value="RN">Rekayasa Nanoteknologi</option>
                    </select>
                </div>

                <script>
                    // Function to handle form submission
                    function submitForm() {
                        // Get the selected value from the select element
                        var selectedProdi = document.getElementById('prodi-filter').value;

                        // Redirect to the appropriate route based on the selected value
                        if (selectedProdi === 'TSD') {
                            window.location.href = '/viewIndex?prodi-filter=TSD';
                        } else if (selectedProdi === 'TRKB') {
                            window.location.href = '/viewIndex?prodi-filter=TRKB';
                        } else if (selectedProdi === 'TE') {
                            window.location.href = '/viewIndex?prodi-filter=TE';
                        } else if (selectedProdi === 'TI') {
                            window.location.href = '/viewIndex?prodi-filter=TI';
                        } else if (selectedProdi === 'RN') {
                            window.location.href = '/viewIndex?prodi-filter=RN';
                        }
                    }

                    // Attach the submitForm function to the form's submit event
                    document.getElementById('prodi-filter').addEventListener('change', submitForm);
                </script>

                <div class="button">
                    <div id="cpl-dashboard">
                        <a href="viewCpl" style="position: relative; right: 90%; bottom: 10%;">Lihat Deskripsi CPL</a>
                    </div>
                </div>
            </div>

            <!-- tabel -->
            <div class="outer-wrapper">
               <div class="table-wrapper">
                <table>
                    <thead>
                        <th>Mata Kuliah</th>
                        @if ($selectedProdi === 'TSD')
                            <th>S1</th>
                            <th>S2</th>
                            <th>S3</th>
                            <th>S4</th>
                            <th>S5</th>
                            <th>S6</th>
                            <th>S7</th>
                            <th>S8</th>
                            <th>S9</th>
                            <th>S10</th>
                            <th>S11</th>
                            <th>KU1</th>
                            <th>KU2</th>
                            <th>KU3</th>
                            <th>KU4</th>
                            <th>KU5</th>
                            <th>KU6</th>
                            <th>KU7</th>
                            <th>KU8</th>
                            <th>KU9</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>KK1</th>
                            <th>KK2</th>
                            <th>KK3</th>
                            <th>KK4</th>
                        @elseif ($selectedProdi === 'TRKB')
                            <th>S1</th>
                            <th>S2</th>
                            <th>S3</th>
                            <th>S4</th>
                            <th>S5</th>
                            <th>S6</th>
                            <th>S7</th>
                            <th>S8</th>
                            <th>S9</th>
                            <th>S10</th>
                            <th>S11</th>
                            <th>KU1</th>
                            <th>KU2</th>
                            <th>KU3</th>
                            <th>KU4</th>
                            <th>KU5</th>
                            <th>KU6</th>
                            <th>KU7</th>
                            <th>KU8</th>
                            <th>KU9</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>KK1</th>
                            <th>KK2</th>
                            <th>KK3</th>
                            <th>KK4</th>
                            <th>KK5</th>
                        @elseif ($selectedProdi === 'TE')
                            <th>S1</th>
                            <th>S2</th>
                            <th>S3</th>
                            <th>S4</th>
                            <th>S5</th>
                            <th>S6</th>
                            <th>S7</th>
                            <th>S8</th>
                            <th>S9</th>
                            <th>S10</th>
                            <th>S11</th>
                            <th>KU1</th>
                            <th>KU2</th>
                            <th>KU3</th>
                            <th>KU4</th>
                            <th>KU5</th>
                            <th>KU6</th>
                            <th>KU7</th>
                            <th>KU8</th>
                            <th>KU9</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>KK1</th>
                            <th>KK2</th>
                            <th>KK3</th>
                            <th>KK4</th>
                            <th>KK5</th>
                            <th>KK6</th>
                            <th>KK7</th>
                            <th>KK8</th>
                            <th>KK9</th>
                            <th>KK10</th>
                        @elseif ($selectedProdi === 'TI')
                            <th>S1</th>
                            <th>S2</th>
                            <th>S3</th>
                            <th>S4</th>
                            <th>S5</th>
                            <th>S6</th>
                            <th>S7</th>
                            <th>S8</th>
                            <th>S9</th>
                            <th>S10</th>
                            <th>S11</th>
                            <th>KU1</th>
                            <th>KU2</th>
                            <th>KU3</th>
                            <th>KU4</th>
                            <th>KU5</th>
                            <th>KU6</th>
                            <th>KU7</th>
                            <th>KU8</th>
                            <th>KU9</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>KK1</th>
                            <th>KK2</th>
                            <th>KK3</th>
                            <th>KK4</th>
                            <th>KK5</th>
                            <th>KK6</th>
                            <th>KK7</th>
                            <th>KK8</th>
                            <th>KK9</th>
                            <th>KK10</th>
                        @elseif ($selectedProdi === 'RN')
                            <th>S1</th>
                            <th>S2</th>
                            <th>S3</th>
                            <th>S4</th>
                            <th>S5</th>
                            <th>S6</th>
                            <th>S7</th>
                            <th>S8</th>
                            <th>S9</th>
                            <th>S10</th>
                            <th>S11</th>
                            <th>KU1</th>
                            <th>KU2</th>
                            <th>KU3</th>
                            <th>KU4</th>
                            <th>KU5</th>
                            <th>KU6</th>
                            <th>KU7</th>
                            <th>P1</th>
                            <th>P2</th>
                            <th>P3</th>
                            <th>P4</th>
                            <th>P5</th>
                            <th>P6</th>
                            <th>P7</th>
                            <th>KK1</th>
                            <th>KK2</th>
                            <th>KK3</th>
                            <th>KK4</th>
                            <th>KK5</th>
                            <th>KK6</th>
                        @else
                            <th>CPL</th>
                        @endif
                    </thead>
                    <tbody>
                        @foreach($view_index as $view)
                            <tr>
                                <td>{{$view->mata_kuliah}}</td>
                                @if ($selectedProdi === 'TSD')
                                    <td>{{$view->s1}}</td>
                                    <td>{{$view->s2}}</td>
                                    <td>{{$view->s3}}</td>
                                    <td>{{$view->s4}}</td>
                                    <td>{{$view->s5}}</td>
                                    <td>{{$view->s6}}</td>
                                    <td>{{$view->s7}}</td>
                                    <td>{{$view->s8}}</td>
                                    <td>{{$view->s9}}</td>
                                    <td>{{$view->s10}}</td>
                                    <td>{{$view->s11}}</td>
                                    <td>{{$view->ku1}}</td>
                                    <td>{{$view->ku2}}</td>
                                    <td>{{$view->ku3}}</td>
                                    <td>{{$view->ku4}}</td>
                                    <td>{{$view->ku5}}</td>
                                    <td>{{$view->ku6}}</td>
                                    <td>{{$view->ku7}}</td>
                                    <td>{{$view->ku8}}</td>
                                    <td>{{$view->ku9}}</td>
                                    <td>{{$view->p1}}</td>
                                    <td>{{$view->p2}}</td>
                                    <td>{{$view->p3}}</td>
                                    <td>{{$view->p4}}</td>
                                    <td>{{$view->kk1}}</td>
                                    <td>{{$view->kk2}}</td>
                                    <td>{{$view->kk3}}</td>
                                    <td>{{$view->kk4}}</td>
                                @elseif ($selectedProdi === 'TRKB')
                                    <td>{{$view->s1}}</td>
                                    <td>{{$view->s2}}</td>
                                    <td>{{$view->s3}}</td>
                                    <td>{{$view->s4}}</td>
                                    <td>{{$view->s5}}</td>
                                    <td>{{$view->s6}}</td>
                                    <td>{{$view->s7}}</td>
                                    <td>{{$view->s8}}</td>
                                    <td>{{$view->s9}}</td>
                                    <td>{{$view->s10}}</td>
                                    <td>{{$view->s11}}</td>
                                    <td>{{$view->ku1}}</td>
                                    <td>{{$view->ku2}}</td>
                                    <td>{{$view->ku3}}</td>
                                    <td>{{$view->ku4}}</td>
                                    <td>{{$view->ku5}}</td>
                                    <td>{{$view->ku6}}</td>
                                    <td>{{$view->ku7}}</td>
                                    <td>{{$view->ku8}}</td>
                                    <td>{{$view->ku9}}</td>
                                    <td>{{$view->p1}}</td>
                                    <td>{{$view->p2}}</td>
                                    <td>{{$view->p3}}</td>
                                    <td>{{$view->p4}}</td>
                                    <td>{{$view->p5}}</td>
                                    <td>{{$view->p6}}</td>
                                    <td>{{$view->kk1}}</td>
                                    <td>{{$view->kk2}}</td>
                                    <td>{{$view->kk3}}</td>
                                    <td>{{$view->kk4}}</td>
                                    <td>{{$view->kk5}}</td>
                                @elseif ($selectedProdi === 'TE')
                                    <td>{{$view->s1}}</td>
                                    <td>{{$view->s2}}</td>
                                    <td>{{$view->s3}}</td>
                                    <td>{{$view->s4}}</td>
                                    <td>{{$view->s5}}</td>
                                    <td>{{$view->s6}}</td>
                                    <td>{{$view->s7}}</td>
                                    <td>{{$view->s8}}</td>
                                    <td>{{$view->s9}}</td>
                                    <td>{{$view->s10}}</td>
                                    <td>{{$view->s11}}</td>
                                    <td>{{$view->ku1}}</td>
                                    <td>{{$view->ku2}}</td>
                                    <td>{{$view->ku3}}</td>
                                    <td>{{$view->ku4}}</td>
                                    <td>{{$view->ku5}}</td>
                                    <td>{{$view->ku6}}</td>
                                    <td>{{$view->ku7}}</td>
                                    <td>{{$view->ku8}}</td>
                                    <td>{{$view->ku9}}</td>
                                    <td>{{$view->p1}}</td>
                                    <td>{{$view->p2}}</td>
                                    <td>{{$view->p3}}</td>
                                    <td>{{$view->p4}}</td>
                                    <td>{{$view->p5}}</td>
                                    <td>{{$view->p6}}</td>
                                    <td>{{$view->p7}}</td>
                                    <td>{{$view->kk1}}</td>
                                    <td>{{$view->kk2}}</td>
                                    <td>{{$view->kk3}}</td>
                                    <td>{{$view->kk4}}</td>
                                    <td>{{$view->kk5}}</td>
                                    <td>{{$view->kk6}}</td>
                                    <td>{{$view->kk7}}</td>
                                    <td>{{$view->kk8}}</td>
                                    <td>{{$view->kk9}}</td>
                                    <td>{{$view->kk10}}</td>
                                @elseif ($selectedProdi === 'TI')
                                    <td>{{$view->s1}}</td>
                                    <td>{{$view->s2}}</td>
                                    <td>{{$view->s3}}</td>
                                    <td>{{$view->s4}}</td>
                                    <td>{{$view->s5}}</td>
                                    <td>{{$view->s6}}</td>
                                    <td>{{$view->s7}}</td>
                                    <td>{{$view->s8}}</td>
                                    <td>{{$view->s9}}</td>
                                    <td>{{$view->s10}}</td>
                                    <td>{{$view->s11}}</td>
                                    <td>{{$view->ku1}}</td>
                                    <td>{{$view->ku2}}</td>
                                    <td>{{$view->ku3}}</td>
                                    <td>{{$view->ku4}}</td>
                                    <td>{{$view->ku5}}</td>
                                    <td>{{$view->ku6}}</td>
                                    <td>{{$view->ku7}}</td>
                                    <td>{{$view->ku8}}</td>
                                    <td>{{$view->ku9}}</td>
                                    <td>{{$view->p1}}</td>
                                    <td>{{$view->p2}}</td>
                                    <td>{{$view->p3}}</td>
                                    <td>{{$view->p4}}</td>
                                    <td>{{$view->kk1}}</td>
                                    <td>{{$view->kk2}}</td>
                                    <td>{{$view->kk3}}</td>
                                    <td>{{$view->kk4}}</td>
                                    <td>{{$view->kk5}}</td>
                                    <td>{{$view->kk6}}</td>
                                    <td>{{$view->kk7}}</td>
                                    <td>{{$view->kk8}}</td>
                                    <td>{{$view->kk9}}</td>
                                    <td>{{$view->kk10}}</td>
                                @elseif ($selectedProdi === 'RN')
                                    <td>{{$view->s1}}</td>
                                    <td>{{$view->s2}}</td>
                                    <td>{{$view->s3}}</td>
                                    <td>{{$view->s4}}</td>
                                    <td>{{$view->s5}}</td>
                                    <td>{{$view->s6}}</td>
                                    <td>{{$view->s7}}</td>
                                    <td>{{$view->s8}}</td>
                                    <td>{{$view->s9}}</td>
                                    <td>{{$view->s10}}</td>
                                    <td>{{$view->s11}}</td>
                                    <td>{{$view->ku1}}</td>
                                    <td>{{$view->ku2}}</td>
                                    <td>{{$view->ku3}}</td>
                                    <td>{{$view->ku4}}</td>
                                    <td>{{$view->ku5}}</td>
                                    <td>{{$view->ku6}}</td>
                                    <td>{{$view->ku7}}</td>
                                    <td>{{$view->p1}}</td>
                                    <td>{{$view->p2}}</td>
                                    <td>{{$view->p3}}</td>
                                    <td>{{$view->p4}}</td>
                                    <td>{{$view->p5}}</td>
                                    <td>{{$view->p6}}</td>
                                    <td>{{$view->p7}}</td>
                                    <td>{{$view->kk1}}</td>
                                    <td>{{$view->kk2}}</td>
                                    <td>{{$view->kk3}}</td>
                                    <td>{{$view->kk4}}</td>
                                    <td>{{$view->kk5}}</td>
                                    <td>{{$view->kk6}}</td>
                                @else
                                    <td>{{$view->cpl}}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>

        </div>
    </div>

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
    <script src="js/maindash.js"></script>
    <script>
        const optionMenu = document.querySelector(".select-menu"),
            selectBtn = optionMenu.querySelector(".select-btn"),
            options = optionMenu.querySelectorAll(".option"),
            sBtn_text = optionMenu.querySelector(".sBtn-text");


        selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

        options.forEach(option => {
            option.addEventListener("click", () => {
                let selectedOption = option.querySelector(".option-text").innerText;
                sBtn_text.innerText = selectedOption;
                console.log(selectedOption)
            })
        })
    </script>
</body>

</html>