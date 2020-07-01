import { Link, LocationProvider } from '@reach/router';
import router from '../../router';
import Icon from 'elementor-app/ui/atoms/icon';
import Typography from 'elementor-app/ui/atoms/typography';

export default class Button extends React.Component {
	static propTypes = {
		text: PropTypes.string.isRequired,
		hideText: PropTypes.bool,
		icon: PropTypes.string,
		tooltip: PropTypes.string,
		id: PropTypes.string,
		className: PropTypes.string,
		url: PropTypes.string,
		onClick: PropTypes.func,
		variant: PropTypes.string,
		ghost: PropTypes.any,
	};

	static defaultProps = {
		id: '',
		className: '',
	};

	getCssId() {
		return this.props.id;
	}

	getClassName() {
		const baseClassName = 'eps-button',
			classes = [ baseClassName, this.props.className ];

		if ( this.props.ghost ) {
			classes.push( baseClassName + '--ghost' );
		}

		return classes
			.concat( this.getStylePropsClasses( baseClassName ) )
			.filter( ( classItem ) => '' !== classItem )
			.join( ' ' );
	}

	getStylePropsClasses( baseClassName ) {
		const styleProps = [ 'variant', 'size' ],
			stylePropClasses = [];

		styleProps.forEach( ( styleProp ) => {
			let stylePropValue = this.props[ styleProp ];

			if ( stylePropValue ) {
				if ( this.props.ghost ) {
					stylePropValue += '-ghost';
				}

				stylePropClasses.push( baseClassName + '--' + stylePropValue );
			}
		} );

		return stylePropClasses;
	}

	getIcon() {
		if ( this.props.icon ) {
			const tooltip = this.props.tooltip || this.props.text;
			const icon = <Icon className={ this.props.icon } aria-hidden="true" title={ tooltip } />;
			let screenReaderText = '';

			if ( this.props.hideText ) {
				screenReaderText = <Typography className="u-sr-only" >{ tooltip }</Typography>;
			}

			return (
				<>
					{ icon }
					{ screenReaderText }
				</>
			);
		}
		return '';
	}

	getText() {
		return this.props.hideText ? '' : <Typography>{ this.props.text }</Typography>;
	}

	render() {
		const attributes = {},
			id = this.getCssId(),
			className = this.getClassName();

		// Add attributes only if they are not empty.
		if ( id ) {
			attributes.id = id;
		}

		if ( className ) {
			attributes.className = className;
		}
		if ( this.props.onClick ) {
			attributes.onClick = this.props.onClick;
		}

		const buttonContent = (
			<>
				{ this.getIcon() }
				{ this.getText() }
			</>
		);

		if ( this.props.url ) {
			// @see https://reach.tech/router/example/active-links.
			attributes.getProps = ( props ) => {
				if ( props.isCurrent ) {
					attributes.className += ' active';
				}

				return {
					className: attributes.className,
				};
			};

			return (
			<LocationProvider history={ router.appHistory }>
				<Link to={ this.props.url } { ...attributes } >
					{ buttonContent }
				</Link>
			</LocationProvider>
			);
		}

		return (
			<div { ...attributes }>
				{ buttonContent }
			</div>
		);
	}
}
