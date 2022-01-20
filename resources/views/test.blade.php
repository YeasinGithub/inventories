<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="row">
		<div>
			<table>
				@foreach($list as $cat)
					<tr>
						<td>{{ $cat }}</td>
					</tr>
				@endforeach
			</table>
		</div>
	</div>

</body>
</html>