import DisableEnable from './base/disable-enable';

export class Enable extends DisableEnable {
	apply( args ) {
		const { settings, containers = [ args.container ] } = args;

		containers.forEach( ( container ) => {
			container = container.lookup();

			container.globals.set( settings );

			container.settings.set( '__globals__', container.globals.toJSON() );

			container.render();

			// Clear custom local settings.
			Object.values( container.getRelatedControls( settings ) ).forEach( ( control ) => {
				container.settings.set( control.name, control.default );
			} );
		} );
	}
}

export default Enable;
