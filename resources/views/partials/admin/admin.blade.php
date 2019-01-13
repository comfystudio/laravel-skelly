@if ($paginator->hasPages())
    <div id="DataTables_Table_3_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row">
            <div class="col-sm-6">
                <div class="dataTables_info" id="DataTables_Table_3_info" role="status" aria-live="polite">Page <strong>{{$paginator->currentPage()}}</strong> of <strong>{{$paginator->total()}}</strong></div>
            </div>
            <div class="col-sm-6">
                <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_3_paginate">
                    <ul class="pagination">

                        @if ($paginator->onFirstPage())
                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_3_previous">
                                <a href="#" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" class="page-link">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                        @else
                            <li class="paginate_button page-item previous" id="DataTables_Table_3_previous">
                                <a href="{{ $paginator->previousPageUrl() }}" aria-controls="DataTables_Table_3" data-dt-idx="0" tabindex="0" class="page-link">
                                    <i class="fa fa-angle-left"></i>
                                </a>
                            </li>
                        @endif

                        @foreach ($elements as $element)
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    @if ($page == $paginator->currentPage())
                                        <li class="paginate_button page-item active">
                                            <a href="#" aria-controls="DataTables_Table_3" data-dt-idx="1" tabindex="0" class="page-link">{{ $page }}</a>
                                        </li>
                                    @else
                                        <li class="paginate_button page-item ">
                                            <a href="{{ $url }}" aria-controls="DataTables_Table_3" data-dt-idx="2" tabindex="0" class="page-link">{{ $page }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach

                        @if ($paginator->hasMorePages())
                            <li class="paginate_button page-item next" id="DataTables_Table_3_next">
                                <a href="{{ $paginator->nextPageUrl() }}" aria-controls="DataTables_Table_3" data-dt-idx="5" tabindex="0" class="page-link">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="paginate_button page-item next disabled" id="DataTables_Table_3_next">
                                <a href="#" aria-controls="DataTables_Table_3" data-dt-idx="5" tabindex="0" class="page-link">
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endif
