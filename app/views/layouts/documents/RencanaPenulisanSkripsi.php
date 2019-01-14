<?php 
if (@$isPreview) {
    ## Put your preview variable here        
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Permohonan Penyusunan Skripsi</title>
    <style>
        /** Put your style here **/
        table { 
            border-collapse: collapse;
            overflow: wrap;
        }
        .tablePenyusunan td {
            font-size:11pt;
          }
        .tablePenyusunan th {
            font-size:11pt;
        }
        .content {
            padding-left:38px;
        }
    </style>
</head>
<body>
    $$kop$$
    <br/>
    <h3 style="text-align: center;">
        FORMULIR PERSETUJUAN RENCANA PENULISAN SKRIPSI<br>
        TAHUN KULIAH : ........../..........
    
    </h3>
    <div style = "word-wrap: break-word;margin-left:1.1cm;text-align:justify;font-size:11pt;">
        Rencana penulisan skripsi bagi mahasiswa :        
        <br/>
        <br/>
    </div>
    <table class = "tablePenyusunan" autosize="1" cellSpacing="5" cellPadding = '5' style = "overflow:wrap;">
        <tr>
            <td style="width: 1cm;"></td>
            <td style="width: 2.5cm;">
                NAMA
            </td>
            <td style="width: 0.5cm;"> : </td>
            <td>$$nama$$</td>
        </tr>
        <tr>
            <td></td>
            <td>
                NIM
            </td>
            <td> : </td>
            <td>$$nim$$</td>
        </tr>
        <tr>
            <td></td>
            <td>
                ALAMAT
            </td>
            <td> : </td>
            <td>$$alamat$$</td>
        </tr>
        <tr>
            <td></td>
            <td>
                Telp./HP
            </td>
            <td> : </td>
            <td>$$telp$$</td>
        </tr>
        <tr>
            <td></td>
            <td>
                EMAIL
            </td>
            <td> : </td>
            <td>$$email$$</td>
        </tr>
        <tr>
            <td colspan = "4" style = "font-size:14pt;">
                <br/>
                <br/>
            </td>
        </tr>         
    </table>
    <div style = "word-wrap: break-word;margin-left:1.1cm;text-align:justify;font-size:11pt;">
        JUDUL SKRIPSI :
        <br/>
        <br/>
        $$title$$
    </div>
    <br/>
    <br/>
    <div style = "word-wrap: break-word;margin-left:1.1cm;text-align:justify;font-size:11pt;">
        ISI POKOK PENULISAN SKRIPSI :
        <br/>
        <br/>
        $$content$$
    </div>
    <br/>
    <br/>
    <div style = "word-wrap: break-word;margin-left:1.1cm;text-align:justify;font-size:11pt;">
        Dapat disetujui dengan pembimbing : $$pembimbing$$
    </div>
    
    <table class = "tablePenyusunan" autosize="1" cellSpacing="5" cellPadding = '5' style = "overflow:wrap; margin-left:1cm;">
        <tr>
            <td colspan = "4">
                <br/>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td colspan = "3">
                <table>
                    <tr>
                        <td style = "width:5cm;"></td>
                        <td style = "width:2.5cm;"></td>
                        <td style = "width:7cm;">
                            Surabaya, $$approvedDate$$
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Dosen Pembimbing
                        </td>
                        <td></td>
                        <td>
                        Koordinator Program Studi S1 Akuntansi
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                        </td>
                        <td></td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td colspan = '3'>
                            <br/>
                            <br/>
                            <br/>
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            ($$pembimbing$$)
                        </td>
                        <td></td>
                        <td>
                            ($$kps$$)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NIP: $$pembimbingNip$$
                        </td>
                        <td></td>
                        <td>
                            NIP: $$kpsNip$$
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
        <tr>
            <td>
            
            </td>
            <td colspan = "3" style = "font-size:3pt;">
                <hr size="5" style = "color:black; font-size:3pt;background-color:black;">
            </td>
        </tr> 
        <tr>
            <td></td>
            <td colspan = "3">
                <br/>
                <table>
                    <tr>
                        <td colspan = "3">
                            CATATAN :
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td style = "width:0.8cm;">
                            1.
                        </td>
                        <td>
                            Formulir ini diisi dalam rangkap 2 (dua) dengan perincian sebagai berikut :
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            &bull; Satu lembar untuk Koordinator Program Studi
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            &bull; Satu lembar untuk Mahasiswa yang bersangkutan
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2" style = "font-size:6pt;">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2" style = "font-size:2pt;">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            2.
                        </td>
                        <td>
                            Ketentuan untuk mahasiswa :
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <table>
                                <tr>
                                    <td>a.</td>
                                    <td>Batas waktu skripsi</td>
                                    <td>:</td>
                                    <td>................................................................</td>
                                </tr>
                                <tr>
                                    <td>b.</td>
                                    <td>Batas waktu studi</td>
                                    <td>:</td>
                                    <td>................................................................</td>
                                </tr>
                            </table>
                        </td>
                    </tr>                    
                </table>
            </td>
        </tr> 
    </table>
</body>
</html>

