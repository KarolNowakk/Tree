<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link href="css/app.css" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        <div>
            <ul id="root">
                @foreach($rootNodeChildren as $rootNodeChild)
                    <li>
                        <form method="POST" action="http://127.0.0.1:8000/node/{{ $rootNodeChild->id }}">
                            @method('delete')
                            @csrf 
                            <input type="submit" value="del">
                        </form>
                        <input type="checkbox" class="check-input" id="{{ $rootNodeChild->id }}"> 
                        <label {!! count($rootNodeChild->children) ? 'class="label-underneath"' : 'class="label-empty"' !!} for="{{ $rootNodeChild->id }}">
                            {{ $rootNodeChild->description }}
                            <span>{{ $rootNodeChild->id }}</spa1n>
                        </label>
                        
                        @if(count($rootNodeChild->children))
                            <ul id="node">
                                @include('nested_child', ['children' => $rootNodeChild->children])
                            </ul>
                        @endif  
                    </li>  
                @endforeach
            </ul>
        </div>


        {{-- <form method="post" action="http://127.0.0.1:8000/node/12">
            @csrf
            @method('put')
            <input type="number" name="value" required>
            <input type="text" name="description" required>
            <input type="number" name="parent_node" required>
            <input type="submit">
        </form> --}}
    </div>
        {{-- <form method="POST" action="http://127.0.0.1:8000/node/31">
            @csrf
            @method('delete')
            <input type="submit" value="delete">
        </form> --}}

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
