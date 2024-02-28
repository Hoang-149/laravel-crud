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
        <div class="form-team">
            <form action="{{ route('list-team.update', $create_team_tb->team_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="">
                    <label for="">Mã Team</label>
                    <input type="text" name="team_id" id="" class="field-team" value="{{ $create_team_tb->team_id }}">
                </div>
                <div class="">
                    <label for="">Tên Team</label>
                    <input type="text" name="team_name" id="" class="field-team" value="{{ $create_team_tb->team_name }}">
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

                    <button type="submit" class="btn btn-confirm" name="btn-add">Cập nhật</button>
                    <button type="submit" class="btn btn-cancel" name="btn-cancel">Hủy</button>
                </div>


            </form>
        </div>
    </div>
</body>

</html>
