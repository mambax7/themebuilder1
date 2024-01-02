<?php
if (file_exists("../../../../../mainfile.php")) {  
include("../../../../../mainfile.php"); 
} 
?>
<h1 style="background: url('image/finished.png') no-repeat;">Step 4 - Finished!</h1>
<div style="width: 100%; display: inline-block;">
  <div style="float: left; width: 569px;">
    <div class="warning">Don't forget to delete your installation directory!</div>
    <p>Congratulations! You have successfully installed Theme Builder .What do you want to do next ?</p>
    <div style="text-align: center; float: left; margin-bottom: 15px;"><br />
      <a href="<?php echo XOOPS_URL ?>/modules/system/admin.php?fct=themebuilder1">Goto your Theme Builder administration</a>
    </div>
    <div style="text-align: center; float: right;"><br />
      <a href="">goto?</a>
    </div>
  </div>
  <div id="sidebar">
    <ul>
      <li><del>Welcome</del></li>
      <li><del>Pre-Installation</del></li>
      <li><del>Configuration</del></li>
      <li><b>Finished</b></li>
    </ul>
  </div>
</div>