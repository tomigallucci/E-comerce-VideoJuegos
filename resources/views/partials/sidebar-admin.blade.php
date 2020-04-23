  <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link active" href="#">
                <span data-feather="home"></span>
                Dashboard <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route('admin.users')}}">
                <span><i class="fa fa-users"></i></span>
                Users
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route("admin.games")}}">
                <span><i class="fa fa-gamepad"></i></span>
                 Games
              </a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route('admin.merchandise')}}">
                <span><i class="fa fa-th-large"></i></span>
                Merchandise
              </a> 
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{Route('admin.trademarks')}}">
                <span><i class="fa fa-trademark"></i></span>
                Trademark
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ Route('admin.categories')}}">
                <span><i class="fa fa-th-list"></i></span>
                Category
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ Route('admin.languages')}}">
                <span><i class="fa fa-language"></i></span>
                Languages
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span><i class="fa fa-percent"></i></span>
                Offerdays
              </a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Saved reports</span>
            <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
              <span data-feather="plus-circle"></span>
            </a>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Current month
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Last quarter
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Social engagement
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="file-text"></span>
                Year-end sale
              </a>
            </li>
          </ul>
        </div>
      </nav>