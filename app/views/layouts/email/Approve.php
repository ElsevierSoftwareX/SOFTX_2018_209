<?php 
    $logo_img = 'app/static/img/logo.png';
    if(@$isPreview) {
        $tipe = 'cuti';
        $url = 'e.plansys.co/silk/index.php';
        $tanggal = SilkHelper::toDate('2018-03-08');
        
        $approver = [
            'nik_sap' => '2125682',
            'nama' => 'Purwadi Hendropurnomo',
            'lp' => 'Bapak',
            'posisi' => htmlentities('Pl. BB, Chiller & Coating Oil'),
            'bagian' => htmlentities('Bag Pupuk Fosfat II/Phonska IV'),
            'departemen' => htmlentities('Dep Produksi II B'),
        ];
        
        $pegawai = [
            'nik' => 'T555682',
            'nik_sap' => '2125682',
            'nama' => 'Purwadi Hendropurnomo',
            'unitkerja' => '634914',
            'nm_unitkerja' => htmlentities('Ru BB, Furnace & Scrubbing'),
            'eselon' => 'Pelaksana',
        ];
        
        $imgurl = 'http://km.petrokimia-gresik.com/karyawan/' . $pegawai['nik'] . '.jpg';
        
        $i = 0;
        $content = [
            $i++ => [
                'header' => 'Tipe Cuti',
                'separator' => ':',
                'contain' => 'Cuti Karena Alasan Penting',
            ],
            $i++ => [
                'header' => 'Tanggal Mulai',
                'separator' => ':',
                'contain' => SilkHelper::toDate('2018-02-28'),
            ],
            $i++ => [
                'header' => 'Tanggal Selesai',
                'separator' => ':',
                'contain' => SilkHelper::toDate('2018-03-06'),
            ],
            $i++ => [
                'header' => 'Penanggung Jawab',
                'separator' => ':',
                'contain' => '1. Hasda (2312)<br>2. Adasd (12321)',
            ],
        ];
        
        $i = 0;
        $list = [
            $i++ => [
                0 => [
                    'style' => 'text-align: center; font-weight: bold;',
                    'contain' => 'NO',
                ],
                1 => [
                    'style' => 'text-align: center; font-weight: bold;',
                    'contain' => 'TANGGAL',
                ],
                2 => [
                    'style' => 'text-align: center; font-weight: bold;',
                    'contain' => 'NIK SAP',
                ],
                3 => [
                    'style' => 'text-align: center; font-weight: bold;',
                    'contain' => 'NAMA',
                ],
            ],
            $i++ => [
                0 => [
                    'style' => 'text-align: center;',
                    'contain' => '1.',
                ],
                1 => [
                    'style' => 'text-align: center;',
                    'contain' => SilkHelper::toDate('2018-01-01'),
                ],
                2 => [
                    'style' => 'text-align: center;',
                    'contain' => '2125682',
                ],
                3 => [
                    'style' => 'text-align: center;',
                    'contain' => 'Purwadi Hendropurnomo',
                ],
            ],
        ];
    }
    $ch = curl_init($imgurl);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($code != 200)
        $imgurl = $this->url('app/static/img/nophoto.png');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SILK - Approval <?= ucwords($tipe) ?></title>
    <style>
        body {
    		background: #F8F8F8;
			text-align: center;
    		font-size: 14px;
    		font-family: 'Serif', Arial;
    		-webkit-font-smoothing: antialiased;
    		background-color: rgb(251,251,251);
	    }
	    
	    .left {
            display: inline-block;
            float: left;
            margin-right: 17px;
            padding-right: 17px;
	    }
	    
	    .border {
            border-right: 1px solid #9E9E9E;
	    }
	    
	    .head {
	        margin-top: 10px;
            line-height: 10%;
	    }
	    
	    .footer {
	        text-align: left;
    		font-family: 'Serif', Arial;
    		-webkit-font-smoothing: antialiased;
    		background-color: rgb(251,251,251);
    		max-width: 700px;
    		margin: auto;
    		color: #888;
    		padding-left: 10px;
	    }
	    
	    p.big {
            line-height: 150%;
        }
	    
	    .footer>.title {
	        font-size: 12px;
	    }
	    
	    .footer>.content {
	        font-size: 10px;
	    }
	    
		.container {
			max-width: 700px;
			text-align: left;
			border-top: solid 5px #388e3c;
			background-color: rgb(251,251,251);
		}
		
		.container >. content {
			width: 100%;
			margin: auto;
		}
		
		.container > .content > .header {
			width: 100%;
			padding-bottom: 10px;
		}
		
		.bottom {
	        padding-bottom: 10px;    
	    }
		
		#rcorners1 {
			border-radius: 25px;
			background-color: #73AD21;
			padding: 20px; 
			width: 200px;
			height: 150px;    
		}

		.main-content {
			border-radius: 5px;
			border: 1px solid #c9c9c8;
			background-color: white;
			padding: 10px; 
			width: 100%-10px;
			height: auto;    
			text-align: center;
		}
		
		.main-content > .sub-content {
			text-align: left;
		}
		
		a {
		    text-align: center;
		}
		
		.jadwal {
	        padding: 20px 0px 20px 25px;
	        width: 100%;
	        text-align: left;
	    }
	    
	    .jadwal > tr > td {
	        padding-bottom: 20px;
	    }
	    
	    td #kiri {
	       width: 50px;    
	    }
	    
		.link_button {
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            border: solid 1px rgb(162,0,0);
            text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.4);
            -webkit-box-shadow: inset 0 1px 0 rgb(162,0,0), 0 1px 1px rgb(162,0,0);
            -moz-box-shadow: inset 0 1px 0 rgb(162,0,0), 0 1px 1px rgb(162,0,0);
            box-shadow: inset 0 1px 0 rgb(162,0,0), 0 1px 1px rgb(162,0,0);
            background: rgb(162,0,0);
            color: #FFF;
            padding: 8px 12px;
            text-decoration: none;
            text-align: center;
            width: 200px;
        }
    </style>
</head>
<?php
    $urlHeader = $this->url($logo_img);
?>
<body>
    <div class="container">
	    <div class="content">
	        <div class="header">
    			<div class="left"><img src="<?= $urlHeader ?>" height="50px"></div>
    			<div class="left border head"><h2>SILK</h2></div>
    			<div class="left head"><h2>PT PETROKIMIA GRESIK</h2></div>
    		</div>
    		
    		<div class="main-content" style="clear: left;">
    		    <p class="sub-content big" style="text-align: right;">
    		        Gresik, <?= $tanggal ?>
		        </p>
    			<p class="sub-content big" style="text-align: justify;">
    			    Kepada, <br>
    			    Yth. <?= $approver['lp'] ?> <b><?= $approver['nama'] ?></b> <br>
    			    <?= $approver['nik_sap'] ?> <br>
    			    <?= $approver['posisi'] . ($approver['bagian'] != '' ? '<br>' : '') ?>
    			    <?= $approver['bagian'] . ($approver['departemen'] != '' ? '<br>' : '') ?>
    			    <?= $approver['departemen'] ?>
    			</p>
    			<p class="sub-content" style="text-align: justify; line-height: 20px;">
    			    Anda memiliki permohonan pengajuan <b><?= strtoupper($tipe) ?></b> pegawai. Mohon untuk melakukan persetujuan <a href="<?= $url ?>">di sini</a>. Berikut adalah informasi dari pengajuan tersebut:
    			</p>
    			<table class="jadwal" style="border: 1px solid;<?= isset($list) ? " padding-bottom: 0 !important; border-bottom: 0 !important" : "" ?>">
                    <tr>
                        <td colspan="4" style="text-align: center; font-weight: bold;">&mdash; INFORMASI PEGAWAI &mdash;</td>
                    </tr>
                    <tr>
                        <td style="width: 150px;"> Nama Pegawai </td>
                        <td style="text-align: center;"> : </td>
                        <td> <?= $pegawai['nama'] ?> </td>
                        <td rowspan="4" style="width: 105px;"> <img src="<?= $imgurl ?>" style="max-width: 100px;"> </td>
                    </tr>
                    <tr>
                        <td> NIK SAP </td>
                        <td style="text-align: center;"> : </td>
                        <td> <?= $pegawai['nik_sap'] ?> </td>
                    </tr>
                    <tr>
                        <td> Unit Kerja </td>
                        <td style="text-align: center;"> : </td>
                        <td> <?= $pegawai['nm_unitkerja'] ?> (<?= $pegawai['unitkerja'] ?>) </td>
                    </tr>
                    <tr>
                        <td> Eselon </td>
                        <td style="text-align: center;"> : </td>
                        <td> <?= $pegawai['eselon'] ?> </td>
                    </tr>
                    <tr>
                        <td colspan="4" style="text-align: center; font-weight: bold;">&mdash; INFORMASI <?= strtoupper($tipe) ?> &mdash;</td>
                    </tr>
                    <?php
                        foreach($content as $k => $v) {
                            echo "<tr>";
                            echo "<td> " . $v['header'] . " </td>";
                            echo "<td style=\"text-align: center;\"> " . $v['separator'] . " </td>";
                            echo "<td> ";
                            // $contain = str_replace(htmlentities($v['contain']), htmlentities($v['contain']), $v['contain']);
                            // $contain = str_replace(htmlentities('<b>'), '<b>', $contain);
                            // $contain = str_replace(htmlentities('</b>'), '</b>', $contain);
                            // echo $contain;
                            echo html_entity_decode($v['contain']);
                            echo" </td>";
                            echo "</tr>";
                        }
                    ?>
                </table>
                <?php
                    if(isset($list)) {
                        echo "<table class=\"jadwal\" style=\"border: 1px solid;" . (isset($list) ? " padding-top: 0 !important; border-top: 0 !important" : "") . "\">";
                        echo "<tr>";
                        echo "<td colspan=\"" . sizeof($list[0]) . "\" style=\"text-align: center; font-weight: bold;\">&mdash; " . ($tipe == "penugasan" ? "DETAIL " : "DAFTAR PEGAWAI ") . strtoupper($tipe) . " &mdash;</td>";
                        echo "</tr>";
                        foreach($list as $k => $v) {
                            echo "<tr>";
                            foreach($v as $kk => $vv) {
                                echo "<td style=\"" . @$vv['style'] . "\"> " . $vv['contain'] . " </td>";
                            }
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                ?>
    			<div style="text-align: right; padding: 10px 10px 10px 10px;">
    		        Salam,<br><br>
    		        Admin SILK
    		    </div>
			</div>
			
			<div class="left" style="margin-top: 5px;">
        	    <div class="footer">
                    <div class="title"><b>Kantor Pusat</b> </div>
                    <div class="content">
                        Jl. Jenderal Ahmad Yani <br>
                        Gresik 61119 <br>
                        Jawa Timur, Indonesia <br><br>
                        
                        P. 031-3981811, 3982100, 3982200 <br>
                        F. 031-3981722, 3982272 <br><br>
                        
                        E. pg@petrokimia-gresik.com <br>
                    </div>
                </div>
            </div>
            <div class="right" style="margin-top: 5px;">
        	    <div class="footer">
                    <div class="title"><b>Kantor Perwakilan</b> </div>
                    <div class="content">
                        Jl. Tanah Abang III no.16 <br>
                        Jakarta 10160 <br>
                        Jakarta, Indonesia <br><br>
                        
                        P. 021-3446459, 3446645 <br>
                        F. 021-3841994 <br><br>
                        
                        E. perjaka@petrokimia-gresik.com <br>
                    </div>
                </div>
            </div>
		</div>
	</div>
</body>
</html>