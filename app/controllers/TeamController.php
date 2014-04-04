<?php

class TeamController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	
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
		    	'team_name' => Input::get('team_name'), 
		    	'player1_name' => Input::get('player1_name'),
		    	'player1_summoner' => Input::get('player1_summoner'),
		    	'player1_position' => Input::get('player1_position'),
		    	'player1_email' => Input::get('player1_email'),
		    	'player1_student' => Input::get('player1_student', false),
		    	'player1_society' => Input::get('player1_society', false),
		    	'player2_name' => Input::get('player2_name'),
		    	'player2_summoner' => Input::get('player2_summoner'),
		    	'player2_position' => Input::get('player2_position'),
		    	'player2_email' => Input::get('player2_email'),
		    	'player2_student' => Input::get('player2_student', false),
		    	'player2_society' => Input::get('player2_society', false),
		    	'player3_name' => Input::get('player3_name'),
		    	'player3_summoner' => Input::get('player3_summoner'),
		    	'player3_position' => Input::get('player3_position'),
		    	'player3_email' => Input::get('player3_email'),
		    	'player3_student' => Input::get('player3_student', false),
		    	'player3_society' => Input::get('player3_society', false),
		    	'player4_name' => Input::get('player4_name'),
		    	'player4_summoner' => Input::get('player4_summoner'),
		    	'player4_position' => Input::get('player4_position'),
		    	'player4_email' => Input::get('player4_email'),
		    	'player4_student' => Input::get('player4_student', false),
		    	'player4_society' => Input::get('player4_society', false),
		    	'player5_name' => Input::get('player5_name'),
		    	'player5_summoner' => Input::get('player5_summoner'),
		    	'player5_position' => Input::get('player5_position'),
		    	'player5_email' => Input::get('player5_email'),
		    	'player5_student' => Input::get('player5_student', false),
		    	'player5_society' => Input::get('player5_society', false),
		    	'player6_name' => Input::get('player6_name'),
		    	'player6_summoner' => Input::get('player6_summoner'),
		    	'player6_position' => Input::get('player6_position'),
		    	'player6_email' => Input::get('player6_email'),
		    	'player6_student' => Input::get('player6_student', false),
		    	'player6_society' => Input::get('player6_society', false),
		    	'player7_name' => Input::get('player7_name'),
		    	'player7_summoner' => Input::get('player7_summoner'),
		    	'player7_position' => Input::get('player7_position'),
		    	'player7_email' => Input::get('player7_email'),
		    	'player7_student' => Input::get('player7_student', false),
		    	'player7_society' => Input::get('player7_society', false)),
		    array( 
		    	'team_name' => 'required|Regex:/^[\w\s]+$/i', 
		    	'player1_name' => 'required|Regex:/^[\w\s]+$/i',
		    	'player1_summoner' => 'required|alpha_num',
		    	'player1_position' => 'required',
		    	'player1_email' => 'required|email',
		    	'player1_student' => '',
		    	'player1_society' => '',
		    	'player2_name' => 'required|Regex:/^[\w\s]+$/i',
		    	'player2_summoner' => 'required|alpha_num',
		    	'player2_position' => 'required',
		    	'player2_email' => 'required|email',
		    	'player2_student' => '',
		    	'player2_society' => '',
		    	'player3_name' => 'required|Regex:/^[\w\s]+$/i',
		    	'player3_summoner' => 'required|alpha_num',
		    	'player3_position' => 'required',
		    	'player3_email' => 'required|email',
		    	'player3_student' => '',
		    	'player3_society' => '',
		    	'player4_name' => 'required|Regex:/^[\w\s]+$/i',
		    	'player4_summoner' => 'required|alpha_num',
		    	'player4_position' => 'required',
		    	'player4_email' => 'required|email',
		    	'player4_student' => '',
		    	'player4_society' => '',
		    	'player5_name' => 'required|Regex:/^[\w\s]+$/i',
		    	'player5_summoner' => 'required|alpha_num',
		    	'player5_position' => 'required',
		    	'player5_email' => 'required|email',
		    	'player5_student' => '',
		    	'player5_society' => '',
		    	'player6_name' => 'Regex:/^[\w\s]+$/i|required_with_all:player6_summoner,player6_position,player6_email',
		    	'player6_summoner' => 'required_with_all:player6_name,player6_position,player6_email|alpha_num',
		    	'player6_position' => 'required_with_all:player6_summoner,player6_name,player6_email',
		    	'player6_email' => 'email|required_with_all:player6_summoner,player6_position,player6_name',
		    	'player6_student' => '',
		    	'player6_society' => '',
		    	'player7_name' => 'Regex:/^[\w\s]+$/i|required_with_all:player7_summoner,player7_position,player7_email',
		    	'player7_summoner' => 'required_with_all:player7_name,player7_position,player7_email|alpha_num',
		    	'player7_position' => 'required_with_all:player7_summoner,player7_name,player7_email',
		    	'player7_email' => 'email|required_with_all:player7_summoner,player7_position,player7_name',
		    	'player7_student' => '',
		    	'player7_society' => ''),
		    array()
		);

		if ($validator->passes()) 
		{
			
			$team 				 = new Team;
			$team->tournament_id = Tournament::getIDFromUrl($name);
			$team->name     	 = Input::get('team_name');
			$team->approved 	 = false;
			$team->save();

			if(Input::has('player6_name') && !Input::has('player7_name'))
			{
				$total_players = 6;
			}elseif(Input::has('player7_name')){
				$total_players = 7;
			}else{
				$total_players = 5;
			}

			for($i = 1; $i <= $total_players; $i++)
			{
				Log::info('Loop # '.$i);

				$result = $this->fetch_json('http://prod.api.pvp.net/api/lol/euw/v1.3/summoner/by-name/'.Input::get('player'.$i.'_summoner').'?api_key=60ab8879-822e-47bd-ba1a-2c5bd830ae3e');

				Log::info('Fetched Summoner ID from Summoner Name. Player '.$i);

		        if(isset($result))
		        {
		        	$summoner_id = reset($result)->id;

		        	Log::info('ID:'.$summoner_id.'. Player '.$i);
		        }else{
		        	return Redirect::to($team.'#entry')
		        		->with('message-entry', 'Invalid League of Legends Username:'.Input::get('player'.$i.'_summoner'))
		        		->with('status', 'danger');
		        }

		        $url = 'http://prod.api.pvp.net/api/lol/euw/v2.3/league/by-summoner/'.$summoner_id.'?api_key=60ab8879-822e-47bd-ba1a-2c5bd830ae3e';
	        	$result = $this->fetch_json($url);

	        	Log::info('Fetched Summoner League from Summoner ID. Player '.$i);
	        	
	        	if(empty($result))
	        	{
		        	$summoner_rank = 'Unranked';
		        	
	        	}else{

		        	$j = 0;
		        	while($j == 0)
		        	{
		        		if(current($result)->queue == 'RANKED_SOLO_5x5')
		        		{
		        			Log::info('Solo Ranked array found. Fetching tier. Player '.$i);
		        			$rank = current($result)->tier;
		        			Log::info('Tier: '.$rank.' Player '.$i);
		        			$j++;
		        		}else{
		        			next($result);
		        		}
		        	}

		        	$summoner_rank = ucfirst(strtolower($rank));

	        	}

				$player = new Player;
				$player->team_id = $team->id;
				$player->name = Input::get('player'.$i.'_name');
				$player->summoner = Input::get('player'.$i.'_summoner');
				$player->summoner_id = $summoner_id;
				$player->rank = $summoner_rank;
				$player->position = Input::get('player'.$i.'_position');
				$player->email = Input::get('player'.$i.'_email');
				$player->student = Input::get('player'.$i.'_student', false);
				$player->society = Input::get('player'.$i.'_society', false);

				$player->save();

				Log::info('Player '.Input::get('player'.$i.'_name').' saved!');
			}

			// redirect
			return Redirect::to($name)
				->with('message-index', 'Team submitted successfully!')
				->with('status', 'success');	
		}else{
			return Redirect::to($name.'#entry')
				->withErrors($validator)
				->withInput()
				->with('message-entry', 'Something was wrong with what you entered.')
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