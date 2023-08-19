import { __ } from '@wordpress/i18n'
import { useBlockProps } from '@wordpress/block-editor'

const { useSelect } = wp.data;
function Edit(props) {
	const blockProps = useBlockProps()

	// Récupération dynamique des articles
	const posts = useSelect(select => {
		return select('core').getEntityRecords('postType', 'post', { per_page: 3 })
	})

	console.log(posts);

	if (!posts) {
		return (
			<div {...blockProps}>
				<p class="capitaine-placeholder">
					{__('Fetching posts', 'capitainewp-gut-bases')}
				</p>
			</div>
		)
	}

	if (posts.length === 0) {
		return (
			<div {...blockProps}>
				<p class="capitaine-placeholder">
					{__('No post found', 'capitainewp-gut-bases')}
				</p>
			</div>
		)
	}


	return (
		<ul {...blockProps}>
			{posts.map(post => {
				return (
					<li>
						<a href={post.link}>
							{post.title.rendered}
						</a>
					</li>
				)
			})}
		</ul>
	)


}

export default Edit