<?php

$user_id = 1234;
$post_id = 9999;
$blog_id = 5555;
if ( user_can( $user_id, 'manage_options' ) ) {
    // Execute code if the user can manage options.
}
if ( current_user_can( 'edit_pages' ) ) {
    // Execute code if the current user can edit pages.
}
if ( author_can( $post_id, 'publish_posts' ) ) {
    // Execute code if the post author can publish posts.
}
if ( current_user_can_for_blog( $blog_id, 'edit_theme_options' ) ) {
    // Execute code if current user can edit theme options for blog.
}

// Suppose you wanted to check whether a user has permission to edit posts before creating a link to the
// posts page in the admin on the frontend of the site. You would use the current_user_can() function and the edit_posts capability.

if ( current_user_can( 'edit_posts' ) ) {
    printf(
        '<a href="%s">Edit Posts</a>',
        esc_url( admin_url( 'edit.php' ) )
    );
}

$post_id = 100;
if ( current_user_can( 'edit_post', $post_id ) ) {
    update_post_meta( $post_id, 'pdev_example', 'Example' );
}

if ( is_super_admin( 100 ) ) {
    echo 'The user with the ID of 100 is a super admin.';
}

// Add a forum administrator role.
add_role( 'forum_administrator', 'Forum Administrator', array(
    'read'            => true,
    'create_forums'   => true,
    'create_threads'  => true,
    'moderate_forums' => true,
) );
// Add a forum moderator role.
add_role( 'forum_moderator', 'Forum Moderator', array(
    'read'            => true,
    'create_threads'  => true,
    'moderate_forums' => true,
) );
// Add a forum member role.
add_role( 'forum_member', 'Forum Member', array(
    'read'           => true,
    'create_threads' => true,
) );
// Add a banned forum role.
add_role( 'forum_banned', 'Forum Banned', array(
    'read'            => true,
    'create_forums'   => false,
    'create_threads'  => false,
    'moderate_forums' => false,
) );

remove_role( 'forum_administrator' );
remove_role( 'forum_moderator' );
remove_role( 'forum_member' );
remove_role( 'forum_banned' );

// উদাহরণস্বরূপ, একটি রোলে 'edit_others_posts' সক্ষমতা যোগ করা
function my_plugin_add_capabilities() {
    // 'editor' রোলের অবজেক্টটি পান
    $role = get_role( 'editor' );

    // যদি রোল পাওয়া যায়, তাহলে সক্ষমতা যোগ করুন
    if ( $role ) {
        $role->add_cap( 'edit_others_posts' );
    }
}
// প্লাগইন অ্যাক্টিভেশন হুকে এই ফাংশনটি চালান
register_activation_hook( __FILE__, 'my_plugin_add_capabilities' );

// Suppose you want to grant the default WordPress Contributor role the ability to publish posts. Using
// this code, you can make the change.

$contributor = get_role( 'contributor' );
if ( null !== $role ) {
    $role->add_cap( 'publish_posts', true );
}

// 'Contributor' রোলের জন্য 'publish_posts' সক্ষমতা অস্বীকার করা
function deny_contributor_publish_capability() {
    // 'contributor' রোলের অবজেক্টটি পান
    $role = get_role( 'contributor' );

    // যদি রোল পাওয়া যায়, তাহলে সক্ষমতা অস্বীকার করুন
    if ( null !== $role ) {
        $role->add_cap( 'publish_posts', false );
    }
}
// প্লাগইন অ্যাক্টিভেশন হুকে এই ফাংশনটি চালান
register_activation_hook( __FILE__, 'deny_contributor_publish_capability' );
