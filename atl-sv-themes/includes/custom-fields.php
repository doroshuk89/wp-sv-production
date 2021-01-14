<?php
/*Add metadata for classes*/
require_once DIR_THEMES.'/classes/create-metabox.php';
$options = require_once DIR_THEMES.'/config/metabox.php';

        foreach ($options as $option)
            {
                new CreateMetabox($option);
            }
