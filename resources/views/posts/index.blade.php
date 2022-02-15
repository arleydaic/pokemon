<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="card text-center bg-dark text-white">
        <h1>Pokemon List</h1>
    </div>
    <div class="card">    
        <?php $result = json_decode($posts);  $data = $result->results; $i=1;?>
            @foreach ($data as $post)
                <div class="card-header">
                    <div class="card-body">
                    {{$post->name}}
                    </div>
                </div>
                @if ($i >= 100)
                    @break
                @endif     
                <?php $i++; ?>
            @endforeach
    </div>
</body>
</html>