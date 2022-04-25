<?php
    $title = 'Register Event';
    ob_start();
?>

<!-- début container -->
<div class="container">

    <h1>Register Event</h1>

    <form action="./?path=main&action=registrationProcessing"  method="post">
        <div class="mb-3">
            <label class="form-label">Nom de l'évènement</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label class="form-label">Début inscription</label>
            <input type="date" class="form-control" name="startRegistration">
        </div>
        <div class="mb-3">
            <label class="form-label">Fin inscription</label>
            <input type="date" class="form-control" name="startRegistration">
        </div>
        <div class="mb-3">
            <label class="form-label">Date de l'évènement</label>
            <input type="date" class="form-control" name="eventDate">
        </div>
        <div class="mb-3">
            <label class="form-label">Lieu de l'évènement</label>
            <input type="date" class="form-control" name="eventPlace">
        </div>
        <select class="form-select" name="idEventType" aria-label="Default select example">

            <?php foreach($allEventTypes as $type): ?>
                    <option value="<?= $type->getIdEventType() ?>"><?= ucfirst($type->getName()); ?></option>
            <?php endforeach; ?>

        </select>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>

</div>
<!-- fin container -->


<?php
    $content = ob_get_clean();
    require("view/template.php");
?>