<?php
if(isset($_POST['btn_submit']))
{
    $con = mysqli_connect('localhost', 'mangalgr_user1', 'Pratham@#54321', 'mangalgr_db1');

 extract($_POST);
    // Insert data into the database
    $sql = "INSERT INTO `registerdata` (`id`, `name`, `dob`, `mobile`, `country`, `state`, `city`, `address`, `performer`, `abhishekDate`, `abhishekType`, `batchTime`, `partnerName`, `partnerDob`)
            VALUES (NULL, '$name', '$dob', '$mobile', '$country', '$state', '$city', '$address', '$performer', '$abhishekDate', '$abhishekType', '$batchTime','$partnerName','$partnerDob')";

    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Thanks for the Abhishek Form'); </script>";
    } else {
        echo "<script>alert('Failed to save the Abhishek Form');</script>";
    }
    

}
