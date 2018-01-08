<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'NextFlights');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', '');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'lxRM%$YuG]hXK=51|zV2G]b16[Gp]>0L[9qn1zHCa4,n*#M7cNMD1wJ%P9M`E<A&');
define('SECURE_AUTH_KEY', '~y^8$o@ZMAMw+pA|-_?Vbiv$#o7<6[1.?ev~xP?FL@,INguHVJs<R&@UL&-d$4$;');
define('LOGGED_IN_KEY', 'B#60n1CE+zubsE_OCzz#ST-)KNGU%9#766`lOG&/Ez:#{8OS2(eQXyIu3fY ?0&J');
define('NONCE_KEY', '&YR=6_W(FTeB.+&#g#:o %3fiUw[T)7nGlss?GX&Ep7q@[|Up3$%zB+|AQ[^xXEp');
define('AUTH_SALT', 'RQOW?qpCFklAS MrY9?*0r#v0+;9Tmq`K2PJMMJ.q!q+eiMRR_KnmY|{2WhlYjXJ');
define('SECURE_AUTH_SALT', 'S,sqvelHIWW5$<>=bX180i1ZfS2W&Jl$~O&:4+8QT2xVinbbDTS{+YIKIi}p<[>2');
define('LOGGED_IN_SALT', 'cv]|)W0@,}=R[[.]CM,]J=s|:&zujU82pHF/CdN6gH4 K7t5^9^0$ezT1NY!onho');
define('NONCE_SALT', 'q2%.6bV~&^ZYl;9w:#&`@.$I${*F@^&slUnX,D/NPd8ZBQKvqvz%te!S1F(X6X9!');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

