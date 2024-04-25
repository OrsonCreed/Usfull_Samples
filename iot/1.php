<?php
// echo "Hello world!";

$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'iot_sandbox'
);

if(isset($_POST['test_value'])){
    $value =  $_POST['test_value'];
    $qry = "INSERT INTO test (first_name,last_name) VALUES ($value, $value)";
    if(!mysqli_query($conn, $qry)){
        echo "insertion went wrong!";
    }else echo "good";

}else{
    echo "nothing received!";
}
?>