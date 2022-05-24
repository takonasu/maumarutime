import React, { useEffect, useState } from 'react';

type Props = {
	text: string;
};

const DrawCanvas: React.FC<Props> = ({ text }) => {
	const width = 30 * text.length;
	const height = 255;
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
		ctx.font = '30px Hiragino Maru Gothic Pro';
		ctx.fillStyle = 'red';
		ctx.fillText(text, 0, height / 2);

		setPng(canvasElem.toDataURL());
	}, [text]);
	return (
		<div>
			<h3>画像生成</h3>
			<h4>生成</h4>
			{png && (
				<div className="comp" style={{ display: 'flex' }}>
					<img alt="icon" src={png} />
				</div>
			)}
		</div>
	);
};

export default DrawCanvas;
