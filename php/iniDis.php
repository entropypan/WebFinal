<?php

require("../php/connectDB.php");
require("../php/common.php");
require("../php/autoLogin.php");

if (!(isset($_SESSION))) {
    session_start();
}