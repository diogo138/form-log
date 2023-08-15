<?php
function load_stylesheets()
{
    wp_register_style('stylesheet', get_template_directory_uri() . '/assets/css/style.css', '', 1, 'all');
    wp_enqueue_style('stylesheet');
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function enqueue_my_ajax_script() {
    wp_enqueue_script('ajax-script', get_template_directory_uri() . '/assets/js/ajax.js', array('jquery'), null, true);

    wp_localize_script('ajax-script', 'my_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_my_ajax_script');
add_action('wp_ajax_my_action', 'handel_form');
add_action('wp_ajax_nopriv_my_action', 'handel_form');



function handel_form()
{
    $name = $_POST['name'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $user_id = get_current_user_id();

    $args = [
        'post_author'           => $user_id,
        'post_status'           => 'publish',
        'post_type'             => 'form_log',
    ];

    $id_post = wp_insert_post($args);

    if($id_post){
        $post_title = [
            'ID' => $id_post,
            'post_title' => $name,
        ];

        wp_update_post( $post_title );
        update_field('name', $name, $id_post);
        update_field('phone_number', $phoneNumber, $id_post);
        update_field('email', $email, $id_post);
        update_field('message', $message, $id_post);

        $response = [ 'status' => 'success' ];
        echo json_encode($response);
    }

    wp_die();
}

