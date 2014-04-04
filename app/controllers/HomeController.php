<?php

class HomeController extends BaseController {

	protected $layout = 'layouts.main';

	public function showIndex()
	{
		$this->layout->content = View::make('index');
	}
}