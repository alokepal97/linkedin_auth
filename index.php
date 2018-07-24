<?
require_once "init_function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login with LinkedIn</title>
    </head>
<body>
<div class="linkedin_btn">
	<a href="https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id=<?echo $client_id;?>&client_secret=<?echo $client_secret;?>&redirect_uri=<?echo $redirect_uri;?>&state=<?echo $csrf_token;?>&scope=<?echo $scopes;?>" > <img src="linkedin.png" height="150" width="150" /></a>
</div>
</body>
</html>