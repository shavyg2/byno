<?php //ini_set('error_reporting', 0);?>
<?php
  ob_start();
  if(!isset($renderstack)){
    $renderstack=array();
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
  $last->sections=array();
  endif;
?>

<?php ob_start();?>

<!--<div id="slider">-->
<!--<img src="<?php echo assets("image/ac_unit_roof_top.png") ?>" alt=""/>-->
<!--<img src="<?php echo assets("image/drain-camera.png") ?>" alt=""/>-->
<!--<img src="<?php echo assets("image/inspection.png") ?>" alt=""/>-->
<!--<img src="<?php echo assets("image/repair_guest.png") ?>" alt=""/>-->
<!--<img src="<?php echo assets("image/repair_planning.png") ?>" alt=""/>-->
<!--</div>-->
<div class="page-title">
    <h1>Services</h1>
</div>

<?php include('slider.php') ?>


<!--<ul class="spacing">-->
<!--<li>-->
<!--<div class="thumbnail" id="plumbing-image">-->
<!--<div class="text">Plumbing Services</div>-->
<!--</div>-->
<!--</li>-->
<!--<li>-->
<!--<div class="thumbnail" id="gas-image">-->
<!--<div class="text">Gas appliance installation</div>-->
<!--</div>-->
<!--</li>-->
<!--<li>-->
<!--<div class="thumbnail" id="drain-image">-->
<!--<div class="text">CCTV Drain/Video Inspection</div>-->
<!--</div>-->
<!--</li>-->
<!--<li>-->
<!--<div class="thumbnail" id="ac-image">-->
<!--<div class="text">Air Condition Repair & Installation</div>-->
<!--</div>-->
<!--</li>-->
<!--<li>-->
<!--<div class="thumbnail" id="furnace-image">-->
<!--<div class="text">Furnace Repair & Installation</div>-->
<!--</div>-->
<!--</li>-->
<!--<li>-->
<!--<div class="thumbnail" id="sprinkler-image">-->
<!--<div class="text">Sprinkler System</div>-->
<!--</div>-->
<!--</li>-->
<!--</ul>-->

<div class="service-information">
    <div class="row">
        <div class="information">
            <strong><h5> Plumbing Services</h5></strong>
<?php include('plumbing-service.php') ?>
        </div>

        <div class="information">
            <strong><h5>Gas Appliance Installation</h5></strong>
<?php include('gas-appliance-installation.php') ?>
        </div>
    </div>

    <div class="row">
        <div class="information last">
            <strong><h5>CCTV Drain/Video Inspection</h5></strong>
<?php include('cctv-drain-video-inspection.php') ?>
        </div>

        <div class="information">
            <strong><h5>Air Condition: Sales, Service & Installation</h5></strong>
<?php include('air-condition-repair-installation.php') ?>
        </div>
    </div>

    <div class="row">
        <div class="information">
            <strong><h5>Furnace: Sales, Service & Installation</h5></strong>
<?php include('furnace-repair-installation.php') ?>
        </div>

        <div class="information">
            <strong><h5>Sprinkler System</h5></strong>
<?php include('sprinkler-system.php') ?>
        </div>
    </div>

    <div class="row">
        <div class="information">
            <strong><h5>Propress</h5></strong>
<?php include('propress-machine.php') ?>
        </div>

        <div class="information">
            <strong><h5>Backflow Preventor</h5></strong>
<?php include('backflow-preventor.php') ?>
        </div>
    </div>
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
