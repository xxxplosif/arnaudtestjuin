<?php

//-- front controller --//

session_start();

// core functions

require './core/master.php';

// processing

require './config.php';

require './models/master.php';

require "./controllers/$page.php";

// let's the show begin!

require "views/$page.php";