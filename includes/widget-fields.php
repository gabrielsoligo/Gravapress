<p>
  <label>Titulo</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
  <label>Mostrar redes sociais?</label> 
  <input type="checkbox" name="<?php echo $this->get_field_name('display_social'); ?>" value="1" <?php checked( $display_social, 1 ); ?> />
</p>

<p>
  <label>Mostrar informações de contato?</label> 
  <input type="checkbox" name="<?php echo $this->get_field_name('display_contact'); ?>" value="1" <?php checked( $display_contact, 1 ); ?> />
</p>