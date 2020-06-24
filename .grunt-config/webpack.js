/**
 * Grunt webpack task config
 * @package Elementor
 */
const path = require( 'path' );

const TerserPlugin = require( 'terser-webpack-plugin' );

const aliasList = require('./webpack.alias.js').resolve;

const webpack = require('webpack');

const moduleRules = {
	rules: [
		// {
		// 	enforce: 'pre',
		// 	test: /\.js$/,
		// 	exclude: /node_modules/,
		// 	loader: 'eslint-loader',
		// 	options: {
		// 		failOnError: true,
		// 	}
		// },
		{
			test: /core[/\\]app.*\.(s)?css$/i,
			use: [
				{
					loader: './loaders/app-imports.js',
				},
			],
		},
		{
			test: /\.js$/,
			exclude: /node_modules/,
			use: [
				{
					loader: 'babel-loader',
					query: {
						presets: [ '@wordpress/default' ],
						plugins: [
							[ '@wordpress/babel-plugin-import-jsx-pragma' ],
							[ '@babel/plugin-transform-react-jsx', {
								'pragmaFrag': 'React.Fragment',
							} ],
							[ '@babel/plugin-proposal-class-properties' ],
							[ '@babel/plugin-transform-runtime' ],
							[ '@babel/plugin-transform-modules-commonjs' ],
							[ '@babel/plugin-proposal-optional-chaining' ],
						],
					},
				},
			],
		},
	],
};

const entry = {
	'editor': [
		path.resolve( __dirname, '../assets/dev/js/editor/utils/jquery-serialize-object.js' ),
		path.resolve( __dirname, '../assets/dev/js/editor/utils/jquery-html5-dnd.js' ),
		path.resolve( __dirname, '../assets/dev/js/editor/editor.js' ),
	],
	'admin': path.resolve( __dirname, '../assets/dev/js/admin/admin.js' ),
	'admin-feedback': path.resolve( __dirname, '../assets/dev/js/admin/admin-feedback.js' ),
	'common': path.resolve( __dirname, '../core/common/assets/js/common.js' ),
	'gutenberg': path.resolve( __dirname, '../assets/dev/js/admin/gutenberg.js' ),
	'new-template': path.resolve( __dirname, '../assets/dev/js/admin/new-template/new-template.js' ),
	'app': path.resolve( __dirname, '../core/app/assets/js/index.js' ),
	'app-loader': path.resolve( __dirname, '../core/app/assets/js/app-loader' ),
	'app-packages': path.resolve( __dirname, '../core/app/assets/js/app-packages' ),
	'beta-tester': path.resolve( __dirname, '../assets/dev/js/admin/beta-tester/beta-tester.js' ),
	'frontend': path.resolve( __dirname, '../assets/dev/js/frontend/frontend.js' ),
	'common-modules': path.resolve( __dirname, '../core/common/assets/js/modules' ),
	'editor-modules': path.resolve( __dirname, '../assets/dev/js/editor/modules.js' ),
	'editor-document': path.resolve( __dirname, '../assets/dev/js/editor/editor-document.js' ),
	'frontend-modules': path.resolve( __dirname, '../assets/dev/js/frontend/modules.js' ),
	'qunit-tests': path.resolve( __dirname, '../tests/qunit/tests.js' ),
};

const externals = {
	'@wordpress/i18n': 'wp.i18n',
		react: 'React',
		'@elementor/app-ui': 'elementorAppPackages.appUi',
		'@elementor/site-editor': 'elementorAppPackages.siteEditor',
		'@elementor/router': 'elementorAppPackages.router',
};

const baseConfig = {
	target: 'web',
	context: __dirname,
	devtool: 'source-map',
	externals,
	module: moduleRules,
	resolve: aliasList,
};

const webpackConfig = Object.assign( {}, baseConfig, {
	mode: 'development',
	output: {
		path: path.resolve( __dirname, '../assets/js' ),
		filename: '[name].js',
		devtoolModuleFilenameTemplate: '../[resource]',
	},
	plugins: [
		new webpack.ProvidePlugin( {
			React: 'react',
			PropTypes: 'prop-types',
			__: ['@wordpress/i18n', '__'],
		} )
	],
	entry: entry,
	watch: true,
} );

const webpackProductionConfig = Object.assign( {}, baseConfig, {
	mode: 'production',
	output: {
		path: path.resolve( __dirname, '../assets/js' ),
		filename: '[name].js',
	},
	entry: {},
	performance: { hints: false },
	optimization: {
		minimize: true,
		minimizer: [
			new TerserPlugin( {
				terserOptions: {
					keep_fnames: true,
				},
				include: /\.min\.js$/
			} ),
		],
	},
} );

// Add minified entry points
for ( const entryPoint in entry ) {
	webpackProductionConfig.entry[ entryPoint ] = entry[ entryPoint ];
	webpackProductionConfig.entry[ entryPoint + '.min' ] = entry[ entryPoint ];
}

const gruntWebpackConfig = {
	development: webpackConfig,
	production: webpackProductionConfig
};

module.exports = gruntWebpackConfig;
