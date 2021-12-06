
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja" dir="ltr">

<head>

	<title>転送</title>

</head>

<body>
転送中です
<form action="https://beta.epsilon.jp/cgi-bin/order/receive_order3.cgi" name="form1" method="POST">
	@foreach($datas as $key =>$data)
	<input type="hidden" name="{{$key}}" value="{{$data}}">
	@endforeach
</form>

</body>
<script type="text/javascript">
	document.form1.submit()

</script>
</html>
