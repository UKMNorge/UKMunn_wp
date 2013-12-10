<?php
require_once('UKM/sql.class.php');

$messages = new SQL("SELECT * FROM `ukm_unn` AS `c`
					 LEFT JOIN `ukm_unn_send` AS `s`
					 	ON (`c`.`id` = `s`.`unn_id`)
					 ORDER BY `c`.`id` DESC");
$messages = $messages->run();

while($r = mysql_fetch_assoc( $messages ) ) {
	if(empty($r['send_type']))
		$r['send_type'] = 'ikke_sendt';
	
	$array = array();
	foreach($r as $key => $val) {
		$array[$key] = utf8_encode( $val );
	}
	
	$INFOS['messages'][] = $array;
	

}