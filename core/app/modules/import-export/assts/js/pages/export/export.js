import Layout from '../../templates/layout';
import ExportContentList from './export-content-list/export-content-list';
import Box from '../../ui/box/box';
import Footer from '../../ui/footer/footer';
import Button from 'elementor-app/ui/molecules/button';

import '../import-export.scss';
import './export.scss';

export default function Export() {
	return (
		<Layout type="export">
			<section className="elementor-app__import-export export">
				<div className="export__kit-name">
					<h1>
						{ __( 'Kit Name', 'elementor' ) }
					</h1>
					<Box>
						<input type="text" defaultValue="Elementor cloud site" />
					</Box>
				</div>

				<div className="export__kit-content">
					<h1>{ __( 'Choose What To Include In The Kit', 'elementor' ) }</h1>
					<ExportContentList />
				</div>

				<Footer>
					<Button text={ __( 'Next', 'elementor' ) } url="/export/success" />
				</Footer>
			</section>
		</Layout>
	);
}

