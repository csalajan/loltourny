<?php

	class Tournament extends Eloquent
	{
		public static function getIDFromUrl($url)
		{
			$tournament = self::where('url', '=', $url)->first();
			return $tournament->id;
		}

	}