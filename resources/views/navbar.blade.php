<nav class="navbar navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/posts">
      Vivify Blog
    </a>
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="/posts">All posts</a>
      </li>
      @if (!auth()->check())
        <li class="nav-item">
          <a class="nav-link" href="/login">Sign in</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Sign up</a>
        </li>
      @endif
      @if (auth()->check())
        <li class="nav-item">
          <a class="nav-link" href="/posts/create">Create post</a>
        </li>
        <li class="nav-item">
          <strong> Username: {{ auth()->user()->name }} </strong>
        </li>
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-primary">Log out</button>
          </form>
        </li>
      @endif
    </ul>
  </div>
</nav>
<style>
  .navbar-nav {
    flex-direction: row !important;
    align-items: center;
  }
  .nav-item {
    display: flex;
    align-items: center;
    margin-left: 15px;
    text-transform: capitalize;
  }
</style>