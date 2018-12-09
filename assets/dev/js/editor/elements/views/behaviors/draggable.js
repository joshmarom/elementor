var DraggableBehavior;

DraggableBehavior = Marionette.Behavior.extend( {

	events: {
		dragstart: 'onDragStart',
		dragstop: 'onDragStop',
	},

	initialize: function() {
		Marionette.Behavior.prototype.initialize.apply( this, arguments );

		this.listenTo( elementor.channels.dataEditMode, 'switch', this.toggle );

		const self = this,
			view = this.view,
			viewSettingsChangedMethod = view.onSettingsChanged;

		view.onSettingsChanged = function() {
			viewSettingsChangedMethod.apply( view, arguments );

			self.onSettingsChanged.apply( self, arguments );
		};
	},

	activate: function() {
		if ( ! elementor.userCan( 'design' ) ) {
			return;
		}

		this.deactivate();

		this.$el.append( '<div class="elementor-handle"><i class="fa fa-arrows"></i></div>' );

		this.$el.draggable( {
			addClasses: false,
			handle: '.elementor-handle',
		} );
	},

	deactivate: function() {
		if ( ! this.$el.draggable( 'instance' ) ) {
			return;
		}

		this.$el.draggable( 'destroy' );

		jQuery( this.$el.find( '> .elementor-handle' ) ).remove();
	},

	toggle: function() {
		const activeMode = elementor.channels.dataEditMode.request( 'activeMode' ),
			isAbsolute = this.view.getEditModel().getSetting( '_is_absolute' );

		if ( 'edit' === activeMode && isAbsolute ) {
			this.activate();
		} else {
			this.deactivate();
		}
	},

	onRender: function() {
		_.defer( () => this.toggle() );
	},

	onDestroy: function() {
		this.deactivate();
	},

	onDragStart: function( event ) {
		event.stopPropagation();

		this.view.model.trigger( 'request:edit' );
	},

	onDragStop: function( event, ui ) {
		event.stopPropagation();

		this.view.getEditModel().get( 'settings' ).setExternalChange( {
			_offset_x: { unit: 'px', size: ui.position.left },
			_offset_y: { unit: 'px', size: ui.position.top },
		} );

		this.$el.css( {
			top: '',
			left: '',
			right: '',
			bottom: '',
			width: '',
			height: '',
		} );
	},

	onSettingsChanged: function( changed ) {
		if ( changed.changed ) {
			changed = changed.changed;
		}

		if ( undefined !== changed._is_absolute ) {
			this.toggle();
		}
	},
} );

module.exports = DraggableBehavior;
