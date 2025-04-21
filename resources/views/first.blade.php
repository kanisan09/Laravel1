<h1>hello {{$name}}</h1>

@foreach ($products as $product)
<p>{{$product -> name}} {{$product -> price}}</p>
@endforeach
