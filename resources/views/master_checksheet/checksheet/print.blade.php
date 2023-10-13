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
            margin-left: 1cm;
        }

        /* @page {
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
        } */

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
    <div>
        <div class="logo-container">
            <img src="https://assets.kompasiana.com/items/album/2016/05/31/logo-kereta-api-baru-cdr-574d84880123bda309d001d0.png?t=o&v=770"
                alt="Logo KAI" style="height: 50px;">
            <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Logo_INKA_-_Industri_Kereta_Api_Indonesia.svg"
                alt="Logo PT INKA" style="height: 50px; margin-top: 1rem; margin-left: 18rem;">
            <img src="https://imsservice.co.id/assets/logo/logo-md.png" alt="Logo PT IMSS"
                style="height: 40px; margin-bottom: 1rem;">
        </div>

        <h3 style="text-align: center;" class="text"> SHEET PERAWATAN {{ $detail->nama_kereta }} <BR> PEMERIKSAAN
            {{ $detail->tipe == '0' ? 'HARIAN' : 'BULANAN' }}
        </h3>

        <div class="header-table">
            <table>
                <tr>
                    <td style="text-align: left;width: 5rem">Hari/Tanggal</td>
                    <td>: {{ $detail->tanggal }}</td>
                    <td style="text-align: left;width: 5rem">Jam Engine</td>
                    <td>: {{ $detail->jam_engine }}</td>
                </tr>
                <tr>
                    <td style="text-align: left;width: 5rem">No. Kereta</td>
                    <td>: {{ $detail->no_kereta }}</td>
                    <td>Jam</td>
                    <td>: {{ $detail->jam }}</td>
                </tr>
            </table>
        </div>

        <table class="kelas" style="background-color">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th style="text-align: center;" rowspan="2">Uraian Pekerjaan</th>
                    <th style="text-align: center;" colspan="2">Dilakukan</th>
                    <th style="text-align: center;" colspan="2">Hasil</th>
                    <th style="text-align: center;" rowspan="2">Keterangan</th>
                </tr>
                <tr>
                    <th>YA</th>
                    <th>TIDAK</th>
                    <th>BAIK</th>
                    <th>TIDAK</th>
                </tr>
            </thead>
            @foreach ($categories as $category)
                <tbody>
                    <tr>
                        <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> {{ $category->nama }}
                        </td>
                    </tr>
                    @forelse ($category->lists as $list)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $list->nama_item }}</td>
                            <td style="text-align: center">
                                @if ($list->dilakukan == '1')
                                    <img class="icon" src="templates/source/assets/images/check-symbol.png"
                                        alt="">
                                @endif
                            </td>
                            <td style="text-align: center">
                                @if ($list->dilakukan == '0')
                                    <img class="icon" src="templates/source/assets/images/check-symbol.png"
                                        alt="">
                                @endif
                            </td>
                            <td style="text-align: center">
                                @if ($list->hasil == '1')
                                    <img class="icon" src="templates/source/assets/images/check-symbol.png"
                                        alt="">
                                @endif
                            </td>
                            <td style="text-align: center">
                                @if ($list->hasil == '0')
                                    <img class="icon" src="templates/source/assets/images/check-symbol.png"
                                        alt="">
                                @endif
                            </td>
                            <td>{{ $list->keterangan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center">Tidak ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            @endforeach
        </table>

        <table style="margin-top: 5rem;">
            <tr style="text-align: center;">
                <td>Mengetahui:</td>
                <td>SPV RUAS LUAR</td>
                <td>PM PERAWATAN KA</td>
                <td>TEKNISI</td>
            </tr>
            <tr style="text-align: center;">
                <td>Assman. UPT Depo Lok Solo</td>
                <td>UPT Depo Lok Solo</td>
                <td>PT Inka Multi Solusi service</td>
                <td>PT Inka Multi Solusi service</td>
            </tr>
            <tr>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
                <td style="height: 75px"></td>
            </tr>
            <tr style="text-align: center;">
                <td><span class="underline">SUHANA SENJAYA</span></td>
                <td><span class="underline">TRI WIYONO</span></td>
                <td><span class="underline">____________</span> </td>
                <td><span class="underline">____________</span></td>
            </tr>
            <tr>
                <td style="vertical-align: top;text-align: center">NIPP. 44733</td>
                <td style="vertical-align: top;text-align: center"> NIPP. 41493</td>
            </tr>
        </table>
    </div>

</body>

</html>
