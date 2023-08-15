<div>

<h1 class = "pageTitle">Login</h1>

    <form class="" method="post">

        <label for="email">Email: </label>
        <input type="email" name="loginEmail" id="email" class="">
        <label for="password">Password: </label>
        <input type="password" name="loginPassword" id="password" class="">


		<?php 

		$login = new FormController();
		$login -> ctrLogin();

		?>

        <button type="submit" class="">Log In</button>
    </form>
</div>