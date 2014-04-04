<div class="row">
	<div class="col-md-12">
		<div class="page-header">
			<h2>Login</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="panel panel-default">
			<!-- Default panel contents -->
			<div class="panel-heading">LoLTourny Login</div>
			<!-- List group -->
			<div class="panel-body">
				{{ Hash::make('cheeseman123') }}
				{{ Form::open(array('url' => Request::url().'/users/register', 'action' => 'post', 'class' => 'form-horizontal')) }}						
				<div class="form-group {{ $errors->first('searcher_name', 'has-error') }}">
					<label for="searcher_name" class="col-sm-3 control-label">Email</label>
					<div class="col-sm-8">
						{{ Form::text('email', '', array('class' => 'form-control input')) }}
						{{ $errors->first('searcher_name', '<span class="help-block">:message</span>') }}
					</div>
				</div>
				<div class="form-group {{ $errors->first('searcher_summoner', 'has-error') }}">
					<label for="searcher_summoner" class="col-sm-3 control-label">Password</label>
					<div class="col-sm-8">
						{{ Form::password('password', array('class' => 'form-control input')) }}
						{{ $errors->first('searcher_summoner', '<span class="help-block">:message</span>') }}
					</div>
				</div>
				<div class="form-group">
				    <div class="col-sm-offset-1 col-sm-10">
				    	{{ Form::submit('Login', array('class'=>'btn btn-primary')) }}
				    </div>
				</div>
				{{ Form::token() . Form::close() }}
			</div>
		</div>
	</div>
</div>
