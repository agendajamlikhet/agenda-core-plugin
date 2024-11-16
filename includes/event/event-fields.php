<?php
// Register Event's Custom Fields
add_action('add_meta_boxes', 'event_custom_fields');
function event_custom_fields()
{
    // Add meta box for event schedule
    add_meta_box(
        'event_schedule',
        __('Event schedule', 'agenda-core'),
        'event_schedule_callback',
        'event'
    );

    // Add meta box for event venue
    add_meta_box(
        'event_venue',
        __('Event venue', 'agenda-core'),
        'event_venue_callback',
        'event'
    );

    // Add meta box for event organizer
    add_meta_box(
        'event_organizer',
        __('Event organizer', 'agenda-core'),
        'event_organizer_callback',
        'event'
    );
}

// Callback function to display the event schedule meta box
function event_schedule_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'event_schedule_nonce');
    $event_date = get_post_meta($post->ID, 'event_date', true);
    $event_start_time = get_post_meta($post->ID, 'event_start_time', true);
    $event_end_time = get_post_meta($post->ID, 'event_end_time', true);
    ?>
    <div class="wrapper flex gap-3">
        <div class="flex flex-col gap-1">
            <label for="event_date"><?php _e('Event Date', 'agenda-core');?></label>
            <input type="date" id="event_date" name="event_date" value="<?php echo esc_attr($event_date); ?>">
        </div>
        <div class="flex flex-col gap-1">
            <label for="event_start_time"><?php _e('Start time', 'agenda-core');?></label>
            <input type="time" id="event_start_time" name="event_start_time" value="<?php echo esc_attr($event_start_time); ?>">
        </div>
        <div class="flex flex-col gap-1">
            <label for="event_end_time"><?php _e('End time', 'agenda-core');?></label>
            <input type="time" id="event_end_time" name="event_end_time" value="<?php echo esc_attr($event_end_time); ?>">
        </div>
    </div>
    <?php
}

// Save event schedule meta box data
add_action('save_post', 'save_event_schedule');
function save_event_schedule($post_id)
{
    if (!isset($_POST['event_schedule_nonce']) || !wp_verify_nonce($_POST['event_schedule_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    $event_date = isset($_POST['event_date']) ? sanitize_text_field($_POST['event_date']) : '';
    $event_start_time = isset($_POST['event_start_time']) ? sanitize_text_field($_POST['event_start_time']) : '';
    $event_end_time = isset($_POST['event_end_time']) ? sanitize_text_field($_POST['event_end_time']) : '';

    update_post_meta($post_id, 'event_date', $event_date);
    update_post_meta($post_id, 'event_start_time', $event_start_time);
    update_post_meta($post_id, 'event_end_time', $event_end_time);

}

// Callback function to display the event venue meta box
function event_venue_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'event_venue_nonce');
    $event_venue = get_post_meta($post->ID, 'event_venue', true);
    $event_accessibility = get_post_meta($post->ID, 'event_accessibility', true);
    ?>
    <div class="wrapper flex gap-3">
        <div class="flex flex-col gap-1 flex-auto">
            <label for="event_venue"><?php _e('Event Venue', 'agenda-core');?></label>
            <input type="text" id="event_venue" name="event_venue" value="<?php echo esc_attr($event_venue); ?>" placeholder="No, street, region">
        </div>
        <div class="flex flex-col gap-1">
            <label for="event_accessibility"><?php _e('Accessibility', 'agenda-core');?></label>
            <select name="event_accessibility" id="event_accessibility">
                <option value=""><?php _e('Not specified', 'agenda-core');?></option>
                <option value="yes" <?php selected($event_accessibility, 'yes');?>><?php _e('Yes', 'agenda-core');?></option>
                <option value="no" <?php selected($event_accessibility, 'no');?>><?php _e('No', 'agenda-core');?></option>
            </select>
        </div>
    </div>
    <?php
}

// Save event venue meta box data
add_action('save_post', 'save_event_venue');
function save_event_venue($post_id)
{
    if (!isset($_POST['event_venue_nonce']) || !wp_verify_nonce($_POST['event_venue_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    $event_venue = isset($_POST['event_venue']) ? sanitize_text_field($_POST['event_venue']) : '';
    $event_accessibility = isset($_POST['event_accessibility']) ? sanitize_text_field($_POST['event_accessibility']) : '';

    update_post_meta($post_id, 'event_venue', $event_venue);
    update_post_meta($post_id, 'event_accessibility', $event_accessibility);
}

// Callback function to display the event organizer meta box (a drop down list of organizers)
function event_organizer_callback($post)
{
    wp_nonce_field(basename(__FILE__), 'event_organizer_nonce');
    $organizers = get_posts(array(
        'post_type' => 'organisation',
        'numberposts' => -1,
    ));
    $event_organizer = get_post_meta($post->ID, 'event_organizer', true);
    ?>
    <div class="wrapper flex gap-3">
        <div class="flex flex-col gap-1">
            <label for="event_organizer"><?php _e('Select Organisation', 'agenda-core');?></label>
            <select name="event_organizer" id="event_organizer">
                <option value=""><?php _e('Not specified', 'agenda-core');?></option>
                <?php foreach ($organizers as $organizer): ?>
                    <option value="<?php echo $organizer->ID; ?>" <?php selected($event_organizer, $organizer->ID);?>><?php echo $organizer->post_title; ?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <?php
}

// Save event organizer meta box data
add_action('save_post', 'save_event_organizer');
function save_event_organizer($post_id)
{
    if (!isset($_POST['event_organizer_nonce']) || !wp_verify_nonce($_POST['event_organizer_nonce'], basename(__FILE__))) {
        return $post_id;
    }
    $event_organizer = isset($_POST['event_organizer']) ? sanitize_text_field($_POST['event_organizer']) : '';

    update_post_meta($post_id, 'event_organizer', $event_organizer);
}
