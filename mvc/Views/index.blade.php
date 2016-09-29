<center><h1>Marvision Framework</h1></center> 
<br>
<p> 
      @foreach($data as $item)
      <li>{{ $item->getId() }} - {{ $item->getName() }}</li> 
      @endforeach 
</p>