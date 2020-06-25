export const Context = React.createContext();

class ExportContext extends React.Component {
	static propTypes = {
		children: PropTypes.object.isRequired,
	};

	constructor( props ) {
		super( props );

		this.state = {
			kitContent: [
				{
					title: 'Global Templates',
					description: 'Saved Templates, Site Parts, Popups, Global Widgets',
				},
				{
					title: 'Global Styles And Settings',
					description: 'Theme Style, Global Colors and Typography, Layout, Lightbox and Site Identity settings',
				},
				{
					title: 'Content',
					description: 'Published pages, posts, related taxonomies, menu and custom post types.',
				},
			],
		};
	}

	componentDidMount() {
	}

	render() {
		return (
			<Context.Provider value={ this.state }>
				{ this.props.children }
			</Context.Provider>
		);
	}
}

export const ExportConsumer = Context.Consumer;
export default ExportContext;
