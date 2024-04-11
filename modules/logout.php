<?php
    session_start();
    $_SESSION["LOGIN"] = null;
    $_SESSION["ID"] = null;
    Header("Location: /");