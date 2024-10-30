<div class="cfb-container-full cfb-form-group">
	<div class="cfb-row v-align-center">
		<div class="cfb-col-4">
			<label for="<?= $field['input_id']; ?>_search"><?= $field['title']; ?></label>
		</div>
		<div class="cfb-col-8">
      <div class="cfb-row cfb-post-relationship">
        <input type="hidden" name="<?= $field['input_name']; ?>" class="j-cfb-relationship-value">
        <div class="cfb-col-6 cfb-post-relationship__posts-wrap">
          <div class="cfb-post-relationship__posts j-cfb-relationship-posts">
            <?php foreach ($posts as $post) { ?>
              <div class="cfb-post-relationship__post" data-post-id="<?= $post['id']; ?>" data-post-title="<?= $post['title']; ?>" data-post-img="<?= $post['thumb']; ?>">
                <img src="<?= $post['thumb']; ?>" class="cfb-post-relationship__post-img">
                <span class="cfb-post-relationship__post-title"><?= $post['title']; ?></span>
                <button class="cfb-post-relationship__post-remove j-cfb-relationship-remove"></button>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="cfb-col-6 cfb-post-relationship__search-wrap">
          <div class="cfb-post-relationship__search">
            <input type="text" id="<?= $field['input_id']; ?>_search" class="cfb-form-control j-cfb-relationship-search" placeholder="Enter post title">
            <div class="cfb-post-relationship__search-result j-cfb-relationship-result">
            </div>
          </div>
        </div>
      </div>
		</div>
	</div>
</div>