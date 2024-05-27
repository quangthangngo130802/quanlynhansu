@extends('LayoutAdmin.index')
@section('admin_content')
<style>
/* Định dạng nút Import Excel */
button[type="submit"] {
    padding: 10px 20px;
    background-color: #4CAF50; /* Màu nền */
    color: white; /* Màu chữ */
    border: none; /* Không viền */
    cursor: pointer; /* Con trỏ chuột */
    border-radius: 5px; /* Bo tròn góc */
}

/* Định dạng input file */
input[type="file"] {
    padding: 10px 20px;
    background-color: #008CBA; /* Màu nền */
    color: white; /* Màu chữ */
    border: none; /* Không viền */
    cursor: pointer; /* Con trỏ chuột */
    border-radius: 5px; /* Bo tròn góc */
    outline: none; /* Không viền bôi đen khi chọn */
}

/* Định dạng input file khi rê chuột vào */
input[type="file"]:hover {
    background-color: #45a049; /* Màu nền khi hover */
}
</style>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <form class="import" action="{{ route('admin.importhopdong.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <button type="submit">Import Excel</button>
                <input type="file" name="fileImport" accept=".xlsx">
            </form>
        </div>
    </div>
@endsection
