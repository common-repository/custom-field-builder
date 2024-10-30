<div class="cfb-container-full cfb-form-group cfb-form-group--no-border">
  <div class="cfb-repeater j-repeater">
    <input type="hidden" name="<?= $field['input_id']; ?>" value="">
    <div class="cfb-repeater__title"><?= $field['title']; ?></div>
    <div class="cfb-repeater__items j-repeater-items">
      <?= $items_html; ?>
    </div>
    <div class="cfb-repeater__buttons">
      <button class="cfb-btn cfb-btn--primary cfb-btn--md j-repeater-add" data-template="<?= $field['input_id']; ?>_template">Add item</button>
    </div>
  </div>
</div>
<script id="<?= $field['input_id']; ?>_template" type="text/template">
  <?= $template_html; ?>
</script>