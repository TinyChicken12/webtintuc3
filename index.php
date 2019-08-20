<?php
require_once "dbCon.php";

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .title{background: green; color:yellow; text-align: center; padding: 5px}
        #menu a {display: block}
        .mottin{border-bottom: solid 1px blue; padding:10px}
        .tieude{color:red; font-weight: bold}
    </style>
</head>
<body>
<table width="700" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td width="20%" class="title">Loại tin</td>
        <td class="title">Tin</td>
    </tr>
    <tr id="menu" valign="top">
        <td>
            <?php
                $qrLoaiTin = "SELECT * FROM loaitin";
                $loaitin = $connection->query($qrLoaiTin);
                while($row_loaitin = $loaitin->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                    <a href="index.php?idLT=<?php echo $row_loaitin["idLT"] ?>"><?php echo $row_loaitin["Ten"] ?></a>
                    <?php
                }
            ?>
        </td>
        <td>
            <?php
            $idLT =(int) $_GET["idLT"];
            $qrTin = "SELECT * FROM tin WHERE idLT = $idLT";
            $tins = $connection->query($qrTin);
            while ($row_tin = $tins->fetch(PDO::FETCH_ASSOC)){



            ?>
            <div class="mottin">
            <div class="tieude"><?php echo $row_tin["TieuDe"] ?></div>
            <img src="upload/tintuc/<?php echo $row_tin["urlHinh"] ?>" width="100" style="float:left; margin-right:5px">
                <?php echo $row_tin["TomTat"] ?>
                <div style="clear:both"></div>
            </div>
            <?php
            }
            ?>
        </td>
    </tr>
</table>
</body>
</html>
