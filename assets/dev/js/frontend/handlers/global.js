var HandlerModule = require( 'elementor-frontend/handler-module' ),
	GlobalHandler;

GlobalHandler = HandlerModule.extend( {
	getElementName: function() {
		return 'global';
	},
	makeRellax: function() {
		var $element = this.$element;

		if ( $element.hasClass( '.elementor-parallax' ) ) {
			var rellax = new Rellax( $element );
			console.log( $element );
		}
	},
	animate: function() {
		var $element = this.$element,
			animation = this.getAnimation(),
			elementSettings = this.getElementSettings(),
			animationDelay = elementSettings._animation_delay || elementSettings.animation_delay || 0;

		$element.removeClass( animation );

		setTimeout( function() {
			$element.removeClass( 'elementor-invisible' ).addClass( animation );
		}, animationDelay );
	},
	getAnimation: function() {
		var elementSettings = this.getElementSettings();

		return elementSettings.animation || elementSettings._animation;
	},
	onInit: function() {
		HandlerModule.prototype.onInit.apply( this, arguments );

		var animation = this.getAnimation();

		if ( ! animation ) {
			return;
		}

		this.$element.removeClass( animation );

		elementorFrontend.waypoint( this.$element, this.animate.bind( this ) );
	},
	onElementChange: function( propertyName ) {
		if ( /^_?animation/.test( propertyName ) ) {
			this.animate();
		}
	}
} );

module.exports = function( $scope ) {
	new GlobalHandler( { $element: $scope } );
};
