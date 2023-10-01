<?php

function adam_options_styling()
{
    register_setting(
        'adam_styling',
        'adam_options_styling',
    );

    add_settings_section(
        'adam_section_styling_main_color',
        'Main color',
        'adam_section_styling_main_color_html',
        'adam_styling',
    );

    add_settings_section(
        'adam_section_styling_background_color',
        'Background color',
        'adam_section_styling_background_color_html',
        'adam_styling',
    );

    add_settings_field(
        'adam_field_styling_main_color',
        'Main color',
        'adam_field_styling_main_color_html',
        'adam_styling',
        'adam_section_styling_main_color',
        []
    );

    add_settings_field(
        'adam_field_styling_background_color',
        'Background color',
        'adam_field_styling_background_color_html',
        'adam_styling',
        'adam_section_styling_background_color',
        []
    );
}

add_action('admin_init', 'adam_options_styling');

function adam_section_styling_main_color_html()
{
    echo '<p>By default, color 1 is used in particular for the background color of the sidebar and the background color of the submenu</p>';
}

function adam_section_styling_background_color_html()
{
    echo '<p>Intro</p>';
}

function adam_field_styling_main_color_html()
{
    $options = get_option('adam_options_styling');
    $color = isset($options['adam_field_styling_main_color']) ? $options['adam_field_styling_main_color'] : '#ffb600';
    ?>
    <input type="color" id="adam_field_styling_main_color" name="adam_options_styling[adam_field_styling_main_color]" value="<?php echo $color; ?>">
    <?php
}

function adam_field_styling_background_color_html()
{
    $options = get_option('adam_options_styling');
    $color = isset($options['adam_field_styling_background_color']) ? $options['adam_field_styling_background_color'] : '#e5e5e5';
    ?>
    <input type="color" id="adam_field_styling_background_color" name="adam_options_styling[adam_field_styling_background_color]" value="<?php echo $color; ?>">
    <?php
}




function adam_styling_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('adam_styling');
            do_settings_sections('adam_styling');
            submit_button('Save Settings');
            ?>
        </form>
    </div>
<?php
}
