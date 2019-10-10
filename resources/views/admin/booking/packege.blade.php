<h3>Per Person Price <span class="badge badge-info">{{$book->package->price}}</span>{{get_option('currency_symbol')}}</h3>
<table class="table table-bordered" style="color: #000">
	<thead>
		<tr>
			<th>Package Name</th>
			<th>{{$book->package->name}}</th>
		</tr>

		<tr>
			<th>Package Type</th>
			<th>{{$book->package->type}} Package</th>
		</tr>

		<tr>
			<th>Package Class</th>
			<th>{{$book->package->option->name}}</th>
		</tr>

		<tr>
			<th>Package Duration</th>
			<th>{{$book->package->duration}}</th>
		</tr>

		<tr>
			<th>Description</th>
			<th>{!!$book->package->description !!}</th>
		</tr>

		<tr>
			<th>Itinary</th>
			<th>{!!$book->package->itinary!!}</th>
		</tr>

		<tr>
			<th>Hotel</th>
			<th>{!!$book->package->hotel!!}</th>
		</tr>

		 <tr>
			<th>photo</th>
			<th><img src="{{asset('storage/packege/'.$book->package->photo)}}" alt=""  width="100%" height="202.5"></th>
		</tr>
	</thead>
</table>