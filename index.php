<?php
 
//api.php?fields=media_link[facebook,twitter]
 
$result = array(
    "id" => 1,
    "fullname"=>"justin lee",
    "media_link" => array(
            'facebook' => 'fb.com/username',
            'twitter' => 't.co/username',
            'github' => 'instagram.com/username'
    )
);

$covid = array();

$fields = "id,fullname,media_link[facebook|twitter]"; // from $_GET['fields'] 

$array = explode(',',$fields);

foreach($array as $key):
 
    $key2 = $key;

    if(strpos($key, '[') !== false): // The strpos() function returns the position of the first occurrence of a substring in a string. If the substring is not found it returns false. Also note that string positions start at 0, and not 1.
        $key = substr($key, 0, strpos($key, "[")); // The substr() function is an inbuilt function in PHP is used to extract a specific part of string.

        $param = explode('[', $key2)[0];
        $sub_arr = explode('|', explode(']', explode('[', $key2)[1])[0]);
 
        foreach($sub_arr as $sub):
            $covid[$key][$sub] =  $result[$key][$sub];
        endforeach;
    else:
        $covid[$key] =  $result[$key];
    endif;

endforeach;

echo '<pre>';
    print_r($covid);
echo '</pre>'; 

// output 
// Array
// (
//     [id] => 1
//     [fullname] => justin lee
//     [media_link] => Array
//         (
//             [facebook] => fb.com/username
//             [twitter] => t.co/username
//         )

// )
 

exit; 