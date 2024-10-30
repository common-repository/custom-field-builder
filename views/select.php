<div class="cfb-container-full cfb-form-group">
  <div class="cfb-row v-align-center">
    <div class="cfb-col-4">
      <label for="<?= $field['input_id']; ?>"><?= $field['title']; ?></label>
    </div>
    <div class="cfb-col-8">
      <select name="<?= $field['input_name']; ?>" id="<?= $field['input_id']; ?>" class="cfb-form-control">
		    <?php foreach ($field['options'] as $key => $option) { ?>
          <option value="<?= $key; ?>"<?= $key === $field['value'] ? ' selected' : ''; ?>><?= $option; ?></option>
		    <?php } ?>
      </select>
    </div>
  </div>
</div>