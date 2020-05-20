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



$param = explode('[', $fields)[0];
$fields = explode(',', explode(']', explode('[', $fields)[1])[0]);
echo json_encode(array_filter($results[$param], function($key) use($fields){
return in_array($key, $fields);
}, ARRAY_FILTER_USE_KEY));



$result = array(
    "id" => 1,
    "xxxx" => "1111",
    "yyyy" => array(
        'aaaa' => "1111",
        'bbbb' => "2222",
        'cccc' => "3333"
    )
);
 
$x = array();
 
// fields=id,fullname,media_link[facebook|twitter]

$fields = "id,xxxx,yyyy,zzzz";
$arry = explode(',',$fields);


$array_filter = array_filter($result, function($key) use ($arry){
 
    if(in_array($key, $arry)){
        echo '<pre>';
            print_r($key);
        echo '</pre>';    
        echo '<br>';
        $x[$key] =  $arry;
    }

}, ARRAY_FILTER_USE_KEY);

echo '<pre>';
print_r($x);
echo '</pre>';  

exit;
var_dump(array_filter($result, function($key) use ($arry) {

    if(in_array($key, $arry)){
      

        array_push($x, $key);
          
    }
     
}, ARRAY_FILTER_USE_KEY));


    echo '<pre>';
    print_r($x);
    echo '</pre>';

// if(in_array("3333", $result)){
//     echo "Match found";
// }else{
//     echo "Match not found";
// }



// $fields = "id,xxxx,yyyy[aaaa,bbbb]";
// $arry = explode(',',$fields);

// foreach($arry as $value):

// echo  $value.'<br>';

// endforeach;



// foreach($cats as $cat) {
//     $cat = trim($cat);
//     $categories .= "<category>" . $cat . "</category>\n";
// }

// foreach($result as $key=> $value):

//     echo $key;
//     echo '<br>';

//     if(is_array($value)){

//         foreach($value as $k => $v):
//             echo '-'.$k.' => '.$v;
//             echo '<br>';
//         endforeach;

//     }else{
//         echo $value;
//         echo '<br>';
//     }

//     echo '<br>';


// endforeach;


// $fields = "id, xxxx, yyyy[aaaa|bbbb]";
// $arry = explode(',',$fields);

// $array_filter = array_filter($result, function($key) use ($arry){
 
//     echo '<pre>';
//     print_r($key);
//     echo '</pre>';

//     echo '<br>';
//     echo '<pre>';
//     print_r($arry);
//     echo '</pre>';

//     echo '<br>';
//     return in_array($key, $arry);

// }, ARRAY_FILTER_USE_KEY);

// echo '<pre>';
// print_r($result);
// echo '</pre>';
