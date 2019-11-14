<?php 
if ($user_id === 0)
{
    // No logged in user
} else {
    if ($test_post)
    {
        $post = [
            'id' => $user_id,
            'post_title' => 'Test Post'
        ];
        wp_insert_post($post);
    }

    $user_id = get_current_user_id();
    $test_post = false;
    $description = $_POST['description'];
    $submit = $_POST['submit'];
}