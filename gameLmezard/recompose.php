<?php
	exec("tar xzf fun");
	chdir("ft_fun");
	exec("ls", $ret);
	
	foreach ($ret as $actRet)
	{
		$file = file_get_contents($actRet);
		$pos = strpos($file, "//file") + 6;
		if ($actRet != "recompose.php")
			$order[intval(substr($file, $pos))] = $file;
	}

	$line = "";
	ksort($order);
	foreach ($order as $k => $increaseOrder)
	{
			$line .= $increaseOrder."\n";
	}
	$fd = fopen("main.c", "w+");
	fwrite($fd, $line);
	fclose($fd);
	exec("gcc main.c");
	exec("./a.out", $output);
	foreach ($output as $actOutput)
		echo $actOutput."\n";
	$pos = strpos($output[0], "MY PASSWORD IS: ") + strlen("MY PASSWORD IS: ");
	echo "Hash is : ".hash("sha256", substr($output[0], $pos));

?>
