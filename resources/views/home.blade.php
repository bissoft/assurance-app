@extends('layouts.app')

@section('content')
<div class="container-fluid">
          <!--  Owl carousel -->
           
          <!--  Row 1 -->
           <div class="row">
            <div class="col-md-3 col-sm-6 col-12 mt-3">
               <div class="card">
            <div class="card-body">
              <div class="row alig n-items-start">
                <div class="col-12">
                  <h5 class="card-title mb-9 fw-semibold"> lorem </h5>
                  <div class="d-flex align-items-center mb-3">
                    <h4 class="fw-semibold mb-0 me-8">$6,820</h4>
                    <div class="d-flex align-items-center">
                      <span class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                        <i class="ti ti-arrow-up-left text-success"></i>
                      </span>
                    
                    </div>
                  </div>
                </div>
               
              </div>
              <div id="monthly-earning"></div>
            </div>
          </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12 mt-3">
              <div class="card">
           <div class="card-body">
             <div class="row alig n-items-start">
               <div class="col-12">
                 <h5 class="card-title mb-9 fw-semibold"> lorem </h5>
                 <div class="d-flex align-items-center mb-3">
                   <h4 class="fw-semibold mb-0 me-8">$6,820</h4>
                   <div class="d-flex align-items-center">
                     <span class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                       <i class="ti ti-arrow-up-left text-success"></i>
                     </span>
                   
                   </div>
                 </div>
               </div>
              
             </div>
             <div id="monthly-earning1"></div>
           </div>
         </div>
           </div>
           <div class="col-md-3 col-sm-6 col-12 mt-3">
            <div class="card">
         <div class="card-body">
           <div class="row alig n-items-start">
             <div class="col-12">
               <h5 class="card-title mb-9 fw-semibold"> lorem </h5>
               <div class="d-flex align-items-center mb-3">
                 <h4 class="fw-semibold mb-0 me-8">$6,820</h4>
                 <div class="d-flex align-items-center">
                   <span class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                     <i class="ti ti-arrow-up-left text-success"></i>
                   </span>
                 
                 </div>
               </div>
             </div>
            
           </div>
           <div id="monthly-earning2"></div>
         </div>
       </div>
         </div>
         <div class="col-md-3 col-sm-6 col-12 mt-3">
          <div class="card">
       <div class="card-body">
         <div class="row alig n-items-start">
           <div class="col-12">
             <h5 class="card-title mb-9 fw-semibold"> lorem </h5>
             <div class="d-flex align-items-center mb-3">
               <h4 class="fw-semibold mb-0 me-8">$6,820</h4>
               <div class="d-flex align-items-center">
                 <span class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                   <i class="ti ti-arrow-up-left text-success"></i>
                 </span>
               
               </div>
             </div>
           </div>
          
         </div>
         <div id="monthly-earning3"></div>
       </div>
     </div>
       </div>

           </div>
         
          <!--  Row 2 -->
          <div class="row">
            <!-- Employee Salary -->
            <div class="col-lg-7 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                  <div>
                    <h5 class="card-title fw-semibold mb-1">Employee Salary</h5>
                    <p class="card-subtitle mb-0">Every month</p>
                    <div id="salary" class="mb-7 pb-8"></div>
                    <div class="d-flex align-items-center justify-content-between">
                      
                       
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Project -->
            <div class=" col-lg-5 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h5 class="card-title fw-semibold">Sales Overview</h5>
                  <p class="card-subtitle mb-2">Every Month</p>
                  <div id="sales-overview" class="mb-4"></div>
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                      <div class="bg-light-primary rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                        <i class="ti ti-grid-dots text-primary fs-6"></i>
                      </div>
                      <div>
                        <h6 class="fw-semibold text-dark fs-4 mb-0">$23,450</h6>
                        <p class="fs-3 mb-0 fw-normal">Profit</p>
                      </div>
                    </div>
                    <div class="d-flex align-items-center">
                      <div class="bg-light-secondary rounded-2 me-8 p-8 d-flex align-items-center justify-content-center">
                        <i class="ti ti-grid-dots text-secondary fs-6"></i>
                      </div>
                      <div>
                        <h6 class="fw-semibold text-dark fs-4 mb-0">$23,450</h6>
                        <p class="fs-3 mb-0 fw-normal">Expance</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
          </div>
          <!--  Row 3 -->
          <div class="row">
            <!-- Weekly Stats -->
            
            <!-- Top Performers -->
            <div class="col-lg-12 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">Top Performers</h5>
                      <p class="card-subtitle mb-0">Best Employees</p>
                    </div>
                    <div>
                      <select class="form-select">
                        <option value="1">March 2023</option>
                        <option value="2">April 2023</option>
                        <option value="3">May 2023</option>
                        <option value="4">June 2023</option>
                      </select>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table class="table align-middle text-nowrap mb-0">
                      <thead>
                        <tr class="text-muted fw-semibold">
                          <th scope="col" class="ps-0">Assigned</th>
                          <th scope="col">Project</th>
                          <th scope="col">Priority</th>
                          <th scope="col">Budget</th>
                        </tr>
                      </thead>
                      <tbody class="border-top">
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="dashassets/images/profile/user-1.jpg" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Sunil Joshi</h6>
                                <p class="fs-2 mb-0 text-muted">Web Designer</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Elite Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1   bg-light-primary text-primary">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$3.9K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="dashassets/images/profile/user-2.jpg" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">John Deo</h6>
                                <p class="fs-2 mb-0 text-muted"> Web Developer </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Flexy Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1   bg-light-warning text-warning">Medium</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$24.5K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="dashassets/images/profile/user-3.jpg" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Nirav Joshi</h6>
                                <p class="fs-2 mb-0 text-muted">Web Manager</p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Material Pro</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1   bg-light-info text-info">High</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$12.8K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="dashassets/images/profile/user-4.jpg" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Yuvraj Sheth</h6>
                                <p class="fs-2 mb-0 text-muted"> Project Manager </p>
                              </div>
                            </div>
                          </td>
                          <td>
                            <p class="mb-0 fs-3">Xtreme Admin</p>
                          </td>
                          <td>
                            <span class="badge fw-semibold py-1   bg-light-success text-success">Low</span>
                          </td>
                          <td>
                            <p class="fs-3 text-dark mb-0">$4.8K</p>
                          </td>
                        </tr>
                        <tr>
                          <td class="border-0 ps-0">
                            <div class="d-flex align-items-center">
                              <div class="me-2 pe-1">
                                <img src="dashassets/images/profile/user-5.jpg" class="rounded-circle" width="40" height="40" alt="" />
                              </div>
                              <div>
                                <h6 class="fw-semibold mb-1">Micheal Doe</h6>
                                <p class="fs-2 mb-0 text-muted"> Content Writer </p>
                              </div>
                            </div>
                          </td>
                          <td class="border-0">
                            <p class="mb-0 fs-3">Helping Hands WP Theme</p>
                          </td>
                          <td class="border-0">
                            <span class="badge fw-semibold py-1   bg-light-danger text-danger">High</span>
                          </td>
                          <td class="border-0">
                            <p class="fs-3 text-dark mb-0">$9.3K</p>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection        