<header  id="header">

    <nav class="thenav">
        <div class="logo">
            <img src="media/purplelogo.jpeg" alt="Company Logo" class="circle-logo">
            <h1>School Lunch Boxes</h1>
        </div>
        <input type="checkbox" id="toggle-menu" class="toggle-menu" />
        <label for="toggle-menu" class="hamburger">&#9776;</label>

        <div class="menu">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('home') }}#services">Services</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
                <li><a href="{{ route('pricing') }}">Pricing</a></li>
                <li><a href="{{ route('order') }}">Order</a></li>
                <li><a href="{{ route('home') }}#testimonials">Reviews</a></li>
                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                            @csrf
                        </form>
                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>
                @endauth
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>  
                @endguest
            </ul>
        </div>
    </nav>
</header>