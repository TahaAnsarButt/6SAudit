<?php

$this->load->view('includes/header');
$this->load->view('includes/Menu');
?>


<div class="main-content">
    <div class="modal fade" id="qimgmodal" tabindex="-1" role="dialog" aria-labelledby="qimgmodal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="qimgmodal">Images</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="showalert" class="text-success"></div>
                    <form action="<?php echo base_url('Main/submitRemarks') ?>" method="post" id="imageUploadForm" enctype="multipart/form-data">
                        <input type="hidden" name="editid" id="editid">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    Before Image: <img id="bimg" w idth="170" height="150">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    After Image:<img id="aimg" width="170" height="150">
                                </div>
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                <label for="brem">Before image Remarks:</label>
                                <textarea style="text-align: center;" id="brem" class="form-control" name="brem" value="" required></textarea>
                            </div>
                            <div class="form-group col-md-3 col-sm-3 col-lg-3 col-xl-3 col-xs-3">
                                <label for="arem">After image Remarks:</label>
                                <textarea style="text-align: center;" id="arem" class="form-control" name="arem" value="" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update Remarks and Close</button>
                            <!-- <button type="button" class="btn btn-primary" id="close" data-dismiss="modal">Save and Close</button> -->
                        </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="reportmodal" tabindex="-1" role="dialog" aria-labelledby="reportmodal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reportmodal">Report</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div id="showalert" class="text-success"></div>
                    <div>

                        <table id="innerQtable" class="table table-bordered table-stripped ">
                            <thead class="bg-success-600">
                                <tr>
                                    <th>Category</th>
                                    <th>Total Findings</th>
                                    <th>Total Score</th>
                                </tr>
                            </thead>
                            <tbody id="reporttable">
                            </tbody>

                        </table>
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="submit" class="btn btn-primary">Save and Close</button> -->
                        <!-- <button type="button" class="btn btn-primary" id="close" data-dismiss="modal">Close</button> -->
                    </div>
                </div>
            </div>
        </div>

    </div>

    <section class="section">

        <div class="section-body">
            <div class="row">
                <div class="col-12">

                    <div class="card">

                        <div class="col-12 col-md-6 col-lg-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">Manage Audit</li>
                                </ol>
                            </nav>
                        </div>

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




                        <div class="card-body" id="body">




                            <div class="row">
                                <form id="Questionform">


                                    <div class="form-group col-md-4 col-sm-4 col-lg-3 col-xl-3 col-xs-4">
                                        <label for="auditid">Please Select Audit No:</label>
                                        <select id="auditid" class="container-fluid">select category</select>
                                    </div>

                                    <div class="form-group col-md-4 col-sm-4 col-lg-3 col-xl-3 col-xs-4">
                                        <label for="deptid"> Please Select Department:</label>
                                        <select id="deptid" class="container-fluid">select Department</select>
                                    </div>




                                </form>

                                <div class="p-3">
                                    <button class="btn btn-info" id="search" onclick="getcategories()">Search</button>
                                </div>

                                <div class="p-3 col-md-4 col-sm-4 col-lg-3 col-xl-3 col-xs-4" style="display: flex; justify-content:right;">
                                    <button class="btn btn-light" id="showreport" onclick="openreportmodal()">Audit result</button>
                                </div>

                            </div>

                            <div class="p-3" id="astat">
                                <h5></h5>
                            </div>


                            <div >
                                <div id="appendcat"></div>
                            </div>
                            <div class="col-md-2">
                                <br>

                                <button class="btn btn-icon btn-success" id="saveQ" style="display: none;"><i class="fas fa-save"></i> Save</button>
                                <button class="btn btn-icon btn-success" id="updateQ" style="display: none;"><i class="fas fa-update"></i>Update</button>
                                <!-- <button class="btn btn-secondary" id="clearQ" style="display: none;" onclick="formReset()">Clear</button> -->
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



    function openmodal(AuditDetailID, BeforePics, AfterPics) {

        // let boundOpen = open.bind({
        //     AuditDetailID: AuditDetailID,
        //     BeforePics: BeforePics,
        //     AfterPics: AfterPics
        // });
        // boundOpen();

        // function open() {
        //     // openmodal.apply([this.AuditDetailID, this. BeforePics, this.AfterPics])
        //     openmodal.apply(this, [this.AuditDetailID, this.BeforePics, this.AfterPics]);
        // }
        // alert(this)


        document.getElementById('editid').value = AuditDetailID;
        document.getElementById('bimg').src = '<?php echo base_url('assets/img/6SAudit/') ?>' + BeforePics;
        document.getElementById('aimg').src = '<?php echo base_url('assets/img/6SAudit/') ?>' + AfterPics;
        document.getElementById('qimgmodal').classList.add('show');
        document.getElementById('qimgmodal').style.display = 'block';
        document.body.classList.add('modal-open');

    }

    function openreportmodal() {
        const AID = document.getElementById('auditid').value;
        const DID = document.getElementById('deptid').value;



        let xhr = new XMLHttpRequest();

        xhr.open('GET', '<?php echo base_url('Main/getReport') ?>?ID=' + AID + '&DID=' + DID);
        xhr.send();

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                let response = JSON.parse(xhr.responseText);

                let html = '';
                for (let i = 0; i < response.length; i++) {
                    html += `
                                <tr>
                                    <td>${response[i].CatName}</td>
                                    <td>${response[i].totalfinding}</td>
                                    <td>${response[i].totalmarks}</td>
                                </tr>
                            `;
                }
                document.getElementById('reporttable').innerHTML = html;

            } else {
                console.error('Request failed with status', xhr.status);
            }
        };

        xhr.onerror = function() {
            console.error('Request failed');
        };

        document.getElementById('reportmodal').classList.add('show');
        document.getElementById('reportmodal').style.display = 'block';
        document.body.classList.add('modal-open');

    }

    document.querySelector('#qimgmodal .close').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('qimgmodal').style.display = 'none';
    })

    document.querySelector('#reportmodal .close').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('reportmodal').style.display = 'none';
    })

    // document.querySelector('#qimgmodal #close').addEventListener('click', function(e) {
    //     e.preventDefault();
    //     document.getElementById('qimgmodal').style.display = 'none';
    // })


    window.onload = function() {


        let auditdropdown = document.getElementById('auditid')
        document.getElementById('auditid').textContent = ''
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '<?php echo base_url('Main/getAllAudit') ?>', true)
        xhr.responseType = 'json';
        xhr.send()
        xhr.onload = function() {
            let response = xhr.response;

            for (let i = 0; i < response.length; i++) {
                let option = document.createElement('option')
                option.value = response[i].AuditID;
                option.text = response[i].AuditName;
                auditdropdown.appendChild(option)
            }

        }

        let depttdropdown = document.getElementById('deptid')
        document.getElementById('deptid').textContent = ''
        let xhr2 = new XMLHttpRequest();
        xhr2.open('GET', '<?php echo base_url('Main/getAllDept') ?>', true)
        xhr2.responseType = 'json';
        xhr2.send()
        xhr2.onload = function() {
            let response = xhr2.response;

            for (let i = 0; i < response.length; i++) {
                let option = document.createElement('option')
                option.value = response[i].DeptIID;
                option.text = response[i].DeptName;
                depttdropdown.appendChild(option)
            }

        }

    }


    let auditname

    function getcategories() {

        let auditDropdown = document.getElementById('auditid');
        let selectedIndex = auditDropdown.selectedIndex;
        let selectedAuditName = auditDropdown.options[selectedIndex].text;

        document.getElementById('astat').textContent = `${selectedAuditName} status Open`;

        let depttdropdown = document.getElementById('deptid')
        // document.getElementById('deptid').textContent = ''
        let xhr2 = new XMLHttpRequest();
        xhr2.open('GET', '<?php echo base_url('Main/getActiveCat') ?>', true)
        xhr2.responseType = 'json';
        xhr2.send()
        xhr2.onload = function() {
            let response = xhr2.response;
            let html = '<ul class="nav nav-tabs" id="myTab" role="tablist">'

            for (let i = 0; i < response.length; i++) {

                html += `
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="${response[i].CatID}-tab" data-bs-toggle="tab" data-bs-target="#${response[i].CatID}" type="button" role="tab" aria-controls="${response[i].CatID}" aria-selected onclick = getQ("${response[i].CatID}")>${response[i].CatName}</button>
                </li>
            `;
            }
            html += `</ul>`;
            html += `<div class="tab-content py-3" id = "appends">`;

            for (let i = 0; i < 1; i++) {
                html += `
                        <div class="tab-pane fade show active" id="${response[i].CatID}" role="tabpanel" aria-labelledby="tab-${response[i].CatID}">
                        <div class="form-row">
                        <div id="Qtable" style=" overflow-x: auto; max-width: 100%;">
                        <table id="innerQtable" class="table table-bordered table-stripped" style="min-width:900px">
                            <thead class="bg-success-600" >
                                <tr>
                                    <th>Question</th>
                                    <th>Total Findings</th>
                                    <th>Score</th>
                                    <th>Before Picture</th>
                                    <th>After Picture</th>
                                    <th>CAP</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody id = "tbody1">`
            }

            html += `</div>`;
            document.getElementById('appendcat').innerHTML = html;
            // console.log('html', html);
        }
    }


    let AID;
    let DID


    let CtID;

    function getQ(CatID) {

        document.getElementById('saveQ').style.display = 'inline'
        // document.getElementById('clearQ').style.display = 'inline'

        CtID = CatID
        let existingqid = [];
        let filteredarr = [];
        let xhr = new XMLHttpRequest();

        xhr.open('GET', '<?php echo base_url('Main/getQ') ?>?ID=' + CatID);
        xhr.send();

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                let response = JSON.parse(xhr.responseText);
                existingqid = Object.values(response);
                filteredarr = existingqid.map(item => item.QuestionID);
                renderQuestions(response);
                getAuditDetails(filteredarr);
            } else {
                console.error('Request failed with status', xhr.status);
            }
        };

        xhr.onerror = function() {
            console.error('Request failed');
        };
        console.log('response', xhr.responseText);
        console.log('filteredarr', filteredarr);
        console.log('existingqid', existingqid);
    }

    function renderQuestions(response) {
        let html = '';
        for (let i = 0; i < response.length; i++) {
            html += `
                                <tr class="tablerows">
                                    <td data-q="questionid${response[i].QuestionID}">${response[i].QuestionName}</td>
                                    <td data-q="findings"><input type="text" style="text-align: center; max-width:100px" id="qfindings" class="form-control" name="qfindings" value="${response[i].Finding}" required></td>
                                    <td data-q="score${response[i].AuditDetailID}"><input type="text" style="text-align: center; max-width:100px" id="qscore" class="form-control" name="qscore" value="4" readonly></td>
                                    <td data-q="apic"><input  type="file" id="apic" name="apic"></td>
                                    <td data-q="apic1"><input  type="file" id="apic1" name="apic1"></td>
                                    <td><button class="btn btn-icon btn-primary" onclick = "openmodal(${response[i].AuditDetailID}, '${response[i].BeforePics}', '${response[i].AfterPics}')">CAP</button></td>
                                    <td data-q="date"><input type="date" style="text-align: center; max-width:150px" id="qdate" class="form-control" name="qdate" value="" required></td>
                                </tr>
                            `;
        }
        html += `</tbody>
        <tfoot>
        <tr><th></th><td id="ftotal"><td id="qtotal"></td></tr>
        </tfoot>
        
                        </table>
                    </div>
                </div> 
            </div>`
        document.getElementById('tbody1').innerHTML = html;
        let allq = response.map(item => item.QuestionMarks)
        let totalq = allq.reduce((a, b) => a + b, 0)
        let sumq = document.getElementById('qtotal');
        sumq.innerText = totalq;
        sumq.style.textAlign = 'center'

        let allf = response.map(item => parseInt(item.Finding))
        let total = allf.reduce((a, b) => a + b, 0)
        let sum = document.getElementById('ftotal');
        sum.innerText = total;
        sum.style.textAlign = 'center'
    }

    let existingids = []
    let Datearray = []

    function getAuditDetails(filteredarr) {
        // alert(CtID)
        const AID = document.getElementById('auditid').value;
        // const DID = document.getElementById('deptid').value;
        const xhr = new XMLHttpRequest();

        xhr.open('POST', '<?php echo base_url('Main/getAuditDetail') ?>?ID=' + AID, true);
        xhr.responseType = 'json';
        xhr.send();

        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 300) {
                const response = xhr.response;
                // console.log('arrayres',response);

                const newtime = new clock()

                existingids = response.map((item) => item.AuditDetailID)
                // console.log(existingids);
                const rows = document.querySelectorAll('.tablerows');
                rows.forEach((row, index) => {
                    if (response[index]) {
                        // row.querySelector('[data-q="findings"] input').value = response[index].Finding;

                    }

                    let dates = row.querySelector('[data-q="date"] input').value = newtime.getCurrentTime();
                });
            } else {
                console.error('Request failed with status', xhr.status);
            }
            console.log('existingids', existingids)
        };

        xhr.onerror = function() {
            console.error('Request failed');
        };
    }

    let img;
    let img1;
    let auditidsarray = []
    let auditids;

    document.getElementById('saveQ').addEventListener('click', function(e) {
        e.preventDefault();
        let currentvalue = document.querySelectorAll('.tablerows');
        let formData = new FormData();

        currentvalue.forEach((val, index) => {
            let auditidsscore = val.querySelector('[data-q^="score"]').getAttribute('data-q')
            let findingValueElement = val.querySelector('[data-q="findings"] input').value;
            let dates = val.querySelector('[data-q="date"] input').value;
            let questionidattr = val.querySelector('[data-q^="questionid"]').getAttribute('data-q');
            let questionid = questionidattr.replace('questionid', '');
            auditids = auditidsscore.replace('score', '');

            img = val.querySelector('[data-q="apic"] input[type="file"]');
            img1 = val.querySelector('[data-q="apic1"] input[type="file"]');

            if (!existingids.includes(auditids)) {
                auditidsarray.push(auditids)




                //check before pushing
                // if (!existingids.includes(auditidsscore)) {
                if (findingValueElement.trim() !== '' && findingValueElement != 0) {
                    formData.append(`img[]`, img.files[0]);
                    formData.append(`img1[]`, img1.files[0]);
                    formData.append('Finding[]', findingValueElement);
                    formData.append('qid[]', questionid);
                    formData.append('Date[]', dates);
                    formData.append('userid', user_id);
                    formData.append('auditid', document.getElementById('auditid').value);
                    formData.append('deptid', document.getElementById('deptid').value);
                    formData.append('catid', CtID);
                } else {
                    return false
                }
                // }
            }
        });
        console.log('img', img);
        console.log('img1', img1);
        console.log(auditids);
        console.log('auditidsarray', auditidsarray);



        const url = "<?php echo base_url('Main/createAuditDetailnew') ?>";

        if (currentvalue.length > 0) {
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.success) {
                        toastr.success('Data added successfully');
                        location.reload()
                    } else {
                        toastr.success('Data added successfully');
                        location.reload()
                    }
                },
                error: function() {
                    toastr.error('Failed to add data');
                }
            });
            toastr.success('Data added successfully');
                        location.reload()
        } else {
            alert("No value entered");
        }
        formReset();
    });









    function formReset() {
        // document.getElementById('Questionform').reset()
        document.getElementById('saveQ').style.display = 'inline'
        document.getElementById('updateQ').style.display = 'none'
    }
</script>