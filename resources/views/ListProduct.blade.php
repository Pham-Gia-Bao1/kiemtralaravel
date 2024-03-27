<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        .alert{
            margin-top: 100px;
            position: fixed;
            right: 0;
        }
   /* CSS cho form tìm kiếm */
.form_search {
    display: flex;
    justify-content: center;
    margin-bottom: 20px; /* Khoảng cách dưới của form */
}

.search {
    width: 300px; /* Độ rộng của input */
    padding: 10px; /* Khoảng cách bên trong input */
    border: 1px solid #ccc; /* Viền input */
    border-radius: 5px; /* Bo góc của input */
    outline: none; /* Loại bỏ đường viền khi focus */
}

.btn_search {
    padding: 10px 20px; /* Kích thước nút */
    margin-left: 10px; /* Khoảng cách bên trái của nút so với input */
    border: none; /* Loại bỏ viền nút */
    border-radius: 5px; /* Bo góc của nút */
    background-color: #007bff; /* Màu nền của nút */
    color: #fff; /* Màu chữ của nút */
    cursor: pointer; /* Hiển thị con trỏ khi rê chuột vào nút */
    transition: background-color 0.3s; /* Hiệu ứng chuyển đổi màu nền */
}

.btn_search:hover {
    background-color: #0056b3; /* Màu nền của nút khi hover */
}

/* CSS cho khu vực bao của form */
.container {
    max-width: 600px; /* Độ rộng tối đa của container */
    margin: auto; /* Căn giữa container */
}


    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container">

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <script>
            setTimeout(function(){
                document.querySelector('.alert').style.display = 'none';
            }, 3000)
        </script>

        <button style="width: 10%; border-radius:20px;padding:5px; margin-top:100px;border:none;color:white" class="bg-success">
            <a href="admin/add" style="text-decoration: none;color:white">add</a>
        </button>
        <h2 style="color:red; text-align:center">List Products</h2>
        <div>
            <form class="form_search" >
                <input type="text" name="search" class="search">
                <button type="submit" class="btn_search btn btn-primary">Seaarch</button>
            </form>
        </div>
       <div class="create">
       </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">image</th>
                        <th scope="col">decription</th>
                        <th scope="col">Name</th>
                        <th scope="col">Old Price</th>

                        <th scope="col">New Price</th>
                        <th scope="col">Function</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td> <a name="" id="" class="btn btn-primary" href="#"
                                    role="button">{{ $product->id }}</a></td>
                            <td><img src="assets/img/{{$product->main_img}}" class="img-fluid" style="width: 50px"
                                    alt="Hình ảnh"></td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->old_price }}</td>
                            <td>{{ $product->new_price }}</td>
                            {{-- <td>{{ $product->mf->name }}</td> --}}
                            <td>
                                <a name="" id="" class="btn btn-primary"
                                    href="detail?id={{$product->id}}" role="button">view</a>
                            </td>
                            <td>
                                <a name="" id="" class="btn btn-info"
                                href="admin/update?id={{$product->id}}"  role="button">update</a>
                            </td> <td>
                                <a name="" id="" class="btn btn-danger"
                                    href="admin/delete?id={{$product->id}}" role="button">delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6Thiếu phần tiếp theo của mã HTML do giới hạn kích thước đầu vào. Dưới đây là phần tiếp theo của mã HTML:

```html
jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>

</html>
