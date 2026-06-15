( function ( $ ) {
	'use strict';

	function initFaqAccordion( scope ) {
		$( '.we-faq__question', scope ).each( function () {
			var $btn = $( this );

			$btn.off( 'click.weFaq' ).on( 'click.weFaq', function () {
				var $item  = $btn.closest( '.we-faq__item' );
				var isOpen = $item.hasClass( 'we-faq__item--open' );

				$item.toggleClass( 'we-faq__item--open', ! isOpen );
				$btn.attr( 'aria-expanded', String( ! isOpen ) );

				var panelId = $btn.attr( 'aria-controls' );
				if ( panelId ) {
					$( '#' + panelId ).attr( 'aria-hidden', String( isOpen ) );
				}
			} );
		} );
	}

	$( document ).ready( function () {
		$( '.we-faq' ).each( function () {
			initFaqAccordion( this );
		} );
	} );

	$( window ).on( 'elementor/frontend/init', function () {
		elementorFrontend.hooks.addAction(
			'frontend/element_ready/welleats_faq_accordion.default',
			function ( $scope ) {
				initFaqAccordion( $scope[ 0 ] );
			}
		);
	} );

} )( jQuery );
