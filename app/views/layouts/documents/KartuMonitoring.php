<?php 
if (@$isPreview) {
    ## Put your preview variable here        
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Monitoring Card</title>
    <style>
        table { 
            border-collapse: collapse;
            overflow: wrap;
            font-size:12pt;
        }
        h2{
            text-align:center;
        }
        h5{
            font-weight:normal;
        }
        .identity{
            margin-left:48pt;
        }
        .kop{
            padding-left:75px;
            padding-right:75px;
        }
        .monitoring{
            line-height: 120%;
        }
        .tableMonitoring td {
            border: 0.2mm solid black;
            text-align: left;
            padding-left:8px;
          }
        .tableMonitoring th {
            border: 0.2mm solid black;
            text-align: center;
        }
        .footer {
            font-size:8pt;
            padding-left:75px;
            padding-right:75px;
        }
        
    </style>
</head>
<body>
    <h5 style="margin-left: 55pt;">
           UNIVERSITAS AIRLANGGA
           <br/>
           FAKULTAS EKONOMI DAN BISNIS
    </h5>
   
   <div class = "identity">
       <!-- judul -->
       <h2>
           KARTU MONITORING
       </h2>
    </div>
    <br/>
    <h5 style="margin-left: 48pt;" >
       <!-- identitas -->
       <table cellSpacing="6" style="overflow:wrap;width:18.5cm;table-layout:fixed;font-size:12pt;" autosize="1">
           <tr>
               <td style = "width:4cm">
                   NAMA
               </td>
               <td style = "width: 0.5cm;padding-left:1%; padding-right:2%;">
                    :
               </td>
               <td style = "width:14cm;">
                    <div>
                       $$nama$$
                    </div>
               </td>
           </tr>
           <tr>
               <td>
                   NIM
               </td>
               <td style = "padding-left:1%; padding-right:2%;">
                    :
               </td>
               <td>
                    <div>
                       $$nim$$
                    </div>
               </td>
           </tr>
           <tr>
               <td>
                   PROGRAM STUDI
               </td>
               <td style = "padding-left:1%; padding-right:2%;">
                    :
               </td>
               <td>
                    <div>
                       $$prodi$$
                    </div>
               </td>
           </tr>
           <tr>
               <td style = "line-height: 120%;">
                   MATA KULIAH <br/>KONSENTRASI
               </td>
               <td style = "padding-left:1%; padding-right:2%;">
                    :
               </td>
               <td>
                    <div>
                       $$int$$
                    </div>
               </td>
           </tr>
           <tr>
               <td>
                   JUDUL SKRIPSI
               </td>
               <td style = "padding-left:1%; padding-right:2%;">
                    :
               </td>
               <td style = "width:14cm;word-wrap:break-word;">
                    <div>
                       $$title$$
                    </div>
               </td>
           </tr>
       </table>
    </h5> 
   <br/>
   <br/>
   <!-- isi tabel monitoring -->
    <table class="tableMonitoring">
        <tr>
           <th class="layout">
               NO    
           </th>
           <th class="layout">
               URAIAN    
           </th>
           <th class="layout">
               TGL    
           </th>
           <th class="layout">
               NAMA    
           </th>
           <th class="layout">
               TANDA<br/>TANGAN    
           </th>
        </tr>
        <tr>
           <td class="layout" align="center" style = "width: 1.1cm;padding-left:0px;">
               1    
           </td>
           <td class="layout" style="width: 6.5cm">
               Pengajuan Praproposal<br>(Koordinator Program Studi)    
           </td>
           <td class="layout" style="width: 1.5cm"></td>
           <td class="layout" style="width: 6.8cm">$$kps$$</td>
           <td class="layout" style="width: 3.2cm"></td>
        </tr>
        <tr>
           <td class="layout" align="center" style = "padding-left:0px;">
               2
           </td>
           <td class="layout">
               Praproposal<br>(Koordinator Program Studi)    
           </td>
           <td class="layout"></td>
           <td class="layout">$$kps$$</td>
           <td class="layout"></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               3    
           </td>
           <td>
               Praproposal<br>(Pembimbing)    
           </td>
           <td></td>
           <td>$$dosen$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               4
           </td>
               <td>
               Proposal<br>(Kasubag. Akademik)    
               </td>
           <td></td>
           <td>$$kasubag_akademik$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               5    
           </td>
           <td>
               Proposal<br>(Pembimbing)    
           </td>
           <td></td>
           <td>$$dosen$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               6   
           </td>
           <td>
               Proposal<br>(Koordinator Program Studi)    
           </td>
           <td></td>
           <td>$$kps$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               7
           </td>
           <td>
               Skripsi<br>(Pembimbing Awal)    
           </td>
           <td></td>
           <td>$$dosen$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               8
           </td>
           <td>
               Pengajuan Perpanjangan Penulisan <br/>Skripsi (Koordinator Program Studi)    
           </td>
           <td></td>
           <td>$$kps$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               9
           </td>
           <td>
               Skripsi <br/>(Pembimbing Akhir) 
           </td>
           <td></td>
           <td>$$dosen$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               10
           </td>
           <td>
               Pengajuan Ujian I <br/> (Kasubag. Akademik) 
           </td>
           <td></td>
            <td>$$kasubag_akademik$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               11
           </td>
           <td>
               Pengajuan Ujian I <br/> (Koordinator Program Studi) 
           </td>
           <td></td>
           <td>$$kps$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               12
           </td>
           <td>
               Pengajuan Ujian II <br/> (Kasubag. Akademik) 
           </td>
           <td></td>
           <td>$$kasubag_akademik$$</td>
           <td></td>
        </tr>
        <tr>
           <td align="center" style = "padding-left:0px;">
               13
           </td>
           <td>
               Pengajuan Ujian II <br/> (Koordinator Program Studi) 
           </td>
           <td></td>
           <td>$$kps$$</td>
           <td></td>
        </tr>
    </table>
   <br/>
   <div class = "footer" style = "font-size:10pt;">
        <table class = "footer" style="font-size:10pt;overflow: wrap;">
            <tr>
               <td style = "font-size:10pt;" colspan = "3">
                   Catatan
               </td>
           </tr>
           <tr>
               <td style = "font-size:10pt;">
                   1 s.d. 9
               </td>
               <td style="width: 1cm;">
               </td>
               <td style = "font-size:10pt;">
                   Kartu dibawa oleh mahasiswa
               </td>
           </tr>
           <tr>
               <td style = "font-size:10pt;">
                   10 s.d. 13
               </td>
               <td style="width: 1cm;">
               </td>
               <td style = "font-size:10pt;">
                   Skripsi disertakan
               </td>
           </tr>
       </table>
    </div>
</html>
