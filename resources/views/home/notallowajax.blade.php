<?php echo json_encode(
	[	"status"    => "success",
		"_redirect" => route("admin.dashboard.notallowajax"),
		"data"      => null,
		"message"   => "You do not have permission to use this action!"
	]); 
?>