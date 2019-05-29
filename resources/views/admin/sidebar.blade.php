<ul class="sidebar">
    <li><a href="/admin/{{Auth::user()->id}}">Dashboard</a></li>
    <li><a href="/admin/{{Auth::user()->id}}?page=user">User Manager</a></li>
    <li><a href="/admin/{{Auth::user()->id}}?page=product">Product Manager</a></li>
    <li><a href="/admin/{{Auth::user()->id}}?page=order">Order Manager</a></li>
    <li><a href="/admin/{{Auth::user()->id}}?page=cagetory">Category Manager</a></li>
</ul>
