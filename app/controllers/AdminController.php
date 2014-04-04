<?php

class AdminController extends \BaseController {
	
	protected $layout = 'layouts.main';

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$teams_count = Team::count();

		if($teams_count > 0)
		{
			$teams_query = Team::all();

			foreach($teams_query as $team)
			{
				$teams[$team->id]['name'] = $team->name;
				$teams[$team->id]['approved'] = $team->approved;

				$players = Player::where('team_id', '=', $team->id)->get();

				$i = 0;
				foreach($players as $player)
				{
					$i++;
					$teams[$team->id]['p'.$i.'_name'] = $player->name;
          $teams[$team->id]['p'.$i.'_email'] = $player->email;
					$teams[$team->id]['p'.$i.'_summoner'] = $player->summoner;
					$teams[$team->id]['p'.$i.'_pos'] = $player->position;
					$teams[$team->id]['p'.$i.'_student'] = $player->student;
					$teams[$team->id]['p'.$i.'_society'] = $player->society;
          $teams[$team->id]['p'.$i.'_summoner_id'] = $player->summoner_id;
          $teams[$team->id]['p'.$i.'_rank'] = $player->rank;
			
				}

				$teams[$team->id]['total_players'] = $i;
			}

		}else{
			$teams = false;
		}

		$this->layout->content = View::make('admin.index')
										->with('teams', $teams);
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