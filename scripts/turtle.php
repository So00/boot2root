<?php

	$turtle = file_get_contents("turtle");
	while (preg_match("/^(Tourne droite de )([0-9]+).*$/im", $turtle))
		$turtle = preg_replace("/^(Tourne droite de )([0-9]+).*$/im", "right $2", $turtle);
	while (preg_match("/^(Avance )([0-9]+).*$/im", $turtle))
		$turtle = preg_replace("/^(Avance )([0-9]+).*$/im", "forward $2", $turtle);
	while (preg_match("/^(Recule )([0-9]+).*$/im", $turtle))
		$turtle = preg_replace("/^(Recule )([0-9]+).*$/im", "back $2", $turtle);
	while (preg_match("/^(Tourne gauche de )([0-9]+).*$/im", $turtle))
		$turtle = preg_replace("/^(Tourne gauche de )([0-9]+).*$/im", "left $2", $turtle);
	file_put_contents("turtleSolver", $turtle);
