<div class="cfb-container-full cfb-form-group">
  <div class="cfb-row v-align-center">
    <div class="cfb-col-4">
      <label for="<?= $field['input_id']; ?>"><?= $field['title']; ?></label>
    </div>
    <div class="cfb-col-8">
      <div class="cfb-media j-media">
        <input type="hidden" id="<?= $field['input_id']; ?>" class="j-media-value" name="<?= $field['input_name']; ?>" value="<?= $field['value']; ?>">
        <div class="cfb-media__preview j-media-preview"<?= $field['preview'] ? ' style="background-image:url(\'' . $field['preview'] . '\');"' : ''; ?>>
          <button class="cfb-btn cfb-media__remove j-media-remove">Remove</button>
        </div>
        <button class="cfb-btn cfb-btn--primary cfb-media__add j-media-add">Add</button>
      </div>
    </div>
  </div>
</div>