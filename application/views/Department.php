<?php

$this->load->view('includes/header');
$this->load->view('includes/Menu');
?>


<div class="main-content">
<?php
            if ($this->session->flashdata('success')) {
            ?>
                <div class="alert alert-warning    alert-dismissible show fade" id="msgbox1">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
            <?php
            }
            ?>
            <?php
            if ($this->session->flashdata('info')) {


            ?>


                <div class="alert alert-info   alert-dismissible show fade" id="msgbox">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('info'); ?>
                    </div>
                </div>
            <?php
            }
            if ($this->session->flashdata('danger')) {


            ?>


                <div class="alert alert-danger   alert-dismissible show fade" id="msgbox">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                        </button>
                        <?php echo $this->session->flashdata('danger'); ?>
                    </div>
                </div>
            <?php
            }

            ?>

    <section class="section">

        <div class="section-body">
            
            <div class="row">
                <div class="col-12">

                    <div class="card">



                        <div class="col-12 col-md-6 col-lg-6">



                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Add Master Data</li>
                                </ol>
                            </nav>



                        </div>

                        <div class="col-12 col-md-6 col-lg-6">
                            <ul class="nav nav-pills m-1" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab_direction-1">Department</a></li>
                                <li class="nav-item" id="allcat"><a class="nav-link" data-toggle="tab" href="#tab_direction-2">Categories</a></li>
                                <li class="nav-item" id="allq"><a class="nav-link" data-toggle="tab" href="#tab_direction-3">Questions</a></li>

                            </ul>
                        </div>

                        <?php
                        // print_r($SubDept);
                        ?>
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="tab_direction-1" role="tabpanel">

                                <div class="card-body col-12" id="body">

                                    <form id="Departmentform">
                                        <div class="form-row">

                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="deptname">Department Name:</label>
                                                <input type="text" style="text-align: center;" id="deptname" class="form-control" name="deptname" value="" required>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="depthod">Department HOD:</label>
                                                <input type="text" style="text-align: center;" id="depthod" class="form-control" name="depthod" value="" required>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="deptpemail">Primary Email:</label>
                                                <input type="email" style="text-align: center;" id="deptpemail" class="form-control" name="deptpemail" value="" required>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="deptsemail">Secondary Email:</label>
                                                <input type="email" style="text-align: center;" id="deptsemail" class="form-control" name="deptsemail" value="">
                                            </div>


                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">

                                                <label for="deptimg">Upload Image</label>
                                                <div class="col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                    <input type="file" id="deptimg" name="deptimg" required>
                                                </div>

                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3" id="currentimg" style="display: none;">

                                                <div class="form-group">
                                                    Current Image: <img src="" class="rounded" alt="img" height="170" width="200" id="Deptimage" name='Deptimage'>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <div class="custom-control custom-switch mt-4">
                                                    <input type="checkbox" class="custom-control-input" id="deptstatus" name="deptstatus" checked />
                                                    <label class="custom-control-label" for="deptstatus">Status</label>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <br>

                                                <button class="btn btn-icon btn-success" id="saveDept"><i class="fas fa-save"></i>Save</button>

                                                <button class="btn btn-icon btn-success" id="updateDept" style="display: none;"><i class="fas fa-update"></i>Update</button>

                                                <button onclick="formReset()" class="btn btn-secondary">Clear</button>

                                            </div>
                                        </div>
                                    </form>
                                    <div class="container-fluid" id="Depttable" style=" overflow-x: auto; max-width: 100%;"></div>




                                </div>

                            </div>
                            <div class="tab-pane fade" id="tab_direction-2" role="tabpanel">

                                <div class="card-body" id="body">

                                    <form id="Categoryform">

                                        <div class="form-row">

                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="catname">Category Name:</label>
                                                <input type="text" style="text-align: center;" id="catname" class="form-control" name="catname" value="" required>
                                            </div>

                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="catsort">Category Sort Order:</label>
                                                <input type="text" style="text-align: center;" id="catsort" class="form-control" name="catsort" value="" required>
                                            </div>


                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="catrem">Remarks:</label>
                                                <textarea style="text-align: center;" id="catrem" class="form-control" name="catrem" value="" required></textarea>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <div class="custom-control custom-switch mt-4">
                                                    <input type="checkbox" class="custom-control-input" id="catstatus" name="catstatus" checked />
                                                    <label class="custom-control-label" for="catstatus">Status</label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                            <br>

                                            <button class="btn btn-icon btn-success" id="saveCat"><i class="fas fa-save"></i> Save</button>
                                            <button class="btn btn-icon btn-success" id="updateCat" style="display: none;"><i class="fas fa-update"></i>Update</button>
                                            <button onclick="formReset()" class="btn btn-secondary">Clear</button>
                                        </div>
                                    </form>
                                    <div class="container-fluid" id="Cattable" style=" overflow-x: auto; max-width: 100%;"></div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="tab_direction-3" role="tabpanel">

                                <div class="card-body" id="body">


                                    <form id="Questionform">

                                        <div class="form-row">

                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="qcriteria">Select Category:</label>
                                                <select id="dcatid" class="container-fluid">select category</select>

                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="qname">Question:</label>
                                                <input type="text" style="text-align: center;" id="qname" class="form-control" name="qname" value="" required>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="qsort">Question Sort Order:</label>
                                                <input type="text" style="text-align: center;" id="qsort" class="form-control" name="qsort" value="" required>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <label for="qcriteria">Question Criteria:</label>
                                                <input type="text" style="text-align: center;" id="qcriteria" class="form-control" name="qcriteria" value="" required>
                                            </div>
                                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                                <div class="custom-control custom-switch mt-4">
                                                    <input type="checkbox" class="custom-control-input" id="qstatus" name="qstatus" checked />
                                                    <label class="custom-control-label" for="qstatus">Status</label>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                            <br>

                                            <button class="btn btn-icon btn-success" id="saveQ"><i class="fas fa-save"></i> Save</button>
                                            <button class="btn btn-icon btn-success" id="updateQ" style="display: none;"><i class="fas fa-update"></i>Update</button>
                                            <button onclick="formReset()" class="btn btn-secondary">Clear</button>
                                        </div>
                                    </form>

                                    <div class="container-fluid" id="Qtable" style=" overflow-x: auto; max-width: 100%;"></div>

                                </div>

                            </div>

                        </div>



                    </div>





                </div>

            </div>


    </section>
</div>



<?php
$this->load->view('includes/Setting');
$this->load->view('includes/Footer');
?>
<!-- <script src="<?php echo base_url(); ?>assets/js/datagrid/datatables/datatables.bundle.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/select2.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/css/select2.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<script>
    document.getElementById('saveDept').addEventListener('click', function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/createDept') ?>', true)
        let formData = new FormData()
        let deptname = document.getElementById('deptname').value
        let depthod = document.getElementById('depthod').value
        let deptpemail = document.getElementById('deptpemail').value
        let deptsemail = document.getElementById('deptsemail').value
        let deptimg = document.getElementById('deptimg').files[0]
        let deptstatus = document.getElementById('deptstatus').checked ? 1 : 0;
        let user_id = sessionStorage.getItem('Login_id')
        if (depthod != '' || deptname != '' || deptpemail != '') {
            formData.append('deptname', deptname)
            formData.append('depthod', depthod)
            formData.append('deptpemail', deptpemail)
            formData.append('deptsemail', deptsemail)
            formData.append('deptimg', deptimg)
            formData.append('deptstatus', deptstatus)
            formData.append('userid', user_id)
            try {
                xhr.send(formData)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            toastr.success('Department Created Successfully')
                            alldept()
                        } else {
                            toastr.error('Request failed')
                        }
                    }

                }

            } catch {
                alert('Network error')
            }
            formReset()
        } else {
            alert("Please fill all the required fields")
        }
    })

    document.getElementById('saveCat').addEventListener('click', function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/createCat') ?>', true)
        let formData = new FormData()
        let catname = document.getElementById('catname').value
        let catsort = document.getElementById('catsort').value
        let catrem = document.getElementById('catrem').value
        let catstatus = document.getElementById('catstatus').checked ? 1 : 0;
        let user_id = sessionStorage.getItem('Login_id')
        if (catname != '' || catrem != '') {
            formData.append('catname', catname)
            formData.append('catsort', catsort)
            formData.append('catrem', catrem)
            formData.append('catstatus', catstatus)
            formData.append('userid', user_id)
            try {
                xhr.send(formData)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            toastr.success('Category Created Successfully')
                            allcat()
                        } else {
                            toastr.error('Request failed')
                        }
                    }

                }

            } catch {
                alert('Network error')
            }
            formReset()
        } else {
            alert("Please fill all the required fields")
        }
    })

    document.getElementById('saveQ').addEventListener('click', function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/createQ') ?>', true)
        let formData = new FormData()
        let catid = document.getElementById('dcatid').value
        let qname = document.getElementById('qname').value
        let qsort = document.getElementById('qsort').value
        let qcriteria = document.getElementById('qcriteria').value
        let qstatus = document.getElementById('qstatus').checked ? 1 : 0;
        let user_id = sessionStorage.getItem('Login_id')
        if (qcriteria != '' || qsort != '' || qname != '') {
            formData.append('catid', catid)
            formData.append('qname', qname)
            formData.append('qsort', qsort)
            formData.append('qcriteria', qcriteria)
            formData.append('qstatus', qstatus)
            formData.append('userid', user_id)
            try {
                xhr.send(formData)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            toastr.success('Question Created Successfully')
                            allqs()
                        } else {
                            toastr.error('Request failed')
                        }
                    }

                }

            } catch {
                alert('Network error')
            }
            formReset()
        } else {
            alert("Please fill all the required fields")
        }
    })

    let button = document.getElementById('allq')
    let sca = document.getElementById('dcatid')
    button.addEventListener('click', function(e) {
        document.getElementById('dcatid').textContent = ''
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/getCat') ?>', true)
        xhr.responseType = 'json';
        xhr.send()
        xhr.onload = function() {
            let response = xhr.response;

            for (let i = 0; i < response.length; i++) {
                let option = document.createElement('option')
                option.value = response[i].CatID;
                option.text = response[i].CatName;
                sca.appendChild(option)
            }

        }

    })

    function alldept() {
        let xhr = new XMLHttpRequest();

        xhr.open('GET', '<?php echo base_url('Main/getAllDept') ?>', true);
        xhr.responseType = 'json';
        xhr.send();

        xhr.onload = function() {
            let data = xhr.response;
            try {
                let html = '';
                html += `<table id="innerDepttable" class="table table-bordered table-stripped "style="min-width:900px">
                        <thead class="bg-primary-600">
                            <tr>
                                <th>Department Name</th>
                                <th>Department Head</th>
                                <th>Department Email</th>                                                    
                                <th>Department Email 2</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                data.forEach(element => {
                    html += `<tr>    
                                <td>${element.DeptName}</td>
                                <td>${element.DeptHOD}</td>
                                <td>${element.DeptEmail1}</td>
                                <td>${element.DeptEmail2}</td>
                                <td>${element.DeptStatus ? "Active" : "Inactive"}</td>    
                                <td>											 
												<button type="button" style="display: inline-block;" class="btn btn-primary btn-sm updatebtn2" id="" onclick="editDept(${element.DeptIID})"><i class="fas fa-edit" aria-hidden="true"></i></button>  &nbsp;
                                
                                				<button type="button" style="display: inline-block;" class="btn btn-danger btn-sm updatebtn2" id="" onclick="deleteDept(${element.DeptIID})"><i class="fas fa-trash" aria-hidden="true" ></i></button>												
											</td>
                            </tr>`;
                });
                html += `</tbody></table>`;

                document.getElementById('Depttable').innerHTML = html;

                $('#innerDepttable').dataTable({
                    order: [0, "desc"],
                    dom: "Bfrtip",
                    buttons: ["copy", "csv", "excel", "pdf", "print"],
                });
            } catch (error) {
                console.log("error");
                // alert("Error occurred while processing data");
            }
        };
    }

    function allcat() {


        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/getAllCat') ?>', true)
        xhr.responseType = 'json';
        xhr.send()
        xhr.onload = function() {
            let data = xhr.response;
            try {
                let html = ''
                html += `<table id="innerCattable" class="table table-bordered table-stripped "style="min-width:900px">
                                    <thead class="bg-primary-600">
                                        <tr>
                                            <th>Category Name</th>
                                            <th>Category Sort Order</th>
                                            <th>Category Remarks</th>
                                            <th>Category Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                data.forEach(element => {
                    html += `<tr>	
                            <td>${element.CatName}</td>
                            <td>${element.CatSortOrder}</td>
                            <td>${element.CatRemarks}</td>
                            <td>${element.CatStatus ? "Active" : "Inactive"}</td>

                            <td>											 
                                <button type="button" style="display: inline-block;" class="btn btn-primary btn-sm updatebtn2" id="" onclick="editCat(${element.CatID})"><i class="fas fa-edit" aria-hidden="true"></i></button>  &nbsp;
                
                                <button type="button" style="display: inline-block;" class="btn btn-danger btn-sm updatebtn2" id="" onclick="deleteCat(${element.CatID})"><i class="fas fa-trash" aria-hidden="true" ></i></button>												
                            </td>
                                    
                    </tr>`
                })
                html += `</tbody></table>`;
                document.getElementById('Cattable').innerHTML = html;
                $('#innerCattable').dataTable({
                    order: [0, "desc"],
                    dom: "Bfrtip",
                    buttons: ["copy", "csv", "excel", "pdf", "print"],
                });
            } catch (error) {
                console.log('error');
                // alert("error")
            }
        }
    }


    function allqs() {


        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/getAllQs') ?>', true)
        xhr.responseType = 'json'
        xhr.send()
        xhr.onload = function() {
            let data = xhr.response;

            try {
                let html = ''
                html += `<table id="innerQtable" class="table table-bordered table-stripped " style="min-width:900px">
                            <thead class="bg-primary-600">
                                <tr>
                                    <th>Question Name</th>
                                    <th>Question Sort Order</th>
                                    <th>Question Criteria</th>
                                    <th>Question Status</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>`;
                data.forEach(element => {
                    html += `<tr>	
                    <td>${element.QuestionName}</td>
                    <td>${element.QuestionSortOrder}</td>
                    <td>${element.QuestionCriteria}</td>
                    <td>${element.QuestionStatus ? "Active" : "Inactive"}</td>
                    <td>${element.CatName}</td>

                    <td>											 
                        <button type="button" style="display: inline-block;" class="btn btn-primary btn-sm updatebtn2" id="" onclick="editQ(${element.QuestionID})"><i class="fas fa-edit" aria-hidden="true"></i></button>  &nbsp;
        
                        <button type="button" style="display: inline-block;" class="btn btn-danger btn-sm updatebtn2" id="" onclick="deleteQ(${element.QuestionID})"><i class="fas fa-trash" aria-hidden="true" ></i></button>												
                    </td>
                            
            </tr>`
                })
                html += `</tbody></table>`
                document.getElementById('Qtable').innerHTML = html;
                $('#innerQtable').dataTable({
                    order: [0, "desc"],
                    dom: "Bfrtip",
                    buttons: ["copy", "csv", "excel", "pdf", "print"],
                });
            } catch (error) {
                console.log('error');
                // alert("error")
            }
        }
    }

    document.getElementById('updateDept').addEventListener('click', function(e) {

        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/updateDept') ?>?ID=' + GID, true)
        let formData = new FormData()
        let deptname = document.getElementById('deptname').value
        let depthod = document.getElementById('depthod').value
        let deptpemail = document.getElementById('deptpemail').value
        let deptsemail = document.getElementById('deptsemail').value
        let deptimg1 = document.getElementById('deptimg').files[0]
        let deptimg2 = document.getElementById('deptimg').value
        let deptimg = deptimg2.substr(deptimg2.indexOf("\\") + 10)

        let currentdeptimg = document.getElementById('Deptimage').src
        let deptstatus = document.getElementById('deptstatus').checked ? 1 : 0;
        let user_id = sessionStorage.getItem('Login_id')
        if (depthod != '' || deptname != '' || deptpemail != '') {
            formData.append('deptname', deptname)
            formData.append('depthod', depthod)
            formData.append('deptpemail', deptpemail)
            formData.append('deptsemail', deptsemail)
            formData.append('deptimg1', deptimg1)
            formData.append('deptimg', deptimg)
            formData.append('currentdeptimg', currentdeptimg)
            formData.append('deptstatus', deptstatus)
            formData.append('userid', user_id)
            try {
                xhr.send(formData)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            toastr.success('Department Updated Successfully')
                            document.getElementById('saveDept').style.display = 'block'
                            document.getElementById('updateDept').style.display = 'none'
                            document.getElementById('currentimg').style.display = 'none';
                            alldept()
                        } else {
                            toastr.error('Request failed')
                        }
                    }

                }

            } catch {
                alert('Network error')
            }
            // formReset()
        } else {
            alert("Please fill all the required fields")
        }
    })

    let GID;

    editDept = (DeptIID) => {
        document.getElementById('saveDept').style.display = 'none'
        document.getElementById('updateDept').style.display = 'block'
        document.getElementById('currentimg').style.display = 'block';
        GID = DeptIID
        let ID = DeptIID;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/editDept') ?>?ID=' + ID);

        xhr.onload = function() {
            let response = JSON.parse(this.responseText); // Parse the JSON string into a JavaScript object

            let stat = response[0].DeptStatus;
            if (response[0].DeptStatus == 0) {
                stat = false
            } else {
                stat = true
            }

            let checked = true;
            let unchecked = false;
            console.log(response);
            document.getElementById('deptname').value = response[0].DeptName; // Access the DeptName property
            document.getElementById('depthod').value = response[0].DeptHOD; // Access the DeptName property
            document.getElementById('deptpemail').value = response[0].DeptEmail1; // Access the DeptName property
            document.getElementById('deptsemail').value = response[0].DeptEmail2; // Access the DeptName property
            document.getElementById('Deptimage').src = '<?php echo base_url('assets/img/6SAudit/') ?>' + response[0].DeptPics; // Access the DeptName property
            document.getElementById('deptstatus').checked = stat;

        }
        xhr.send();
    };

    deleteDept = (DeptIID) => {
        let ID = DeptIID;
        let xhr = new XMLHttpRequest();

        // Display a confirmation dialog
        let confirmation = confirm("Do you want to delete this entry?");

        // Check if the user clicked "OK" in the confirmation dialog
        if (confirmation) {
            xhr.open('POST', '<?php echo base_url('Main/deleteDept') ?>?ID=' + ID);
            try {
                xhr.send();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        // alert(xhr.response);
                        alert("deleted successfully")
                        alldept()
                        // if (xhr.status == 200) {
                        //     alert("success");
                        // } else {
                        //     alert("no data");
                        // }
                    }
                };
            } catch (error) {
                alert("Network error");
            }
        }
    };

    document.getElementById('updateCat').addEventListener('click', function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/updateCat') ?>?ID=' + CID, true)
        let formData = new FormData()
        let catname = document.getElementById('catname').value
        let catsort = document.getElementById('catsort').value
        let catrem = document.getElementById('catrem').value
        let catstatus = document.getElementById('catstatus').checked ? 1 : 0;
        let user_id = sessionStorage.getItem('Login_id')
        if (catname != '' || catsort != '' || catrem != '') {
            formData.append('catname', catname)
            formData.append('catsort', catsort)
            formData.append('catrem', catrem)
            formData.append('catstatus', catstatus)
            formData.append('userid', user_id)
            try {
                xhr.send(formData)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            toastr.success('Category Updated Successfully')
                            document.getElementById('saveCat').style.display = 'block'
                            document.getElementById('updateCat').style.display = 'none'
                            allcat()
                        } else {
                            toastr.error('Request failed')
                        }
                    }

                }

            } catch {
                alert('Network error')
            }
            formReset()
        } else {
            alert("Please fill all the required fields")
        }
    })

    let CID;

    editCat = (CatID) => {
        document.getElementById('saveCat').style.display = 'none'
        document.getElementById('updateCat').style.display = 'block'

        CID = CatID
        let ID = CatID;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/editCat') ?>?ID=' + ID);

        xhr.onload = function() {
            let response = JSON.parse(this.responseText);
            let status = response[0].catstatus;
            if (response[0].catstatus == 0) {
                status = false
            } else {
                status = true
            }

            let checked = true;
            let unchecked = false;

            document.getElementById('catname').value = response[0].CatName; // Access the DeptName property
            document.getElementById('catsort').value = response[0].CatSortOrder; // Access the DeptName property
            document.getElementById('catrem').value = response[0].CatRemarks; // Access the DeptName property
            document.getElementById('catstatus').checked = status; // Access the DeptName property


        }
        xhr.send();
    };

    deleteCat = (CatID) => {
        let ID = CatID;
        let xhr = new XMLHttpRequest();

        // Display a confirmation dialog
        let confirmation = confirm("Do you want to delete this entry?");

        // Check if the user clicked "OK" in the confirmation dialog
        if (confirmation) {
            xhr.open('POST', '<?php echo base_url('Main/deleteCat') ?>?ID=' + ID);
            try {
                xhr.send();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        // alert(xhr.response);
                        if (xhr.status === 200) {
                            toastr.success('deleted successfully')
                            allcat()
                        } else {
                            toastr.error('Cant delete, questions exist in this category')
                        }
                    }
                };
            } catch (error) {
                alert("Network error");
            }
        }
    };

    document.getElementById('updateQ').addEventListener('click', function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/updateQ') ?>?ID=' + QID, true)
        let formData = new FormData()
        let qname = document.getElementById('qname').value
        let qsort = document.getElementById('qsort').value
        let qcriteria = document.getElementById('qcriteria').value
        let qstatus = document.getElementById('qstatus').checked ? 1 : 0;
        let dcatid = document.getElementById('dcatid').value
        let user_id = sessionStorage.getItem('Login_id')
        if (qname != '' || qsort != '' || qcriteria != '') {
            formData.append('qname', qname)
            formData.append('qsort', qsort)
            formData.append('qcriteria', qcriteria)
            formData.append('qstatus', qstatus)
            formData.append('dcatid', dcatid)
            try {
                xhr.send(formData)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            toastr.success('Category Updated Successfully')
                            document.getElementById('saveQ').style.display = 'block'
                            document.getElementById('updateQ').style.display = 'none'
                            allqs()
                        } else {
                            toastr.error('Request failed')
                        }
                    }

                }

            } catch {
                alert('Network error')
            }
            formReset()
        } else {
            alert("Please fill all the required fields")
        }
    })

    let QID;

    editQ = (QuestionID) => {
        document.getElementById('saveQ').style.display = 'none'
        document.getElementById('updateQ').style.display = 'block'

        QID = QuestionID
        let ID = QuestionID;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/editQ') ?>?ID=' + ID);

        xhr.onload = function() {
            let response = JSON.parse(this.responseText);

            let status = response[0].QuestionStatus

            if (response[0].QuestionStatus == 0) {
                status = false;
            } else {
                status = true;
            }
            let checked = true;
            let unchecked = false;

            document.getElementById('qname').value = response[0].QuestionName; // Access the DeptName property
            document.getElementById('qsort').value = response[0].QuestionSortOrder; // Access the DeptName property
            document.getElementById('qcriteria').value = response[0].QuestionCriteria; // Access the DeptName property
            document.getElementById('qstatus').checked = status; // Access the DeptName property
            document.getElementById('dcatid').value = response[0].CategoryID;
        }
        xhr.send();
    };

    deleteQ = (QuestionID) => {
        let ID = QuestionID;
        let xhr = new XMLHttpRequest();

        // Display a confirmation dialog
        let confirmation = confirm("Do you want to delete this entry?");

        // Check if the user clicked "OK" in the confirmation dialog
        if (confirmation) {
            xhr.open('POST', '<?php echo base_url('Main/deleteQ') ?>?ID=' + ID);
            try {
                xhr.send();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        // alert(xhr.response);
                        alert("deleted successfully")
                        allqs()
                    }
                };
            } catch (error) {
                alert("Network error");
            }
        }
    };

    document.addEventListener("DOMContentLoaded", function() {
        alldept()
        allcat()
        allqs()



    });



    function formReset() {
        document.getElementById('Departmentform').reset()
        document.getElementById('saveDept').style.display = 'inline'
        document.getElementById('updateDept').style.display = 'none'
        document.getElementById('Categoryform').reset()
        document.getElementById('saveCat').style.display = 'inline'
        document.getElementById('updateCat').style.display = 'none'
        document.getElementById('Questionform').reset()
        document.getElementById('saveQ').style.display = 'inline'
        document.getElementById('updateQ').style.display = 'none'
        document.getElementById('currentimg').style.display = 'none'
    }
</script>