<?php
//Template Name: Registration List
get_header();

$args_query = [
    'post_type' => 'form_log',
    'post_status' => 'publish',
    'posts_per_page' => -1,
];
$sql_query = new WP_Query($args_query);
?>
<div class="container">
    <div class="text mb-5">
        <span>Registration List</span>
    </div>

    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Phone number</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if($sql_query->have_posts()){
            while($sql_query->have_posts()){
                $sql_query->the_post();
                $name = get_field('name');
                $phoneNumber = get_field('phone_number');
                $email = get_field('email');
                $message = get_field('message');
                ?>
                <tr>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $phoneNumber; ?></td>
                    <td><?php echo $email; ?></td>
                    <td><?php echo $message; ?></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</div>
<?php get_footer(); ?>