<?php

class TrucateController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
      echo  APICall::execute(array('a'=>'manage','sa'=>'truncate','ts'=>'users,worker_details,worker_docs,worker_education_details,worker_experiences,worker_skills,worker_skill_tags,employer_details,jobs,job_skills'));
    }

}

