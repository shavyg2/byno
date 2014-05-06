<?php //ini_set('error_reporting', 0);?>
<?php
  ob_start();
  if(!isset($renderstack)){
    $renderstack=[];
  }
  array_push($renderstack,new stdClass());

  include("main-layout.php");
  if(!isset($last)){
    $last=null;
  }
  $last=$renderstack[count($renderstack)-1];
  if(isset($last) && !isset($last->parent)){
    $last->parent=null;
  }
  if(isset($last)):
    $last->parent=ob_get_clean();
  endif;
  if(isset($last) &&!isset($last->section)):
  $last->sections=[];
  endif;
?>

<?php ob_start();?>
<div class="hundo">
    <p>When you need responsive plumbing service, to discuss a project, &nbsp;or to request a quote please contact Byno Mechanical Plumbing Heating Ltd.&nbsp;</p>
    <p>Tel: 905 882 4574</p>
    <p>Fax: 905 886 9278</p>
    <p>Cell: 416 402 8881</p>
    <p>Email: <a href="mailto:byno@rogers.com">byno@rogers.com</a></p>
    <p>Office Hours:</p>
    <p>Monday - Fridays</p>
    <p>8:00 a.m. to 8:00 p.m.</p>
    <p>Weekend and outside office hours: Call 416 402 8881</p>
    <p>A service technician is available 24/7</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</div>

<?php
  $section_buffer=ob_get_clean();
  $last->sections['page']=$section_buffer
?>
<?php
if(isset($renderstack) && count($renderstack)>0){
   $last=array_pop($renderstack);
   if(isset($last->sections)):
     foreach($last->sections as $key=>$value){
       if(isset($last) && isset($last->parent)):
       $last->parent=str_replace("#child ".$key, $value, $last->parent);
       endif;
     }
   endif;
}
 if(isset($last->parent)):
 echo $last->parent;
 endif;
?>
