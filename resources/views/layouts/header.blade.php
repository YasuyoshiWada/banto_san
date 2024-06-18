
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <!--[1] Navigation Section-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('images/BANTO.jpg') }}" alt="Company Logo" width="150">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('items.index') }}"><i class="fi fi-sr-home" style="margin-right: 5px;"></i>HOME</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('item-view.index') }}"><i class="fi fi-sr-layout-fluid" style="margin-right: 5px;"></i>Item List</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('item-view.index') }}"><i class="fi fi-sr-layout-fluid" style="margin-right: 5px;"></i>Item Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('item.edit.index')}}"><i class="fi fi-sr-edit" style="margin-right: 5px;"></i>Edite item</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('category.itemcategories')}}"><i class="fi fi-sr-home" style="margin-right: 5px;"></i>Categories</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.index') }}"><i class="fi fi-sr-chart-histogram" style="margin-right: 5px;"></i>Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('userlist.index') }}"><i class="fi-sr-users-alt" style="margin-right: 5px;"></i>Casher register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('transaction.index') }}"><i class="fi fi-sr-ballot" style="margin-right: 5px;"></i>Transaction</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('inventory.index') }}"><i class="fi fi-sr-ballot" style="margin-right: 5px;"></i>Inventory</a>
              </li>
              <li class="nav-item" style="display: flex; align-items: center;">
                <i class="fi fi-sr-exit" style="margin-right: 2x;"></i>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   {{ __('Logout') }}
                </a>
            
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
            
            </ul>
          </div>
        </div>
    </nav>
</div>

</div>