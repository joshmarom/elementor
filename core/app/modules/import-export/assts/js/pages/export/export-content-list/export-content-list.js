import { Context as ExportContext } from '../../../context/export';

import List from '../../../ui/list/list';
import ListItem from '../../../ui/list/list-item';
import ListItemText from '../../../ui/list/list-item-text';
import Checkbox from '../../../ui/checkbox/checkbox';

import '../../import-export.scss';

export default function ExportContentList() {
	const { kitContent } = React.useContext( ExportContext );

	return (
		<List>
			{
				kitContent.map( ( item, index ) => (
					<ListItem key={ index } className="row">
						<Checkbox />
						<ListItemText primary={ item.title } secondary={ item.description } />
					</ListItem>
				) )
			}
		</List>
	);
}
