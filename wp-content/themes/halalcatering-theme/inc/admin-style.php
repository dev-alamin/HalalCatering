<?php 
add_action('admin_head', function(){
    echo "
    <style>
    .cf-block__fields {
        border-top: 5px double cadetblue;
        border-bottom: 5px double red;
    }
    </style>
    ";
});
