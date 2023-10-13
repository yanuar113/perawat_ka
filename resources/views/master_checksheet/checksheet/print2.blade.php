<!DOCTYPE html>
<html>

<head>
    <title>Checksheet - {{ $detail->nama_kereta }}</title>
    <style>
        /* CSS untuk styling lembar list */
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin-top: 0.3cm;
            /* margin-bottom: 0.3cm; */
        }

        .text {
            text-transform: uppercase;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        /* .kelas {
            page-break-after: avoid;
        }

        .kelas tr,
        .kelas td {
            page-break-inside: avoid;
        } */

        .kelas th,
        .kelas td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td>.underline {
            display: inline-block;
            border-bottom: 2px solid black;
        }

        .header-table {
            margin-bottom: 20px;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .logo-container img {
            margin-bottom: 5px;
        }

        .icon {
            width: 28px;
        }

        .page-break {
            page-break-before: always;
        }

        header {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            height: 2cm;
        }

        h5 {
            margin: 0px;
            font-size: 18px;
        }

        p {
            text-align: center;
            margin: 5px;
        }

        .container {
            margin-top: 1.8cm;
        }

        .photo img {
            width: 40%;
        }

        .photo {
            border: 1px solid black;
            padding: 8px;
            margin-top: 0.3cm;
            margin-left: 8rem;
            margin-right: 8rem;
            text-align: center;
        }

        @page {
            margin-top: 0.3cm;
            margin-bottom: 2.5cm;
        }

        @page :first {
            margin-top: 0.3cm;
            header: first-page-header;
        }

        @page :header {
            content: "DOKUMENTASI PERAWATAN HARIAN PERIODE SEPTEMBER 2023\n{{ $detail->nama_kereta }}";
            margin-top: 0.3cm;
        }

        @page :nth-child(n+4) {
            header: third-page-header;
            margin-top: 0.3cm;
        }

        @page :nth-child(2) {
            header: no-header;
        }

        @page fourth-page {
            margin-top: 5cm;
            content: "Header on the fourth page content";
        }

        .header-on-fourth-page {
            position: unset;
            ;
            top: 0;
            left: 1cm;
            right: 1cm;
            height: 5cm;
        }
    </style>
</head>

<body>
    <header style="position: fixed">
        <h5>DOKUMENTASI PERAWATAN HARIAN PERIODE SEPTEMBER 2023</h5>
        <h5 class="text">{{ $detail->nama_kereta }}</h5>
    </header>
    <div class="container">
        @forelse ($photo as $item)
            <div class="photo">
                @php
                    $imagePath = 'https://perawatan-ka.herly.tech/foto/' . $item->foto;
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
