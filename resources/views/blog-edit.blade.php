<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Show Detail</title>
</head>
<body>
    <div class="container">
        <div class="my-5">
            <h2 class="text-center">{{ $blog->title }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/blog/'.$blog->id.'/update') }}" method="POST">@csrf @method('PATCH')
                <div class="col-md-6">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $blog->title }}">
                </div>
                <div class="col-md-6 mt-3">
                    <label for="description" class="form-label">description</label>
                    <textarea name="description" class="form-control" name="description" id="description" rows="5">{{ $blog->description }}</textarea>
                </div>
                <div class="col-md-6 mt-3">
                    <button class="btn btn-success form-control">Save</button>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</html>