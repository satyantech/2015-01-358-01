<?php require_once('config/config.php'); ?>
<?php
    //TODO: check if the request is coming from registered web address

if(isset($_REQUEST['a'])){
    switch($_REQUEST['a']){
        case 'grk': //Get a random key *********************************
            include __DIR__.'/lib/key.php';
            break;
        case 'ggd': //get geo data *********************************
            include __DIR__.'/lib/fetchgeodata.php';
            break;
        case 'red': //register employee details *********************************
            include __DIR__.'/lib/register-employee.php';
            break;
        case 'ca': //check authentication
            include __DIR__.'/lib/authentication.php';
            break;
        case 'fed': //fetch employee details *********************************
            include __DIR__ . '/lib/profile/profile.php';
            break;
        case 'ferd': //fetch employer details *********************************
            include __DIR__ . '/lib/profile/profile.php';
            break;
        case 'udp': // Update profile *********************************
            if(!isset($_REQUEST['prof_type'])) echo json_encode(array('response'=>array('out'=>'Error','error'=>'UDP:0x000')));
            if($_REQUEST['prof_type']=='emp')
                include __DIR__.'/lib/profile/profile-updater-employee.php';
            if($_REQUEST['prof_type']=='empr')
                include __DIR__.'/lib/profile/profile-updater-employer.php';
            if($_REQUEST['prof_type']=='admin')
                include __DIR__.'/lib/profile/profile-updater-admin.php';
            break;
        case 'empr_logo': // Update employer logo *********************************
            include __DIR__.'/lib/profile/profile-updater-employer.php';
            break;
        case 'GMD': //Gets the master table data
            include __DIR__.'/lib/misc/get-master-data.php';
            break;
        case 'wrk_exp': //Manages the Work experience data management
            include __DIR__.'/lib/profile/work-experience-mgmt.php';
            break;
        case 'GPD': //get the list of profile documents
            include __DIR__.'/lib/misc/get-emp-prof-docs.php';
            break;
        case 'rerd': //registering an employer
            include __DIR__.'/lib/profile/register-employer.php';
            break;
        case 'jpst': //Posts a job to the database created by the employer
            include __DIR__.'/lib/jobs/create-job-posting.php';
            break;
        case 'lstj': // Gets the jobs posted by the employer
            include __DIR__.'/lib/jobs/employer-jobs.php';
            break;
        case 'dlj': // Deletes a job posted by the employer
            include __DIR__.'/lib/jobs/employer-jobs.php';
            break;
        //----------------------------------------------------------------------------------------------------------------------------
        default:
            echo 1;
            break;
    }
}else{
    echo json_encode(array('response'=>array('out'=>'Error','error'=>'API:0x001')));
}

/**
 * ----------------------------<ABBRIVIATIONS>------------------------------
 *  			a     : Action
 *            grk     : Get Random Key
 *            ggd     : Get Geo Data
 */
?>
