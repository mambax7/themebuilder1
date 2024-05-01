<?php

//echo 'miseajour';

// The notifier page
// Get the remote XML file contents and return its data (Version and Changelog)
function get_latest_theme_version($interval)
{
    define('MTHEME_NOTIFIER_XML_FILE', 'http://wajdibenaicha.net/uploads/themebuiilder.xml');
    define('MTHEME_NOTIFIER_XML_FILE_REC', XOOPS_ROOT_PATH . '/modules/system/admin/themebuilder1/themebuiilder.xml');
    define('MTHEME_NOTIFIER_CACHE_INTERVAL', 1);

    if (file_exists(XOOPS_ROOT_PATH . '/modules/system/xoops_version.php')) {
        include XOOPS_ROOT_PATH . '/modules/system/xoops_version.php';
        $last = filemtime(MTHEME_NOTIFIER_XML_FILE_REC);
    }

    $notifier_file_url  = MTHEME_NOTIFIER_XML_FILE;
    $notifier_file_url1 = MTHEME_NOTIFIER_XML_FILE_REC;

    $now = time();
    // check the cache
    if (!isset($last) || (($now - $last) > $interval)) {
        // cache doesn't exist, or is old, so refresh it
        if (function_exists('curl_init')) { // if cURL is available, use it...
            $ch = @curl_init($notifier_file_url);
            @curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            @curl_setopt($ch, CURLOPT_HEADER, 0);
            @curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            $cache = @curl_exec($ch);
            @curl_close($ch);
        } else {
            $cache = file_get_contents($notifier_file_url); // ...if not, use the common file_get_contents()
        }

        if ($cache) {
            file_put_contents($notifier_file_url1, $cache);
        }
        // read from the cache file
        $notifier_data = $cache;
    } else {
        // cache file is fresh enough, so read from it
        $notifier_data = file_get_contents($notifier_file_url1);;
    }
    //var_dump($cache);
    //var_dump($modversion['version']);
    // Let's see if the $xml data was returned as we expected it to.
    // If it didn't, use the default 1.0.0 as the latest version so that we don't have problems when the remote server hosting the XML file is down
    if (!str_contains((string)$notifier_data, '<notifier>')) {
        $notifier_data = '<?xml version="1.0.0" encoding="UTF-8"?>
<notifier>
  <latest>1.0.0</latest>
  <changelog></changelog>
</notifier>
';
    }

    // Load the remote XML data into a variable and return it
    $xml = @simplexml_load_string($notifier_data);

    ?>

    <link rel="stylesheet" type="text/css" media="all" href="admin/themebuilder1/mfn.builder.css">
    <div class="wrap">
        <div id="icon-tools" class="icon32"></div>
        <h2>
            ThemeBuilder Admin Interface Updates</h2>
        <div id="message" class="updated below-h2">
            <p><strong>There is a new version of the
                    <?php echo MTHEME_NOTIFIER_THEME_NAME; ?>
                    theme available.</strong> You have version
                <?php echo $modversion['version']; ?>
                installed. Update to version
                <?php echo $xml->latest; ?>
                .</p>
        </div>
        <style>
            .logo {
                position: relative;
                float: right;
                width: 24%;
            }
        </style>
        <div class="logo">
            <div class="cog-small" id="cog"></div>
            <div class="cog-medium" id="cog-anti"></div>
            <div class="cog-large" id="cog"></div>
            <div class="cog-text">Theme Builder @Olivee</div>
        </div>
        <br><br><br><br>
        <div id="instructions">
            <h2>Update Download and Instructions</h2>
            <p><strong>Please note:</strong> make a <strong>backup</strong> of the Theme inside your Xoops installation folder <code>/modules/system/admin/themebuilder1/
                    <?php //echo MTHEME_NOTIFIER_THEME_FOLDER_NAME;
                    ?>
                    /</code></p>
            <p>
            <h3>DOWNLOAD</h3>
            Get the latest update of the Theme,
            <a href="http://www.github.net/">github</a>.
            </p>
            <p>
            <h3>EXTRACT</h3>
            Extract the contents of the zip file, look for the extracted theme folder.
            </p>
            <p>
            <h3>UPDATE</h3>
            Upload the new files using FTP to the <code>/modules/system/admin/themebuilder1/
                <?php //echo MTHEME_NOTIFIER_THEME_FOLDER_NAME;
                ?>
                /</code> folder overwriting the old ones .
            </p>
            <div class="updated below-h2">
                <h4>Important Note:</h4>
                If you didn't make any changes to the theme files, you can overwrite all files with the new ones without the risk of losing theme settings, pages, menus, slider images, etc.
                <p>If you have modified files like CSS or PHP files and haven't kept track of your changes, then you can use a 'diff' tools to compare the two versions' files and folders. That way you'd know exactly what files to update and where, line by line. Otherwise you'll loose your
                    customizations.</p>
            </div>
        </div>
        <p>
        <h2 class="title">Changelog</h2>
        <?php //echo nl2br($xml->changelog);
        ?>
        </p>
    </div>
<?php
}

get_latest_theme_version(0); //0 a modifier pour une semaine ou un mois intervalle d'update

?>
