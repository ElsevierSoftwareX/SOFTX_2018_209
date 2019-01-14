<?php 
if (@$isPreview) {
    ## Put your preview variable here        
}
?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SK Penguji</title>
    <style>
        /** Put your style here **/
        table { 
            border-collapse: collapse;
            overflow: wrap;
        }
        .tableKop .tableContent td {
            font-size:11pt;
          }
        .tableKop .tableContent th {
            font-size:11pt;
        } 
        .tableContent td{
            border: 1px solid black;
            padding : 2px 8px;
        }
        .tableContent th{
            text-align:center;
            border: 1px solid black;
            color:black;
            background-color:#c4c4c4;
            padding : 2px 8px;
        }
        .content {
            padding-left:38px;
        }
    </style>
</head>
<body>
    $$kop$$
    <br/>
    <p style="text-align:center;width:100%;font-size:13pt"><b><u>SURAT TUGAS</u></b></p>
    <p style="text-align:center;width:100%">Nomor: $$no$$</p>
    <br/>
    <table class = 'tableContent' cellSpacing="5" cellPadding = '5'>
                <tr>
            <td colspan="2" style="text-align:justify;width:100%">Berdasarkan Surat Keputusan Dekan Fakultas Ekonomi dan Bisnis Universitas Airlangga Nomor: 2109/H3.1.4/PP/KD/2011 tanggal 1 Oktober 2011 tentang Pengangkatan Dosen Pembimbing dan Penguji, Skripsi, Thesis, dan Disertasi pada Program Sarjana dan Pascasarjana di Lingkungan Fakultas Ekonomi dan Bisnis Universitas Airlangga, maka dengan ini:</td>
            <td></td>
        </tr>
        <tr style="height:25px"><td colspan = "4"><br/><br/></td></tr>
        <tr>
            <td colspan="2" style="text-align:justify;width:100%">Ketua Program Studi S1 Akuntansi menugaskan kepada Staf Pengajar Program Studi S1 Akuntansi untuk menjadi <b>panitia penguji</b> dalam ujian skripsi bagi mahasiswa program sarjana Program Studi S1 Akuntansi Fakultas Ekonomi dan Bisnis Universitas Airlangga.</td>
            <td></td>
        </tr>
        <tr style="height:25px"><td colspan = "4"><br/><br/></td></tr>
        <tr>
            <td colspan="2" style="text-align:justify;width:100%">Nama personel panitia penguji dan nama mahasiswa yang diuji seperti tercantum pada lampiran surat ini.</td>
            <td></td>
        </tr>
        <tr style="height:25px"><td colspan = "4"><br/><br/></td></tr>
        <tr>
            <td colspan="2" style="text-align:justify;width:100%">Demikian surat tugas ini dibuat, untuk dilaksanakan dengan sebaik-baiknya dan dengan penuh tanggungjawab.</td>
            <td></td>
        </tr>
        <tr style="height:100px"><td colspan = "4"><br/><br/><br/><br/></td></tr>
    </table>
    <table>
        <tr>
            <td style = "width: 5cm;"></td>
            <td>Surabaya, $$tanggal$$</td>    
        </tr>
        <tr>
            <td style = "width: 5cm;"></td>
            <td>Ketua Departemen $$prodi$$</td>    
        </tr>
        <tr>
            <td colspan = "2">
            <br/><br/><br/><br/><br/>
            </td>
        </tr>
        <tr>
        <td></td>
        <td><b><u>Drs. Agus Widodo M., M.Si., Ak., CMA., CA</u></b></td>
        </tr>
        <tr>
        <td></td>
        <td>NIP. 196008291987011001</td>
        </tr>
        <br/><br/><br/><br/><br/><br/>
        <tr>
            <td style="width:50%"><b>Tembusan Yth:</b></td>
            <td></td>
        </tr>
        <tr>
            <td style="width:50%">1. Wakil Dekan I FEB UA</td>
            <td></td>
        </tr>
        <tr>
            <td style="width:50%">2. Dosen yang bersangkutan</td>
            <td></td>
        </tr>
    </table>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <table class = 'tableKop' cellSpacing="10" cellPadding = '10' style = "font-size:11pt;">
        <tr>
            <td style = "width: 2cm;vertical-align:top">Lampiran</td>
            <td style = "vertical-align:top">:</td>
            <td >Surat tugas untuk menjadi panitia penguji dalam ujian skripsi dan komprehensip bagi mahasiswa program sarjana(S1) Alih Jenis Program Studi $$prodi$$ Fakultas Ekonomi dan Bisnis Universitas Airlangga</td>
        </tr>
        <br/><br/>
        <tr>
            <td style = "width: 2cm;vertical-align:top">Nomor</td>
            <td style = "vertical-align:top">:</td>
            <td>$$no$$</td>
        </tr>
        <br/><br/>
        <tr>
            <td style = "width: 2cm;vertical-align:top">Tgl. Ujian</td>
            <td style = "vertical-align:top">:</td>
            <td >$$tanggal$$</td>
        </tr>
    </table>
    <br/><br/>
        <div style = "text-align:center;">
        <table class = "tableContent" style = "width:100%;">
            <tr>
                <th>TIM</th>
                <th>Nama Penguji</th>
                <th>Jabatan</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
            </tr>
            <?php
            foreach ($dataTim as $k=>$data) {
                foreach ($data['mhs'] as $l=>$d) {
                    if ($l == 0) {
                        //$strPenguji = implode('<br/>',$data['penguji']);
                        $strNamaPenguji = implode('<br/>', array_column($data['penguji'], 'nama'));
                        $strPosisiPenguji = implode('<br/>', array_column($data['penguji'], 'posisi'));
            ?>
                        <tr>
                            <td style = "text-align:center;width:50px" rowspan = <?php echo '"' . count($data['mhs']) . '"';?> > 
                                <?php echo $data['kode'];?>
                            </td>
                            <td style="width:300px" rowspan = <?php echo '"' . count($data['mhs']) . '"';?>>
                                <?php echo $strNamaPenguji;?>
                            </td>
                            <td style="width:75px" rowspan = <?php echo '"' . count($data['mhs']) . '"';?>>
                                <?php echo $strPosisiPenguji;?>
                            </td>
                            <td style="width:150px">
                                <?php echo $d['nama'];?>
                            </td>
                            <td style="width:100px">
                                <?php echo $d['nim'];?>
                            </td>
                        </tr>
            <?php
                    } else {
            ?>
                        <tr>
                            <td><?php echo $d['nama'];?></td>
                            <td><?php echo $d['nim'];?></td>
                        </tr>      
            <?php
                    }
                }
            }
            ?>
        </table>
    </div>
</body>
</html>
