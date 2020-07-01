import Layout from '../../templates/layout';
import Message from '../../ui/message/message';
import Heading from '../../ui/heading/heading';
import ImportSuccessList from './import-success-list/import-success-list';
import Grid from '../../ui/grid/grid';
import Text from '../../ui/text/text';
import Button from 'elementor-app/ui/molecules/button';

import './import-success.scss';

export default function ImportSuccess() {
	return (
		<Layout type="import">
			<section className="e-app-import-success">
				<Message>
					<Heading size="lg">
						{ __( 'Congrats, the following kit elements were imported', 'elementor' ) }
					</Heading>

					<ImportSuccessList />

					<Grid container justify="center">
						<Button variant="primary" text={ __( 'View live Site', 'elementor' ) } url="/#"/>
					</Grid>
				</Message>

				<Grid container justify="center" alignItems="center" className="e-app-export-success__learn-more">
					<Button size="md" text={ __( 'Click here', 'elementor' ) } url="/#" />
					<Text tag="span" size="sm">{ __( 'to learn more about building your site with Elementor Kits', 'elementor' ) }</Text>
				</Grid>
			</section>
		</Layout>
	);
}
