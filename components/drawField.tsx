import React, { useState } from 'react';
import DrawCanvas from '../components/drawCanvas';

type Props = {};

const DrawField: React.FC<Props> = ({}) => {
	const [text, setText] = useState('');
	return (
		<div>
			<input type="text" value={text} onChange={(event) => setText(event.target.value)} />
			<DrawCanvas text={text} />
		</div>
	);
};

export default DrawField;
