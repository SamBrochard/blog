<?php


function reduce($content,$length)
{
	$segment = substr($content,0,$length);
	$espaceapressegment = $length+strpos($segment,' ');
	$segment = substr($content, 0,$espaceapressegment);
	return $segment;
}