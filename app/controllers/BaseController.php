<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function timelist()
	{

		$times = array();

		for($hours=0; $hours<24; $hours++){
    		for($mins=0; $mins<60; $mins+=5){
    			$key = str_pad($hours,2,'0',STR_PAD_LEFT).str_pad($mins,2,'0',STR_PAD_LEFT);
        		$value = str_pad($hours,2,'0',STR_PAD_LEFT).':'.str_pad($mins,2,'0',STR_PAD_LEFT);
        		$times[$key] = $value;
    		}
		}

		return $times;
	}

  public function fetch_json($url) {  
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($statuscode!=200){
      return "false";
    }
    $data = json_decode($result);
    curl_close($ch);
    return $data;
  }

  public function fetch_json_array($url) {  
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $statuscode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($statuscode!=200){
      return "false";
    }
    $data = json_decode($result, false);
    curl_close($ch);
    return $data;
  }

}