<?php
global $xoTheme;
//$this->assign('hhhrrrrrrrrrrrrtttttttttttttttttt', ${'header'});
//var_dump($xoTheme->template->_tpl_vars['custom-css']);
$html = '</div>' . "\n";
$html .= '</div>' . "\n";
$html .= $iii . "\n";
$html .= '<style>'.$xoTheme->template->_tpl_vars['custom-css'] . "\n</style>";
$html .= $xoTheme->template->_tpl_vars['jsbody'] . "\n";
$html .= '</body>' . "\n";
$html .= '</html>' . "\n";
echo $html;	
?>