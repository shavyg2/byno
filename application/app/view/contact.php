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
<div class="page-title">
    <h1>

        <p>
        </p>Contact Us
    </h1>
</div>

<div class="contact-image">
    <img src="<?php echo assets("image/gta-map.png") ?>" alt=""/>
</div>
<form class="clean-form" action="/send" method="post">

    <p>When you need responsive service, to discuss a project, &nbsp;or to request a quote please contact us using any format below. &nbsp;</p>

    <ul class="tel-list">
        <li>Tel: 905 882 4574</li>
        <li>Fax: 905 886 9278</li>
        <li>Cell: 416 402 8881</li>
    </ul>


    <section class="left">
        <input name="name" type="text" placeholder="Name" required/>
        <input name="email" type="email" placeholder="Email" required/>
        <input name="tel" type="tel" placeholder="Tel"/>
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
