import Layout from '../../templates/layout';
import Message from '../../ui/message/message';

export default function ImportProcess() {
	return (
		<Layout type="import">
			<Message className="elementor-app__import-export import-process">
				<h1>
					{ __( 'Your Kit Is Being Imported', 'elementor' ) }
				</h1>
				<h3>
					{ __( 'This may take a few moments to complete.\nPlease don’t close this window until importing is completed', 'elementor' ) }
				</h3>
			</Message>
		</Layout>
	);
}
