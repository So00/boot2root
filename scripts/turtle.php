<?php

	$turtle = file_get_contents("turtle");
	$parsed = preg_replace("/^(Tourne droite de )([0-9]+).*$/ig", "right $2", $turtle);
	echo $parsed."\n";
