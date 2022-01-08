<h1>Associativo</h1>

@if (!empty($associativo1) && !empty($associativo2))

    <ul>
        <li>{{ $associativo1 }}</li>
        <li>{{ $associativo2 }}</li>
    </ul> 

@endif


<h2>Compact</h2>

@if (!empty($p1) && !empty($p2))

    <ul>
        <li>{{ $p1 }}</li>
        <li>{{ $p2 }}</li>
    </ul>
    
@endif

<h2>With</h2>

@if (!empty($with1 && !empty($with2) ))

    <ul>
        <li>{{ $with1 }}</li>
        <li>{{ $with2 }}</li>
    </ul>
    
@endif