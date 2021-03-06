@extends('layouts.layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <br>
            <div class="row">
                <div class="col-md-12">
                    <br><br>
                    <form method="post"  action="/search">
                        {{csrf_field()}}

                        <div class="form-group">
                            <label for="exampleInputEmail1">اسم الشخص</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        </div>
                        <button type="submit" class="btn btn-primary">بحث</button>
                    </form>
                </div>
            </div>
            <br>
            @if(isset($data))
                @if(count($data)>0)
                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <table class="table table-dark mr-2">
                                <tr>
                                    <th>
                                        ت
                                    </th>
                                    <th>
                                        الاسم
                                    </th>
                                    <th>
                                        المبلغ الكلي
                                    </th>
                                    <th>
                                        التاريخ
                                    </th>
                                    <th>
                                        الواصل
                                    </th>
                                    <th>
                                        الباقي
                                    </th>
                                    <th>
                                        السلعة
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                @foreach($data as $row)
                                    <tr>
                                        <td>{{$row->id}}</td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->money}}</td>
                                        <td>{{$row->date}}</td>
                                        @if($row->arrived != null)
                                            <td>{{$row->arrived}}</td>
                                        @else
                                            <td>لايوجد</td>
                                        @endif
                                        <td>{{$row->left}}</td>
                                        <td>{{$row->product}}</td>
                                        <td><form method="post" action="{{"/delete/".$row->id}}">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                                <a href="{{'/edit/'.$row->id}}" class="btn btn-primary">تعديل</a>
                                                <button type="submit" class="btn btn-danger">حذف</button>
                                            </form> </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card border-danger mb-3" style="max-width: 18rem;">
                                <div class="card-body text-primary">
                                    <h5 class="card-title">لا توجد بيانات</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                    @endif

        </div>
    </div>
@endsection