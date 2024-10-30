<div class="cfb-container-full cfb-form-group">
  <div class="cfb-row v-align-center">
    <div class="cfb-col-4">
      <label for="<?= $field['input_id']; ?>"><?= $field['title']; ?></label>
    </div>
    <div class="cfb-col-8">
      <label class="cfb-checkbox">
        <input type="hidden" name="<?= $field['input_name']; ?>" id="<?= $field['input_id']; ?>" value="false">
        <input type="checkbox" name="<?= $field['input_name']; ?>" id="<?= $field['input_id']; ?>" value="true"<?= $field['value'] === 'true' ? ' checked' : ''; ?>>
        <span></span>
      </label>
    </div>
  </div>
</div>