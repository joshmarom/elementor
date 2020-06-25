import Layout from '../../templates/layout';
import Message from '../../ui/message/message';

export default function ExportSuccess() {
	return (
		<Layout type="export">
			<Message>
				<h1>
					{ __( 'Your Kit Was Exported Successfully!', 'elementor' ) }</h1>
				<h3>
					{ __( 'Use this exported Kit on another Elementor site by uploading it via Kit Manager > Import Kit', 'elementor' ) }
				</h3>
				<p>
					{ __( 'If the download doesn\'t start automatically, please  click here', 'elementor' ) }
				</p>
			</Message>
		</Layout>
	);
}

