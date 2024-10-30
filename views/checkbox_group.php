<div class="cfb-container-full cfb-form-group">
	<div class="cfb-row v-align-center">
		<div class="cfb-col-4">
			<label for="<?= $field['input_id']; ?>"><?= $field['title']; ?></label>
		</div>
		<div class="cfb-col-8">
			<div class="cfb-checkbox-group j-checkbox-group">
				<input type="hidden" class="j-checkbox-group-value" name="<?= $field['input_name']; ?>" id="<?= $field['input_id']; ?>" value="">
				<?php foreach ($field['options'] as $key => $option) { ?>
					<label class="cfb-checkbox-group__item j-checkbox-group-item">
						<input type="checkbox" value="<?= $key; ?>" <?= in_array($key, $field['value']) ? 'checked' : ''; ?>>
						<?= $option; ?>
					</label>
				<?php } ?>
			</div>
		</div>
	</div>
</div>