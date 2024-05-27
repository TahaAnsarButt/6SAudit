<?php

$this->load->view('includes/header');
$this->load->view('includes/Menu');
?>


<div class="main-content">

    <section class="section">

        <div class="section-body">
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
            <div class="row">
                <div class="col-12">

                    <div class="card">



                        <div class="col-12 col-md-6 col-lg-6">



                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Add New Audit</li>
                                </ol>
                            </nav>



                        </div>


                        <div class="tab-content py-3">

                            <div class="card-body col-12" id="body">

                                <form id="Auditform">
                                    <div class="form-row">

                                        <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                            <label for="auditname">Audit Name:</label>
                                            <input type="text" style="text-align: center;" id="auditname" class="form-control" name="auditname" value="" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="auditdate">Audit Date:</label>
                                            <input type="date" style="text-align: center; max-width:150px" id="auditdate" class="form-control" name="auditdate" value="" required>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                            <label for="auditorname">Auditor Name:</label>
                                            <input type="text" style="text-align: center;" id="auditorname" class="form-control" name="auditorname" value="" required>
                                        </div>
                                        <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                            <label for="auditoremail">Auditor Email:</label>
                                            <input type="email" style="text-align: center;" id="auditoremail" class="form-control" name="auditoremail" value="" required>
                                        </div>

                                        <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                            <div class="custom-control custom-switch mt-4">
                                                <input type="checkbox" class="custom-control-input" id="auditstatus" name="auditstatus" checked />
                                                <label class="custom-control-label" for="auditstatus">Status</label>
                                            </div>

                                        </div>

                                        <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                            <br>

                                            <button class="btn btn-icon btn-success" id="saveAudit"><i class="fas fa-save"></i>Save</button>

                                            <button class="btn btn-icon btn-success" id="updateAudit" style="display: none;"><i class="fas fa-update"></i>Update</button>

                                            <button onclick="formReset()" class="btn btn-secondary">Clear</button>

                                        </div>
                                    </div>
                                </form>
                                <div  class="container-fluid" id="Audittable" style=" overflow-x: auto; max-width: 100%;"></div>





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
    class clock {
        constructor() {}
        getCurrentTime() {
            const date = new Date;
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based, so adding 1
            const year = date.getFullYear();
            return `${year}-${month}-${day}`;
        }
    }

    document.addEventListener('DOMContentLoaded', function(){
        const newTime = new clock();
        document.getElementById('auditdate').value = newTime.getCurrentTime()
    })

    document.getElementById('saveAudit').addEventListener('click', function(e) {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/createAudit') ?>', true)
        let formData = new FormData()
        let auditname = document.getElementById('auditname').value
        let auditorname = document.getElementById('auditorname').value
        let auditoremail = document.getElementById('auditoremail').value
        let auditdate = document.getElementById('auditdate').value;
        let auditstatus = document.getElementById('auditstatus').checked ? 1 : 0;
        let user_id = sessionStorage.getItem('Login_id')
        if (auditorname != '' || auditname != '' || auditoremail != '') {
            formData.append('auditname', auditname)
            formData.append('auditorname', auditorname)
            formData.append('auditoremail', auditoremail)
            formData.append('auditdate', auditdate)
            formData.append('auditstatus', auditstatus)
            formData.append('userid', user_id)
            try {
                xhr.send(formData)
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            let response = JSON.parse(xhr.responseText);
                            if (response === false) {
                                toastr.error('Error: Audit status cannot be 0');
                            } else {
                                toastr.success('Audit Created Successfully')
                                allAudit()
                                formReset()
                            }

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




    function allAudit() {
        let xhr = new XMLHttpRequest();

        xhr.open('GET', '<?php echo base_url('Main/getAllAudit') ?>', true);
        xhr.responseType = 'json';
        xhr.send();

        xhr.onload = function() {
            let data = xhr.response;
            try {
                let html = '';
                html += `<table id="innerAudittable" class="table table-bordered table-stripped " style="min-width:900px">
                        <thead class="bg-primary-600">
                            <tr>
                                <th>Audit Name</th>
                                <th>Audit Date</th>
                                <th>Auditor Name</th>
                                <th>Auditor Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>`;
                data.forEach(element => {
                    html += `<tr>    
                                <td>${element.AuditName}</td>
                                <td>${element.AuditStartDate.split(' ')[0] ? element.AuditStartDate.split(' ')[0] : ''}</td>
                                <td>${element.AuditorName}</td>
                                <td>${element.AuditorEmail}</td>
                                <td>${element.AuditStatus === 1 ? 'Active' : 'Inactive'}</td> 
                                <td>											 
												<button type="button" style="display: inline-block;" class="btn btn-primary btn-sm updatebtn2" id="" onclick="editAudit(${element.AuditID})"><i class="fas fa-edit" aria-hidden="true"></i></button>  &nbsp;
                                
                                				<button type="button" style="display: inline-block;" class="btn btn-danger btn-sm updatebtn2" id="" onclick="deleteAudit(${element.AuditID})"><i class="fas fa-trash" aria-hidden="true" ></i></button>												
											</td>
                            </tr>`;
                });
                html += `</tbody></table>`;

                document.getElementById('Audittable').innerHTML = html;

                $('#innerAudittable').dataTable({
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


    document.getElementById('updateAudit').addEventListener('click', function(e) {

        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '<?php echo base_url('Main/updateAudit') ?>?ID=' + GID, true)
        let formData = new FormData()
        let auditname = document.getElementById('auditname').value
        let auditorname = document.getElementById('auditorname').value
        let auditoremail = document.getElementById('auditoremail').value
        let auditdate = document.getElementById('auditdate').value;
        let auditstatus = document.getElementById('auditstatus').checked ? 1 : 0;
        let user_id = sessionStorage.getItem('Login_id')
        if (auditorname != '' || auditname != '' || auditoremail != '') {
            formData.append('auditname', auditname)
            formData.append('auditorname', auditorname)
            formData.append('auditoremail', auditoremail)
            formData.append('auditdate', auditdate)
            formData.append('auditstatus', auditstatus)
            formData.append('userid', user_id)
            try {
                xhr.send(formData)
                console.log(typeof formData);
                console.log(formData);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        if (xhr.status === 200) {
                            toastr.success('Audit Updated Successfully')
                            document.getElementById('saveAudit').style.display = 'block'
                            document.getElementById('updateAudit').style.display = 'none'
                            allAudit()
                            formReset()
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

    editAudit = (AuditID) => {
        document.getElementById('saveAudit').style.display = 'none'
        document.getElementById('updateAudit').style.display = 'block'
        GID = AuditID
        let ID = AuditID;
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/editAudit') ?>?ID=' + ID);

        xhr.onload = function() {
            let response = JSON.parse(this.responseText); // Parse the JSON string into a JavaScript object

            let stat = response[0].AuditStatus;
            if (response[0].AuditStatus == 0) {
                stat = false
            } else {
                stat = true
            }

            let checked = true;
            let unchecked = false;
            console.log(response);
            document.getElementById('auditname').value = response[0].AuditName; // Access the DeptName property
            document.getElementById('auditorname').value = response[0].AuditorName; // Access the DeptName property
            document.getElementById('auditoremail').value = response[0].AuditorEmail; // Access the DeptName property
            document.getElementById('auditdate').value = response[0].AuditStartDate; // Access the DeptName property
            document.getElementById('auditstatus').checked = stat;

        }
        xhr.send();
    };

    deleteAudit = (AuditID) => {
        let ID = AuditID;
        let xhr = new XMLHttpRequest();

        // Display a confirmation dialog
        let confirmation = confirm("Do you want to delete this entry?");

        // Check if the user clicked "OK" in the confirmation dialog
        if (confirmation) {
            xhr.open('POST', '<?php echo base_url('Main/deleteAudit') ?>?ID=' + ID);
            try {
                xhr.send();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4) {
                        // alert(xhr.response);
                        alert("deleted successfully")
                        allAudit()
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


    document.addEventListener("DOMContentLoaded", function() {
        allAudit()
    });



    function formReset() {
        document.getElementById('Auditform').reset()
        document.getElementById('saveAudit').style.display = 'inline'
        document.getElementById('updateAudit').style.display = 'none'
    }
</script>