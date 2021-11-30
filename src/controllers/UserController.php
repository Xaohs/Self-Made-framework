<?php

class UserController
{
	public function login($twig)
    {
		echo $twig->render('./loginIndex.html');
	}
}

?>
