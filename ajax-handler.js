function getDestination(val) {
	$.ajax({
		type: "POST",
		url: "./ajax/Depart&Destination.php",
		data:'rankID='+val,
		beforeSend: function() {
			$("#rank-list").addClass("loader");
		},
		success: function(data){
			$("#rank-list").html(data);
			$("#rank-list").removeClass("loader");
		}
	});
}