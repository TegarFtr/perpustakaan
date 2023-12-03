<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Laporan Perpustakaan - Nama Anggota</title>
        <link
            rel="stylesheet"
            href="{{ asset('css/bootsrtap.min.css') }}"
        />
        <link
            rel="stylesheet"
            href="\{{ asset('css/dataTable.bootstrap.min.css') }}"
        />
        <link
            rel="icon"
            type="icon"
            href="{{ asset('AdminLTE') }}/dist/img/tutwuri.png"
        />
        <style>
            @font-face {
                font-family: "Quicksand";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(../../fonts/6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58m-wi40.woff2)
                    format("woff2");
                unicode-range: U+0102-0103, U+0110-0111, U+0128-0129,
                    U+0168-0169, U+01A0-01A1, U+01AF-01B0, U+1EA0-1EF9, U+20AB;
            }

            /* latin-ext */
            @font-face {
                font-family: "Quicksand";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(../../fonts/6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58i-wi40.woff2)
                    format("woff2");
                unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020,
                    U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
            }

            /* latin */
            @font-face {
                font-family: "Quicksand";
                font-style: normal;
                font-weight: 400;
                font-display: swap;
                src: url(../../fonts/6xK-dSZaM9iE8KbpRA_LJ3z8mH9BOJvgkP8o58a-wg.woff2)
                    format("woff2");
                unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC,
                    U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122,
                    U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
            }
        </style>
    </head>

    <body onload="window.print()" style="font-family: Quicksand, sans-serif">
        <img
            src="{{ asset('AdminLTE') }}/dist/img/logo2.png"
            style="
                height: 90px;
                width: 90px;
                margin-top: 10px;
                margin-left: 10px;
                margin-bottom: -50px;
            "
        />
        <img
            src="{{ asset('AdminLTE') }}/dist/img/tutwuri.png"
            style="
                display: block;
                margin-left: auto;
                width: 90px;
                margin-bottom: -70px;
                margin-top: -38px;
                margin-right: 5px;
            "
        />
        <h3
            class="text-center"
            style="font-family: Quicksand, sans-serif; margin-top: -30px"
        >
            .:: Laporan Perpustakaan ::.
        </h3>
        <p style="font-size: 12px" class="text-center">
            Jl. P. Sudirman No.24, Puri, Plangitan, Kec. Pati, Kabupaten Pati,
            Jawa Tengah<br />
            Email : perpussmanpati@e-perpus.com | Nomor Telpon : 6281221545666
        </p>
        <hr />
        <table class="table table-striped table-bordered" id="example1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Denda</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
                    @foreach ($data as $d)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $d->nama_peminjam }}</td>
                            <td>{{ $d->judul }}</td>
                            <td>{{ $d->tanggal_peminjaman }}</td>
                            <td>{{ $d->tanggal_pengembalian }}</td>
                            <td>{{ $d->denda }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </tbody>
        </table>
        <p style="text-align: center">
            Laporan Perpustakaan Berdasarkan Nama Anggota ({{ $namaAnggota }})
        </p>
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    </body>
</html>
