
<?php 
if (@$isPreview) {
    ## Put your preview variable here        
}
?> 

<html>
<head>
<title>Berita Acara</title>
</head>

<body>
<table width="810" border="0">
<tr>
    <td width="80">&nbsp;</td>
    <td colspan="4">
    <left>
            <font face="Times New Roman">
        		UNIVERSITAS AIRLANGGA
                <br />
        		FAKULTAS EKONOMI DAN BISNIS
                <br />
                <br />
            </font>
    </left>
    </td>
  </tr>
</table>
<table width="810" border="0">
  <tr>
    <td colspan="5">
    <center>
            <font face="Times New Roman">
            <b>
				<font size="+20">
                BERITA ACARA
				<br />
				UJIAN KOMPREHENSIP / SKRIPSI
                </font>
				<br />
			</b>
            </font>
    </center>
    </td>
  </tr>
  <tr>
    <td colspan="5">
    <center>
    Ujian ke: $$ujianKe$$
    <br>
    </center>
    </td>
  </tr>
  <tr>
  </tr>
<!-- start 1 -->  
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>NAMA</left></td>
    <td>:</td>
    <td>$$mhsNama$$</td>
    <td width="5">&nbsp;</td>
  </tr>
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>N.I.M</left></td>
    <td>:</td>
    <td>$$mhsNim$$</td>
    <td width="5">&nbsp;</td>
  </tr>
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>PROGRAM STUDI</left></td>
    <td>:</td>
    <td>$$prodi$$</td>
    <td width="5">&nbsp;</td>
  </tr>
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>TANGGAL UJIAN</left></td>
    <td>:</td>
    <td>$$tglUjian$$</td>
    <td width="5">&nbsp;</td>
  </tr>
<!-- end 1 -->
  <tr>
    <td colspan="5"><center><br /><br />Mata kuliah yang ditempuh / Lulus pada semester akhir:</center></td>
  </tr>
<!-- start 2 -->
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>1. KKN</left></td>
    <td>&nbsp;</td>
    <td><center>dengan nilai </center></td>
    <td width="5">&nbsp;</td>
  </tr>
    <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>2. TEORI AKUNTANSI</left></td>
    <td>&nbsp;</td>
    <td><center>dengan nilai </center></td>
    <td width="5">&nbsp;</td>
  </tr>
    <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>3. PENGAUDITAN II</left></td>
    <td>&nbsp;</td>
    <td><center>dengan nilai </center></td>
    <td width="5">&nbsp;</td>
  </tr>
<!-- end 2 -->
  <tr>
    <td colspan="5"><font size="20"><center><b><br />SKRIPSI</b></center></font></td>
  </tr>
<!-- start 3 -->
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>Mata kuliah konsentrasi</left></td>
    <td>:</td>
    <td><left>$$interests$$</left></td>
    <td width="5">&nbsp;</td>
  </tr>
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>Dengan Judul<br /><br /><br /></left></td>
    <td>:<br /><br /><br /></td>
    <td><left>$$judul$$</left></td>
    <td width="5">&nbsp;</td>
  </tr>
  <tr>
  	<td width="180">&nbsp;</td>
    <td width="175"><left>Dosen Pembimbing</left></td>
    <td>:</td>
    <td><left>$$pembimbing$$</left></td>
    <td width="5">&nbsp;</td>
  </tr>
<!-- end 3 -->
  <tr>
    <td colspan="5"><font size="+1"><center><b><br />&nbsp;&nbsp;&nbsp;&nbsp;Dengan susunan panitia penguji ujian sebagai berikut :<br /><br /></b></center></font></td>
  </tr>
<!-- start 4 -->
  <tr>
    <td width="180">&nbsp;</td>
    <td width="175"><left>Ketua </left></td>
    <td>:</td>
    <td><left>$$ketua$$</left></td>
    <td width="5">&nbsp;</td>
  </tr>
  $$panitera$$
  $$anggota$$
  <!-- <tr>
    <td width="180">&nbsp;</td>
    <td width="175"><left>Panitera / Penguji</left></td>
    <td>:</td>
    <td><left>Drs. H Djoko Dewantoro, M.Si., Ak., BKP.</left></td>
    <td width="5">&nbsp;</td>
  </tr> -->
  <!-- <tr>
    <td width="180">&nbsp;</td>
    <td width="175"><left>Anggota / Penguji (1)</left></td>
    <td>:</td>
    <td><left>Yani Permatasari, S.Ak., MBA, Ak</left></td>
    <td width="5">&nbsp;</td>
  </tr>
  <tr>
    <td width="180">&nbsp;</td>
    <td width="175"><left>Anggota / Penguji (2)</left></td>
    <td>:</td>
    <td><left>Dr. Sedianingsih, SE, M.Si., Ak, CMA</left></td>
    <td width="5">&nbsp;</td>
  </tr> -->
<!-- end 4 -->
  <tr>
    <td colspan="5"><font size="+1"><center><b><br />Judicium / dengan hasil<br /><br /></b></center></font></td>
  </tr>
</table>

<table width="810" border="0">
  <tr >
  	<td width="180">&nbsp;</td>
    <td width="400" style="border: 1px solid black;">Predikat :<br /><br /><br /><br /><br /></td>
    <td style="border: 1px solid black;">Nilai :<br /><br /><br /><br /><br /></td>
  </tr>
</table>
<table width="810" border="0">
  <tr>
  	<td width="180">&nbsp;</td>
    <td colspan="3">Panitera<br /><br /><br /><br /><br /><br /></td>
    <td>Ketua<br /><br /><br /><br /><br /><br /></td>
  </tr>
</table>
<table width="810" border="0">
    <tr>
  	<td width="175">&nbsp;</td>
    <td width="250">Anggota(1)<br /><br /><br /><br /><br /></td>
    <td>Anggota(2)<br /><br /><br /><br /><br /></td>
    <td>Anggota(3)<br /><br /><br /><br /><br /></td>
  </tr>
  
</table>

</body>
</html>
