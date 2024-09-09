<?php
///----footer widgets---
//About Company
class Heritaste_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_About_Company', /* Name */esc_html__('Heritaste About Company','heritaste'), array( 'description' => esc_html__('Show the About Company', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );


		echo wp_kses_post($before_widget);?>
      	
        <div class="logo-widget centred">            
            <div class="shape">
                <div class="shape-1" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-14.png);"></div>
                <div class="shape-2" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-14.png);"></div>
            </div>
            <?php if($instance['widget_logo_img']){ ?>
            <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></a></figure>
            <?php } ?>
			<?php if($instance['title1']){ ?><h6><?php echo wp_kses_post($instance['title1']); ?></h6><?php } ?>
            <?php if($instance['content']){ ?><p><?php echo wp_kses_post($instance['content']); ?></p><?php } ?>
            <?php if($instance['btn_link'] || $instance['btn_link2']){ ?>
            <ul class="other-links clearfix">
                <?php if($instance['btn_link']){ ?><li><a href="<?php echo esc_url($instance['btn_link']); ?>"><i class="flaticon-map"></i></a></li><?php } ?>
                <?php if($instance['btn_link2']){ ?><li><a href="<?php echo esc_url($instance['btn_link2']); ?>"><i class="flaticon-rss"></i></a></li><?php } ?>
            </ul>
            <?php } ?>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_logo_img'] = strip_tags($new_instance['widget_logo_img']);
		$instance['title1'] = strip_tags($new_instance['title1']);
		$instance['content'] = $new_instance['content'];
		$instance['btn_link'] = $new_instance['btn_link'];
		$instance['btn_link2'] = $new_instance['btn_link2'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : '';
		$title1 = ( $instance ) ? esc_attr($instance['title1']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$btn_link = ($instance) ? esc_attr($instance['btn_link']) : '';
		$btn_link2 = ($instance) ? esc_attr($instance['btn_link2']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Logo Image Url:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title1')); ?>"><?php esc_html_e('Title: ', 'heritaste'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title1')); ?>" name="<?php echo esc_attr($this->get_field_name('title1')); ?>" type="text" value="<?php echo esc_attr( $title1 ); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link')); ?>"><?php esc_html_e('Button Link:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link')); ?>" type="text" value="<?php echo esc_attr($btn_link); ?>" />
        </p>
       <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link2')); ?>"><?php esc_html_e('Button Link Two:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link2')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link2')); ?>" type="text" value="<?php echo esc_attr($btn_link2); ?>" />
        </p>             
                
		<?php 
	}
	
}
 
//Quick Contact V1
class Heritaste_Contact_V1 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Contact_V1', /* Name */esc_html__('Heritaste Contact V1','heritaste'), array( 'description' => esc_html__('Show the Contact V1', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="contact-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <div class="inner">
                        <div class="single-item">
                            <h6><?php echo wp_kses_post($instance['title2']); ?></h6>
                            <p><?php echo wp_kses_post($instance['address']); ?></p>
                        </div>
                        <div class="single-item">
                            <h6><?php echo wp_kses_post($instance['title3']); ?></h6>
                            <p><a href="mailto:<?php echo esc_attr($instance['email_v1']); ?>"><?php echo wp_kses_post($instance['email_v1']); ?></a><br /><a href="tel:<?php echo esc_attr($instance['phone_v1']); ?>"><?php echo wp_kses_post($instance['phone_v1']); ?></a></p>
                        </div>
                    </div>
                    <?php if( $instance['show'] ): ?>
                    <?php echo wp_kses_post(heritaste_get_social_icon()); ?>
                    <?php endif; ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['title2'] = $new_instance['title2'];
		$instance['address'] = $new_instance['address'];
		$instance['title3'] = $new_instance['title3'];
		$instance['email_v1'] = $new_instance['email_v1'];
		$instance['phone_v1'] = $new_instance['phone_v1'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : '';
		$title2 = ($instance) ? esc_attr($instance['title2']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$title3 = ($instance) ? esc_attr($instance['title3']) : '';
		$email_v1 = ($instance) ? esc_attr($instance['email_v1']) : '';
		$phone_v1 = ($instance) ? esc_attr($instance['phone_v1']) : '';
		$show = ($instance) ? esc_attr($instance['show']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title2')); ?>"><?php esc_html_e('Title:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Title', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title2')); ?>" name="<?php echo esc_attr($this->get_field_name('title2')); ?>" type="text" value="<?php echo esc_attr($title2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title3')); ?>"><?php esc_html_e('Title:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Title', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title3')); ?>" name="<?php echo esc_attr($this->get_field_name('title3')); ?>" type="text" value="<?php echo esc_attr($title3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_v1')); ?>"><?php esc_html_e('Email Address:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Email', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_v1')); ?>" name="<?php echo esc_attr($this->get_field_name('email_v1')); ?>" type="text" value="<?php echo esc_attr($email_v1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_v1')); ?>"><?php esc_html_e('Phone Number:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('111-123-12244', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_v1')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_v1')); ?>" type="text" value="<?php echo esc_attr($phone_v1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'heritaste'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p> 
               
		<?php 
	}
	
}

///----footer widgets Two---
//About Company V2
class Heritaste_About_Company_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_About_Company_V2', /* Name */esc_html__('Heritaste About Company V2','heritaste'), array( 'description' => esc_html__('Show the About Company V2', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );


		echo wp_kses_post($before_widget);?>
      	
        <div class="logo-widget">
            <?php if($instance['widget_logo_img2']){ ?>
            <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img2']); ?>" alt="<?php esc_attr_e('Awesome Image', 'heritaste'); ?>"></a></figure>
            <?php } ?>
            <?php if($instance['content2']){ ?>
            <div class="copyright">
                <p><?php echo wp_kses_post($instance['content2']); ?></p>
            </div>
            <?php } ?>
        </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_logo_img2'] = strip_tags($new_instance['widget_logo_img2']);
		$instance['content2'] = $new_instance['content2'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img2 = ($instance) ? esc_attr($instance['widget_logo_img2']) : '';
		$content2 = ($instance) ? esc_attr($instance['content2']) : '';
		?>
       
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img2')); ?>"><?php esc_html_e('Logo Image Url:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img2')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img2')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content2')); ?>"><?php esc_html_e('Copy Rights:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content2')); ?>" name="<?php echo esc_attr($this->get_field_name('content2')); ?>" ><?php echo wp_kses_post($content2); ?></textarea>
        </p>            
                
		<?php 
	}
	
}

//Quick Contact V2
class Heritaste_Contact_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Contact_V2', /* Name */esc_html__('Heritaste Contact V2','heritaste'), array( 'description' => esc_html__('Show the Contact V2', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="contact-widget">
                <div class="widget-content">
                    <ul class="contact-info clearfix">
                        <?php if($instance['phone_v2']) { ?><li><span><span class="text"><?php esc_html_e('P', 'heritaste'); ?></span>&nbsp;&nbsp;:&nbsp;&nbsp;</span><a href="tel:<?php echo esc_attr($instance['phone_v2']); ?>"><?php echo wp_kses_post($instance['phone_v2']); ?></a></li><?php } ?>
                        <?php if($instance['email_v2']) { ?><li><span><span class="text"><?php esc_html_e('E', 'heritaste'); ?></span>&nbsp;&nbsp;:&nbsp;&nbsp;</span><a href="mailto:<?php echo esc_attr($instance['email_v2']); ?>"><?php echo wp_kses_post($instance['email_v2']); ?></a></li><?php } ?>
                        <?php if($instance['address_v2']) { ?><li><span><span class="text"><?php esc_html_e('A', 'heritaste'); ?></span>&nbsp;&nbsp;:&nbsp;&nbsp;</span><?php echo wp_kses_post($instance['address_v2']); ?></li><?php } ?>
                    </ul>
                    <?php if( $instance['show2'] ): ?>
                    <?php echo wp_kses_post(heritaste_get_social_icon()); ?>
                    <?php endif; ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['phone_v2'] = $new_instance['phone_v2'];
		$instance['email_v2'] = $new_instance['email_v2'];
		$instance['address_v2'] = $new_instance['address_v2'];
		$instance['show2'] = $new_instance['show2'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$phone_v2 = ($instance) ? esc_attr($instance['phone_v2']) : '';
		$email_v2 = ($instance) ? esc_attr($instance['email_v2']) : '';
		$address_v2 = ($instance) ? esc_attr($instance['address_v2']) : '';
		$show2 = ($instance) ? esc_attr($instance['show2']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_v2')); ?>"><?php esc_html_e('Phone Number:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('111-123-12244', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_v2')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_v2')); ?>" type="text" value="<?php echo esc_attr($phone_v2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_v2')); ?>"><?php esc_html_e('Email Address:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Email', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_v2')); ?>" name="<?php echo esc_attr($this->get_field_name('email_v2')); ?>" type="text" value="<?php echo esc_attr($email_v2); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address_v2')); ?>"><?php esc_html_e('Address:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address_v2')); ?>" name="<?php echo esc_attr($this->get_field_name('address_v2')); ?>" ><?php echo wp_kses_post($address_v2); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show2')); ?>"><?php esc_html_e('Show Social Icons:', 'heritaste'); ?></label>
			<?php $selected = ( $show2 ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show2')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show2')); ?>" type="checkbox" value="true" />
        </p> 
               
		<?php 
	}
	
}

//Google Map
class Heritaste_Google_Map extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Google_Map', /* Name */esc_html__('Heritaste Google Map','heritaste'), array( 'description' => esc_html__('Show the Google Map', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="map-widget">
                <div class="map-inner">
                    <div class="google-map">
						<?php echo do_shortcode($instance['map_url']); ?>
                    </div>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['map_url'] = $new_instance['map_url'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$map_url = ($instance) ? esc_attr($instance['map_url']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('map_url')); ?>"><?php esc_html_e('Google Map Url:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Map Url', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('map_url')); ?>" name="<?php echo esc_attr($this->get_field_name('map_url')); ?>" type="text" value="<?php echo esc_attr($map_url); ?>" />
        </p>
               
		<?php 
	}
	
}

///----footer widgets Three---
//Quick Contact V3
class Heritaste_Contact_V3 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Contact_V3', /* Name */esc_html__('Heritaste Contact V3','heritaste'), array( 'description' => esc_html__('Show the Contact V3', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="location-widget">
            	<?php if($instance['icons_v3']) { ?>
                <div class="icon-box"><i class="<?php echo wp_kses_post($instance['icons_v3']); ?>"></i></div>
                <?php } ?>
				<?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <ul class="info-list clearfix">
                        <?php if($instance['address_v3']) { ?><li><?php echo wp_kses_post($instance['address_v3']); ?></li><?php } ?>
                        <?php if($instance['phone_v3']) { ?><li><?php echo wp_kses_post($instance['phone_v3']); ?></li><?php } ?>
                    </ul>
                    <?php if($instance['btn_title_v3']) { ?>
                    <div class="link"><a href="<?php echo esc_url($instance['btn_link_v3']); ?>"><?php echo wp_kses_post($instance['btn_title_v3']); ?></a></div>
                    <?php } ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['icons_v3'] = $new_instance['icons_v3'];
		$instance['address_v3'] = $new_instance['address_v3'];
		$instance['phone_v3'] = $new_instance['phone_v3'];
		$instance['btn_title_v3'] = $new_instance['btn_title_v3'];
		$instance['btn_link_v3'] = $new_instance['btn_link_v3'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Ny-Branch', 'heritaste');
		$icons_v3 = ($instance) ? esc_attr($instance['icons_v3']) : '';
		$address_v3 = ($instance) ? esc_attr($instance['address_v3']) : '';
		$phone_v3 = ($instance) ? esc_attr($instance['phone_v3']) : '';
		$btn_title_v3 = ($instance) ? esc_attr($instance['btn_title_v3']) : '';
		$btn_link_v3 = ($instance) ? esc_attr($instance['btn_link_v3']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'heritaste'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('icons_v3')); ?>"><?php esc_html_e('Icons:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('icons_v3')); ?>" name="<?php echo esc_attr($this->get_field_name('icons_v3')); ?>" ><?php echo wp_kses_post($icons_v3); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address_v3')); ?>"><?php esc_html_e('Address:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address_v3')); ?>" name="<?php echo esc_attr($this->get_field_name('address_v3')); ?>" ><?php echo wp_kses_post($address_v3); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_v3')); ?>"><?php esc_html_e('Phone Number:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('111-123-12244', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_v3')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_v3')); ?>" type="text" value="<?php echo esc_attr($phone_v3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_title_v3')); ?>"><?php esc_html_e('Button Title:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Title', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_title_v3')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_title_v3')); ?>" type="text" value="<?php echo esc_attr($btn_title_v3); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('btn_link_v3')); ?>"><?php esc_html_e('Button Url:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('btn_link_v3')); ?>" name="<?php echo esc_attr($this->get_field_name('btn_link_v3')); ?>" type="text" value="<?php echo esc_attr($btn_link_v3); ?>" />
        </p> 
               
		<?php 
	}
	
}

//Newsletter Form
class Heritaste_Newsletter_Form extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Newsletter_Form', /* Name */esc_html__('Heritaste Newsletter Form','heritaste'), array( 'description' => esc_html__('Show the Newsletter Form', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters('widget_title', $instance['title']);
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="subscribe-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <p><?php echo wp_kses_post($instance['content3']); ?></p>
                    <?php echo do_shortcode($instance['form_url']); ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content3'] = $new_instance['content3'];
		$instance['form_url'] = $new_instance['form_url'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Send Message';
		$content3 = ($instance) ? esc_attr($instance['content3']) : '';
		$form_url = ($instance) ? esc_attr($instance['form_url']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Send Message', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content3')); ?>"><?php esc_html_e('Content:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content3')); ?>" name="<?php echo esc_attr($this->get_field_name('content3')); ?>" ><?php echo wp_kses_post($content3); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_url')); ?>"><?php esc_html_e('Mail Chimp Form Url:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Form Url', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_url')); ?>" name="<?php echo esc_attr($this->get_field_name('form_url')); ?>" type="text" value="<?php echo esc_attr($form_url); ?>" />
        </p>
               
		<?php 
	}
	
}

///----footer widgets Five---
//Quick Contact V4
class Heritaste_Contact_V4 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Contact_V4', /* Name */esc_html__('Heritaste Contact V4','heritaste'), array( 'description' => esc_html__('Show the Contact V4', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="content-box">
                <?php if($instance['title_v5']) { ?><h2><?php echo wp_kses_post($instance['title_v5']); ?></h2><?php } ?>
                <div class="inner-box">
                    <ul class="download-list clearfix">
                        <?php if($instance['link_v5']) { ?><li><a href="<?php echo esc_url($instance['link_v5']); ?>"><i class="flaticon-apple"></i></a></li><?php } ?>
                        <?php if($instance['link2_v5']) { ?><li><a href="<?php echo esc_url($instance['link2_v5']); ?>"><i class="flaticon-android"></i></a></li><?php } ?>
                    </ul>
                    <?php if( $instance['show3'] ): ?>
                    <?php echo wp_kses_post(heritaste_get_social_icon()); ?>
                    <?php endif; ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title_v5'] = $new_instance['title_v5'];
		$instance['link_v5'] = $new_instance['link_v5'];
		$instance['link2_v5'] = $new_instance['link2_v5'];
		$instance['show3'] = $new_instance['show3'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$title_v5 = ($instance) ? esc_attr($instance['title_v5']) : '';
		$link_v5 = ($instance) ? esc_attr($instance['link_v5']) : '';
		$link2_v5 = ($instance) ? esc_attr($instance['link2_v5']) : '';
		$show3 = ($instance) ? esc_attr($instance['show3']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title_v5')); ?>"><?php esc_html_e('Title:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('title_v5')); ?>" name="<?php echo esc_attr($this->get_field_name('title_v5')); ?>" ><?php echo wp_kses_post($title_v5); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link_v5')); ?>"><?php esc_html_e('Icon Link:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('link_v5')); ?>" name="<?php echo esc_attr($this->get_field_name('link_v5')); ?>" type="text" value="<?php echo esc_attr($link_v5); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link2_v5')); ?>"><?php esc_html_e('Icon Link:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('link2_v5')); ?>" name="<?php echo esc_attr($this->get_field_name('link2_v5')); ?>" type="text" value="<?php echo esc_attr($link2_v5); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show3')); ?>"><?php esc_html_e('Show Social Icons:', 'heritaste'); ?></label>
			<?php $selected = ( $show3 ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show3')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show3')); ?>" type="checkbox" value="true" />
        </p> 
               
		<?php 
	}
	
}

//Newsletter Form V2
class Heritaste_Newsletter_Form_V2 extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Newsletter_Form_V2', /* Name */esc_html__('Heritaste Newsletter Form V2','heritaste'), array( 'description' => esc_html__('Show the Newsletter Form V2', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <div class="form-inner">
                <?php if($instance['title_v15']) { ?><h2><?php echo wp_kses_post($instance['title_v15']); ?></h2><?php } ?>
                <?php echo do_shortcode($instance['form_url2']); ?>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;		
		$instance['title_v15'] = $new_instance['title_v15'];
		$instance['form_url2'] = $new_instance['form_url2'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		
		$title_v15 = ($instance) ? esc_attr($instance['title_v15']) : '';
		$form_url2 = ($instance) ? esc_attr($instance['form_url2']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title_v15')); ?>"><?php esc_html_e('Content:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('title_v15')); ?>" name="<?php echo esc_attr($this->get_field_name('title_v15')); ?>" ><?php echo wp_kses_post($title_v15); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('form_url2')); ?>"><?php esc_html_e('Mail Chimp Form Url:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Form Url', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('form_url2')); ?>" name="<?php echo esc_attr($this->get_field_name('form_url2')); ?>" type="text" value="<?php echo esc_attr($form_url2); ?>" />
        </p>
               
		<?php 
	}
	
}

//Blog Sidebar Widgets
//Recent Posts
class Heritaste_Recent_Posts extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Recent_Posts', /* Name */esc_html__('Heritaste Recent Posts','heritaste'), array( 'description' => esc_html__('Show the Recent Posts', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo wp_kses_post($before_widget); ?>
		
        <div class="post-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <div class="post-inner">
                    <?php $query_string = array('showposts'=>$instance['number']);
						if ($instance['cat']) {
							$query_string['tax_query'] = array(array('taxonomy' => 'category','field' => 'id','terms' => (array)$instance['cat']));
						}
						$this->posts($query_string); 
					?>
                </div>
            </div>
        </div>

        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/* @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/* @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Recent Posts', 'heritaste');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'heritaste'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'heritaste'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'heritaste'); ?></label>
            <?php wp_dropdown_categories(array('show_option_all'=>esc_html__('All Categories', 'heritaste'), 'taxonomy' => 'category', 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('cat'))); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php 
				global $post;
				while ( $query->have_posts() ) : $query->the_post(); 
				$post_thumbnail_id = get_post_thumbnail_id($post->ID);
				$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
			?>
            <div class="post">
                <figure class="post-thumb" style="background-image:url('<?php echo esc_url($post_thumbnail_url);?>'); "><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"></a></figure>
                <span class="post-date"><?php echo get_the_date();?></span>
                <h6><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h6>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Advise Widget
class Heritaste_Advise_Widget extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Heritaste_Advise_Widget', /* Name */esc_html__('Heritaste Advise Widget','heritaste'), array( 'description' => esc_html__('Show the Advise Widget', 'heritaste' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
        
      		<div class="advice-widget centred" <?php if($instance['widget_bg_img']){ ?> style="background-image: url(<?php echo esc_url($instance['widget_bg_img']); ?>);"<?php } ?>>
                <div class="content-box">
                    <div class="text">
                        <div class="shape" style="background-image: url(<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/shape/shape-68.png);"></div>
                        <?php if($instance['title_v6']) { ?>
                        <div class="icon-box"><i class="flaticon-dinner-1"></i></div>
                        <h3><?php echo wp_kses_post($instance['title_v6']); ?></h3>
						<?php } ?>
                        <?php if($instance['content6']) { ?><p><?php echo wp_kses_post($instance['content6']); ?></p><?php } ?>
                    </div>
                    <?php if($instance['link_v6']) { ?>
                    <div class="link-box">
                        <a href="<?php echo esc_url($instance['link_v6']); ?>"><i class="flaticon-right-chevron"></i></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		$instance['widget_bg_img'] = strip_tags($new_instance['widget_bg_img']);
		$instance['title_v6'] = $new_instance['title_v6'];
		$instance['content6'] = $new_instance['content6'];
		$instance['link_v6'] = $new_instance['link_v6'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_bg_img = ($instance) ? esc_attr($instance['widget_bg_img']) : '';
		$title_v6 = ($instance) ? esc_attr($instance['title_v6']) : '';
		$content6 = ($instance) ? esc_attr($instance['content6']) : '';
		$link_v6 = ($instance) ? esc_attr($instance['link_v6']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>"><?php esc_html_e('BG Image Url:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_bg_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_bg_img')); ?>" type="text" value="<?php echo esc_attr($widget_bg_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title_v6')); ?>"><?php esc_html_e('Title:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('title_v6')); ?>" name="<?php echo esc_attr($this->get_field_name('title_v6')); ?>" ><?php echo wp_kses_post($title_v6); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content6')); ?>"><?php esc_html_e('Content:', 'heritaste'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content6')); ?>" name="<?php echo esc_attr($this->get_field_name('content6')); ?>" ><?php echo wp_kses_post($content6); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('link_v6')); ?>"><?php esc_html_e('Icon Link:', 'heritaste'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'heritaste');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('link_v6')); ?>" name="<?php echo esc_attr($this->get_field_name('link_v6')); ?>" type="text" value="<?php echo esc_attr($link_v6); ?>" />
        </p>
         
               
		<?php 
	}
	
}
