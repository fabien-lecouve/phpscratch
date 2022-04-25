<?php
    $title = 'Validation';
    ob_start();
?>

<!-- début container -->
<div class="container">

    <h1>Validation</h1>

    <p>Félicitations <?= $_SESSION['post']['firstname']; ?></p>
    <p>Veuillez cliquez sur le mail</p>

</div>
<!-- fin container -->


<?php
    $content = ob_get_clean();
    require("view/template.php");
?>