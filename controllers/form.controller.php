<?php

class FormController
{


    // sign in

    static public function ctrSignIn()
    {
        if (isset($_POST["signinName"])) {

            $table = "registered";

            $data = array(
                "name" => $_POST["signinName"],
                "email" => $_POST["signinEmail"],
                "password" => $_POST["signinPassword"]
            );
            $response = FormModel::mdlSignIn($table, $data);
            return $response;
        }
    }

    // select user

    static public function ctrSelectUser($item, $value)
    {
        $table = "registered";
        $response = FormModel::mdlSelectUser($table, $item, $value);
        return $response;
    }

    // log in

    public function ctrLogIn()
    {
        if (isset($_POST["loginEmail"])) {

            $table = "registered";
            $item = "email";
            $value = $_POST["loginEmail"];

            $response = FormModel::mdlSelectUser($table, $item, $value);
            if ($response["email"] == $_POST["loginEmail"] && $response["password"] == $_POST["loginPassword"]) {
                $_SESSION["validateLogin"] = "ok";
                echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?route=edit";

				</script>';
            } else {
                echo '<script>

                if ( window.history.replaceState ) {

                    window.history.replaceState( null, null, window.location.href );

                }

            </script>';

            echo '<div class="alert alert-danger">Error, wrong email or password</div>';
            }
        }
    }

    // update user

    static public function ctrUpdateUser()
    {
        if (isset($_POST["updateName"])) {

            if ($_POST["updatePassword"] != "") {
                $password = $_POST["updatePassword"];
            } else {
                $password = $_POST["currentPassword"];
            }

            $table = "registered";

            $data = array(
                "id" => $_POST["id"],
                "name" => $_POST["updateName"],
                "email" => $_POST["updateEmail"],
                "password" => $password
            );

            $response = FormModel::mdlUpdateUser($table, $data);


            if ($response == "ok") {
				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?route=home";

				</script>';
            }
        }
    }

    	// Delete User
	public function ctrDeleteUser()
	{

		if (isset($_POST["deleteUser"])) {

			$table = "registered";
			$value = $_POST["deleteUser"];

			$response = FormModel::mdlDeleteUser($table, $value);

			if ($response == "ok") {

				echo '<script>

					if ( window.history.replaceState ) {

						window.history.replaceState( null, null, window.location.href );

					}

					window.location = "index.php?route=home";

				</script>';
			}
		}
	}
}
?>
