<div id="bar">
<div class="b">
  <a href="<?php echo $home; ?>"><?php echo $text_home; ?></a>
  <a href="<?php echo $account; ?>"><?php echo $text_account; ?></a>
  <?php if (@$login) { ?>
  <a href="<?php echo $login; ?>"><?php echo $text_login; ?></a>
  <?php } else { ?>
  <a href="<?php echo $logout; ?>"><?php echo $text_logout; ?></a>
  <?php } ?>
  <a href="<?php echo $cart; ?>"><?php echo $text_cart; ?></a>
  <a href="<?php echo $checkout; ?>"><?php echo $text_checkout; ?></a>
</div>
</div>
<script type="text/javascript"><!--
	$(document).ready(function(){
		$("#bar a:last").css("border-right","0px");
	});
//--></script>
