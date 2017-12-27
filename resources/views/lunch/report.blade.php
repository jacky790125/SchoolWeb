@extends('layouts.master')

@section('page-title', '午餐系統')

@section('content')
    <div class="page-header">
        <h1><img src="{{ asset('/img/lunch/report.png') }}" alt="學生退餐" width="50">報表輸出</h1>
    </div>
    <ul class="nav nav-tabs">
        <li><a href="{{ route('lunch.index') }}">1.教職員訂餐</a></li>
        <li><a href="{{ route('lunch.stu') }}">2.學生訂餐</a></li>
        <li><a href="{{ route('lunch.stu_cancel') }}">3.學生退餐</a></li>
        <li><a href="">4.供餐確認表</a></li>
        <li><a href="">5.滿意度調查</a></li>
        <li><a href="{{ route('lunch.special') }}">6.特殊處理</a></li>
        <li class="active"><a href="{{ route('lunch.report') }}">7.報表輸出</a></li>
        <li><a href="{{ route('lunch.setup') }}">8.系統管理</a></li>
    </ul>
    <div class="row">
        <div class="col-md-12">
            <div class="well">
                {{ Form::open(['route' => 'lunch.report', 'method' => 'POST']) }}
                請先選擇學期：{{ Form::select('semester', $semesters, $semester, ['id' => 'semester', 'class' => 'form-control', 'placeholder' => '請先選擇學期','onchange'=>'if(this.value != 0) { this.form.submit(); }']) }}
                {{ Form::close() }}
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>教職相關</h4>
                </div>
                <div class="panel-content">
                    {{ Form::open(['route'=>'lunch.report_tea1','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">教職逐日訂餐表</button>
                    {{ Form::close() }}

                    {{ Form::open(['route'=>'lunch.report_tea2','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">教職學期收費表</button>
                    {{ Form::close() }}
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>學生相關</h4>
                </div>
                <div class="panel-content">
                    {{ Form::open(['route'=>'lunch.report_stu1','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">學生身份統計表</button>
                    {{ Form::close() }}

                    {{ Form::open(['route'=>'lunch.report_stu2','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">學生訂餐統計表</button>(依身份)
                    {{ Form::close() }}

                    {{ Form::open(['route'=>'lunch.report_stu3','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">學生退費統計表</button>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>給出納</h4>
                </div>
                <div class="panel-content">
                    {{ Form::open(['route'=>'lunch.report_stu3','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">學生退費印領清冊</button>
                    {{ Form::close() }}

                    {{ Form::open(['route'=>'lunch.report_stu3','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">學生退費轉帳資料</button>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>給主計</h4>
                </div>
                <div class="panel-content">

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>給廠商</h4>
                </div>
                <div class="panel-content">
                    {{ Form::open(['route'=>'lunch.report_fac','method'=>'POST','target'=>'_blank']) }}
                    <input type="hidden" name="semester" value="{{ $semester }}">
                    <button class="btn btn-success">學生訂餐統計表</button>(依葷素)
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@include('layouts.partials.bootbox')