<?php

function adam_options_init()
{
    register_setting(
        'adam_typo',
        'adam_options_typo',
    );

    add_settings_section(
        'adam_typ_body',
        'Body',
        '',
        'adam_typo',
    );
}
add_action('admin_init', 'adam_options_init');


function adam_typo_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }
?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('wporg_options');
            do_settings_sections('wporg');
            submit_button(__('Save Settings', 'textdomain'));
            ?>
        </form>
    </div>
<?php
}
