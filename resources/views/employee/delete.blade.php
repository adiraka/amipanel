@extends('template.index')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>Admin Page</h2>
            </div>
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Update Employee User Akun</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            @include('template.partials.alert')
                            @include('template.partials.formalert')
                            <form class="form-horizontal" action="" id="form_validation" method="post">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <p>Are you sure to delete this employee : {{$user->email}} ?</p> 
                                <button type="submit" class="btn btn-lg btn-danger m-t-15 waves-effect">DELETE</button>&nbsp;
                                <a href="{{route('viewEmployee')}}" class="btn btn-lg m-t-15 waves-effect">CANCEL</a>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('style')

    <link href="{{asset('css/bootstrap-select.css')}}" rel="stylesheet" />

@endpush

@push('scripts')

    <script src="{{asset('js/bootstrap-select.js')}}"></script>
    <script src="{{asset('js/jquery.validate.js')}}"></script>
    <script src="{{asset('js/form-validation.js')}}"></script>

@endpush
