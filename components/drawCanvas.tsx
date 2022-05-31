import React, { useEffect, useState } from 'react';
import { text } from 'stream/consumers';
import styles from '../styles/DrawField.module.css';

type Props = {
	upperText: string;
	lowerText: string;
};

const makeTextImage = (text: string): string | null => {
	const textSize = 200;
	const width = 1500;
	const height = 200;
	const strolkeSize = 1.5;
	const canvasElem = document.createElement('canvas');
	canvasElem.width = width;
	canvasElem.height = height;
	const ctx = canvasElem && canvasElem.getContext('2d');
	if (!canvasElem || !ctx) return null;

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
	ctx.fillText(text, 0, height - 35);
	ctx.strokeText(text, 0, height - 35);
	return canvasElem.toDataURL();
};

const DrawCanvas: React.FC<Props> = ({ upperText, lowerText }) => {
	const [png, setPng] = useState<string | null>(null);
	useEffect(() => {
		const upperImage = new Image();
		const lowerImage = new Image();
		upperImage.src = makeTextImage(upperText) ?? '';
		lowerImage.src = makeTextImage(lowerText) ?? '';
		const combinedCanvasElm = document.createElement('canvas');
		const ctx = combinedCanvasElm && combinedCanvasElm.getContext('2d');
		if (!combinedCanvasElm || !ctx) return;

		combinedCanvasElm.height = 400;
		combinedCanvasElm.width = 1500;
		ctx.drawImage(upperImage, 0, 0);
		ctx.drawImage(lowerImage, 0, 200);
		setPng(combinedCanvasElm.toDataURL());
	}, [upperText, lowerText]);
	return (
		<div className={styles.card}>
			{png && (
				<div className="comp" style={{ display: 'flex' }}>
					<img alt="icon" src={png} style={{ maxWidth: '800px' }} />
				</div>
			)}
		</div>
	);
};

export default DrawCanvas;
