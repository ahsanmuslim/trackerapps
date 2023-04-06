<?php
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\QROptions;

?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $data['mobil']['type'] ?> - <?= $data['mobil']['no_polisi'] ?></title>
	<link rel="shortcut icon" href="<?= BASEURL ?>/icon/favicon-16x16.png" type="image/x-icon">
    
    <style>

    body {
      background: white; 
    }
    page[size="A4"] {
      background: white;
      width: 21cm;
      height: 30cm;
      display: block;
      margin: 0 auto;
    }
    @media print {
      body, page[size="A4"] {
        margin: 0;
        box-shadow: 0;
      }
    }
    /* * {
        border: 1px solid red;
    } */

    .container {
        margin-top: 30px;
        border: 3px solid black;
        padding: 0;
        width: 60%;
        position: relative;
    }

    .nopolisi {
        font-weight: bold;
        position: absolute;
        bottom: 15px;
        left: 45%;
    }

    .image {
        text-align: center;
        padding: 0.1rem;
    }

    </style>
</head>

<body>
<page size="A4">
    <div class="container">

        <?php
        $options = new QROptions(
            [
                'eccLevel' => QRCode::ECC_L,
                'outputType' => QRCode::OUTPUT_MARKUP_SVG,
                'version' => 5,
            ]
        );

        $qrcode = (new QRCode($options))->render($data['mobil']['id_mobil']);
        echo '<img src="' . $qrcode . '" alt="qrcode" width="100%">';
        ?>
        <span class="nopolisi"><?= $data['mobil']['no_polisi'] ?></span>
    </div>
</page>
</body>

<script type="text/javascript">
    window.print();
</script>
</html>
