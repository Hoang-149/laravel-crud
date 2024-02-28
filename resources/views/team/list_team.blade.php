<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Team</title>
    <link rel="stylesheet" href="{{ asset('/styles.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('/script.js') }}"></script>
</head>

<body>
    <h3>Danh sách Team</h3>

    <div class="container">
        <div class="list-team">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã Team</th>
                        <th scope="col">Tên Team</th>
                        <th scope="col">Tên Bộ Phận</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                    <tr>
                        <td>{{ $team->team_id }}</td>
                        <td>{{ $team->team_name }}</td>
                        <td>{{ $team->department ? $team->department->department_name : 'N/A' }}</td>
                        <td>

                            <form action="{{ route('list-team.destroy',$team->team_id) }}" method="Post">
                                <a class="btn btn-edit" href="{{ route('list-team.edit',$team->team_id) }}">Sửa</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">Xóa</button>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-team">
            <form action="{{ route('list-team.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="">
                    <label for="">Mã Team</label>
                    <input type="text" name="team_id" id="" class="field-team" value="">
                </div>
                <div class="">
                    <label for="">Tên Team</label>
                    <input type="text" name="team_name" id="" class="field-team" value="">
                </div>
                <div class="">
                    <label for="">Bộ Phận</label>
                    <select name="department_id" id="">
                        @foreach ($departments as $department)
                            <option value="{{ $department->department_id }}">{{ $department->department_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="action">

                    <button type="submit" class="btn btn-add" name="btn-add">Thêm</button>
                </div>

                <div class="action-confirm">

                    <button type="submit" class="btn btn-confirm" name="btn-add">Xác nhận</button>
                    <button type="submit" class="btn btn-cancel" name="btn-cancel">Hủy</button>
                </div>


            </form>
        </div>
    </div>
</body>

</html>
