import Layout from '../../templates/layout';
import ImportContentList from './import-content-list/import-content-list';

export default function ImportContent() {
	return (
		<Layout type="import">
			<section className="elementor-app__import-export import-content">
				<h1>
					{ __( 'Choose The Contents to Include in Your Site', 'elementor' ) }
				</h1>
				<ImportContentList />
			</section>
		</Layout>
	);
}
