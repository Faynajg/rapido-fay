<form action="{{route('locale.set',$lang)}}" method="POST">
    @csrf
    <button type="submit" class="nav-link" style="background: transparent; border:none">
    <span class="flag-icon flag-icon-{{$country}}"></span>
</button>
</form>