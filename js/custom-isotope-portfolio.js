jQuery(document).ready(function() {
	// Isotope for Portfolio

jQuery('.patti-grid[id^="gridwrapper_"]').each( function() { 

	var $div = jQuery(this);
	var token = $div.data('token');
	var settingObj = window['dt_grid_' + token];	
	
	var $container = '';
	var $optionSets = '';

	if (typeof settingObj === 'undefined') {
		$container = jQuery(".grid_portfolio");
		$optionSets = jQuery('#gridwrapper_portfolio #options .option-set');
	}
	else {
		$container = jQuery(".grid_"+settingObj.id+"");
		$optionSets = jQuery('#gridwrapper_'+settingObj.id+'  #options .option-set');
	}


	colWidth = function () {
		var w = $container.width(), 
			columnNum = 1,
			columnWidth = 0;
		if (w > 1440) {
			columnNum  = 7;
		} else if (w > 1365) {
			columnNum  = 5;
		} else if (w > 1279) {
			columnNum  = 5;
		} else if (w > 1023) {
			columnNum  = 5;
		} else if (w > 767) {
			columnNum  = 3;
		} else if (w > 479) {
			columnNum  = 2;
		}
		
		columnWidth = Math.floor(w/columnNum);
		$container.find('.grid-item').each(function() {
			var $item = jQuery(this);
			if ($item.hasClass('item-wide')) {
				if (w < 480) {
					jQuery('.item-wide').css({
						'width'		 : ((columnWidth)-4) + 'px',
						'height' : Math.round(((columnWidth)-4) * 0.7777777) + 'px'
					});
					jQuery('.item-wide img').css({
						'width'		 : ((columnWidth)-4) + 'px',
						'height' : 'auto'
					});	
				}
				else {
					jQuery('.item-wide').css({
						'width'		 : ((columnWidth*2)-4) + 'px',
						'height' : Math.round(((columnWidth*2)-4) * 0.7777777) + 'px'
					});
					jQuery('.item-wide img').css({
						'width'		 : ((columnWidth*2)-4) + 'px',
						'height' : 'auto'
					});				
				}
			}	
			
//			if ($item.hasClass('item-small')) {
//				jQuery('.item-small').css({
//					'width'		 : ((columnWidth)-4) + 'px',
//					'height' : Math.round(((columnWidth)-4) * 0.7777777) + 'px'
//				});
//				jQuery('.item-small img').css({
//					'width'		 : ((columnWidth)-4) + 'px',
//					'height' : 'auto'
//				});
//			}
				
//			if ($item.hasClass('item-long')) {
//				if (w < 480) {
//					jQuery('.item-long').css({
//						'width'		 : ((columnWidth)-4) + 'px',
//						'height' : Math.round(((columnWidth)-4) * 0.7777777/2) + 'px'
//					});
//					jQuery('.item-long img').css({
//						'width'		 : ((columnWidth)-4) + 'px',
//						'height' : 'auto'
//					});
//				}
//				else {
//					jQuery('.item-long').css({
//						'width'		 : ((columnWidth*2)-4) + 'px',
//						'height' : Math.round(((columnWidth)-4) * 0.7777777) + 'px'
//					});
//					jQuery('.item-long img').css({
//						'width'		 : ((columnWidth*2)-4) + 'px',
//						'height' : 'auto'
//					});
//				}
//			}
			
//			if ($item.hasClass('item-high')) {
//				jQuery('.item-high').css({
//					'width'		 : ((columnWidth)-4) + 'px',
//					'height' : Math.round(((columnWidth*2)-4) * 0.7777777) + 'px'
//				});
//				jQuery('.item-high img').css({
//					'width'		 : ((columnWidth)-4) + 'px',
//					'height' : 'auto'
//				});
//			}

		});
		return columnWidth;
	}
	
	// Isotope Call
	gridIsotope = function () {
		$container.isotope({
			layoutMode : 'masonry',
			itemSelector: '.grid-item',
			animationEngine: 'jquery',	
			resizable: false,
			masonry: { columnWidth: colWidth(), gutterWidth: 0 }
		});
	};
	gridIsotope();
	jQuery(window).smartresize(gridIsotope);	
	

	// Portfolio Filtering

		$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
		var $this = jQuery(this);
		// don't proceed if already selected
		if ( $this.hasClass('selected') ) {
			return false;
		}
		var $optionSet = $this.parents('.option-set');
		$optionSet.find('.selected').removeClass('selected');
		$this.addClass('selected');
  
		// make option object dynamically, i.e. { filter: '.my-filter-class' }
		var options = {},
			key = $optionSet.attr('data-option-key'),
			value = $this.attr('data-option-value');
		// parse 'false' as false boolean
		value = value === 'false' ? false : value;
		options[ key ] = value;
		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
		  // changes in layout modes need extra logic
		  changeLayoutMode( $this, options )
		} else {
		  // otherwise, apply new options
		  $container.isotope( options );
		}
		
		return false;
	});				
	

	});
});