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

        try 
        {    
            $signIn = FormController::ctrSignIn();
            if ($signIn == "ok") 
            {
                echo '<script>
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
                </script>';
                echo '<div class="alert alert-success">User created</div>';
            }
        } 
        catch (Exception $e) 
        {
            echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
        }
        ?>

        <input type="submit" value="send" class="send">
    </form>
</div>

