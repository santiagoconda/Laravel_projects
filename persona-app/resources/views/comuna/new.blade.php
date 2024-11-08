<x-app-layout>

  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Agregar comuna</title>
  </head>
  <body>

    <div class="container">
        <h1>Add comuna</h1>
        <form method="POST" action="{{route('comuna.store')}}">
        @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Code</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="idHelp" name="code"  >
                <div id="idHelp" class="form-text">comune code</div>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">comune</label>
                <input type="text" required class="form-control" id="name" name="name" aria-describedby="nameHelp" placeholder=" comuna name.">

            </div>


            <div class="mb-3">
                <label for="municipality" >Municipality :</label>
                <select class="form-selected" id="Municipality" name="code" required>
                <option selected disabled value=""> choose one...</option>
                @foreach ($municipios as $municipio)
                <option value="{{$municipio->muni_codi}}">{{$municipio->muni_nomb}}</option>
                @endforeach

                </select>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" >save</button>
                <a href="{{route('comuna.index')}}" class="btn btn-warning"> cancel</a>
            </div>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
  </body>
</x-app-layout>
