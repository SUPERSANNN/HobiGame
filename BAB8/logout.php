<?php
if(isset($_POST['logout'])){
    session_start();
    session_unset();
    echo "
        <script>
            alert('Berhasil Logout');
            window.location = 'LOGIN.php';
        </script>
    ";
}