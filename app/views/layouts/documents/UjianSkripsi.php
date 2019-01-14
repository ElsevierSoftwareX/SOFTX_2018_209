<?php 
if (@$isPreview) {
    ## Put your preview variable here        
}
?> 

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ujian Skripsi dan Komprehensip</title>
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
        .content {
            padding-left:38px;
        }
    </style>
</head>
<body>
    $$kop$$
    <table class = 'tableKop' cellSpacing="5" cellPadding = '5'>
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
                Lampiran
            </td>
            <td> : </td>
            <td>Satu bendel Skripsi</td>
            <td></td>
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
            <td colspan = "4" style = "font-size:14pt;">
                <br/>
                <br/>
            </td>
        </tr> 
    </table>
    <table class = 'tableContent' cellSpacing="5" cellPadding = '5'>
        <tr>
            <td style="width: 2cm;"></td>
            <td style="width: 1cm;"></td>
            <td style = "width:10cm;">
                <b>Yth. Bpk/Ibu:</b>
            </td>            
            <td style = "align:right;"></td>
        </tr>
        <tr>
            <td colspan = "4">  
                <br/>
                <br/>
            </td>
        </tr>
    </table>
    <table class = 'tableContent' cellSpacing="5" cellPadding = '5'>
        <?php
        foreach ($dataTimDosen as $k=>$d) {
        ?>
        <tr>
            <td style="width: 2cm;"></td>
            <td style="width: 1cm;">
                <b><?php echo $k+1 . '.';?></b>
            </td>
            <td style = "width:10cm;">
                <b><?php echo $d['nama']; ?> </b>
            </td>            
            <td style = "align:right;">
                <b><?php echo '(' . $d['posisi'] . ')';?></b>
            </td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan = "4">  
                <br/>
                <br/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2">
                <b>Fakultas Ekonomi dan Bisnis</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2">
                <b>Universitas Airlangga</b>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2">
                <b>Surabaya</b>
            </td>
        </tr>
        <tr>
            <td colspan = "2">  
                <br/>
                <br/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2" style = "text-align:justify;">
                Dengan ini kami mengharap kehadiran Saudara untuk menjadi tim penguji Ujian Skripsi dan Komprehensif Program Studi $$prodi$$ sebagai berikut : 
            </td>
        </tr>
        <?php
        foreach ($dataMhs as $k=>$d) {
        ?>
        <tr>
            <td style="width: 2cm;"></td>
            <td style="width: 1cm;">
                <?php echo $k+1 . '.';?>
            </td>
            <td style = "width:10cm;">
                <table cellSpacing="8" cellPadding="7">
                    <tr>
                        <td style = "width: 5cm;">
                            <?php echo $d['nama'];?>
                        </td>
                        <td style = "width: 5cm;">
                            <?php echo 'NIM ' . $d['nim'];?>
                        </td>
                    </tr>
                </table>
            </td>            
            <td style = "align:right;">
                <?php echo '(Ujian ke-' . $d['ujian'] . ')';?>
            </td>
        </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan = "4">  
                <br/>
                <br/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2">
                Yang akan diselenggarakan pada : 
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2">
                <table>
                    <tr>
                        <td style = "width:1cm;"></td>
                        <td style = "width:4cm;">
                            <b>Hari, tanggal</b>
                        </td>
                        <td style = "width:1cm; align:center;">:</td>
                        <td>
                            <b>$$hariUjian$$, $$tanggalUjian$$</b>
                        </td>
                    </tr>
                    <tr>
                        <td style = "width:1cm;"></td>
                        <td style = "width:4cm;">
                            <b>Pukul</b>
                        </td>
                        <td style = "width:1cm; align:center;">:</td>
                        <td>
                            <b>$$jamUjian$$</b>
                        </td>
                    </tr>
                    <tr>
                        <td style = "width:1cm;"></td>
                        <td style = "width:4cm;">
                            <b>Tempat</b>
                        </td>
                        <td style = "width:1cm; align:center;">:</td>
                        <td>
                            <b>$$tempatUjian$$</b>
                        </td>
                    </tr>
                </table>
                <br/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2">
                <div style = "font-size:6pt;"><br/></div>
                Demikian atas kerjasamanya disampaikan terima kasih.
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2">
                <br/>
                <br/>
                <table>
                    <tr>
                        <td style = "width: 5cm;"></td>
                        <td>Koordinator Program Studi $$prodi$$</td>    
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
                <br/>
                <br/>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2" style = "font-size:11pt;">
                Tembusan Yth:
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2" style = "font-size:11pt;">
                1. Wakil Dekan I FEB UA
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2" style = "font-size:11pt;">
                2. Kasubag. Akademik FEB UA
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan = "2" style = "font-size:11pt;">
                3. Kaur Rumah Tangga FEB UA
            </td>
        </tr>
    </table>
    <br/>
    <table class = 'tableKop' cellSpacing="10" cellPadding = '10' style = "font-size:11pt;">
        <tr>
            <td style="width: 1cm;"></td>
            <td style = "font-size:11pt;">NB:</td>
        </tr>
        <tr>
            <td style="width: 1cm;"></td>
            <td style = "font-size:11pt;">
                <table>
                    <?php
                    foreach ($dataMhs as $k=>$d) {
                    ?>
                    <tr>
                        <td style = "width:1cm;" style = "font-size:11pt;"></td>
                        <td style = "width:1cm;" style = "font-size:11pt;"><?php echo $k+1 . '.' ; ?></td>
                        <td>Peserta No. <?php echo $k+1; ?> Panitera dijabat oleh <?php echo $d['panitera'];?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
