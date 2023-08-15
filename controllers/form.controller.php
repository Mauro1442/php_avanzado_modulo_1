<?php

class FormController
{

    /*-------------Sign in---------------*/

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
}

