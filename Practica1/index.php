<?PHP session_start();
?>
<HTML LANG="es">

    <HEAD>
        <TITLE>Práctica 1.1: Login</TITLE>
        <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
    </HEAD>

    <BODY>

        <?PHP
        if (isset($_REQUEST['entrar'])) {
            print ("<H1>Acceso a la aplicación</H1>\n");
            print ("<H2>Se ha identificado</H2>\n");

            $usuario = $_REQUEST['usuario'];
            $contrasenia = $_REQUEST['contrasenia'];


            $enlace = mysqli_connect("localhost", "root", "", "practica1");

            /* verificar la conexión */
            if (mysqli_connect_errno()) {
                printf("Conexión fallida: %s\n", mysqli_connect_error());
                exit();
            }
            // mirar lo de abajo que asi no se hace
            $consulta = "SELECT usuario, clave FROM usuarios where usuario ='$usuario' and clave='$contrasenia'";

            //printf($consulta);

            if ($resultado = mysqli_query($enlace, $consulta)) {
//               
                /* determinar el número de filas del resultado */
                $row_cnt = mysqli_num_rows($resultado);
                printf("El resultado tiene %d filas.\n", $row_cnt);
                If ($row_cnt > 0) {
                    print ("<H2>Es el usuario</h2>\n");
                    $_SESSION ["usuario"] = $usuario;
                    header('location: menu.php');
                } else {
                    print ("<H2>No es el usuario</h2>\n");
                }
                /* liberar el conjunto de resultados */
                /* cerrar el resultado */
                mysqli_free_result($resultado);
            }

            /* cerrar la conexión */
            mysqli_close($enlace);

            print ("<P>Estos son los datos introducidos:</P>\n");
            print ("<UL>\n");
            print ("   <LI>Usuario: $usuario\n");
            print ("   <LI>Contraseña: $contrasenia\n");
            print ("</UL>\n");
        } else {
            ?>

            <H1>Acceso a la aplicación</H1>

            <H2>Para entrar debe identificarse</H2>

            <FORM CLASS="borde" ACTION="index.php" METHOD="POST">

                <P><LABEL>Usuario:</LABEL>
                    <INPUT TYPE="TEXT" SIZE="20" NAME="usuario"></P>
                <P><LABEL>Contraseña:</LABEL>
                    <INPUT TYPE="TEXT" SIZE="20" NAME="contrasenia"></P>


                <P><INPUT TYPE="SUBMIT" NAME="entrar" VALUE="entrar"></P>

            </FORM>

            <?PHP
        }
        ?>

    </BODY>
</HTML>

