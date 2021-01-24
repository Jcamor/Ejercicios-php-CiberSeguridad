<?PHP
   session_start ();
?>

<HTML LANG="es">

<HEAD>
   <TITLE>Logout</TITLE>
   <LINK REL="stylesheet" TYPE="text/css" HREF="estilo.css">
</HEAD>

<BODY>

<H1>Elimino sesión y vuelvo a index </H1>

<H2>Logout del sistema</H2>

<?PHP
   unset ($_SESSION['usuario']);
   session_destroy ();
   sleep(5); // para comprobar que pas por aqui y destruye la sesión
   header('location: index.php');
?>
</BODY>
</HTML>