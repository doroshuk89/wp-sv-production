<?php
//Создание отдельной странице в админке для настройки контактов на сайте
add_action('admin_menu', 'page_contacts' );
function page_contacts ()
{
    add_menu_page(
        __('Additional site parameters (contact information)', 'svkupe-domain'),
        __('Contacts','svkupe-domain'),
        'manage_options',
        'page-contacts',
        'add_settings_contacts',
        '',
        50
    );
    remove_menu_page( 'edit-comments.php' );   
}

function add_settings_contacts () {
    global $select_options;
    if ( !isset( $_REQUEST['settings-updated'] ) )
        $_REQUEST['settings-updated'] = false;
    ?>
    <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
        <div id="message" class="updated">
            <p><strong><?php esc_html_e('Saving Changes', 'svkupe-domain') ?></strong></p>
        </div>
    <?php endif; ?>
        <div class="wrap">
            <h2><?php echo get_admin_page_title() ?></h2>
                <form method="post" enctype="multipart/form-data" action="options.php">
                    <?php
                        settings_fields('contacts_group'); // меняем под себя только здесь (название настроек)
                        do_settings_sections('page-contacts');
                        submit_button();
                    ?>
                </form>
        </div>
    <?php
}

add_action('admin_init', 'plugin_settings');
function plugin_settings(){
    // параметры: $option_group, $option_name, $sanitize_callback
    register_setting( 'contacts_group', 'contacts', 'validate_callback' );
    // параметры: $id, $title, $callback, $page

    add_settings_section( 'section_id', __('Setting up contact information', 'svkupe-domain'), 'section_desc', 'page-contacts' );

    // параметры: $id, $title, $callback, $page, $section, $args
    add_settings_field('mobile1', __('Mobile phone number 1', 'svkupe-domain'), 'add_mobile1', 'page-contacts', 'section_id' );
    add_settings_field('mobile2', __('Mobile phone number 2', 'svkupe-domain'), 'add_mobile2', 'page-contacts', 'section_id' );
    add_settings_field('phone_city', __('City phone number', 'svkupe-domain'), 'add_phone_city', 'page-contacts', 'section_id' );
    add_settings_field('email', __('Email address', 'svkupe-domain'), 'add_email', 'page-contacts', 'section_id' );
    add_settings_field('address',  __('Company address', 'svkupe-domain'), 'add_address', 'page-contacts', 'section_id' );
    add_settings_field('address_details',  __('Нow to go to the company', 'svkupe-domain'), 'add_address_details', 'page-contacts', 'section_id' );
    add_settings_field('time_work', __('Working hours', 'svkupe-domain'), 'add_timework', 'page-contacts', 'section_id' );
    add_settings_field('day_work', __('Working day', 'svkupe-domain'), 'add_daywork', 'page-contacts', 'section_id' );
    add_settings_field('time_advice', __('Consultation time', 'svkupe-domain'), 'add_advice', 'page-contacts', 'section_id' );
    add_settings_field('site', __('Сompany website', 'svkupe-domain'), 'add_site', 'page-contacts', 'section_id' );
    add_settings_field('about_footer', __('about_footer', 'svkupe-domain'), 'add_about', 'page-contacts', 'section_id' );

    //Social links
    add_settings_field('instagram', __('instagram_link', 'svkupe-domain'), 'add_instagram', 'page-contacts', 'section_id' );
    add_settings_field('vk', __('vk_link', 'svkupe-domain'), 'add_vk', 'page-contacts', 'section_id' );
    add_settings_field('telegram', __('telegram_link', 'svkupe-domain'), 'add_telegram', 'page-contacts', 'section_id' );
}

function section_desc() {
    echo '<p>'. _e('Block of basic settings for the site','svkupe-domain').'</p>';
}

function add_mobile1(){
    $val = get_option('contacts');
    $val = $val ? $val['mobile1'] : null;
    ?>
    <input type="text"  name="contacts[mobile1]" value="<?php esc_attr_e( $val ) ?>" />
    <?php
}

function add_mobile2(){
    $val = get_option('contacts');
    $val = $val ? $val['mobile2'] : null;
    ?>
    <input type="text" name="contacts[mobile2]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}
function add_phone_city(){
    $val = get_option('contacts');
    $val = $val ? $val['phone_city'] : null;
    ?>
    <input type="text" name="contacts[phone_city]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}

function add_address () {
    $val = get_option('contacts');
    $val = $val ? $val['address'] : null;
    ?>
    <textarea cols='50' rows='5' type='text' name="contacts[address]"><?php esc_html_e( $val ) ?></textarea>
    <?php
}
function add_address_details () {
    $val = get_option('contacts');
    $val = $val ? $val['address_details'] : null;
    ?>
    <textarea cols='50' rows='5' type='text' name="contacts[address_details]"><?php  esc_html_e( $val )?></textarea>
    <?php
}
function add_timework () {
    $val = get_option('contacts');
    $val = $val ? $val['time_work'] : null;
    ?>
    <input type="text" name="contacts[time_work]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}
function add_daywork () {
    $val = get_option('contacts');
    $val = $val ? $val['day_work'] : null;
    ?>
    <input type="text" name="contacts[day_work]" value="<?php esc_attr_e( $val ) ?>" />
    <?php
}

function add_advice () {
    $val = get_option('contacts');
    $val = $val ? $val['time_advice'] : null;
    ?>
    <input type="text" name="contacts[time_advice]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}
function add_site () {
    $val = get_option('contacts');
    $val = $val ? $val['site'] : null;
    ?>
    <input type="text" name="contacts[site]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}
function add_email () {
    $val = get_option('contacts');
    $val = $val ? $val['email'] : null;
    ?>
    <input type="text" name="contacts[email]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}
function add_about () {
    $val = get_option('contacts');
    $val = $val ? $val['about_footer'] : null;
    ?>
    <textarea cols='50' rows='20' type='text' name="contacts[about_footer]"><?php  esc_html_e( $val )?></textarea>
    <?php
}

//Social link
function add_instagram () {
        $val = get_option('contacts');
        $val = $val ? $val['instagram_link'] : null;
        ?>
        <input type="text" name="contacts[instagram_link]" value="<?php  esc_attr_e( $val ) ?>" />
        <?php
}
function add_vk () {
    $val = get_option('contacts');
    $val = $val ? $val['vk_link'] : null;
    ?>
    <input type="text" name="contacts[vk_link]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}
function add_telegram () {
    $val = get_option('contacts');
    $val = $val ? $val['telegram_link'] : null;
    ?>
    <input type="text" name="contacts[telegram_link]" value="<?php  esc_attr_e( $val ) ?>" />
    <?php
}
## Очистка данных
function validate_callback($options){
    // очищаем
        foreach( $options as $name => & $val ){
                $val = strip_tags( trim($val) );
        }
    return $options;
}

//ФУНКЦИЯ ОЧИСТКИ НОМЕРА МОБИЛЬНОГО ТЕЛЕФОНА ОТ ВСЕГО КРОМЕ ЗНАКА + В НАЧАЛЕ ДОБАВИТЬ
