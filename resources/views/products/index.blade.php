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
<p>Page {{ $products->currentPage() }} of {{ $products->lastPage() }}.</p>
<form action="{{ route('products.index') }}" method="get">
   <label for="perPage">Items per page:</label>
   <select name="perPage" id="perPage" onchange="this.form.submit()">
      <option value="2" {{ $perPage == 2 ? 'selected' : '' }}>2</option>
      <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
      <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
   </select>
</form>

@include('pagination', ['paginator' => $products, 'perPage' => $perPage])
<!-- <div class="custom-pagination">
   <span>Page {{ $products->currentPage() }} of {{ $products->lastPage() }}.</span>
   <span>Show per page:</span>

   <a href="{{ $products->url(1) }}&perPage=5" class="{{ $perPage == 5 ? 'active' : '' }}">5</a>
   <a href="{{ $products->url(1) }}&perPage=10" class="{{ $perPage == 10 ? 'active' : '' }}">10</a>
   <a href="{{ $products->url(1) }}&perPage=25" class="{{ $perPage == 25 ? 'active' : '' }}">25</a>

   <span>Total items: {{ $products->total() }}</span>

   @if($products->lastPage() > 1)
   <ul class="pagination">
      @if($products->currentPage() > 1)
      <li><a href="{{ $products->url($products->currentPage() - 1) }}&perPage={{ $perPage }}">Previous</a></li>
      @endif

      @for($i = 1; $i <= $products->lastPage(); $i++)
         @if($i >= $products->currentPage() - 2 && $i <= $products->currentPage() + 2)
            <li class="{{ ($i == $products->currentPage()) ? 'active' : '' }}">
               <a href="{{ $products->url($i) }}&perPage={{ $perPage }}">{{ $i }}</a>
            </li>
            @elseif(($i == $products->currentPage() - 3 && $i > 1) || ($i == $products->currentPage() + 3 && $i < $products->lastPage()))
               <li><span>...</span></li>
               @endif
               @endfor

               @if($products->currentPage() < $products->lastPage())
                  <li><a href="{{ $products->url($products->currentPage() + 1) }}&perPage={{ $perPage }}">Next</a></li>
                  @endif
   </ul>
   @endif
</div> -->
<!-- {!! $products->links() !!} -->
<!-- {!! $products->appends(['perPage' => $perPage])->links() !!} -->
<!-- Custom pagination links -->


@endsection