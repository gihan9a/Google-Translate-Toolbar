<?php

/**
 * 
 */
class GoogleTranslateToolbar extends WP_Widget{
    public $name = 'Google Translate Toolbar';
    public $description  = 'Adds Google translate toolbar to your wordpress site/blog';
    public $control_options = array();
    
    // Google supported languages for translation
    protected $gog_langs = array(
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
    
    /**
     * Initialize some stuffs
     */
    function __construct() {
        $widget_options = array(
            'classname'=>__CLASS__,
            'description'=>$this->description
        );
        parent::__construct(__CLASS__, $this->name, $widget_options, $this->control_options);
    }
    
    /**
     * Adds form to the widget's configuration
     * 
     * @param Array $instance 
     */
    function form($instance){
        $defaults = array('lang'=>'en');
        $instance = wp_parse_args((array)$instance, $defaults);
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title')?>">Title:</label>
            <input type="text" name="<?php echo $this->get_field_name('title')?>" value="<?php echo $instance['title']?>" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('lang'); ?>">Your website language</label>
            <select name="<?php echo $this->get_field_name('lang')?>" id="<?php echo $this->get_field_id('lang')?>">
                <?php
                foreach($this->gog_langs as $key=>$val){
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
    
    /**
     * Update function of widget
     * 
     * @param Array $new_instance
     * @param Array $old_instance
     * @return Array 
     */
    function update($new_instance, $old_instance){
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['lang'] = $new_instance['lang'];
        return $instance;
    }
    
    /**
     * Widget's print action
     * 
     * @param Array $args
     * @param Array $instance 
     */
    function widget($args, $instance){
        extract($args);
        
        $title = $instance['title'];
        $lang = $instance['lang'];
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
?>