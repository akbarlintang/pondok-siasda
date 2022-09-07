<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Biodata</title>
    <style>
        body {
            margin: -40px;
            font-family: Arial, Helvetica, sans-serif;
        }
        
        .f20 {
            font-size: 20px;
        }

        .f14 {
            font-size: 14px;
        }

        .f12 {
            font-size: 12px;
        }

        .f10 {
            font-size: 10px;
        }

        .page-break {
            page-break-after: always;
            page-break-inside:avoid;
        }

        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 0.5cm;

            /** Extra personal styles **/
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- HALAMAN 1 GAN -->
    <div style="margin: 2em;">
        <div style="float: right">
            {{-- <img src="{{ url('storage/foto/'.$siswa->foto) }}" alt="{{ $siswa->nama }}" /> --}}
            <img src="{{ public_path('storage/public/foto/'.$siswa->foto) }}" alt="{{ $siswa->nama }}" style="max-width: 150px;" />
        </div>
        <table style="border: 0px solid black; width: 100%; border-collapse: collapse;" class="f12">
            <thead>
                <tr>
                    <th colspan="6" style="padding-top: 30px; padding-bottom: 30px;"><div class="f20">BIODATA PESERTA DIDIK</div></th>
                </tr>
                {{-- <tr>
                    <th colspan="6" style="padding-bottom: 30px;"><div class="f14">No. Invoice : {{ $transaksi->no_invoice }}</div></th>
                </tr> --}}
            </thead>
            <tbody>
                <tr class="f12">
                    <td colspan="6" style="">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Nama
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->nama_siswa }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        NIS
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->nis }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Jenis Kelamin
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Tempat / Tanggal Lahir
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->tempat_lahir }} / {{ $siswa->tanggal_lahir }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Agama
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->agama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Alamat
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->alamat }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" style="font-weight: bold; text-align: left; padding-top: 30px; padding-bottom: 20px;" class="f12">Sekolah Asal</td>
                </tr>
                <tr class="f12">
                    <td colspan="6" style="">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Nama Sekolah
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->asal_sekolah }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Alamat
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->alamat_asal_sekolah }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" style="font-weight: bold; text-align: left; padding-top: 30px; padding-bottom: 20px;" class="f12">Surat Tanda Kelulusan</td>
                </tr>
                <tr class="f12">
                    <td colspan="6" style="">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Tahun
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->tahun_lulus }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Nomor
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->no_surat_lulus }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" style="font-weight: bold; text-align: left; padding-top: 30px; padding-bottom: 20px;" class="f12">Diterima di sekolah ini</td>
                </tr>
                <tr class="f12">
                    <td colspan="6" style="">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Di tingkat
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ strtoupper($siswa->jenjang) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Pada tanggal
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ date('d F Y', strtotime($siswa->created_at)) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="6" style="font-weight: bold; text-align: left; padding-top: 30px; padding-bottom: 20px;" class="f12">Nama orang tua</td>
                </tr>
                <tr class="f12">
                    <td colspan="6" style="">
                        <table style="width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Nama Ayah
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->nama_ayah }}
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px; width: 30%;">
                                        Nama Ibu
                                    </td>
                                    <td style="padding: 10px; width: 5%;">:</td>
                                    <td style="padding: 10px;">
                                        {{ $siswa->nama_ibu }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <footer class="f10">
        Anda dapat cek progress transaksi dengan nomor invoice melalui www.millalaundry.id
    </footer> --}}
</body>

</html>
