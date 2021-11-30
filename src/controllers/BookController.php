<?php

use RedBeanPHP\R as R;

class BookController
{
	public function index($twig)
    {
		R::setup(
			'mysql:host=localhost;dbname=test',
			'root',
			'' 
		);
		$book = R::dispense('books');
		$book->title = 'book1';
		$book->author = 'Julian';
		$book->publisher = 'je moeder';
		R::store($book);
		$book2 = R::dispense('books');
		$book2->title = 'book2';
		$book2->author = 'Julian';
		$book2->publisher = 'je moeder';
		R::store($book2);
		$books = R::find("books");
		echo $twig->render('./bookIndex.html', array(
			'books' => $books
		));
	}
}

?>
