<?php
session_start();
session_destroy();
header('Location: /SAE-302/concours/index.php');
