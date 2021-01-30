@extends('layouts.master')
@section('title')
Mes Enquetes
@stop
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Constantine</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/338</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
<div class="container">
    <div class="row">

    @if(session()->has('Add'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{ session()->get('Add') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria_hidden="true">&times;</span>
		</button>
	</div>
    @endif

    @if(session()->has('edit'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{ session()->get('edit') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria_hidden="true">&times;</span>
		</button>
	</div>
    @endif

    @if(session()->has('delete'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>{{ session()->get('delete') }}</strong>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria_hidden="true">&times;</span>
		</button>
	</div>
    @endif
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="text-center text-primary">Caisse Nationale Des Retraites Constantine</h4>
                    <a class="btn btn-primary float-right "data-target=".modal" data-toggle="modal"
                     href="#modaldemo8">Ajouter</a>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example" class="table table-success table-striped">
                <thead>
                    <tr>
                      <th>#</th>
                      <th>N_Pension</th>
                      <th>Nom</th>
                      <th>Demande</th>
                      <th>Reponse</th>
                      <th>Periode</th>
                      <th>Emp</th>
                      <th>obse</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i =0?>
                    @foreach ($enquetes as $x)
                    <?php $i++?>
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $x->n_pension }}</td>
                            <td>{{ $x->nom }}</td>
                            <td>{{ $x->demande }}</td>
                            <td>{{ $x->reponse }}</td>
                            <td>{{ $x->periode }}</td>
                            <td>{{ $x->emp }}</td>
                            <td>
                                <a href="{{ url('enquetesRapport') }}/{{ $x->id }}">{{ $x->obs }}</a>
                            </td>
                            <td>
                                <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-id="{{ $x->id }}"
                                    data-n_pension="{{ $x->n_pension }}" data-nom="{{ $x->nom }}" data-demande="{{ $x->demande }}"
                                    data-reponse="{{ $x->reponse }}" data-periode="{{ $x->periode }}" data-emp="{{ $x->emp }}"
                                    data-obs="{{ $x->obs }}" data-toggle="modal"
                                    href="#exampleModal2" title="modifier"><i class="las la-pen"></i></a>


                                <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-id="{{ $x->id }}"
                                    data-n_pension="{{ $x->n_pension }}" data-nom="{{ $x->nom }}" data-toggle="modal" href="#modaldemo7" title="suprimer">
                                    <i class="las la-trash"></a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modaldemo8">
        <div class="modal-dialog modal-lg">
            <div class= "modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Ajouter Assuré</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('enquetes.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="">N_Pension</label>
                            <input type="text" class="form-control" name="n_pension">
                        </div>
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Demande</label>
                                <input type="date" class="form-control" name="demande" value="date">
                            </div>
                            <div class="col">
                                <label for="">Reponse</label>
                                <input type="date" class="form-control" name="reponse" value="date">
                            </div>
                        </div>
                        <div class="row">
                                <div class="col">
                                    <label for="">Periode</label>
                                    <input type="text" class="form-control" name="periode">
                                </div>
                                <div class="col">
                                    <label for="">Employeur</label>
                                    <input type="text" class="form-control" name="emp">
                                </div>
                                <div class="col">
                                    <label for="">Observation</label>
                                    <input type="text" class="form-control" name="obs">
                                </div>
                        </div>
                            <div class="col-sm-12 col-md-12">
                                <h5 class="card-title">Piece jointe</h5>
                                <input type="file" name="pic" class="dropify" accept=".pdf,.jpg, .png, image/jpeg, image/png"
                                    data-height="70" />
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Sauvegarder</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Modifier</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="enquetes/update" method="POST">
                        {{method_field('patch')}}
						{{csrf_field()}}
                        <div class="form-group">
                            <input type="hidden" name="id" id="id" value="">
                            <label for="">N_Pension</label>
                            <input type="text" class="form-control" name="n_pension" id="n_pension">
                        </div>
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input type="text" class="form-control" name="nom" id="nom">
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Demande</label>
                                <input type="date" class="form-control" name="demande" id="demande" value="date">
                            </div>
                            <div class="col">
                                <label for="">Reponse</label>
                                <input type="date" class="form-control" name="reponse" id="reponse" value="date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="">Periode</label>
                                <input type="text" class="form-control" name="periode" id="periode">
                            </div>
                            <div class="col">
                                <label for="">Employeur</label>
                                <input type="text" class="form-control" name="emp" id="emp">
                            </div>
                            <div class="col">
                                <label for="">Observation</label>
                                <input type="text" class="form-control" name="obs" id="obs">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Modifier</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Nom</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="modaldemo7" tabindex="-1" >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Suprimer</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="enquetes/destroy" method="POST">
                        {{ method_field('delete') }}
                        {{ csrf_field() }}
                        <div class="form-group">
                            <p class="text-center text-danger"> Vous etes sure de la suprition</p>
                            <input type="hidden" name="id" id="id" value="">
                            <input type="text" class="form-control" name="n_pension" id="n_pension">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nom" id="nom">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Suprimer</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Nom</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>

<script>
	$('#exampleModal2').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var n_pension = button.data('n_pension')
		var nom = button.data('nom')
        var demande = button.data('demande')
        var reponse = button.data('reponse')
        var periode = button.data('periode')
        var emp = button.data('emp')
        var obs = button.data('obs')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #n_pension').val(n_pension);
		modal.find('.modal-body #nom').val(nom);
        modal.find('.modal-body #demande').val(demande);
        modal.find('.modal-body #reponse').val(reponse);
        modal.find('.modal-body #periode').val(periode);
        modal.find('.modal-body #emp').val(emp);
        modal.find('.modal-body #obs').val(obs);
	})
</script>
<script>
	$('#modaldemo7').on('show.bs.modal', function(event){
		var button = $(event.relatedTarget)
		var id = button.data('id')
		var n_pension = button.data('n_pension')
		var nom = button.data('nom')
		var modal = $(this)
		modal.find('.modal-body #id').val(id);
		modal.find('.modal-body #n_pension').val(n_pension);
		modal.find('.modal-body #nom').val(nom);
	})
</script>
@endsection
