import HandlerModule from '../handler-module';

const GlobalHandler = HandlerModule.extend( {
	getElementName: function() {
		return 'global';
	},
	animate: function() {
		const $element = this.$element,
			animation = this.getAnimation(),
			elementSettings = this.getElementSettings(),
			animationDelay = elementSettings._animation_delay || elementSettings.animation_delay || 0;

		$element.removeClass( animation );

		setTimeout( function() {
			$element.removeClass( 'elementor-invisible' ).addClass( animation );
		}, animationDelay );
	},
	getAnimation: function() {
		const elementSettings = this.getElementSettings();

		return elementSettings.animation || elementSettings._animation;
	},
	onInit: function() {
		HandlerModule.prototype.onInit.apply( this, arguments );

		const animation = this.getAnimation();

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
	},
} );

module.exports = function( $scope ) {
	new GlobalHandler( { $element: $scope } );
};
