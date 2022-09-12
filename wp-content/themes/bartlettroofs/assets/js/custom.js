if($("#page-selected").val() == "single") {
	$( "#main-body" ).removeClass("home-page")
	$( "#main-body" ).removeClass("transparent")
	$( "#main-body" ).removeClass("toplevel-page")
} else {
	$( "#main-body" ).addClass("home-page")
	$( "#main-body" ).addClass("transparent")
	$( "#main-body" ).addClass("toplevel-page")
}
