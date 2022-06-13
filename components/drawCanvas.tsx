import React, { useEffect, useState, useMemo } from 'react';
import styles from '../styles/DrawField.module.css';

type Props = {
	upperText: string;
	lowerText: string;
	borderSize: number;
	upperImagePosition: number;
	lowerImagePosition: number;
};

const imageWidth = 1500;
const imageHeight = 400;
const fontSize = 200;

const makeTextImage = (text: string, borderSize: number): string | null => {
	if (typeof window !== 'object') {
		return null;
	}
	const textSize = fontSize;
	const width = imageWidth;
	const height = imageHeight / 2;
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
	ctx.lineWidth = borderSize;
	ctx.strokeStyle = '#fdf979';

	const testImage = new Image();
	testImage.src = '/images/fontBackImage.png';

	const pattern = ctx.createPattern(testImage, 'repeat');
	if (pattern == null) return null;
	ctx.fillStyle = pattern;

	ctx.fillText(text, 0, height - 35);
	ctx.strokeText(text, 0, height - 35);
	return canvasElem.toDataURL();
};

const DrawCanvas: React.FC<Props> = ({ upperText, lowerText, borderSize, upperImagePosition, lowerImagePosition }) => {
	const [png, setPng] = useState<string | null>(null);
	const upperImageSrc = useMemo(() => makeTextImage(upperText, borderSize) ?? '', [upperText, borderSize]);
	const lowerImageSrc = useMemo(() => makeTextImage(lowerText, borderSize) ?? '', [lowerText, borderSize]);

	useEffect(() => {
		const upperImage = new Image();
		const lowerImage = new Image();
		upperImage.src = upperImageSrc;
		lowerImage.src = lowerImageSrc;
		const combinedCanvasElm = document.createElement('canvas');
		const ctx = combinedCanvasElm && combinedCanvasElm.getContext('2d');
		if (!combinedCanvasElm || !ctx) return;

		combinedCanvasElm.width = imageWidth;
		combinedCanvasElm.height = imageHeight;
		upperImage.onload = () => {
			ctx.drawImage(upperImage, upperImagePosition, 0);
			setPng(combinedCanvasElm.toDataURL());
		};
		lowerImage.onload = () => {
			ctx.drawImage(lowerImage, lowerImagePosition, 200);
			setPng(combinedCanvasElm.toDataURL());
		};
	}, [upperImageSrc, lowerImageSrc, borderSize, upperImagePosition, lowerImagePosition]);
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
