<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php return; } ?>
	<div class="commentsarea">
		<?php if ( have_comments() ) : ?>
			<h3 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h3>
			<ol class="commentlist">
				<?php wp_list_comments(); ?> 
			</ol>
			<span><?php previous_comments_link() ?></span>
			<span><?php next_comments_link() ?></span>
		<?php else : ?>
			<?php if ('open' == $post->comment_status) : ?>
			<?php else : ?>
            </div>
			<?php endif; ?>
		<?php endif; ?>
		
		<?php if ('open' == $post->comment_status) : ?>
			<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p>You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
			<div id="respond">
				<h3><?php comment_form_title( 'Leave a comment', 'Leave a comment to %s' ); ?></h3>
				<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="uniForm">
				<?php if ( $user_ID ) : ?>
					<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
				<?php else : ?>
					<fieldset  class="blocklabels">
						<div class="row">
							<label for="author">Name</label>
							<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" class="textinput" />
							<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
							<input type="hidden" name="redirect_to" value="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" />
							<span class="formhint"><?php if ($req) echo "(required)"; ?></span>
						</div>
						<div class="row">
							<label for="email">Email</label>
							<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" class="textinput" />
							<span class="formhint"><?php if ($req) echo "(required)"; ?></span>
						</div>		
					</fieldset>
				<?php endif; ?>
					<fieldset   class="blocklabels">
						<div class="row">
							<label for="comment">Comment</label>
							<textarea name="comment" id="comment" cols="60" rows="10" tabindex="4"></textarea>
						</div>
					</fieldset>					
					<div class="buttons">
						<input name="submit" type="submit" id="submit" tabindex="5" value="Submit" class="submit" />
						<?php cancel_comment_reply_link('Cancel'); ?>
						
					</div>
					<?php comment_id_fields(); ?>
					<?php do_action('comment_form', $post->ID); ?>
					
				</form>
			</div>	
		<?php endif; ?>
	</div>
<?php endif; ?> 