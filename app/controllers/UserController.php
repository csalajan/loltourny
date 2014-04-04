<?php

class UserController extends \BaseController {

	protected $layout = 'layouts.main';


	public function login()
	{
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'))))
		{
			return Redirect::to('admin')
				->with('message', 'You are now logged in!')
				->with('status', 'info');
		} else {
			return Redirect::to('users')
				->with('message', 'Your username/password combination was incorrect')
				->with('status', 'danger')
				->withInput();
		}
	}

	public function register()
	{
		$this->layout->content = View::make('register');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Auth::check())
		{
			$this->layout->content = View::make('admin.index');
		}else{
			$this->layout->content = View::make('login');
		}

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}