@if (Request::is('press_releases') || Request::is('press_rel'))
    <?php $projects = $releases ?>
@elseif (Request::is('news') || Request::is('novel'))
    <?php $projects = $novelties ?>
@elseif (Request::is('create_city'))
    <?php $projects = $locations ?>
@elseif (Request::is('emails'))
    <?php $projects = $emails ?>
@endif

@if ($projects->lastPage() > 1)
<div class="pagination">
	<ul>
        @if( $projects->currentPage() != 1 )
            <li><a href="{{ $projects->previousPageUrl() }}" class="nav">« Предыдущая</a></li>
        @endif
        @if( $projects->currentPage() > 2 && $projects->lastPage() > 3 )
        <li><a href="{{ $projects->url(1) }}">1</a></li>
        @endif
        @if( $projects->currentPage() > 3 && $projects->lastPage() > 4 )
        <li class="dots">...</li>
        @endif
        @for ($i = 1; $i <= $projects->lastPage(); $i++)
            <?php
            $half_total_links = floor(5 / 2);
            $from = $projects->currentPage() - $half_total_links;
            $to = $projects->currentPage() + $half_total_links;
            if ($projects->currentPage() < $half_total_links) {
               $to += $half_total_links - $projects->currentPage();
            }
            if ($projects->lastPage() - $projects->currentPage() < $half_total_links) {
                $from -= $half_total_links - ($projects->lastPage() - $projects->currentPage()) - 1;
            }
            ?>
            @if ($from < $i && $i < $to)
                <li >
                    <a href="{{ $projects->url($i) }}" class="{{ ($projects->currentPage() == $i) ? ' active' : '' }}">{{ $i }}</a>
                </li>
            @endif
        @endfor
        @if( $projects->currentPage() < $projects->lastPage() - 2 && $projects->lastPage() > 4 )
        	<li class="dots">...</li> 
        @endif
        @if( $projects->currentPage() < $projects->lastPage() - 1 && $projects->lastPage() > 3 )
        	<li><a href="{{ $projects->url($projects->lastPage()) }}">{{ $projects->lastPage() }}</a></li>  
        @endif
        @if( $projects->currentPage() != $projects->lastPage() )
            <li><a href="{{ $projects->nextPageUrl() }}" class="nav">Следующая »</a></li>   
        @endif
	</ul>
</div>
@endif