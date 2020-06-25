import { Context as ImportContext } from '../../../context/import';

import List from '../../../ui/list/list';
import ListItem from '../../../ui/list/list-item';
import ListItemText from '../../../ui/list/list-item-text';
import Checkbox from '../../../ui/checkbox/checkbox';
import Box from '../../../ui/box/box';

import Button from 'elementor-app/ui/molecules/button';

export default function ImportContentList() {
	const { importContent } = React.useContext( ImportContext );

	return (
		<List className="import-content-list">
			{
				importContent.map( ( item, index ) => (
					<ListItem key={ index } className="import-content-list__item">
						<div className="row">
							<Checkbox />
							<ListItemText primary={ item.title } secondary={ item.description } />
						</div>
						{ item.notice ? <Box type="notice">{ item.notice }</Box> : null }
					</ListItem>
				) )
			}
		</List>
	);
}
