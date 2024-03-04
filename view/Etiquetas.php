<?php
ob_start();
include_once '../Controller/EtiquetasController.php';
$etiquetas = ConsultarEtiquetasController();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <title>Etiquetas</title>
</head>

<body>
<div class="row gy-4 justify-content-center">

<div class="card" style="width: 18rem;">
 <div class="card-body">
<h5 class="card-title">Card title</h5>
 <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <a href="#" class="card-link">Card link</a>
  <a href="#" class="card-link">Another link</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
 <div class="card-body">
<h5 class="card-title">Card title</h5>
 <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <a href="#" class="card-link">Card link</a>
  <a href="#" class="card-link">Another link</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
 <div class="card-body">
<h5 class="card-title">Card title</h5>
 <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <a href="#" class="card-link">Card link</a>
  <a href="#" class="card-link">Another link</a>
  </div>
</div>
<div class="card" style="width: 18rem;">
 <div class="card-body">
<h5 class="card-title">Card title</h5>
 <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
 <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  <a href="#" class="card-link">Card link</a>
  <a href="#" class="card-link">Another link</a>
  </div>
</div>
</div>
</body>

</html>

<?php
$html=ob_get_clean();

//echo $html;

require_once 'plugins/Library/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf=new Dompdf;

$options= $dompdf->getOptions();
$options->set(array('isRemoteEnable'=>true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');

$dompdf->render();
$dompdf->stream("etiquetas.pdf",array("Attachment"=>false));

?>