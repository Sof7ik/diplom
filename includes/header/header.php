<header>
    <div class="container-1440">
        <a href="/start" class="logo-wrapper">
            <img src="/src/logo.png" alt="logo" class="logo">
        </a>

        <h1 class="system-name">Система товароучёта компании CompCity</h1>

        <div class="authed">
            <?php
                if (!empty($_COOKIE['user']))
                {
                    $userData = unserialize($_COOKIE['user']);

                    $userSurname = $userData['surname'];
                    $userName = $userData['name'];
                    $userFather = $userData['father'];

                    function getFirstLetterFromString($string)
                    {
                        return substr($string, 0, 2);
                    }

                    $printingString = $userSurname.' '.getFirstLetterFromString($userName).'. '
                        .getFirstLetterFromString($userFather).'.';

                    ?><a href="/lk/" class="user-data"><?=$printingString?></a><?

                    ?><a href="/src/php/logout.php" class="logout-bnt">Выйти</a><?
                }
            ?>
        </div>
    </div>
</header>

<main>