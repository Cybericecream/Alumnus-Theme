<?php 
$test_post = false;
$user_id = get_current_user_id();

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
    if (count($_POST) > 0)
    {
        if ($_POST['submit'] !== null)
        {
            $name = wp_get_current_user()->display_name;
            $postTitle = $name . ' - ' . date("d-m-Y h:i:s");
            $postContent = $_POST['content'];
            $submit = $_POST['submit'];
            $post = [
                'id' => $user_id,
                'post_title' => $postTitle,
                'post_content' => $postContent
            ];
            wp_insert_post($post);
        }
    }
}