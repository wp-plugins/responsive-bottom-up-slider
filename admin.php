<?php
if (!is_admin()) {
    die();
}
?><div class="wrap">
<h2><?php _e('Responsive Bottom-Up Slider','responsive_slider'); ?></h2>
<form method="post" action="options.php">
<?php
echo settings_fields( 'responsive_slider' );
?>
<table class="form-table">
    <tr valign="top">
            <th scope="row"><label for="id_rs_enabled"><?php _e('Enabled','responsive_slider'); ?>: 
            </label></th>
	    <td><input type="checkbox" id="id_rs_enabled" name="rs_enabled" value="1" <?php if( "1" == get_option('rs_enabled')) echo 'checked="checked"'; ?>>
	</tr>
	<tr valign="top">
            <th scope="row"><label for="id_rs_content"><?php _e('Contents (HTML Allowed)','responsive_slider'); ?>: 
            </label></th>
	    <td><textarea id="id_rs_content" name="rs_content"><?php 
	        if (strlen(get_option('rs_content')) > 0) {
    	        echo get_option('rs_content'); 
    	    } else {
    	        echo "<div style=\"text-align: center;\"><h3>".__('Like what you are reading?','responsive_slider')."</h3><input placeholder=\"".__('you@youremail.com','responsive_slider')."\">
<button>".__('Subscribe','responsive_slider')."</button></div>";
    	    }
	    ?></textarea>
	</tr>
	<tr valign="top">
            <th scope="row"><label for="id_rs_display_secs"><?php _e('Time to Display (Seconds)','responsive_slider'); ?>: 
            </label></th>
	    <td><input id="id_rs_display_secs" name="rs_display_secs" value="<?php echo get_option('rs_display_secs'); ?>">
	</tr>
	<tr valign="top">
            <th scope="row"><label for="id_rs_hide_days"><?php _e('When Closed, Do Not Display Again For (Days)','responsive_slider'); ?>: 
            </label></th>
	    <td><input id="id_rs_hide_days" name="rs_hide_days" value="<?php echo get_option('rs_hide_days'); ?>">
	</tr>
    </table>
    <?php submit_button(); ?>
</form>
</div>