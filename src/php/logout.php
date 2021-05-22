<?php

setcookie('user', '', time()-84000, '/');

header('Location: /');