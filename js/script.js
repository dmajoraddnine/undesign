jQuery( function( $ ) { //pass the $ variable to avoid jquery conflicts
	$( document ).ready( function( $ ) {
	
		//show/hide the login form when (c) link is clicked
		$( '.secret' ).click( function( e ) {
			$( '#logininfo' ).toggle();
			e.preventDefault();
		})
		
		//attach autoResize function to minesweeper settings form
		$c = $( '#minesweeper-frame' ).contents();
		$c.find( '#settings-form' ).submit( function() {
			//$( '#minesweeper-frame' ).autoResize();
			alert( 'FORM SUBMITTED' );
		});
		
	});
	
	//function for the resizing of minesweeper iframe (thanks to Ahmy on stackoverflow: http://stackoverflow.com/a/701521)
	jQuery.fn.autoResize = function() {
		var gridSize = $( 'input:radio[name=selectSize]:checked' ).val();
		var newHeight;
		
		switch ( gridSize ) {
			case 8:
				newHeight = '350px';
				break;
			case 16:
				newHeight = '500px';
				break;
			case 32:
				newHeight = '800px';
				break;
		}
		$( this ).height = newheight;
	}
});