import CommandBase from 'elementor-api/modules/command-base';

export class OpenSiteEditor extends CommandBase {
	apply() {
		elementorAppLoader.openApp( elementor.config.site_editor_url );
	}
}

export default OpenSiteEditor;
