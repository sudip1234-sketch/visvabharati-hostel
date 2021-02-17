   
          <div class="col-sm-8 col-md-10">
            <div class="tab-content" id="v-pills-tabContent" style="min-height: 600px;">
              <div class="tab-pane fade show active" id="student-data" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Student Data</h4>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#add-student-data" style="margin-left: 15px;">Add</a>
                    <a href="#" class="btn btn-secondary btn-sm float-right">Download</a>
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="add-student-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Add Student</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="#" class="img-profile">
                                <img src="images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid">
                                <span class="edit-img-profile" style="display: block;">Add Profile Image</span>
                              </a>
                            </div>
                            <div class="col-md-9">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Sl. No.</label>
                                  <input type="text" class="form-control" placeholder="Enter serial no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Full Name</label>
                                  <input type="text" class="form-control" placeholder="Enter full name">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Contact No.</label>
                                  <input type="text" class="form-control" placeholder="Enter contact no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Email Id</label>
                                  <input type="text" class="form-control" placeholder="Enter email id">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>University Id</label>
                                  <input type="text" class="form-control" placeholder="Enter university id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Id</label>
                                  <input type="text" class="form-control" placeholder="Enter hostel id">
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Sex</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline8" name="customRadioInline8" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline8">Male</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline9" name="customRadioInline8" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline9">Female</label>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Hostel Name</label>
                                  <input type="text" class="form-control" placeholder="Enter hostel name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Code</label>
                                  <input type="text" class="form-control" placeholder="Enter hostel code">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Room No.</label>
                                  <input type="text" class="form-control" placeholder="Enter room no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Hostel Wing/Block</label>
                                  <input type="text" class="form-control" placeholder="Enter hostel wing/block">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Course Type</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option  value="">UG[Prep]</option>
                                    <option value="">PG</option>
                                    <option value="">M.Phil</option>
                                    <option value="">P.hd</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Name of Department</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">Benagali</option>
                                    <option value="">Chinese</option>
                                    <option value="">Botany</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Name of Bhavana (Institute)</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">Bhasa</option>
                                    <option value="">Siksha</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Date of Admission/Allotment</label>
                                  <input class="form-control datepicker inputDisabled" id="datepicker1" placeholder="Select date">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Academic Year</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">2016</option>
                                    <option value="">2017</option>
                                    <option value="">2018</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Vacating Year</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">2016</option>
                                    <option value="">2017</option>
                                    <option value="">2018</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>VB Registration Id</label>
                                  <input type="text" class="form-control" placeholder="Enter VB registration Id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Date of Birth</label>
                                  <input class="form-control datepicker" id="datepicker2" placeholder="Select date">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Aadhar No(UID)</label>
                                  <input type="text" class="form-control" placeholder="Enter Aadhar card no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>State</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">West Bengal</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Enter address">
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>City</label>
                                  <input type="text" class="form-control" placeholder="Enter city name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Pin Code.</label>
                                  <input type="text" class="form-control" placeholder="Enter pin code">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Gurdian Name</label>
                                  <input type="text" class="form-control" placeholder="Enter gurdian name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Relation with Gurdian</label>
                                  <select class="custom-select">
                                    <option>Choose...</option>
                                    <option selected value="">Father</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Gurdian Contact No</label>
                                  <input type="text" class="form-control" placeholder="Enter gurdian contact no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Gurdian Email Id</label>
                                  <input type="text" class="form-control" placeholder="Enter gurdian email id">
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Gurdian Address</label>
                                <input type="text" class="form-control" placeholder="Enter gurdian address">
                              </div>
                              <div class="form-group">
                                <label>PWD Status</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline1" name="customRadioInline1" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline2" name="customRadioInline1" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline2">No</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Status Category</label>
                                <select class="custom-select">
                                  <option selected>Choose...</option>
                                  <option value="">Blind</option>
                                  <option value="">Orthopedic</option>
                                </select>
                              </div>
                              <div class="form-group">
                                <label>Minority</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline3" name="customRadioInline3" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline3">GEN</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline4" name="customRadioInline3" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline4">SC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline13" name="customRadioInline3" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline13">ST</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline14" name="customRadioInline3" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline14">OBC</label>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Nationality</label>
                                <select class="custom-select">
                                  <option selected>Choose...</option>
                                  <option value="">Indian</option>
                                </select>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Last Final Exam Score (10 Point Scale)</label>
                                  <select class="custom-select">
                                  <option selected>Choose...</option>
                                  <option value="">1</option>
                                  <option value="">2</option>
                                  <option value="">3</option>
                                  <option value="">4</option>
                                  <option value="">5</option>
                                  <option value="">6</option>
                                  <option value="">7</option>
                                  <option value="">8</option>
                                  <option value="">9</option>
                                  <option value="">10</option>
                                </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Distance from Santiniketan</label>
                                  <input type="text" class="form-control" placeholder="Enter distance from santiniketan">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Distance Score (10 Point Scale)</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Final Score (10 Point Scale)</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">1</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                    <option value="">5</option>
                                    <option value="">6</option>
                                    <option value="">7</option>
                                    <option value="">8</option>
                                    <option value="">9</option>
                                    <option value="">10</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Every Semister CGPA (Update)</label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <button type="button" class="btn btn-danger">Add Student</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-striped" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address & Contact No</th>
                        <th scope="col">Room No</th>
                        <th scope="col">Name of Dept</th>
                        <th scope="col">Course</th>
                        <th scope="col">Sex</th>
                        <th scope="col">Allotment Year</th>
                        <th scope="col">Vacating Year</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">0123</th>
                        <td><img src="images/profile.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Debayashi Basu</td>
                        <td>
                          <p>
                            1234 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700084
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098765</a>
                          </p>
                        </td>
                        <td>12</td>
                        <td>Bengali</td>
                        <td>UG[Prep]</td>
                        <td>Female</td>
                        <td>2016</td>
                        <td>2018</td>
                      </tr>
                      <tr>
                        <th scope="row">0245</th>
                        <td><img src="images/profile3.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Rakesh Paik</td>
                        <td>
                          <p>
                            5678 Main Road<br>
                            City, West Bengal<br>
                            Kolkata-700124
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 7001098567</a>
                          </p>
                        </td>
                        <td>22</td>
                        <td>English</td>
                        <td>PG</td>
                        <td>Male</td>
                        <td>2015</td>
                        <td>2018</td>
                      </tr>
                      <tr>
                        <th scope="row">0233</th>
                        <td><img src="images/profile2.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Ankita Anand</td>
                        <td>
                          <p>
                            15/B2 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700042
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098234</a>
                          </p>
                        </td>
                        <td>15</td>
                        <td>Bengali</td>
                        <td>UG[Prep]</td>
                        <td>Female</td>
                        <td>2016</td>
                        <td>2018</td>
                      </tr>
                      <tr>
                        <th scope="row">0123</th>
                        <td><img src="images/profile.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Debayashi Basu</td>
                        <td>
                          <p>
                            1234 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700084
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098765</a>
                          </p>
                        </td>
                        <td>12</td>
                        <td>Bengali</td>
                        <td>UG[Prep]</td>
                        <td>Female</td>
                        <td>2016</td>
                        <td>2018</td>
                      </tr>
                      <tr>
                        <th scope="row">0245</th>
                        <td><img src="images/profile3.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Rakesh Paik</td>
                        <td>
                          <p>
                            5678 Main Road<br>
                            City, West Bengal<br>
                            Kolkata-700124
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 7001098567</a>
                          </p>
                        </td>
                        <td>22</td>
                        <td>English</td>
                        <td>PG</td>
                        <td>Male</td>
                        <td>2015</td>
                        <td>2018</td>
                      </tr>
                      <tr>
                        <th scope="row">0233</th>
                        <td><img src="images/profile2.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Ankita Anand</td>
                        <td>
                          <p>
                            15/B2 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700042
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098234</a>
                          </p>
                        </td>
                        <td>15</td>
                        <td>Bengali</td>
                        <td>UG[Prep]</td>
                        <td>Female</td>
                        <td>2016</td>
                        <td>2018</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr>
                <nav class="float-right">
                  <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
                <div class="clearfix"></div>
              </div>
              <div class="tab-pane fade" id="allotment" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Allotment</h4>
                  </div>
                  <div class="col">
                    <a href="#" class="btn btn-secondary btn-sm float-right" data-toggle="modal" data-target="#allotment-data" style="margin-left: 15px;">Add</a>
                    <a href="#" class="btn btn-secondary btn-sm float-right">Download</a>
                  </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="allotment-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Allotment</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-3">
                              <a href="#" class="img-profile">
                                <img src="images/blank-profile-pic.jpg" alt="" class="img-thumbnail img-fluid">
                                <span class="edit-img-profile" style="display: block;">Add Profile Image</span>
                              </a>
                            </div>
                            <div class="col-md-9">
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>ID No.</label>
                                  <input type="text" class="form-control" placeholder="Enter ID no.">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Full Name</label>
                                  <input type="text" class="form-control" placeholder="Enter full name">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Name of Department</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">Benagali</option>
                                    <option value="">Chinese</option>
                                    <option value="">Botany</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Bhavana</label>
                                  <input type="text" class="form-control" placeholder="Enter bhavana name">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Academic Year</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option value="">2016</option>
                                    <option value="">2017</option>
                                    <option value="">2018</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Course</label>
                                  <select class="custom-select">
                                    <option selected>Choose...</option>
                                    <option  value="">UG[Prep]</option>
                                    <option value="">PG</option>
                                    <option value="">M.Phil</option>
                                    <option value="">P.hd</option>
                                  </select>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Date of Allotment</label>
                                  <input class="form-control datepicker" id="datepicker3" placeholder="Select date">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Date of Vacating</label>
                                  <input class="form-control datepicker" id="datepicker4" placeholder="Select date">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Blood Group</label>
                                  <input type="text" class="form-control" placeholder="Enter blood group">
                                </div>
                              </div>
                              <div class="form-group">
                                <label>Caste</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline15" name="customRadioInline15" class="custom-control-input" checked>
                                  <label class="custom-control-label" for="customRadioInline15">GEN</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline16" name="customRadioInline15" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline16">SC</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline17" name="customRadioInline15" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline17">ST</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline18" name="customRadioInline15" class="custom-control-input">
                                  <label class="custom-control-label" for="customRadioInline18">OBC</label>
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Hostel</label>
                                  <input type="text" class="form-control" placeholder="Enter hostel name">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Room No.</label>
                                  <input type="text" class="form-control" placeholder="Enter room no.">
                                </div>
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Email Id</label>
                                  <input type="text" class="form-control" placeholder="Enter email id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Mobile No</label>
                                  <input type="text" class="form-control" placeholder="Enter mobile no.">
                                </div>  
                              </div>
                              <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" placeholder="Enter address">
                              </div>
                              <div class="form-group">
                                <label>Name of Gurdian</label>
                                <input type="text" class="form-control" placeholder="Enter gurdian name">
                              </div>
                              <div class="form-row">
                                <div class="form-group col-md-6">
                                  <label>Gurdian Email Id</label>
                                  <input type="text" class="form-control" placeholder="Enter gurdian email id">
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Gurdian Contact No</label>
                                  <input type="text" class="form-control" placeholder="Enter gurdian contact no.">
                                </div> 
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                          <button type="button" class="btn btn-danger">Add Allotment</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-striped" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">ID No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Department</th>
                        <th scope="col">Bhavana</th>
                        <th scope="col">Academic Year</th>
                        <th scope="col">Course</th>
                        <th scope="col">Date of Allotment</th>
                        <th scope="col">Date of Vacating</th>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Caste</th>
                        <th scope="col">Hostel</th>
                        <th scope="col">Room No.</th>
                        <th scope="col">Email Id</th>
                        <th scope="col">Mobile No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Name of Gurdian</th>
                        <th scope="col">Gurdian Email Id</th>
                        <th scope="col">Gurdian Mobile No</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">0123</th>
                        <td><img src="images/profile.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Debayashi Basu</td>
                        <td>Bengali</td>
                        <td>Bhasa</td>
                        <td>2016</td>
                        <td>UG[Prep]</td>
                        <td>03/08/2016</td>
                        <td>01/07/2018</td>
                        <td>B+</td>
                        <td>GEN</td>
                        <td>Amrapali Girls</td>
                        <td>12</td>
                        <td>debayashibasu@gmail.com</td>
                        <td>+91 9231098765</td>
                        <td>
                          <p>
                            1234 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700084
                          </p>
                        </td>
                        <td>Somnath Basu</td>
                        <td>somnathbasu@gmail.com</td>
                        <td>+91 9231098768</td>
                      </tr>
                      <tr>
                        <th scope="row">0245</th>
                        <td><img src="images/profile3.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Rakesh Paik</td>
                        <td>English</td>
                        <td>Bhasa</td>
                        <td>2015</td>
                        <td>PG</td>
                        <td>03/08/2015</td>
                        <td>01/07/2018</td>
                        <td>AB+</td>
                        <td>ST</td>
                        <td>Purbapally Senior Boys</td>
                        <td>22</td>
                        <td>rakeshpaik@gmail.com</td>
                        <td>+91 7001098567</td>
                        <td>
                          <p>
                            5678 Main Road<br>
                            City, West Bengal<br>
                            Kolkata-7000124
                          </p>
                        </td>
                        <td>Bimalnath Paik</td>
                        <td>bimalnathpaik@gmail.com</td>
                        <td>+91 9231098123</td>
                      </tr>
                      <tr>
                        <th scope="row">0233</th>
                        <td><img src="images/profile2.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Ankita Anand</td>
                        <td>Bengali</td>
                        <td>Bhasa</td>
                        <td>2016</td>
                        <td>UG[Prep]</td>
                        <td>03/08/2016</td>
                        <td>01/07/2018</td>
                        <td>O+</td>
                        <td>GEN</td>
                        <td>Amrapali Girls</td>
                        <td>15</td>
                        <td>ankitaanand@gmail.com</td>
                        <td>+91 9231098234</td>
                        <td>
                          <p>
                            15/B2 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700042
                          </p>
                        </td>
                        <td>Subham Anand</td>
                        <td>subhamanand@gmail.com</td>
                        <td>+91 9231098987</td>
                      </tr>
                      <tr>
                        <th scope="row">0123</th>
                        <td><img src="images/profile.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Debayashi Basu</td>
                        <td>Bengali</td>
                        <td>Bhasa</td>
                        <td>2016</td>
                        <td>UG[Prep]</td>
                        <td>03/08/2016</td>
                        <td>01/07/2018</td>
                        <td>B+</td>
                        <td>GEN</td>
                        <td>Amrapali Girls</td>
                        <td>12</td>
                        <td>debayashibasu@gmail.com</td>
                        <td>+91 9231098765</td>
                        <td>
                          <p>
                            1234 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700084
                          </p>
                        </td>
                        <td>Somnath Basu</td>
                        <td>somnathbasu@gmail.com</td>
                        <td>+91 9231098768</td>
                      </tr>
                      <tr>
                        <th scope="row">0245</th>
                        <td><img src="images/profile3.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Rakesh Paik</td>
                        <td>English</td>
                        <td>Bhasa</td>
                        <td>2015</td>
                        <td>PG</td>
                        <td>03/08/2015</td>
                        <td>01/07/2018</td>
                        <td>AB+</td>
                        <td>ST</td>
                        <td>Purbapally Senior Boys</td>
                        <td>22</td>
                        <td>rakeshpaik@gmail.com</td>
                        <td>+91 7001098567</td>
                        <td>
                          <p>
                            5678 Main Road<br>
                            City, West Bengal<br>
                            Kolkata-7000124
                          </p>
                        </td>
                        <td>Bimalnath Paik</td>
                        <td>bimalnathpaik@gmail.com</td>
                        <td>+91 9231098123</td>
                      </tr>
                      <tr>
                        <th scope="row">0233</th>
                        <td><img src="images/profile2.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Ankita Anand</td>
                        <td>Bengali</td>
                        <td>Bhasa</td>
                        <td>2016</td>
                        <td>UG[Prep]</td>
                        <td>03/08/2016</td>
                        <td>01/07/2018</td>
                        <td>O+</td>
                        <td>GEN</td>
                        <td>Amrapali Girls</td>
                        <td>15</td>
                        <td>ankitaanand@gmail.com</td>
                        <td>+91 9231098234</td>
                        <td>
                          <p>
                            15/B2 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700042
                          </p>
                        </td>
                        <td>Subham Anand</td>
                        <td>subhamanand@gmail.com</td>
                        <td>+91 9231098987</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <hr>
                <nav class="float-right">
                  <ul class="pagination pagination-sm">
                    <li class="page-item disabled">
                      <a class="page-link" href="#" tabindex="-1">Previous</a>
                    </li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                      <a class="page-link" href="#">Next</a>
                    </li>
                  </ul>
                </nav>
                <div class="clearfix"></div>
              </div>
              <div class="tab-pane fade" id="payment-status" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Payment Status</h4>
                  </div>
                  <div class="col">
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right" style="margin-left: 15px;">Add</a> -->
                    <a href="#" class="btn btn-secondary btn-sm float-right">Download</a>
                  </div>
                </div>
                <hr>
                <div class="table-responsive">
                  <table class="table table-striped" style="font-size: 14px;">
                    <thead>
                      <tr>
                        <th scope="col">SL No</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address & Contact No</th>
                        <th scope="col">Room No</th>
                        <th scope="col">Name of Dept</th>
                        <th scope="col">For the Month / Quater</th>
                        <th scope="col">Status</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Payment Mode</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">0123</th>
                        <td><img src="images/profile.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Debayashi Basu</td>
                        <td>
                          <p>
                            1234 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700084
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098765</a>
                          </p>
                        </td>
                        <td>12</td>
                        <td>Bengali</td>
                        <td>Dec-Mar, 2018</td>
                        <td>Paid</td>
                        <td>₹3000.00</td>
                        <td>Online</td>
                      </tr>
                      <tr>
                        <th scope="row">0245</th>
                        <td><img src="images/profile3.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Rakesh Paik</td>
                        <td>
                          <p>
                            5678 Main Road<br>
                            City, West Bengal<br>
                            Kolkata-7000124
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 7001098567</a>
                          </p>
                        </td>
                        <td>22</td>
                        <td>English</td>
                        <td>July-Dec, 2018</td>
                        <td>Paid</td>
                        <td>₹6000.00</td>
                        <td>Cash</td>
                      </tr>
                      <tr>
                        <th scope="row">0233</th>
                        <td><img src="images/profile2.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Ankita Anand</td>
                        <td>
                          <p>
                            15/B2  Main St<br>
                            City, West Bengal<br>
                            Kolkata-700042
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098234</a>
                          </p>
                        </td>
                        <td>15</td>
                        <td>Bengali</td>
                        <td>July-Dec, 2018</td>
                        <td>Paid</td>
                        <td>₹6000.00</td>
                        <td>Online</td>
                      </tr>
                      <tr>
                        <th scope="row">0123</th>
                        <td><img src="images/profile.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Debayashi Basu</td>
                        <td>
                          <p>
                            1234 Main St<br>
                            City, West Bengal<br>
                            Kolkata-700084
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098765</a>
                          </p>
                        </td>
                        <td>12</td>
                        <td>Bengali</td>
                        <td>Dec-Mar, 2018</td>
                        <td>Paid</td>
                        <td>₹3000.00</td>
                        <td>Online</td>
                      </tr>
                      <tr>
                        <th scope="row">0245</th>
                        <td><img src="images/profile3.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Rakesh Paik</td>
                        <td>
                          <p>
                            5678 Main Road<br>
                            City, West Bengal<br>
                            Kolkata-7000124
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 7001098567</a>
                          </p>
                        </td>
                        <td>22</td>
                        <td>English</td>
                        <td>July-Dec, 2018</td>
                        <td>Paid</td>
                        <td>₹6000.00</td>
                        <td>Cash</td>
                      </tr>
                      <tr>
                        <th scope="row">0233</th>
                        <td><img src="images/profile2.jpg" alt="" width="50px" style="border: 3px solid #fff"></td>
                        <td>Ankita Anand</td>
                        <td>
                          <p>
                            15/B2  Main St<br>
                            City, West Bengal<br>
                            Kolkata-700042
                          </p>
                          <p>
                            Phone: <a href="tel:+91 9231098765">+91 9231098234</a>
                          </p>
                        </td>
                        <td>15</td>
                        <td>Bengali</td>
                        <td>July-Dec, 2018</td>
                        <td>Paid</td>
                        <td>₹6000.00</td>
                        <td>Online</td>
                      </tr>
                    </tbody>
                  </table>
                  <hr>
                  <nav class="float-right">
                    <ul class="pagination pagination-sm">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1">Previous</a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1</a></li>
                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>
                  <div class="clearfix"></div>
                </div>
              </div>
              <div class="tab-pane fade" id="allotment-card" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Allotment Card</h4>
                  </div>
                  <div class="col">
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right" style="margin-left: 15px;">Add</a> -->
                    <a href="#" class="btn btn-secondary btn-sm float-right">Download</a>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-5 col-md-4 col-lg-2">
                    <a href="#" class="img-profile">
                      <img src="images/profile.jpg" alt="" class="img-thumbnail img-fluid">
                      <!-- <span class="edit-img-profile" style="display: block;">Add Profile Image</span> -->
                    </a>
                  </div>
                  <div class="col-sm-7 col-md-8 col-lg-10">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>ID No.</label>
                        <input type="text" class="form-control" placeholder="Enter ID no." value="0123" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name" value="Debayashi Basu" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Name of Department</label>
                        <select class="custom-select" disabled>
                          <option>Choose...</option>
                          <option selected value="">Benagali</option>
                          <option value="">Chinese</option>
                          <option value="">Botany</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Bhavana</label>
                        <input type="text" class="form-control" placeholder="Enter bhavana name" value="Vasha" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Academic Year</label>
                        <select class="custom-select" disabled>
                          <option>Choose...</option>
                          <option selected value="">2016</option>
                          <option value="">2017</option>
                          <option value="">2018</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Course</label>
                        <select class="custom-select" disabled>
                          <option>Choose...</option>
                          <option selected value="">UG[Prep]</option>
                          <option value="">PG</option>
                          <option value="">M.Phil</option>
                          <option value="">P.hd</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Date of Allotment</label>
                        <input class="form-control datepicker" id="datepicker3" placeholder="Select date" value="03/08/2016" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date of Vacating</label>
                        <input class="form-control datepicker" id="datepicker4" placeholder="Select date" value="01/07/2018" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Blood Group</label>
                        <input type="text" class="form-control" placeholder="Enter blood group" value="B+" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Caste</label><br>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="customRadioInline3" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline3">GEN</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" name="customRadioInline3" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="customRadioInline4">SC</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline13" name="customRadioInline3" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="customRadioInline13">ST</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline14" name="customRadioInline3" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="customRadioInline14">OBC</label>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Hostel</label>
                        <input type="text" class="form-control" placeholder="Enter hostel name" value="Amrapali Girls" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Room No.</label>
                        <input type="text" class="form-control" placeholder="Enter room no." value="12" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Email Id</label>
                        <input type="text" class="form-control" placeholder="Enter email id" value="debayashibasu@gmail.com" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Mobile No</label>
                        <input type="text" class="form-control" placeholder="Enter mobile no." value="+91 9231098765" disabled>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" placeholder="Enter address" value="1234 Main St, City, West Bengal, Kolkata-700084" disabled>
                    </div>
                    <div class="form-group">
                      <label>Name of Gurdian</label>
                      <input type="text" class="form-control" placeholder="Enter gurdian name" value="Somnath Basu" disabled>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Gurdian Email Id</label>
                        <input type="text" class="form-control" placeholder="Enter gurdian email id" value="somnathbasu@gmail.com" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Gurdian Contact No</label>
                        <input type="text" class="form-control" placeholder="Enter gurdian contact no." value="+91 9231098768" disabled>
                      </div> 
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="hostel-card" role="tabpanel">
                <div class="row">
                  <div class="col-auto">
                    <h4>Hostel Card</h4>
                  </div>
                  <div class="col">
                    <!-- <a href="#" class="btn btn-secondary btn-sm float-right" style="margin-left: 15px;">Add</a> -->
                    <a href="#" class="btn btn-secondary btn-sm float-right">Download</a>
                  </div>
                </div>
                <hr>
                <!-- <div class="row">
                  <div class="col-sm-5 col-md-4 col-lg-2">
                    <a href="#" class="img-profile">
                      <img src="images/profile.jpg" alt="" class="img-thumbnail img-fluid">
                      <span class="edit-img-profile" style="display: block;">Add Profile Image</span>
                    </a>
                  </div>
                  <div class="col-sm-7 col-md-8 col-lg-10">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>ID No.</label>
                        <input type="text" class="form-control" placeholder="Enter ID no." value="0123" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Full Name</label>
                        <input type="text" class="form-control" placeholder="Enter full name" value="Debayashi Basu" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Name of Department</label>
                        <select class="custom-select" disabled>
                          <option>Choose...</option>
                          <option selected value="">Benagali</option>
                          <option value="">Chinese</option>
                          <option value="">Botany</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Bhavana</label>
                        <input type="text" class="form-control" placeholder="Enter bhavana name" value="Vasha" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Academic Year</label>
                        <select class="custom-select" disabled>
                          <option>Choose...</option>
                          <option selected value="">2016</option>
                          <option value="">2017</option>
                          <option value="">2018</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Course</label>
                        <select class="custom-select" disabled>
                          <option>Choose...</option>
                          <option selected value="">UG[Prep]</option>
                          <option value="">PG</option>
                          <option value="">M.Phil</option>
                          <option value="">P.hd</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Date of Allotment</label>
                        <input class="form-control datepicker" id="datepicker3" placeholder="Select date" value="03/08/2016" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Date of Vacating</label>
                        <input class="form-control datepicker" id="datepicker4" placeholder="Select date" value="01/07/2018" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Blood Group</label>
                        <input type="text" class="form-control" placeholder="Enter blood group" value="B+" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Caste</label><br>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="customRadioInline3" class="custom-control-input" checked>
                        <label class="custom-control-label" for="customRadioInline3">GEN</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" name="customRadioInline3" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="customRadioInline4">SC</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline13" name="customRadioInline3" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="customRadioInline13">ST</label>
                      </div>
                      <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline14" name="customRadioInline3" class="custom-control-input" disabled>
                        <label class="custom-control-label" for="customRadioInline14">OBC</label>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Hostel</label>
                        <input type="text" class="form-control" placeholder="Enter hostel name" value="Amrapali Girls" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Room No.</label>
                        <input type="text" class="form-control" placeholder="Enter room no." value="12" disabled>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Email Id</label>
                        <input type="text" class="form-control" placeholder="Enter email id" value="debayashibasu@gmail.com" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Mobile No</label>
                        <input type="text" class="form-control" placeholder="Enter mobile no." value="+91 9231098765" disabled>
                      </div>  
                    </div>
                    <div class="form-group">
                      <label>Address</label>
                      <input type="text" class="form-control" placeholder="Enter address" value="1234 Main St, City, West Bengal, Kolkata-700084" disabled>
                    </div>
                    <div class="form-group">
                      <label>Name of Gurdian</label>
                      <input type="text" class="form-control" placeholder="Enter gurdian name" value="Somnath Basu" disabled>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Gurdian Email Id</label>
                        <input type="text" class="form-control" placeholder="Enter gurdian email id" value="somnathbasu@gmail.com" disabled>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Gurdian Contact No</label>
                        <input type="text" class="form-control" placeholder="Enter gurdian contact no." value="+91 9231098768" disabled>
                      </div> 
                    </div>
                  </div>
                </div> -->
                <div class="row">
                  <div class="col-md-6">
                    <div style="margin-bottom: 20px;">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                        <label class="custom-control-label" for="customCheck1" style="font-size: 1rem;">Front</label>
                      </div>
                    </div>
                    <div class="hostel-id front-side" style="width: 100%; background-color: #f3f3f3; padding: 30px 0 0; position: relative;">
                      <img src="images/Visva_bharati_logo.jpg" alt="" width="80px" style="position: absolute; top: 0; right: 30px;">
                      <h2 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Visva-Bharati</h2>
                      <h4 style="font-weight: 600; background-color: #003366; color: #fff; margin: 0; padding: 10px; text-align: center;">Amrapali Girls Hostel</h4>
                      <div style="padding: 30px;">
                        <div class="row">
                          <div class="col">
                            <img src="images/profile.jpg" alt="" class="img-thumbnail">
                          </div>
                          <div class="col">
                            <h5>Valid upto</h5>
                            <h6>1st March, 2019</h6>
                            <br>
                            <h5>Date of Birth</h5>
                            <h6>22nd December, 2001</h6>
                            <br>
                            <h5>Blood Group</h5>
                            <h6>B+</h6>
                          </div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col">
                            <h4>Name:</h4>
                          </div>
                          <div class="col">
                            <h4>Debayashi Basu</h4>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h5>Course:</h5>
                          </div>
                          <div class="col">
                            <h5>UG[Prep]</h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h5>Department:</h5>
                          </div>
                          <div class="col">
                            <h5>Benagali</h5>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <h5>Bhavana:</h5>
                          </div>
                          <div class="col">
                            <h5>Bhasa</h5>
                          </div>
                        </div>
                        <div class="row" style="margin-top: 120px;">
                          <div class="col">
                            <hr style="margin: .5rem 0;">
                            <p style="text-align: center;">Signature of the Student</p>
                            <div align="center"><img src="images/barcode.jpg" alt=""></div>
                          </div>
                          <div class="col">
                            <hr style="margin: .5rem 0;">
                            <p style="text-align: right;">
                              Procto, Visva-Bharati
                              <br>
                              Tel: +91(3463) 262751 (6 lines)
                              <br>
                              Email: info@visva-bharati.ac.in
                            </p>
                          </div>
                        </div>
                      </div>
                      <h3 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Id No: BA2015001</h3>
                      <div style=" position: absolute; top: 35%; right: -227px; transform: translateY(-50%);">
                        <h6 style="transform: rotate(90deg); transform-origin: left top 0;">Emergency No: +91(3463) 262751</h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div style="margin-bottom: 20px;">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck2" checked>
                        <label class="custom-control-label" for="customCheck2" style="font-size: 1rem;">Back</label>
                      </div>
                    </div>
                    <div class="hostel-id back-side" style="width: 100%; background-image: url(images/inside-visva-bharati.png); background-repeat: no-repeat; background-position: center; background-size: cover; background-color: #f3f3f3; padding: 30px 0 0; position: relative;">
                      <img src="images/Visva_bharati_logo.jpg" alt="" width="80px" style="position: absolute; top: 0; left: 30px;">
                      <h2 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Visva-Bharati</h2>
                      <h4 style="font-weight: 600; background-color: #003366; color: #fff; margin: 0; padding: 10px; text-align: center;">Amrapali Girls Hostel</h4>
                      <br>
                      <h5 style="text-align: center;">Santiniketan, West Bengal, India, 731204</h5>
                      <hr>
                      <div style="padding: 10px 30px 42px;">
                        <h5 style="margin-bottom: 15px;">Rules & Regulations</h5>
                        <ul style="font-size: 1rem; font-weight: 500;">
                          <li style="margin: 10px 0;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                          <li style="margin: 10px 0;">Aliquam tincidunt mauris eu risus.</li>
                          <li style="margin: 10px 0;">Vestibulum auctor dapibus neque.</li>
                          <li style="margin: 10px 0;">Nunc dignissim risus id metus.</li>
                          <li style="margin: 10px 0;">Cras ornare tristique elit.</li>
                          <li style="margin: 10px 0;">Vivamus vestibulum ntulla nec ante.</li>
                          <li style="margin: 10px 0;">Praesent placerat risus quis eros.</li>
                          <li style="margin: 10px 0;">Fusce pellentesque suscipit nibh.</li>
                          <li style="margin: 10px 0;">Integer vitae libero ac risus egestas placerat.</li>
                          <li style="margin: 10px 0;">Vestibulum commodo felis quis tortor.</li>
                          <li style="margin: 10px 0;">Ut aliquam sollicitudin leo.</li>
                          <li style="margin: 10px 0;">Cras iaculis ultricies nulla.</li>
                          <li style="margin: 10px 0;">Donec quis dui at dolor tempor interdum.</li>
                          <li style="margin: 10px 0;">Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                          <li style="margin: 10px 0;">Aliquam tincidunt mauris eu risus.</li>
                          <li style="margin: 10px 0;">Vivamus vestibulum ntulla nec ante.</li>
                        </ul>
                      </div>
                      <h3 class="text-uppercase" style="font-weight: bold; background-color: #003399; color: #fff; margin: 0; padding: 10px; text-align: center;">Id No: BA2015001</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
     </div>
    </div>

   