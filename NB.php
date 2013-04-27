<?php

function classify($X,$n,$table)
{
  $class = array();//different classes 
	$allclass = array();//total individual classes
	$temp = array();


	//Finding different class attributes
	$i = mysql_query("select distinct(".$n.") from ".$table);
	while($j = mysql_fetch_array($i,MYSQL_ASSOC))
		$temp[] = $j;
	foreach($temp as $t)
		$class[] = $t[$n];

	//Finding total number of training classes
	$nc = mysql_query("select count(".$n.") as num from ".$table);
	$p = mysql_fetch_array($nc,MYSQL_ASSOC);
	$C = $p["num"];

	//Finding total number of individual classes
	foreach($class as $c)
	{
		$nc = mysql_query("select count(*) as num from ".$table." where ".$n."= '".$c."'");
		$m = mysql_fetch_array($nc,MYSQL_ASSOC);
		$allclass[$c] = $m["num"];
	}


	//Finding Prob of each class
	foreach($allclass as $c=>$p)
	{
		$Pc[$c] = round($p/$C,4);
		$argmax[$c] = 1;
	}


	//var_dump($allclass);
	foreach($allclass as $c=>$p)
	{
		foreach($X as $x=>$y)
		{
			$i = mysql_query("select count(*) as num from ".$table." where ".$n."='".$c."' AND ".$x."='".$y."'");
			$j = mysql_fetch_array($i,MYSQL_ASSOC);
			
			$P[$c][$x] = round($j["num"]/$allclass[$c],2);

	//Exception: P(data/class) might be 0 in some cases, ignore 0 for now
			if($P[$c][$x] != 0)
				$argmax[$c] *= $P[$c][$x];
		}
		$argmax[$c] *= $Pc[$c];
	}

	print_r(array_keys($argmax,max($argmax)));

	//mysql_query("insert into ".$table." values");
}
?>
