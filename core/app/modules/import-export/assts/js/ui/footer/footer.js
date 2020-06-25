import './footer.scss';

export default function Footer( props ) {
	return (
		<footer className="import-export__footer">
			{ props.children }
		</footer>
	);
}

Footer.propTypes = {
	children: PropTypes.object,
};
