<?php
echo '<script src="../js/jquery-3.0.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js" integrity="sha512-t89+ZHqiI+cJO2EZ1zy846TMzc7K0VH22insNeb32hMoVymAMd0aYeLzmNF4WuRLDUXPVo6dzbZ1zI7MBWlqlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />';

    session_start();
    session_unset();
    session_destroy();
    echo '<script>
            setTimeout(function(){
                swal({
                    title: "Successfully",
                    text: "ออกจากระบบสำเร็จ",
                    type: "success"
                },function(){
                    window.location="../login.html";
                })
            },500);
            
        </script>';
?>