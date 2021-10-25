<?php
use DB as DBS;
function getUsername($text = ""){
		$username = "";
		$result = DBS::select("SELECT GROUP_CONCAT(name) as username FROM `users` WHERE id in (2,3,4)");
		if (!empty($result)) {
			$username = $result[0]->username;
		}

return $username;
}