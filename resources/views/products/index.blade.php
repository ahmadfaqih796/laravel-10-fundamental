@extends('products.layout')

@section('content')
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2>How To Create CRUD Operation In Laravel 10</h2>
      </div>
      <div class="pull-right">
         <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
      </div>
   </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
   <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
   <tr>
      <th>No</th>
      <th>Name</th>
      <th>Details</th>
      <th width="280px">Action</th>
   </tr>
   @foreach ($products as $product)
   <tr>
      <td>{{ ++$i }}</td>
      <td>{{ $product->name }}</td>
      <td>{{ $product->detail }}</td>
      <td>
         <form action="{{ route('products.destroy',$product->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
         </form>
      </td>
   </tr>
   @endforeach
</table>

<form action="{{ route('products.index') }}" method="get">
   <label for="perPage">Items per page:</label>
   <select name="perPage" id="perPage" onchange="this.form.submit()">
      <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
      <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
      <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
   </select>
</form>

<!-- {!! $products->links() !!} -->
{!! $products->appends(['perPage' => $perPage])->links() !!}

@endsection