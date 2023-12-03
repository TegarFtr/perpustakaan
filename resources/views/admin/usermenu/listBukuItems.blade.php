@foreach ($data as $ls)
    <div class="col">
        <div class="card">
            <img src="{{ asset("$ls->image") }}" class="card-img-top" alt="Gambar Buku">
            <div class="card-body">
                <h3 class="card-title"><strong>{{ $ls->judul }}</strong></h3>
                <p class="card-text">{{ $ls->pengarang }}</p>
                <p class="card-stock">Stok : {{ $ls->stok }}</p>
                <a href="#" class="btn btn-secondary">Pinjam</a>
            </div>
        </div>
    </div>
@endforeach
