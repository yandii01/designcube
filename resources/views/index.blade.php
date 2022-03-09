<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
      
    <title>Hello, world!</title>

    <style>
        
    </style>
  </head>
  <body>

  <div class="container">
    <div class="panel panel-default">
      <div class="panel-body">
            <div class="form-group">
                <label for="title">Select provinsi:</label>
                <select name="provinsi" class="form-control" style="width:350px">
                    <option value="">--- Select provinsi ---</option>
                    @foreach ($provinsi as $p)
                        <option value="{{ $p->name }}">{{ $p->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Select City:</label>
                <select name="city" class="form-control" style="width:350px">
        <option value="">---City ---</option>
      </select>
            </div>
            <div class="form-group">
                <label for="title">Select district:</label>
                <select name="district" class="form-control" style="width:350px">
        <option value="">---district ---</option>
      </select>
            </div>
            <div class="form-group">
                <label for="title">Select subdistrict:</label>
                <select name="subdistrict" class="form-control" style="width:350px">
        <option value="">---subdistrict ---</option>
      </select>
            </div>
      </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="provinsi"]').on('change', function() {
            var nama_provinsi = $(this).val();
            console.log(nama_provinsi);
            if(nama_provinsi) {
                $.ajax({
                    url: '/index/getkota/'+nama_provinsi,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
        $('select[name="city"]').on('change', function() {
            var nama_city = $(this).val();
            console.log(nama_city);
            if(nama_city) {
                $.ajax({
                    url: '/index/getkecamatan/'+nama_city,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="district"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="district"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="district"]').empty();
            }
        });
        $('select[name="district"]').on('change', function() {
            var nama_district = $(this).val();
            console.log(nama_district);
            if(nama_district) {
                $.ajax({
                    url: '/index/getdesa/'+nama_district,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        console.log(data);
                        $('select[name="subdistrict"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subdistrict"]').append('<option value="'+ value +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="subdistrict"]').empty();
            }
        });
    });
</script>

</div>
<br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
			<div class="subscribe-wrapper subscribe2-wrapper mb-15">
                <h5>Get the latest insight into property and infrastructure</h5>
				<div class="subscribe-form">
					<form action="{{url('index')}}" method="POST">
                        {{csrf_field()}}
						<input placeholder="Email..." type="email" id="email" name="email" style="width:350px">
						<button type="submit" class="btn btn-danger">Subscribe </button>
					</form>
				</div>
            </div>
		</div>
    </div>
</div>
                        @if(count($errors) > 0)
                            <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }} <br/>
                            @endforeach
                            </div>
                        @endif

            @if(session()->has('status'))
                @if (!session('hasError'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @elseif(session('hasError'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
            @endif

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>