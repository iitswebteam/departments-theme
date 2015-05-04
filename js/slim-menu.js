
( function($) {

	$(document).ready(function(){	
		$('ul.slimmenu').slimmenu( /* main navigation for the site - uses slimmenu */
	{
	    resizeWidth: '800',
	    collapserTitle: '',
	    easingEffect:'easeInSine',
	    animSpeed:'medium',
	    indentChildren: true,
	    childrenIndenter: '&raquo;'
	});
		
		/*$('.departmental-menu').slimmenu(
	{
	    resizeWidth: '',
	    collapserTitle: '',
	    easingEffect:'easeInSine',
	    animSpeed:'medium',
	    indentChildren: true,
	    childrenIndenter: '&raquo;'
	});*/

		$('.departmental-menu').slicknav();  /*this call originally from slick-menu.js which is no longer needed */
		/* hamburger global menu - uses slicknav*/
		$("#global_header nav").show();  /*this call originally from display_button.js which is no longer needed */
		/* rench global menu - uses slimmenu */
});
}


)( jQuery );
	
	


