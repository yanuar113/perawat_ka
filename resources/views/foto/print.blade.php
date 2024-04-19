<!DOCTYPE html>
<html>

<head>
    <title>Print Foto - {{ $detail[0]->nama_kereta }}</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin-top: 3cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 1cm;
            /* border: 1px solid black; */
        }

        * {
            font-family: Verdana, Arial, sans-serif;
            /* font-size: 0.9rem; */
        }

        header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            position: fixed;
            top: 1cm;
            left: 1cm;
            right: 1cm;
        }

        h5 {
            margin: 0px;
        }

        p {
            text-align: center;
            margin: 5px;
        }

        img {
            /* width: 100%; */
        }

        .photo {
            border: 1px solid black;
            padding: 8px;
            margin-top: 0.7px;
            margin-left: 8rem;
            margin-right: 8rem;
            text-align: center;
        }

        .date {
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <header>
        <h5>DOKUMENTASI PERAWATAN HARIAN PERIODE {{ $bulan }} {{ $tahun }}</h5>
        <h5>KERETA {{ strtoupper($detail[0]->nama_kereta) }}</h5>
    </header>
    <div class="container">
        @forelse ($detail as $item)
            <div class="photo">
                @php
                    $imagePath = 'https://pka.dotech.cfd/public/foto/' . $item->foto;
                    // $gambar = file_get_contents('foto/' . $item->foto);
                    $gambar = base64_encode($gambar);
                    $gambar = 'data:image/jpeg;base64,' . $gambar;
                @endphp
                <img src="{{ $gambar }}" alt="{{ $item->nama_item }}" width="100%" height="250"
                    style="object-fit: fill">
            </div>
            <p>{{ $item->nama_item }}</p>
        @empty
            <p>Tidak ada foto</p>
        @endforelse
    </div>
</body>

</html>
