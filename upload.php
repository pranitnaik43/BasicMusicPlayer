<?php
if(isset($_POST['save_audio']) && $_POST['save_audio']=="Upload Song"){
    $dir='uploads/';
    $audio_path=$dir.basename($_FILES['audioFile']['name']);
    // var_dump($_FILES['audioFile']);
    // echo $_FILES['audioFile']['tmp_name'];
    if(copy($_FILES['audioFile']['tmp_name'], $audio_path)){
        echo 'Song uploaded successfully';

        saveDetails($audio_path);
        // saveAudio($audio_path);
        displayAudio();
    }
    else{
        echo "Error in uploading song";
    }
} 
function displayAudio(){
    $conn=new mysqli('localhost', 'root', '', 'onlinemusic');
    if(!$conn){
        die('Connection Failed');
    }

    $query="SELECT * from songs";
    $result=$conn->query($query);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo '<a href="playsong.php?name='.$row['filename'].'">'.$row['filename'].'</a>';
            echo "<br>";
        }
    }

    $conn->close();

}
// function saveAudio($fileName){
//     $conn=new mysqli('localhost', 'root', '', 'onlinemusic');
//     if(!$conn){
//         die('Connection Failed');
//     }

//     $sql = "INSERT INTO songs(name,filename) values('{$fileName},{$fileName}')";
//     if ($conn->query($sql) === TRUE) {
//         echo "New record created successfully";
//     } else {
//         echo "Error: " . $sql . "<br>" . $conn->error;
//     }
    
//     if(mysqli_affected_rows($conn)>0){
//         echo "audio file path saved in database";
//     }

//     $conn->close();
// }
function saveDetails($filename){
    $conn = new mysqli('localhost', 'root', '', 'onlinemusic');
    if($conn->connect_error){
        echo "Connection Failed".$conn->connect_error;
    }
    $songname=$_POST['songname'];
    $language=$_POST['language'];
    $sql = "INSERT INTO songs(name, filename, language) 
                VALUES('{$songname}','{$filename}','{$language}' )";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>