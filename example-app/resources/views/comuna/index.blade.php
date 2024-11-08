<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Comuna</title>
</head>

<body>
    <h1>Listado de comunas</h1>
    <div class="container">
        <a href="{{ route('comunas.create')  }}" class="btn btn-primary">Crear Comuna</a>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Comune</th>
                    <th scope="col">Municipality</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($comunas as $comuna)
                <tr>
                    <th scope="row">{{  $comuna->comu_codi }}</th>
                    <th >{{  $comuna->comu_nomb }}</th>
                    <th >{{  $comuna->muni_nomb }}</th>
                    
                        <td>
                            
                        <a href="{{ route('comunas.edit', ['comuna' =>  $comuna->comu_codi]) }}"
                            class="btn btn-info">Edit</a>

                        </td>
                        <td>
                            <form action="{{ route('comunas.destroy', ['comuna' =>  $comuna->comu_codi]) }}"

                                method="POST" style="display: inline-bock">
                                @method('delete')
                                @csrf
                                <input class="btn btn-outline-danger" type="submit" value="Delete">
    
                        </form>

                        </td>
                  

              
                    
                </tr>
                @endforeach
            </tbody>
        </table>

</body>
</div>

</html>