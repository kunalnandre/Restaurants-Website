
<?php if(isset($_SESSION['msg'])): ?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?>" role="alert">
        <?php
            if(gettype($_SESSION['msg'])=='string')
            {
                echo  $_SESSION['msg']; 
            }
            else{
                foreach ($_SESSION['msg'] as $error) {
                    echo $error." - ";
                }
            }
        ?>
    </div>
<?php 
    endif;
    unset($_SESSION['msg']);
    unset($_SESSION['type']);
?>