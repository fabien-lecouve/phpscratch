<?php
$title = 'Login';
ob_start();
?>

<!-- début container -->
<div class="container">

    <h1>Login</h1>

    <?php if (isset($_SESSION['message'])): ?>
        <p><?= $_SESSION['message'] ?></p>
    <?php endif; ?>

    <form action="./?path=main&action=loginProcessing" method="post">
        <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="<?= isset($_SESSION['post']) ? $_SESSION['post']['email'] : "" ; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <a href="./?path=main&action=register">Créer un compte organisateur</a>

</div>
<!-- fin container -->


<?php
    $content = ob_get_clean();
    require("view/template.php");
    unset($_SESSION['message']);
?>