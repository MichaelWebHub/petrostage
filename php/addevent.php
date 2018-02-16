<?php

$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);

if ($_POST) {
    response($_POST);
} else { 
    echo "Bad request"; 
}

function response($post) {
    require("db.php");
    
    $title = $post['title']; 
    $type = $post['type']; 
    $chapter = $post['chapter']; 
    $city = $post['city']; 
    $start_date = $post['start-date']; 
    $end_date = $post['end-date']; 
    $place = $post['place']; 
    $description = $post['description']; 
    $email = $post['email']; 
    $website = $post['website'];
    $facebook = $post['facebook'];
    $vk = $post['vk'];
    $instagram = $post['instagram'];
    $month = date("m", strtotime($start_date));
    
    $title = security($title); 
    $type = security($type); 
    $chapter = security($chapter); 
    $city = security($city); 
    $start_date = security($start_date); 
    $end_date = security($end_date); 
    $place = security($place); 
    $description = security($description); 
    $email = security($email); 
    $website = security($website);
    $facebook = security($facebook);
    $vk = security($vk);
    $instagram = security($instagram);
    $month = security($month);

    $title = breakLongWords($title);
    $chapter = breakLongWords($chapter);
    $city = breakLongWords($city);
    $place = breakLongWords($place);
    $description = breakLongWords($description);

    $query = "INSERT INTO `events` (`title`, `type`, `chapter`, `city`, `start-date`, `month`, `end-date`, `place`, `description`, `email`, `website`, `facebook`, `vk`, `instagram`) VALUES ('$title', '$type', '$chapter', '$city', '$start_date', '$month','$end_date', '$place', '$description', '$email', '$website', '$facebook', '$vk', '$instagram')";
    $request = mysqli_query($db, $query);

    $event= mysqli_query($db, "SELECT * FROM `events` WHERE `title` = '$title' AND `place`='$place' AND `chapter`='$chapter'");
    $event_array = mysqli_fetch_assoc($event);

    class resultResponse {};
    $result = new resultResponse();
    foreach ($event_array as $key => $value) {
        $result->$key = $value;
    }

    echo json_encode($result);

}

function security($val) {
    $val = strip_tags($val);
    $val = stripslashes($val);
    $val = htmlspecialchars($val);
    return $val;  
}

function breakLongWords($val) {
    $array = explode(" ", $val);

    foreach ($array as $key => $word) {
        if (strlen($word) > 30) {

            for ($i = strlen($word) + 1; $i >= round(strlen($word)/2); $i--) {
                $word[$i+1] = $word[$i];
                if ($i == round(strlen($word)/2)) {
                    $word[$i] = " ";
                }
            }

            $array[$key] = breakLongWords($word);
        }

        $result = implode(" ", $array);
    }

    return $result;
}

