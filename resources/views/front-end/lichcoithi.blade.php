@extends('front-end.layout.layout_admin')
@section('titleAdmin', 'Lịch coi thi')
@section('content-admin')
{{--  Phần minh họa thời khóa biểu khi thêm lớp học phần  --}}

<table class="table table-striped table-class relative" id="table-id">
    <p class="relative">
        {{-- {{ dd($giangvien); }} --}}

        {{-- {{ dd($lichthi); }} --}}
    </p>
    <tr>
        <th class="row_head">STT</th>
        <th class="row_head">Mã môn</th>
        <th class="row_head">Tên môn thi</th>
        <th class="row_head">Bộ môn</th>
        <th class="row_head">Ca thi</th>
        <th class="row_head">Giờ bắt đầu</th>
        <th class="row_head">Giờ kết thúc</th>
        <th class="row_head">Phòng thi</th>
        <th class="row_head">Ngày thi</th>
        <th class="row_head">Cán bộ coi thi 1</th>
        <th class="row_head">Cán bộ coi thi 2</th>
    </tr>

    @if (count($lichthi) > 0)
        @for ($i = 0; $i < count($lichthi); $i++)
        <tr>
            <td>{{ $i+1 }}</td>
            <td>{{ $lichthi[$i]->idmonthi }}</td>
            <td>{{ $lichthi[$i]->tenmonthi }}</td>
            <td>{{ $lichthi[$i]->idbomon }}</td>
            <td>{{ $lichthi[$i]->idca }}</td>
            <td>{{ $lichthi[$i]->giobatdau }}</td>
            <td>{{ $lichthi[$i]->gioketthuc }}</td>
            <td>{{ $lichthi[$i]->idphongthi }}</td>
            <td>{{ $lichthi[$i]->ngaythi }}</td>
            <td>{{ $lichthi[$i]->tengiangvien1 }}</td>
            <td>{{ $lichthi[$i]->tengiangvien2 }}</td>
        </tr>
        @endfor
    @endif
        {{-- echo "<tr><td colspan='10' style='text-align:center'>Chưa có nhân viên nào</td></tr>"; --}}
</table>
@endsection
