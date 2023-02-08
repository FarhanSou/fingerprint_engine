<?php
/**
 * -=-<[ Bismillahirrahmanirrahim ]>-=-
 * Check fingerprint is duplicate from array of fingerprints
 * @authors Dahir Muhammad Dahir (dahirmuhammad3@gmail.com)
 * @date    2022-04-10 16:35:17
 * @version 1.0.0
 */

require_once("../coreComponents/basicRequirements.php");

if(!empty($_POST["data"])) {
    $user_data = json_decode($_POST["data"]);
    $pre_enrolled_finger_data = $user_data->pre_enrolled_finger_data;

    // each enrolled hand has two fingers (index and middle finger)
    // in reality this could be any finger, we just expect two fingers
    // for each hand
    $enrolled_hands_lists = $user_data->enrolled_hands_list;


    foreach ($enrolled_hands_lists as $enrolled_hands_list1) {
        $enrolled_hands_list = array($enrolled_hands_list1);
        // print_r($enrolled_hand_array[0]->id);
        // die();
        $is_duplicate = check_duplicate($pre_enrolled_finger_data, $enrolled_hands_list);
        // print_r($response);
        // die();
        echo $is_duplicate;
        // die();
        if($is_duplicate == 1){
            echo $enrolled_hand_array[0]->id;
            // echo json_encode(true);
            // echo getUserDetails($enrolled_hand_array[0]->id);
            break;
        }
        
    }

    // print_r($enrolled_hands_list);
    // die();



    // $is_duplicate = check_duplicate($pre_enrolled_finger_data, $enrolled_hands_list);
    // if ($is_duplicate){
    //     echo json_encode(true);
    // }
    // else{
    //     echo json_encode(false);
    // }
}
else {
    echo json_encode("error! no data provided in post request");
}
