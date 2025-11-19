<?php

if (!defined('ABSPATH')) exit;

add_action('admin_menu', 'cta_phones_add_admin_page');
function cta_phones_add_admin_page()
{
    add_options_page(
        'تنظیمات CTA Phones',
        'CTA Phones',
        'manage_options',
        'cta-phones-settings',
        'cta_phones_render_settings_page'
    );
}

add_action('admin_init', 'cta_phones_register_settings');
function cta_phones_register_settings()
{
    register_setting('cta_phones_settings_group', 'cta_phones_cities');
}

function cta_phones_render_settings_page()
{
    $cities = get_option('cta_phones_cities', []);
?>

    <div class="wrap">
        <h1>تنظیمات باکس تماس</h1>

        <form method="post" action="options.php">
            <?php settings_fields('cta_phones_settings_group'); ?>

            <table class="widefat striped">
                <thead>
                    <tr>
                        <th>نام شهر</th>
                        <th>شماره تماس ۱</th>
                        <th>شماره تماس ۲</th>
                        <th>حذف</th>
                    </tr>
                </thead>

                <tbody id="cta-phones-rows">
                    <?php if (!empty($cities)) : ?>
                        <?php foreach ($cities as $index => $row) : ?>
                            <tr>
                                <td><input type="text" name="cta_phones_cities[<?php echo $index; ?>][city]" value="<?php echo esc_attr($row['city']); ?>" class="regular-text"></td>

                                <td><input type="text" name="cta_phones_cities[<?php echo $index; ?>][phone1]" value="<?php echo esc_attr($row['phone1']); ?>" class="regular-text"></td>

                                <td><input type="text" name="cta_phones_cities[<?php echo $index; ?>][phone2]" value="<?php echo esc_attr($row['phone2']); ?>" class="regular-text"></td>

                                <td><button type="button" class="button remove-row">X</button></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <br>

            <button type="button" class="button button-primary" id="add-row">افزودن شهر</button>

            <?php submit_button(); ?>
        </form>
    </div>

    <script>
        document.getElementById('add-row').addEventListener('click', function() {
            const tbody = document.getElementById('cta-phones-rows');
            const index = tbody.children.length;

            tbody.insertAdjacentHTML('beforeend', `
                <tr>
                    <td><input type="text" name="cta_phones_cities[${index}][city]" class="regular-text"></td>
                    <td><input type="text" name="cta_phones_cities[${index}][phone1]" class="regular-text"></td>
                    <td><input type="text" name="cta_phones_cities[${index}][phone2]" class="regular-text"></td>
                    <td><button type="button" class="button remove-row">X</button></td>
                </tr>
            `);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-row')) {
                e.target.closest('tr').remove();
            }
        });
    </script>

<?php
}
