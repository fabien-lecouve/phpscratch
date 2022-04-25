<?php
    $title = 'Register';
    ob_start();
?>

<!-- début container -->
<div class="container">

    <h1>Register</h1>

    <?php
        if(isset($_SESSION["error"]))
        {
            foreach( $_SESSION["error"] as $value )
            {
                echo '<p>'.$value.'</p>';
            }
            unset($_SESSION["error"]);
        }
        if (isset($_SESSION['message']))
        {
            echo '<p>' .$_SESSION['message']. '</p>';
        } 
    ?>
    

    <form action="./?path=main&action=registrationProcessing"  method="post">
        <div class="mb-3">
            <label class="form-label">Prénom</label>
            <input type="text" class="form-control" name="firstname" value="<?= isset($_SESSION['post']) ? $_SESSION['post']['firstname'] : "" ; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname" value="<?= isset($_SESSION['post']) ? $_SESSION['post']['lastname'] : "" ; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= isset($_SESSION['post']) ? $_SESSION['post']['email'] : "" ; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>

</div>
<!-- fin container -->


<?php
    $content = ob_get_clean();
    require("view/template.php");
    unset($_SESSION['post']);
    unset($_SESSION['message']);
?>