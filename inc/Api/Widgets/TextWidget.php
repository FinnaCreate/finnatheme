<?php

namespace Finna\Api\Widgets;

use WP_Widget;

/**
 * Custom Widget.
 */
class TextWidget extends WP_Widget
{
    public $widget_ID;

    public $widget_name;

    public $widget_options = [];

    public $control_options = [];

    function __construct()
    {

        $this->widget_ID = 'widget_finna';

        $this->widget_name = 'Finna Custom Text';

        $this->widget_options = [
            'classname' => $this->widget_ID,
            'description' => $this->widget_name . ' Widget',
            'customize_selective_refresh' => true,
        ];

        $this->control_options = [
            'width' => 400,
            'height' => 350,
        ];
    }
    /**
     * register default hooks and actions for WordPress
     * @return
     */
    public function register()
    {
        parent::__construct($this->widget_ID, $this->widget_name, $this->widget_options, $this->control_options);

        add_action('widgets_init', [$this, 'widgetsInit']);
    }

    /**
     * Register this widget
     */
    public function widgetsInit()
    {
        register_widget($this);
    }

    /**
     * Outputs the content of the widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        echo $args['after_widget'];
    }

    /**
     * Outputs the options form on admin
     *
     * @param array $instance The widget options
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Custom Text', 'finna');
?>
<p>
    <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'finna'); ?></label>
    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
</p>
<?php
    }

    /**
     * Processing widget options on save
     *
     * @param array $new_instance The new options
     * @param array $old_instance The previous options
     */
    public function update($new_instance, $old_instance)
    {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field($new_instance['title']);

        return $instance;
    }
}