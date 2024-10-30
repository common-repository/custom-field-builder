<div class="cfb-container-full cfb-form-group">
  <div class="cfb-row v-align-center">
    <div class="cfb-col-4">
      <label for="<?= $field['input_id']; ?>"><?= $field['title']; ?></label>
    </div>
    <div class="cfb-col-8">
      <input type="text" name="<?= $field['input_name']; ?>" id="<?= $field['input_id']; ?>" class="j-color-picker" value="<?= $field['value']; ?>">
    </div>
  </div>
</div>