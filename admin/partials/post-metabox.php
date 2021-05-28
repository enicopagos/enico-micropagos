<p>
    <label>
        <input type="checkbox" id="eniActivePayment" name="enico_activate_payment" value="on"<?php checked( $enico_activate_payment == "on" ); ?>><?php _e('Activate payment', $this->plugin_name) ?>
    </label>
</p>
<div id="eniPostOptions">
    <p>
        <label>
            <input type="checkbox" id="eniMinPrice" name="enico_min_price" value="on"<?php checked( $enico_min_price == "on" ); ?>><?php _e('Minimum price', $this->plugin_name) ?>
        </label>
    </p>
    <p>
        <label>
            <?php _e('Price', $this->plugin_name) ?>: <input type="number" step="0.01" id="eniCustomPrice" name="enico_custom_price" value="<?php echo $enico_custom_price; ?>" placeholder="$<?php echo get_option('enico_default_price'); ?>" style="width:150px;">
            <p><?php _e('Leave empty for the default price', $this->plugin_name) ?></p>
        </label>
    </p>
</div>