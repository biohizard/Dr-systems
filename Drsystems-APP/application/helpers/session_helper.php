<?php
//----->
function session_check($since,$sha1)
{
    session_start();
    if (empty($_SESSION)){
        $url = INDEX_PAGE . "login/log_error?Data=wrong&error=101&since=" . $since . "&sha1=" . $sha1;
        header("Location: $url");
    } else {
    }
}
//----->