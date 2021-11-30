<?php

class HomeController
{
	public function index($twig)
    {
		echo $twig->render('./homeIndex.html');
	}
}
?>
