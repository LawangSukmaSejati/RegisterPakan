<?php
function __unserialize($text) {
    $text = unserialize(base64_decode($text)); 
    $text = preg_replace(array("@&#58;@", "@&#37;@", "@&###;@", "@&#60;@", "@&#62;@"), array(':', '%', '/', '<', '>'), $text);
    return $text;
}

function __serialize($text) {
    $text = preg_replace(array("@:@", "@%@", "@\/@", "@\<@", "@\>@"), array('&#58;', '&#37;', '&###;', '&#60;', '&#62;'), $text);
    return base64_encode(serialize($text));
}
function random_digit($digits){
        
    return rand(pow(10, $digits-1), pow(10, $digits)-1);
        
}

