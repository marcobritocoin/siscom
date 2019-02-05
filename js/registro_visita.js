$(document).on("pagecreate","#contact",function(){
	 $("#cierrePanel").click(function(){						  
  		$.mobile.changePage( "index.php", { transition: "slideup"} );
  	});
});