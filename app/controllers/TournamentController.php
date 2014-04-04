<?php

class TournamentController extends \BaseController {

	protected $layout = 'layouts.main';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($name)
	{
		$tournament_query = Tournament::where('url', '=', $name);

		if($tournament_query->count() == 0)
		{
			App::abort(404, 'Tournament with url "'.$name.'" does not exist.');
		}elseif($tournament_query->count() > 1){
			App::abort(404, 'There are more than one tournaments with url \"'.$name);
		}elseif($tournament_query->count() == 1){
			$tournament = $tournament_query->first();

			$date = DateTime::createFromFormat('Y-m-d', $tournament->date)->format('jS F Y');
			$time = DateTime::createFromFormat('H:i:s', $tournament->time)->format('H:i');
      $signup_close = DateTime::createFromFormat('Y-m-d H:i:s', $tournament->signup_close)->format('jS F Y H:i');
      

			$teams_count = Team::where('tournament_id', '=', $tournament->id)->where('approved', '=', 1)->count();

			if($teams_count > 0)
			{
				$teams_query = Team::where('tournament_id', '=', $tournament->id)->where('approved', '=', 1)->get();

				foreach($teams_query as $team)
				{
					$teams[$team->id]['name'] = $team->name;

					$players = Player::where('team_id', '=', $team->id)->get();

					$i = 0;
					foreach($players as $player)
					{
						$i++;
						$teams[$team->id]['p'.$i.'_name'] = $player->name;
						$teams[$team->id]['p'.$i.'_summoner'] = $player->summoner;
						$teams[$team->id]['p'.$i.'_pos'] = $player->position;

						$result = $this->fetch_json('http://prod.api.pvp.net/api/lol/euw/v1.3/summoner/by-name/'.$player->summoner.'?api_key=60ab8879-822e-47bd-ba1a-2c5bd830ae3e');

				        if(isset($result))
				        {
				        	$id = reset($result)->id;
				        }else{
				        	$id = '';
				        }

				        $teams[$team->id]['p'.$i.'_summoner_id'] = $id;
						
					}

					$teams[$team->id]['total_players'] = $i;
				}

			}else{
				$teams = false;
			}

			$searchers = Searcher::all();

			$this->layout->content = View::make('tournaments.index')
										->with('tournament', $tournament)
										->with('date', $date)
										->with('time', $time)
										->with('teams', $teams)
										->with('searchers', $searchers)
                    ->with('signup_close', $signup_close);
		}else{
			App::abort(404, 'Tournament with url "'.$name.'" is causing an unknown error.');
		}
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = View::make('tournaments.create')->with('times', $this->timelist());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(
		    array(
		    	'size' => Input::get('size'), 
		    	'name' => Input::get('name'),
		    	'location' => Input::get('location'),
		    	'format' => Input::get('format'),
		    	'url'  => Input::get('url')),
		    array( 
		    	'size' => 'required', 
		    	'name' => 'required|Unique:tournaments|Regex:/^[\w\-\s]+$/i|min:3',
		    	'location' => 'required',
		    	'format' => 'required',
		    	'url'  => 'Unique:tournaments|Regex:/^[\w]+$/i|min:3'),
		    array()
		);

		if ($validator->passes()) 
		{
			if(Input::has('url'))
			{
				$url = strtolower(Input::get('url'));
			}else{
				$url = strtolower(str_replace(' ', '_', Input::get('name')));
			}

			$date = DateTime::createFromFormat('d/m/Y', Input::get('date'))->format('Y-m-d');
			$time = DateTime::createFromFormat('Hi', Input::get('time'))->format('H:i');

			$signup_datetime = Input::get('signup_time').' '.Input::get('signup_time');
			$signup_close = Datetime::createFromFormat('Hi d/m/Y', $signup_datetime)->format('Y-m-d H:i:s');
			
			$tournament = new Tournament;
			$tournament->name         = Input::get('name');
			$tournament->url          = $url;
			$tournament->size         = Input::get('size');
			$tournament->date         = $date;
			$tournament->time      	  = $time;
			$tournament->signup_close = $signup_close;
			$tournament->location     = Input::get('location');
			$tournament->format       = Input::get('format');
			$tournament->admin        = Input::get('admin');
			$tournament->save();

			// redirect
			return Redirect::to($url)
				->with('message', 'Tournament created successfully!')
				->with('status', 'success');	
		}else{
			return Redirect::to('create')
				->withErrors($validator)
				->withInput()
				->with('message', 'Something was wrong with what you entered.')
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
		//
	}

}