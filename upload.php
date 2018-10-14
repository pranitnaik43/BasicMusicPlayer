<?php

if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Song"){
    $dir='uploads/';
    $audio_path=$dir.basename($_FILES['audioFile']['name']);
    // var_dump($_FILES['audioFile']);
    // echo $_FILES['audioFile']['tmp_name'];
    if(copy($_FILES['audioFile']['tmp_name'], $audio_path)){
        echo 'Song uploaded successfully';

        saveAudio($audio_path);
    }
    else{
        echo "Error in uploading song";
    }
}

function saveAudio($fileName){
    $conn=new mysqli('localhost', 'root', '', 'onlinemusic');
    if(!$conn){
        die('Connection Failed');
    }



    $sql = "INSERT INTO audios(filename) values('{$fileName}')";
    if(mysqli_affected_rows($conn)>0){
        echo "audio file path saved in database";
    }

    $conn->close();
}
?>