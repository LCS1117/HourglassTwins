<?php
//自定义评论列表模板 by www.zhuimeikeji.com
if (post_password_required())
    return;
?>
<div id="comments" class="responsesWrapper commentshow">
    <meta content="UserComments:<?php echo number_format_i18n(get_comments_number()); ?>" itemprop="interactionCount">
    <h3 class="comments-title">共有 <span
                class="commentCount"><?php echo number_format_i18n(get_comments_number()); ?></span> 條留言</h3>
    <div class="comments-loading" style="display:none">Loading...</div>
    <ol class="commentlist">
        <?php
        wp_list_comments(array(
            'style' => 'ol',
            'short_ping' => true,
            'avatar_size' => 48,
            'type' => 'comment',
            'callback' => 'zmblog_comment',
        ));
        ?>
    </ol>
    <script>
        $('body').on('click', '.comment-reply-link', function () {
            addComment.moveForm("li-comment-" + $(this).attr('data-commentid'), $(this).attr('data-commentid'), "respond", $(this).attr('data-postid'));
            return false;  // 阻止 a tag 跳转，这句千万别漏了
        });
    </script>
    <nav class="comment-navigation u-textAlignCenter" data-fuck="<?php the_ID(); ?>" id="comment-nav">
        <?php paginate_comments_links(array('prev_next' => true)); ?>
    </nav>
    <?php global $user_ID, $user_identity,$comment_author,$comment_author_email,$comment_author_url;if (comments_open()) : ?>
        <div class="mdui-typo-headline">發表留言</div>
        <div id="respond" class="respond" role="form">
            <h2 id="reply-title" class="comments-title"><?php comment_form_title('', '回覆給 %s'); ?> <small>
                    <?php cancel_comment_reply_link(); ?>
                </small></h2>
            <?php if (get_option('comment_registration') && !$user_ID) : ?>
                <p>你必須
                    <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">登錄</a>
                    後才能留言.</p>
            <?php else : ?>
                <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post"
                      class="commentform" id="commentform">
                    <?php if ($user_ID) : ?>
                        <p class="warning-text" style="margin-bottom:10px">以<a
                                    href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>身份登錄&nbsp;|&nbsp;<a
                                    class="link-logout" href="<?php echo wp_logout_url(get_permalink()); ?>">取消
                                &raquo;</a></p>
                        <p class="comment-form-comment">
                            <label for="comment">留言內容</label>
                            <textarea id="comment" name="comment" cols="45" rows="8"
                                      onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"
                                      tabindex="1" aria-required="true" placeholder="請在此輸入留言內容——"></textarea>
                        </p>
                    <?php else : ?>
                        <p class="comment-form-comment">
                            <label for="comment">留言內容</label>
                            <textarea id="comment" name="comment" cols="45" rows="8"
                                      onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('submit').click();return false};"
                                      tabindex="1" aria-required="true" placeholder="請在此輸入留言內容——"></textarea>
                        </p>
                        <div>
                            <p class="comment-form-author">
                                <label for="author">暱稱(必填)</label>
                                <input id="author" type="text"
                                       placeholder="暱稱(必填)"
                                       value="<?php echo $comment_author; ?>" name="author" required/>
                            </p>
                            <p class="comment-form-email">
                                <label for="email">電子郵件地址(必填)</label>
                                <input id="email" type="text"
                                       placeholder="電子郵件地址(必填)"
                                       value="<?php echo $comment_author_email; ?>" name="email" required/>
                            </p>
                            <p class="comment-form-url">
                                <label for="url">網站</label>
                                <input id="url" type="text"
                                       placeholder="網站"
                                       value="<?php echo $comment_author_url; ?>" name="url"/>
                            </p>
                        </div>
                    <?php endif; ?>
                    <div class="btn-group commentBtn" role="group">
                        <button class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-grey-700" name="submit"
                                id="submit">發表留言
                        </button>
                        <?php comment_id_fields(); ?>
                </form>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>
