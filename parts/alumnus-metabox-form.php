<div class="meta_box">
    <style scoped>
        .meta_box{
            display: grid;
            grid-template-columns: max-content 1fr;
            grid-row-gap: 10px;
            grid-column-gap: 20px;
        }
        .meta_field{
            display: contents;
        }
    </style>
    <p class="meta-options meta_field">
        <label for="hcf_published_date">Published Date</label>
        <input id="hcf_published_date"
            type="date"
            name="hcf_published_date"
           value="<?php echo esc_attr( get_post_meta( get_the_ID(), 'hcf_published_date', true ) ); ?>">
    </p>
    <p class="meta-options meta_field">
        <label for="event_description">Event Description</label>
        <textarea id="event_description"
            rows="3"
            name="event_description">
            <?php echo esc_attr( get_post_meta( get_the_ID(), 'event_description', true ) ); ?></textarea>
    </p>
</div>