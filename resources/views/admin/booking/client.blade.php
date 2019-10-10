<table class="table table-bordered" style="color: #000">
	<thead>
		<tr>
			<th>Client Name</th>
			<th>{{$book->user->name}}</th>
		</tr>

		<tr>
			<th>Client Email</th>
			<th>{{$book->user->email}}</th>
		</tr>

		<tr>
			<th>Client phone</th>
			<th>{{$book->user->phone}}</th>
		</tr>

		<tr>
			<th>Continent</th>
			<th>{{$book->user->continent}}</th>
		</tr>

		<tr>
			<th>Country</th>
			<th>{{$book->user->country}}</th>
		</tr>

		<tr>
			<th>Latitude</th>
			<th>{{$book->user->latitude}}</th>
		</tr>

		<tr>
			<th>longitude</th>
			<th>{{$book->user->longitude}}</th>
		</tr>

		 <tr>
			<th>Currency Symbol</th>
			<th>{{$book->user->currency_symbol}}</th>
		</tr>
	</thead>
</table>