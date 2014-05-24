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
<div class="page-title">
    <h2>Byno Mechanical Plumbing Heating Ltd

        .</h2>

</div>
<!--<div class="banner">-->
<!--<div class="banner-image">-->

<!--</div>-->
<!--<div class="message">-->
<!--<h3>24 hr Service</h3>-->
<!--<p>We are local</p>-->
<!--</div>-->
<!--</div>-->
<?php include('slider.php') ?>


<div class="quote-banner">


    <p class="big-quote">Byno Mechanical Plumbing Heating Ltd. has been serving the GTA and surrounding area since 1982. We are a full service company: Licensed, Insured and WSIB compliant.<br>
    <h4 class="big-quote center top-space"> <strong> </strong> We are just a call away</h4>
    </p>
</div>


<div class="area-of-business">
    <div class="item">
        <div class="image" id="industrial">

        </div>
        <h5>Industrial</h5>

    </div>
    <div class="item">
        <div class="image" id="commercial">

        </div>
        <h5>Commercial</h5>
    </div>
    <div class="item">
        <div class="image" id="residential">

        </div>
        <h5>Residential/ Highrise</h5>

    </div>
    <div class="item">
        <div class="image" id="institution">

        </div>
        <h5>Institution</h5>
    </div>
    <div class="building"></div>

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
