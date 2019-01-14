<?php 
    if (@$isPreview) {
        $name = 'Kamil';
        $dosbing = 9090;
        $rspn = 'approve';
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
        Respon Dosbing
    </h1>
    <div class="content">
        Halo, <?php echo $name; ?>,
        <br>
        <?php echo $dosbing ?> telah melakukan <strong><?php echo $rspn; ?></strong> terhadap pra-proposal Anda, segera mulai mengerjakan Proposal
    </div>
    
</html>