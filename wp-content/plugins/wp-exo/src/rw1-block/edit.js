
import { __ } from '@wordpress/i18n';
import './editor.scss';
import {
	RichText,
	BlockControls,
	AlignmentToolbar,
	InspectorControls,
	PanelColorSettings,
	useBlockProps,
} from '@wordpress/block-editor'
import {
	PanelBody,
	PanelColor,
	ButtonGroup,
	Button,
	ToggleControl,
	RangeControl,
} from '@wordpress/components'
import {
	ToolbarButton,
	ToolbarGroup,
} from '@wordpress/components'
import { Fragment } from '@wordpress/element'


export default function Edit(props) {
	const blockProps = useBlockProps();
	const onChangeNumber = number => { props.setAttributes({ number: number }) };
	const onChangeTitle = title => { props.setAttributes({ title: title }) };


	return (
		<Fragment>

			{/* Markup de l'inspecteur */}
			<InspectorControls>
				<PanelColorSettings
					title={__('Colors', 'wp-exo')}
					colorSettings={[
						{
							value: props.attributes.textColor,
							onChange: textColor => props.setAttributes({ textColor }),
							label: __('Title color', 'wp-exo'),
						},
						{
							value: props.attributes.backgroundColor,
							onChange: backgroundColor => props.setAttributes({ backgroundColor }),
							label: __('Background color', 'wp-exo'),
						},
					]}
				/>
				<PanelBody
					title='Border'
				>
					<ToggleControl
						label='With radius ?'
						checked={props.attributes.withRadius}
						onChange = { () => props.setAttributes( { withRadius: ! props.attributes.withRadius } ) }
					/>
				</PanelBody>

			</InspectorControls>

			{/* Markup de la barre d'outils */}
			<BlockControls>
				<AlignmentToolbar
					value={props.attributes.alignment}
					onChange={alignment => props.setAttributes({ alignment: alignment })}
				/>
			</BlockControls>

			{/* Markup du bloc */}
			<div
				{...blockProps}
				style={{ background: props.attributes.backgroundColor }}
			>
				<p
					className='first-line'
					style={{ color: props.attributes.textColor }}
				>
					<span>#</span>
					<RichText
						tagName='span'
						placeholder='1'
						value={props.attributes.number}
						className='number'
						onChange={onChangeNumber}
					/>
				</p>
				<RichText
					tagName='h2'
					placeholder='Titre du chapitre'
					value={props.attributes.title}
					className='number'
					onChange={onChangeTitle}
				/>
			</div>
		</Fragment>
	)

}
