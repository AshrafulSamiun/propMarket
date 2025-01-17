@extends('layouts.appDashboard')
@section('title', 'Accounting || Cloud State')
@section('content')

 <style>
      .fakeimg {
          height: 200px;
          background: #aaa;
      }

     #doughnutChart {
        width       : 100%;
        height      : 600px;
        font-size   : 11px;
     }

     #world-tansaction{
      width: 100%;
      height: 500px;
    }   
  </style>
 <div class="row" id="app">

 		<router-view></router-view>
              <div class="col-md-9 col-sm-8" >
                <div class="card card-default widget wow fadeInDown animated " style=" animation-delay: 0.18s;">
                    
                  <div class="card-heading">
                    <div class="card-controls">
                      <select class="form-control form-control-sm d-none d-md-inline-block" style="width:130px; display:inline-block" placeholder="Month">
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option selected="">May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                      </select>
                      <select class="form-control form-control-sm d-none d-md-inline-block" style="width:130px; display:inline-block" placeholder="">
                        <option selected="">Line Chart</option>
                        <option>Candle Sticks</option>
                      </select>

                        <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
                        <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="card-title">Recent Movement</h3>
                  </div>
                  <div class="card-body">
                    <div id="chart-profit" style="height: 379px; padding: 0px; position: relative;"></div>
                  </div>
                
                </div>
              </div><!-- /.col-md-9 -->
          
              <div class="col-md-3 col-sm-4">                
                <div class="panel card-default widget wow fadeInDown animated" style="animation-delay: 0.38s;">
                  <div class="card-heading">
                    <div class="card-controls">
                      <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
                      <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
                    </div>
                    <h3 class="card-title">Browser Usage</h3>
                  </div>
                  <div class="card-body">
                    <div id="doughnutChart" class="margin-20" style="height: 300px; padding: 0px; position: relative;"></div>
                    <div class="chart-legend pull-right">
                      <div class="item">
                        <div class="color background-success"></div> Chrome
                      </div>
                      <div class="item">
                        <div class="color background-info"></div> Firefox
                      </div>
                      <div class="item">
                        <div class="color background-warning"></div> IE
                      </div>
                    </div>
                  </div>
                </div>             
              </div><!-- /.col-md-3 -->
  </div>
           

 <div class="row" >
  <div class="col-lg-4">
    <div class="panel card-default widget wow fadeInDown  animated" style="animation-delay: 0.71s;">
      <div class="card-heading">
        <div class="card-controls">
          <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
          <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
        </div>
        <h3 class="card-title">Resellers</h3>
      </div>
      <div class="card-body">
          <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th style="width:25%;">Company</th>
              <th class="text-right" style="width:25%;">Sales</th>
            </tr>
          </thead>
        </table>
        <div class="bx-wrapper" style="max-width: 100%;">
          <div class="bx-viewport" aria-live="polite" style="width: 100%; overflow: hidden; position: relative; height: 472px;">
            <ul class="resellers-slider list-unstyled" style="width: auto; position: relative; transition-duration: 0.5s; transform: translate3d(0px, -472px, 0px);">
              <li >
                  <table class="table">
                    <tbody>
                      <tr>
                        <td>Chang M. Santiago</td>
                        <td style="width:25%;">Cisco</td>
                        <td style="width:25%;" class="text-right">$ 135,000</td>
                      </tr>
                      <tr>
                        <td>Alan D. Hebert</td>
                        <td>IBM</td>
                        <td class="text-right">$ 92,000</td>
                      </tr>
                      <tr>
                        <td>Christopher M. Erwin</td>
                        <td>Capita</td>
                        <td class="text-right">$ 108,000</td>
                      </tr>
                      <tr>
                        <td>Jeremy B. Blevins</td>
                        <td>Oracle</td>
                        <td class="text-right">$ 125,000</td>
                      </tr>
                      <tr>
                        <td>Joseph C. Wong</td>
                        <td>Accenture</td>
                        <td class="text-right">$ 109,000</td>
                      </tr>
                      <tr>
                        <td>Ismael D. Chatman</td>
                        <td>Fujitsu</td>
                        <td class="text-right">$ 117,000</td>
                      </tr>
                      <tr>
                        <td>Daryl S. Boyd</td>
                        <td>EMC</td>
                        <td class="text-right">$ 86,000</td>
                      </tr>
                      <tr>
                        <td>Richard S. Crook</td>
                        <td>Capco</td>
                        <td class="text-right">$ 154,000</td>
                      </tr>
                    </tbody>
                  </table>
              </li>
              <li style="float: none; list-style: outside none none; position: relative; width: 317.283px;" aria-hidden="true">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Harvey C. Lerma</td>
                      <td style="width:25%;">Cisco</td>
                      <td style="width:25%;" class="text-right">$ 135,000</td>
                    </tr>
                    <tr>
                      <td>Martin C. Randall</td>
                      <td>Oracle</td>
                      <td class="text-right">$ 152,000</td>
                    </tr>
                    <tr>
                      <td>Eric G. Vann</td>
                      <td>IBM</td>
                      <td class="text-right">$ 94,000</td>
                    </tr>
                    <tr>
                      <td>Howard K. Haubrich</td>
                      <td>Capco</td>
                      <td class="text-right">$ 168,000</td>
                    </tr>
                    <tr>
                      <td>Carlos L. Johnson</td>
                      <td>EMC</td>
                      <td class="text-right">$ 82,000</td>
                    </tr>
                    <tr>
                      <td>Stacy R. Lester</td>
                      <td>Capita</td>
                      <td class="text-right">$ 110,000</td>
                    </tr>
                    <tr>
                      <td>Shaun M. Henry</td>
                      <td>Accenture</td>
                      <td class="text-right">$ 104,000</td>
                    </tr>
                    <tr>
                      <td>James B. Jimenez</td>
                      <td>Fujitsu</td>
                      <td class="text-right">$ 121,000</td>
                    </tr>
                  </tbody>
                </table>
              </li>
              <li style="float: none; list-style: outside none none; position: relative; width: 317.283px;" aria-hidden="false">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Chang M. Santiago</td>
                      <td style="width:25%;">Cisco</td>
                      <td style="width:25%;" class="text-right">$ 135,000</td>
                    </tr>
                    <tr>
                      <td>Alan D. Hebert</td>
                      <td>IBM</td>
                      <td class="text-right">$ 92,000</td>
                    </tr>
                    <tr>
                      <td>Christopher M. Erwin</td>
                      <td>Capita</td>
                      <td class="text-right">$ 108,000</td>
                    </tr>
                    <tr>
                      <td>Jeremy B. Blevins</td>
                      <td>Oracle</td>
                      <td class="text-right">$ 125,000</td>
                    </tr>
                    <tr>
                      <td>Joseph C. Wong</td>
                      <td>Accenture</td>
                      <td class="text-right">$ 109,000</td>
                    </tr>
                    <tr>
                      <td>Ismael D. Chatman</td>
                      <td>Fujitsu</td>
                      <td class="text-right">$ 117,000</td>
                    </tr>
                    <tr>
                      <td>Daryl S. Boyd</td>
                      <td>EMC</td>
                      <td class="text-right">$ 86,000</td>
                    </tr>
                    <tr>
                      <td>Richard S. Crook</td>
                      <td>Capco</td>
                      <td class="text-right">$ 154,000</td>
                    </tr>
                  </tbody>
                </table>
              </li>
             <li style="float: none; list-style: outside none none; position: relative; width: 317.283px;" class="bx-clone" aria-hidden="true">
                <table class="table">
                  <tbody>
                    <tr>
                      <td>Harvey C. Lerma</td>
                      <td style="width:25%;">Cisco</td>
                      <td style="width:25%;" class="text-right">$ 135,000</td>
                    </tr>
                    <tr>
                      <td>Martin C. Randall</td>
                      <td>Oracle</td>
                      <td class="text-right">$ 152,000</td>
                    </tr>
                    <tr>
                      <td>Eric G. Vann</td>
                      <td>IBM</td>
                      <td class="text-right">$ 94,000</td>
                    </tr>
                    <tr>
                      <td>Howard K. Haubrich</td>
                      <td>Capco</td>
                      <td class="text-right">$ 168,000</td>
                    </tr>
                    <tr>
                      <td>Carlos L. Johnson</td>
                      <td>EMC</td>
                      <td class="text-right">$ 82,000</td>
                    </tr>
                    <tr>
                      <td>Stacy R. Lester</td>
                      <td>Capita</td>
                      <td class="text-right">$ 110,000</td>
                    </tr>
                    <tr>
                      <td>Shaun M. Henry</td>
                      <td>Accenture</td>
                      <td class="text-right">$ 104,000</td>
                    </tr>
                    <tr>
                      <td>James B. Jimenez</td>
                      <td>Fujitsu</td>
                      <td class="text-right">$ 121,000</td>
                    </tr>
                  </tbody>
                </table>
              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div><!-- /.col-md-4 -->
   <div class="col-lg-8">
    <div class="panel card-default widget wow fadeInDown  animated" style="animation-delay: 0.59s;">
      <div class="card-heading">
        <div class="card-controls">
          <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
          <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
        </div>
        <h3 class="card-title">Worldwide Transactions</h3>
      </div>
     
       <div class="card-body">
          <div class="row">
            <div class="col-lg-8 col-md-7" id="world-tansaction">
             
            </div><!-- /.col-lg-8 -->
            <div class="col-lg-4 col-md-5">
              <table class="table">
                <thead>
                  <tr>
                    <th>Country</th>
                    <th class="text-right">Sales</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Brazil</td>
                    <td class="text-right">$ 123.00</td>
                  </tr>
                  <tr>
                    <td>United Kingdom</td>
                    <td class="text-right">$ 147.00</td>
                  </tr>
                  <tr>
                    <td>Germany</td>
                    <td class="text-right">$ 104.00</td>
                  </tr>
                  <tr>
                    <td>France</td>
                    <td class="text-right">$ 92.00</td>
                  </tr>
                  <tr>
                    <td>Saudi Arabia</td>
                    <td class="text-right">$ 48.00</td>
                  </tr>
                  <tr>
                    <td>China</td>
                    <td class="text-right">$ 231.00</td>
                  </tr>
                  <tr>
                    <td>India</td>
                    <td class="text-right">$ 172.00</td>
                  </tr>
                  <tr>
                    <td>Australia</td>
                    <td class="text-right">$ 143.00</td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col-lg-4 -->
          </div>
        </div>
    </div>
  </div><!-- /.col-lg-8 -->
</div>

           
 <div class="row" >
    <div class="col-lg-4">
      <div class="panel card-default widget wow fadeInDown  animated" style="animation-delay: 0.71s;">
        <div class="card-heading">
          <div class="card-controls">
            <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
            <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="card-title">Messages</h3>
        </div>
        <div class="card-body">
          <div class="media-items">
            <div class="media">
              <div class="media-left mr-1">
                <a href="#">
                  <img class="media-object img-circle" src="img/avatar-500x500.png" width="48" height="48">
                </a>
              </div>
              <div class="media-body mb-3">
                <p class="media-heading weight-regular mb-0">
                  Linda Miller
                  <span class="pull-right text-sm">5m ago</span>
                </p>
                <span class="text-sm text-muted">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, quam semper libero..</span>
              </div>
            </div>

            <div class="media">
              <div class="media-left mr-1">
                <a href="#">
                  <img class="media-object img-circle" src="img/avatar-500x500-2.png" width="48" height="48">
                </a>
              </div>
              <div class="media-body mb-3">
                <p class="media-heading weight-regular mb-0">
                  Kathie Burton
                  <span class="pull-right text-sm">15m ago</span>
                </p>
                <span class="text-sm text-muted">Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet..</span>
              </div>
            </div>

            <div class="media">
              <div class="media-left mr-1">
                <a href="#">
                  <img class="media-object img-circle" src="img/avatar-500x500.png" width="48" height="48">
                </a>
              </div>
              <div class="media-body mb-3">
                <p class="media-heading weight-regular mb-0">
                  Linda Miller
                  <span class="pull-right text-sm">2h ago</span>
                </p>
                <span class="text-sm text-muted">Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, quam semper libero..</span>
              </div>
            </div>

            <div class="media">
              <div class="media-left mr-1">
                <a href="#">
                  <img class="media-object img-circle" src="img/avatar-500x500-2.png" width="48" height="48">
                </a>
              </div>
              <div class="media-body mb-3">
                <p class="media-heading weight-regular mb-0">
                  Kathie Burton
                  <span class="pull-right text-sm">3h ago</span>
                </p>
                <span class="text-sm text-muted">Nam pretium turpis et arcu. Duis arcu tortor, suscipit eget, imperdiet nec, imperdiet..</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- /.col-md-4 -->
    <div class="col-md-4 col-lg-4">
      <div class="panel card-default widget widget-todo wow fadeInDown animated" style="animation-delay: 0.81s;">
        <div class="card-heading">
          <div class="card-controls">
            <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
            <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="card-title">Todo List</h3>
        </div>
        <div class="card-body">
          <div class="todo">
            <ul class="list-unstyled mb-2">
              <li class="todo-item">
                <i class="checkbox fa fa-square-o"></i> <span>Take out the trash</span>
              </li>
              <li class="todo-item done">
                <i class="checkbox fa fa-check-square"></i> <span>Buy milk</span>
              </li>
              <li class="todo-item">
                <i class="checkbox fa fa-square-o"></i> <span>Plan holiday <span class="badge badge-warning text-sm">Important</span></span>
              </li>
              <li class="todo-item done">
                <i class="checkbox fa fa-check-square"></i> <span>Create admin theme</span>
              </li>
              <li class="todo-item">
                <i class="checkbox fa fa-square-o"></i> <span>Buy a new printer</span>
              </li>
              <li class="todo-item">
                <i class="checkbox fa fa-square-o"></i> <span>Workout</span>
              </li>
              <li class="todo-item">
                <i class="checkbox fa fa-square-o"></i> <span>Pick up kids</span>
              </li>
              <li class="todo-item">
                <i class="checkbox fa fa-square-o"></i> <span>Buy Spark</span>
              </li>
              <li class="todo-item">
                <i class="checkbox fa fa-square-o"></i> <span>Configure Spark</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="panel card-default widget wow fadeInDown widget-calendar animated" style="animation-delay: 0.94s;">
        <div class="card-heading">
          <div class="card-controls">
            <a href="#" class="widget-minify"><i class="fa fa-chevron-up"></i></a>
            <a href="#" class="widget-close"><i class="fa fa-times"></i></a>
          </div>
          <h3 class="card-title">Calendar</h3>
        </div>
        <div class="card-body">
          <div class="calendar" id="zabuto_calendar_udn"><div class="zabuto_calendar" id="zabuto_calendar_udn"><table class="table"><tr class="calendar-month-header"><th><div class="calendar-month-navigation" id="zabuto_calendar_udn_nav-prev"><span><i class="ion ion-ios-arrow-left"></i></span></div></th><th colspan="5"><span>August 2018</span></th><th><div class="calendar-month-navigation" id="zabuto_calendar_udn_nav-next"><span><i class="ion ion-ios-arrow-right"></i></span></div></th></tr><tr class="calendar-dow-header"><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th><th>Sun</th></tr><tr class="calendar-dow"><td></td><td></td><td id="zabuto_calendar_udn_2018-08-01"><div id="zabuto_calendar_udn_2018-08-01_day" class="day">1</div></td><td id="zabuto_calendar_udn_2018-08-02"><div id="zabuto_calendar_udn_2018-08-02_day" class="day">2</div></td><td id="zabuto_calendar_udn_2018-08-03"><div id="zabuto_calendar_udn_2018-08-03_day" class="day">3</div></td><td id="zabuto_calendar_udn_2018-08-04"><div id="zabuto_calendar_udn_2018-08-04_day" class="day">4</div></td><td id="zabuto_calendar_udn_2018-08-05"><div id="zabuto_calendar_udn_2018-08-05_day" class="day">5</div></td></tr><tr class="calendar-dow"><td id="zabuto_calendar_udn_2018-08-06"><div id="zabuto_calendar_udn_2018-08-06_day" class="day">6</div></td><td id="zabuto_calendar_udn_2018-08-07"><div id="zabuto_calendar_udn_2018-08-07_day" class="day">7</div></td><td id="zabuto_calendar_udn_2018-08-08"><div id="zabuto_calendar_udn_2018-08-08_day" class="day">8</div></td><td id="zabuto_calendar_udn_2018-08-09"><div id="zabuto_calendar_udn_2018-08-09_day" class="day">9</div></td><td id="zabuto_calendar_udn_2018-08-10"><div id="zabuto_calendar_udn_2018-08-10_day" class="day">10</div></td><td id="zabuto_calendar_udn_2018-08-11"><div id="zabuto_calendar_udn_2018-08-11_day" class="day">11</div></td><td id="zabuto_calendar_udn_2018-08-12"><div id="zabuto_calendar_udn_2018-08-12_day" class="day">12</div></td></tr><tr class="calendar-dow"><td id="zabuto_calendar_udn_2018-08-13"><div id="zabuto_calendar_udn_2018-08-13_day" class="day">13</div></td><td id="zabuto_calendar_udn_2018-08-14"><div id="zabuto_calendar_udn_2018-08-14_day" class="day">14</div></td><td id="zabuto_calendar_udn_2018-08-15"><div id="zabuto_calendar_udn_2018-08-15_day" class="day">15</div></td><td id="zabuto_calendar_udn_2018-08-16"><div id="zabuto_calendar_udn_2018-08-16_day" class="day">16</div></td><td id="zabuto_calendar_udn_2018-08-17"><div id="zabuto_calendar_udn_2018-08-17_day" class="day">17</div></td><td id="zabuto_calendar_udn_2018-08-18"><div id="zabuto_calendar_udn_2018-08-18_day" class="day">18</div></td><td id="zabuto_calendar_udn_2018-08-19"><div id="zabuto_calendar_udn_2018-08-19_day" class="day">19</div></td></tr><tr class="calendar-dow"><td id="zabuto_calendar_udn_2018-08-20"><div id="zabuto_calendar_udn_2018-08-20_day" class="day">20</div></td><td id="zabuto_calendar_udn_2018-08-21"><div id="zabuto_calendar_udn_2018-08-21_day" class="day"><span class="badge badge-today">21</span></div></td><td id="zabuto_calendar_udn_2018-08-22"><div id="zabuto_calendar_udn_2018-08-22_day" class="day">22</div></td><td id="zabuto_calendar_udn_2018-08-23"><div id="zabuto_calendar_udn_2018-08-23_day" class="day">23</div></td><td id="zabuto_calendar_udn_2018-08-24"><div id="zabuto_calendar_udn_2018-08-24_day" class="day">24</div></td><td id="zabuto_calendar_udn_2018-08-25"><div id="zabuto_calendar_udn_2018-08-25_day" class="day">25</div></td><td id="zabuto_calendar_udn_2018-08-26"><div id="zabuto_calendar_udn_2018-08-26_day" class="day">26</div></td></tr><tr class="calendar-dow"><td id="zabuto_calendar_udn_2018-08-27"><div id="zabuto_calendar_udn_2018-08-27_day" class="day">27</div></td><td id="zabuto_calendar_udn_2018-08-28"><div id="zabuto_calendar_udn_2018-08-28_day" class="day">28</div></td><td id="zabuto_calendar_udn_2018-08-29"><div id="zabuto_calendar_udn_2018-08-29_day" class="day">29</div></td><td id="zabuto_calendar_udn_2018-08-30"><div id="zabuto_calendar_udn_2018-08-30_day" class="day">30</div></td><td id="zabuto_calendar_udn_2018-08-31"><div id="zabuto_calendar_udn_2018-08-31_day" class="day">31</div></td><td></td><td></td></tr></table><div class="legend" id="zabuto_calendar_udn_legend"></div></div></div>
        </div>
      </div>
    </div>
 </div>

 <script type="text/javascript" src="{{ asset('js/Chart/amcharts.js') }}"></script>
 
 
@endsection
