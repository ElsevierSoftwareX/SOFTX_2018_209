<?php 
    if (@$isPreview) {
        $name = 'Kamil';
        $username = 9090;
        $password = 90909090;
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Informasi Akun</title>
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
        Informasi Akun
    </h1>
    <div class="content">
        Halo, <?php echo $name; ?>,
        <br>
        Berikut adalah informasi akun untuk login di <a href="<?php echo Yii::app()->getBaseUrl(true) ?>">Sistem Otomasi Administrasi Skripsi</a> 
        <h2>
            Username : <?php echo $username; ?>
        </h2>
        <h2>
            Password : <?php echo $password; ?>
        </h2>
        <strong>Segera ganti password anda setelah login</strong>    
    </div>
    
</html>