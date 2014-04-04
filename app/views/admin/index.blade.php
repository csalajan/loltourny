<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h2>Admin Area (Test)</h2>
		</div>
	</div>
</div>

<!-- Nav tabs -->
<ul class="nav nav-tabs"  id="tounament-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
  <li><a href="#tournaments" data-toggle="tab">Tournaments</a></li>
  <li><a href="#teams" data-toggle="tab">Teams</a></li>
</ul>
<br>
<!-- Tab panes -->
<div class="tab-content">

	<div class="tab-pane active" id="home">

	</div>

	<div class="tab-pane" id="tournaments">

	</div>

	<div class="tab-pane" id="teams">
		@if(Session::has('message-teams'))
		<div class="row clearfix">
			<div class="col-md-8">
			    <div class="alert alert-{{ Session::get('status') }}">{{ Session::get('message-teams') }}</div>
			</div>
		</div>
		@endif
		<div class="row">
			<div class="col-md-8">
				@if($teams == false)
				  <h3>No Teams</h3>
				@else
				<div class="panel-group" id="accordion">
				<?php $t=1; ?>				
				@foreach($teams as $id => $team)
				  <div class="panel panel-default">
				    <div class="panel-heading">
				      <h4 class="panel-title">
				        <a data-toggle="collapse" data-parent="#accordion" href="#team<?php echo $t; ?>">
				          {{ $team['name'].' - '.$team['approved'] }}
				        </a>
				      </h4>
				    </div>
				    <div id="team<?php echo $t; ?>" class="panel-collapse collapse @if($t == 0) in @endif">
				      <div class="panel-body">
				      	<table class="table table-condensed">
					      <thead>
					        <tr>
					          <th>Name</th>
                    <th>Email</th>
					          <th>Username</th>
					          <th>Position</th>
					          <th>Rank</th>
					          <th>UWE Student</th>
					          <th>Society Member</th>
					        </tr>
					      </thead>
					      <tbody>
					      	@for($i=1; $i <= $team['total_players']; $i++)
					        <tr>
					          <td>{{ $team['p'.$i.'_name'] }}</td>
                    <td>{{ ucfirst($team['p'.$i.'_email']) }}</td>
					          <td><a href="http://www.lolking.net/summoner/euw/{{ $team['p'.$i.'_summoner_id'] }}" target="_blank">{{ $team['p'.$i.'_summoner'] }}</a></td>
					          <td>{{ ucfirst($team['p'.$i.'_pos']) }}</td>
					          <td>{{ ucfirst($team['p'.$i.'_rank']) }}</td>
					          <td>{{ ucfirst($team['p'.$i.'_student']) }}</td>
					          <td>{{ ucfirst($team['p'.$i.'_society']) }}</td>
					        </tr>
					        @endfor
					      </tbody>
					    </table>
				      </div>
				    </div>
				  </div>
				  <?php $t++; ?>
				  @endforeach
				</div>
				@endif
			</div>
		</div>
	</div>

</div>