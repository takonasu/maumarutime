import React, { useState } from 'react';
import DrawCanvas from '../components/drawCanvas';
import Box from '@mui/material/Box';
import TextField from '@mui/material/TextField';
import Slider from '@mui/material/Slider';

type Props = Record<string, never>;

const DrawField: React.FC<Props> = () => {
	const [upperText, setUpperText] = useState('ば');
	const [lowerText, setLowerText] = useState('た');
	const [borderSize, setBorderSize] = useState(1.5);
	const [upperImagePosition, setUpperImagePosition] = useState(0);
	const [lowerImagePosition, setLowerImagePosition] = useState(0);

	return (
		<div>
			<Box
				component="form"
				sx={{
					'& > :not(style)': { m: 1, width: '25ch' }
				}}
				noValidate
				autoComplete="off"
			>
				<TextField
					label="上段"
					variant="filled"
					value={upperText}
					onChange={(event) => setUpperText(event.target.value)}
				/>
				<TextField
					label="下段"
					variant="filled"
					value={lowerText}
					onChange={(event) => setLowerText(event.target.value)}
				/>
				縁取りサイズ
				<Slider
					defaultValue={1.5}
					step={0.1}
					min={0.1}
					max={10}
					aria-label="Default"
					valueLabelDisplay="auto"
					onChange={(event, value) => {
						if (typeof value === 'number') setBorderSize(value);
					}}
				/>
				上
				<Slider
					defaultValue={0}
					step={10}
					min={0}
					max={1000}
					aria-label="Default"
					valueLabelDisplay="auto"
					onChange={(event, value) => {
						if (typeof value === 'number') setUpperImagePosition(value);
					}}
				/>
				下
				<Slider
					defaultValue={0}
					step={10}
					min={0}
					max={1000}
					aria-label="Default"
					valueLabelDisplay="auto"
					onChange={(event, value) => {
						if (typeof value === 'number') setLowerImagePosition(value);
					}}
				/>
			</Box>
			<DrawCanvas
				upperText={upperText}
				lowerText={lowerText}
				borderSize={borderSize}
				upperImagePosition={upperImagePosition}
				lowerImagePosition={lowerImagePosition}
			/>
		</div>
	);
};

export default DrawField;
