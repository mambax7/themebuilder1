<?php

if (file_exists("../../../../../mainfile.php")) {
    include("../../../../../mainfile.php");
}

$error = 0;
include_once('./process.php');
?>
<span id="loadin" style="display:none;">Loading <img src="image/loading.gif"/></span>
<h1 style="background: url('image/configuration.png') no-repeat;">Step 3 - Configuration</h1>
<div style="width: 100%; display: inline-block;">
    <div style="float: left; width: 569px;">
        <?php if ($error) { ?>
            <div class="warning"><?php echo $errs; ?></div>
        <?php } ?>

        <div class="inner">
            <table width="100%">
                <tr>
                    <th align="left"><b>installation</b></th>
                    <th width="15%" align="left"><b>Status</b></th>
                </tr>
                <tr>
                    <td><?php echo '.constants.php'; ?></td>
                    <td><?php echo constantadd(); ?></td>
                </tr>
                <tr>
                    <td><?php echo '.language file themebuilder.php'; ?></td>
                    <td><?php echo copylanguagefile(); ?></td>
                </tr>
                <tr>
                    <td><?php echo 'add config to configuration xoops table'; ?></td>
                    <td><?php echo sqltable2($table = 'config'); ?></td>
                </tr>
                <tr>
                    <td><?php echo 'config_theme table'; ?></td>
                    <td><?php echo sqltable1($table = 'config_theme'); ?></td>
                </tr>
                <tr>
                    <td><?php echo 'menu table'; ?></td>
                    <td><?php echo sqltable7($table = 'menu'); ?></td>
                </tr>
                <tr>
                    <td><?php echo 'menu_group table'; ?></td>
                    <td><?php echo sqltable8($table = 'menu_group'); ?> </td>
                </tr>
                <tr>
                    <td><?php echo 'config_theme_menu table'; ?></td>
                    <td><?php echo sqltable3($table = 'config_theme_menu'); ?> </td>
                </tr>
                <tr>
                    <td><?php echo 'crellyslider_sliders table'; ?></td>
                    <td><?php echo sqltable4($table = 'crellyslider_sliders'); ?></td>
                </tr>
                <tr>
                    <td><?php echo 'crellyslider_slides table'; ?></td>
                    <td><?php echo sqltable5($table = 'crellyslider_slides'); ?></td>
                </tr>
                <tr>
                    <td><?php echo 'crellyslider_elements table'; ?></td>
                    <td><?php echo sqltable6($table = 'crellyslider_elements'); ?></td>
                </tr>
                <tr>
                    <td><?php echo 'copy theme folder theme'; ?></td>
                    <td><?php $source = __DIR__ . '\xbootstrap';
                        $dest         = str_replace('modules\system\admin\themebuilder1\install\xbootstrap', 'themes\themebuilder1', $source);
                        echo copythemefolder($source, $dest); ?></td>
                </tr>
                <tr>
                    <td><?php echo '.language file admin.php'; ?></td>
                    <td><?php echo 'later next version'; ?></td>
                </tr>
                <tr>
                    <td><?php echo '.page.php'; ?></td>
                    <td><?php echo copypagefile(); ?></td>
                </tr>
                <tr>
                    <td><?php echo '.THEME.png'; ?></td>
                    <td><?php echo copypngfile(); ?></td>
                </tr>
            </table>
        </div>


        <div style="text-align: right;"><a id="stp3" class="button"></a></div>

    </div>
    <div id="sidebar">
        <ul>
            <li>
                <del>Welcome</del>
            </li>
            <li>
                <del>Pre-Installation</del>
            </li>
            <li><b>Configuration</b></li>
            <li>Finished</li>
        </ul>
    </div>
</div>
