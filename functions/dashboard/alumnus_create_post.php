<?php 
$test_post = false;
$user_id = get_current_user_id();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

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
        if ($_POST['submit'])
        {
            $name = wp_get_current_user()->display_name;
            $postTitle = $name . ' - ' . date("d-m-Y h:i:s");
            $postContent = test_input($_POST['content']);    
            if (empty($postContent))
            {   
                wp_redirect('/new-post');
            } else {
                $submit = $_POST['submit'];
                $post = [
                    'id' => $user_id,
                    'post_title' => $postTitle,
                    'post_content' => $postContent,
                    'post_type' => 'post'
                ];
                wp_insert_post($post);
                wp_redirect('/dashboard');
            }
        }
    }
}