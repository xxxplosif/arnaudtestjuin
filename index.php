<?php

//-- front controller --//

// core functions

require './core/connect.php';

require './core/secure.php';

require './core/page.php';

// processing

require './config.php';

require './models/master.php';

require "./controllers/$page.php";

// let's the show begin!

require "views/$page.php";