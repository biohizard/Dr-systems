<?php
function session_check()
{
    session_start();
    if (empty($_SESSION)) {
        $url = INDEX_PAGE . "user/login?error=103&since=" . $since . "&sha1=" . $sha1;
        header("Location: $url");
    } else {
        
    }
} 
	//----->
