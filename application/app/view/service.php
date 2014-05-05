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
  $last=&$renderstack[count($renderstack)-1];
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
<h1>Services</h1>
<ul class="spacing">
    <li><div class="thumbnail" id="plumbing-image">
        <div class="text">Plumbing Services</div>
    </div></li>
    <li><div class="thumbnail" id="gas-image">
        <div class="text">Gas appliance installation</div>
    </div></li>
    <li><div class="thumbnail" id="drain-image">
        <div class="text">CCTV Drain/Video Inspection</div>
    </div></li>
    <li><div class="thumbnail" id="ac-image">
        <div class="text">Air Condition Repair & Installation</div>
    </div></li>
    <li><div class="thumbnail" id="furnace-image">
        <div class="text">Furnace Repair & Installation</div>
    </div></li>
    <li><div class="thumbnail" id="sprinkler-image">
        <div class="text">Sprinkler System</div>
    </div></li>
</ul>


<h1>Service Area</h1>
<div class="image-map">
    <div class="map-section" id="peel"></div>
    <div class="map-section" id="durham"></div>
    <div class="map-section" id="halton"></div>
    <div class="map-section" id="toronto"></div>
    <div class="map-section" id="york"></div>
</div>

<div class="map-labels">
    <div class="region" id="toronto">Toronto</div>
    <div class="region" id="york">York</div>
    <div class="region" id="durham">Durham</div>
    <div class="region" id="halton">Halton</div>
    <div class="region" id="peel">Peel</div>
</div>
<?php
  $section_buffer=ob_get_clean();
  $last->sections['page']=$section_buffer
?>
<?php
if(isset($renderstack) && count($renderstack)>0){
   $last=&array_pop($renderstack);
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
