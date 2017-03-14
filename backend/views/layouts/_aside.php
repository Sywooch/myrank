<?php
use yii\helpers\Url;
?>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
	<!-- Sidebar user panel -->
	<div class="user-panel">
	    <div class="pull-left image">
		<img src="/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
	    </div>
	    <div class="pull-left info">
		<p>Alexander Pierce</p>
		<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
	    </div>
	</div>
	<!-- search form -->
	<form action="#" method="get" class="sidebar-form">
	    <div class="input-group">
		<input type="text" name="q" class="form-control" placeholder="Search...">
		<span class="input-group-btn">
		    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
		    </button>
		</span>
	    </div>
	</form>
	<!-- /.search form -->
	<!-- sidebar menu: : style can be found in sidebar.less -->
	<ul class="sidebar-menu">
	    <li class="header">Меню</li>
	    <li class="active"><a href="<?= Url::toRoute(['site/index']) ?>"><i class="fa fa-circle-o text-red"></i> <span>Главная</span></a></li>
	    <li class="treeview">
		    <a href="#">
		        <i class="fa fa-dashboard"></i> <span>Пользователи</span>
		        <span class="pull-right-container">
			    <i class="fa fa-angle-left pull-right"></i>
		        </span>
		    </a>
		    <ul class="treeview-menu">
		        <li><a href="<?= Url::toRoute(['users/index']) ?>"><i class="fa fa-circle-o"></i> Управление</a></li>
		        <li><a href="<?= Url::toRoute(['profession/index']) ?>"><i class="fa fa-circle-o"></i> Направления</a></li>
		        <li><a href="<?= Url::toRoute(['marks/index']) ?>"><i class="fa fa-circle-o"></i> Самооценка</a></li>
		    </ul>
	    </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-newspaper-o"></i> <span>Новости</span>
                <span class="pull-right-container">
			    <i class="fa fa-angle-left pull-right"></i>
		        </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?= Url::toRoute(['article/index']) ?>"><i class="fa fa-circle-o"></i> Управление</a></li>
                <li><a href="<?= Url::toRoute(['article-category/index']) ?>"><i class="fa fa-circle-o"></i> Категории новостей</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-sticky-note-o"></i> <span>Статические страницы</span>
                <span class="pull-right-container">
			    <i class="fa fa-angle-left pull-right"></i>
		        </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?= Url::toRoute(['/help']) ?>"><i class="fa fa-circle-o"></i> Помощь</a></li>
                <li><a href="<?= Url::toRoute(['/feedback']) ?>"><i class="fa fa-circle-o"></i> Обратная связь</a></li>
                <li><a href="<?= Url::toRoute(['/legalinfo']) ?>"><i class="fa fa-circle-o"></i> Условия и защита</a></li>
                <li><a href="<?= Url::toRoute(['/aboutus']) ?>"><i class="fa fa-circle-o"></i> О нас</a></li>
                <li><a href="<?= Url::toRoute(['/contacts']) ?>"><i class="fa fa-circle-o"></i> Контакты</a></li>
            </ul>
        </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-laptop"></i>
		    <span>Для ТЫЖпрограмиста</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="<?= Url::toRoute(['migration/index']) ?>"><i class="fa fa-circle-o"></i> Миграции</a></li>
		</ul>
	    </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-building"></i>
                <span>Модели</span>
                <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="<?= Url::toRoute(['city/index']) ?>"><i class="fa fa-circle-o"></i> Города</a></li>
                <li><a href="<?= Url::toRoute(['country/index']) ?>"><i class="fa fa-circle-o"></i> Страны</a></li>
                <li><a href="<?= Url::toRoute(['region/index']) ?>"><i class="fa fa-circle-o"></i> Области</a></li>

                <li><a href="<?= Url::toRoute(['images/index']) ?>"><i class="fa fa-circle-o"></i> Изображения</a></li>
                <li><a href="<?= Url::toRoute(['logs/index']) ?>"><i class="fa fa-circle-o"></i> Журналы</a></li>

                <li><a href="<?= Url::toRoute(['access-category-rating/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (Доступ к категориям рейтинга)</a></li>
                <li><a href="<?= Url::toRoute(['access-category-view/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (Доступ к категориям просмотра))</a></li>


                <li><a href="<?= Url::toRoute(['marks2/index']) ?>"><i class="fa fa-circle-o"></i> Самооценка (тест)</a></li>
                <li><a href="<?= Url::toRoute(['profession2/index']) ?>"><i class="fa fa-circle-o"></i> Направления (тест)</a></li>
                <li><a href="<?= Url::toRoute(['testimonials2/index']) ?>"><i class="fa fa-circle-o"></i> Отзывы (тест)</a></li>
                <li><a href="<?= Url::toRoute(['users2/index']) ?>"><i class="fa fa-circle-o"></i> Пользователи (тест)</a></li>
                <li><a href="<?= Url::toRoute(['user3/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь</a></li>
                <li><a href="<?= Url::toRoute(['auth/index']) ?>"><i class="fa fa-circle-o"></i> Авторизация</a></li>
                <li><a href="<?= Url::toRoute(['usermarkrating/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (рейтинг самооценок)</a></li>
                <li><a href="<?= Url::toRoute(['usermarks/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (самооценки)</a></li>
                <li><a href="<?= Url::toRoute(['usertrustees/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (доверенный)</a></li>
                <li><a href="<?= Url::toRoute(['userclaim/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (жалоба)</a></li>
                <li><a href="<?= Url::toRoute(['userevent/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (событие)</a></li>
                <li><a href="<?= Url::toRoute(['userprofession/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (профессия)</a></li>
                <li><a href="<?= Url::toRoute(['profileviews/index']) ?>"><i class="fa fa-circle-o"></i> Пользователь (просмотры)</a></li>


            </ul>
        </li>
	    <!--li class="active treeview">
		<a href="#">
		    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li class="active"><a href="index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
		    <li><a href="index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
		</ul>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-files-o"></i>
		    <span>Layout Options</span>
		    <span class="pull-right-container">
			<span class="label label-primary pull-right">4</span>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
		    <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
		    <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
		    <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
		</ul>
	    </li>
	    <li>
		<a href="pages/widgets.html">
		    <i class="fa fa-th"></i> <span>Widgets</span>
		    <span class="pull-right-container">
			<small class="label pull-right bg-green">new</small>
		    </span>
		</a>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-pie-chart"></i>
		    <span>Charts</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
		    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
		    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
		    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
		</ul>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-laptop"></i>
		    <span>UI Elements</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
		    <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
		    <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
		    <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
		    <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
		    <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
		</ul>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-edit"></i> <span>Forms</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
		    <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
		    <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
		</ul>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-table"></i> <span>Tables</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
		    <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
		</ul>
	    </li>
	    <li>
		<a href="pages/calendar.html">
		    <i class="fa fa-calendar"></i> <span>Calendar</span>
		    <span class="pull-right-container">
			<small class="label pull-right bg-red">3</small>
			<small class="label pull-right bg-blue">17</small>
		    </span>
		</a>
	    </li>
	    <li>
		<a href="pages/mailbox/mailbox.html">
		    <i class="fa fa-envelope"></i> <span>Mailbox</span>
		    <span class="pull-right-container">
			<small class="label pull-right bg-yellow">12</small>
			<small class="label pull-right bg-green">16</small>
			<small class="label pull-right bg-red">5</small>
		    </span>
		</a>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-folder"></i> <span>Examples</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
		    <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
		    <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
		    <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
		    <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
		    <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
		    <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
		    <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
		    <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
		</ul>
	    </li>
	    <li class="treeview">
		<a href="#">
		    <i class="fa fa-share"></i> <span>Multilevel</span>
		    <span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
		    </span>
		</a>
		<ul class="treeview-menu">
		    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
		    <li>
			<a href="#"><i class="fa fa-circle-o"></i> Level One
			    <span class="pull-right-container">
				<i class="fa fa-angle-left pull-right"></i>
			    </span>
			</a>
			<ul class="treeview-menu">
			    <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
			    <li>
				<a href="#"><i class="fa fa-circle-o"></i> Level Two
				    <span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
				    </span>
				</a>
				<ul class="treeview-menu">
				    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
				    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
				</ul>
			    </li>
			</ul>
		    </li>
		    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
		</ul>
	    </li>
	    <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
	    <li class="header">LABELS</li>
	    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
	    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
	    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li -->
	</ul>
    </section>
    <!-- /.sidebar -->
</aside>