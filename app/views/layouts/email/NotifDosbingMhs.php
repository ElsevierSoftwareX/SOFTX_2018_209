<?php 
    if (@$isPreview) {
        $name = 'Kamil';
        $prapos = 9090;
        $dosbing = 90909090;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Notifikasi Sistem Otomasi Skripsi</title>
    <style>
        h1 {
            background-color: #1a237e;
            border-bottom: 2px solid #fdd835;
            padding: 10px;
            color: white;
        }
        body {
            font-family: calibri;
        }
        .content {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>
        Dosbing Assigned
    </h1>
    <div class="content">
        Halo, <?php echo $name; ?>,
        <br>
        <?php echo $dosbing; ?> telah dipercayakan menjadi dosen pembimbing untuk Pra-Proposal dengan judul <strong>"<?php echo $prapos; ?>"</strong>
        Hubungi beliau segera untuk melakukan respon terhadap Pra-Proposal Anda
    </div>
    
</html>