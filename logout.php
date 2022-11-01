<?php
include("includes/common.php");
if (is_logged()){
    session_destroy();
}
redirect_to("index.php");