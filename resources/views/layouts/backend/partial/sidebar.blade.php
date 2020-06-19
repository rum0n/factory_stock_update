<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index3.html" class="brand-link">
		<img src="{{ asset('assets/backend/img/1.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		     style="opacity: .8;height: 80px;width: 40px;">
		<span class="brand-text font-weight-light">M/s Akbor Enterprise</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<!-- <div class="image">
				<img src="{{ asset('assets/backend/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
			</div> -->
			<div class="info">
				<a class="d-block">Admin</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.pos.index') }}" class="nav-link {{ Request::is('admin/pos') ? 'active' : '' }}">
						<i class="nav-icon fa fa-dashboard"></i>
						<p>
							Point of Sales (POS)
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/employee*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/employee*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Employee
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.employee.create') }}" class="nav-link {{ Request::is('admin/employee/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Employee</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.employee.index') }}" class="nav-link {{ Request::is('admin/employee') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Employee</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/customer*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/customer*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Customer
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.customer.create') }}" class="nav-link {{ Request::is('admin/customer/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Customer</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.customer.index') }}" class="nav-link {{ Request::is('admin/customer') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Customer</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/supplier*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/supplier*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Supplier
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.supplier.create') }}" class="nav-link {{ Request::is('admin/supplier/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Supplier</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.supplier.index') }}" class="nav-link {{ Request::is('admin/supplier') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Supplier</p>
							</a>
						</li>
					</ul>
				</li>


				<li class="nav-item has-treeview {{ Request::is('admin/category*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/category*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Category
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.category.create') }}" class="nav-link {{ Request::is('admin/category/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Category</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.category.index') }}" class="nav-link {{ Request::is('admin/category') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Category</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/product*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/product*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Product
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.product.create') }}" class="nav-link {{ Request::is('admin/product/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Product</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.product.index') }}" class="nav-link {{ Request::is('admin/product') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Products</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item has-treeview {{ Request::is('admin/expense*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/expense*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Expense
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.expense.create') }}" class="nav-link {{ Request::is('admin/expense/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add Expense</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.today') }}" class="nav-link {{ Request::is('admin/expense-today') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Today Expense</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.month') }}" class="nav-link {{ Request::is('admin/expense-month*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Monthly Expense</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.yearly') }}" class="nav-link {{ Request::is('admin/expense-yearly*') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Yearly Expense</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.expense.index') }}" class="nav-link {{ Request::is('admin/expense') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Expense</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="{{ route('admin.profit') }}" class="nav-link {{ Request::is('admin/profit') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Profit
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="{{ route('admin.due') }}" class="nav-link {{ Request::is('admin/due') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Due
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.customer_due') }}" class="nav-link {{ Request::is('admin/due/customer') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Customer Due
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/order*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/order*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Order
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.order.pending') }}" class="nav-link {{ Request::is('admin/order/pending') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Pending Orders</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.order.approved') }}" class="nav-link {{ Request::is('admin/order/approved') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Approved Orders</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="{{ route('admin.road.index') }}" class="nav-link {{ Request::is('admin/road') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Roads
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/sr*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/sr*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							SR
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.sr.create') }}" class="nav-link {{ Request::is('admin/sr/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add SR</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.sr.index') }}" class="nav-link {{ Request::is('admin/sr') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All SR</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/dsr*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/dsr*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							DSR
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.dsr.create') }}" class="nav-link {{ Request::is('admin/dsr/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add DSR</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.dsr.index') }}" class="nav-link {{ Request::is('admin/dsr') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All DSR</p>
							</a>
						</li>
					</ul>
				</li>


				<li class="nav-item has-treeview {{ Request::is('admin/garden_stock*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/garden_stock*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Garden Stock
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.garden_stock.create') }}" class="nav-link {{ Request::is('admin/garden_stock/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add To Garden Stock</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.garden_stock.index') }}" class="nav-link {{ Request::is('admin/garden_stock') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Garden Stock</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.decreases') }}" class="nav-link {{ Request::is('admin/decreased/garden_stock') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Used Garden Stock</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview {{ Request::is('admin/fstock*') ? 'menu-open' : '' }}">
					<a href="#" class="nav-link {{ Request::is('admin/fstock*') ? 'active' : '' }}">
						<i class="nav-icon fa fa-pie-chart"></i>
						<p>
							Factory Stock
							<i class="right fa fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('admin.fstock.create') }}" class="nav-link {{ Request::is('admin/fstock/create') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>Add To Factory Stock</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('admin.fstock.index') }}" class="nav-link {{ Request::is('admin/fstock') ? 'active' : '' }}">
								<i class="fa fa-circle-o nav-icon"></i>
								<p>All Factory Stock</p>
							</a>
						</li>
					</ul>
				</li>

				

				<li class="nav-header">MENU</li>
				<li class="nav-item has-treeview">
					<a href="{{ route('admin.setting.index') }}" class="nav-link {{ Request::is('admin/setting') ? 'active' : '' }}">
						<i class="nav-icon fa fa-server"></i>
						<p>
							Setting
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('logout') }}"
					   onclick="event.preventDefault();
					   document.getElementById('logout-form').submit();">
						<i class="nav-icon fa fa-sign-out"></i> Logout
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>

			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>