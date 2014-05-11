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
<div class="page-title"><h1>Contact Us</h1></div>

        <div class="contact-image">
            <img src="<?php echo assets("image/gta-map.png") ?>" alt=""/>
        </div>
<form class="clean-form" action="">

    <!--<p>When you need responsive plumbing service, to discuss a project, &nbsp;or to request a quote please contact Byno Mechanical Plumbing Heating Ltd.&nbsp;</p>-->
    <!--<p>Tel: 905 882 4574</p>-->
    <!--<p>Fax: 905 886 9278</p>-->
    <!--<p>Cell: 416 402 8881</p>-->
    <!--<p>Email: <a href="mailto:byno@rogers.com">byno@rogers.com</a></p>-->


    <section class="left">
        <input type="text" placeholder="Name"/>
        <input type="email" placeholder="Email"/>
        <input type="tel" placeholder="Tel"/>
        <input type="submit"/>
    </section>

    <section class="right">
        <label for="message">Message</label>
        <textarea name="message" id="message"></textarea>
    </section>
</form>

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
