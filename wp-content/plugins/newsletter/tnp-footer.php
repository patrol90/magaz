<?php
if (!defined('ABSPATH')) exit;
?>
<div id="tnp-footer">
    <div>
        <ul>
            <li><a href="http://www.thenewsletterplugin.com" target="_blank">The Newsletter Plugin</a></li>
            <li><a href="http://www.thenewsletterplugin.com/premium" target="_blank"><?php _e('Get Premium', 'newsletter') ?></a></li>
        </ul>
    </div>
    <div>
        <ul>
            <li><a href="http://www.thenewsletterplugin.com/account"><?php _e('Your Account', 'newsletter') ?></a></li>
            <li><a href="http://www.thenewsletterplugin.com/forums"><?php _e('Forum', 'newsletter') ?></a></li>
            <li><a href="http://www.thenewsletterplugin.com/blog"><?php _e('Blog', 'newsletter') ?></a></li>
    </div>
    <div>
        <form target="_blank" action="http://www.thenewsletterplugin.com/?na=s" method="post">
            <input type="email" name="ne" placeholder="Your email" required size="20" value="<?php echo esc_attr($current_user->user_email) ?>">
            <input type="hidden" name="nr" value="plugin">
            <input type="submit" value="<?php _e('Stay updated', 'newsletter') ?>">
        </form>
    </div>
</div>