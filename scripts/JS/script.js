<script>
function getstate(id)
{
$.ajax({
type:"POST",
url:"getstate.php",
data:"country_id="+id,
success:function(state)
{
  $("#state").html(state);
  // alert(state);
}
})
}

function getcity(id)
{
$.ajax({
type:"POST",
url:"getcity.php",
data:"state_id="+id,
success:function(city)
{
  $("#city").html(city);
  // alert(city);
}
})
}

</script>