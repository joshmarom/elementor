import './checkbox.scss';

export default function Checkbox( props ) {
	return (
		<input
			type="checkbox"
			disabled={ props.disabled }
			className={ `import-export__checkbox ${ props.className }` }
		/>
	);
}

Checkbox.propTypes = {
	className: PropTypes.string,
	disabled: PropTypes.bool,
};

Checkbox.defaultProps = {
	className: '',
	disabled: false,
};
