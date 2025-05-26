<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Blog</title>
</head>
<body>
    <div class="container">
        <div class="mt-5">
            <h1 class="text-center">halaman blog</h1>
            <div class="table-responsive">
                <a href="{{ url('/blog/add') }}" class="btn btn-primary mb-3">Add New</a>
                @if (Session::has('message'))
                    <p class="alert alert-success">{{ Session::get('message') }}</p>                    
                @endif
                <form method="GET">
                    <div class="input-group mb-3">
                        <input type="text" name="title" class="form-control" aria-describedby="button-addon2" value="{{ $title }}">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <th>No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @if ($blogs->count()==0)
                            <tr>
                                <td colspan="4" class="text-center">No Data Found <strong>{{ $title }}</strong></td>
                            </tr>
                        @endif
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{ ($blogs ->currentpage()-1) * $blogs ->perpage() + $loop->index + 1 }}</td>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->description }}</td>
                                <td>edit</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $blogs->links() }}
            {{-- <ol>
                @foreach ($blogs as $blog)
                   <li>
                        {{ $blog->title }}
                    </li> 
            @endforeach
        </ol> --}}
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</html>