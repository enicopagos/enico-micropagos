<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://enico.info
 * @since      1.5.0
 *
 * @package    Enico_Micropagos
 * @subpackage Enico_Micropagos/admin/partials
 */
?>

<div id="<?php echo $this->plugin_name; ?>" class="wrap">
<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

<form method="post" action="options.php">
<?php settings_fields( $this->plugin_name ); ?>

<h2><?php _e('Mercado Pago Options', $this->plugin_name); ?></h2>
<table class="form-table">
    <tbody>
        <tr valign="top" id="price">
            <th scope="row"><?php _e('Country', $this->plugin_name); ?></th>
            <td>
                <select name="enico_mp_country">
                    <option><?php _e('Choose', $this->plugin_name); ?></option>
                    <option value="ARS"<?php echo selected(get_option('enico_mp_country'), 'ARS'); ?>>Argentina</option>
                    <option value="BRL"<?php echo selected(get_option('enico_mp_country'), 'BRL'); ?>>Brasil</option>
                    <option value="CLP"<?php echo selected(get_option('enico_mp_country'), 'CLP'); ?>>Chile</option>
                    <option value="COP"<?php echo selected(get_option('enico_mp_country'), 'COP'); ?>>Colombia</option>
                    <option value="MXN"<?php echo selected(get_option('enico_mp_country'), 'MXN'); ?>>Mexico</option>
                    <option value="PEN"<?php echo selected(get_option('enico_mp_country'), 'PEN'); ?>>Perú</option>
                    <option value="UYU"<?php echo selected(get_option('enico_mp_country'), 'UYU'); ?>>Uruguay</option>
                </select>
                <p class="description"><?php _e('Choose the country where your MercadoPago account was created', $this->plugin_name); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php _e('MercadoPago token', $this->plugin_name); ?></th>
            <td>
                <input type="text" name="enico_mp_token" value="<?php echo get_option('enico_mp_token'); ?>">
                <p class="description"><?php _e('This token allows to create payment links. Get this token at MercadoPago.', $this->plugin_name); ?> <a href='https://www.mercadopago.com.ar/developers/es/guides/faqs/credentials/' target='_blank'>TUTORIAL</a>.</p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php _e('MercadoPago Sandbox', $this->plugin_name); ?></th>
            <td>
                <label><input type="checkbox" name="enico_mp_sandbox"<?php checked(get_option('enico_mp_sandbox'), 'on', true); ?>> <?php _e('Sandbox Mercado Pago mode'); ?></label>
            </td>
        </tr>
    </tbody>
</table>

<h2><?php _e('General options', $this->plugin_name) ?></h2>
<table class="form-table">
    <tbody>
        <tr valign="top">
            <th scope="row"><?php _e('Reader invitation', $this->plugin_name) ?></th>
            <td>
                <?php wp_editor(get_option('enico_payperview_text'), "enico_payperview_text", array('textarea_rows' => 10)); ?>
                <p class="description"><?php _e('Write a text to call your readers attention to buy the post.', $this->plugin_name) ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php _e('Text for the price', $this->plugin_name); ?></th>
            <td>
                <input type="text" name="enico_price_text" value="<?php echo get_option('enico_price_text'); ?>" />
                <p class="description"><?php _e('Write a text that would be read next to the price', $this->plugin_name); ?></p>
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php _e('Default price', $this->plugin_name); ?></th>
            <td>
                <input type="number" step="0.01" name="enico_default_price" value="<?php echo get_option('enico_default_price'); ?>" />
                <p class="description"><?php _e('Default post price. You can customize the price on each post.', $this->plugin_name); ?></p>
            </td>
        </tr>
    </tbody>
</table>

<h2><?php _e('Mail options', $this->plugin_name); ?></h2>
<table class="form-table">
    <tbody>
        <tr valign="top">
            <th scope="row"><?php _e('Email subject', $this->plugin_name) ?></th>
            <td>
                <input type="text" name="enico_email_subject" value="<?php echo get_option('enico_email_subject'); ?>" />
            </td>
        </tr>

        <tr valign="top">
            <th scope="row"><?php _e('Email body text', $this->plugin_name) ?></th>
            <td>
                <?php wp_editor(get_option('enico_email_body'), "enico_email_body"); ?>
                <ul>
                    <li><b>%%SITE_NAME%%</b>: <?php _e('The website name', $this->plugin_name) ?></li>
                    <li><b>%%TITLE%%</b>: <?php _e('The post title', $this->plugin_name) ?></li>
                    <li><b>%%LINK%%</b>: <?php _e('Recovering post link', $this->plugin_name) ?></li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>

<?php submit_button(); ?>
</form>

<h2>Zona de cuidado</h2>
<p>Solo para versiones 1.1 y 1.2 que migran a 1.5.</p>
<p>Ejecutar cada migración solo una vez.</p>
<table class="form-table">
    <tbody>
        <tr valign="top">
            <th scope="row">Migrar configuraciones</th>
            <td>
               <input type="button" class="migrateBtn button" data-action="settings" value="Migrar">
                <p class="description">Migrar las configuraciones del plugin</p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Migrar tokens</th>
            <td>
               <input type="button" class="migrateBtn button" data-action="tokens" value="Migrar">
                <p class="description">Migrar los tokens de usuarios que ya compraron los artículos</p>
            </td>
        </tr>
        <tr valign="top">
            <th scope="row">Migrar opciones de entradas</th>
            <td>
               <input type="button" class="migrateBtn button" data-action="posts" value="Migrar">
                <p class="description">Migrar las configuraciones de cada entrada</p>
            </td>
        </tr>
    </tbody>
</table>

</div>