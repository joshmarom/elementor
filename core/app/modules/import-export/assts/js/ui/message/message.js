import './message.scss';

export default function Message( props ) {
	return (
		<div className={ `import-export__message ${ props.className }` }>
			{ props.children }
		</div>
	);
}

Message.propTypes = {
	className: PropTypes.string,
	children: PropTypes.oneOfType( [ PropTypes.object, PropTypes.arrayOf( PropTypes.object ) ] ).isRequired,
};

Message.defaultProps = {
	className: '',
};
