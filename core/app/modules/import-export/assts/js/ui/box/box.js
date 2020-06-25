import './box.scss';

export default function Box( props ) {
	const classNameBase = 'import-export__box',
		classes = [ classNameBase, props.className ];

	if ( props.type ) {
		classes.push( classNameBase + '--' + props.type );
	}

	return (
		<div className={ classes.join( ' ' ) }>
			{ props.children }
		</div>
	);
}

Box.propTypes = {
	className: PropTypes.string,
	type: PropTypes.any,
	children: PropTypes.oneOfType( [
		PropTypes.object,
		PropTypes.arrayOf( PropTypes.object ),
	] ).isRequired,
};

Box.defaultProps = {
	className: '',
};
