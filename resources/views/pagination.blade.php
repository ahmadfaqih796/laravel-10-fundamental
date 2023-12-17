<!-- pagination.blade.php -->


@if ($paginator->lastPage() > 1)
<ul class="pagination">
   @php
   $searchParam = $search ? '&search=' . $search : '';
   @endphp

   @if ($paginator->currentPage() > 1)
   <li><a href="{{ $paginator->url(1) }}{{ $searchParam }}&perPage={{ $perPage }}">First</a></li>
   <li><a href="{{ $paginator->url($paginator->currentPage() - 1) }}{{ $searchParam }}&perPage={{ $perPage }}">Previous</a></li>
   @endif

   @for ($i = 1; $i <= $paginator->lastPage(); $i++)
      @if ($i >= $paginator->currentPage() - 2 && $i <= $paginator->currentPage() + 2)
         <li class="{{ ($i == $paginator->currentPage()) ? 'active' : '' }}">
            <a href="{{ $paginator->url($i) }}{{ $searchParam }}&perPage={{ $perPage }}">{{ $i }}</a>
         </li>
         @elseif (($i == $paginator->currentPage() - 3 && $i > 1) || ($i == $paginator->currentPage() + 3 && $i < $paginator->lastPage()))
            <li><span>...</span></li>
            @endif
            @endfor

            @if ($paginator->currentPage() < $paginator->lastPage())
               <li><a href="{{ $paginator->url($paginator->currentPage() + 1) }}{{ $searchParam }}&perPage={{ $perPage }}">Next</a></li>
               <li><a href="{{ $paginator->url($paginator->lastPage()) }}{{ $searchParam }}&perPage={{ $perPage }}">Last</a></li>
               @endif
</ul>
@endif