@extends('main')


@section('content')
<div class="main-panel">
          <div class="content-wrapper">

            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                  <i class="mdi mdi-home"></i>
                </span> Dashboard
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>


                </ul>
              </nav>
            </div>


			<div class="col-lg-12 stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Lista dos Produtos</h4>
                    <a href="{{ route('product.create') }}"><button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">Add Produtos</button></a>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> # </th>
                          <th> Price</th>
                          <th> Product_code</th>
                          <th> Description</th>
						              <th> Acção </th>
                        </tr>
                      </thead>
                      <tbody>
                      @if($product->count() > 0)
                          @foreach($product as $rs)

                        <tr>
                          <td>{{ $rs->title }}</td>
                          <td>{{ $rs->price }}</td>
                          <td>{{ $rs->product_code  }}</td>
                          <td>{{ $rs->description }}</td>
						  <!--  redireciona o botao editar e apagar para os repectivos ficheiros  -->
						  <td>
							<a class="btn btn-sm btn-info " href="{{route('product.edit', $rs->id)}}"> Editar </a> -
                              <form action="{{ route('product.destroy', $rs->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger m-0" type="submit" btn btn-danger>Delete</button>
                              </form>

                          </td>


                        </tr>
                          @endforeach
                      @endif

                   </tbody>
                    </table>
                  </div>
                </div>
              </div>

</div>

@endsection
