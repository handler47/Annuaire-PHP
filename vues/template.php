<!DOCTYPE html>
<html>
    <head>
        <title>My Website</title>
        <!-- CSS-->
        <?php include "http://localhost/Annuaire-PHP/css/MyCSS.css" ?>
    </head>
    <body>
        <!-- common header -->
        <?php include "header.php" ?>

        <section>
            <!-- PAGE CONTENT HERE determined by $this_page value -->
            <!-- 'content_home.php', 'content_about.php'... have the content-->
            <?php include "content_$this_page" ?>
        </section>

        <!-- common footer -->
        <?php include "footer.php" ?>

        <!-- link javascript files -->
    </body>
</html>