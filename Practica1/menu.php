<?PHP
session_start();
?>

<HTML LANG="es">

    <HEAD>
        <TITLE>Práctica 1.1: Login</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
    </HEAD>

    <BODY>
        <?PHP
        $usuario = $_SESSION["usuario"];
        printf($usuario);
        if ($_SESSION ["usuario"] == $usuario) {
            ?>
            <H1>Logged in</H1>
            <H1>-------------</H1>
            <A HREF="logout.php">Desconectar</A>
            <?PHP
        } else {           
            printf("Paso a index");            
            header("location: index.php");
        }
        ?>
    </BODY>
</HTML>
