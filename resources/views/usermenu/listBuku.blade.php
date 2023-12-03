@extends('layouts.master')
@section('activeListBuku', 'active')

@section('content')
    <section class="content-header">
        <h1 style="font-family: 'Quicksand', sans-serif; font-weight: bold;">
            List Buku
            <small>
                <script type='text/javascript'>
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                </script>
            </small>
        </h1>
    </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card mt-2">
                    <div class="card-header">
                        <h1 class="card-title">List Buku</h1>
                        <div class="card-tools">
                            <form action="{{ route('list-buku.index') }}" method="get" class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" id="searchInput" name="search" class="form-control float-right" placeholder="Search">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0" style="height: 680px;">
                        <div class="row row-cols-1 row-cols-md-6 g-4 ml-1 mr-1" id="bookList">
                            @foreach ($data as $ls)
                                <div class="col">
                                    <div class="card">
                                        <img src="{{ asset("$ls->image") }}" class="card-img-top" alt="Gambar Buku">
                                        <div class="card-body">
                                            <h3 class="card-title"><strong>{{ $ls->judul }}</strong></h3>
                                            <p class="card-text">{{ $ls->pengarang }}</p>
                                            <p class="card-stock">Stok : {{ $ls->stok }}</p>
                                            <a href="#" class="btn btn-secondary btn-pinjam" data-judul="{{ $ls->judul }}">Pinjam</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('.btn-pinjam').on('click', function () {
                    var judul = $(this).data('judul');

                    // Simpan judul ke sesi
                    $.ajax({
                        url: "{{ route('list-buku.save-to-session') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            judul: judul
                        },
                        success: function(response) {
                            // Redirect ke halaman peminjaman
                            window.location.href = "{{ route('peminjaman.index') }}";
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
