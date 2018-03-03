<p>Authenticating...</p>
<script>
window.addEventListener("load",function (){
var here = new URL(location.href);
var state = here.searchParams.get("state");
var code = here.searchParams.get("code");
var head = new Headers();
head.append("Accept","application/json");
if(state === localStorage.authState){
fetch("https://github.com/login/oauth/access_token?client_id=<client_id>&client_secret=<client_secret>&code=" + code + "&state=" + localStorage.authState,{method: "POST",headers: head}).then(function (r){return r.json()}).then(function (j){
localStorage.authState = "ha ha tricked ya the auth state was da le ted";
localStorage.authToken = j["access_token"];
location.href = "https://kyleplo.com/jekyll-site-builder/edit.html"
})
}})
</script>
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
