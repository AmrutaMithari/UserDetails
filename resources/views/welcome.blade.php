<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>User Details</title>
</head>
<link rel="stylesheet" href="{{ asset('css/responsive-tables.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.default.css') }}" type="text/css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>

<div class="mainwrapper">
        <div class="pageheader">
            <form action="#" method="post" class="searchbar">
                <a class="btn btn-primary"  href="#addModal" data-toggle="modal">Add New User</a>
            </form>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="row-fluid">
                    	
						<h4 class="widgettitle">User Details</h4>
						<table id="dyntable" class="table table-bordered responsive" style="align: center; width: 100%">
							
							<thead>
								<tr>
									<th class="head0">Firstname</th>
									<th class="head0">Firstname</th>
									<th class="head0">Lastname</th>
									<th class="head0">Date of Birth</th>
									<th class="head0">City</th>
									<th class="head0">Mobile No.</th>
									<th class="head0">Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($posts as $key=>$post)
								<tr class="gradeX"> 
									<td>{{$post->fname}}</td>
									<td>{{$post->fname}}</td>
									<td>{{$post->lname}}</td>
									<td>{{$post->dob}}</td>
									<td>{{$post->city}}</td>
									<td>{{$post->mobileno}}</td>
									<td class="center">
									<a href="" data-toggle="modal" data-target="#{{$post->Id}}">Edit</a> 
									&nbsp; 
									<a href="" data-toggle="modal" data-target="#delete{{$post->Id}}">Delete</a></td>
								</tr>
								
							<!--#editModal-->	
							<div class="modal fade" id="{{$post->Id}}" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Edit User</h4>
									</div>
									<div class="modal-body">
										<form action="{{ URL::to('/update') }}" class="editprofileform" method="post">
										{{ csrf_field() }}
										<div class="widgetbox personal-information">
											<h4 class="widgettitle"></h4>
												<div class="widgetcontent">
													<p>
													<label>First Name</label>
													<input type="text" name="fname" value="{{$post->fname}}" class="input-xlarge" Placeholder="First Name" required />
													<input type="hidden" name="id" value="{{$post->Id}}" class="input-xlarge" Placeholder="First Name" required />
													</p>
													<p>
													<label>Last Name</label>
													<input type="text" name="lname" value="{{$post->lname}}" class="input-xlarge" Placeholder="Last Name" required/>
													</p>
													<p>
													<label>Date Of Birth</label>
													<input type="text" name="dob" value="{{$post->dob}}" class="input-xlarge" Placeholder="Date Of Birth" required/>
													</p>
													<p>
													<label>City</label>
													<input type="text" name="city" value="{{$post->city}}" class="input-xlarge" Placeholder="City" required />
													</p>
													<p>
													<label>Mobile No</label>
													<input type="text" name="mobile" value="{{$post->mobileno}}" class="input-xlarge" Placeholder="Mobile No" required  />
													</p>
												</div>
										</div>
											<p>
												<button type="submit" class="btn btn-primary">Submit</button>
											</p>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
								</div>
							</div>
							<!--#editModal-->					
							
							<!--#editModal-->	
							<div class="modal fade" id="delete{{$post->Id}}" role="dialog">
								<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h4 class="modal-title">Delete User</h4>
									</div>
									<div class="modal-body">
										<form action="{{ URL::to('/deleteuser') }}" class="editprofileform" method="post">
										{{ csrf_field() }}
										<div class="widgetbox personal-information">
											<h4 class="widgettitle"></h4>
												<div class="widgetcontent">
													<p>
													<label>Are you sure you want to delete the user named : {{$post->fname}}</label>
													<input type="hidden" name="id" value="{{$post->Id}}" class="input-xlarge" Placeholder="First Name" required />
													</p>
													
												</div>
										</div>
											<p>
												<button type="submit" class="btn btn-primary">Delete</button>
											</p>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</div>
								</div>
							</div>
							<!--#editModal-->												
								
								@endforeach
							</tbody>
						</table>                       
                </div><!--row-fluid-->
				<!--#myModal-->	
				<div class="modal fade" id="addModal" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">New User</h4>
						</div>
						<div class="modal-body">
							<form action="{{ URL::to('/save') }}" class="editprofileform" method="post">
							{{ csrf_field() }}
							<div class="widgetbox personal-information">
								<h4 class="widgettitle"></h4>
									<div class="widgetcontent">
										<p>
										<label>First Name</label>
										<input type="text" name="fname" class="input-xlarge" Placeholder="First Name" required />
										</p>
										<p>
										<label>Last Name</label>
										<input type="text" name="lname" class="input-xlarge" Placeholder="Last Name" required/>
										</p>
										<p>
										<label>Date Of Birth</label>
										<input type="text" name="dob" class="input-xlarge" Placeholder="Date Of Birth" required/>
										</p>
										<p>
										<label>City</label>
										<input type="text" name="city" class="input-xlarge" Placeholder="City" required />
										</p>
										<p>
										<label>Mobile No</label>
										<input type="text" name="mobile" class="input-xlarge" Placeholder="Mobile No" required  />
										</p>
									</div>
							</div>
								<p>
									<button type="submit" class="btn btn-primary">Submit</button>
								</p>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					</div>
				</div>
				<!--#myModal-->					
					
					
					
            </div><!--maincontentinner-->
        </div><!--maincontent-->   
</div><!--mainwrapper-->

</body>
</html>
