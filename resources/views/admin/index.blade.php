@extends('app')

@section('content')
<div class="main-container">
	<header>
		<h3 class="inline"><span class="first-letter">A</span>DMIN</h3>
		<h3 class="inline"><span class="first-letter">D</span>ASHBAORD</h3>
		<div class="pull-right">
			<form action="/admin/user">
				<button type="submit" class="btn btn-success">User Management</button>
			</form>
		</div>
	</header><br/>
	<div class="row">

		<div class="col-md-12">
			<ul class="nav nav-tabs">
				<li class="active">
					<a data-toggle="tab" href="#userrequest"><h4><span class="first-letter">C</span>omic <span class="first-letter">P</span>ermission</h4></a>
				</li>
				<li>
					<a data-toggle="tab" href="#bookreport"><h4><span class="first-letter">C</span>ontent <span class="first-letter">R</span>eport</h4></a>
				</li>
				<li>
					<a data-toggle="tab" href="#commentreport"><h4><span class="first-letter">C</span>omment <span class="first-letter">R</span>eport</h4></a>
				</li>
				<li>
					<a data-toggle="tab" href="#reviewreport"><h4><span class="first-letter">R</span>eview <span class="first-letter">R</span>eport</h4></a>
				</li>

			</ul>
			<!-- Tab Content -->
			<div class="tab-content">
				<div id="userrequest" class="tab-pane fade in active">
					<!-- NOTIFICATIONS TABLE -->
					@include('admin.user.userRequest', ['users' => $users])
				</div>

				<div id="bookreport" class="tab-pane fade">
					<!-- SUBSCRIPTIONS TABLE -->
					@include('admin.bookReport', ['bookreports' => $bookreports])
				</div>

				<div id="commentreport" class="tab-pane fade">
					<!-- SUBSCRIPTIONS TABLE -->
					@include('admin.commentReport', ['commentreports' => $commentreports])
				</div>
				<div id="reviewreport" class="tab-pane fade">
					<!-- SUBSCRIPTIONS TABLE -->
					@include('admin.reviewReport', ['reviewreports' => $reviewreports])
				</div>

			</div>
		</div>
	</div>
</div>
@stop

<!-- UPLOAD AVATAR MODAL -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			{!! Form::open(array('url' => 'profile/image/', 'files' => true)) !!}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Upload Avatar</h4>
			</div>
			<div class="modal-body">
				{!! Form::label('image', 'Select Avatar', ['class'=>'h3']) !!}
				{!! Form::file('image', ['class'=>'content']) !!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default inline" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-success inline">Upload</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>