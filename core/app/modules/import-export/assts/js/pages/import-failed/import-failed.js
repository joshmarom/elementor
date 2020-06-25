import Layout from '../../templates/layout';
import Message from '../../ui/message/message';
import Button from 'elementor-app/ui/molecules/button';

export default function ImportFailed() {
	return (
		<Layout type="import">
			<Message>
				<h1>
					{ __( 'File Upload Failed', 'elementor' ) }
				</h1>
				<p>
					{ __( 'File is invalid and could not be processed', 'elementor' ) }
				</p>
				<p>
					<Button text={ __( 'Click Here', 'elementor' ) } url="/#" />
					<span> { __( 'to try solving the issue.', 'elementor' ) }</span>
				</p>
				<Button text={ __( 'Select File', 'elementor' ) } url="/#" />
			</Message>
		</Layout>
	);
}

