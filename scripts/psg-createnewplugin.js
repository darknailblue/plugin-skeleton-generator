/**
 * Front end logic - This is finally crazy stable and
 * elegant!
 *
 * NOTE: Remember that these event handlers require
 * more than just a bind or click since they are
 * being created dynamically.  This code currently
 * works with jQuery 1.7+ and therefore WordPress 3.3+
 */
jQuery(document).ready(function($){
	/**
	 * Establish global variables
	 */
	var newnum = 0;
	
	$( "#menu-to-edit" ).sortable(
		{ placeholder: "sortable-placeholder" }
	);
	
	
	/**
	 * Remove event handler
	 */
	$(document).on('click', '.item-delete', function(e){
		e.preventDefault();
		
		// Get our ID
		var menuID = $(this).attr('id');
		menuID = menuID.replace('delete-', '');
		
		$('#menu-item-settings-' + menuID).slideUp( 'fast', function(){
			$('#menu-item-' + menuID).fadeOut('fast', function(){
				$('#menu-item-' + menuID).remove();	
			});	
		});
		
	});


	/**
	 * Menu name event handler
	 */
	$(document).on('keyup', '.menu-label', function(){
		// Get our ID
		var menuID = $(this).attr('id');
		menuID = menuID.replace('menu-label-', '');

		// Test the length and process
		var mytext = $(this).val();
		
		if ( mytext.length )
			$('#item-title-' + menuID).html($(this).val());
		
		else
			$('#item-title-' + menuID).html('New Menu Item');
	});


	/**
	 * Menu type event handler
	 */
	$(document).on('change', '.menu-type', function(){
		// Get our ID
		var menuID = $(this).attr('id');
		menuID = menuID.replace('menu-type-', '');
		
		// Process the change
		switch ($(this).val()){
			case 'option' :
				$('#item-type-' + menuID).html('Options Page');
				$('#menu-parent-container-' + menuID).slideUp('fast');
				break;
			
			case 'object' :
				$('#item-type-' + menuID).html('Object Page');
				$('#menu-parent-container-' + menuID).slideUp('fast');
				break;
				
			case 'sub' :
				$('#item-type-' + menuID).html('Sub Menu Page');
				$('#menu-parent-container-' + menuID).slideDown('fast');
				break;
		}
	});


	/**
	 * Menu toggle event handler
	 */
	$(document).on('click', '.item-edit', function(e){
		e.preventDefault();
		
		// Get our ID
		var menuID = $(this).attr('id');
		menuID = menuID.replace('edit-', '');
		
		// Toggle the content
		$('#menu-item-settings-' + menuID).slideToggle( 'fast' );
		
		// Toggle the class
		if ( $('#menu-item-' + menuID).hasClass('menu-item-edit-inactive') )
			$('#menu-item-' + menuID).removeClass('menu-item-edit-inactive').addClass('menu-item-edit-active');
		
		else
			$('#menu-item-' + menuID).removeClass('menu-item-edit-active').addClass('menu-item-edit-inactive');
		
	});


	/**
	 * Add a new menu event handler
	 */
	$('.psg-addnewmenu').click(function(e){
		e.preventDefault();
		
		// Build yet another string and add the code
		var newitem = '';
		
		// Increase the number so we don't run into any conflicts
		newnum++;
		
		newitem+='<li id="menu-item-' + newnum + '" class="menu-item menu-item-edit-inactive" style="display: none;">' + "\n";
		newitem+='<dl class="menu-item-bar">' + "\n";
		newitem+='<dt class="menu-item-handle">' + "\n";
		newitem+='<span class="item-title" id="item-title-' + newnum + '">New Menu Item</span>' + "\n";
		newitem+='<span class="item-controls">' + "\n";
		newitem+='<span class="item-type" id="item-type-' + newnum + '">Options Page</span>' + "\n";
		newitem+='<a class="item-edit" id="edit-' + newnum + '" title="Edit Menu Item" href="#">Edit Menu Item</a>' + "\n";
		newitem+='</span>' + "\n";
		newitem+='</dt>' + "\n";
		newitem+='</dl>' + "\n";
		newitem+='<div class="menu-item-settings" id="menu-item-settings-' + newnum + '" style="display: none; ">' + "\n";
		
		newitem+='<p class="description description-wide">' + "\n";
		newitem+='<label for="menu-type-' + newnum + '">' + "\n";
		newitem+='Menu Type<br />' + "\n";
		newitem+='<select name="menu-type-' + newnum + '" id="menu-type-' + newnum + '" class="menu-type">' + "\n";
		newitem+='<option value="option">Options Page</option>' + "\n";
		newitem+='<option value="object">Object Page</option>' + "\n";
		newitem+='<option value="sub">Sub Menu Page</option>' + "\n";
		newitem+='</select>' + "\n";
		newitem+='</label>' + "\n";
		newitem+='</p>' + "\n";
		
		newitem+='<p class="description description-wide" style="display: none;" id="menu-parent-container-' + newnum + '">' + "\n";
		newitem+='<label for="menu-parent-' + newnum + '">' + "\n";
		newitem+='Menu Parent<br />' + "\n";
		newitem+='<input type="text" id="menu-parent-' + newnum + '" class="menu-parent widefat code" name="menu-parent-' + newnum + '" value="" />' + "\n";
		newitem+='</label>' + "\n";
		newitem+='</p>' + "\n";
		
		newitem+='<p class="description description-wide">' + "\n";
		newitem+='<label for="menu-label-' + newnum + '">' + "\n";
		newitem+='Menu Label<br />' + "\n";
		newitem+='<input type="text" id="menu-label-' + newnum + '" class="menu-label widefat code" name="menu-label-' + newnum + '" value="" />' + "\n";
		newitem+='</label>' + "\n";
		newitem+='</p>' + "\n";
		
		newitem+='<p class="description description-wide">' + "\n";
		newitem+='<label for="menu-slug-' + newnum + '">' + "\n";
		newitem+='Menu Slug<br />' + "\n";
		newitem+='<input type="text" id="menu-slug-' + newnum + '" class="menu-slug widefat code" name="menu-slug-' + newnum + '" value="" />' + "\n";
		newitem+='</label>' + "\n";
		newitem+='</p>' + "\n";
		
		newitem+='<p class="description description-wide">' + "\n";
		newitem+='<label for="menu-title-' + newnum + '">' + "\n";
		newitem+='Menu SEO Title<br />' + "\n";
		newitem+='<input type="text" id="menu-title-' + newnum + '" class="menu-title widefat code" name="menu-title-' + newnum + '" value="" />' + "\n";
		newitem+='</label>' + "\n";
		newitem+='</p>' + "\n";
		
		newitem+='<div class="menu-item-actions description-wide submitbox">' + "\n";
		newitem+='<a class="item-delete submitdelete deletion" id="delete-' + newnum + '" href="#">Remove</a>' + "\n";
		newitem+='</div>' + "\n";
		newitem+='<div style="clear: both;"></div>' + "\n";
		newitem+='</div><!-- .menu-item-settings-->' + "\n";
		newitem+='<ul class="menu-item-transport"></ul>' + "\n";
		newitem+='</li>' + "\n";
		
		$('#menu-to-edit').append(newitem);
		$('#menu-item-' + newnum).fadeIn();
	});


	/**
	 * Previous event handler
	 */
	$('.previous').click(function(e){
		e.preventDefault();
		displaySection( 'previous' );
	});


	/**
	 * Next event handler
	 */
	$('.next').click(function(e){
		e.preventDefault();
		displaySection( 'next' );
	});


	/**
	 * Find out what section to show, hide
	 * and what buttons to display
	 */
	function displaySection( direction ){
		
		var workingVar; var newSection;	
		
		// Find the active sections
		$('.psgsection').each(function(index){
			
			// Find the current VISIBLE section
			if ( $(this).is(":visible")) {
				workingVar = index;
				$(this).slideUp();
			}
						
		});
		
		
		// Loop through and process the sections
		switch ( direction ) {
			case 'previous' :
			
				newSection = workingVar - 1
				
				$('.next').show();
				$('.button-primary').hide();
				
				$('.psgsection').each(function(index){
					
					if ( index === ( newSection ) )
						$(this).slideDown();
						
					if ( newSection !== 0 )
						$('.previous').show();
						
					else
						$('.previous').hide();
				});
				
				break;
				
				
			case 'next' :
			
				newSection = workingVar + 1;
				
				$('.previous').show();
				
				$('.psgsection').each(function(index){
					
					if ( index === ( newSection ) )
						$(this).slideDown();
						
					if ( newSection !== ( $('.psgsection').size() - 1 ) ) {
						$('.next').show();
						$('.button-primary').hide();
					}
					
					else {
						$('.next').hide();
						$('.button-primary').show();
					}
				});
				
				break;	
		}
	}
});