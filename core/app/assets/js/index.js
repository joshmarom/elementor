import React from 'react';
import ReactDOM from 'react-dom';
import App from './app';
import SiteEditor from '../../modules/site-editor/assets/js/module';
import ImportExport from '../../modules/import-export/assts/js/module';

if ( location.href.includes( 'mode=iframe' ) ) {
	window.elementorCommon = window.top.elementorCommon;
	window.$e = window.top.$e;
}

new SiteEditor();
new ImportExport();

ReactDOM.render(
	// TODO: Remove Strict mode.
	<React.StrictMode>
		<App />
	</React.StrictMode>,
  document.getElementById( 'elementor-app' )
);
