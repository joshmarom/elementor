import BaseModalLayout from '../../../../../core/common/assets/js/views/modal/layout';

var NewTemplateView = require( 'elementor-admin/new-template/view' );

module.exports = BaseModalLayout.extend( {

	getModalOptions: function() {
		return {
			id: 'elementor-new-template-modal',
		};
	},

	getLogoOptions: function() {
		return {
			title: elementorAdmin.translate( 'new_template' ),
		};
	},

	initialize: function() {
		BaseModalLayout.prototype.initialize.apply( this, arguments );

		this.showLogo();

		this.showContentView();
	},

	showContentView: function() {
		this.modalContent.show( new NewTemplateView() );
	},
} );
