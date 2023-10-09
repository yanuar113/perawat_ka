<!DOCTYPE html>
<html>

<head>
    <title>Print Photos</title>
    <style>
        @page {
            margin: 0px;
        }

        body {
            margin-top: 1.5cm;
            margin-left: 1cm;
            margin-right: 1cm;
            margin-bottom: 1.5cm;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
            /* font-size: 0.9rem; */
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td {
            text-align: center;
            padding: 8px;
            border: 1px solid black;
        }

        .header {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .photo {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            text-align: center;
            width: 80px;
            display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
        }

        .date {
            font-size: 12px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="header">
        <h4>Foto Checksheet Perawatan Harian Kereta KRL/KFW Solo Bulan Juni 2023</h4>
    </div>
    <table>
        {{-- @foreach ($photos->chunk(3) as $chunk)
            <tr>
                @foreach ($chunk as $photo)
                    <td>
                        <div class="photo">
                            <img src="{{ $photo->url }}" width="200" height="200">
                            <div class="date">{{ $photo->date }}</div>
                        </div>
                    </td>
                @endforeach
            </tr>
        @endforeach --}}
        {{-- <thead>
                <tr>
                    <th colspan="3" style="text-align: center;">Foto</th>
                </tr>
            </thead> --}}
        <tbody>
            <tr>
                <td> 
                    <div class="photo">
                        {{-- <img src="{{ $photo->url }}" width="200" height="200">
                            <div class="date">{{ $photo->date }}</div> --}}
                        <img src="" alt="contoh gambar">
                        <div class="date">tanggal</div>
                        <div class="date">alamat foto</div>
                    </div>
                    <div class="photo">
                        <img src="" alt="contoh gambar">
                        <div class="date">tanggal</div>
                        <div class="date">alamat foto</div>
                    </div>
                    <div class="photo">
                        <img src="" alt="contoh gambar">
                        <div class="date">tanggal</div>
                        <div class="date">alamat foto</div>
                    </div>
                    <div class="photo">
                        <img src="" alt="contoh gambar">
                        <div class="date">tanggal</div>
                        <div class="date">alamat foto</div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
