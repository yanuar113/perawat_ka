<!DOCTYPE html>
<html>

<head>
    <title>Print Foto - {{ $detail[0]->nama_kereta }}</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin-top: 2cm;
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
            font-size: 22px;
            font-weight: bold;
            text-align: center;
            position: fixed;
            top: 0.5cm;
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
            padding: 18px;
            /* margin-top: 0.7px;
            margin-left: 8rem;
            margin-right: 8rem; */
            text-align: center;
            width: 355px;
            alignt-self: center;
            margin: auto;
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
                    // $gambar = 'https://pka.dotech.cfd/public/foto/' . $item->foto;
                    $filePath = public_path('foto/' . $item->foto);
                    $gambar = file_get_contents($filePath);
                    $gambar = base64_encode($gambar);
                    $gambar = 'data:image/jpeg;base64,' . $gambar;
                @endphp
                <img src="{{ $gambar }}" alt="{{ $item->nama_item }}" width="340px" height="265px"
                    style="object-fit: fill">
            </div>
            <p>{{ $item->nama_item }}</p>
        @empty
            <p>Tidak ada foto</p>
        @endforelse
    </div>
</body>

</html>
