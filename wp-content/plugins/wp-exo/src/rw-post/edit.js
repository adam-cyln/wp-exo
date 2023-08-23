import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'
import SearchPost from '../components/searchpost'
import { InspectorControls } from '@wordpress/blockEditor'
import { PanelBody, ToggleControl } from '@wordpress/components'
const { useSelect } = wp.data;

function Edit(props) {
	const blockProps = useBlockProps()

	const { attributes, setAttributes } = props
	const { postID, showImage, showAuthor, showCategory } = attributes


	return (
		<InspectorControls>
			<PanelBody title={__('Choose a post', 'capitainewp-gut-bases')}>
				<SearchPost
					onChange={postID => setAttributes({ postID })}
					postType="posts"
					placeholder={__('Search post', 'capitainewp-gut-bases')}
				/>
			</PanelBody>
		</InspectorControls>

	)

}

export default Edit