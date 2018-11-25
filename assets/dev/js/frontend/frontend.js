/* global elementorFrontendConfig */
import HotKeys from '../../../../core/common/assets/js/utils/hot-keys';
import environment from '../../../../core/common/assets/js/utils/environment';

( function( $ ) {
	var elements = {},
		EventManager = require( '../utils/hooks' ),
		Module = require( './handler-module' ),
		ElementsHandler = require( 'elementor-frontend/elements-handler' ),
		YouTubeModule = require( 'elementor-frontend/utils/youtube' ),
		AnchorsModule = require( 'elementor-frontend/utils/anchors' ),
		LightboxModule = require( 'elementor-frontend/utils/lightbox' );

	var ElementorFrontend = function() {
		var self = this,
			dialogsManager;

		this.config = elementorFrontendConfig;

		this.Module = Module;

		var setDeviceModeData = function() {
			elements.$body.attr( 'data-elementor-device-mode', self.getCurrentDeviceMode() );
		};

		var initElements = function() {
			elements.window = window;

			elements.$window = $( window );

			elements.$document = $( document );

			elements.$body = $( document.body );

			elements.$elementor = elements.$document.find( '.elementor' );

			elements.$wpAdminBar = elements.$document.find( '#wpadminbar' );
		};

		var initHotKeys = function() {
			self.hotKeys = new HotKeys();

			self.hotKeys.bindListener( elements.$window );
		};

		var bindEvents = function() {
			elements.$window.on( 'resize', setDeviceModeData );
		};

		var initOnReadyComponents = function() {
			self.utils = {
				youtube: new YouTubeModule(),
				anchors: new AnchorsModule(),
				lightbox: new LightboxModule(),
			};

			self.modules = {
				utils: {
					Module: require( 'elementor-utils/module' ),
					ViewModule: require( 'elementor-utils/view-module' ),
				},
				StretchElement: require( 'elementor-frontend/modules/stretch-element' ),
				Masonry: require( 'elementor-utils/masonry' ),
			};

			self.elementsHandler = new ElementsHandler( $ );
		};

		var getSiteSettings = function( settingType, settingName ) {
			var settingsObject = self.isEditMode() ? elementor.settings[ settingType ].model.attributes : self.config.settings[ settingType ];

			if ( settingName ) {
				return settingsObject[ settingName ];
			}

			return settingsObject;
		};

		var addIeCompatibility = function() {
			var el = document.createElement( 'div' ),
				supportsGrid = 'string' === typeof el.style.grid;

			if ( ! environment.ie && supportsGrid ) {
				return;
			}

			elements.$body.addClass( 'elementor-msie' );

			var msieCss = '<link rel="stylesheet" id="elementor-frontend-css-msie" href="' + self.config.urls.assets + 'css/frontend-msie.min.css?' + self.config.version + '" type="text/css" />';

			elements.$body.append( msieCss );
		};

		this.init = function() {
			self.hooks = new EventManager();

			initElements();

			addIeCompatibility();

			bindEvents();

			setDeviceModeData();

			elements.$window.trigger( 'elementor/frontend/init' );

			if ( ! self.isEditMode() ) {
				initHotKeys();
			}

			initOnReadyComponents();
		};

		this.getElements = function( element ) {
			if ( element ) {
				return elements[ element ];
			}

			return elements;
		};

		this.getPageSettings = function( settingName ) {
			return getSiteSettings( 'page', settingName );
		};

		this.getGeneralSettings = function( settingName ) {
			return getSiteSettings( 'general', settingName );
		};

		this.getDialogsManager = function() {
			if ( ! dialogsManager ) {
				dialogsManager = new DialogsManager.Instance();
			}

			return dialogsManager;
		};

		this.isEditMode = function() {
			return self.config.isEditMode;
		};

		// Based on underscore function
		this.throttle = function( func, wait ) {
			var timeout,
				context,
				args,
				result,
				previous = 0;

			var later = function() {
				previous = Date.now();
				timeout = null;
				result = func.apply( context, args );

				if ( ! timeout ) {
					context = args = null;
				}
			};

			return function() {
				var now = Date.now(),
					remaining = wait - ( now - previous );

				context = this;
				args = arguments;

				if ( remaining <= 0 || remaining > wait ) {
					if ( timeout ) {
						clearTimeout( timeout );
						timeout = null;
					}

					previous = now;
					result = func.apply( context, args );

					if ( ! timeout ) {
						context = args = null;
					}
				} else if ( ! timeout ) {
					timeout = setTimeout( later, remaining );
				}

				return result;
			};
		};

		this.addListenerOnce = function( listenerID, event, callback, to ) {
			if ( ! to ) {
				to = elements.$window;
			}

			if ( ! self.isEditMode() ) {
				to.on( event, callback );

				return;
			}

			this.removeListeners( listenerID, event, to );

			if ( to instanceof jQuery ) {
				var eventNS = event + '.' + listenerID;

				to.on( eventNS, callback );
			} else {
				to.on( event, callback, listenerID );
			}
		};

		this.removeListeners = function( listenerID, event, callback, from ) {
			if ( ! from ) {
				from = elements.$window;
			}

			if ( from instanceof jQuery ) {
				var eventNS = event + '.' + listenerID;

				from.off( eventNS, callback );
			} else {
				from.off( event, callback, listenerID );
			}
		};

		this.getCurrentDeviceMode = function() {
			return getComputedStyle( elements.$elementor[ 0 ], ':after' ).content.replace( /"/g, '' );
		};

		this.waypoint = function( $element, callback, options ) {
			var defaultOptions = {
				offset: '100%',
				triggerOnce: true,
			};

			options = $.extend( defaultOptions, options );

			var correctCallback = function() {
				var element = this.element || this,
					result = callback.apply( element, arguments );

				// If is Waypoint new API and is frontend
				if ( options.triggerOnce && this.destroy ) {
					this.destroy();
				}

				return result;
			};

			return $element.elementorWaypoint( correctCallback, options );
		};
	};

	window.elementorFrontend = new ElementorFrontend();
} )( jQuery );

if ( ! elementorFrontend.isEditMode() ) {
	jQuery( elementorFrontend.init );
}
