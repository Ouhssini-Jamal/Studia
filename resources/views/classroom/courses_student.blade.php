<!DOCTYPE html>
<<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$classroom->name}} - studia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap.min.css')}}">
      <link rel="stylesheet" type="text/css" href="{{url('/css/bootstrap-grid.css')}}">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{url('/css/home.css')}} ">
      <!-- Javascript files-->
      <script src="{{url('/js/bootstrap.bundle.min.js')}}"></script>
      <!--google fonts-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
      <link rel="shortcut icon" href="/imgs/studia1.png"/>
  </head>
    <body class="view-body">
        @include('components.menu')
           <div> @include('components.sidebar1')</div>
<div class="container text-center ">
    <div class="class_title mx-auto text-center w-50"> <h1>Courses</h1></div>
                @if ($message = Session::get('success'))
                    <div class="alert text-center alert-success alert-block mt-3">
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
            <div class="alert alert-danger mt-3 text-center">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="d-flex desc mt-5 w-75 bg-white mx-auto justify-content-center">
            @if($courses->count()==0) <div class="mx-auto text-center">there is no course in this classroom</div>
        @else
        <table style="margin-top:50px">
        <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">FileName</th>
      <th scope="col">View</th>
      <th scope="col">Download</th>
    </tr>
  </thead>
  <tbody>
        @foreach($courses as $course)
            <tr>
            
                <td>
                    @if($course->ext === 'pdf') <img src="/imgs/pdf.png" style="width: 32px;height: 32px;"></img>
                    @elseif($course->ext === 'rar') <img src="/imgs/rar.png" style="width: 32px;height: 32px;"></img>
                    @elseif($course->ext === 'mp4') <img src="/imgs/mp4.png" style="width: 32px;height: 32px;"></img>
                    @elseif($course->ext === 'pptx') <img src="/imgs/pptx.png" style="width: 32px;height: 32px;"></img>
                    @elseif($course->ext === 'ppt') <img src="/imgs/ppt.png" style="width: 32px;height: 32px;"></img>
                    @elseif($course->ext === 'docx') <img src="/imgs/docx.png" style="width: 32px;height: 32px;"></img>
                    @elseif($course->ext === 'doc') <img src="/imgs/doc.png" style="width: 32px;height: 32px;"></img>
                    @else <img src="/imgs/file.png" style="width: 32px;height: 32px;"></img>
                    @endif
                </td>
                
                <td>{{$course->name}}</td>
                <td><a href="/courses/{{$course->name}}">view</a></td>
                <td><a href="{{route('download',['name' => $course->name])}}">download</a></td> 
            </tr>
        @endforeach
        </tbody>
        </table>
        @endif
        </div>
    </div>
</div>
<script type="text/javascript">

                function openNav() {
                    document.getElementById("mySidenav").style.width = "250px";
                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
                function submit_form() {
                    var z=confirm("do you really want to change your information ?");
                    if (z==true) {
                     document.forms['myform'].submit();
                }
                    else {
                    event.preventDefault();
                }
                }
                function submit_form1() {
                    var z=confirm("do you really want to delete this classroom ?");
                    if (z==true) {
                     document.forms['myform'].submit();
                }
                    else {
                    event.preventDefault();
                }
                }
                function submit_form3() {
                    var z=confirm("do you really want to withdraw from the classroom ?");
                    if (z==true) {
                     document.forms['myform'].submit();
                }
                    else {
                    event.preventDefault();
                }
                }
            </script>
</body>
</html>
