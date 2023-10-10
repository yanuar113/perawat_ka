<!DOCTYPE html>
<html>

<head>
    <style>
        /* CSS untuk styling lembar checklist */
        /* Sesuaikan sesuai kebutuhan Anda */
        body {
            font-family: Arial, sans-serif;
            font-size: 13px;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

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

        .header-section {
            margin-bottom: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .header-section div {
            flex: 0 0 48%;
            /* 48% width for each div */
            margin-bottom: 10px;
        }

        .header-section input {
            width: calc(100% - 10px);
            /* 100% width minus padding */
        }

        .header-table {
            margin-bottom: 20px;
        }

        .logo-container {
            display: flex;
            flex-direction: column;
            /* justify-content: flex-end;
      align-items: flex-end; */
            margin-bottom: 20px;
            padding: 10px;
        }

        .logo-container img {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <div class="logo-container">
        <img src="https://assets.kompasiana.com/items/album/2016/05/31/logo-kereta-api-baru-cdr-574d84880123bda309d001d0.png?t=o&v=770"
            alt="Logo KAI" style="height: 50px;">
        <img src="https://upload.wikimedia.org/wikipedia/commons/f/f4/Logo_INKA_-_Industri_Kereta_Api_Indonesia.svg"
            alt="Logo PT INKA" style="height: 50px; margin-top:1rem; margin-left:14rem;">
        <img src="https://imsservice.co.id/assets/logo/logo-md.png" alt="Logo PT IMSS"
            style="height: 40px; margin-bottom:1rem;">
    </div>

    <h3 style="text-align: center;"> CHECK SHEET PERAWATAN RAILBUS <BR> PEMERIKSAAN HARIAN</h3>

    <div class="header-table">
        <table style="border:0px;">
            <tr>
                <td>Hari/Tanggal:</td>
                <td>No. Kereta:</td>
            </tr>
            <tr>
                <td>Jam Engine:</td>
                <td>Jam:</td>
            </tr>
        </table>
    </div>


    <table class="kelas">
        <thead>
            <tr>
                <th rowspan="2">No</th>
                <th style="text-align: center;" rowspan="2">Uraian Pekerjaan</th>
                <th style="text-align: center;" colspan="2">Dilakukan</th>
                <th style="text-align: center;" colspan="2">Hasil</th>
                <th rowspan="2">Keterangan</th>
            </tr>
            <tr>
                <th>YA</th>
                <th>TIDAK</th>
                <th>BAIK</th>
                <th>TIDAK</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> KELOMPOK BOOGIE </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pengecekan Axle bearing (16 buah)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pemeriksaan Suspensi Primer (8 buah)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pemeriksaan Suspensi sekunder</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pemeriksaan Air Spring</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pemeriksaan Levelling Valve</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> KELOMPOK ENGINE DAN SISTEM PROPULSI </td>
            </tr>
            <tr>
                <td></td>
                <td><b>ENGINE</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pemeriksaan V-Belt (Alternator & Charging Battery)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pemeriksaan Pulley Alternator Charging Battery</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pemeriksaan level oli engine (pelumas mesin diesel)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pemeriksaan level air radiator</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pemeriksaan kebocoran oli pada engine</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Pemeriksaan pembuangan air di filter HSD</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Pemeriksaan Saluran udara</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Pemeriksaan ketidaknormalan suara engine</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Pemeriksaan visual rubber mounting engine</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Pemeriksaan visual rubber hose</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Pemeriksaan connector ECM (Electronic Control Module)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><b>SISTEM PROPULSI</b></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pemeriksaan visual pada bogie (4 Set)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pemeriksaan level oli pada gearbox (tambah jika kurang)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pemeriksaan fungsi motor traksi (2 Unit)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> KELOMPOK PENGEREMAN DAN SUPLAI UDARA </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pemeriksaan tekanan udara pada Min Reservoir dan Brake</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pemeriksaan fungsi kerja pengereman (service brake, parking brake, dan emergency brake)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pemeriksaan Remblok (ganti bila tipis)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Pemeriksaan jalur pemipaan (piping)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pemeriksaan kompresor (fungsi kompresor, pressure switch fovernor, dan air kondensasi)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Pemeriksaan level oli pada kompresor (min-max dipstick)</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> KELOMPOK ALAT PERANGKAI MEKANIK </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pemeriksaan visual automatic coupler</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pemeriksaan visual bar coupler</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> KELOMPOK EKSTERIROR DAN INTERIOR KERETA </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pemeriksaan kelengkapan dan fungsi peralatan pintu</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> KELOMPOK ELEKTRIK DAN PERALATAN KERETA </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pemeriksaan visual junction box dan electric coupler</td>
                <td></td>u
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Pemeriksaan visual dan fungsi panel kontrol</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pemeriksaan fungsi peralatan elektrik (horn, headlight, lampu sinyal, lampu penerangan, lampu emergency, blower ruangan, exhaust fan, deadman system, wiper, washer, pintu penumpang, kondisi tegangan 24V DC, dan kondisi tegangan 380V AC</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> KELOMPOK PANEL LISTRIK </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pembersihan dan pemeriksaan kondisi komponen (panel distribusi, panel relay, panel batere, panel kontrol, panel kompresor udara, switch pada dashboard, dan koneksi perkabelan.</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td style="border: 1px solid #ccc; font-weight:bold;" colspan="7"> SISTEM PENDINGIN UDARA </td>
            </tr>
            <tr>
                <td>1</td>
                <td>Pemeriksaan fungsi AC</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>1</td>
                <td>PENGAWALAN DALAM DINAS KA RAILBUS PERINTIS</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>

</body>

</html>
