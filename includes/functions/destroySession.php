<?php

if(!isset($_SESSION)) {
        session_start();
        session_cache_limiter(20);
    }
session_unset();
session_destroy();
header('location: \Kiez-Corner\index.php?page=start');
