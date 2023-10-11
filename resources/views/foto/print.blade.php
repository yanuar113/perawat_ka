<!DOCTYPE html>
<html>

<head>
    <title>Print Foto - nama kereta</title>
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
        h5{
            margin: 0px;
        }

        p {
            text-align: center;
            margin: 5px;
        }

        img {
            width: 40%;
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
        <h5>DOKUMENTASI PERAWATAN HARIAN PERIODE SEPTEMBER 2023</h5>
        <h5>KERETA PERINTIS KRDE MAKASAR-PARE-PARE</h5>
    </header>
    <div class="container">
        @forelse ($detail as $item)
            <div class="photo">
                @php
                    $imagePath = public_path('foto/' . $item->foto);
                @endphp
                <img src="{{ $imagePath }}" alt="{{ $item->nama_item }}">
            </div>
            <p>{{ $item->datetime }}</p>
            <p>{{ $item->nama_item }}</p>
        @empty
            <p>Tidak ada foto</p>
        @endforelse
    </div>
</body>

</html>
