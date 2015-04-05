<?php echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?php echo $direction; ?>" lang="<?php echo $language; ?>" xml:lang="<?php echo $language; ?>">
    <head>
        <title>Imprimir Endereço de Envio</title>
        <base href="<?php echo $base; ?>" />
        <link rel="stylesheet" type="text/css" href="../admin/view/stylesheet/estilo_codigo.css" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <script type="text/javascript" src="../admin/view/javascript/codigo_de_barra/codigo_de_barra.js"></script>  
        <script type="text/javascript" src="../admin/view/javascript/codigo_de_barra/funcao.js"></script>  
    </head>
    <body onload="updateBarcode()">
        <?php foreach ($orders as $order) { ?>
        <div style="float:left;">
            <div id="print">
                <table width="391" class="tabela1" cellpadding="14" cellspacing="0">
                    <tr>
                        <td width="51%" valign="top">
                            <table width="100%" border="0">
                                <tbody>
                                    <tr>
                                        <td align="left"><img src="../image/data/destinatario_peq.gif" border="0"></td>
                                        <td align="right">
                                            <?php $a = $order['correios']; 
                                            switch($a)
                                            {
                                            case "correios.41106": 
                                            echo '<img src="../image/data/chancela_pac.jpg">';
                                            break;
                                            case "correios.40010": 
                                            echo '<img src="../image/data/chancela_sedex.jpg">';
                                            break;
                                            case "correios.40215": 
                                            echo '<img src="../image/data/chancela_sedex10.jpg">';
                                            break;
                                            case "pickup.pickup": 
                                            echo '<img src="../image/data/chancela_pickup.jpg">';
                                            break;
                                            case "free.free": 
                                            echo '<img src="../image/data/logo_correios_peq.gif">';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <table border="0" cellpadding="0" cellspacing="0" height="150">
                                <tbody>
                                    <tr>
                                        <td valign="top">
                                            <span class="style1"><?php echo $order['endereco_entrega']; ?></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <div align="center" class="style4">
                                <input style="display: none;" id="barcodeValue" type="text" name="value" value="<?php echo $order['cep']; ?>" />
                                <img id="barcodeImage" />
                            </div>
                            <hr align="center" width="100%" color="silver" size="1" />
                            <div class="style2">
                                <b>Remetente:</b><br /> 
                                <span class="transforme">
                                    <?php echo $order['loja'];?><br />
                                    <?php echo $order['telefone_loja'];?><br />
                                    <?php echo $order['endereco_loja'];?>
                                </span>
                            </div>		  
                        </td>
                    </tr>
                </table>
            </div>
            <?php } ?>
            <div class="right">
                <p align="center">
                    <a href="javascript:Imprimir('print');"/><button class="bot">Imprimir</button></a>
                </p>
            </div>
        </div>
        <div class="doar">
            Gostou?<br>
                <b>Contribua fazendo uma doação</b> <br>
                <a target="_blank" href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NAVNRBMDYGUD6"> <img src="https://www.paypalobjects.com/pt_BR/BR/i/btn/btn_donateCC_LG.gif" /></a>
        </div>
</body>
</html>