<?php

namespace Test\Backend\Controllers;

use Test\Backend\Models\Article;

class ArticleController extends \Phalcon\Mvc\Controller
{

	public function indexAction()
	{
		$this->view->articles = Article::find();
	}

}