<?php
class AlarmLog extends \chetch\db\DBObject{
	
	public static function initialise(){
		$t = \chetch\Config::get('ALARM_LOG_TABLE', 'alarm_log');
		self::setConfig('TABLE_NAME', $t);
		
		$at = \chetch\Config::get('ALARMS_TABLE', 'alarms');
		
		$tzo = self::tzoffset();
		$sql = "SELECT l.id, l.alarm_state, l.alarm_message, l.comments, CONCAT(l.created,' ', '$tzo') AS created, a.alarm_id, a.alarm_name FROM $t AS l INNER JOIN $at AS a ON l.alarm_id=a.id";
		self::setConfig('SELECT_SQL', $sql);
		
		self::setConfig('SELECT_DEFAULT_FILTER', "created<':to' AND created>=':from'");
		self::setConfig('SELECT_DEFAULT_SORT', "id DESC");
		self::setConfig('SELECT_DEFAULT_LIMIT', 100);
	}
	
	public function __construct($rowdata){
		parent::__construct($rowdata);
	}
}
?>