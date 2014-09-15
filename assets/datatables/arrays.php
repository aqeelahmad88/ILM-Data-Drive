<?php
mysql_connect("localhost", "root", "");
mysql_select_db("onsiteconfirm");

	$sql = "
		SELECT reports.id, DATE_FORMAT(reports.report_date, '%Y %b %d (%H:%i:%s)') AS date, reports.report_unit_num AS unit, locations.location_name AS location, accounts.account_name AS vendor, reports.report_summary AS summary
		FROM reports 
		LEFT JOIN locations ON reports.location_id = locations.id
		LEFT JOIN accounts ON reports.vendor_id = accounts.id
		ORDER BY reports.id DESC
	";
	$result = mysql_query($sql);
	
	$dataArr['data'] = array();
	while($row = mysql_fetch_assoc($result)){
		$r = array();
		$i=0;
		foreach($row as $key=>$value){
			if($i==0){
				$id = $value;	
			}
			$r[] = '<a href="reports/view/'.$id.'">'.$value.'</a>';	
		$i++;
		}
		
		$dataArr['data'][] = $r;
	}
	header('Content-Type: application/json');
	echo json_encode($dataArr);