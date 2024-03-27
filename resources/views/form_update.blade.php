<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <form action="{{route('update')}}" method="POST" enctype="multipart/form-data">

        @csrf
        <input type="hidden" value="{{$food->id}}" name="id">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" value="{{  $food->name }}" name="name">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="old_price">Old Price</label>
            <input type="text" class="form-control" id="old_price" name="old_price" value="{{  $food->old_price }}">
            @if ($errors->has('old_price'))
                <span class="text-danger">{{ $errors->first('old_price') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="new_price">New Price</label>
            <input type="text" class="form-control" id="new_price" name="new_price" value="{{  $food->new_price }}">
            @if ($errors->has('new_price'))
                <span class="text-danger">{{ $errors->first('new_price') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{  $food->description }}">
            @if ($errors->has('description'))
                <span class="text-danger">{{ $errors->first('description') }}</span>
            @endif
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control" id="category" name="category">
                <option value="hoa quả">Hoa quả</option>
                <option value="thực phẩm khô">Thực phẩm khô</option>
                <option value="rau hữu cơ">Rau hữu cơ</option>
            </select>
            @if ($errors->has('category'))
                <span class="text-danger">{{ $errors->first('category') }}</span>
            @endif
        </div>

        <div class="form-group">
            <label for="img">Image</label>
            <input type="file" class="form-control-file" id="main_img" name="img">
            @if ($errors->has('img'))
                <span class="text-danger">{{ $errors->first('img') }}</span>
            @endif
            <img src="" alt="">
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</body>
</html>
