<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Audit6s_model', 'AM');
    }

    public function index()
    {
        $this->load->view('Department');
    }

    public function auditHead()
    {
        $this->load->view('auditHead');
    }

    public function auditDetail()
    {
        $this->load->view('auditDetail');
    }

    public function auditDetailnew()
    {
        $this->load->view('auditDetailnew');
    }

    public function createDept()
    {
        $picture1 = '';
        if (!empty($_FILES['deptimg'])) {
            $config['upload_path'] = 'assets\img\6SAudit';
            $config['allowed_types'] = '*';
            $config['file_name'] = basename($_FILES["deptimg"]['name']);

            //Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            if ($this->upload->do_upload('deptimg')) {

                $uploadData = $this->upload->data();
                $picture1 = $uploadData['file_name'];
                $configi['image_library'] = 'gd2';
                $configi['source_image'] = $uploadData['full_path'];
                $configi['create_thumb'] = FALSE;
                $configi['maintain_ratio'] = FALSE;
                $configi['quality'] = 60;
                $configi['width'] = 800;
                $configi['height'] = 600;
                $configi['new_image'] = 'assets/img/6SAudit/' . $picture1;
                $this->load->library('image_lib');
                $this->image_lib->initialize($configi);
                $this->image_lib->resize();
            } else {
                $picture1 = '';
            }
        } else {
            $picture1 = '';
        }
        $data = $this->AM->createDept($_POST['deptname'], $_POST['depthod'], $_POST['deptpemail'], $_POST['deptsemail'], $picture1, $_POST['deptstatus'],  $_POST['userid']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function createCat()
    {


        $data = $this->AM->createCat($_POST['catname'], $_POST['catsort'], $_POST['catrem'], $_POST['catstatus'], $_POST['userid']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function createQ()
    {


        $data = $this->AM->createQ($_POST['catid'], $_POST['qname'], $_POST['qsort'], $_POST['qcriteria'], $_POST['qstatus'], $_POST['userid']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function submitRemarks()
    {


        $data = $this->AM->submitRemarks($_POST['editid'], $_POST['brem'], $_POST['arem']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function createAudit()
    {
        $data = $this->AM->createAudit(
            $_POST['auditname'],
            $_POST['auditorname'],
            $_POST['auditoremail'],
            $_POST['auditdate'],
            $_POST['auditstatus'],
            $_POST['userid']
        );
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }


    public function createAuditDetailnew()
    {
        // print_r($_POST);
        // print_r($_FILES['img']);
        // die;
        // Handle uploaded images
        $picture1 = array();
        $picture2 = array();

        if (!empty($_FILES['img']['name'])) {
            $filesCount = count($_FILES['img']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                if (!empty($_FILES['img']['name'][$i])) { // Check if file exists at this index
                    $_FILES['userFile']['name']     = $_FILES['img']['name'][$i];
                    $_FILES['userFile']['type']     = $_FILES['img']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                    $_FILES['userFile']['error']    = $_FILES['img']['error'][$i];
                    $_FILES['userFile']['size']     = $_FILES['img']['size'][$i];

                    $config['upload_path'] = 'assets/img/6SAudit';
                    $config['allowed_types'] = '*'; // Adjust allowed file types as needed
                    $config['file_name'] = $_FILES['img']['name'][$i];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('userFile')) {
                        $uploadData = $this->upload->data();
                        $picture1[] = $uploadData['file_name'];
                    }
                }
            }
        }
        else{
        return;
        }
        if (!empty($_FILES['img1']['name'])) {
            $filesCount = count($_FILES['img1']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                if (!empty($_FILES['img1']['name'][$i])) { // Check if file exists at this index
                    $_FILES['userFile']['name']     = $_FILES['img1']['name'][$i];
                    $_FILES['userFile']['type']     = $_FILES['img1']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['img1']['tmp_name'][$i];
                    $_FILES['userFile']['error']    = $_FILES['img1']['error'][$i];
                    $_FILES['userFile']['size']     = $_FILES['img1']['size'][$i];

                    $config['upload_path'] = 'assets/img/6SAudit';
                    $config['allowed_types'] = '*'; // Adjust allowed file types as needed
                    $config['file_name'] = $_FILES['img1']['name'][$i];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('userFile')) {
                        $uploadData = $this->upload->data();
                        $picture2[] = $uploadData['file_name'];
                    }
                }
            }
        }
        else{
            return;
            }
        $data = $this->AM->createAuditDetailnew(
            $_POST['Finding'],
            $_POST['auditid'],
            $_POST['deptid'],
            $_POST['catid'],
            $_POST['qid'],
            $_POST['Date'],
            $picture1,
            $picture2,
            $_POST['userid']
        );

        // Return response
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
    public function createAuditDetailnewtest()
    {
        // print_r($_POST);
        // print_r($_FILES['img']);
        // die;
        // Handle uploaded images
        $picture1 = array();
        $picture2 = array();

        if (!empty($_FILES['img']['name'])) {
            $filesCount = count($_FILES['img']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                if (!empty($_FILES['img']['name'][$i])) { // Check if file exists at this index
                    $_FILES['userFile']['name']     = $_FILES['img']['name'][$i];
                    $_FILES['userFile']['type']     = $_FILES['img']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['img']['tmp_name'][$i];
                    $_FILES['userFile']['error']    = $_FILES['img']['error'][$i];
                    $_FILES['userFile']['size']     = $_FILES['img']['size'][$i];

                    $config['upload_path'] = 'assets/img/6SAudit';
                    $config['allowed_types'] = '*'; // Adjust allowed file types as needed
                    $config['file_name'] = $_FILES['img']['name'][$i];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('userFile')) {
                        $uploadData = $this->upload->data();
                        $picture1[] = $uploadData['file_name'];
                    }
                }
            }
        }
        if (!empty($_FILES['img1']['name'])) {
            $filesCount = count($_FILES['img1']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                if (!empty($_FILES['img1']['name'][$i])) { // Check if file exists at this index
                    $_FILES['userFile']['name']     = $_FILES['img1']['name'][$i];
                    $_FILES['userFile']['type']     = $_FILES['img1']['type'][$i];
                    $_FILES['userFile']['tmp_name'] = $_FILES['img1']['tmp_name'][$i];
                    $_FILES['userFile']['error']    = $_FILES['img1']['error'][$i];
                    $_FILES['userFile']['size']     = $_FILES['img1']['size'][$i];

                    $config['upload_path'] = 'assets/img/6SAudit';
                    $config['allowed_types'] = '*'; // Adjust allowed file types as needed
                    $config['file_name'] = $_FILES['img1']['name'][$i];

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('userFile')) {
                        $uploadData = $this->upload->data();
                        $picture2[] = $uploadData['file_name'];
                    }
                }
            }
        }
        $data = $this->AM->createAuditDetailnewtest(
            $_POST['Finding'],
            $_POST['auditid'],
            $_POST['deptid'],
            $_POST['catid'],
            $_POST['qid'],
            $_POST['Date'],
            $picture1,
            $picture2,
            $_POST['userid']
        );

        // Return response
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getCat()
    {


        $data = $this->AM->getCat();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getActiveCat()
    {
        $data = $this->AM->getActiveCat();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getAllDept()
    {


        $data = $this->AM->getAllDept();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getAllCat()
    {


        $data = $this->AM->getAllCat();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getAllQs()
    {


        $data = $this->AM->getAllQs();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getAuditDetailtest()
    {

        // print_r($_POST);
        // die;
        $postData = file_get_contents('php://input');

        // Decode the JSON data
        $postDataArray = json_decode($postData, true);

        // Access the FID parameter
        $FID = $postDataArray['FID'];

        // Now you can use $FID as an array containing the filtered question IDs
        // print_r($FID);


        $data = $this->AM->getAuditDetailtest($_GET['ID'], $_GET['DID'], $_GET['CID'], $FID);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getAuditDetail()
    {

        // print_r($_POST);
        // die;

        $data = $this->AM->getAuditDetail($_GET['ID']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getAllAudit()
    {


        $data = $this->AM->getAllAudit();
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function getQ()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->getQ($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function getReport()
    {
        if (isset($_GET['ID'],$_GET['DID'])) {
            $data = $this->AM->getReport($_GET['ID'],$_GET['DID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function editDept()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->editDept($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function editCat()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->editCat($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function editQ()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->editQ($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function editAudit()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->editAudit($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function deleteDept()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->deleteDept($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function deleteCat()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->deleteCat($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function deleteQ()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->deleteQ($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function deleteAudit()
    {
        if (isset($_GET['ID'])) {
            $data = $this->AM->deleteAudit($_GET['ID']);
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode($data));
        } else {
            // Handle case where ID parameter is missing
            return $this->output
                ->set_status_header(400) // Bad Request
                ->set_output(json_encode(array('error' => 'ID parameter missing')));
        }
    }

    public function updateDept()
    {
        // Retrieve other form data
        $deptname = isset($_POST['deptname']) ? $_POST['deptname'] : '';
        $deptstatus = isset($_POST['deptstatus']) ? $_POST['deptstatus'] : '';
        $depthod = isset($_POST['depthod']) ? $_POST['depthod'] : '';
        $deptpemail = isset($_POST['deptpemail']) ? $_POST['deptpemail'] : '';
        $deptsemail = isset($_POST['deptsemail']) ? $_POST['deptsemail'] : '';
        $userid = isset($_POST['userid']) ? $_POST['userid'] : '';
        $ID = isset($_GET['ID']) ? $_GET['ID'] : '';

        $picture1 = '';
        if (!empty($_FILES['deptimg1']['name'])) {
            $config['upload_path'] = 'assets/img/6SAudit';
            $config['allowed_types'] = '*';
            $config['file_name'] = basename($_FILES["deptimg1"]['name']);

            // Load upload library and initialize configuration
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('deptimg1')) {
                // If upload is successful, unlink the previous image if it exists
                $path1 = 'assets/img/6SAudit/' . $_POST['currentdeptimg'];
                if (file_exists($path1)) {
                    unlink($path1);
                }
                $uploadData = $this->upload->data();
                $picture1 = $uploadData['file_name'];
                // Additional image processing if needed
                $data = $this->AM->updateDept($deptname, $deptstatus, $depthod, $deptpemail, $deptsemail, $picture1, $userid, $ID);
            }
        } else {
            // Handle case when no new image is uploaded
            $data = $this->AM->updateDeptnoimg($deptname, $deptstatus, $depthod, $deptpemail, $deptsemail, $userid, $ID);
        }



        // Call model function to update department data


        // Output JSON response
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function updateAudit()
    {

        // Call model function to update department data
        $data = $this->AM->updateAudit(
            $_POST['auditname'],
            $_POST['auditorname'],
            $_POST['auditoremail'],
            $_POST['auditdate'],
            $_POST['auditstatus'],
            $_POST['userid'],
            $_GET['ID']
        );

        // Output JSON response
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }


    public function updateCat()
    {
        $data = $this->AM->updateCat($_POST['catname'], $_POST['catsort'], $_POST['catrem'], $_POST['catstatus'], $_POST['userid'], $_GET['ID']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }

    public function updateQ()
    {
        $data = $this->AM->updateQ($_POST['qname'], $_POST['qsort'], $_POST['qcriteria'], $_POST['qstatus'], $_POST['dcatid'], $_POST['userid'], $_GET['ID']);
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode($data));
    }
}
