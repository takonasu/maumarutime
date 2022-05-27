import React, { useEffect, useState } from 'react';

type Props = {
	text: string;
};

const DrawCanvas: React.FC<Props> = ({ text }) => {
	const width = 600;
	const height = 255;
	const strolkeSize = 1.5;
	const textSize = 110;

	const [png, setPng] = useState<string | null>(null);
	useEffect(() => {
		const canvasElem = document.createElement('canvas');
		canvasElem.width = width;
		canvasElem.height = height;
		const ctx = canvasElem && canvasElem.getContext('2d');
		if (!canvasElem || !ctx) return;

		// draw

		ctx.clearRect(0, 0, width, height);
		// ctx.fillStyle = 'rgba(' + [0, 0, 0, 0] + ')';
		ctx.fillRect(0, 0, width, height);
		ctx.font = `${textSize}px BasiliskFont`;

		const grad = ctx.createLinearGradient(50, 80, 50, 120);
		grad.addColorStop(1.0, '#E60AF9');
		grad.addColorStop(0.0, '#550082');
		ctx.lineWidth = strolkeSize;
		ctx.strokeStyle = '#fdf979';
		ctx.fillStyle = grad;
		ctx.fillText(text, 0, height / 2);
		ctx.strokeText(text, 0, height / 2);

		setPng(canvasElem.toDataURL());
	}, [text]);
	return (
		<div>
			{png && (
				<div className="comp" style={{ display: 'flex' }}>
					<img alt="icon" src={png} />
				</div>
			)}
		</div>
	);
};

export default DrawCanvas;
