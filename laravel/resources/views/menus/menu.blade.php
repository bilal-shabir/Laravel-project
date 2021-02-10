<ul class="main-menu">
    @foreach($items as $menu_item)
    <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
@endforeach
{{--     
    <li><a href="#">Category 4
        <span class="new">New</span>
    </a></li>
    <li><a href="#">Category 5</a>
        <ul class="sub-menu">
            <li><a href="#">Option 1</a></li>
            <li><a href="#">Option 2</a></li>
            <li><a href="#">Option 3</a></li>
            <li><a href="#">Option 4</a></li>
            <li><a href="#">Option 5 </a></li> 
        </ul>
    </li>
    
     --}}
</ul>


