<div class="row">
  <div class="col-md-12">
    <div class="page-header">
      <h2>{{ $tournament->name }}</h2>
    </div>
  </div>
</div>
<div class="row clearfix">
  <div class="col-md-12">
    <div class="alert alert-warning">If you were previously getting errors when submitting a team, please try again as we have now fixed that problem. CLOSING TIME IS MIDNIGHT ON THURSDAY!</div>
  </div>
</div>
<!-- Nav tabs -->
<ul class="nav nav-tabs"  id="tounament-tabs">
  <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
  <li><a href="#entry" data-toggle="tab">Entry</a></li>
  <li><a href="#teams" data-toggle="tab">Teams</a></li>
  <li><a href="#fixtures" data-toggle="tab">Fixtures</a></li>
  <li><a href="#results" data-toggle="tab">Results</a></li>
  <li><a href="#standings" data-toggle="tab">Standings</a></li>
  <li><a href="#looking" data-toggle="tab">Looking For Team</a></li>
</ul>
<br>
<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home">
    @if(Session::has('message-index'))
    <div class="row clearfix">
      <div class="col-md-8">
        <div class="alert alert-{{ Session::get('status') }}">{{ Session::get('message-index') }}</div>
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-8">
        <div class="panel panel-default">
          <!-- Default panel contents -->
          <div class="panel-heading">Details</div>
          <!-- List group -->
          <ul class="list-group">
            <li class="list-group-item"><h4 class="list-group-item-heading">Name:</h4> {{ $tournament->name }}</li>
            <li class="list-group-item"><h4 class="list-group-item-heading">Date:</h4> {{ $date }}</li>
            <li class="list-group-item"><h4 class="list-group-item-heading">Start Time:</h4> {{ $time }}</li>
            <li class="list-group-item"><h4 class="list-group-item-heading">Signup Closes:</h4> {{ $signup_close }}</li>
            <li class="list-group-item"><h4 class="list-group-item-heading">Format:</h4> {{ $tournament->format }}</li>
            <li class="list-group-item"><h4 class="list-group-item-heading">Team Limit:</h4> {{ $tournament->size }}</li>
            <li class="list-group-item"><h4 class="list-group-item-heading">Location:</h4> {{ $tournament->location }}</li>
            <li class="list-group-item">
              <h4 class="list-group-item-heading">Admins</h4>
              <ul>
                <li>Jonathan Lambert - <a href="mailto:jonathan4.lambert@live.uwe.ac.uk">Email</a></li>
              </ul>
            </li>
            <li class="list-group-item">
              <h4 class="list-group-item-heading">Rules &amp; Info</h4>
              <ul>
                <li>Teams must include at least <strong>one</strong> verified player from UWE.</li>
                <li>Physical attendance is optional. <strong>However</strong> a player from your team must be present to collect any physical prizes (T-Shirts etc).</li>
                <li>All players will receive a <strong>free</strong> <a href="http://beta.cursevoice.com">Curse Voice</a> beta key, we encourage use of it throughout the tournament as it's a very useful tool!</li>
                <li>Format is double elimination. Best of one game. You will get two chances at reaching the final.</li>
                <li>Your team will not be approved until entry fees have been paid.</li>
                <li>If your team does not show up, or you can't find any subs to replace missing members, your entry fee won't be refunded. You can make member changes up until the signup deadline however.</li>
                <li><a href="https://www.facebook.com/events/1454116508152472">Facebook Event</a></li>
              </ul>
            </li>
            <li class="list-group-item">
              <h4 class="list-group-item-heading">Prizes</h4>
              <ul>
                <li>First Place: Cash Prize</li>
                <li>Second Place: Riot Points</li>
                <li>Third Place: Team Curse T-Shirts (Courtesy of Curse)</li>
              </ul>
            </li>
            <li class="list-group-item">
              <h4 class="list-group-item-heading">Entry</h4>
              <a href="#entry" data-toggle="tab" class="btn btn-success">Sign Up</a>
            </li>
          </ul>
        </div>
      </div>	
    </div>
  </div>
  
  <div class="tab-pane" id="entry">
    @if(Session::has('message-entry'))
    <div class="row clearfix">
      <div class="col-md-8">
        <div class="alert alert-{{ Session::get('status') }}">{{ Session::get('message-entry') }}</div>
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-8">
        <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading">Please Read!</div>
          <!-- List group -->
          <ul class="list-group">
            <li class="list-group-item">
              <p>Please only use letters and numbers in your team name. You can make changes after the team is created.</p>
              <p>In order to be approved for the tournament, you will need to pay an entry fee.</p>
              <p>Your team captain must be a UWE student, the rest of your team do not need to be at UWE.</p>
            </li>
            <li class="list-group-item">
              <p><b>Entry Fees</b></p>
              <p>£2 for UWE Video Gaming Society members.</p>
              <p>£3 for non-members</p>
              <p>Once your team has been approved, we will let you know how much your teams entry fee will cost.</p>
              <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=KGSRSL3FLNAQY" class="btn btn-warning">Make Payment</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        {{ Form::open(array('url' => Request::url().'/teams/store', 'action' => 'post', 'class' => 'form-horizontal')) }}
        <div class="form-group {{ $errors->first('team_name', 'has-error') }}">
          <label for="team_name" class="col-sm-3 control-label">Team Name</label>
          <div class="col-sm-6">
            {{ Form::text('team_name', '', array('class' => 'form-control input')) }}
            {{ $errors->first('team_name', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        @for($i = 1; $i <= 7; $i++)
        <!-- New Player -->
        <div class="form-group">
          <div class="col-md-3">
            <span class="help-block"><h4>@if($i < 6 && $i != 1) Player #{{ $i }} @elseif($i > 5) Sub #{{ $i-5 }} (Optional) @elseif($i == 1) Team Captain @endif</h4></span>
          </div>
        </div>
        <div class="form-group {{ $errors->first('player'.$i.'_name', 'has-error') }}">
          <label for="player{{ $i }}_name" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-4">
            {{ Form::text('player'.$i.'_name', '', array('class' => 'form-control input')) }}
            {{ $errors->first('player'.$i.'_name', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->first('player'.$i.'_name', 'has-error') }}">
          <label for="player{{ $i }}_summoner" class="col-sm-3 control-label">Summoner Name</label>
          <div class="col-sm-4">
            {{ Form::text('player'.$i.'_summoner', '', array('class' => 'form-control input')) }}
            {{ $errors->first('player'.$i.'_summoner', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->first('player'.$i.'_position', 'has-error') }}">
          <label for="player{{ $i }}_position" class="col-sm-3 control-label">Position</label>
          <div class="col-sm-4">
            {{ Form::select('player'.$i.'_position', array('top'=>'Top', 'mid'=>'Mid', 'jungle'=>'Jungle', 'adc'=>'ADC', 'support'=>'Support', 'other'=>'Other'), '4', array('class' => 'form-control input')) }}
            {{ $errors->first('player'.$i.'_position', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{ $errors->first('player'.$i.'_email', 'has-error') }}">
          <label for="player{{ $i }}_email" class="col-sm-3 control-label">Email</label>
          <div class="col-sm-4">
            {{ Form::text('player'.$i.'_email', '', array('class' => 'form-control input')) }}
            {{ $errors->first('player'.$i.'_email', '<span class="help-block">:message</span>') }}
          </div>
        </div>
        <div class="form-group {{$errors->first('student_check', 'has-error') }}">
          <div class="col-sm-offset-3 col-sm-4">
            <div class="checkbox">
              <label>
                {{ Form::checkbox('player'.$i.'_student', '1') }}
                UWE student?
              </label>
            </div>
          </div>
        </div>
        <div class="form-group {{$errors->first('society_check', 'has-error') }}">
          <div class="col-sm-offset-3 col-sm-6">
            <div class="checkbox">
              <label>
                {{ Form::checkbox('player'.$i.'_society', '1') }}
                Paid Member of UWE Video Gaming Society?
              </label>
            </div>
          </div>
        </div>
        @endfor
        <div class="form-group">
          <div class="col-sm-offset-1 col-sm-10">
            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
          </div>
        </div>
        {{ Form::token() . Form::close() }}
      </div>
    </div>
  </div>
  
  <div class="tab-pane" id="teams">
    <div class="row">
      <div class="col-md-6">
        @if($teams == false)
        <h3>No Approved Teams</h3>
        @else
        <div class="panel-group" id="accordion">
          <?php $t=1; ?>				
          @foreach($teams as $id => $team)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#team<?php echo $t; ?>">
                  {{ $team['name'] }}
                </a>
              </h4>
            </div>
            <div id="team<?php echo $t; ?>" class="panel-collapse collapse @if($t == 0) in @endif">
              <div class="panel-body">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @for($i=1; $i <= $team['total_players']; $i++)
                    <tr>
                      <td>{{ $team['p'.$i.'_name'] }}</td>
                      <td><a href="euw.op.gg/summoner/userName={{ $team['p'.$i.'_summoner'] }}" target="_blank">{{ $team['p'.$i.'_summoner'] }}</a></td>
                      <td>{{ ucfirst($team['p'.$i.'_pos']) }}</td>
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
        @if($applied == false)
        <h3>No Unapproved Teams</h3>
        @else
        <h3>Unapproved Teams</h3>
        <div class="panel-group" id="accordion">
          <?php $t=1; ?>				
          @foreach($applied as $id => $team)
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#team<?php echo $t; ?>">
                  {{ $team['name'] }}
                </a>
              </h4>
            </div>
            <div id="team<?php echo $t; ?>" class="panel-collapse collapse @if($t == 0) in @endif">
              <div class="panel-body">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Username</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    @for($i=1; $i <= $team['total_players']; $i++)
                    <tr>
                      <td>{{ $team['p'.$i.'_name'] }}</td>
                      <td><a href="http://www.lolking.net/summoner/euw/{{ $team['p'.$i.'_summoner_id'] }}" target="_blank">{{ $team['p'.$i.'_summoner'] }}</a></td>
                      <td>{{ ucfirst($team['p'.$i.'_pos']) }}</td>
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
  
  <div class="tab-pane" id="edit">
    
  </div>
  
  <div class="tab-pane" id="fixtures">
    
  </div>
  
  <div class="tab-pane" id="standings">
    
  </div>
  
  <div class="tab-pane" id="looking">
    @if(Session::has('message-looking'))
    <div class="row clearfix">
      <div class="col-md-8">
        <div class="alert alert-{{ Session::get('status') }}">{{ Session::get('message-looking') }}</div>
      </div>
    </div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-info">
          <!-- Default panel contents -->
          <div class="panel-heading">Looking for a team?</div>
          <!-- List group -->
          <ul class="list-group">
            <li class="list-group-item">
              <p>If you are looking for a team, post your name, summoner name and position below.</p>
              <p>To contact other players, look them up on the UWE Gaming Society Facebook page or add them in-game.</p>
              <p>If the "Remove Myself" button does not appear and you wish to be removed, please contact an admin.</p>
            </li>
            <li class="list-group-item">
              {{ Form::open(array('url' => Request::url().'/searching/store', 'action' => 'post', 'class' => 'form-horizontal')) }}						
              <div class="form-group {{ $errors->first('searcher_name', 'has-error') }}">
                <label for="searcher_name" class="col-sm-4 control-label">Your Name</label>
                <div class="col-sm-4">
                  {{ Form::text('searcher_name', '', array('class' => 'form-control input input-sm')) }}
                  {{ $errors->first('searcher_name', '<span class="help-block">:message</span>') }}
                </div>
              </div>
              <div class="form-group {{ $errors->first('searcher_summoner', 'has-error') }}">
                <label for="searcher_summoner" class="col-sm-4 control-label">Your LoL Username</label>
                <div class="col-sm-4">
                  {{ Form::text('searcher_summoner', '', array('class' => 'form-control input input-sm')) }}
                  {{ $errors->first('searcher_summoner', '<span class="help-block">:message</span>') }}
                </div>
              </div>
              <div class="form-group {{ $errors->first('searcher_position', 'has-error') }}">
                <label for="searcher_position" class="col-sm-4 control-label">Position(s)</label>
                <div class="col-sm-4">
                  {{ Form::text('searcher_position', '', array('class' => 'form-control input input-sm')) }}
                  {{ $errors->first('searcher_position', '<span class="help-block">:message</span>') }}
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-1 col-sm-10">
                  {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
                </div>
              </div>
              {{ Form::token() . Form::close() }}
            </li>
            <li class="list-group-item">
              <table class="table table-condensed">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Position</th>
                    <th>Rank</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($searchers))
                  @foreach($searchers as $searcher)
                  <tr>
                    <td>{{ $searcher->name }}</td>
                    <td><a href="http://www.lolking.net/summoner/euw/{{ $searcher->summoner_id }}" target="_blank">{{ $searcher->summoner }}</a></td>
                    <td>{{ $searcher->position }}</td>
                    <td>{{ $searcher->rank }}
                    </tr>
                  @endforeach
                  @else
                  <h4>No one is currently looking for a team.</h4>
                  @endif
                </tbody>
              </table>
            </li>
            @if(Cookie::get('lookingforteam') !== null && Searcher::where('id', '=', Cookie::get('lookingforteam'))->count() > 0)
            <li class="list-group-item">         
              {{ HTML::link(Request::url().'/searching/'.Cookie::get('lookingforteam').'/destroy/'.(Cookie::get('lookingforteam')*371192), 'Remove Myself', array('class' => 'btn btn-danger')) }}
            </li>
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>