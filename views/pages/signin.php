<div>

    <h1 class="pageTitle">Sign In</h1>

    <form action="" method="post" class="form">

        <label for="name">Name: </label>
        <input type="text" name="signinName" id="name" class="">
        <label for="email">Email: </label>
        <input type="text" name="signinEmail" id="email" class="">
        <label for="password">Password: </label>
        <input type="password" name="signinPassword" id="password" class="">

        <?php
        $signIn = FormController::ctrSignIn();
        ?>

        <input type="submit" value="send" class="send">
    </form>
</div>