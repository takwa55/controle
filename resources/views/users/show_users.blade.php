@extends('layouts.master')
@section('css')

@section('title')
   les utilisateurs
@stop
<!-- Internal Data table css -->

<link href="{{ URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
<link href="{{ URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{ URL::asset('assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
<div class="crad-header">
    <h2 class="text-center text-primary">Les droits des Utilisateurs</h2>
</div>
@endsection
@section('content')
<style>
  .datatable td{
    border: dotted 1px gray;
    padding: 3px;
  }
  .datatable th{
    padding: 10px;
    background-color: rgb(97, 97, 226);
    color: white;
  }
</style>
    <div class="row">
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
              <div class="card-header">

                    @can('Ajouter Utilisateur')
                    <a class="btn btn-primary btn-sm" href="{{ route('users.create') }}">Ajouter Utilisateur</a>
                    @endcan
                    
              </div>
                    <div class= "box-body">
                        <table style="width: 100%;border:dotted 1px gray;" border="1" id="datatable" class="datatable">
                            <thead>
                                <tr class="text-center">
                                <th style="width: 50px;">#</th>
                                <th style="width: 120px;">Nom Utilisateur</th>
                                <th style="width: 120px;">Email</th>
                                <th style="width: 120px;">Position</th>
                                <th style="width: 120px;">Qualité</th>
                                <th style="width: 120px;">Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $key => $user)
                                    <tr class="text-center">
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td class="text-center">
                                            @if ($user->Status == 'Active')
                                                <span class="label text-success">
                                                    <div class="dot-label bg-success ml-1"></div>{{ $user->Status }}
                                                </span>
                                            @else
                                                <span class="label text-danger">
                                                    <div class="dot-label bg-danger ml-1"></div>{{ $user->Status }}
                                                </span>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge badge-success">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            @can('Modifier Ut')
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info"
                                                title="Modifier Ut"><i class="las la-pen"></i></a>
                                            @endcan

                                            @can('Suprimer Ut')
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-user_id="{{ $user->id }}" data-username="{{ $user->name }}"
                                                data-toggle="modal" href="#modaldemo8" title="Suprimer Ut "><i
                                                class="las la-trash"></i></a>
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

             <!-- Modal effects -->
            <div class="modal" id="modaldemo8">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal-content-demo">
                        <div class="modal-header">
                            <h6 class="modal-title">Suprimer Utilisateur</h6><button aria-label="Close" class="close"
                                data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <form action="{{ route('users.destroy', 'test') }}" method="post">
                            {{ method_field('delete') }}
                            {{ csrf_field() }}
                            <div class="modal-body">
                                <p>Vous etes sur de suprimer</p><br>
                                <input type="hidden" name="user_id" id="user_id" value="">
                                <input class="form-control" name="username" id="username" type="text" readonly>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                                <button type="submit" class="btn btn-danger">Oui</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- row closed -->
@endsection
@section('js')

<!-- Internal Data tables -->
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
<!--Internal  Datatable js -->
<script src="{{ URL::asset('assets/js/table-data.js') }}"></script>
<!--Internal  Notify js -->
<script src="{{ URL::asset('assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/notify/js/notifit-custom.js') }}"></script>
<!-- Internal Modal js-->
<script src="{{ URL::asset('assets/js/modal.js') }}"></script>

<script>
    $('#modaldemo8').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var user_id = button.data('user_id')
        var username = button.data('username')
        var modal = $(this)
        modal.find('.modal-body #user_id').val(user_id);
        modal.find('.modal-body #username').val(username);
    })
</script>

@endsection
