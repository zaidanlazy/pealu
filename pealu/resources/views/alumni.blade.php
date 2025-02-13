@extends('welcome')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($message = Session::get('update'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if ($message = Session::get('delete'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-evenly align-items-center">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#tambah" class="btn btn-success btn-sm">Tambah Data</a>
                    
                    <form action="{{ route('alumni.index') }}" method="GET" class="w-50 pt-3">
                        <div class="input-group">
                            <input id="search-focus" type="search" name="search" class="form-control" placeholder="Search" />
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-body text-capitalize">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama</th>
                                <th scope="col">jurusan</th>
                                <th scope="col">Tahun Lulus</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @forelse($alumni as $no => $a)
                            <tr>
                                <th scope="row">{{ ++$no }}</th>
                                <td>{{ $a->nis }}</td>
                                <td>{{ $a->nama_lengk}}</td>
                                <td>{{ $a->jur_sekolah}}</td>
                                <td>{{ $a->tahun_lulus}}</td>
                                <td class="text-center align-middle">
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#edit{{$a->id}}"
                                        class="btn btn-secondary btn-sm">Edit</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{$a->id}}"
                                        class="btn btn-danger btn-sm">Hapus</a>
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#lihat{{$a->id}}"
                                        class="btn btn-info btn-sm">Lihat</a><hr>
                                    <a href="{{ route('alumni.create', ['id' => $a->id]) }}" class="btn btn-primary btn-sm">Download</a>
                                </td>
                                @empty
                                <div class="alert alert-primary d-flex align-items-center" role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" 
                                        width="24" height="24" 
                                        class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" 
                                        viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <div>
                                        Data alumni Belum Ada
                                    </div>
                                </div>

                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <div>
                            Showing <b>{{ $alumni->firstItem() }}</b> to <b>{{ $alumni->lastItem() }}</b> of
                            <b>{{ $alumni->total() }}</b> results
                        </div>
                        <div>
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mb-0">
                                    <!-- Tombol Previous -->
                                    @if ($alumni->onFirstPage())
                                        <li class="page-item disabled">
                                            <span class="page-link">Previous</span>
                                        </li>
                                    @else
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $alumni->previousPageUrl() }}" rel="prev">Previous</a>
                                        </li>
                                    @endif

                                    <!-- Nomor Halaman -->
                                    @foreach ($alumni->links()->elements[0] as $page => $url)
                                        <li class="page-item {{ $alumni->currentPage() == $page ? 'active' : '' }}">
                                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                                        </li>
                                    @endforeach

                                    <!-- Tombol Next -->
                                    @if ($alumni->hasMorePages())
                                        <li class="page-item">
                                            <a class="page-link" href="{{ $alumni->nextPageUrl() }}" rel="next">Next</a>
                                        </li>
                                    @else
                                        <li class="page-item disabled">
                                            <span class="page-link">Next</span>
                                        </li>
                                    @endif
                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('modal')
<!-- Modal -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-capitalize">
                <form action="{{ route('alumni.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="number" class="form-control @error('nis')
      is-invalid
      @enderror" name="nis" placeholder="Masukkan NIS Dengan Benar">
                        @error('nis')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_lengk')
      is-invalid
      @enderror" name="nama_lengk" placeholder="Masukkan Nama Lengkap Siswa">
                        @error('nama_lengk')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control @error('jur_sekolah')
      is-invalid
      @enderror" name="jur_sekolah" placeholder="Contoh 'Rekayasa Perangkat Lunak'">
                        @error('jur_sekolah')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="text" class="form-control @error('tahun_lulus')
      is-invalid
      @enderror" name="tahun_lulus" placeholder="Contoh '2022-2025'">
                        @error('tahun_lulus')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nomor Telpon</label>
                        <input type="number" class="form-control @error('nomor_telp')
      is-invalid
      @enderror" name="nomor_telp" placeholder="Masukkan Nomor Telpon Dengan Benar">
                        @error('nomor_telp')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Alamat Rumah</label>
                        <textarea class="form-control @error('alamat_rum')
        is-invalid
      @enderror" name="alamat_rum" rows="3"></textarea>
                        @error('alamat_rum')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Wirausaha</label>
                        <div class="opacity-75 fst-italic">
                            *catatan: kosongkan bila tidak melakukan Wirausaha
                        </div>
                        <input type="text" class="form-control @error('wirausaha')
      is-invalid
      @enderror" name="wirausaha" placeholder="Masukkan Bidang Wirausaha">
                        @error('wirausaha') 
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select @error('status')
      is-invalid
      @enderror" name="status" aria-label="Pilih Status">
                            <option selected>Pilih</option>
                            <option value="1">Bekerja</option>
                            <option value="2">Kuliah</option>
                            <option value="3">Tidak Ada Kabar</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div id="bekerja-section" style="display: none;">
                        <div class="text-center">
                            <label class="form-label fw-bold">Bekerja</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control @error('nama_per')
        is-invalid
        @enderror" name="nama_per" placeholder="Masukan Nama Perusahaan">
                            @error('nama_per')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Tokoh</label>
                            <input type="text" class="form-control @error('nama_tok')
        is-invalid
        @enderror" name="nama_tok" placeholder="Masukan Nama Perusahaan">
                            @error('nama_tok')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi Bekerja</label>
                            <input type="text" class="form-control @error('lok_bekerja')
        is-invalid
        @enderror" name="lok_bekerja" placeholder="Masukan Lokasi Bekerja">
                            @error('lok_bekerja')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div id="kuliah-section" style="display: none;">
                        <div class="text-center">
                            <label class="form-label fw-bold">Kuliah</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jalur</label>
                            <select class="form-select @error('jalur')
        is-invalid
        @enderror" name="jalur" aria-label="Pilih Jalur">
                                <option selected>Pilih</option>
                                <option value="1">PTN</option>
                                <option value="2">PTS</option>
                                <option value="3">DINAS</option>
                            </select>
                            @error('jalur')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Perguruan Tinggi</label>
                            <input type="text" class="form-control @error('nama_perti')
        is-invalid
        @enderror" name="nama_perti" placeholder="Masukan Nama Perguruan Tinggi">
                            @error('nama_perti')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Jurusan Prodi</label>
                            <input type="text" class="form-control @error('jur_prodi')
        is-invalid
        @enderror" name="jur_prodi" placeholder="Masukan Jurusan Prodi">
                            @error('jur_prodi')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi Kuliah</label>
                            <input type="text" class="form-control @error('lok_kuliah')
        is-invalid
        @enderror" name="lok_kuliah" placeholder="Masukan Lokasi Kuliah">
                            @error('lok_kuliah')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">keluar</button>
                            <button type="submit" class="btn btn-success btn-sm">simpan</button>
                        </div>
                    

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const statusSelect = document.querySelector("select[name='status']");
    const jalurSelect = document.querySelector("select[name='jalur']");
    const bekerjaSection = document.getElementById("bekerja-section");
    const kuliahSection = document.getElementById("kuliah-section");

    // Fungsi untuk mengontrol visibilitas dan mengosongkan nilai jalur
    function toggleSections() {
        const status = statusSelect.value;

        if (status === "1") { // Jika "Bekerja" dipilih
            bekerjaSection.style.display = "block";
            kuliahSection.style.display = "none";
            jalurSelect.value = '';  // Mengosongkan nilai jalur
        } else if (status === "2") { // Jika "Kuliah" dipilih
            bekerjaSection.style.display = "none";
            kuliahSection.style.display = "block";
        } else { // Jika "Tidak Ada Kabar" dipilih
            bekerjaSection.style.display = "none";
            kuliahSection.style.display = "none";
            jalurSelect.value = '';  // Mengosongkan nilai jalur
        }
    }

    // Jalankan fungsi saat dropdown berubah
    statusSelect.addEventListener("change", toggleSections);

    // Jalankan fungsi sekali saat halaman dimuat
    toggleSections();
    });

</script>

@foreach($alumni as $a)
<!-- Modal Edit -->
<div class="modal fade" id="edit{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-capitalize">
                <form action="{{ route('alumni.update', $a->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">NIS</label>
                        <input type="number" class="form-control @error('nis')
      is-invalid
      @enderror" name="nis" value="{{ old('nis', $a->nis) }}" placeholder="Masukkan NIS Dengan Benar">
                        @error('nis')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control @error('nama_lengk')
      is-invalid
      @enderror" name="nama_lengk" value="{{ old('nama_lengk', $a->nama_lengk) }}" placeholder="Masukkan Nama Lengkap Siswa">
                        @error('nama_lengk')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Jurusan</label>
                        <input type="text" class="form-control @error('jur_sekolah')
      is-invalid
      @enderror" name="jur_sekolah" value="{{ old('jur_sekolah', $a->jur_sekolah) }}" placeholder="Contoh 'Rekayasa Perangkat Lunak'">
                        @error('jur_sekolah')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tahun Lulus</label>
                        <input type="text" class="form-control @error('tahun_lulus')
      is-invalid
      @enderror" name="tahun_lulus" value="{{ old('tahun_lulus', $a->tahun_lulus) }}" placeholder="Contoh '2022-2025'">
                        @error('tahun_lulus')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Nomor Telpon</label>
                        <input type="number" class="form-control @error('nomor_telp')
      is-invalid
      @enderror" name="nomor_telp" value="{{ old('nomor_telp', $a->nomor_telp) }}" placeholder="Masukkan Nomor Telpon Dengan Benar">
                        @error('nomor_telp')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">Alamat Rumah</label>
                        <textarea class="form-control @error('alamat_rum')
        is-invalid
      @enderror" name="alamat_rum" rows="3">{{ old('alamat_rum', $a->alamat_rum) }}</textarea>
                        @error('alamat_rum')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Wirausaha</label>
                        <div class="opacity-75 fst-italic">
                            *catatan: kosongkan bila tidak melakukan Wirausaha
                        </div>
                        <input type="text" class="form-control @error('wirausaha')
      is-invalid
      @enderror" name="wirausaha" value="{{ old('wirausaha', $a->wirausaha) }}" placeholder="Masukkan Bidang Wirausaha">
                        @error('wirausaha') 
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select class="form-select @error('status')
      is-invalid
      @enderror" name="status" aria-label="Pilih Status">
                            <option selected>Pilih</option>
                            <option value="1" {{ old('status', $a->status) == '1' ? 'selected' : '' }}>Bekerja</option>
                            <option value="2" {{ old('status', $a->status) == '2' ? 'selected' : '' }}>Kuliah</option>
                            <option value="3" {{ old('status', $a->status) == '3' ? 'selected' : '' }}>Tidak Ada Kabar</option>
                        </select>
                        @error('status')
                        <div class="alert alert-danger" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    
                    <div id="bekerja-section" style="display: none;">
                        <div class="text-center">
                            <label class="form-label fw-bold">Bekerja</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Perusahaan</label>
                            <input type="text" class="form-control @error('nama_per')
        is-invalid
        @enderror" name="nama_per" value="{{ old('nama_per', $a->nama_per) }}" placeholder="Masukan Nama Perusahaan">
                            @error('nama_per')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Tokoh</label>
                            <input type="text" class="form-control @error('nama_tok')
        is-invalid
        @enderror" name="nama_tok" value="{{ old('nama_tok', $a->nama_tok) }}" placeholder="Masukan Nama Perusahaan">
                            @error('nama_tok')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi Bekerja</label>
                            <input type="text" class="form-control @error('lok_bekerja')
        is-invalid
        @enderror" name="lok_bekerja" value="{{ old('lok_bekerja', $a->lok_bekerja) }}" placeholder="Masukan Lokasi Bekerja">
                            @error('lok_bekerja')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                    <div id="kuliah-section" style="display: none;">
                        <div class="text-center">
                            <label class="form-label fw-bold">Kuliah</label>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jalur</label>
                            <select class="form-select @error('jalur')
        is-invalid
        @enderror" name="jalur" value="{{ old('jalur', $a->jalur) }}" aria-label="Pilih Jalur">
                                <option value="" disabled {{ old('jalur', $a->jalur) == '' ? 'selected' : '' }}>Pilih</option>
                                <option value="1" {{ old('jalur', $a->jalur) == '1' ? 'selected' : '' }}>PTN</option>
                                <option value="2" {{ old('jalur', $a->jalur) == '2' ? 'selected' : '' }}>PTS</option>
                                <option value="3" {{ old('jalur', $a->jalur) == '3' ? 'selected' : '' }}>DINAS</option>
                            </select>
                            @error('jalur')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Perguruan Tinggi</label>
                            <input type="text" class="form-control @error('nama_perti')
        is-invalid
        @enderror" name="nama_perti" value="{{ old('nama_perti', $a->nama_perti) }}" placeholder="Masukan Nama Perguruan Tinggi">
                            @error('nama_perti')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Jurusan Prodi</label>
                            <input type="text" class="form-control @error('jur_prodi')
        is-invalid
        @enderror" name="jur_prodi" value="{{ old('jur_prodi', $a->jur_prodi) }}" placeholder="Masukan Jurusan Prodi">
                            @error('jur_prodi')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lokasi Kuliah</label>
                            <input type="text" class="form-control @error('lok_kuliah')
        is-invalid
        @enderror" name="lok_kuliah" value="{{ old('lok_kuliah', $a->lok_kuliah) }}" placeholder="Masukan Lokasi Kuliah">
                            @error('lok_kuliah')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>

                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-dismiss="modal">keluar</button>
                            <button type="submit" class="btn btn-success btn-sm">simpan</button>
                        </div>
                    

                </form>
            </div>

        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const statusSelect = document.querySelector("#edit{{$a->id}} select[name='status']");
    const jalurSelect = document.querySelector("#edit{{$a->id}} select[name='jalur']");
    const bekerjaSection = document.querySelector("#edit{{$a->id}} #bekerja-section");
    const kuliahSection = document.querySelector("#edit{{$a->id}} #kuliah-section");

    function toggleSections() {
        const status = statusSelect.value;

        if (status === "1") {
            bekerjaSection.style.display = "block";
            kuliahSection.style.display = "none";
            jalurSelect.value = '';  // Mengosongkan nilai jalur
        } else if (status === "2") {
            bekerjaSection.style.display = "none";
            kuliahSection.style.display = "block";
        } else {
            bekerjaSection.style.display = "none";
            kuliahSection.style.display = "none";
            jalurSelect.value = '';  // Mengosongkan nilai jalur
        }
    }

    statusSelect.addEventListener("change", toggleSections);
    toggleSections();
    });
</script>
@endforeach

@foreach($alumni as $a)
<!-- Modal Delete -->
<div class="modal fade" id="delete{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Yakin Ingin Menghapus Data <b>{{ $a->nama }}</b></p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">keluar</button>
                <form action="{{ route('alumni.destroy', $a->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                </form>


            </div>
        </div>
    </div>
</div>
@endforeach

@php
    // Mapping untuk status
    $status_map = [1 => 'Bekerja', 2 => 'Kuliah', 3 => 'Tidak Ada Kabar'];

    // Mapping untuk jalur (hanya untuk status 2 - Kuliah)
    $jalur_map = [1 => 'PTN', 2 => 'PTS', 3 => 'DINAS'];
@endphp
@foreach($alumni as $a)
<!-- Modal Tampil -->
<div class="modal fade" id="lihat{{$a->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Data Siswa</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <table class="table table-striped text-capitalize">
                <tr>
                    <th>1.</th>
                    <th scope="row">NIS</th>
                    <td>:</td>
                    <td>{{ $a->nis }}</td>
                </tr>   
                <tr>
                    <th>2.</th>
                    <th scope="row">Nama Lengkap</th>
                    <td>:</td>
                    <td>{{ $a->nama_lengk }}</td>
                </tr>
                <tr>
                    <th>3.</th>
                    <th scope="row">Jurusan</th>
                    <td>:</td>
                    <td>{{ $a->jur_sekolah }}</td>
                </tr>
                <tr>
                    <th>5.</th>
                    <th scope="row">Nomor Telpon</th>
                    <td>:</td>
                    <td>{{ $a->nomor_telp }}</td>
                </tr>
                <tr>   
                    <th>6.</th> 
                    <th scope="row">Alamat Rumah</th>
                    <td>:</td>
                    <td>{{ $a->alamat_rum }}</td>
                </tr>
                <tr>
                    <th>7.</th>
                    <th scope="row">Wiraisaha</th>
                    <td>:</td>
                    <td>{{ $a->wiraisaha }}</td>
                </tr>
                <tr>
                    <th>8.</th>
                    <th scope="row">Status</th>
                    <td>:</td>
                    <td>{{ $status_map[$a->status] ?? 'Tidak Diketahui' }}</td>
                </tr>
                <tr>
                    <th>9.</th>
                    <th scope="row">Nama Perusahaan</th>
                    <td>:</td>
                    <td>{{ $a->nama_per }}</td>
                </tr>
                <tr>
                    <th>10.</th>
                    <th scope="row">Nama Tokoh</th>
                    <td>:</td>
                    <td>{{ $a->nama_tok }}</td>
                </tr>
                <tr>
                    <th>11.</th>
                    <th scope="row">Lokasi Bekerja</th>
                    <td>:</td>
                    <td>{{ $a->lok_bekerja }}</td>
                </tr>
                <tr>
                    <th>12.</th>
                    <th scope="row">Jalur</th>
                    <td>:</td>
                    <td>{{ $a->status == 2 ? $jalur_map[$a->jalur] ?? 'Tidak Diketahui' : '' }}</td>
                </tr>
                <tr>
                    <th>13.</th>
                    <th scope="row">Nama Perguruan Tinggi</th>
                    <td>:</td>
                    <td>{{ $a->nama_perti }}</td>
                </tr>
                <tr>
                    <th>14.</th>
                    <th scope="row">Jurusan Prodi</th>
                    <td>:</td>
                    <td>{{ $a->jur_prodi }}</td>
                </tr>
                <tr>
                    <th>15.</th>
                    <th scope="row">Lokasi Kuliah</th>
                    <td>:</td>
                    <td>{{ $a->lok_kuliah }}</td>
                </tr>
            </table>

        </div>
    </div>
</div>
@endforeach
