<?php

$importerid = $_POST['importerid'] ?? $_GET['importerid'];
if ($importerid == 'menu') {
    if ($_POST['Submit'] == 'Save All Changes' && $_POST['atp_template_option_values'] != '') {
        $output = unserialize(base64_decode((string) $output['atp_template_option_values']));

        //$smof_data = unserialize( base64_decode( $_POST['atp_template_option_values'] )  );
        //$smof_data = base64_decode( $_POST['atp_template_option_values'] ) ;
        $smof_data = $_POST['atp_template_option_values'];
        //var_dump(unserialize ($smof_data));
        $smof_data = unserialize($smof_data);

        $sql = "INSERT INTO " . $xoopsDB->prefix('config_theme') . " ( conf_name, conf_value, conf_desc) VALUES ('" . $smof_data['conf_name'] . "', '" . $smof_data['conf_value'] . "', '" . $smof_data['conf_desc'] . "')";

        if ($result = $xoopsDB->queryF($sql)) {
            foreach ($smof_data['tttt'] as $item => $key) {
                //echo $key['id'];
                //echo '<br>';

                $sql1 = "INSERT INTO " . $xoopsDB->prefix('config_theme_menu') . " ( catmenu, label, link, parent, sort, icons, class) VALUES ('" . $smof_data['conf_id'] . "', '" . $key['label'] . "', '" . $key['link'] . "', '" . $key['parent'] . "', '" . $key['sort'] . "', '" . $key['icons'] . "', '" . $key['class'] . "')";

                if ($result = $xoopsDB->queryF($sql1)) {
                    //$message = 'data imported to '.$name.'';
                    //echo $message;
                } else {
                    $message = 'problemeaveclenregistrement';
                    //echo $message;

                }
            }
        } else {
            $message = 'problemeaveclenregistrement';
            //echo $message;

        }

        $sqlr = "UPDATE " . $xoopsDB->prefix("config_theme_menu") . " u, " . $xoopsDB->prefix("config_theme_menu") . " p SET u.parent = p.id WHERE p.label = u.parent AND u.catmenu = p.catmenu";
        if ($resultr = $xoopsDB->queryF($sqlr)) {
            //echo 'yesss';
        }
    }
    echo '
	<form action="" enctype="multipart/form-data" id="atpform" method="post">
		<div class="section section-import ">
		<h3>Import menu</h3>
			<div class="controls"><textarea class="atp-input" name="atp_template_option_values" id="atp_template_option_values" cols="8" rows="8"></textarea></div>
			<div class="explain">Import the settings you have copied or taken backup from your previous theme options for this theme. Paste the code and click save settings</div>
		</div>
		<div class="savebar">
			<div class="savelink"><input type="submit" name="Submit" value="Save All Changes" class="button button-primary button-large right" /></div>
		</div>
	</form>';
}
if ($importerid == 'slider') {
    echo 'slider';
}
if ($importerid == 'sidebar') {
    echo 'sidebar';
}
if ($importerid == 'option') {
    echo 'option';
    if (isset($_POST['upload'])) {
        if (isset($_POST['requete'])) {
            $options = $_POST['requete'];
        }
        if ($_FILES["file"]["error"] > 0) {
            // error
        } else {
            $options = file_get_contents($_FILES["file"]["tmp_name"]);
            if ($options) {
                //insert to sql
            }
        }
        //redirect with message
        //exit;
        var_dump($options);
    }
    echo '		<div class="wrap">
			<h2>Backup/Restore Theme Options</h2>
			<form action="" method="POST" enctype="multipart/form-data">
				<style>#backup-options td { display: block; margin-bottom: 20px; }</style>
				<table id="backup-options">
					<tr>
						<td>
							<p><textarea name="requete" class="widefat code" rows="20" cols="100" onclick="this.select()"></textarea></p>
						</td>
						<td>
							<h3>Restore/Import</h3>
							<p><label class="description" for="upload">Restore a previous backup</label></p>
							<p><input type="file" name="file" /> 
							<input type="submit" name="upload" id="upload" class="button-primary" value="Submit" /></p>

						</td>
					</tr>
				</table>
			</form>
		</div>';
}
if ($importerid == 'template') {
    echo 'template';
    if (isset($_POST['upload'])) {
        $name = $_GET['templateid'];

        if (isset($_POST['requete'])) {
            $options = $_POST['requete'];
        }
        if ($_FILES["file"]["error"] > 0) {
            // error
        } else {
            $options = file_get_contents($_FILES["file"]["tmp_name"]);
        }
        if ($options) {
            //insert to sql

            $titleexist  = " SELECT conf_name FROM " . $xoopsDB->prefix('config_theme') . " WHERE conf_name = '" . $_GET['templateid'] . "'";
            $resultexist = $xoopsDB->query($titleexist);
            $filecount   = $xoopsDB->getRowsNum($resultexist);

            if ($filecount == 0) {
                $sql = "INSERT INTO " . $xoopsDB->prefix('config_theme') . " ( conf_name, conf_value) VALUES ('$name', '$options')";

                if ($result = $xoopsDB->queryF($sql)) {
                    $message = 'data imported to ' . $name . '';
                    //echo $message;
                } else {
                    $message = 'problemeaveclenregistrement';
                    //echo $message;

                }
            } else {
                $sqlr = "UPDATE " . $xoopsDB->prefix('config_theme') . " SET conf_value='$options' WHERE conf_name = '$name'";
                if ($resultr = $xoopsDB->queryF($sqlr)) {
                    $message = "data imported and updated";
                } else {
                    $message = "" . _AM_SYSTEM_THEMEBUILDER_ProblememodificationCSSExtra . "";
                }
                //echo $message;

            }
        } else {
            $message = 'il y a un probleme avec les donnés';
        }

        //redirect with message
        //exit;
        //var_dump($options);
        if ($name == 'default_template') {
            redirect_header("admin.php?fct=themebuilder&op=ThemeBuilder", 5, $message);
            exit();
        } else {
            redirect_header("admin.php?fct=themebuilder&op=templetebuilder&templetebuilderid=$name", 5, $message);
            exit();
        }
    }
    echo '		<div class="wrap">
			<h2>Backup/Restore ' . $_GET['templateid'] . ' Options</h2>
			<form action="" method="POST" enctype="multipart/form-data">
				<style>#backup-options td { display: block; margin-bottom: 20px; }</style>
				<table id="backup-options">
					<tr>
						<td>
							<p><textarea name="requete" class="widefat code" rows="20" cols="100" onclick="this.select()"></textarea></p>
						</td>
						<td>
							<h3>Restore/Import</h3>
							<p><label class="description" for="upload">Restore a previous backup</label></p>
							<p><input type="file" name="file" /> 
							<input type="submit" name="upload" id="upload" class="button-primary" value="Submit" /></p>

						</td>
					</tr>
				</table>
			</form>
		</div>';
}

if ($importerid == 'page') {
    echo 'page';
    if (isset($_POST['upload'])) {
        $name = $_GET['pageid'];

        if (isset($_POST['requete'])) {
            $options = $_POST['requete'];
        }
        if ($_FILES["file"]["error"] > 0) {
            // error
        } else {
            $options = file_get_contents($_FILES["file"]["tmp_name"]);
        }
        $smof_data = unserialize($options);
        if ($options) {
            //insert to sql

            $titleexist  = " SELECT conf_name FROM " . $xoopsDB->prefix('config_theme') . " WHERE conf_title = '" . $smof_data['conf_title'] . "'";
            $resultexist = $xoopsDB->query($titleexist);
            $filecount   = $xoopsDB->getRowsNum($resultexist);
            //var_dump($smof_data);
            if ($filecount == 0) {
                $sql = "INSERT INTO " . $xoopsDB->prefix('config_theme') . " ( conf_name, conf_title, conf_value, conf_desc) VALUES ('pagebuilder', '" . $smof_data['conf_title'] . "', '" . $smof_data['conf_value'] . "', '" . $smof_data['conf_desc'] . "')";

                if ($result = $xoopsDB->queryF($sql)) {
                    $message = 'data imported to ' . $smof_data['conf_title'] . '';
                    //echo $message;
                } else {
                    $message = 'problemeaveclenregistrement';
                    //echo $message;

                }
            } else {
                $sqlr = "UPDATE " . $xoopsDB->prefix('config_theme') . " SET conf_value='" . $smof_data['conf_value'] . "', conf_desc='" . $smof_data['conf_desc'] . "' WHERE conf_title = '" . $smof_data['conf_title'] . "'";
                if ($resultr = $xoopsDB->queryF($sqlr)) {
                    $message = 'data imported and updated to page ' . $smof_data['conf_title'] . '';
                } else {
                    $message = "" . _AM_SYSTEM_THEMEBUILDER_ProblememodificationCSSExtra . "";
                }
                //echo $message;

            }
        } else {
            $message = 'il y a un probleme avec les donnés';
        }

        //redirect with message
        //exit;
        //var_dump($smof_data);
        //echo $message;
        redirect_header("admin.php?fct=themebuilder&op=pagebuilder", 5, $message);
        exit();
    }
    echo '		<div class="wrap">
			<h2>Backup/Restore page Options</h2>
			<form action="" method="POST" enctype="multipart/form-data">
				<style>#backup-options td { display: block; margin-bottom: 20px; }</style>
				<table id="backup-options">
					<tr>
						<td>
							<p><textarea name="requete" class="widefat code" rows="20" cols="100" onclick="this.select()"></textarea></p>
						</td>
						<td>
							<h3>Restore/Import</h3>
							<p><label class="description" for="upload">Restore a previous backup</label></p>
							<p><input type="file" name="file" /> 
							<input type="submit" name="upload" id="upload" class="button-primary" value="Submit" /></p>

						</td>
					</tr>
				</table>
			</form>
		</div>';
}
?>
