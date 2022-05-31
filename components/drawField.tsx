import React, { useState } from 'react';
import DrawCanvas from '../components/drawCanvas';

type Props = {};

const DrawField: React.FC<Props> = ({}) => {
	const [upperText, setUpperText] = useState('');
	const [lowerText, setLowerText] = useState('');
	return (
		<div>
			<input type="text" value={upperText} onChange={(event) => setUpperText(event.target.value)} />
			<input type="text" value={lowerText} onChange={(event) => setLowerText(event.target.value)} />
			<DrawCanvas upperText={upperText} lowerText={lowerText} />
		</div>
	);
};

export default DrawField;
