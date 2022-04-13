<?php
function checkImageType($image)
{
    $url_headers = get_headers($image, 1);
    if (isset($url_headers['Content-Type'])) {

        $type = strtolower($url_headers['Content-Type']);

        $valid_image_type = array();
        $valid_image_type['image/png'] = '';
        $valid_image_type['image/jpg'] = '';
        $valid_image_type['image/jpeg'] = '';
        $valid_image_type['image/jpe'] = '';
        $valid_image_type['image/gif'] = '';
        $valid_image_type['image/tif'] = '';
        $valid_image_type['image/tiff'] = '';
        $valid_image_type['image/svg'] = '';
        $valid_image_type['image/ico'] = '';
        $valid_image_type['image/icon'] = '';
        $valid_image_type['image/x-icon'] = '';
        if (isset($valid_image_type[$type])) {
            return true;
        }
    }
    return false;
}
