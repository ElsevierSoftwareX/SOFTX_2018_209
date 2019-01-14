<?php 
    if (@$isPreview) {
        $name = 'Kamil';
        $prapos = 9090;
        $oleh = 90909090;
        $id = 1;
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
        Anda telah dipercayakan menjadi dosen pembimbing untuk Pra-Proposal dengan judul <strong>"<?php echo $prapos; ?>"</strong> oleh <?php echo $oleh; ?><br>
        Mohon lakukan respon di <a href="<?php echo Yii::app()->getBaseUrl(true); ?>/index.php?r=dsn/submission/view&amp;id=<?php echo $id; ?>">Sistem Otomasi Administrasi Skripsi</a> 
    </div>
    
</html>