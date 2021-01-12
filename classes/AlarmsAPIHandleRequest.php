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
				if(!isset($params['from']))throw new Exception("No from date passed in query");
				if(!isset($params['to']))throw new Exception("No to date passed in query");
				
				$results = AlarmLog::createCollection($params);
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