import Layout from '../../templates/layout';
import Message from '../../ui/message/message';
import Box from '../../ui/box/box';
import Button from 'elementor-app/ui/molecules/button';

import './import.scss';

export default function Import() {
	return (
		<Layout type="import">
			<section className="elementor-app__import-export import">
				<Message className="import__select-file">
					<h1>
						{ __( 'Import a Kit to Your Site', 'elementor' ) }
					</h1>
					<h3>
						{ __( 'Drag & Drop your zip template file', 'elementor' ) }
					</h3>
					<p>
						{ __( 'Or', 'elementor' ) }
					</p>
					<Button text={ __( 'Select File', 'elementor' ) } url="/#" />
				</Message>

				<Box type="notice">
					{ __( 'Important: It is strongly recommended that you backup your database before Importing a Kit.', 'elementor' ) }
				</Box>
			</section>
		</Layout>
	);
}

