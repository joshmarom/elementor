import './list-item-text.scss';

export default function ListItemText( props ) {
	return (
		<div className={ `import-export__list-item-text ${ props.className }` }>
			<span className="import-export__list-item-primary">{ props.primary }</span>
			{ props.secondary ? <p className="import-export__list-item-secondary">{ props.secondary }</p> : '' }
		</div>
	);
}

ListItemText.propTypes = {
	className: PropTypes.string,
	primary: PropTypes.string.isRequired,
	secondary: PropTypes.string,
};

ListItemText.defaultProps = {
	className: '',
};
