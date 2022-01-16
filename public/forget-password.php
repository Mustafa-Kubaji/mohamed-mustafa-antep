<!DOCTYPE html>
<html>
<head>
    <title>Sms Gönderim NetGSM API</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<hr>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-md-12 col-md-offset-6">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <form class="form" action="iletimerkezi.php" method="post">
                                    <fieldset>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="validationCustom08" placeholder="Mobile" pattern=".{10}" class="form-control"  type="tel" name="telefon" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                        </div>
                                    </fieldset>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<!--
<!DOCTYPE html>
<html>
<head>
	<title>Sms Gönderim NetGSM API</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-12"><h1>Sms Gönderim</h1></div>

		<form action="iletimerkezi.php" method="post">
		<label>Telefon No</label>
		<input type="number" class="form-control" name="telefon" placeholder="örn.0542 291 85 75" required="">

		<label>Mesajınız</label>
		<textarea class="form-control" name="mesaj" placeholder="mesajiniz" required=""></textarea>
		<button type="submit" class="btn btn-success">Gönder</button>
		</form>

	</div>
</div>

</body>
</html>
