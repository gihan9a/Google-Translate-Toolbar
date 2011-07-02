<?php
/*
Plugin Name: Google Translate Toolbar
Plugin URI: http://abc.com/abc
Description: Adds Google translate toolbar to your wordpress blog/site
Version: 1.0
Author: Gihan Subhashana
Author URI: http://www.google.com/abc
*/

class Google_Translate_Toolbar extends WP_Widget{
    function Google_Translage_Toolbar() {
        $widget_ops = array(
            'classname'=>'googeltranslatetoolbar',
            'description'=>'Adds Google translate toolbar'
        );
        $control_ops = array(
            'widths'=>250,
            'heights'=>250,
            'id-base'=>'googletranslatetoolbar-widget'
        );
        $this->WP_Widget('googletranslatetoolbar-widget', 'Google Translate Toolbar', $widget_ops, $control_ops);
    }
    
    function form($instance){
        $gog_langs = array(
            'auto'=>'Detect Language',
            'af'=>'Afrikaans',
            'sq'=>'Albanian',
            'ar'=>'Arabic',
            'be'=>'Belarusian',
            'bg'=>'Bulgarian',
            'ca'=>'Catalan',
            'zh-CN'=>'Chinese (Simplified)',
            'zh-TW'=>'Chinese (Traditional)',
            'hr'=>'Croatian',
            'cs'=>'Czech',
            'da'=>'Danish',
            'nl'=>'Dutch',
            'en'=>'English',
            'et'=>'Estonian',
            'tl'=>'Filipino',
            'fi'=>'Finnish',
            'fr'=>'French',
            'gl'=>'Galician',
            'de'=>'German',
            'el'=>'Greek',
            'ht'=>'Haitian Creole',
            'iw'=>'Hebrew',
            'hi'=>'Hindi',
            'hu'=>'Hungarian',
            'is'=>'Icelandic',
            'id'=>'Indonesian',
            'ga'=>'Irish',
            'it'=>'Italian',
            'ja'=>'Japanese',
            'ko'=>'Korean',
            'lv'=>'Latvian',
            'lt'=>'Lithuanian',
            'pl'=>'Polish',
            'pt'=>'Portuguese',
            'ro'=>'Romanian',
            'ru'=>'Russian',
            'sr'=>'Serbian',
            'sk'=>'Slovak',
            'sl'=>'Slovenian',
            'es'=>'Spanish',
            'sw'=>'Swahili',
            'vi'=>'Vietnamese',
            'cy'=>'Welsh',
            'yi'=>'Yiddish'
        );
        $defaults = array('lang'=>1);
        $instance = wp_parse_args((array)$instance);
        ?>
<p>
    <label for="<?php echo $this->get_field_id('title')?>">Title:</label>
    <input type="text" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $instance['title']?>" id="<?php echo $this->get_field_id('title'); ?>" />
</p>
<p>
    <label for="<?php echo $this->get_field_id('lang'); ?>">Your website language</label>
    <select name="<?php echo $this->get_field_name('lang')?>" id="<?php echo $this->get_field_id('lang')?>">
        <?php
        foreach($gog_langs as $key=>$val){
            ?>
        <option value="<?php echo $key; ?>" <?php echo ($instance['lang']==$key)?'selected="selected"':''?>>
            <?php echo $val;?>
        </option>
        <?php 
        }
        ?>
    </select>
</p>
<?php
    }
    
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['lang'] = $new_instance['lang'];
        return $instance;
    }
    
    function widget($args, $instance){
        extract($args);
        
        $title = $instance['title'];
        $lang = $instance['lang'];
echo 'langs: '.$lang;
        echo $before_widget;
        echo $before_title.$title.$after_title;
        ?>
<div id="google_translate_element"></div><script>
function googleTranslateElementInit() {
  new google.translate.TranslateElement({
    pageLanguage: '<?php echo $lang; ?>'
  }, 'google_translate_element');
}
</script><script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<?php
        echo $after_widget;
    }
}

function gtt_load_widgets(){
    register_widget('Google_Translate_Toolbar');
}

add_action('widgets_init', 'gtt_load_widgets');
