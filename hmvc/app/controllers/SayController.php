<?php

use Phalcon\Mvc\Controller,
	Phalcon\Http\Response;

class SayController extends Controller
{

	public function helloAction()
	{
		return new Response('hello there');
	}

}