<?php

/**
 * Plugin Name: WPM WooCommerce Tag Color
 * Plugin URI: https://wpmasters.com/
 * Description: Add a color field on tags
 * Version: 1.0
 * Author: Fabian Mossberg
 * Author URI: https://wpmasters.com/
 */

function wpm_add_cat_color()
{
?>
    <div class="form-field">
        <label for="wpm_tag_color"><?php _e('Tag Color', 'wpm'); ?></label>
        <input type="color" name="wpm_tag_color" id="wpm_tag_color">
        <p class="description"><?php _e('Choose a color for the tag', 'wpm'); ?></p>
    </div>
<?php
}

/* Editing prouct category */
function wpm_edit_cat_color($term)
{
    $term_id = $term->term_id;
    $wpm_tag_color = get_term_meta($term_id, 'wpm_tag_color', true);
?>

    <tr class="form-field">
        <th scope="row" valign="top"><label for="wpm_tag_color"><?php _e('Tag Color', 'wh'); ?></label></th>
        <td>
            <input type="color" name="wpm_tag_color" id="wpm_tag_color" value="<?php echo esc_attr($wpm_tag_color) ? esc_attr($wpm_tag_color) : ''; ?>">
            <p class="description"><?php _e('Choose a color for the tag', 'wpm'); ?></p>
        </td>
    </tr>
<?php
}

add_action('product_tag_add_form_fields', 'wpm_add_cat_color', 10, 1);
add_action('product_tag_edit_form_fields', 'wpm_edit_cat_color', 10, 1);

/* Save  */
function wpm_save_cat_color($term_id)
{

    $wpm_tag_color = filter_input(INPUT_POST, 'wpm_tag_color');

    update_term_meta($term_id, 'wpm_tag_color', $wpm_tag_color);
}

add_action('edited_product_tag', 'wpm_save_cat_color', 10, 1);
add_action('create_product_tag', 'wpm_save_cat_color', 10, 1);
