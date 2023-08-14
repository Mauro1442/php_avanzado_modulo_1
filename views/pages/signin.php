<h1 class = "pageTitle">Sign In</h1>

    <form action="" method="post">

        <label for="name">Name: </label>
        <input type="text" name="signinName" id="name">
        <label for="email">Email: </label>
        <input type="text" name="signinEmail" id="email">
        <label for="password">Password: </label>
        <input type="password" name="signinPassword" id="password">

        <?php
        $signIn = FormController::ctrSignIn();
        ?>

        <input type="submit" value="Sign In">
    </form>
</body>
</html>