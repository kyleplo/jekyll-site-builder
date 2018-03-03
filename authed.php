<p>Authenticating...</p>
<?php
$opts = array(
  'http'=>array(
    'method'=>"POST",
    'header'=>"Accept: application/xml\r\n"
  )
);
$context = stream_context_create($opts);
if($_GET['state']  = $_COOKIE['state']){
$auth = file_get_contents('https://github.com/login/oauth/access_token?client_id=<client_id>&client_secret=<client_secret>&code=' . $_GET['code'] . '&state=' . $_GET['state'], false, $context);
$xml=simplexml_load_string($auth) or die("Failed to parse XML from Github server. Check the Github status and try again.");
echo "<span id=code hidden>" . $xml->access_token . "</span>"
};
?>
<script>
window.addEventListener("load",function (){
localStorage.authCode = document.getElementById("code").innerHTML;
location.href = "https://kyleplo.com/jekyll-site-builder/edit.html"
})
</script>
