<?php
    require 'config.php';
        
    if(isset($_GET['ID'])){
        $id = $_GET['ID'];
    }
    $result = mysqli_query($db, 
    "DELETE FROM data_anak WHERE ID='$id'");

    if($result){
        echo "
                <script>
                    alert('Data Berhasil Di Hapus');
                </script>           
        ";
        header("location:lihat_data.php");
    }

?>