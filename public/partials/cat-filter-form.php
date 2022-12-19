<div class="filter-custom-taxonomy">
    <?php $terms = get_terms( 'class' );
    if($terms): ?>
        <label for="class_name">TRU Student class</label>
        <select name="class_name" id="class_name" class="class-filter">
            <option value="">Select a class</option>        
            <?php foreach ( $terms as $term ) : ?>
                <option value="<?php echo $term->term_id; ?>"><?php echo esc_html( $term->name ); ?></option>
            <?php endforeach; ?>
        </select>
    <?php endif; ?>
</div>