@include('layout.topMenu')
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <br>
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav" >
                <li>
                    <a href="{{url('home')}}">Customer</a>
                </li>
                <li>
                    <a href="{{url('product')}}">Product</a>
                </li>
                <li>
                    <a href="{{url('setting')}}">Setting</a>
                </li>
                <li>
                        <a href="{{url('user/logout')}}">Logout</a>
                </li>
                <li>
                    <a href="{{url('goWebsite')}}">Go To Website</a>
                </li>
            </ul>
        </div>