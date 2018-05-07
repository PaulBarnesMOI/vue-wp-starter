<?php

// Register our custom post types

$customPostTypes = glob(get_template_directory() . '/inc/custom-post-types/*.php');

foreach($customPostTypes as $customPostType) {
    require $customPostType;
}
