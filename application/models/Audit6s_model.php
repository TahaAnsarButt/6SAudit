<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Audit6s_model extends CI_Model
{
    public function currentTime()
    {
        $Date = date('Y-m-d H:i:s');
        return $Date;
    }

    public function createDept($deptname,  $depthod, $deptpemail, $deptsemail, $picture1, $deptstatus, $userid)
    {

        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("INSERT into tbl_6SAudit_Departments (DeptName,DeptStatus, DeptHOD,
         DeptEmail1, DeptEmail2, DeptPics,LoginID , EntryDateTime)
        VAlUES('$deptname','$deptstatus','$depthod','$deptpemail', '$deptsemail','$picture1', '$userid', '$EntryDateTime')
        ");
        $this->session->set_flashdata('info', 'data entered successfully');
        if ($query) {
            return $query;
        } else {
            return false;
        }
        // print_r($_POST);
        // die;
    }

    public function createCat($catname, $catsort, $catrem, $catstatus, $userid)
    {
        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("INSERT into tbl_6SAudit_Category (CatName, CatSortOrder,Catremarks, CatStatus, LoginID , EntryDateTime)
        VAlUES('$catname','$catsort','$catrem', '$catstatus', '$userid', '$EntryDateTime')
        ");
        $this->session->set_flashdata('info', 'data entered successfully');
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function createQ($catid, $qname, $qsort, $qcriteria, $qstatus, $userid)
    {
        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("INSERT into tbl_6SAudit_Questions (CategoryID, QuestionName, QuestionSortOrder, QuestionCriteria, QuestionStatus, QuestionMarks ,LoginID , EntryDateTime)
        VAlUES($catid,'$qname' ,'$qsort','$qcriteria', '$qstatus', 4, '$userid', '$EntryDateTime')
        ");
        $this->session->set_flashdata('info', 'data entered successfully');
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function createAudit($auditname,  $auditorname, $auditoremail, $auditdate, $auditstatus, $userid)
    {

        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("INSERT into tbl_6SAudit_Audit_Head (AuditName,AuditorName, AuditorEmail,
        AuditStartDate, AuditStatus ,LoginID , EntryDateTime)
        VAlUES('$auditname','$auditorname','$auditoremail','$auditdate','$auditstatus', '$userid', '$EntryDateTime')
        ");

        $this->session->set_flashdata('info', 'data entered successfully');
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function createAuditDetailnew($Finding, $auditid, $deptid, $catid, $qid, $Date, $picture1, $picture2, $userid)
    {
        // print_r($picture1);
        // print_r($picture2);
        // print_r($_POST);
        // die;
        $EntryDateTime = $this->currentTime();
        $entered = true;
        $length = count($Finding);

        for ($t = 0; $t < $length; $t++) {
            if (!empty($Finding[$t]) && !empty($picture1[$t]) && !empty($picture2[$t])) {

                $query = $this->db->query("INSERT INTO tbl_6SAudit_Detail 
                (Finding, Score, AuditHeadID, DeptID, CategoryID, QuestionID, AuditDate, BeforePics, AfterPics, LoginID, EntryDateTime)
                VALUES ('$Finding[$t]', 4, '$auditid', '$deptid', '$catid', '$qid[$t]', '$Date[$t]', '$picture1[$t]', '$picture2[$t]', '$userid', '$EntryDateTime')");

                if (!$query) {
                    $entered = false;
                    break;
                }
            }
            else{
                $this->session->set_flashdata('info', 'Data entered successfully');
            return true;}
        }

        if ($entered) {
            $this->session->set_flashdata('info', 'Data entered successfully');
            return true;
        } else {
            return false;
        }
    }

    public function createAuditDetailnewtest($Finding, $auditid, $deptid, $catid, $qid, $Date, $picture1, $picture2, $userid)
    {
        // print_r($picture1);
        // print_r($picture2);
        // print_r($_POST);
        // die;
        $EntryDateTime = $this->currentTime();
        $entered = true;
        $length = count($Finding);

        for ($t = 0; $t < $length; $t++) {
            // foreach($Finding as $key){
            if (!empty($Finding[$t])) {

                $query = $this->db->query("INSERT INTO tbl_6SAudit_Detail 
                (Finding, Score, AuditHeadID, DeptID, CategoryID, QuestionID, AuditDate, BeforePics, AfterPics, LoginID, EntryDateTime)
                VALUES ('$Finding[$t]', 4, '$auditid', '$deptid', '$catid', '$qid[$t]', '$Date[$t]', '$picture1[$t]', '$picture2[$t]', '$userid', '$EntryDateTime')");

                if (!$query) {
                    $entered = false;
                    break;
                }
            }
        }

        if ($entered) {
            $this->session->set_flashdata('info', 'Data entered successfully');
            return true;
        } else {
            return false;
        }
    }



    public function getCat()
    {
        $query = $this->db->query("SELECT CatID,CatName FROM  tbl_6SAudit_Category where CatStatus = 1");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getActiveCat()
    {
        $query = $this->db->query("SELECT        dbo.tbl_6SAudit_Category.CatName, dbo.tbl_6SAudit_Category.CatID
        FROM            dbo.tbl_6SAudit_Questions INNER JOIN
                                 dbo.tbl_6SAudit_Category ON dbo.tbl_6SAudit_Questions.CategoryID = dbo.tbl_6SAudit_Category.CatID
        WHERE        (dbo.tbl_6SAudit_Questions.QuestionStatus = 1) AND (dbo.tbl_6SAudit_Category.CatStatus = 1)
        GROUP BY dbo.tbl_6SAudit_Category.CatName, dbo.tbl_6SAudit_Category.CatID");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllDept()
    {
        $query = $this->db->query("SELECT * FROM  tbl_6SAudit_Departments");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllCat()
    {
        $query = $this->db->query("SELECT * FROM  tbl_6SAudit_Category");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllQs()
    {
        $query = $this->db->query("SELECT        dbo.tbl_6SAudit_Category.CatName, dbo.tbl_6SAudit_Questions.QuestionName, dbo.tbl_6SAudit_Questions.QuestionSortOrder, dbo.tbl_6SAudit_Questions.QuestionCriteria, dbo.tbl_6SAudit_Questions.QuestionID
        , dbo.tbl_6SAudit_Questions.QuestionStatus
        FROM            dbo.tbl_6SAudit_Category INNER JOIN
                                 dbo.tbl_6SAudit_Questions ON dbo.tbl_6SAudit_Category.CatID = dbo.tbl_6SAudit_Questions.CategoryID");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAllAudit()
    {
        $query = $this->db->query("SELECT   * FROM       tbl_6SAudit_Audit_Head where AuditStatus = 1");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAuditDetailtest($ID, $DID, $CID, $FID)
    {
        // print_r($_POST);
        // die;
        $countqid = count($FID);
        $selected = true;
        for ($i = 0; $i < $countqid; $i++) {
            $query = $this->db->query("SELECT   * FROM   tbl_6SAudit_Detail where AuditHeadID = '$ID' and DeptID = '$DID' and CategoryID = '$CID' and QuestionID = '$FID[$i]' ");
            if (!$query) {
                $selected = false;
                break;
            }
        }
        if ($selected) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getAuditDetail($ID)
    {
        // print_r($_POST);
        // die;
            $query = $this->db->query("SELECT   * FROM   tbl_6SAudit_Detail where AuditHeadID = '$ID'");
            if ($query) {
                return $query->result_array();
            } else {
            return false;
        }
    }

    public function getQ($ID)
    {
        $query = $this->db->query("SELECT *
FROM            View_6SAuditDetail
WHERE         (CatID = '$ID')");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function getReport($ID, $DID)
    {
        $query = $this->db->query("SELECT * FROM dbo.View_6SAuditReport
WHERE  (DeptID = $DID) AND (AuditHeadID = $ID)");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function editDept($ID)
    {
        $query = $this->db->query("SELECT * FROM  tbl_6SAudit_Departments where DeptIID = '$ID'");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function editCat($ID)
    {
        $query = $this->db->query("SELECT * FROM  tbl_6SAudit_Category where CatID = '$ID'");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function editQ($ID)
    {
        $query = $this->db->query("SELECT * FROM  tbl_6SAudit_Questions where QuestionID = '$ID'");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function editAudit($ID)
    {
        $query = $this->db->query("SELECT * FROM  tbl_6SAudit_Audit_Head where AuditID = '$ID'");
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }

    public function deleteDept($ID)
    {
        $query = $this->db->query("DELETE FROM  tbl_6SAudit_Departments where DeptIID = '$ID'");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function deleteCat($ID)
    {
        $query = $this->db->query("DELETE FROM  tbl_6SAudit_Category where CatID = '$ID'");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function deleteQ($ID)
    {
        $query = $this->db->query("DELETE FROM  tbl_6SAudit_Questions where QuestionID = '$ID'");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function deleteAudit($ID)
    {
        $query = $this->db->query("DELETE FROM  tbl_6SAudit_Audit_Head where AuditID = '$ID'");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function updateDept($deptname, $deptstatus, $depthod, $deptpemail, $deptsemail, $picture1, $userid, $ID)
    {
        // print_r($_POST);
        // die;
        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("UPDATE tbl_6SAudit_Departments SET
            DeptName = '$deptname',DeptStatus = '$deptstatus', DeptHOD = '$depthod',
         DeptEmail1 = '$deptpemail', DeptEmail2 = '$deptsemail', DeptPics = '$picture1' ,LastUpdatedLoginID = '$userid',
         LastUpdatedDate= '$EntryDateTime'
         WHERE DeptIID = '$ID'
         ");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function updateDeptnoimg($deptname, $deptstatus, $depthod, $deptpemail, $deptsemail,  $userid, $ID)
    {
        // print_r($_POST);
        // die;
        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("UPDATE tbl_6SAudit_Departments SET
            DeptName = '$deptname',DeptStatus = '$deptstatus', DeptHOD = '$depthod',
         DeptEmail1 = '$deptpemail', DeptEmail2 = '$deptsemail' ,LastUpdatedLoginID = '$userid',
         LastUpdatedDate= '$EntryDateTime'
         WHERE DeptIID = '$ID'
         ");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function updateCat($catname, $catsort, $catrem, $catstatus, $userid, $ID)
    {
        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("UPDATE tbl_6SAudit_Category SET
            CatName = '$catname', CatSortOrder = '$catsort', CatRemarks = '$catrem', CatStatus = '$catstatus', LastUpdatedLoginID = '$userid',
            LastUpdatedDate= '$EntryDateTime'
         WHERE CatID = '$ID'
         ");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function updateAudit($auditname,  $auditorname, $auditoremail, $auditdate, $auditstatus, $userid, $ID)
    {

        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("UPDATE tbl_6SAudit_Audit_Head SET
            AuditName = '$auditname',AuditorName = '$auditorname', AuditorEmail = '$auditoremail', AuditStartDate = '$auditdate',
            AuditStatus = '$auditstatus' ,LastUpdatedLoginID = '$userid', LastUpdatedDate= '$EntryDateTime'
         WHERE AuditID = '$ID'
         ");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function updateQ($qname, $qsort, $qcriteria, $qstatus, $dcatid, $userid, $ID)
    {
        $EntryDateTime = $this->currentTime();
        $query = $this->db->query("UPDATE tbl_6SAudit_Questions SET
            QuestionName = '$qname', QuestionSortOrder = '$qsort', QuestionCriteria = '$qcriteria', QuestionStatus = '$qstatus',
            CategoryID = '$dcatid',LastUpdatedLoginID = '$userid', LastUpdatedDate= '$EntryDateTime'
         WHERE QuestionID = '$ID'
         ");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }

    public function submitRemarks($editid,  $brem, $arem)
    {

        $query = $this->db->query("UPDATE tbl_6SAudit_Detail SET
            RemarksBeforePics = '$brem',RemarksAfterPics = '$arem'
         WHERE AuditDetailID = '$editid'
         ");
        if ($query) {
            return $query;
        } else {
            return false;
        }
    }
}
