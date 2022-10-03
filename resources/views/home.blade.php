@extends('layout.template')

@section('container')
    <div class="row">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">PT. Savana Madani Teknologi</h5>
                <p>Secara umum, PT. Savana Madani Teknologi (Samalogi) bergerak di bidang Peralatana Laboratorium dan
                    Simulator
                    selama beberapa tahun terakhir.
                    Client perusahaan berada di lingkungan pemerintah maupun swasta, diantaranya Kementrian Perhubungan,
                    Kementrian
                    Kelautan, Kementrian Kominfo,
                    Kementrian Pendidikan dan Budaya. Pekerjaan pengadaan peralatan Laboratorium dan Simulator yang
                    pernah
                    digarap
                    pun cukup bervariasi,
                    diantaranya Computer Based Training (CBT), Simulator GMDSS, Steam Turbine Simulator, dan Gas Turbine
                    Simulator.</p>
                <p>
                    PT. Savana Madani Teknologi (Samalogi) berdomisili di Jakarta dan memiliki workshop di Kota Cimahi,
                    tepatnya
                    di
                    Gedung BITC
                    (Baros Information Technology and Creativity Center) Lt. 2, Jl. HMS Mintareja Sarjana Hukum, Baros,
                    Kec.
                    Cimahi
                    Tengah, Kota Cimahi, Jawa Barat 40521.
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 d-flex align-items-stretch ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Biaya Marketing</h5>
                    <p class="mb-4">
                        Halaman ini berisi data Biaya Marketing di PT. SAVANA MADANI TEKNOLOGI.
                        Untuk melihat datanya klik Tombol dibawah.
                    </p>

                    <div> <a href="/bmarketing" class="btn btn-primary btn-sm" style="background:#1C62AB;"><i class="bi bi-cash-coin"></i> Biaya Marketing </a></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Perolehan Proyek</h5>
                    <p class="mb-4">
                        Halaman ini berisi data Perolehan Proyek di PT. SAVANA MADANI TEKNOLOGI.
                        Untuk melihat datanya klik Tombol dibawah.
                    </p>

                    <div> <a href="/pproyek" class="btn btn-primary btn-sm" style="background:#1C62AB;"><i class="bi bi-card-checklist"></i> Perolehan Proyek </a></div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 d-flex align-items-stretch ">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Buku Kas Harian</h5>
                    <p>Halaman ini berisi data Buku Kas Harian di PT. SAVANA MADANI TEKNOLOGI.
                        Untuk melihat datanya klik Tombol dibawah.
                    </p>
                        <div> <a href="/bks" class="btn btn-primary btn-sm" style="background:#1C62AB;"><i class="bi bi-clipboard-data"></i> Buku Kas Harian </a></div>
                </div>
            </div>
        </div>

    </div>
@endsection
