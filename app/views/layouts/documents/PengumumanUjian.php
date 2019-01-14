<?php 
if (@$isPreview) {
    ## Put your preview variable here        
}
?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pengumuman Ujian Skripsi dan Komprehensip</title>
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
    <table class = "tableKop" cellSpacing="5" cellPadding = '5'>
        <tr>
            <td style="width: 1cm;"></td>
            <td style="width: 2.5cm;">
                Nomor
            </td>
            <td> : </td>
            <td style = "width:10cm;">
                $$no$$
            </td>            
            <td style = "align:right;">
                $$tanggal$$
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                Hal
            </td>
            <td> : </td>
            <td><b>Ujian Skripsi dan Komprehensip</b></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Program Studi $$prodi$$</b></td>
            <td></td>
        </tr>
        <tr>
            <td colspan = "4" style = "font-size:11pt;">
                <br/>
                KEPADA<br/>
                YTH SAUDARA:
            </td>
        </tr> 
    </table>
    <div style = "text-align:center;">
        <table class = "tableContent" style = "width:100%;">
            <tr>
                <th>TIM</th>
                <th>Nama Mahasiswa</th>
                <th>NIM</th>
                <th>Nama Dosen Penguji</th>
            </tr>
            <?php
            foreach ($dataTim as $k=>$data) {
                foreach ($data['mhs'] as $l=>$d) {
                    if ($l == 0) {
                        $strPenguji = implode('<br/>',$data['penguji']);
            ?>
                        <tr>
                            <td style = "text-align:center;" rowspan = <?php echo '"' . count($data['mhs']) . '"';?> > 
                                <?php echo $data['kode'];?>
                            </td>
                            <td>
                                <?php echo $d['nama'];?>
                            </td>
                            <td>
                                <?php echo $d['nim'];?>
                            </td>
                            <td rowspan = <?php echo '"' . count($data['mhs']) . '"';?>>
                                <?php echo $strPenguji;?>
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
    <table class = "tableKop" cellSpacing="5" cellPadding = '5'>
        <tr>
            <td style="width: 1cm;"></td>
            <td style = "text-align:justify;">
                <br/>
                Dengan ini diberitahukan bahwa Ujian Sripsi dan Komprehensip untuk Saudara diselenggarakan pada :
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <table>
                    <tr>
                        <td style = "width: 1cm;"></td>
                        <td style = "width: 3cm;">Hari & tanggal</td>
                        <td> : </td>
                        <td><b>$$hariUjian$$, $$tanggalUjian$$</b></td>
                    </tr>
                    <tr>
                        <td style = "width: 1cm;"></td>
                        <td style = "width: 3cm;">Pukul</td>
                        <td> : </td>
                        <td><b>$$jamUjian$$</b></td>
                    </tr>
                    <tr>
                        <td style = "width: 1cm;"></td>
                        <td style = "width: 3cm; vertical-align:top;">Tempat</td>
                        <td style = "vertical-align:top;"> : </td>
                        <td>
                            <table>
                            <?php
                            foreach ($dataTim as $k=>$data) {
                            ?>
                                <tr>
                                    <td style = "width:2cm;"><b>TIM <?php echo $data['kode'];?></b></td>
                                    <td><b> : </b></td>
                                    <td><b><?php echo $data['tempat'];?></b></td>
                                </tr>
                            <?php
                            }
                            ?>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 1cm;"></td>
            <td>
                <br/>
                Demikian harap diperhatikan.
            </td>
        </tr>
        <tr>
            <td></td>
            <td style = "text-align:justify;">
                <table>
                    <tr>
                        <td style = "width: 50%;"></td>
                        <td>
                            <br/><br/>
                            Koordinator Program Studi $$prodi$$
                        </td>    
                    </tr>
                    <tr>
                        <td colspan = "2">
                            <br/><br/><br/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>$$namaKaprodi$$</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>NIP. $$nipKaprodi$$</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
            <td style = "text-align:center;">
                    <br/>
                    <b>LAKI-LAKI: KEMEJA WARNA PUTIH MEMAKAI DASI, CELANA WARNA HITAM</b>
                    <br/>
                    <b>PEREMPUAN: KEMEJA WARNA PUTIH, ROK WARNA HITAM</b>
                    <br/>
                    <div style = "font-size:14pt;">
                        <b>HARAP MEMAKAI JAS ALMAMATER</b>
                    </div>
            </td>
        </tr>
    </table>
</body>
</html>
