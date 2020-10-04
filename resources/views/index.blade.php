<!DOCTYPE html>
<html>
<head>
    
    <meta charset="utf-8">
    <title>Laravel Scout Search Tutorial</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">    
    </head>

   <body>
    <div class="container">
        <h1>Laravel Scout Search Tutorial</h1>
      <form method="GET" action="{{ url('index') }}">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search">
                </div>
                <div class="col-md-6">
                    <button class="btn btn-info">Search</button>
                </div>
            </div>
        </form>
   <br/>
      <table class="table table-bordered">
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
            
        </table>
   </div>
</body>
</html>