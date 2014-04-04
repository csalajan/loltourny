<?php

class SearcherController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
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
	public function store($name)
	{
		$validator = Validator::make(
		    array(
		    	'searcher_name' => Input::get('searcher_name'), 
		    	'searcher_summoner' => Input::get('searcher_summoner'),
		    	'searcher_position' => Input::get('searcher_position')),
		    array( 
		    	'searcher_name' => 'required|Regex:/^[\w\s]+$/i',
		    	'searcher_summoner' => 'required|alpha_num',
		    	'searcher_position' => 'required'),
		    array()
		);

		if ($validator->passes()) 
		{
			
			$searcher				 = new Searcher;
			$searcher->tournament_id = Tournament::getIDFromUrl($name);
			$searcher->name     	 = Input::get('searcher_name');
			$searcher->summoner      = Input::get('searcher_summoner');
			$searcher->position      = Input::get('searcher_position');

			$url = 'http://prod.api.pvp.net/api/lol/euw/v1.3/summoner/by-name/'.Input::get('searcher_summoner').'?api_key=60ab8879-822e-47bd-ba1a-2c5bd830ae3e';
			
			$result = $this->fetch_json($url);

	        if(!empty($result))
	        {
	        	$searcher->summoner_id = reset($result)->id;

	        	$url = 'http://prod.api.pvp.net/api/lol/euw/v2.3/league/by-summoner/'.$searcher->summoner_id.'?api_key=60ab8879-822e-47bd-ba1a-2c5bd830ae3e';
	        	$result = $this->fetch_json($url);

	        	if(empty($result))
	        	{
		        	$searcher->rank = 'Unranked';
		        	
	        	}else{
	        	
		        	$i = 0;
		        	while($i == 0)
		        	{
		        		if(current($result)->queue == 'RANKED_SOLO_5x5')
		        		{
		        			$rank = current($result)->tier;
		        			$i++;
		        		}else{
		        			next($result);
		        		}
		        	}

		        	$searcher->rank = ucfirst(strtolower($rank));

	        	}

	        }else{
	        	return Redirect::to($name.'#looking')
	        		->with('message-looking', 'Your summoner name is invalid.')
	        		->with('status', 'danger');
	        }

			$searcher->save();
      
      Cookie::queue('lookingforteam', $searcher->id, 86400);
      
			// redirect
			return Redirect::to($name.'#looking')
				->with('message-looking', 'Listing submitted successfully!')
				->with('status', 'success')
        ->with('searcher_id', $searcher->id);	
		}else{
			return Redirect::to($name.'#looking')
				->withErrors($validator)
				->withInput()
				->with('message-looking', 'Something was wrong with what you entered.')
				->with('status', 'danger');		
		}	
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
		
	}

}