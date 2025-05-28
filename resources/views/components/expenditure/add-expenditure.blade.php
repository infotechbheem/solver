  <div class="scr-registration-section">
      <div class="container p-0">
          <div class="csr-registration-main-heading">
              <p>Add Expenditure</p>
          </div>
          <form class="scr-registration-form">
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Date Of Expanse <span>*</span></label>
                      <input type="date" required>
                  </div>

                  <div class="scr-form-group">
                      <label> Sector of Expenses <span>*</span></label>
                      <select>
                          <option>Select Sector of Expenses</option>
                          <option value="project_based">Project Based</option>
                          <option value="office_expenses">Office Expenses</option>
                      </select>
                  </div>
                  <div class="scr-form-group">
                      <div class="scr-form-group">
                          <label>Project Name <span>*</span></label>
                          <input type="text" placeholder="project name" required>
                      </div>
                  </div>

              </div>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <div class="scr-form-group">
                          <label> Name <span>*</span></label>
                          <input type="text" placeholder="Enter name" required>
                      </div>
                  </div>
                  <div class="scr-form-group">
                      <label>Type of Expenditure<span>*</span></label>
                      <select>
                          <option value="">Select Type of Expenditure</option>
                          <option value="human_resource">Human Resource</option>
                          <option value="equipment">Equipment & Suplies</option>
                          <option value="travel_expenses">Travel Expenses</option>
                          <option value="iec_material">IEC Material Expenses</option>
                          <option value="accomodation_expenses">Accomondation Expenses</option>
                          <option value="miscellaneous_expenses">Miscellaneous Expenses</option>
                      </select>
                  </div>
                  <div class="scr-form-group">
                      <label> Adminstrative Expenses <span>*</span></label>
                      <select>
                          <option value="">Select Adminstrative Expense</option>
                          <option value="food_beverage">Food & Beverage</option>
                          <option value="rent"> Rent</option>
                          <option value="utilities"> Utilities</option>
                          <option value="insurance"> Insurance</option>
                          <option value="wages_salaries"> Wages & Salaries</option>
                          <option value="office_fixtures"> Office Fistures & Equipment</option>
                          <option value="legal_finance_service"> Legal & Finance Service Fees</option>
                          <option value="office_suplies">Office Suplies</option>
                          <option value="travel">Travel</option>
                          <option value="it_service">IT Service</option>
                          <option value="licence_subscriptions">Licence & Subscriptions</option>
                      </select>
                  </div>


              </div>
              <h3 class="scr-registration-heading">Human Resource</h3>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Human Resource<span>*</span></label>
                      <select>
                          <option value="">Select</option>
                          <option value="salary">Salary</option>
                          <option value="honorarium">Honorarium</option>
                          <option value="stipend">stipned</option>
                          <option value="advance">Advance</option>
                      </select>
                  </div>
                  <div class="scr-form-group">
                      <label>Date Of Expanse <span>*</span></label>
                      <input type="date" required>
                  </div>
              </div>
              <h3 class="scr-registration-heading">Equipment & and Suplies</h3>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Date Of Expanse <span>*</span></label>
                      <input type="date" required>
                  </div>
                  <div class="scr-form-group">
                      <label>Cost <span>*</span></label>
                      <input type="text" placeholder="Enter cost" required>
                  </div>
                  <div class="scr-form-group">
                      <label> Supplier Name<span>*</span></label>
                      <input type="text" placeholder="Enter suplier name" required>
                  </div>

              </div>

              {{-- <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label> Equipment Description </label>
                      <textarea></textarea>
                  </div>
              </div> --}}
              <h3 class="scr-registration-heading">Travel Expenses</h3>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>date <span>*</span></label>
                      <input type="date">
                  </div>
                  <div class="scr-form-group">
                      <label>Departure <span>*</span></label>
                      <input type="text" placeholder="Enter Departure">
                  </div>
                  <div class="scr-form-group">
                      <label>Arival <span>*</span></label>
                      <input type="text" placeholder="Enter arival">
                  </div>
                  <div class="scr-form-group">
                      <label>Mode of Travel<span>*</span></label>
                      <select>
                          <option value="">Select Travel Mode</option>
                          <option value="air">Air</option>
                          <option value="train">Train</option>
                          <option value="metro">metro</option>
                          <option value="cabs_taxi">Cabs/taxi</option>
                          <option value="auto">Auto</option>
                          <option value="other">Other</option>
                      </select>
                  </div>
              </div>
              <h3 class="scr-registration-heading">IEC Materials Expenses</h3>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Date Of Expanse <span>*</span></label>
                      <input type="date" required>
                  </div>

                  <div class="scr-form-group">
                      <label>Item <span>*</span></label>
                      <select>
                          <option>Select Item</option>
                          <option> Pamphlets / Flyers</option>
                          <option> Posters / Banners</option>
                          <option>Brochures / Booklets</option>
                          <option> T-Shirts / Caps</option>
                      </select>
                  </div>
                  <div class="scr-form-group">
                      <label>Quantity <span>*</span></label>
                      <input type="text" placeholder="Enter quantity" required>
                  </div>
              </div>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Rate Per Unit <span>*</span></label>
                      <input type="text" placeholder="rate per unit" required>
                  </div>
                  <div class="scr-form-group">
                      <label>Total Cost <span>*</span></label>
                      <input type="text" placeholder="total cost" required>
                  </div>
                  <div class="scr-form-group">
                      <label>Remarks <span>*</span></label>
                      <input type="text" placeholder="remarks" required>
                  </div>
              </div>
              <h3 class="scr-registration-heading">Accomodation Expenses</h3>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Date <span>*</span></label>
                      <input type="date">
                  </div>
                  <div class="scr-form-group">
                      <label>Check In <span>*</span></label>
                      <input type="text" placeholder="Enter check in">
                  </div>
                  <div class="scr-form-group">
                      <label>Check Out <span>*</span></label>
                      <input type="text" placeholder="Enter check out">
                  </div>
                  <div class="scr-form-group">
                      <label>No. Of days <span>*</span></label>
                      <input type="text" placeholder="Enter no. of days">
                  </div>


              </div>
              <h3 class="scr-registration-heading">Miscellaneous Expenses</h3>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Date Of Expanse <span>*</span></label>
                      <input type="date" required>
                  </div>
                  <div class="scr-form-group">
                      <label>Other <span>*</span></label>
                      <input type="text" placeholder="Enter cost" required>
                  </div>
                  <div class="scr-form-group">
                      <label> Remarks<span>*</span></label>
                      <input type="text" placeholder="Enter remarks" required>
                  </div>

              </div>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Miscellaneous Description<span>*</span></label>
                      <textarea name="" id="" cols="30" rows="10"></textarea>
                  </div>
              </div>
              <h3 class="scr-registration-heading">Other</h3>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Amount <span>*</span></label>
                      <input type="text" placeholder="Enter amount">
                  </div>
                  <div class="scr-form-group">
                      <label>Section <span>*</span></label>
                      <input type="text" placeholder="Enter Section ">
                  </div>
                  <div class="scr-form-group">
                      <label>TDS Deduction % <span>*</span></label>
                      <input type="text" placeholder="TDS deduction percentage ">
                  </div>
              </div>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>TDS Deduction Amount <span>*</span></label>
                      <input type="text" placeholder="TDS deduction amount ">
                  </div>
                  <div class="scr-form-group">
                      <label>Pan Number <span>*</span></label>
                      <input type="text" placeholder="Enter Pan Number ">
                  </div>
                  <div class="scr-form-group">
                      <label>TDS Deduction Date <span>*</span></label>
                      <input type="text" placeholder="TDS deduction date ">
                  </div>
              </div>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Mode of Payment<span>*</span></label>
                      <select>
                          <option value="">Select Payment Mode</option>
                          <option value="online">Online</option>
                          <option value="offline">Offline</option>
                      </select>
                  </div>
                  <div class="scr-form-group">
                      <label>Invoice/Voucher</span></label>
                      <input type="file">
                  </div>
                  <div class="scr-form-group">
                      <label>Proof Of Payment <span>*</span></span></label>
                      <input type="file">
                  </div>


              </div>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Sub Total Amount <span>*</span></span></label>
                      <input type="text" placeholder="sub total amount">
                  </div>
                  <div class="scr-form-group">
                      <label>Advance <span>*</span></span></label>
                      <input type="text" placeholder="advance">
                  </div>
                  <div class="scr-form-group">
                      <label>Net Payment <span>*</span></span></label>
                      <input type="text" placeholder="net payment">
                  </div>
                  <div class="scr-form-group">
                      <label>Type of payment<span>*</span></label>
                      <select>
                          <option value="">Select Type of Payment</option>
                          <option value="direct">Direct</option>
                          <option value="reimubersment">Reimubersment</option>
                      </select>
                  </div>
              </div>
              <div class="scr-registration-row">
                  <div class="scr-form-group">
                      <label>Decription</label>
                      <textarea></textarea>
                  </div>
              </div>
              <div class="scr-form-group-btn" style="justify-content: flex-start">
                  <button type="submit" class="scr-btn">Submit </button>
              </div>
          </form>
      </div>
  </div>
