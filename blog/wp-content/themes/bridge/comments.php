<div class="comment_holder clearfix" id="comments">
<div class="comment_number"><div class="comment_number_inner"><h5><?php comments_number( __('Sem comentários','qode'), '1'.__(' Comentário','qode'), '% '.__(' Comentários','qode')); ?></h5></div></div>
<div class="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword"><?php _e( 'Esta publicação está protegida por senha. Digite a senha para ver quaisquer comentários.', 'qode' ); ?></p>
			</div></div>
<?php
		
		return;
	endif;
?>
<?php if ( have_comments() ) : ?>

	<ul class="comment-list">
		<?php wp_list_comments(array( 'callback' => 'qode_comment')); ?>
	</ul>


<?php // End Comments ?>

 <?php else : // this is displayed if there are no comments so far 

	if ( ! comments_open() ) :
?>
		<!-- If comments are open, but there are no comments. -->

	 
		<!-- If comments are closed. -->
		<p><?php _e('Desculpe, o formulário de comentários está fechado neste momento.', 'qode'); ?></p>

	<?php endif; ?>
<?php endif; ?>
</div></div>
<?php
$commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$args = array(
	'id_form' => 'commentform',
	'id_submit' => 'submit_comment',
	'title_reply'=>'<h5>'. __( 'Comente','qode' ) .'</h5>',
	'title_reply_to' => __( 'Publicar uma resposta para %s','qode' ),
	'cancel_reply_link' => __( 'Cancelar resposta','qode' ),
	'label_submit' => __( 'Enviar','qode' ),
	'comment_field' => '<textarea id="comment" placeholder="'.__( 'Escreva seu comentário aqui...','qode' ).'" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
	'comment_notes_before' => '',
	'comment_notes_after' => '',
	'fields' => apply_filters( 'comment_form_default_fields', array(
		'author' => '<div class="three_columns clearfix"><div class="column1"><div class="column_inner"><input id="author" name="author" placeholder="'. __( 'Seu nome','qode' ) .'" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></div></div>',
		'email' => '<div class="column2"><div class="column_inner"><input id="email" name="email" placeholder="'. __( 'E-mail','qode' ) .'" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></div></div>',
		'url' => '<div class="column3"><div class="column_inner"><input id="url" name="url" type="text" placeholder="'. __( 'Website','qode' ) .'" value="' . esc_attr( $commenter['comment_author_url'] ) . '" /></div></div></div>'
		 ) ) );
 ?>
 <div class="comment_pager">
	<p><?php paginate_comments_links(); ?></p>
 </div>
 <div class="comment_form">
	<?php comment_form($args); ?>
</div>
						
								
							


