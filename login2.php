<?php
echo "<input type='text' value='$_POST[A_pass]' id='c1'/>";
echo "<input type='text' value='$_POST[A_user]' id='c2'/>";
echo "<input type='text' id='d1'/>";
echo "<input type='text' id='d2'/>";
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script>
function b64_to_utf8( str ) {
  return decodeURIComponent(escape(window.atob( str )));
}
var a1 = $("#c1").val();
var a2 = $("#c2").val();
var b1 = b64_to_utf8(a1); // "✓ à la mode"
var b2 = b64_to_utf8(a2); // "✓ à la mode"
$("#d1").val(b1);
$("#d2").val(b2);

</script>

