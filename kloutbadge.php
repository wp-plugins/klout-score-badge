<?php
/*
Plugin Name: KloutBadge
Plugin URI: http://www.techlineinfo.com/wordpress-plugin-to-display-your-klout-score/
Description: Klout badge plugin
Version: 1.0
Author: Sujith
Author URI: http://www.techlineinfo.com
*/
/*  Copyright 2012 Techlineinfo  (email : admin@techlineinfo.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
class kloutbadge extends WP_Widget {
    /** constructor */
    function kloutbadge() {
        parent::WP_Widget(false, $name = 'kloutbadge');
    }
	function widget( $args, $instance ) {
		extract($args);	
		$klout_id = $instance['klout_id'];
		$title = apply_filters('widget_title', $instance['title']);
		  echo $before_widget; 
                   if ( $title )
                        echo $before_title . $title . $after_title; ?>
		
	<div style="margin-bottom:10px;">
	<?php
	$image="http://widgets.klout.com/badge/".$klout_id."/";
	   echo'<iframe src="'.$image.'" style="border:0" scrolling="no" allowTransparency="true" frameBorder="0" width="200px" height="98px">< /iframe >';
	?>
	</div>
	<?php
	}
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;		
		$instance['klout_id'] = $new_instance['klout_id'];
		$instance['title'] =  $new_instance['title'];
	return $instance;
	}
	function form( $instance ) { 
		$instance = wp_parse_args( (array) $instance, array( 'klout_id' => 'techlineinfo', 'title' => 'My Klout Score' ) );
		$klout_id = format_to_edit($instance['klout_id']);
		$title = format_to_edit($instance['title']);
	?>
	<p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
	<p><label for="<?php echo $this->get_field_id('klout_id'); ?>"><?php _e('Enter your Klout ID'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('klout_id'); ?>" name="<?php echo $this->get_field_name('klout_id'); ?>" type="text" value="<?php echo $klout_id; ?>" /></p>
		<p><hr />
			<label>If you like this plugin, Please contribute your like on facebook:  </label><br />
			<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Ffacebook.com%2Ftechlineinfo&amp;send=false&amp;layout=standard&amp;width=220&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font=arial&amp;height=80&amp;appId=173919112666830" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:220px; height:80px;" allowTransparency="true"></iframe>
		</p>	
		<?php 
		}
}
add_action('widgets_init', create_function('', 'return register_widget(\'kloutbadge\');'));	
	
	