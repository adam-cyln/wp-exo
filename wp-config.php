<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link https://fr.wordpress.org/support/article/editing-wp-config-php/ Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'wp_exo' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'adem' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '04041980' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '.`{1OVA~(`g<:%w== m-RmQhUbPQla63W[/;N{,dM?T6)+Vtd12?=,LqQLY#gHj3' );
define( 'SECURE_AUTH_KEY',  'i1mbWGv:Xfeu<j?hxK0hNr*XF.Oo1{mKU+Gn-nD48u3_+U?p^I.lUp,)Cs>+z,23' );
define( 'LOGGED_IN_KEY',    'cQO7XK.BR?`_7eOKs]GS8fgZ]u+N9nv9@1Ki46lXXbwLp<~?`%FCZqk=wsQ{XbZM' );
define( 'NONCE_KEY',        'K%3`UWEV*:)W^oL8 )>?R3X3b:Z@nr0,cY_o-(kA,D*]=d@,IA[lMLEfI$9idkO_' );
define( 'AUTH_SALT',        'IU83Kn=N;RPGzU=$v,SaXHZ$a3MBsG@2ggHFCVTjsj9f{c#^[|(qxpJ`/zW$^-V<' );
define( 'SECURE_AUTH_SALT', '3-%)K>%A)^SM-M0+hXSm2nZFLs9V6)4}qD/K-.J8Dv8p7Nf#X UlexwMV^t/&NUR' );
define( 'LOGGED_IN_SALT',   '~nSp %<3v6(gvB;lC!.=:%uyqvZVK!;@U{qmZs:.*}KOsr|5lmnmE>tc!9]dnZLd' );
define( 'NONCE_SALT',       '!4_qoe!fRn$ [v6?!Nv-t+<k}NI 6ayB5B!%=S%Jh8&N1 y(f^TKh/RD*6>Ck+3v' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs et développeuses : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur la documentation.
 *
 * @link https://fr.wordpress.org/support/article/debugging-in-wordpress/
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
