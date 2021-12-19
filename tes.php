<html>
    <body>
        <?php
            session_start();
            if ($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $params = array(
                        'response_type' => 'code',
                        'client_id' => '644291940485038080',
                        'scope' => 'identify email guilds'
                    );
                    header('Location:https://discordapp.com/api/oauth2/authorize?'.http_build_query($params));
                }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <input type="submit" value="Login">
        </form>
    </body>
</html>
