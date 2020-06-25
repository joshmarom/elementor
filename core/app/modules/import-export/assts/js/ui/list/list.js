import './list.scss';

export default function List( props ) {
	return (
		<ul className={ `import-export__list ${ props.className }` }>
			{ props.children }
		</ul>
	);
}

List.propTypes = {
	className: PropTypes.string,
	children: PropTypes.oneOfType( [
		PropTypes.object,
		PropTypes.arrayOf( PropTypes.object ),
	] ).isRequired,
};

List.defaultProps = {
	className: '',
};
