<div class="cfb-container-full cfb-form-group">
  <div class="cfb-row v-align-center">
    <div class="cfb-col-4">
	    <label for="<?= $field['input_id']; ?>"><?= $field['title']; ?></label>
    </div>
    <div class="cfb-col-8">
      <textarea name="<?= $field['input_name']; ?>" id="<?= $field['input_id']; ?>" class="cfb-form-control"><?= $field['value']; ?></textarea>
    </div>
  </div>
</div>