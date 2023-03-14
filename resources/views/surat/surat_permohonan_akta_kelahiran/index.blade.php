<html>

<head>
    <title>CETAK SURAT</title>
    <link rel="shoKADEScut icon" href="assets/img/logo_small.png">
    <link rel="stylesheet" href="assets/css/formsurat.css">
    <style type="text/css" media="print">
        @page {
            margin: 0;
        }

        body {
            margin: 1cm;
            margin-left: 16cm;
            margin-right: 16cm;
            font-family: "Times New Roman", Times, serif;
        }

    </style>
</head>

<body>
    <div>
        <table width="100%">
            <tr><img src="assets/img/logoSleman.jpg" alt="" class="logo"></tr>
            <div class="header">
                <h4 class="kop" style="text-transform: uppercase">PEMERINTAH KABUPATEN SLEMAN</h4>
                <h4 class="kop" style="text-transform: uppercase">KECAMATAN DEPOK</h4>
                <h4 class="kop" style="text-transform: uppercase">PEMERINTAH DESA CATURTUNGGAL</h4>
                <h5 class="kop2" style="text-transform: capitalize;">Jl. Kasuari No.2 Demangan Baru. Telp. (0274) 514826</h5>
                <div style="text-align: center;">
                    <hr>
                </div>
            </div>
            <br>


        </table>
        <br>
        <img src="assets/img/space.jpg" alt="" height="100" width="230" class="imgspace"></td>
        <div align="center"><u>
                <h4 class="kop">SURAT KETERANGAN</h4>
            </u>

            <span class="kop3"><b>Nomor :&nbsp;&nbsp;&nbsp; {{ $data['id'] }} -
                    {{ $data['created_date']->format('d-m-Y') }}</b> </span>

        </div>
        <br>
        <div class="clear"></div>
        <div id="isi3">
            <img src="assets/img/space.jpg" alt="" height="40" width="230" class="imgspace">
            <table width="100%">
                <tr>
                    <td class="indentasi">Yang bertanda tangan di bawah ini, <a
                            style="text-transform: capitalize;">Kepala Desa Caturtunggal, Kecamatan Depok,
                            Kabupaten Sleman</a>, menerangkan dengan sebenarnya bahwa :
                    </td>
                </tr>
            </table>
            <br><br>
            <table width="100%" style="text-transform: capitalize;">
                <tr>
                    <td width="30%" class="indentasi">N&nbsp;&nbsp;&nbsp;A&nbsp;&nbsp;&nbsp;M&nbsp;&nbsp;&nbsp;A</td>
                    <td width="2%">:</td>
                    <td width="68%" style="text-transform: uppercase; font-weight: bold;">{{ $data->user->nik->nama }}
                    </td>
                </tr>
                <tr>
                    <td class="indentasi">Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{ $data->user->nik->jenis_kelamin }}</td>
                </tr>

                <tr>
                    <td class="indentasi">Tempat/Tgl. Lahir</td>
                    <td>:</td>
                    <td>{{ $data->user->nik->tempat_lahir }}, {{ $data->user->nik->tanggal_lahir }}</td>
                </tr>
                <tr>
                    <td class="indentasi">Agama</td>
                    <td>:</td>
                    <td>{{ $data->user->nik->agama }}</td>
                </tr>
                <tr>
                    <td class="indentasi">Pekerjaan</td>
                    <td>:</td>
                    <td>{{ $data->user->nik->pekerjaan }}</td>
                </tr>
                <tr>
                    <td class="indentasi">NIK</td>
                    <td>:</td>
                    <td>{{ $data->user->nik->id_ktp }}</td>
                </tr>
                <tr>
                    <td class="indentasi">Alamat</td>
                    <td>:</td>
                    <td>{{ $data->user->nik->alamat }}, RT {{ $data->user->nik->rt }} /RW
                        {{ $data->user->nik->rw }} ,
                        Dusun {{ $data->user->nik->dusun }} , Desa {{ $data->user->nik->kelurahan }} , Kecamatan
                        {{ $data->user->nik->kecamatan }} , {{ $data->user->nik->kabupaten }}</td>
                </tr>
                <tr>
                    <td class="indentasi">Kewarganegaraan</td>
                    <td>:</td>
                    <td style="text-transform: uppercase;">{{ $data->user->nik->kewarganegaraan }}</td>
                </tr>
            </table>
            <br><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">Orang tersebut diatas benar-benar penduduk kami Desa <a
                            style="text-transform: capitalize;">@php echo 'Caturtunggal'; @endphp, Kecamatan
                            @php echo 'Depok';  @endphp, @__raw_block_3__@</a>. Bahwa nama yang bersangkutan berada di lingkungan desa caturtunggal.</td>
                </tr>
            </table><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">Surat keterangan ini dipergunakan untuk <a
                            style="text-transform: capitalize;"><u><b>{{ $data->kebutuhan }}.</a></u></b></td>
                </tr>
            </table><br>
            <table width="100%">
                <tr>
                    <td class="indentasi">Demikian surat keterangan ini dibuat dengan sebenar-benarnya dan digunakan
                        sebagaimana mestinya.</td>
                </tr>
            </table>
        </div>
        <br>
        <table width="100%" style="text-transform: capitalize;">

            <tr>
                <td width="10%"></td>
                <td width="30%"></td>
                <td width="10%"></td>
                <td align="center">
                    @php echo 'Caturtunggal'; @endphp,
                    @php
                        $tanggal = date('d F Y');
                        $bulan = date('F', strtotime($tanggal));
                        $bulanIndo = [
                            'January' => 'Januari',
                            'February' => 'Februari',
                            'March' => 'Maret',
                            'April' => 'April',
                            'May' => 'Mei',
                            'June' => 'Juni',
                            'July' => 'Juli',
                            'August' => 'Agustus',
                            'September' => 'September',
                            'October' => 'Oktober',
                            'November' => 'November',
                            'December' => 'Desember',
                        ];
                        echo date('d ') . $bulanIndo[$bulan] . date(' Y');
                    @endphp
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td align="center"><?php echo 'Kepala Desa Caturtunggal'; ?></td>
            </tr>



            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td align="center" style="text-transform: uppercase;"><img src="assets/img/Approval.jpg" alt=""
                        height="140" width="360"></td>
            </tr>
        </table>
    </div>

</body>

</html>