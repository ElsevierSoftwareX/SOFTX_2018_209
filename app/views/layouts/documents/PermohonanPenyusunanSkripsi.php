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
    <table class = "tablePenyusunan" autosize="1" cellSpacing="5" cellPadding = '5' style = "overflow:wrap;">
        <tr>
            <td style="width: 1cm;"></td>
            <td style="width: 2.5cm;">
                Hal
            </td>
            <td> : </td>
            <td>Permohonan Penyusunan Skripsi dan Dosen Pembimbing</td>
        </tr>
        <tr>
            <td></td>
            <td>
                Lampiran
            </td>
            <td> : </td>
            <td>Pra - Proposal</td>
        </tr>
        <tr>
            <td colspan = "4" style = "font-size:14pt;">
                <br/>
                <br/>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td colspan = "3" align = "justify" >
                <p>
                    <b>Kepada Yth: Ketua Program Studi S1 Akuntansi</b><br/>
                    <b>Fakultas Ekonomi dan Bisnis Universitas Airlangga</b><br/>
                    <b>Surabaya</b>
                </p>
                <p style = "font-size:14pt">
                    <br/>
                </p>
                <p style = "text-align: justify;">
                    Sesuai dengan Petunjuk Pelaksanaan Pendidikan Fakultas Ekonomi dan Bisnis Universitas Airlangga Bab IV tentang peraturan Akademik, maka dengan ini:
                </p>
            </td>
        </tr>
        <tr>
            <td colspan = "4" style = "font-size:4pt;">
                <br/>
            </td>
        </tr> 
        <tr style = 'padding:0pt;'>
            <td></td>
            <td>
                Nama
            </td>
            <td style = "text-align: right;"> : </td>
            <td>
                <table>
                    <tr>
                        <td style = "width:6cm;">
                            $$nama$$
                        </td>
                        <td style = "width:0.5cm;"></td>
                        <td style = "width:2.2cm;">N.I.M</td>
                        <td style = "text-align:right;">: </td>
                        <td style = "width:3.5cm;">$$nim$$</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                I.P.K
            </td>
            <td style = "text-align: right;"> : </td>
            <td>
                <table>
                    <tr>
                        <td style = "width:6cm;">
                            $$ipk$$
                        </td>
                        <td style = "width:0.5cm;"></td>
                        <td style = "width:2.2cm;">S.K.S Kum</td>
                        <td style = "text-align:right;">: </td>
                        <td style = "width:3.5cm;">$$sks$$</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                Telp/HP
            </td>
            <td style = "text-align: right;"> : </td>
            <td>
                <table>
                    <tr>
                        <td style = "width:6cm;">
                            $$phone$$
                        </td>
                        <td colspan = '4'></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td colspan = "4" style = "font-size:4pt;">
                <br/>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td colspan = "3">
                <p>
                    Mengajukan PraProposal penelitian untuk penyusunan Skripsi dengan judul:
                    <br/>
                    $$title$$
                </p>
            </td>
        </tr>
        
        <tr>
            <td></td>
            <td colspan = "3">
                <p>
                    Mata kuliah yang berhubungan dengan topik pra proposal : $$int$$
                    <br/>
                    telah lulus dengan nilai : ..................
                </p>
            </td>
        </tr>
        <tr>
            <td colspan = "4" style = "font-size:2pt;">
                <br/>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td colspan = "3">
                <p>
                    Mata Kuliah Metodologi Penelitian telah lulus dengan nilai : ..................
                </p>
            </td>
        </tr>
        <tr>
            <td colspan = "4" style = "font-size:2pt;">
                <br/>
            </td>
        </tr> 
        <tr>
            <td></td>
            <td colspan = "3">
                <p>
                    Isi pokok Pra Proposal:
                    <br/>
                </p>
            </td>
        </tr>
    </table>
    
    <div style = "word-wrap: break-word;margin-left:1cm;text-align:justify;font-size:11pt;">
        $$content$$
    </div>
    
    <table class = "tablePenyusunan" autosize="1" cellSpacing="5" cellPadding = '5' style = "overflow:wrap; margin-left:1cm;">
        <tr>
            <td></td>
            <td align = "justify" colspan = "3">
                <p style = "text-align:justify;">
                Demikian permohonan ini kami ajukan untuk mendapatkan persetujuan dari Dosen Pembimbing dan Ketua Program Studi S1 Akuntansi Fakultas Ekonomi dan Bisnis Universitas Airlangga.
                </p>
            </td>
        </tr>
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
                        <td style = "width:6.5cm;">
                            Surabaya, $$date$$
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Mahasiswa yang mengajukan
                        </td>
                        <td></td>
                        <td>
                            Menyetujui,
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Permohonan
                        </td>
                        <td></td>
                        <td>
                            Koordinator Program Studi S1 Akuntansi
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
                            ($$nama$$)
                        </td>
                        <td></td>
                        <td>
                            ($$kps$$)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NIM: $$nim$$
                        </td>
                        <td></td>
                        <td>
                            NIP: $$nip$$
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
        <tr>
            <td></td>
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
                        <td style = "width:0.8cm;">
                            1.
                        </td>
                        <td>
                            Mahasiswa yang bersangkutan harap menemui Dosen pembimbing di bawah ini :    
                        </td>
                    </tr>
                    <tr>
                        <td colspan = "2" style = "font-size:6pt;">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <table>
                                <tr>
                                    <td style = "width:2.5cm;">
                                        Nama
                                    </td>
                                    <td> : </td>
                                    <td> $$dosen$$ </td>
                                    <td> TT </td>
                                    <td> ................................ </td>
                                </tr>
                            </table>
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
                            Formulir ini diisi rangkap 2 (dua) dengan perincian sebagai berikut: 
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            &bull; Lembar ke 1 untuk Ketua Program Studi S1 Akuntansi
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            &bull; Lembar ke 2 untuk Dosen Pembimbing
                        </td>
                    </tr> 
                    <tr>
                        <td colspan = "2" style = "font-size:2spt;">
                            <br/>
                        </td>
                    </tr>
                    <tr>
                        <td style = "vertical-align:top;">
                            3.
                        </td>
                        <td align = "justify">
                            <p style = "text-align:justify;">
                                Untuk mendapatkan Dosen Pembimbing, Mahasiswa HARUS memprogram SKRIPSI di KRS (Lampirkan foto copy KTM, KRS dan KHS semester terakhir, SKS kum. Min 123)
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr> 
    </table>
</body>
</html>
