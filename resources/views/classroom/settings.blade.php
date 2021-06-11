<!DOCTYPE html>
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
            @include('components.sidebar')
            <div class="container">
            <div class="class_title mx-auto text-center w-50 mb-5"> <h1>Settings</h1></div>
          <div class="d-flex justify-content-center" >
              <div class="desc w-75 bg-white">
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success text-center alert-block">
                            <strong>{{ $message }}</strong>
                    </div>
                    @endif
                    @if (count($errors) > 0)
                        <div class="alert alert-danger text-center">
                            <strong>Whoops!</strong> There were some problems with your input.
                                @foreach ($errors->all() as $error)
                                    <div>{{ $error }}</div>
                                @endforeach
                        </div>
                    @endif
                    <table class="table table-hover">
                        <tr>
                            <th>Name :</th>
                            <td>{{ $classroom->name}}</td>
                            <td><a data-bs-toggle="collapse" href="#collapse_edit1" aria-expanded="false" aria-controls="collapse_class"><img src="/imgs/edit.png"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="collapse text-center" id="collapse_edit1">
                                    <form action="{{ route('update.class.name',['id' => $classroom->id])}}" id="myform" method="post">
                                    @csrf
                                        <label for="name">New classroom Name :</label>
                                        <input type="text" class="mb-3" required id="name" name="name" value="{{$classroom->name}}" placeholder="enter your new first name" required/>
                                        <button type="" class="btn btn-primary btn-block" onclick =" submit_form();" >Update</button>           
                                    </form>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <th>Code :</th>
                            <td>{{ $classroom->code}}</td>
                            <td><a data-bs-toggle="collapse" href="#collapse_edit2" aria-expanded="false" aria-controls="collapse_class"><img src="/imgs/edit.png"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3" >
                                <div class="collapse text-center" id="collapse_edit2">
                                    <form action="{{ route('update.class.code',['id' => $classroom->id])}}" id="myform" method="post">
                                    @csrf
                                        <label for="code">New classroom code :</label>
                                        <input type="text" class="mb-3" id="code" name="code" value="{{$classroom->code}}" placeholder="enter your new code" />
                                        <button type="" class="btn btn-primary btn-block" onclick =" submit_form();" >Update</button>           
                                    </form>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <th>Description :</th>
                            <td>{{ $classroom->desc}}</td>
                            <td><a data-bs-toggle="collapse" href="#collapse_edit3" aria-expanded="false" aria-controls="collapse_class"><img src="/imgs/edit.png"></a></td>
                        </tr>
                        <tr>
                            <td colspan="3" >
                                <div class="collapse text-center" id="collapse_edit3">
                                    <form action="{{ route('update.class.desc',['id' => $classroom->id])}}" id="myform" method="post">
                                    @csrf
                                        <label for="code">New classroom description :</label>
                                        <textarea class="form-control mt-2 mb-2" style="height:250px;" placeholder="write the new classroom description" required name="desc">{{ $classroom->desc}}</textarea>                                      
                                        <button type="" class="btn btn-primary btn-block" onclick =" submit_form();" >Update</button>           
                                    </form>
                                </div>                  
                            </td>
                        </tr>
                        <tr>
                            <th>Delete classroom :</th>
                            <td></td>
                            <td><form action="{{ route('destroy1',['id' => $classroom->id])}}" id="myform" method="post">
                                    @csrf
                                    {{ method_field('DELETE') }} 
                                        <button type="" class="btn btn-primary btn-block" onclick =" submit_form1();" >delete</button>           
                                    </form>
                                </td>
                        </tr>
                    </table>
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
                    var z=confirm("do you really want to change your classroom information ?");
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
            </script>
    </body>
</html>