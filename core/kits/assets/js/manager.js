import Component from './component';
import panelView from './panel';
import panelMenuView from './panel-menu';
import PanelHeaderBehavior from './panel-header-behavior';
import Repeater from './repeater';
import GlobalControlSelect from './globals/global-select-behavior';

export default class extends elementorModules.editor.utils.Module {
	addPanelPages() {
		elementor.getPanelView().addPage( 'kit_settings', {
			view: panelView,
			title: elementor.translate( 'global_settings' ),
		} );

		elementor.getPanelView().addPage( 'kit_menu', {
			view: panelMenuView,
			title: elementor.translate( 'global_settings' ),
		} );
	}

	addPanelMenuItem() {
		const menu = elementor.modules.layouts.panel.pages.menu.Menu;

		menu.addItem( {
			name: 'global-settings',
			icon: 'eicon-global-settings',
			title: elementor.translate( 'global_settings' ),
			type: 'page',
			callback: () => $e.route( 'panel/global/menu' ),
		}, 'style', 'editor-preferences' );

		menu.addItem( {
			name: 'site-editor',
			icon: 'eicon-theme-builder',
			title: elementor.translate( 'site_editor' ),
			type: 'page',
			callback: () => $e.run( 'panel/global/open-site-editor' ),
		}, 'style', 'editor-preferences' );
	}

	addHeaderBehavior( behaviors ) {
			behaviors.kit = {
				behaviorClass: PanelHeaderBehavior,
			};

			return behaviors;
	}

	addGlobalsBehavior( behaviors, view ) {
		// The view can be a UI control which does not have this method
		if ( ! view.isGlobalActive ) {
			return;
		}

		const isGlobalActive = view.isGlobalActive();

		if ( 'color' === view.options.model.get( 'type' ) && isGlobalActive ) {
			behaviors.globals = {
				behaviorClass: GlobalControlSelect,
				popoverTitle: elementor.translate( 'global_colors_title' ),
				manageButtonText: elementor.translate( 'manage_global_colors' ),
				tooltipText: elementor.translate( 'global_colors_info' ),
				newGlobalConfirmTitle: elementor.translate( 'create_global_color' ),
			};
		}

		if ( 'popover_toggle' === view.options.model.get( 'type' ) && 'typography' === view.options.model.get( 'groupType' ) && isGlobalActive ) {
			behaviors.globals = {
				behaviorClass: GlobalControlSelect,
				popoverTitle: elementor.translate( 'global_text_styles_title' ),
				manageButtonText: elementor.translate( 'manage_global_typography' ),
				tooltipText: elementor.translate( 'global_typography_info' ),
				newGlobalConfirmTitle: elementor.translate( 'create_global_style' ),
			};
		}

		return behaviors;
	}

	onInit() {
		super.onInit();

		elementorCommon.elements.$window.on( 'elementor:loaded', () => {
			if ( ! elementor.config.initial_document.panel.support_kit ) {
				return;
			}

			if ( ! elementor.config.user.can_edit_kit ) {
				return;
			}

			$e.components.register( new Component( { manager: this } ) );

			elementor.addControlView( 'global-style-repeater', Repeater );

			elementor.hooks.addFilter( 'panel/header/behaviors', this.addHeaderBehavior );

			elementor.hooks.addFilter( 'controls/base/behaviors', this.addGlobalsBehavior );

			elementor.on( 'panel:init', () => {
				this.addPanelPages();

				this.addPanelMenuItem();
			} );
		} );
	}
}
