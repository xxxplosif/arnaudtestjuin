<?php

//-- front controller --//

session_start();

// core functions

require './core/connect.php';

require './core/secure.php';

require './core/page.php';

require './core/upload_originales.php';

require './core/chaine_hasard.php';

require './core/creation_img.php';

// processing

require './config.php';

require './models/master.php';

require "./controllers/$page.php";

// let's the show begin!

require "views/$page.php";