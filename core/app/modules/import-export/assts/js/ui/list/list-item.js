import Checkbox from '../checkbox/checkbox';

import './list-item.scss';

export default function ListItem( props ) {
	return (
		<li className={ `import-export__list-item ${ props.className }` }>
			{ props.children }
		</li>
	);
}

ListItem.propTypes = {
	className: PropTypes.string,
	children: PropTypes.oneOfType( [
		PropTypes.object,
		PropTypes.arrayOf( PropTypes.object ) ,
	] ).isRequired,
};

ListItem.defaultProps = {
	className: '',
};
