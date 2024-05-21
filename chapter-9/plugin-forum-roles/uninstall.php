<?php
function role_capabilities_uninstall() {
    remove_role( 'forum_administrator' );
    remove_role( 'forum_moderator' );
    remove_role( 'forum_member' );
    remove_role( 'forum_banned' );
}

register_uninstall_hook( __FILE__, 'role_capabilities_uninstall' );