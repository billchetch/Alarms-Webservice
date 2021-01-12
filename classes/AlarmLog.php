<?php
class AlarmLog extends \chetch\db\DBObject{
	
	public static function initialise(){
		$t = \chetch\Config::get('ALARM_LOG_TABLE', 'alarm_log');
		self::setConfig('TABLE_NAME', $t);
		
		$tzo = self::tzoffset();
		$sql = "SELECT *, CONCAT(created,' ', '$tzo') AS created FROM $t";
		self::setConfig('SELECT_SQL', $sql);
		
		self::setConfig('SELECT_DEFAULT_FILTER', "created<':to' AND created>=':from'");
		self::setConfig('SELECT_DEFAULT_SORT', "id DESC");
	}
	
	public function __construct($rowdata){
		parent::__construct($rowdata);
	}
}
?>