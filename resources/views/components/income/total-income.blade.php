   <div class="scr-registration-section">
       <div class="containers p-0">
           <div class="csr-registration-main-heading">
               <p>Total Income</p>
           </div>
           <form class="scr-registration-form">
               <div class="scr-registration-row">
                   <div class="scr-form-group ">
                       <div class="scr-form-group-main">
                           <div class="scr-form-group-icon">
                               <i class="fa-solid fa-calendar-day"></i>
                           </div>
                           <div class="scr-form-group-content">
                               <p>Total Expanse</p>
                               <span>₹ 405002.00</span>
                               <p>Last 6 month expanse</p>
                           </div>
                       </div>
                   </div>
                   <div class="scr-form-group ">
                       <div class="scr-form-group-main ">
                           <div class="scr-form-group-icon scr-form-group-icon2">
                               <i class="fa-solid fa-hand-holding-heart"></i>
                           </div>
                           <div class="scr-form-group-content">
                               <p>Today's Expanse </p>
                               <span>₹ 0</span>
                               <p>Today expanse</p>
                           </div>
                       </div>
                   </div>
                   <div class="scr-form-group ">
                       <div class="scr-form-group-main">
                           <div class="scr-form-group-icon scr-form-group-icon3">
                               <i class="fa-solid fa-calendar-plus"></i>
                           </div>
                           <div class="scr-form-group-content">
                               <p>Yesterday's Expanse</p>
                               <span>₹ 4002.00</span>
                               <p>This month Expanse</p>
                           </div>
                       </div>
                   </div>

               </div>
               <div class="row">
                   <div class="col-lg-6">
                       <div class="ibox p-0">
                           <div class="ibox-head">
                               <div class="ibox-title">Income</div>
                           </div>
                           <div class="ibox-body p-2">
                               <div style="width: 100%; height: 250px;"> <!-- Added height for responsiveness -->
                                   <canvas id="hiresChart"></canvas>

                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="col-lg-6">
                       <div class="ibox p-0">
                           <div class="ibox-head">
                               <div class="ibox-title">Alloted Amount</div>
                           </div>
                           <div class="ibox-body">
                               <div class="row align-items-center">
                                   <div class="col-md-12" style="display: flex; justify-content:center">
                                       <div class="chart-container" style="height: 225px">
                                           <canvas id="myPieChart"></canvas>
                                       </div>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </form>
           <div class="grant-list grant-list-govt ">
               <div class="grant-searchbar">
                   <input type="text" id="grant-search-bar" class="form-control grant-search" placeholder="Search..."
                       onkeyup="searchGrants()">
               </div>
               <div class="grant-table-scroll">
                   <table class="table grant-table" id="grantTable">
                       <thead>
                           <tr>
                               <th>#</th>
                               <th>Indivisual Person Donation</th>
                               <th>Sub Grant</th>
                               <th>Contract</th>
                               <th>CSR</th>
                               <th>Govt. Funds</th>
                               <th>Training Fees</th>
                               <th>Other</th>
                               <th>Date</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>1</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>


                           </tr>
                           <tr>
                               <td>2</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>

                           </tr>
                           <tr>
                               <td>3</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>
                           </tr>
                           <tr>
                               <td>4</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>
                           </tr>
                           <tr>
                               <td>5</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>
                           </tr>
                           <tr>
                               <td>6</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>
                           </tr>
                           <tr>
                               <td>7</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>
                           </tr>
                           <tr>
                               <td>8</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>₹ 20023</td>
                               <td>20/04/2025</td>
                           </tr>


                       </tbody>
                   </table>
               </div>

               <div class="grant-pagination-container">
                   <div class="grant-pagination-info">Showing 1 to 4 of 20 records</div>
                   <div class="grant-pagination">
                       <button class="btn btn-light pagination-btn" disabled>Previous</button>
                       <div class="pagination-numbers">
                           <button class="pagination-number active">1</button>
                           <button class="pagination-number">2</button>
                       </div>
                       <button class="btn btn-light pagination-btn">Next</button>
                   </div>
               </div>

           </div>
       </div>
   </div>
   <script>
       // Register the plugin for Chart.js
       Chart.register(ChartDataLabels);

       const ctx = document.getElementById('hiresChart').getContext('2d');

       new Chart(ctx, {
           type: 'bar',
           data: {
               labels: [
                   'Indivisual Person', 'Sub Grant', 'Contract',
                   'CSR', ' Govt. Funds', 'Training Fees', 'Other'
               ],
               datasets: [{
                   label: 'Hires',
                   data: [173, 133, 129, 127, 115, 99, 94, 49, 38],
                   backgroundColor: '#587C50',
                   borderRadius: 5
               }]
           },
           options: {
               indexAxis: 'y', // Makes it horizontal
               responsive: true,
               plugins: {
                   legend: {
                       display: false
                   },
                   datalabels: {
                       anchor: 'end',
                       align: 'right',
                       color: '#000',
                       font: {
                           weight: 'bold'
                       },
                       formatter: value => value
                   }
               },
               scales: {
                   x: {
                       beginAtZero: true
                   }
               }
           }
       });


       const pieCanvas = document.getElementById('myPieChart'); // Use getElementById
       if (pieCanvas) {
           const pieCtx = pieCanvas.getContext('2d');
           new Chart(pieCtx, {
               type: 'pie',
               data: {
                   labels: [
                       'Human Resource', 'Camps Expenses', 'Training & Capacity Building ',
                       'Equipment & Suplies ', 'Travel Expenses',
                       'IEC Material Expenses', 'Administrative Expenses',
                       'Accomondation Expenses', 'Monitoring & Evaluation ', 'Miscellaneous Expenses'
                   ],
                   datasets: [{
                       label: 'Votes',
                       data: [12000, 19000, 17000, 15000, 10000, 8000, 6000, 15000, 12000, 18000],
                       backgroundColor: [
                           '#FFD700', '#36A2EB', '#FFCD56', '#2ECC71',
                           '#8E44AD', '#E67E22', '#1ABC9C', '#3498DB',
                           '#F39C12', '#C0392B', '#7F8C8D'
                       ],
                       borderWidth: 1
                   }]
               },
               options: {
                   responsive: true,
                   plugins: {
                       legend: {
                           display: false // 🔥 This hides the labels on top
                       },
                       tooltip: {

                           callbacks: {
                               label: function(context) {
                                   let label = context.label || '';
                                   let value = context.parsed || 0;
                                   return `${label}: ₹${value.toLocaleString()}`;
                               }
                           }
                       }
                   }
               }
           });
       } else {
           console.error('Pie chart canvas not found!');
       }
   </script>
