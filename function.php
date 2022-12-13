//Add specific words to WordPress custom type slug


add_filter('pre_post_link', 'custom_pre_post_link', 20, 3);
add_filter('post_rewrite_rules', 'custom_post_rewrite_rules');

function custom_pre_post_link($permalink, $post, $leavename){
	if( $post instanceof WP_Post && $post->post_type == 'post')
		$permalink = '/your-prefix'.$permalink;
	return $permalink;
}

function custom_post_rewrite_rules($pos_rewrite){
	if(is_array($pos_rewrite)){
		$rw_prefix = [];
		foreach($post_rewrite as $k => $v){
			$rw_prefix['your-prefix/'.$k] = $v;
		}
		
		$post_rewrite = array_merge($rw_prefix, $post_rewrite);
	}
	return $post_rewrite;
}
