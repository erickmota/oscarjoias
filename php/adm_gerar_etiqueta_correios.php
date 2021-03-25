<?php

include "../codigo_de_barras.php";

$codigo_barras = bar128("18066315");

require_once '../dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$corpo = "<html>

<head>
    
    <style>

        #corpoEtiqueta{

            width: 50%;
            height: 50%;

        }

        #cabecalho{

            width: 100%;
            height: 28px;

        }

        #espacoInfoDest{

            width: 100%;

        }

        #espacoBar{

            width: 100%;
            height: auto;

        }

        #espacoRemetente{

            border-top: 2px solid rgb(224, 224, 224);
            margin-top: 20px;

        }

    </style>
    
<head>

<body>

    <div id='corpoEtiqueta'>

        <div id='cabecalho'>

            <div style='width: 50%; float: left;'>

                <img src='../img/destinatario.jpg'>
    
            </div>
    
            <div style='width: 50%; float: right;'>
    
                <img style='float: right;' src='../img/correiosLogo.jpg'>
    
            </div>

        </div>

        <div id='espacoInfoDest'>

            <p>

                ERICK PATRICK LAURINDO MOTA<br>
                FONE (15) 99633-1314<br>
                RUA CASTILHO ARIBERT FAZZIO Nº 355<br>
                JD TUPINAMBÁ<br>
                SOROCABA/SP<br>
                18066315

            </p>

        </div>

        <div id='espacoBar' align='center'>";

        $corpo .="</div>

        <div id='espacoRemetente'>

            <p style='font-size: 13px; color: rgb(65, 65, 65)'>

                <b>Remetente:</b><br>
                ERICK PATRICK LAURINDO MOTA<br>
                (15) 99633-1314<br>
                RUA CASTILHO ARIBERT FAZZIO Nº 355<br>
                JD TUPINAMBÁ<br>
                18066315 &nbsp;&nbsp;&nbsp; SOROCABA/SP

            </p>

        </div>

    </div>

</body>

</html>";

$dompdf->loadHtml($corpo);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream("OS.pdf", array("Attachment" => false));

?>

<!-- <html>

<head>
    
    <style>

        #corpoEtiqueta{

            width: 50%;
            height: 50%;

        }

        #cabecalho{

            width: 100%;
            height: 28px;

        }

        #espacoInfoDest{

            width: 100%;

        }

        #espacoBar{

            width: 100%;
            height: auto;

        }

        #espacoRemetente{

            border-top: 2px solid rgb(224, 224, 224);
            margin-top: 20px;

        }

    </style>
    
<head>

<body>

    <div id='corpoEtiqueta'>

        <div id="cabecalho">

            <div style='width: 50%; float: left;'>

                <img src='../img/destinatario.jpg'>
    
            </div>
    
            <div style='width: 50%; float: right;'>
    
                <img style="float: right;" src='../img/correiosLogo.jpg'>
    
            </div>

        </div>

        <div id='espacoInfoDest'>

            <p>

                ERICK PATRICK LAURINDO MOTA<br>
                FONE (15) 99633-1314<br>
                RUA CASTILHO ARIBERT FAZZIO Nº 355<br>
                JD TUPINAMBÁ<br>
                SOROCABA/SP<br>
                18066315

            </p>

        </div>

        <div id='espacoBar' align='center'>

            <?php echo $codigo_barras; ?>

        </div>

        <div id='espacoRemetente'>

            <p style='font-size: 13px; color: rgb(65, 65, 65)'>

                <b>Remetente:</b><br>
                ERICK PATRICK LAURINDO MOTA<br>
                (15) 99633-1314<br>
                RUA CASTILHO ARIBERT FAZZIO Nº 355<br>
                JD TUPINAMBÁ<br>
                18066315 &nbsp;&nbsp;&nbsp; SOROCABA/SP

            </p>

        </div>

    </div>

</body>

</html> -->