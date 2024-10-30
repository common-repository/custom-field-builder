<div class="cfb-container-full cfb-form-group">
  <div class="cfb-row v-align-center">
    <div class="cfb-col-4">
      <label for="<?= $field['input_id']; ?>"><?= $field['title']; ?></label>
    </div>
    <div class="cfb-col-8">
      <?php
        wp_editor($field['value'], $field['input_id'], [
          'textarea_name' => $field['input_name']
        ]);
      ?>
    </div>
  </div>
</div>