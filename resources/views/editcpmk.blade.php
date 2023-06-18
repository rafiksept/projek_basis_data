@extends('mastercpmk')

@section('content')
    <div class="container">
        <div class="judul-table" style="color: black; font-size: 3rem; margin-bottom: 20px; margin-top: 0px;">
        Edit CPMK
        </div>

        {{-- Info --}}
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{-- End Info --}}

        {{-- Filter --}}
        <form action="/editcpmk" method="GET" id="filterForm" onchange="submitForm()">
            <div class="filter">
                <label for="prodi_filter" style="font-family: 'Outfit'; font-size: x-large; color: black; font-weight: bold;">Program Studi</label>
                <select name="prodi_filter" id="prodi_filter" class="form-control" onchange="submitForm()">
                    <option value="TSD">Teknologi Sains Data</option>
                    <option value="TRKB">Teknik Robotika dan Kecerdasan Buatan</option>
                    <option value="TE">Teknik Elektro</option>
                    <option value="TI">Teknik Industri</option>
                    <option value="RN">Rekayasa Nanoteknologi</option>
                </select>
            </div>
        </form>
        <script>
            function submitForm() {
                document.getElementById('filterForm').submit();
            }

            document.addEventListener('DOMContentLoaded', function() {
                var prodiFilter = "{{ $prodiFilter }}";
                var prodiDropdown = document.getElementById('prodi_filter');

                // Memeriksa nilai prodiFilter dan mengatur opsi terpilih di dropdown
                if (prodiFilter === 'TSD') {
                    prodiDropdown.value = 'TSD';
                } else if (prodiFilter === 'TE') {
                    prodiDropdown.value = 'TE';
                } else if (prodiFilter === 'RN') {
                    prodiDropdown.value = 'RN';
                } else if (prodiFilter === 'TRKB') {
                    prodiDropdown.value = 'TRKB';
                } else {
                    prodiDropdown.value = 'TI';
                }

                // Menyembunyikan opsi "-- Semua Program Studi --" jika TSD dipilih
                prodiDropdown.addEventListener('change', function() {
                    var optionSemuaProdi = prodiDropdown.querySelector('option[value=""]');
                    if (prodiDropdown.value !== '') {
                        optionSemuaProdi.style.display = 'none';
                    } else {
                        optionSemuaProdi.style.display = 'block';
                    }
                });
            });
        </script>
        {{-- End Filter --}}

        {{-- Upload File --}}
        <div class="upload-container flex d-flex justify-content-end">
            <label class="flex d-flex align-content-center" for="file_upload"> Upload File </label>
                <button class="btn" onclick="showPopup()">
                    <img src="{{asset("img/iconUpload.svg")}}" alt="upload icon" class="iconup">
                </button>
            

        {{-- Pop Up --}}
        <style>
            .blur-background {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                backdrop-filter: blur(5px);
                z-index: 999;
                display: none;
            }
            .hidden.popup {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                background-color: transparent;
                padding: 20px;
                border-radius: 5px;
                z-index: 1000;
                display: none;
            }
        </style>

        <div id="popup" class="hidden popup">
            <div class="wrapper" style="z-index: 2">
                <div class="text-form">
                <h1>Upload File</h1>
                <p>
                    File berupa csv/xlsx yang berisi nilai/bobot dari mata kuliah per-prodi
                </p>
                </div>
                <div class="file-container">
                <label for="file-input" class="file-label">
                    <form class="m-0" id="import-form" action="/import-excel" method="POST" enctype="multipart/form-data">
                    @csrf
                        <input class="file-input" type="file" name="excel_file" id="file-input" style="display: none" />
                        <i class="fas fa-cloud-upload-alt"></i>
                        <p>Browse File untuk diupload</p>
                    
                        <div class="button-container">
                            <button class="save-button" type="button" onclick="confirmImport()">Simpan File</button>
                            <button type="button" class="kembali-button" onclick="closePopup()">Kembali</button>
                        </div>
                    </form>
                </label>
                </div>
            </div>
            </div>

            <div class="blur-background"></div>

            <script>
            function showPopup() {
                var popup = document.getElementById("popup");
                var blurBackground = document.querySelector(".blur-background");

                popup.style.display = "block";
                blurBackground.style.display = "block";
            }

            function closePopup() {
                var popup = document.getElementById("popup");
                var blurBackground = document.querySelector(".blur-background");

                popup.style.display = "none";
                blurBackground.style.display = "none";
            }
            </script>

            <script>
            document.addEventListener("DOMContentLoaded", function () {
                var fileInput = document.querySelector(".file-input");

                fileInput.addEventListener("change", function () {
                var fileLabel = document.querySelector(".file-label");
                fileLabel.querySelector("p").textContent = fileInput.files[0].name;
                });
            });

            function confirmImport() {
                var form = document.getElementById("import-form");
                form.submit();
            }
            </script>

        </div>
            <br /><br />
            
        {{-- Table --}}
        <style>
            .kuk{
                width: 5rem;
            }
        </style>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">No</th>
                                <th style="background-color: #0E5CA9; font-weight: bold" class="text-center">Mata Kuliah</th>
                                @if ($data->pluck('S1')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S1</th>	
                                @endif
                                @if ($data->pluck('S2')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S2</th>	
                                @endif
                                @if ($data->pluck('S3')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S3</th>	
                                @endif
                                @if ($data->pluck('S4')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S4</th>
                                @endif
                                @if ($data->pluck('S5')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S5</th>
                                @endif
                                @if ($data->pluck('S6')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S6</th>
                                @endif
                                @if ($data->pluck('S7')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S7</th>
                                @endif
                                @if ($data->pluck('S8')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S8</th>
                                @endif
                                @if ($data->pluck('S9')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S9</th>
                                @endif
                                @if ($data->pluck('S10')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S10</th>
                                @endif
                                @if ($data->pluck('S11')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">S11</th>
                                @endif
                                @if ($data->pluck('KU1')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU1</th>	
                                @endif
                                @if ($data->pluck('KU2')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU2</th>	
                                @endif
                                @if ($data->pluck('KU3')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU3</th>	
                                @endif
                                @if ($data->pluck('KU4')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU4</th>
                                @endif
                                @if ($data->pluck('KU5')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU5</th>
                                @endif
                                @if ($data->pluck('KU6')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU6</th>
                                @endif
                                @if ($data->pluck('KU7')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU7</th>
                                @endif
                                @if ($data->pluck('KU8')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU8</th>
                                @endif
                                @if ($data->pluck('KU9')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KU9</th>
                                @endif
                                @if ($data->pluck('P1')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">P1</th>	
                                @endif
                                @if ($data->pluck('P2')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">P2</th>	
                                @endif
                                @if ($data->pluck('P3')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">P3</th>	
                                @endif
                                @if ($data->pluck('P4')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">P4</th>
                                @endif
                                @if ($data->pluck('P5')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">P5</th>
                                @endif
                                @if ($data->pluck('P6')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">P6</th>
                                @endif
                                @if ($data->pluck('P7')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">P7</th>
                                @endif
                                @if ($data->pluck('KK1')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK1</th>	
                                @endif
                                @if ($data->pluck('KK2')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK2</th>	
                                @endif
                                @if ($data->pluck('KK3')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK3</th>	
                                @endif
                                @if ($data->pluck('KK4')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK4</th>
                                @endif
                                @if ($data->pluck('KK5')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK5</th>
                                @endif
                                @if ($data->pluck('KK6')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK6</th>
                                @endif
                                @if ($data->pluck('KK7')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK7</th>
                                @endif
                                @if ($data->pluck('KK8')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK8</th>
                                @endif
                                @if ($data->pluck('KK9')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK9</th>
                                @endif
                                @if ($data->pluck('KK10')->contains(fn($value) => $value > 0))
                                <th style="background-color: #0E5CA9; font-weight: bold;" class="text-center">KK10</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody id="myTableBody">
                                @foreach ($data as $key => $item)
                                    @php
                                        if ($prodiFilter === 'TSD') {
                                            $action = "/tsd/" . $item->id;
                                        } elseif ($prodiFilter === 'TI') {
                                            $action = "/ti/" . $item->id;
                                        } elseif ($prodiFilter === 'TE') {
                                            $action = "/te/" . $item->id;
                                        } elseif ($prodiFilter === 'TRKB') {
                                            $action = "/trkb/" . $item->id;
                                        } elseif ($prodiFilter === 'RN') {
                                            $action = "/rn/" . $item->id;
                                        } else {
                                            $action = "/tsd/" . $item->id;
                                        }
                                    @endphp
                                    <tr class="align-items-center">
                                        <td class='text-dark text-center'>{{ $key + 1 }}</td>
                                        <td class='text-dark text-center'>{{ $item->Mata_Kuliah }}</td>
                                        {{-- S --}}
                                        @if ($data->pluck('S1')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S1 }}" value="{{ old('S1', $item->S1) }}" name='S1' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S2')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S2 }}" value="{{ old('S2', $item->S2) }}" name='S2' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S3')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S3 }}" value="{{ old('S3', $item->S3) }}" name='S3' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S4')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S4 }}" value="{{ old('S4', $item->S4) }}" name='S4' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S5')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S5 }}" value="{{ old('S5', $item->S5) }}" name='S5' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S6')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S6 }}" value="{{ old('S6', $item->S6) }}" name='S6' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S7')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S7 }}" value="{{ old('S7', $item->S7) }}" name='S7' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S8')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S8 }}" value="{{ old('S8', $item->S8) }}" name='S8' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S9')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S9 }}" value="{{ old('S9', $item->S9) }}" name='S9' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S10')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S10 }}" value="{{ old('S10', $item->S10) }}" name='S10' class="nilai-input text-center kuk" />
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('S11')->contains(fn($value) => $value > 0))
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->S11 }}" value="{{ old('S11', $item->S11) }}" name='S11' class="nilai-input text-center kuk" />
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif

                                        {{-- KU --}}
                                        @if ($data->pluck('KU1')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU1 }}" value="{{ old('KU1', $item->KU1) }}" name='KU1' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU2')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU2 }}" value="{{ old('KU2', $item->KU2) }}" name='KU2' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU3')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU3 }}" value="{{ old('KU3', $item->KU3) }}" name='KU3' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU4')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU4 }}" value="{{ old('KU4', $item->KU4) }}" name='KU4' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU5')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU5 }}" value="{{ old('KU5', $item->KU5) }}" name='KU5' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU6')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU6 }}" value="{{ old('KU6', $item->KU6) }}" name='KU6' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU7')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU7 }}" value="{{ old('KU7', $item->KU7) }}" name='KU7' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU8')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU8 }}" value="{{ old('KU8', $item->KU8) }}" name='KU8' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KU9')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KU9 }}" value="{{ old('KU9', $item->KU9) }}" name='KU9' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif

                                        {{-- P --}}
                                        @if ($data->pluck('P1')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->P1 }}" value="{{ old('P1', $item->P1) }}" name='P1' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('P2')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->P2 }}" value="{{ old('P2', $item->P2) }}" name='P2' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('P3')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->P3 }}" value="{{ old('P3', $item->P3) }}" name='P3' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('P4')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->P4 }}" value="{{ old('P4', $item->P4) }}" name='P4' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('P5')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->P5 }}" value="{{ old('P5', $item->P5) }}" name='P5' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('P6')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->P6 }}" value="{{ old('P6', $item->P6) }}" name='P6' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('P7')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->P7 }}" value="{{ old('P7', $item->P7) }}" name='P7' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif

                                        {{-- KK --}}
                                        @if ($data->pluck('KK1')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK1 }}" value="{{ old('KK1', $item->KK1) }}" name='KK1' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK2')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK2 }}" value="{{ old('KK2', $item->KK2) }}" name='KK2' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK3')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK3 }}" value="{{ old('KK3', $item->KK3) }}" name='KK3' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK4')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK4 }}" value="{{ old('KK4', $item->KK4) }}" name='KK4' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK5')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK5 }}" value="{{ old('KK5', $item->KK5) }}" name='KK5' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK6')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK6 }}" value="{{ old('KK6', $item->KK6) }}" name='KK6' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK7')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK7 }}" value="{{ old('KK7', $item->KK7) }}" name='KK7' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK8')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK8 }}" value="{{ old('KK8', $item->KK8) }}" name='KK8' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK9')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK9 }}" value="{{ old('KK9', $item->KK9) }}" name='KK9' class="nilai-input text-center kuk"/>
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
                                        @endif
                                        @if ($data->pluck('KK10')->contains(fn($value) => $value > 0))
                                        <form action="{{ $action }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                            <td class="kuk">
                                                <input type="text" placeholder="{{ $item->KK10 }}" value="{{ old('KK10', $item->KK10) }}" name='KK10' class="nilai-input text-center kuk" />
                                                <input type="hidden" name="prodi_filter" value="{{ $prodiFilter }}">
                                            </td>
                                        </form>
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
        {{-- <input type="submit" value="Simpan Edit" class="submit-button-hh" /> --}}
        <!-- Content End -->
@endsection
