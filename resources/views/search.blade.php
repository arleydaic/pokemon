<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pokemon</title>
</head>
<body>
    <div class="card">
        <div class="card-header text-center bg-dark text-white">
            <label for="title" >Search Pokemon</label>  
        </div>
        <div class="card-body">
            <form action="{{ route('searchindex')}}" method='POST'>
                @csrf            
                <label for="title">Name</label>
                <input type="text" name="name">
                <label for="title">URL</label>
                <input type="text" name="url">
                <button class="btn btn-dark">Send</button>
            </form>
        </div>
    </div>
</body>