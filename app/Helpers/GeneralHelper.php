<?php

function rupiah($num) {
    $res = "Rp " . number_format($num,2,',','.');
	return $res;
}