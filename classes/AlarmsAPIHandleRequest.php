<?php
use chetch\api\APIException as APIException;

class AlarmsAPIHandleRequest extends chetch\api\APIHandleRequest{
	
	
	protected function processGetRequest($request, $params){
		$data = array();
		$requestParts = explode('/', $request);
		switch($requestParts[0]){
			case 'test':
				$data = array('response'=>"Alarms test Yeah baby");
				break;

			case 'about':
				$data = static::about();
				break;
			

			case 'log':
				if(!isset($params['from']))$params['from'] = '0000-00-00';
				if(!isset($params['to']))$params['to'] = '9999-01-01';
				$filter = null;
				$sort = null;
				$limit = null;

				if(isset($params['alarm_id']))$filter = "a.alarm_id='".$params['alarm_id']."'";
				$results = AlarmLog::createCollection($params, $filter, $sort, $limit);
				$data = AlarmLog::collection2rows($results);
				break;
			default:
				throw new Exception("Unrecognised api request $request");
				break;
			
		}
		return $data;
	}

	protected function processPutRequest($request, $params, $payload){
		
		$data = array();
		$requestParts = explode('/', $request);
		
		switch($requestParts[0]){
			default:
				throw new Exception("Unrecognised api request $request");
		}

		return $data;
	}

	protected function processDeleteRequest($request, $params){
		
		$data = array();
		$requestParts = explode('/', $request);
		
		switch($requestParts[0]){
			default:
				throw new Exception("Unrecognised api request $request");
		}

		return $data;
	}
}
?>