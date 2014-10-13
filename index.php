<?php
	$list = file_get_contents("cache/repositories.html");
	
    $re = "/name=\"(.*)\" href=\"(.*)\"/"; 
   
    preg_match_all($re, $list, $matches);	
	

	for($i = 0; $i < sizeOf($matches[1]); $i++) {
		//e cho '--->' . $matches[1][$i] . ' - ' . $matches[2][$i] . '<--' . PHP_EOL;
		
		$cmd = 'svn log --xml --username USERNAME --password PASSWORD -l 100 BASEURL' .  $matches[2][$i] . ' > cache/logs/' . $matches[1][$i] . '.xml';
		echo '--->' . $cmd . '<--';
		exec($cmd);		
		//die;
	}
	
	//todo load xml data
	/*
	$xmlData = simplexml_load_string(utf8_decode(trim(shell_exec($cmd))));
	foreach($xmlData->logentry as $log) {
		$date = substr($log->date, 0, 10);
		$msg = $log->msg;
		$auth = $log->author;
		echo "$date: <b>$msg</b> - $auth<br>\n";
	}
	*/	
	
?> 