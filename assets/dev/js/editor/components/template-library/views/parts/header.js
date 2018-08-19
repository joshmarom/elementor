var TemplateLibraryHeaderView;

TemplateLibraryHeaderView = Marionette.LayoutView.extend( {

	className: 'elementor-templates-modal__header',

	template: '#tmpl-elementor-templates-modal__header',

	regions: {
		logoArea: '.elementor-templates-modal__header__logo-area',
		tools: '#elementor-template-library-header-tools',
		menuArea: '.elementor-templates-modal__header__menu-area'
	},

	ui: {
		closeModal: '.elementor-templates-modal__header__close'
	},

	events: {
		'click @ui.closeModal': 'onCloseModalClick'
	},

	templateHelpers: function() {
		return {
			closeType: this.getOption( 'closeType' )
		};
	},

	onCloseModalClick: function() {
		this._parent._parent._parent.hideModal();
	}
} );

module.exports = TemplateLibraryHeaderView;
