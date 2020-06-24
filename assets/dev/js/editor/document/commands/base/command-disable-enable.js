import CommandHistory from './command-history';
import ElementsSettings from 'elementor-document/elements/commands/settings';

export default class CommandDisableEnable extends CommandHistory {
	static getName() {
		elementorModules.ForceMethodImplementation();
	}

	/**
	 * @returns {string}
	 */
	static getEnableCommand() {
		elementorModules.ForceMethodImplementation();
	}

	/**
	 * @returns {string}
	 */
	static getDisableCommand() {
		elementorModules.ForceMethodImplementation();
	}

	static restore( historyItem, isRedo ) {
		const data = historyItem.get( 'data' );

		// Upon `disable` command toggle `isRedo`.
		if ( this.getDisableCommand() === data.command ) {
			isRedo = ! isRedo;
		}

		historyItem.get( 'containers' ).forEach( ( container ) => {
			const settings = data.changes[ container.id ],
				toggle = isRedo ? this.getEnableCommand() : this.getDisableCommand();

			$e.run( toggle, {
				container,
				settings,
			} );

			container.panel.refresh();
		} );
	}

	initialize( args ) {
		super.initialize( args );

		/**
		 * Which command is running.
		 *
		 * @type {string}
		 */
		this.type = this.currentCommand === this.constructor.getEnableCommand() ?
			'enable' : 'disable';
	}

	validateArgs( args ) {
		this.requireContainer( args );

		this.requireArgumentConstructor( 'settings', Object, args );
	}

	getHistory( args ) {
		const { settings, containers = [ args.container ] } = args,
			changes = {};

		containers.forEach( ( container ) => {
			const { id } = container;

			if ( ! changes[ id ] ) {
				changes[ id ] = {};
			}

			changes[ id ] = settings;
		} );

		const subTitle = elementor.translate( this.constructor.getName() ) + ' ' + ElementsSettings.getSubTitle( args ),
			type = this.type;

		return {
			containers,
			subTitle,
			data: {
				changes,
				command: this.currentCommand,
			},
			type,
			restore: this.constructor.restore,
		};
	}

	isDataChanged() {
		return true;
	}
}
