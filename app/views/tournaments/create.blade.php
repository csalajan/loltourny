    <!-- Error Message Box -->
@if(Session::has('message'))
<div class="row clearfix">
	<div class="col-md-12">
	    <div class="alert alert-{{ Session::get('status') }}">{{ Session::get('message') }}</div>
	</div>
</div>
@endif

<div class="row">
	<div class="col-md-4">
		<div class="page-header">
			<h3>Create a Tournament</h3>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
		{{ Form::open(array('url'=>'store', 'action' => 'post', 'class'=>'form-horizontal')) }}
		<div class="form-group {{ $errors->first('name', 'has-error') }}">
			<label for="name" class="col-sm-2 control-label">Name*</label>
			<div class="col-sm-8">
				{{ Form::text('name', '', array('class' => 'form-control input')) }}
				{{ $errors->first('name', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<div class="form-group {{ $errors->first('size', 'has-error') }}">
			<label for="size" class="col-sm-2 control-label">Size*</label>
			<div class="col-sm-3">
				{{ Form::select('size', array('4'=>'4', '8'=>'8', '16'=>'16'), '4', array('class' => 'form-control input')) }}
				{{ $errors->first('size', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<div class="form-group {{ $errors->first('url', 'has-error') }}">
			<label for="url" class="col-sm-2 control-label">URL</label>
			<div class="col-sm-8">
				{{ Form::text('url', '', array('class' => 'form-control input')) }}
				{{ $errors->first('url', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<div class="form-group">
			<label for="url" class="col-sm-2 control-label">Date</label>
			<div class="col-sm-4">
				{{ Form::text('date', date('d/m/Y'), array('id' => 'dp', 'class' => 'form-control input dob-form-control', 'data-date-format' => 'dd/mm/yy')) }}
				{{ $errors->first('date', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<div class="form-group">
			<label for="time" class="col-sm-2 control-label">Time</label>
			<div class="col-sm-4">
				{{ Form::select('time', $times, date('Hi', ceil(time()/300)*300), array('class' => 'form-control input dob-form-control')) }}
				{{ $errors->first('time', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		<div class="form-group {{ $errors->first('location', 'has-error') }}">
			<label for="location" class="col-sm-2 control-label">Location</label>
			<div class="col-sm-8">
				{{ Form::text('location', '', array('class' => 'form-control input')) }}
				{{ $errors->first('location', '<span class="help-block">:message</span>') }}
			</div>
		</div>
		{{ Form::submit('Create', array('class'=>'btn btn-success btn-block')) }}
		{{ Form::token() . Form::close() }}
	</div>
</div>